<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Http\Requests\FrontOpportunityRequest;

use App\Models\Organisation;
use App\Models\Opportunity;
use App\Models\Category;
use App\Models\Location;
use App\Models\Suitability;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Auth;
use Vinkla\Hashids\Facades\Hashids;
use GuzzleHttp\Client;



class OpportunityController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(FrontOpportunityRequest $request)
    {
        $validated = $request->validated();

        $opportunity = new Opportunity($validated);
        $opportunity->organisation_id = Auth::id();
        $opportunity->active = true;
        $opportunity->save();

        $opportunity->syncRelations($validated);

        $request->session()->flash('status', 'Opportunity created successfully!');

        return redirect()->route('organisation.dashboard');
    }

    public function new(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\OpportunityCreationForm', [
            'method' => 'POST',
            'url' => route('opportunity.store'),
        ]);
        return view('opportunity.form', compact('form'));
    }

    public function edit(Request $request, FormBuilder $formBuilder, $hash) {
        $id = Hashids::decode($hash)[0];
        $opportunity = Opportunity::findOrFail($id);

        $form = $formBuilder->create('App\Forms\OpportunityCreationForm', [
            'method' => 'POST',
            'url' => route('opportunity.update', ['hash' => $hash]),
            'model' => $opportunity
        ]);
        return view('opportunity.form', compact('form'))->with('opportunities', $opportunity);
    }

    public function update(FrontOpportunityRequest $request, $hash)
    {
      $id = Hashids::decode($hash)[0];
      $validated = $request->validated();

      $opportunity = Opportunity::findOrFail($id);
      $opportunity->update($validated);
      $opportunity->syncRelations($validated);
      $request->session()->flash('success', 'Opportunity updated!');

      return redirect()->route('organisation.dashboard');
    }


    public function delete(Request $request, $hash) {
      $id = Hashids::decode($hash)[0];
      Opportunity::destroy($id);
      $request->session()->flash('success', 'Opportunity deleted!');
      return redirect()->back();
    }

    public function single($slug) {
      $opportunity = Opportunity::where('slug', $slug)->firstOrFail();
      return view('opportunity.single', compact('opportunity'));
    }

    public function renew(Request $request, $hash) {
      $id = Hashids::decode($hash)[0];
      $opportunity = Opportunity::findOrFail($id);
      $opportunity->renew();
      $request->session()->flash('success', 'Opportunity renewed!');
      return redirect()->back();
    }

    public function postcode(Request $request) {

      if($request->postcode) {
        $postcode = $request->postcode;
        $client = new Client(['http_errors' => false]);
        $response = $client->request('GET', 'https://api.postcodes.io/postcodes/' . $request->postcode);
        if($response->getStatusCode() == 200) {
          $response_body = $response->getBody();
          $response_json = json_decode($response_body, true);
          $new_filters = ['lat'=>$response_json['result']['latitude'],'long'=>$response_json['result']['longitude'],'postcode'=>$response_json['result']['postcode']];
          if($request->filters) {
            $old_filters = json_decode($request->filters, true);
            $merged_filters = array_merge($old_filters, $new_filters);
          }
          return redirect()->route('opportunity.index',$merged_filters ?? $new_filters);
        }
        else {
          $request->session()->flash('error', 'Postcode not found!');
          return redirect()->back();
        }
      }
      else {
        $request->session()->flash('success', 'Postcode cleared!');
        return redirect()->back();
      }
    }

    public function index(Request $request) {
      if (!isset($filters))
          $filters = new \stdClass();

      $query = Opportunity::query();
      if(Input::get('lat') && Input::get('long')) {
        $longitude = Input::get('long', false);
        $latitude = Input::get('lat', false);
        $postcode = Input::get('postcode', false);
        $query = $query->distance($latitude, $longitude)->having('distance', '>', 0)->orderBy('distance', 'ASC');
        $filters->postcode = $postcode;
      }
      else {
        $postcode = null;
      }

      if(Input::get('location')) {
        $location_slug = Input::get('location',false);
        $location = Location::where('slug', $location_slug)->first();
        $query = $query->distance($location->address['latlng']['lat'], $location->address['latlng']['lng']);
        // ->having('distance', '>', 0)->orderBy('distance', 'ASC');
        $filters->location = $location->label;
      }

      if(Input::get('organisation')) {
        $organisation_slug = Input::get('organisation',false);
        $organisation = organisation::where('slug', $organisation_slug)->first();
        $query = $query->whereHas('organisation', function ($query) use ($organisation_slug)  {
            $query->where('slug', $organisation_slug);
        });
        $filters->organisation = $organisation->name;
      }

      if(Input::get('category')) {
        $category_slug = Input::get('category',false);
        $category = Category::where('slug', $category_slug)->first();
        $query = $query->whereHas('categories', function ($query) use ($category_slug)  {
            $query->where('slug', $category_slug);
        });

        $filters->category = $category->label;
      }

      if(Input::get('suitability')) {
        $suitability_slug = Input::get('suitability',false);
        $suitability = Suitability::where('slug', $suitability_slug)->firstOrFail();
        $query = $query->whereHas('suitabilities', function ($query) use ($suitability_slug)  {
            $query->where('slug', $suitability_slug);
        });

        $filters->suitability = $suitability->label;
      }

      $opportunities = $query->orderBy('validated_at','desc')->paginate(config('volunteering.opportunities_per_page'));

      $categories = Cache::rememberForever('index_categories', function () {
        return Category::has('opportunities')->withCount('opportunities')->get();
      });

      $organisations = Cache::rememberForever('index_organisations', function () {
        return Organisation::has('opportunities')->withCount('opportunities')->get();
      });

      $suitabilities = Cache::rememberForever('index_suitabilities', function () {
        return Suitability::has('opportunities')->withCount('opportunities')->get();
      });

      $locations = Cache::rememberForever('index_locations', function () {
        return Location::all();
      });

      return view('opportunity.index', compact('opportunities','filters','organisations','categories','suitabilities','locations'));
    }

}
