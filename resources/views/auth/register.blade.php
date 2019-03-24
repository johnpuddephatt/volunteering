@extends('layouts.app')

@section('content')
  <div class="container container__full-height container__center">
    @foreach ($errors->all() as $message)
      {{ $message }}
    @endforeach
    {!! form($form, ['class'=>'register-form']) !!}
  </div>
@endsection
