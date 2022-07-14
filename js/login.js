$(document).ready(function() {


// ================================================
// ADMIN AJAX
$('.form').on('submit', '#adminAjax', function(e) {
    e.preventDefault();

    $.ajax({
        url: 'php/admin-login-inc.php',
        method: 'POST',
        dataType: 'JSON',
        data: {
          usn: $(".usnA").val(),
          pwd: $(".pwdA").val()
        },
      })
      .done(function(data) {
        $.map(data, function(val, index) {
          switch (index) {
            case 'emptyfields':
              $('#error').text(val);
              break;
            case 'passwordnotmatch':
              $('#error').text(val);
              break;
            case 'nouser':
              $('#error').text(val);
              break;
            case 'connerror':
              $('#error').text(val);
              break;
            case 'success':
              window.location.replace('admin-confirmation');
              break;
          }
        });
      })
      .fail(function(xhr) {
        console.log("error" + xhr.responseText + xhr.status);
      });
  });


  
// ADMIN AJAX
$('.formE').on('submit', '#employeeAjax', function(e) {
    e.preventDefault();

    $.ajax({
        url: 'php/employee-login-inc.php',
        method: 'POST',
        dataType: 'JSON',
        data: {
          usn: $(".usnE").val(),
          pwd: $(".pwdE").val()
        },
      })
      .done(function(data) {
        $.map(data, function(val, index) {
          switch (index) {
            case 'emptyfields':
              $('#error').text(val);
              break;
            case 'passwordnotmatch':
              $('#error').text(val);
              break;
            case 'nouser':
              $('#error').text(val);
              break;
            case 'connerror':
              $('#error').text(val);
              break;
              case 'confirmation':
                window.location.replace('employee-confirmation');
                break;
              case 'panel':
                window.location.replace('employee-panel');
                break;
        
          }
        });
      })
      .fail(function(xhr) {
        console.log("error" + xhr.responseText + xhr.status);
      });
  });

});