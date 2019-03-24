@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Homepage</h2>
    <ul>
      @foreach($recentOpportunities as $opportunity)
        <li><a href="/opportunity/{{ $opportunity->slug }}">{{$opportunity->title}}</a></li>
      @endforeach
    </ul>
</div>

@endsection
