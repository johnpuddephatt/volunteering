@if ($showLabel && $showField)
    @if ($options['wrapper'] !== false)
    <div {!! $options['wrapperAttrs'] !!} >
    @endif
@endif

@if ($showLabel && $options['label'] !== false && $options['label_show'])
    {!! Form::customLabel($name, $options['label'], $options['label_attr']) !!}
@endif

@if ($showField)
  <div class="croppie-wrapper">
    <div style="visibility: hidden;" id="croppie"></div>
    <div class="croppie-input-wrapper">
      <input type="file" id="upload-input"/>
      <button tabindex="-1" class="message">Click here to choose an image</button>
    </div>
  </div>


    {!! Form::input('hidden', $name, $options['value'], $options['attr']) !!}

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
    <link href="vendor/croppie/croppie.css" rel="stylesheet">
    <style>
        .croppie-wrapper {
            position: relative;
            min-height: 250px;
            padding: 2em;
            margin-bottom: 2em;
        }

        .croppie-wrapper.image-loaded [type="file"] {
          position: relative;
          min-height: 50px;
        }

        .croppie-wrapper [type="file"] {
          position: absolute;
          z-index: 9;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          opacity: 0;
        }

        .cr-viewport.cr-vp-square {
          border-radius: 50%;
        }

        .croppie-wrapper [type="file"]:focus + button {
          outline: 3px solid #2763c399;
          outline-offset: 2px;
        }

        .croppie-wrapper.image-loaded .croppie-input-wrapper {
          position: relative;
        }

        .cr-viewport:focus {
          outline: 3px solid #2763c3;
          outline-offset: -5px;
        }

      .cr-slider:focus::-webkit-slider-thumb { box-shadow: 0px 0px 0px 4px #2763c3; }
      .cr-slider:focus::-moz-range-thumb { box-shadow: 0px 0px 0px 4px #2763c3; }
      .cr-slider:focus::-ms-thumb { box-shadow: 0px 0px 0px 4px #2763c3; }


      .croppie-wrapper .message {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
      }
    </style>
    <script src="vendor/croppie/croppie.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(){


                var uploadCrop;
                var c;
                var result = document.querySelector('[name="logo"]');
                var fileUpload = document.querySelector('[type="file"]');
                var fileUploadMessage = document.querySelector('.message');

                var croppieWrapper = document.querySelector('.croppie-wrapper');
                var croppieContainer = document.querySelector('#croppie');
                c = new Croppie(croppieContainer, {
                    // enforceBoundary: true,
                    boundary: { width: 250, height: 250 },
                    viewport: { width: 200, height: 200, type: 'square' }
                });

                if(result.value) {
                    c.bind({
                        url: result.value,
                    }).then(function(){
                        croppieContainer.style.visibility = 'visible';
                        croppieWrapper.classList.add('image-loaded');
                        // fileUpload.style.display = 'none';
                        // fileUploadMessage.style.display = 'none';
                    });
                }

        		function readFile(input) {
         			if (input.files && input.files[0]) {
        	            var reader = new FileReader();
        	            reader.onload = function (e) {
                            c.bind({
                                url: e.target.result,
                            }).then(function(){
                                croppieContainer.style.visibility = 'visible';
                                croppieWrapper.classList.add('image-loaded');
                                // fileUpload.style.display = 'none';
                                // fileUploadMessage.style.display = 'none';
                                c.result().then(function(response){
                                    result.value = response;
                                });
                            });
        	            }
        	            reader.readAsDataURL(input.files[0]);
        	        }
        	        else {
        		        console.log("Sorry - you're browser doesn't support the FileReader API");
        		    }
        		}

                //when upload changes, readfile...
                var uploadInput = document.querySelector('#upload-input');
                uploadInput.addEventListener('change', function(){
                    readFile(this);
                });


                var uploadResult = document.querySelector('.upload-result');
                uploadResult = document.addEventListener('change', function(){
                    if(c) {
                        c.result().then(function(response){
                            result.value = response;
                        });
                    }
                })

        });
    </script>
@endpush
