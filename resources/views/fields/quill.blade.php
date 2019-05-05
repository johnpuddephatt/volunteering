@if ($showLabel && $showField)
    @if ($options['wrapper'] !== false)
    <div {!! $options['wrapperAttrs'] !!} >
    @endif
@endif

@if ($showLabel && $options['label'] !== false && $options['label_show'])
    {!! Form::customLabel($name, $options['label'], $options['label_attr']) !!}
@endif

@if ($showField)

    <div id="quill-editor-{{ $name }}"></div>

    <input type="hidden" name="{{ $name }}" id="quill-textarea-{{ $name }}" value="{{ old($name) ?? $options['value'] }}">

    @if ($options['help_block']['text'] && !$options['is_child'])
        <{!! $options['help_block']['tag'] !!} {!! $options['help_block']['helpBlockAttrs'] !!}>
            {!! $options['help_block']['text'] !!}
        </{!! $options['help_block']['tag'] !!}>
    @endif

@endif

@if ($options['help_block']['text'] && !$options['is_child'])
    <{{$options['help_block']['tag']}} {{$options['help_block']['helpBlockAttrs']}}>
        {{ $options['help_block']['text'] }}
    </{{ $options['help_block']['tag'] }}>
@endif


@if($showError && isset($errors) && $errors->hasBag($errorBag))
    @foreach ($errors->getBag($errorBag)->get($nameKey) as $err)
        <div {!! $options['errorAttrs'] !!}>{!! $err !!}</div>
    @endforeach
@endif


@if ($showLabel && $showField)
    @if ($options['wrapper'] !== false)
        </div>
    @endif
@endif

@push('scripts')
    <script src="//cdn.quilljs.com/2.0.0-dev.2/quill.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function(){

      const editor_{{ $name }} = document.getElementById('quill-editor-{{ $name }}');

      var quill_{{ $name }} = new Quill(editor_{{ $name }}, {
        theme: 'snow',
        modules: {
          toolbar: {
            container: [{!! $options['toolbar'] !!}],
            handlers: {}
          }
        },
      });

      var editorContent_{{ $name }} = editor_{{ $name }}.querySelector('.ql-editor');
      var textarea_{{ $name }} = document.getElementById('quill-textarea-{{ $name }}');
      document.forms[0].addEventListener('submit',function(){
        textarea_{{ $name }}.value = editorContent_{{ $name }}.innerHTML;
      });

      editorContent_{{ $name }}.addEventListener('blur',function(){
        textarea_{{ $name }}.value = editorContent_{{ $name }}.innerHTML;
      });

      editorContent_{{ $name }}.closest('form').addEventListener('submit', function(){
          textarea_{{ $name }}.value = editorContent_{{ $name }}.innerHTML;
      });

      editorContent_{{ $name }}.innerHTML = textarea_{{ $name }}.value;

  });
    </script>
    <link href="//cdn.quilljs.com/2.0.0-dev.2/quill.snow.css" rel="stylesheet">
    <style>
      .ql-editor {
          position: relative;
          min-height: 15em;
          font-size: 1.2em;
          line-height: 1.8;
          background-color: white;
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
