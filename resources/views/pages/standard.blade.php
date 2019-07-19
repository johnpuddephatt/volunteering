@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="page">
      <h1 class="page-title">{{ $page->title }}</h1>
      <div class="page-content">
        {!! $page->content !!}
      </div>
    </div>
  </div>
@endsection
