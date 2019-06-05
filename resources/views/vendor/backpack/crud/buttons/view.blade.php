@if ($crud->hasAccess('update'))
  <a href="{{ url('/opportunities/'.$entry->slug) }}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i> View</a>
@endif
