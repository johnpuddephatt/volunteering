<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FrontEnquiryRequest;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Models\Enquiry;
use App\Models\Opportunity;
use App\Models\Need;
use Vinkla\Hashids\Facades\Hashids;

class EnquiryController extends Controller
{
  public function new(FormBuilder $formBuilder)
  {
    if(isset($_GET['enquirable_id']) && isset($_GET['enquirable_type'])) {
      $enquirableClass = new $_GET['enquirable_type'];
      $enquirable = $enquirableClass::with('organisation')->findOrFail($_GET['enquirable_id']);
    }
    else {
      $enquirable = '';
    }

    $form = $formBuilder->create('App\Forms\EnquiryCreationForm', [
        'method' => 'POST',
        'url' => route('enquiry.store')],
        [
          'enquirable_id' => $_GET['enquirable_id'] ?? '',
          'enquirable_type' => $_GET['enquirable_type'] ?? '',
        ]
    );
    return view('enquiry.form', compact('form','enquirable'));

  }

  public function store(FrontEnquiryRequest $request)
  {
      $validated = $request->validated();

      $enquiry = new Enquiry($validated);
      $enquiry->save();

      $enquiry->sendEnquiryNotification();

      $request->session()->flash('success', 'Enquiry sent!');

      return back();
  }

  public function delete(Request $request, $hash) {
    $id = Hashids::decode($hash)[0];
    dd($id);
    Enquiry::findOrFail($id)->delete();
    $request->session()->flash('success', 'Enquiry deleted!');
    return redirect()->back();
  }
}
