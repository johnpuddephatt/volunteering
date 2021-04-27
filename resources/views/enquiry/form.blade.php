@extends('layouts.app')

@section('content')
  <div class="container container__center">
    <h2 class="page-title">{{ $enquirable->title ?? 'Enquire'}}</h2>
    <div class="page-subtitle">{{ $enquirable->organisation->name ?? 'Send an enquiry about an opportunity' }}</div>

    <div class="card">
      <div class="card-header">
        @if($enquirable)
          <div class="opportunity-single--intro">
            {{ $enquirable->intro ?? $enquirable->description }}
          </div>
        @endif
      </div>
      <div class="card-body">
        <h3>Express your interest</h3>

        @if($enquirable)
          @if($enquirable->contact_phone)<div class="opportunity-sidebar--phone"><a href="tel:{{ $enquirable->contact_phone }}">{{ $enquirable->contact_phone }}</a></div>@endif
          @if($enquirable->contact_email)<div class="opportunity-sidebar--email"><a href="{{ $enquirable->contact_email }}">{{ $enquirable->contact_email }}</a></div>@endif
          @if($enquirable->phone)<div class="opportunity-sidebar--phone"><a href="tel:{{ $enquirable->phone }}">{{ $enquirable->phone }}</a></div>@endif
          @if($enquirable->email)<div class="opportunity-sidebar--email"><a href="{{ $enquirable->email }}">{{ $enquirable->email }}</a></div>@endif
        @endif

        @if(!$enquirable || $enquirable->accepts_enquiries || $enquirable->organisation)
          <p>You can use the form below to send an enquiry.</p>
          @foreach ($errors->all() as $message)
            <div class="alert alert__warning">{{ $message }}</div>
          @endforeach
          {!! form($form, ['class'=>'opportunity-form']) !!}
        @endif

      </div>
    </div>

@endsection
