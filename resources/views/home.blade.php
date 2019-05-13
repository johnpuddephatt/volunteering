@extends('layouts.app')

@section('content')
{{-- <button class="geolocation-button">Geolocate</button>
  <div id="nudge" style="display: none;">Nudge nudge!</div>
<div id="startLat">Lat</div>
  <div id="startLon">Lon</div> --}}

<div class="home-hero--image"></div>
<section class="section section__home-hero">

  <div class="container">
    <div class="hero--search-box--container">
      <div class="card hero--search-box">
        <h2 class="hero--search-box--title">Find your perfect volunteering opportunity.</h2>
        <form method="POST" action="{{ route('opportunity.postcode') }}">
          @csrf
          <input type="text" name="postcode" placeholder="Enter postcode">
          <input type="submit" value="Search" />
        </form>
        <p>Or <a href="{{ route('opportunity.index')}}">view all opportunities ></a>
      </div>
    </div>
  </div>

</section>

@if(count($categories) >= 4)
  <section class="section section__home-categories">
    <h2 class="section-title">Explore by category</h2>
    <div class="home-categories-scroller scroller-outer">
      <div class="scroller-navigation">
        <button class="scroller-previous" tabindex="-1">
          <svg viewBox="0 0 18 18" aria-label="Previous" role="presentation" aria-hidden="true" focusable="false" style="height: 1em; width: 1em; display: block; fill: currentcolor;"><path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path></svg>
        </button>
        <button class="scroller-next">
          <svg viewBox="0 0 18 18"  aria-label="Next" role="presentation" aria-hidden="true" focusable="false" style="height: 1em; width: 1em; display: block; fill: currentcolor;"><path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path></svg>
        </button>
      </div>
      <div class="home-categories-inner scroller-inner">
        @foreach($categories as $category)
          <a href="{{ url('opportunities?category=' . $category->slug)}}" class="home-category">
            @if($category->image)
              <img class="home-category--image" src="{{ $category->image }}" />
            @else
              <img class="home-category--image" src="//placehold.it/320x240?text=×" />
            @endif
            <div class="home-category--text">
              {{ $category->label }}
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </section>
@endif

@if(count($locations) >= 3)
  <section class="section section__home-locations">
    <h2 class="section-title">Search by location</h2>

    <div class="container">
      @foreach($locations as $location)
        <a class="home-location" href="{{ route('opportunity.index', ['location' => $location->slug ] )}}">
          <div class="home-location--text">
            {{ $location->label }}
            @include('icons.arrow')
          </div>
        </a>
      @endforeach
    </div>
  </section>
@endif

<section class="section section__home-casestudies">
  <div class="case-study--text">
    <div class="container">
      <h2 class="case-study--title">Volunteer to show you care</h2>
      <p>Every year thousands of people across Wakefield give something back by volunteering.</p>
    </div>
    @include('icons.arrow')
  </div>
  <div class="case-study--image">
    <img src="/images/home-casestudies.jpg"/>
  </div>
</section>

@if(count($suitabilities) >= 3)
  <section class="section section__home-suitabilities">
    <h2 class="section-title">Find the opportunity that’s right for you</h2>
    <div class="home-categories-scroller scroller-outer" data-slideby=".334">
      <div class="scroller-navigation">
        <button class="scroller-previous" aria-label="Previous" tabindex="-1">
          <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 1em; width: 1em; display: block; fill: currentcolor;"><path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path></svg>
        </button>
        <button class="scroller-next" aria-label="Next">
          <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 1em; width: 1em; display: block; fill: currentcolor;"><path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path></svg>
        </button>
      </div>
      <div class="container scroller-inner">
        @foreach($suitabilities as $suitability)
          <a class="home-suitability" href="{{ route('opportunity.index', ['suitability' => $suitability->slug ] )}}">
            <div class="home-suitability--text">
              @include('icons.arrow')
              {{ $suitability->label }}
            </div>
            @if($suitability->image)
              <img class="home-suitability--image" src="{{ $suitability->image }}" />
            @else
              <img class="home-suitability--image" src="//placehold.it/350x525?text=×" />
            @endif
          </a>
        @endforeach
      </div>
    </div>
  </section>
@endif

@endsection
