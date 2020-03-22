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
                  <a class="button button__small button__ghost" href="/opportunity/renew/{{$opportunity->hash() }}">Renew</a> <a class="button button__small button__ghost" href="/opportunity/delete/{{$opportunity->hash() }}">Delete</a>  <a class="button button__small" href="/opportunity/edit/{{$opportunity->hash() }}">Edit</a>
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

      @if($organisation->is_covid_centre)
        <div class="card opportunity-list">
          <div class="card-header">
            <div>
              <h4 class="card-title">My current needs</h4>
              <a href="{{ route('need.new') }}" class="button">Add a new need</a>
            </div>
            <p class="alert">Your organisation is verified as a volunteer centre. <a href="{{ route('organisation.single', ['slug' => $organisation->slug] ) }}">View your page here</a></p>
          </div>
          @if(isset($needs) && count($needs))
            <ul class="list-group">
              @foreach($needs as $need)
                <li class="list-group-item">
                  <div class="item-title">
                    {{$need->title}}
                    @if($need->enquiries)
                      <span class="muted">{{ $need->enquiries->count() }} people interested</span>
                    @endif
                  </div>
                  <div class="list-group-buttons">
                    <a class="button button__small button__ghost" href="{{ route('need.enquiries', ['hashid' => $need->hash()]) }}">View enquiries</a>
                    <a class="button button__small button__ghost" href="{{ route('need.delete', ['hashid' => $need->hash()]) }}">Delete</a>
                    <a class="button button__small" href="{{ route('need.edit', ['hashid' => $need->hash()]) }}">Edit</a>
                  </div>
                </li>
              @endforeach
            </ul>
          @else
            <div class="card-body centered">
              <div class="placeholder">
                <p>No needs added yet.</p>
                <a href="{{ route('need.new') }}" class="btn btn-primary">Add your first</a>
              </div>
            </div>
          @endif
        </div>
      @endif

  </div>

@endsection
