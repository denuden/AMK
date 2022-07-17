$(document).ready(function () {

  let updateId = -1

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
              position: $(".position").val(),
              salary: $(".salary").val(),
              allowance: $(".allowance").val(),
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

    $('#update').click(function (e) { 
      e.preventDefault();

        $.ajax({
            url: 'php/update-employee.php',
            method: 'POST',
            dataType: 'JSON',
            data: {
              id : updateId,
              firstname: $(".firstname").val(),
              lastname: $(".lastname").val(),
              phone: $(".phone").val(),
              age: $(".age").val(),
              gender: $(".gender").val(),
              address: $(".address").val(),
              position: $(".position").val(),
              salary: $(".salary").val(),
              allowance: $(".allowance").val(),
              usn: $(".usn").val(),
              pass: $(".pass").val(),
            },
          })
          .done(function(data) {
            $.map(data, function(val, index) {
              switch (index) {
                case 'emptyfields':
                    $('#error').text(val);
                  break;
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



    // Buttons to show modal
    $('#addEmployee').click(function (e) { 
      e.preventDefault();
      $('#add').addClass('d-block');
      $('#update').addClass('d-none');
    });


    $('.edit').click(function (e) { 
      e.preventDefault();
      $('#add').addClass('d-none');
      $('#update').addClass('d-block');

      let itemReference = $(this)
      let params = { id:itemReference.attr('data-id')};
      updateId = params.id
      $.ajax({
        url: 'php/list-all-employee?id='+params.id,
        dataType: 'JSON',
      })
      .done(function(data) {
        $.map(data, function(val, index) {
          switch (index) {
            case 'unavailable':
                $('#error').text(val);
              break;
            case 'success':
              $(".firstname").val(val.firstname)
             $(".lastname").val(val.lastname)
               $(".phone").val(val.phone)
               $(".age").val(val.age)
              $(".gender").val(val.gender)
              $(".address").val(val.address)
              $(".position").val(val.position)
              $(".salary").val(val.salary)
              $(".allowance").val(val.allowance)
              $(".usn").val(val.emp_username)
              $(".pass").val()
              break;
          }
        });
      })
      .fail(function(xhr) {
        console.log("error" + xhr.responseText + xhr.status);
      });
    });


    $('.close').click(function (e) { 
      e.preventDefault();
    });
});