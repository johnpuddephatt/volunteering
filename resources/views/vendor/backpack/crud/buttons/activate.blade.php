@if ($crud->hasAccess('update'))

@if($entry->active)
  <a href="{{ url($crud->route.'/'.$entry->getKey().'/deactivate') }} " onclick="return renew(this)" class="btn btn-xs btn-default"><i class="fa fa-window-close"></i>Deactivate</a>
@else
  <a href="{{ url($crud->route.'/'.$entry->getKey().'/activate') }} " onclick="return renew(this)" class="btn btn-xs btn-default"><i class="fa fa-check-circle"></i>Activate</a>
@endif

<script>
    function renew(button) {
      var label = button.innerText;
      var button = $(button);
      var route = button.attr('href');
      $.ajax({
          url: route,
          type: 'POST',
          success: function(result) {
              // Show an alert with the result
              new PNotify({
                  title: "Success",
                  text: "Organisation account " + label + "d",
                  type: "success"
              });
              crud.table.ajax.reload();
          },
          error: function(result) {
              // Show an alert with the result
              new PNotify({
                  title: "Error",
                  text: "Organisation could not be activated",
                  type: "warning"
              });
          }
      });

      return false;

    }
</script>

@endif
