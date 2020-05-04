@extends('layouts.app')

@section('content')
  <div class="container container__center">
    <div class="card">

          <div class="card-header">
            <h2 class="card-title">Specialised opportunities</h2>
            <p class="card-subtitle">Opportunities requiring specialised skills are listed below</p>
          </div>
          <div class="card-body">
            @if($specialised->count())

              <div class="specialised-needs">
                @foreach($specialised as $need)
                  <a class="button" href="{{ route('enquiry.new', ['enquirable_type' => 'App\Models\Need', 'enquirable_id' => $need->id ])}}" >{{ $need->title }}</a>
                @endforeach
              </div>

            @else
              <div class="alert">
                No specialised needs to show you.
              </div>
            @endif
          </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush
