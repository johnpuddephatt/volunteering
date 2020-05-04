@extends('layouts.app')

@section('content')
  <div class="container container__center">
    <div class="card">
        {!! form_start($form, ['class'=>'opportunity-form do-not-submit-on-return']) !!}
          <div class="card-header">
            <h2 class="card-title">Add a new need</h2>
          </div>
          <div class="card-body">
            @foreach ($errors->all() as $message)
              <div class="alert alert__warning">{{ $message }}</div>
            @endforeach
            <fieldset> <!---->
              {!! form_row($form->title) !!}
              {!! form_row($form->description) !!}
              {!! form_row($form->contact_email) !!}
              {!! form_row($form->contact_phone) !!}
              {!! form_row($form->accepts_enquiries) !!}
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
@endpush
