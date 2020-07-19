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
