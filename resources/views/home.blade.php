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

<section class="section section__home-categories">
  <h2 class="section-title">Search by category</h2>
  <div class="container">
    @foreach($categories as $category)
      <a class="home-category" href="{{ route('opportunity.index', ['category' => $category->slug ] )}}">
        <img class="home-category--image" src="/images/login-image.jpg" />
        <div class="home-category--text">
          Volunteer with
          {{ $category->label }}
        </div>
      </a>
    @endforeach
  </div>
</section>

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


<br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>
@endsection
