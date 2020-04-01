@extends('layouts.app')

@section('content')
  <div class="container container__wide container__full">
    <div class="opportunity-single">
      <h2 class="opportunity-single--title">{{ $organisation->name}}</h2>
      <div class="opportunity-single--intro">{!! $organisation->covid_description !!}</div>
      <div class="opportunity-single--key-features">
        @if($organisation->address)
          <span class="opportunity-single--location">{{ $organisation->address['value'] }} <a target="_blank" href="https://maps.google.com/?q={{ urlencode($organisation->address['value']) }}">view map</a></span>
        @endif
        @if($organisation->phone)
          <div class="opportunity-sidebar--phone">{{ $organisation->phone }}</div>
        @endif
      </div>
      @if(count($organisation->needs))
        <h3 class="needs-title">Opportunities available</h3>
        @foreach($organisation->needs as $need)
          <div class="needs--item">
            <h4 class="needs--item--title">{{$need->title}}</h4>
            <a class="button button__secondary opportunity-single--enquire-button" href="{{ route('enquiry.new', ['enquirable_type' => 'App\Models\Need', 'enquirable_id' => $need->id ])}}" >Volunteer for this</a>
            <p class="needs--item--description">{{$need->description}}</p>
          </div>
        @endforeach
      @else
        <div class="alert">No specific opportunities to show you at this time</div>
      @endif
    </div>
</div>
@endsection
