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


@if(count($categories) == 4)
  <section class="section section__home-categories">
    <h2 class="section-title">Search by category</h2>
    <div class="container">
      @foreach($categories as $category)
        <a class="home-category" href="{{ route('opportunity.index', ['category' => $category->slug ] )}}">
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
  </section>
@endif

@if(count($locations) == 3)
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

@if(count($suitabilities) == 3)
  <section class="section section__home-suitabilities">
    <h2 class="section-title">Find an opportunity that suits you</h2>

    <div class="container">
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
  </section>
@endif

@endsection
