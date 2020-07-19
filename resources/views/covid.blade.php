@extends('layouts.app')

@section('content')

{{-- <div class="home-hero--image"></div> --}}

<section class="section section__home-hero section__home-hero__covid">
  <div class="container">
    <div class="hero--message-box">
      <h1>We need volunteers more than ever.</h1>
      <p>It’s essential we help those in need in the coronavirus outbreak. Let’s show how much #WakefieldCares.</p>
    </div>
    <div class="hero--search-box--container">
      <div class="card hero--search-box">
        <h2 class="hero--search-box--title hero--search-box--title__covid">See what help your local community needs.</h2>
        <form method="POST" action="{{ route('organisation.postcode') }}">
          @csrf
          <input type="text" name="postcode" placeholder="Enter your postcode">
          <input type="submit" value="Search" />
        </form>
        <p>Or <a href="{{ route('organisation.index')}}">view all centres</a></p>
      </div>
    </div>
  </div>
</section>

@endsection
