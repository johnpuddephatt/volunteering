@if ($crud->hasAccess('update'))
<a href="{{ url('/dashboard/' . $entry->hash() ) }} " class="btn btn-xs btn-default"><i class="fa fa-window-eye"></i>Dashboard</a>
@endif
