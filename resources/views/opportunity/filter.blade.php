<div class="opportunity-index--sidebar">
    <button class="filter-heading">Location
      <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 1em; width: 1em; display: block; fill: currentcolor;"><path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path></svg>
    </button>
    <div class="filter-section">

    @if (!empty($filters->location))
      <span class="badge">Near {{ $filters->location }}
          <a class="button" href="?{{ http_build_query(Request()->except(['location','lat','long','page'])) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
      </span>
    @elseif(!empty($filters->postcode))
      <span class="badge">Near {{ $filters->postcode }}
          <a class="button" href="?{{ http_build_query(Request()->except(['postcode','lat','long','page'])) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
      </span>
    @else
      <form class="filter-postcode-form" method="POST" action="{{ route('opportunity.postcode') }}">
        @csrf
        <input type="hidden" name="filters" value="{{ json_encode(Request()->all()) }}">
        <input type="text" name="postcode" placeholder="Enter postcode">
        <button type="submit" aria-label="Next">
          <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 1em; width: 1em; display: block; fill: currentcolor;"><path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path></svg>
        </button>
      </form>
      @foreach($locations as $location)
        <a class="filter-link" href="?{{ http_build_query(array_merge(Request()->except('page'), ['location'=>$location->slug])) }}">{{ $location->label }} ({{ $location->opportunities_count }})</a>
      @endforeach
    @endif
    </div>
    @if(count($categories))
      <button class="filter-heading">Categories
        <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 1em; width: 1em; display: block; fill: currentcolor;"><path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path></svg>
      </button>
      <div tabindex="-1" class="filter-section">
      @if (!empty($filters->category))
        <span class="badge">{{ $filters->category }}
            <a class="button" href="?{{ http_build_query(Request()->except('category','page')) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
        </span>
      @else
        @foreach($categories as $category)
          <a class="filter-link" href="?{{ http_build_query(array_merge(Request()->except('page'), ['category'=>$category->slug])) }}">{{ $category->label }} ({{ $category->opportunities_count }})</a>
        @endforeach
      @endif
      </div>
    @endif

    @if(count($organisations))
      <button class="filter-heading">Organisation
        <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 1em; width: 1em; display: block; fill: currentcolor;"><path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path></svg>
      </button>
      <div tabindex="-1" class="filter-section">
      @if (!empty($filters->organisation))
        <span class="badge">{{ $filters->organisation }}
            <a class="button" href="?{{ http_build_query(Request()->except('organisation','page')) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
        </span>
      @else
        @foreach($organisations as $organisation)
          <a class="filter-link" href="?{{ http_build_query(array_merge(Request()->except('page'), ['organisation' => $organisation->slug ])) }}">{{ $organisation->name }} ({{ $organisation->opportunities_count }})</a>
        @endforeach
      @endif
      </div>
    @endif

    @if(count($suitabilities))
      <button class="filter-heading">Suitable for
        <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 1em; width: 1em; display: block; fill: currentcolor;"><path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path></svg>
      </button>
      <div class="filter-section">
        @if (!empty($filters->suitability))
          <span class="badge">{{ $filters->suitability }}
              <a class="button" href="?{{ http_build_query(Request()->except('suitability','page')) }}">Clear <svg xmlns="http://www.w3.org/2000/svg" width="6.2" height="6.3" viewBox="0 0 6.2 6.3"><path fill="#fff" d="M.7 0l2.4 2.5L5.5 0l.7.7-2.4 2.5 2.4 2.5-.7.6-2.4-2.5L.7 6.3 0 5.6l2.4-2.5L0 .7.7 0z"/></svg></a>
          </span>
        @else
          @foreach($suitabilities as $suitability)
            <a class="filter-link" href="?{{ http_build_query(array_merge(Request()->except('page'), ['suitability' => $suitability->slug ])) }}">{{ $suitability->label }} ({{ $suitability->opportunities_count }})</a>
          @endforeach
        @endif
      </div>
    @endif
  <div class="filter-section spacer"></div>
</div>
