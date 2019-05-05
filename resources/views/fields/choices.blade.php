@if ($showLabel && $showField)
    @if ($options['wrapper'] !== false)
    <div {!! $options['wrapperAttrs'] !!} >
    @endif
@endif

@if ($showLabel && $options['label'] !== false && $options['label_show'])
    {!! Form::customLabel($name, $options['label'], $options['label_attr']) !!}
@endif

@if ($showField)

    {{-- <input type="text" name="{{ $name }}" class="{{ $options['attr']['class'] }}" value="{{ old($name) ?? $options['value'] }}"> --}}
    <input type="text" name="{{ $name }}" class="{{ $options['attr']['class'] }}" value="preset-1,preset-2">


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
    <script src="/js/choices.js"></script>
@endpush
