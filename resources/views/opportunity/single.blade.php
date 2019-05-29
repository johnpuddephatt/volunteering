@extends('layouts.app')

@section('content')
  <div class="container container__wide container__full">
    <div class="opportunity-single">
      <a class="button opportunity-single--enquire-button" href="{{ route('enquiry.new', ['opportunity_id' => $opportunity->id ])}}" >Enquire</a>

      <h2 class="opportunity-single--title">{{ $opportunity->title}}</h2>
      <div class="opportunity-single--intro">{{ $opportunity->intro }}</div>

      <div class="opportunity-single--key-features">
        <span class="opportunity-single--hours">{{ $opportunity->hours ? $opportunity->hours . ' hrs / week' : 'Flexible hours' }}</span>
        <span class="opportunity-single--dates">{{ $opportunity->date_range() }}</span>
        @if($opportunity->address_ward && isset($opportunity->address['value']))
          <span class="opportunity-single--location">{{ $opportunity->address_ward }} <a target="_blank" href="https://maps.google.com/?q={{ urlencode($opportunity->address['value']) }}">view map</a></span>
        @endif
      </div>

      <div class="opportunity-single--description">
        {!! $opportunity->description !!}

        @if($opportunity->expenses)
          <div class="opportunity-single--expenses">
            <h3>Expenses</h3>
            {!! nl2br(htmlspecialchars($opportunity->expenses)) !!}
          </div>
        @endif
      </div>

      @if($opportunity->deadline)
        <div class="opportunity-single--deadline alert alert__info">Deadline: <strong>{{ date("D jS F", strtotime($opportunity->deadline)) }}</strong></div>
      @endif

      <div class="opportunity-single--other-features">

        @if($opportunity->categories->count())
          <div>
            <h3>Category</h3>
            {{ implode((array) $opportunity->categories->pluck('label')[0])}}
          </div>
        @endif

        @if($opportunity->suitabilities->count())
          <div>
            <h3>Suitable for</h3>
            {{ implode((array) $opportunity->suitabilities->pluck('label')[0])}}
          </div>
        @endif

        @if($opportunity->accessibilities->count())
          <div>
            <h3>Accessibility</h3>
            {{ implode((array) $opportunity->accessibilities->pluck('label')[0])}}
          </div>
        @endif

        @if($opportunity->minimum_age)
          <div>
            <h3>Minimum age</h3>
            {{ $opportunity->minimum_age }}
          </div>
        @endif

        @if($opportunity->skills_gained)
          <div>
            <h3>Skills gained</h3>
            {{ implode($opportunity->skills_gained, ', ')}}
          </div>
        @endif

        @if($opportunity->skills_needed)
          <div>
            <h3>Skills needed</h3>
            {{ implode($opportunity->skills_needed, ', ')}}
          </div>
        @endif

        @if($opportunity->requirements)
          <div>
            <h3>Requirements</h3>
            {{ implode($opportunity->requirements, ', ')}}
          </div>
        @endif

      </div>


    </div>
    <div class="opportunity-sidebar">

      <img class="opportunity-sidebar--photo" src="/images/organisation-photo-placeholder.jpg" />

      @if($opportunity->organisation->logo)
        <img class="opportunity-sidebar--logo" src="/{{$opportunity->organisation->logo }}" />
      @endif
      <h3 class="opportunity-sidebar--name">{{ $opportunity->organisation->name }}</h3>
      <div class="opportunity-sidebar--address">{{ $opportunity->organisation->address }}</div>
      <div class="opportunity-sidebar--info">{!! nl2br($opportunity->organisation->info) !!}</div>
      @if($opportunity->organisation->phone)
        <div class="opportunity-sidebar--phone">{{ $opportunity->organisation->phone }}</div>
      @endif
      @if($opportunity->organisation->email)
        <div class="opportunity-sidebar--email"><a href="mailto:{{ $opportunity->organisation->email }}">{{ $opportunity->organisation->email }}</a></div>
      @endif
      <a class="button button__inverted" href="{{ route('opportunity.index') }}?{{ http_build_query(['organisation' => $opportunity->organisation->slug]) }}">See all with this organisation</a>
    </div>
</div>
@endsection
