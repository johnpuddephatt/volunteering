<!-- CKeditor -->
<div @include('crud::inc.field_wrapper_attributes') >
    <label>{!! $field['label'] !!}</label>
    @include('crud::inc.field_translatable_icon')
    <div id="quill-editor-{{ $field['name'] }}">
    </div>

    <textarea style="display: none"
    	id="quill-textarea-{{ $field['name'] }}"
        name="{{ $field['name'] }}"
        @include('crud::inc.field_attributes', ['default_class' => 'form-control quill-textarea-' . $field['name']])
    	>{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }}</textarea>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
</div>


{{-- ########################################## --}}
{{-- Extra CSS and JS for this particular field --}}
{{-- If a field type is shown multiple times on a form, the CSS and JS will only be loaded once --}}

@php
  if ($crud->tabsEnabled) {
      $fields = isset($entry) ? $crud->update_fields : $crud->create_fields;
  }
@endphp

@if ($crud->checkIfFieldIsFirstOfItsType($field, $fields))
    {{-- FIELD CSS - will be loaded in the after_styles section --}}
    @push('crud_fields_styles')
      {{-- <link href="//cdn.quilljs.com/2.0.0-dev.2/quill.snow.css" rel="stylesheet"> --}}
      <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">


      <style>
        .ql-editor {
            position: relative;
            min-height: 15em;
            font-size: 1.2em;
            line-height: 1.8;
        }
        .ql-editor h2 {
          margin-bottom: .75em;
          margin-top: 1.5em;
        }
        .ql-editor ul, .ql-editor ol {
            margin-bottom: .75em;
        }
        .ql-editor p { margin-bottom: .75em; }
        .ql-editor img { display: block; }
      </style>
    @endpush

    {{-- FIELD JS - will be loaded in the after_scripts section --}}
    @push('crud_fields_scripts')
      {{-- <script src="//cdn.quilljs.com/2.0.0-dev.2/quill.js"></script> --}}
      <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>

    @endpush

@endif

{{-- FIELD JS - will be loaded in the after_scripts section --}}
@push('crud_fields_scripts')
<script>

  const editor_{{ $field['name'] }} = document.getElementById('quill-editor-{{ $field['name'] }}');

  var quill_{{ $field['name'] }} = new Quill(editor_{{ $field['name'] }}, {
    theme: 'snow',
    modules: {
      toolbar: {
        container: [{!! $field['toolbar'] !!}],
        handlers: {}
      }
    },
  });

  var editorContent_{{ $field['name'] }} = editor_{{ $field['name'] }}.querySelector('.ql-editor');
  var textarea_{{ $field['name'] }} = document.getElementById('quill-textarea-{{ $field['name'] }}');
  document.forms[0].addEventListener('submit',function(){
    textarea_{{ $field['name'] }}.value = editorContent_{{ $field['name'] }}.innerHTML;
  });
  editorContent_{{ $field['name'] }}.innerHTML = textarea_{{ $field['name'] }}.value;
</script>
@endpush

{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}
