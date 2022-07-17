$(document).ready(function () {

    let updateId = -1
  
      $('#add').click(function (e) { 
        e.preventDefault();
  
          $.ajax({
              url: 'php/add-allowance.php',
              method: 'POST',
              dataType: 'JSON',
              data: {
                position: $(".position").val(),
                salary: $(".salary").val(),
                allowance: $(".allowance").val(),
              },
            })
            .done(function(data) {
              $.map(data, function(val, index) {
                switch (index) {
                  case 'emptyfields':
                      $('#error').text(val);
                    break;
                  case 'nametaken':
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
              url: 'php/update-allowance.php',
              method: 'POST',
              dataType: 'JSON',
              data: {
                id : updateId,
                position: $(".position").val(),
                salary: $(".salary").val(),
                allowance: $(".allowance").val(),
              },
            })
            .done(function(data) {
              $.map(data, function(val, index) {
                switch (index) {
                  case 'emptyfields':
                      $('#error').text(val);
                    break;
                  case 'nametaken':
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
      $('#addAllowance').click(function (e) { 
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
          url: 'php/list-all-allowance?id='+params.id,
          dataType: 'JSON',
        })
        .done(function(data) {
          $.map(data, function(val, index) {
            console.log(data);
            switch (index) {
              case 'unavailable':
                  $('#error').text(val);
                break;
              case 'success':
                $(".position").val(val.position)
               $(".salary").val(val.salary)
                 $(".allowance").val(val.allowance)
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