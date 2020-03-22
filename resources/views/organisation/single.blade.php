@extends('layouts.app')

@section('content')
  <div class="container container__wide container__full">
    <div class="opportunity-single">
      <h2 class="opportunity-single--title">{{ $organisation->name}}</h2>
      <div class="opportunity-single--intro">{{ $organisation->covid_description }}</div>
      @foreach($organisation->needs as $need)
        <div>
          <h3>{{$need->title}}</h3>
          <p>{{$need->description}}</p>
          <a class="button button__secondary opportunity-single--enquire-button" href="{{ route('enquiry.new', ['enquirable_type' => 'App\Models\Need', 'enquirable_id' => $need->id ])}}" >Volunteer for this</a>
        </div>
      @endforeach
    </div>
</div>
@endsection
