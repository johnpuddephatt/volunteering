@extends('backpack::layout')

@section('header')
  <section class="content-header">
    <h1>
      Activate account<small>Activate to allow this organisation to start posting opportunities</small>
    </h1>
  </section>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <div class="box-title">{{$organisation->name}}</div>
        </div>

        <div class="box-body">
          <table class="table table-fixed table-striped">
            <tr><td>Contact name:</td><td>{{$organisation->contact_name}}</td></tr>
            <tr><td>Contact role:</td><td>{{$organisation->contact_role}}</td></tr>
            <tr><td>Phone:</td><td>{{$organisation->phone}}</td></tr>
            <tr><td>Email: </td><td>{{$organisation->email}}</td></tr>
            <tr><td>Information:</td><td> {{ str_limit($organisation->info, $limit = 35, $end = '...') }} </td></tr>
          </table>

        </div>

      </div>
      @if($organisation->active)
        <div class="alert alert-warning">This account has already been activated</div>
      @else
        <form method="POST" action="/admin/organisation/{{ $organisation->id }}/activate">
          @csrf
          <button class="btn btn-primary btn-lg" type="submit">Activate</button>
        </form>
      @endif
    </div>
  </div>
@endsection
