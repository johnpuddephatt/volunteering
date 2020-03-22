<?php

namespace App\Http\Controllers;
use App\Http\Requests\FrontNeedRequest;
use Illuminate\Http\Request;
use App\Models\Need;
use Vinkla\Hashids\Facades\Hashids;
use Kris\LaravelFormBuilder\FormBuilder;
use Auth;

class NeedController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function store(FrontNeedRequest $request)
  {
    $validated = $request->validated();

    $need = new Need($validated);
    $need->organisation_id = Auth::id();
    $need->save();

    $request->session()->flash('status', 'New need created successfully!');
    return redirect()->route('organisation.dashboard');
  }

  public function new(FormBuilder $formBuilder)
  {
      $form = $formBuilder->create('App\Forms\NeedCreationForm', [
          'method' => 'POST',
          'url' => route('need.store'),
      ]);
      return view('need.form', compact('form'));
  }

  public function enquiries($hash)
  {
    $id = Hashids::decode($hash)[0];
    $need = Need::findOrFail($id);
    $enquiries = $need->enquiries;
    return view('need.enquiries', compact('need','enquiries'));
  }

  public function update(FrontNeedRequest $request, $hash)
  {
    $id = Hashids::decode($hash)[0];
    $validated = $request->validated();

    $need = Need::findOrFail($id);
    $need->update($validated);
    $request->session()->flash('success', 'Need updated!');

    return redirect()->route('organisation.dashboard');
  }

  public function delete(Request $request, $hash) {
    $id = Hashids::decode($hash)[0];
    Need::findOrFail($id)->delete();
    $request->session()->flash('success', 'Need deleted!');
    return redirect()->back();
  }

  public function edit(FormBuilder $formBuilder, $hash) {
      $id = Hashids::decode($hash)[0];
      $need = Need::findOrFail($id);

      $form = $formBuilder->create('App\Forms\NeedCreationForm', [
          'method' => 'POST',
          'url' => route('need.update', ['hashid' => $hash]),
          'model' => $need
      ]);

      return view('need.form', compact('form'))->with('need', $need);
  }
}
