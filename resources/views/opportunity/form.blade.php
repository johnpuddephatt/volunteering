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
              <div class="alert alert__warning">{{ $message }}</div>
            @endforeach
            <fieldset> <!---->
              {!! form_row($form->title) !!}
              {!! form_row($form->categories) !!}
              {!! form_row($form->intro) !!}
              {!! form_row($form->description) !!}
              {!! form_row($form->places) !!}
              {!! form_row($form->minimum_age) !!}
              {!! form_row($form->expenses) !!}
              {!! form_row($form->deadline) !!}
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
              <p>These questions help us show people vacancies relevant to them.</p>
              {!! form_row($form->suitabilities) !!}
              {!! form_row($form->accessibilities) !!}
              {!! form_row($form->requirements) !!}
            </fieldset>

            <fieldset> <!-- Tags and categories -->
              <h3 class="fieldset-heading">Skills</h3>
              {!! form_row($form->skills_needed) !!}
              {!! form_row($form->skills_gained) !!}
            </fieldset>

            <div class="alert alert__info">
              Opportunities must adhere to our <a href="/terms/">terms and conditions</a>. Anything considered in breach of these terms may be removed without warning.
            </div>
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
<script>
  const fromHomeInput = document.querySelector('#from_home');
  const addressInput =  document.querySelector('input[data-google-address]');
  const addressOutput =  document.querySelector('input[name="address"]');
  fromHomeInput.addEventListener('change', function(){
    hideAddressfield(fromHomeInput);
  });

  document.addEventListener('DOMContentLoaded', function(){
    hideAddressfield(fromHomeInput);
  });

  function hideAddressfield(checkbox) {
    if(checkbox.checked) {
      addressInput.value = '';
      addressOutput.value = '';
      addressInput.parentNode.style.display = 'none';
    }
    else {
      addressInput.parentNode.style.display = 'block';
    }
  }
</script>
@endpush
