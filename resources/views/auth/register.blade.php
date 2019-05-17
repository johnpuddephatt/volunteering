@extends('layouts.app')

@section('content')
  <div class="background-image--wrapper">
    <img src="/images/register-image.jpg" class="background-image">
  </div>
  <div class="login-wrapper">
    {!! form_start($form, ['class'=>'login-form do-not-submit-on-return']) !!}
      <div class="login-form--inner">
        <h2 class="login-form--title">Register to add your opportunities</h2>

        @foreach ($errors->all() as $message)
          <div class="alert alert__warning">{{ $message }}</div>
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
        <div class="alert alert__info">
          By clicking register below you are agreeing to adhere to our <a href="/terms/">terms and conditions</a>. Breaching these terms may result in account temporary or permanent suspension of your account.
        </div>
        {!! form_row($form->submit) !!}
      </div>
    {!! form_end($form, false) !!}
  </div>
@endsection
