@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
      <div class="card">
        <div class="card-header">
          <h4 class="float-sm-left mt-2 mb-0">My opportunities</h4>
          <div class="float-sm-right">
            <a href="{{ route('opportunity.form') }}" class="btn btn-primary">Add new opportunity</a>
          </div>
        </div>
        @if(isset($opportunities) && count($opportunities))
          <ul class="list-group list-group-flush">
            @foreach($opportunities as $opportunity)
            <li class="list-group-item">{{$opportunity->title}}</li>
            @endforeach
          </ul>
        @else
          <div class="card-body">
            <p>No opportunities added yet.</p>
            <a href="{{ route('opportunity.form') }}" class="btn btn-primary">Add your first</a>
          </div>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
