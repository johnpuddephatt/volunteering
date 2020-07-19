@extends('layouts.app')

@section('content')
<div class="container container__row container__center">

<div class="opportunity-index--wrapper">
  <label class="button" for="sidebar-trigger">Filter opportunities</label>
  <input id="sidebar-trigger" type="checkbox" class="opportunity-index--sidebar--trigger">
  @include('opportunity.filter')
  <div class="card">
    <div class="card-header">
      <div>
        <h2 class="card-title">Opportunities</h2>
        @if( $filters != new stdClass() )
          <span>Showing {{ $opportunities->total() }} of {{ $total_opportunities }} opportunities</span>
        @else
          Viewing all {{ $total_opportunities }} opportunities
        @endif
      </div>
    </div>

    <div class="card-body">

    @if( $filters != new stdClass() )
      <div class="opportunity-filter">
        <div>
          <span>Filters:<span>
          @if (!empty($filters->postcode))
            <span class="badge">Near {{ strtoupper($filters->postcode) }}
              <a class="button" href="?{{ http_build_query(Request()->except('postcode','lat','long','page')) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
            </span>
          @endif
          @if (!empty($filters->location))
            <span class="badge">Near {{ $filters->location }}
              <a class="button" href="?{{ http_build_query(Request()->except('location','page')) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
            </span>
          @endif
          @if (!empty($filters->category))
            <span class="badge">{{ $filters->category }}
              <a class="button" href="?{{ http_build_query(Request()->except('category','page')) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
            </span>
          @endif
          @if (!empty($filters->suitability))
            <span class="badge">{{ $filters->suitability }}
              <a class="button" href="?{{ http_build_query(Request()->except('suitability','page')) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
            </span>
          @endif
          @if (!empty($filters->organisation))
            <span class="badge">{{ $filters->organisation }}
              <a class="button" href="?{{ http_build_query(Request()->except('organisation','page')) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
            </span>
          @endif

        </div>
      </div>
    @endif
      {{-- <div>{{ $opportunities->total() }} opportunities</div> --}}
    @forelse($opportunities as $opportunity)
      @include('opportunity.card')
    @empty
      <div class="placeholder">
        No opportunities to show you.
      </div>
    @endforelse
  </div>
  <div class="card-footer">
    {{-- {{ $opportunities->links() }} --}}
    <div>
      {{ $opportunities->appends(request()->input())->render() }}
    </div>
  </div>
</div>
</div>
@endsection
