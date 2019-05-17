@extends('layouts.app')

@section('content')
  <div class="container container__center">
    <h2 class="page-title">Express your interest</h2>
    @if($opportunity)
      <div class="page-subtitle">in {{ $opportunity->title }}</div>
    @endif

    <div class="card">
      <div class="card-header">
      </div>
      <div class="card-body">
        @foreach ($errors->all() as $message)
          <div class="alert alert__warning">{{ $message }}</div>
        @endforeach
        {!! form($form, ['class'=>'opportunity-form']) !!}

      </div>
    </div>

@endsection
