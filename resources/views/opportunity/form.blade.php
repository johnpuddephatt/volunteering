@extends('layouts.app')

@section('content')
  <div class="container container__center">
    <div class="card">
        {!! form_start($form, ['class'=>'opportunity-form do-not-submit-on-return']) !!}
          <div class="card-header">
            <h2 class="card-title">Add a new opportunity</h2>
          </div>
          <div class="card-body">
            @foreach ($errors->all() as $message)
              {{ $message }}
            @endforeach
            <fieldset> <!---->
              {!! form_row($form->title) !!}
              {!! form_row($form->categories) !!}
              {!! form_row($form->intro) !!}
              {!! form_row($form->description) !!}
              {!! form_row($form->places) !!}
              {!! form_row($form->minimum_age) !!}
              {!! form_row($form->expenses) !!}
            </fieldset>

            <fieldset> <!--Location-->
              <h3 class="fieldset-heading">Location</h3>
              {!! form_row($form->address) !!}
              {!! form_row($form->from_home) !!}
            </fieldset>

            <fieldset> <!--Contact info.-->
              <h3 class="fieldset-heading">Contact details</h3>
              {!! form_row($form->phone) !!}
              {!! form_row($form->email) !!}
            </fieldset>

            <fieldset> <!--Times etc.-->
              <h3 class="fieldset-heading">Times and dates</h3>
              {!! form_row($form->frequency) !!}
              {!! form_row($form->start_date) !!}
              {!! form_row($form->end_date) !!}
              {!! form_row($form->hours) !!}

            </fieldset>

            <fieldset> <!-- Tags and categories -->
              <h3 class="fieldset-heading">Who it’s for</h3>
              {!! form_row($form->requirements) !!}
              {!! form_row($form->skills_needed) !!}
              {!! form_row($form->skills_gained) !!}
              {!! form_row($form->suitabilities) !!}
              {!! form_row($form->accessibilities) !!}
            </fieldset>
          </div>
          <div class="card-footer">
            {!! form_row($form->submit) !!}
          </div>
        {!! form_end($form) !!}
    </div>
</div>
@endsection

@push('scripts')
<script src="/js/choices.js"></script>
@endpush
