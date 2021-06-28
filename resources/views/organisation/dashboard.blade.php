@extends('layouts.app')

@section('content')
<div class="container container__center container__full-height">
  <h2 class="page-title">Dashboard</h2>
  <div class="page-subtitle">{{ $organisation->name }}</div>
  <div class="card opportunity-list">
    <div class="card-header">
      <div>
        <h4 class="card-title">My opportunities</h4>
        <a href="{{ route('opportunity.new') }}" class="button">Add new opportunity</a>
      </div>
    </div>
    @if(isset($opportunities) && count($opportunities))
    <ul class="list-group">
      @foreach($opportunities as $opportunity)
      <li class="list-group-item">
        <div class="item-title">{{$opportunity->title}}</div>
        @if($opportunity->expires_in())
        <span class="muted">{{$opportunity->expires_in() }} days remaining</span>
        @else
        <span class="muted">Expired</span>
        @endif
        <div class="list-group-buttons">
          <a class="button button__small button__ghost" href="/opportunity/renew/{{$opportunity->hash() }}">Renew</a> <a
            class="button button__small button__ghost" href="/opportunity/delete/{{$opportunity->hash() }}">Delete</a>
          <a class="button button__small" href="/opportunity/edit/{{$opportunity->hash() }}">Edit</a>
        </div>
      </li>
      @endforeach
    </ul>
    @else
    <div class="card-body centered">
      <div class="placeholder">
        <p>No opportunities added yet.</p>
        <a href="{{ route('opportunity.new') }}" class="btn btn-primary">Add your first</a>
      </div>
    </div>
    @endif
  </div>
</div>

@endsection