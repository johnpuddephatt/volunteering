<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use GuzzleHttp\Client;
use App\Http\Requests\FrontOpportunityRequest;
use App\Models\Opportunity;
use Auth;

class OpportunityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(FrontOpportunityRequest $request)
    {
        $validated = $request->validated();

        $validated['address'] = json_decode($validated['address']);

        $opportunity = new Opportunity($validated);
        $opportunity->organisation_id = Auth::id();
        $opportunity->active = true;
        if(!empty($validated['address'])) {
          $opportunity->address_ward = $this->getWardData($validated['address']);
        }

        $opportunity->save();

        $opportunity->accessibilities()->attach($validated['accessibilities']);
        $opportunity->categories()->attach($validated['categories']);
        $opportunity->suitabilities()->attach($validated['suitabilities']);

        $request->session()->flash('status', 'Opportunity created successfully!');

        return redirect()->route('dashboard');
    }

    public function form(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\OpportunityCreationForm', [
            'method' => 'POST',
            'url' => route('opportunity.store')
        ]);
        return view('opportunity.create', compact('form'));
    }

    public function update() {

        //copy in postcodes.io lookup...
        return 'hello update';
    }

    public function delete() {
        return 'hello delete';
    }

    public function show($slug) {

      $opportunity = Opportunity::where('slug', $slug)->firstOrFail();
      return view('opportunity.show', compact('opportunity'));
    }

    public function getWardData($address) {
      if (property_exists($address,'postal_code') && isset($address->postal_code)) {
          $postcode = $address->postal_code;
          $client = new Client();
          $response = $client->request('GET', 'https://api.postcodes.io/postcodes/' . $postcode);
          $response_body = $response->getBody();
          $response_json = json_decode($response_body, true);
          return json_encode($response_json['result']);
      }
      else {
          return null;
      }
    }
}
