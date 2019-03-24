@if ($crud->hasAccess('update'))
<a href="{{ url($crud->route.'/'.$entry->getKey().'/renew') }} " onclick="return renew(this)" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i> Renew</a>

<script>
    function renew(button) {

      var button = $(button);
      var route = button.attr('href');
      var expiryStatus = document.querySelector('.expiry-status');
      var $crudTable = document.querySelector('#crudTable');
      console.log($crudTable);

      $.ajax({
          url: route,
          type: 'POST',
          success: function(result) {
              // Show an alert with the result
              new PNotify({
                  title: "Success",
                  text: "Opportunity renewed for 30 days",
                  type: "success"
              });
              if($crudTable) {
                  $crudTable.DataTable().ajax.reload();
              }
              if(expiryStatus) {
                  expiryStatus.innerHTML = 'This entry will expire in 30 days.'
              }
          },
          error: function(result) {
              // Show an alert with the result
              new PNotify({
                  title: "Error",
                  text: "Opportunity could not be renewed",
                  type: "warning"
              });
          }
      });

      return false;

    }
</script>

@endif
