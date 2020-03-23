@extends('layouts.app')

@section('content')
  <div class="container container__center">
    <div class="card opportunity-list">
      <div class="card-header">
        <h4 class="card-title">People interested in {{ $need->title }}</h4>
      </div>
      <div class="card-body">
        hello
      </div>
      <ul class="list-group">
        @foreach($enquiries as $enquiry)
          <li class="list-group-item">
            <div class="item-title">
              {{$enquiry->name}} &nbsp;&nbsp;
              @if($enquiry->email)
                <span class="muted">{{ $enquiry->email }}</span>
              @endif
              @if($enquiry->phone)
                <span class="muted">{{ $enquiry->phone }}</span>
              @endif
            </div>
            <div class="list-group-buttons">
              <a class="button button__small button__ghost" href="{{ route('enquiry.delete', ['hashid' => $enquiry->hash()]) }}">Delete</a>
            </div>
          </li>
        @endforeach
      </ul>
    </div>
</div>
@endsection
