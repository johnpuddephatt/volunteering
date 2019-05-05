@if ($message = Session::get('success'))
<div class="alert alert__success alert-block fixed autodismiss">
  <div class="alert--inner">
    <strong>{{ $message }}</strong>
  </div>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert__danger alert-block fixed">
  <div class="alert--inner">
  	<button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert__warning alert-block">
  <div class="alert--inner">
  	<strong>{{ $message }}</strong>
  </div>
</div>
@endif


@if ($message = Session::get('info'))
  <div class="alert alert__info alert-block fixed autodismiss">
  <div class="alert--inner">
  	<strong>{{ $message }}</strong>
  </div>
</div>
@endif

@if ($errors->any())
<div class="alert alert__danger">
  <div class="alert--inner">
  	Please check the form below for errors
  </div>
</div>
@endif
