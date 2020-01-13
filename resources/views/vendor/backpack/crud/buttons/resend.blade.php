@if ($crud->hasAccess('update'))

  @if(!$entry->email_verified_at)
    <a href="{{ url($crud->route. '/' .$entry->getKey() . '/sendemailverification') }} " onclick="return resend(this)" class="btn btn-xs btn-default"><i class="fa fa-envelope"></i>Resend email</a>

    <script>
        function resend(button) {
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
                      text: "Verification email sent",
                      type: "success"
                  });
                  crud.table.ajax.reload();
              },
              error: function(result) {
                  // Show an alert with the result
                  new PNotify({
                      title: "Error",
                      text: "Verification email could not be sent",
                      type: "warning"
                  });
              }
          });

          return false;

        }
    </script>
  @endif

@endif
