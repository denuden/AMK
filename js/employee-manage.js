$(document).ready(function () {
    $('#add').click(function (e) { 
        e.preventDefault();
     
        $.ajax({
            url: 'php/add-employee.php',
            method: 'POST',
            dataType: 'JSON',
            data: {
              firstname: $(".firstname").val(),
              lastname: $(".lastname").val(),
              phone: $(".phone").val(),
              age: $(".age").val(),
              gender: $(".gender").val(),
              address: $(".address").val(),
              usn: $(".usn").val(),
              pass: $(".pass").val(),
            },
          })
          .done(function(data) {
            $.map(data, function(val, index) {
              switch (index) {
                case 'emptyfields':
                    $('#error').text(val);
                  break;k;
                case 'usernametoolong':
                  $('#error').text(val);
                  break;
                case 'invalidusername':
                  $('#error').text(val);
                  break;
                case 'passwordstr':
                  $('#error').text(val);
                  break;
                case 'usernametaken':
                  $('#error').text(val);
                  break;
                case 'success':
                  window.location.reload();
                  break;
              }
            });
          })
          .fail(function(xhr) {
            console.log("error" + xhr.responseText + xhr.status);
          });
    });

});