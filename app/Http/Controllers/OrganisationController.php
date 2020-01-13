<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opportunity;
use App\Models\Organisation;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Http\Requests\FrontOrganisationRequest;
use Vinkla\Hashids\Facades\Hashids;

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
      $opportunities = Opportunity::withoutGlobalScopes()->where('organisation_id', Auth::id())->get();
      return view('organisation.dashboard', compact('opportunities'));
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

    public function update(FrontOrganisationRequest $request) {

      $validated = $request->validated();

      \Auth::user()->update($validated);

      $request->session()->flash('success', 'Account updated!');
      return redirect()->route('organisation.dashboard');
    }
}
