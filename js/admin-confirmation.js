$(document).ready(function () {
    $('.form').on('submit', '#confirmationAjax', function(e) {
        e.preventDefault();

        $.ajax({
            url: 'php/admin-confirmation-inc.php',
            method: 'POST',
            dataType: 'JSON',
            data: {
              key: $(".key").val(),
              captcha: $(".captcha").val()
            },
          })
          .done(function(data) {
            $.map(data, function(val, index) {
              switch (index) {
                case 'nouser':
                  $('#error').text(val);
                  break;
                case 'keyerror':
                  $('#error').text(val);
                  break;
                case 'success':
                  window.location.replace('/AMK');
                  break;
              }
            });
          })
          .fail(function(xhr) {
            console.log("error" + xhr.responseText + xhr.status);
          });
      });
});