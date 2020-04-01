<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Opportunity;
use App\Models\Organisation;
use App\Models\Need;

use Kris\LaravelFormBuilder\FormBuilder;
use App\Http\Requests\FrontOrganisationRequest;
use Vinkla\Hashids\Facades\Hashids;
use GuzzleHttp\Client;

use Auth;

class OrganisationController extends Controller
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
    public function dashboard()
    {
      $organisation = Organisation::find(Auth::id());
      $opportunities = Opportunity::withoutGlobalScopes()->where('organisation_id', Auth::id())->get();
      $needs = Need::where('organisation_id', Auth::id())->with('enquiries')->get();
      return view('organisation.dashboard', compact('opportunities','needs', 'organisation'));
    }

    public function account(FormBuilder $formBuilder)
    {
      $form = $formBuilder->create('App\Forms\OrganisationRegistrationForm', [
        'method' => 'POST',
        'url' => route('organisation.update'),
        'model' => \Auth::user()
      ]);

      return view('organisation.profile', compact('form'));
    }

    public function single($slug) {
      $organisation = Organisation::where('slug', $slug)->with('needs')->firstOrFail();
      return view('organisation.single', compact('organisation'));
    }

    public function update(FrontOrganisationRequest $request) {

      $validated = $request->validated();

      \Auth::user()->update($validated);

      $request->session()->flash('success', 'Account updated!');
      return back();
    }

    public function updateCovid(Request $request) {


      \Auth::user()->update($request->all());

      $request->session()->flash('success', 'Description updated');
      return back();
    }

    public function postcode(Request $request) {
      if($request->postcode) {
        $postcode = $request->postcode;
        $client = new Client(['http_errors' => false]);
        $response = $client->request('GET', 'https://api.postcodes.io/postcodes/' . $request->postcode);
        if($response->getStatusCode() == 200) {
          $response_body = $response->getBody();
          $response_json = json_decode($response_body, true);
          $filters = ['lat'=>$response_json['result']['latitude'],'long'=>$response_json['result']['longitude'],'postcode'=>$response_json['result']['postcode']];
          return redirect()->route('organisation.index',$filters);
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

      $query = Organisation::query();

      $query = $query->where('is_covid_centre', true);

      if($request->input('lat') && $request->input('long')) {
        $longitude = $request->input('long', false);
        $latitude = $request->input('lat', false);
        $postcode = $request->input('postcode', false);
        $query = $query->distance($latitude, $longitude)->having('distance', '>', 0)->orderBy('distance', 'ASC');
        $query = $query->orderBy('distance', 'ASC');
      }
      else {
        $postcode = null;
        $query = $query->orderBy('name', 'ASC');
      }
      $organisations = $query->paginate(config('volunteering.opportunities_per_page'));
      return view('organisation.index', compact('organisations'));
    }
}
