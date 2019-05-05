@if ($showLabel && $showField)
    @if ($options['wrapper'] !== false)
    <div {!! $options['wrapperAttrs'] !!} >
    @endif
@endif

@if ($showLabel && $options['label'] !== false && $options['label_show'])
    {!! Form::customLabel($name, $options['label'], $options['label_attr']) !!}
@endif

@if ($showField)

    <input type="text" class="{{$options['attr']['class']}}" data-google-address="{&quot;field&quot;: &quot;{{ $name }}&quot;, &quot;full&quot;: true }">
    <input type="hidden" name="{{ $name }}" value="{{ old($name) ?? json_encode($options['value']) }}">



    @if ($options['help_block']['text'] && !$options['is_child'])
        <{!! $options['help_block']['tag'] !!} {!! $options['help_block']['helpBlockAttrs'] !!}>
            {!! $options['help_block']['text'] !!}
        </{!! $options['help_block']['tag'] !!}>
    @endif

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
    <style>
        .ap-input-icon.ap-icon-pin {
            right: 5px !important;
        }

        .ap-input-icon.ap-icon-clear {
            right: 10px !important;
        }
    </style>

    <script>

        //Function that will be called by Google Places Library
        function initAutocomplete() {

            var inputField = document.querySelector('[data-google-address]'),
            // ^^ $this
            addressConfig = JSON.parse(inputField.dataset.googleAddress),
            outputField = document.querySelector('[name="' + addressConfig.field  + '"]');
            // ^^ $field



                if (outputField.value) {
                    var existingData = JSON.parse(outputField.value);
                    if(existingData && existingData.value != 'null') {
                      inputField.value = existingData.value;
                    }
                }


                @if(isset($options['country']) && isset($options['radius']))
                    var latLng = new google.maps.LatLng({!!$options['location']!!});
                    var radius = {!!$options['radius']!!};
                    var circle = new google.maps.Circle({center: latLng, radius: radius});
                    var defaultBounds = circle.getBounds();
                @else
                    var defaultBounds = null;
                @endif

                var autocomplete = new google.maps.places.Autocomplete(
                    (inputField),
                    {
                        // types: ['geocode'],
                        bounds: defaultBounds,
                    }
                );

                @if(isset($options['country']))
                autocomplete.setComponentRestrictions(
                    {'country': {!!$options['country']!!}}
                );
                @endif

                autocomplete.addListener('place_changed', function fillInAddress() {
                    var place = autocomplete.getPlace();
                    var value = inputField.value;
                    var latlng = place.geometry.location;
                    var data = {"value": value, "latlng": latlng};

                    for (var i = 0; i < place.address_components.length; i++) {
                        var addressType = place.address_components[i].types[0];
                        data[addressType] = place.address_components[i]['long_name'];
                    }
                    outputField.value = JSON.stringify(data);

                });

                inputField.addEventListener('change', function(){
                    if (!inputField.value) {
                        outputField.value = "";
                    }
                });

            // $('[data-google-address]').each(function () {
            //
            //     var $this = $(this),
            //         $addressConfig = $this.data('google-address'),
            //         $field = $('[name="' + $addressConfig.field + '"]');
            //
            //     if ($field.val().length) {
            //         var existingData = JSON.parse($field.val());
            //         $this.val(existingData.value);
            //     }
            //
            //     @if(isset($field['country']) && isset($field['radius']))
            //         var latLng = new google.maps.LatLng({!!$options['location']!!});
            //         var radius = {!!$options['radius']!!};
            //         var circle = new google.maps.Circle({center: latLng, radius: radius});
            //         var defaultBounds = circle.getBounds();
            //     @else
            //         var defaultBounds = null;
            //     @endif
            //
            //     var $autocomplete = new google.maps.places.Autocomplete(
            //         ($this[0]),
            //         {
            //             // types: ['geocode'],
            //             bounds: defaultBounds,
            //         }
            //     );
            //
            //     @if(isset($options['country']))
            //     $autocomplete.setComponentRestrictions(
            //         {'country': {!!$options['country']!!}}
            //     );
            //     @endif
            //
            //     $autocomplete.addListener('place_changed', function fillInAddress() {
            //
            //         var place = $autocomplete.getPlace();
            //         var value = $this.val();
            //         var latlng = place.geometry.location;
            //         var data = {"value": value, "latlng": latlng};
            //
            //         for (var i = 0; i < place.address_components.length; i++) {
            //             var addressType = place.address_components[i].types[0];
            //             data[addressType] = place.address_components[i]['long_name'];
            //         }
            //         $field.val(JSON.stringify(data));
            //
            //     });
            //
            //     $this.change(function(){
            //         if (!$this.val().length) {
            //             $field.val("");
            //         }
            //     });
            //
            //
            // });

        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{config('services.google_places.key')}}&libraries=places&callback=initAutocomplete"
            async defer></script>

@endpush
