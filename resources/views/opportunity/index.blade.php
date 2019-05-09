@extends('layouts.app')

@section('content')
<div class="container container__center">
  <h2 class="page-title">Opportunities</h2>

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
            @if (!empty($filters->category))
              <span class="badge">{{ $filters->category }}
                  <a class="button" href="?{{ http_build_query(Arr::except(Request()->all(), ['category'])) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
              </span>
            @endif
            @if (!empty($filters->location))
              <span class="badge">Near {{ $filters->location }}
                  <a class="button" href="?{{ http_build_query(Arr::except(Request()->all(), ['location'])) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
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
@endsection
