<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FrontEnquiryRequest;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Models\Enquiry;
use App\Models\Opportunity;

class EnquiryController extends Controller
{
  public function new(FormBuilder $formBuilder)
  {

      $opportunity_id = $_GET['opportunity_id'] ?? '';
      $opportunity = Opportunity::findOrFail($opportunity_id);


      $form = $formBuilder->create('App\Forms\EnquiryCreationForm', [
          'method' => 'POST',
          'url' => route('enquiry.store')],
           ['opportunity_id' =>  $opportunity->id ]
      );
      return view('enquiry.form', compact('form','opportunity'));
  }

  public function store(FrontEnquiryRequest $request)
  {
      $validated = $request->validated();

      $enquiry = new Enquiry($validated);
      $enquiry->save();

      $request->session()->flash('success', 'Enquiry sent!');

      return redirect('/opportunities');
  }
}
