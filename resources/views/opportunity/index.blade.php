@extends('layouts.app')

@section('content')
<div class="container container__wide container__center">
  <h2 class="page-title">Opportunities</h2>

<div class="opportunity-index--wrapper">
  <label class="button" for="sidebar-trigger">Filter</label>
  <input id="sidebar-trigger" type="checkbox" class="opportunity-index--sidebar--trigger">
  <div class="opportunity-index--sidebar">
      <button class="filter-heading">Location</button>
      <div class="filter-section">

      @if (!empty($filters->location))
        <span class="badge">Near {{ $filters->location }}
            <a class="button" href="?{{ http_build_query(Request()->except(['location','lat','long'])) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
        </span>
      @elseif(!empty($filters->postcode))
        <span class="badge">Near {{ $filters->postcode }}
            <a class="button" href="?{{ http_build_query(Request()->except(['postcode','lat','long'])) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
        </span>
      @else
        <form class="filter-postcode-form" method="POST" action="{{ route('opportunity.postcode') }}">
          @csrf
          <input type="hidden" name="filters" value="{{ json_encode(Request()->all()) }}">
          <input type="text" name="postcode" placeholder="Enter postcode">
          <input type="submit" value="Search" />
        </form>
        @foreach($locations as $location)
          <a class="filter-link" href="{{ Request()->fullUrlWithQuery(['location' => $location->slug ]) }}">{{ $location->label }}</a>
        @endforeach
      @endif
    </div>

      <button class="filter-heading">Categories</button>
      <div tabindex="-1" class="filter-section">
      @if (!empty($filters->category))
        <span class="badge">{{ $filters->category }}
            <a class="button" href="?{{ http_build_query(Request()->except('category')) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
        </span>
      @else
        @foreach($categories as $category)
          <a class="filter-link" href="{{ Request()->fullUrlWithQuery(['category' => $category->slug ]) }}">{{ $category->label }} ({{ $category->opportunities_count }})</a>
        @endforeach
      @endif
    </div>
      <button class="filter-heading">Suitable for</button>
      <div class="filter-section">

      @if (!empty($filters->suitability))
        <span class="badge">{{ $filters->suitability }}
            {{-- <a class="button" href="?{{ http_build_query(Request()->except('suitability')) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a> --}}
            <a class="button" href="?{{ http_build_query(Request()->except('suitability')) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
        </span>
      @else
        @foreach($suitabilities as $suitability)
          <a class="filter-link" href="{{ Request()->fullUrlWithQuery(['suitability' => $suitability->slug ]) }}">{{ $suitability->label }} ({{ $suitability->opportunities_count }})</a>
        @endforeach
      @endif
    </div>
    <div class="filter-section spacer"></div>
  </div>
  <div class="card">
    <div class="card-header">
      @if( $filters != new stdClass() )
        <div class="opportunity-filter">
          <div>
            <span>Filters:<span>
            @if (!empty($filters->postcode))
              <span class="badge">Near {{ strtoupper($filters->postcode) }}
                  <a class="button" href="?{{ http_build_query(Arr::except(Request()->all(), ['postcode','lat','long'])) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
              </span>
            @endif
            @if (!empty($filters->location))
              <span class="badge">Near {{ $filters->location }}
                  <a class="button" href="?{{ http_build_query(Arr::except(Request()->all(), ['location'])) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
              </span>
            @endif
            @if (!empty($filters->category))
              <span class="badge">{{ $filters->category }}
                  <a class="button" href="?{{ http_build_query(Arr::except(Request()->all(), ['category'])) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
              </span>
            @endif
            @if (!empty($filters->suitability))
              <span class="badge">{{ $filters->suitability }}
                  <a class="button" href="?{{ http_build_query(Arr::except(Request()->all(), ['suitability'])) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
              </span>
            @endif

          </div>
          <span>Showing {{ $opportunities->total() }} of {{ $total_opportunities }} opportunities</span>
        </div>

      @else
        Viewing all {{ $total_opportunities }} opportunities
      @endif
    </div>

    <div class="card-body">
      {{-- <div>{{ $opportunities->total() }} opportunities</div> --}}
    @forelse($opportunities as $opportunity)
      <div class="opportunity-card">
        <div class="opportunity-card--header">
          @if($opportunity->is_new())
            <div class="opportunity-card--new-badge">New!</div>
            @endif
            <h3 class="opportunity-card--title"><a href="{{ route('opportunity.single', ['slug' => $opportunity->slug]) }}">{{$opportunity->title}}</a></h3>
            <div class="opportunity-card--organisation">{{ $opportunity->organisation->name }}</div>
        </div>
        <p class="opportunity-card--intro">{!! $opportunity->intro !!}</p>
        <div class="opportunity-card--footer">
          <div class="opportunity-card--footer--left">
            <span class="opportunity-card--hours">{{ $opportunity->hours ? $opportunity->hours . ' hrs / week' : 'Flexible hours' }}</span>
            {{-- <span class="opportunity-card--dates">{{ $opportunity->date_range() }}</span> --}}
          </div>
          <div class="opportunity-card--footer--right">
            @if($opportunity->from_home)
              <span class="opportunity-card--location">From home</span>
            @elseif($opportunity->address_ward)
              <span class="opportunity-card--location">{{ $opportunity->address_ward }}</span>
            @endif
            @if(!empty($filters->postcode) or !empty($filters->location))
              <span class="opportunity-card--distance">{{ round($opportunity->distance, 1) }} miles away</span>
            @endif
          </div>
        </div>
      </div>
    @empty
      <div class="">
        No opportunities to show you.
      </div>
    @endforelse
  </div>
  <div class="card-footer">
    {{ $opportunities->links() }}
  </div>
</div>
</div>
@endsection
