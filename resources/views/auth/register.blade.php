@extends('layouts.app')

@section('content')
  <div class="background-image--wrapper">
    <img src="/images/register-image.jpg" class="background-image">
  </div>
  <div class="login-wrapper">
    {!! form_start($form, ['class'=>'login-form']) !!}
    <div class="login-form--inner">
      <h2 class="login-form--title">Register to add your opportunities</h2>

        @foreach ($errors->all() as $message)
          {{ $message }}
        @endforeach
        <fieldset> <!--Location-->
          <h3 class="fieldset-heading">Account details</h3>
          {!! form_row($form->email) !!}
          {!! form_row($form->password) !!}
        </fieldset>
        <fieldset> <!--Location-->
          <h3 class="fieldset-heading">About your organisation</h3>
          {!! form_row($form->name) !!}
          {!! form_row($form->logo) !!}
          {!! form_row($form->info) !!}
          {!! form_row($form->website) !!}
          {!! form_row($form->phone) !!}
        </fieldset>
        <fieldset> <!--Location-->
          <h3 class="fieldset-heading">About you</h3>
          {!! form_row($form->contact_name) !!}
          {!! form_row($form->contact_role) !!}
        </fieldset>
        {!! form_row($form->submit) !!}
      </div>
    {!! form_end($form, false) !!}
  </div>
@endsection
