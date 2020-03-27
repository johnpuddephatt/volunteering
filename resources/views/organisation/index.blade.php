@extends('layouts.app')

@section('content')
  <div class="container container__center container__full-height">


    <h2 class="page-title">Your nearest centres</h2>

    @foreach($organisations as $organisation)
      <div class="card organisation-card">
        <div class="organisation-card--header">
          <a class="button button__secondary opportunity-card--enquire-button" href="{{ route('organisation.single', ['slug' => $organisation->slug])}}">How to help</a>
          <h3 class="organisation-card--title">{{$organisation->name}}</h3>
          <p class="organisation-card--subtitle">{{ $organisation->address['value'] }}</p>
        </div>
        <div class="organisation-card--footer">
          <div class="organisation-card--footer--left">
            <span class="organisation-card--distance">{{ round($organisation->distance, 1) }} miles away</span>
          </div>
          <div class="organisation-card--footer--right">
          </div>
        </div>
      </div>
    @endforeach

    <div class="card pagination-card">
      {{-- {{ $opportunities->links() }} --}}
      {{ $organisations->appends(request()->input())->render() }}
    </div>

</div>

@endsection
