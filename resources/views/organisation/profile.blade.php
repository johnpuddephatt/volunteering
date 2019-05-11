@extends('layouts.app')

@section('content')
  <div class="container container__center container__full-height">

      <div class="card opportunity-list">
        <div class="card-header">
          <h4 class="card-title">Edit your organisation profile</h4>
        </div>

        {!! form_start($form, ['class'=>'login-form do-not-submit-on-return']) !!}
          <div class="login-form--inner">

            @foreach ($errors->all() as $message)
              <div class="alert alert__warning">{{ $message }}</div>
            @endforeach
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
        {!! form_end($form, false) !!}      </div>
  </div>

@endsection
