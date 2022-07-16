$(document).ready(function () {

    let updateId = -1
    
      $('#add').click(function (e) { 
        e.preventDefault();
  
          $.ajax({
              url: 'php/employee-request.php',
              method: 'POST',
              dataType: 'JSON',
              data: {
                mode: $(".mode").val(),
                from: $(".from").val(),
                to: $(".to").val(),
                reason: $(".reason").val(),
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
                mode: $(".mode").val(),
                from: $(".from").val(),
                to: $(".to").val(),
                reason: $(".reason").val(),
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
      $('#request').click(function (e) { 
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
          url: 'php/list-all-request?id='+params.id,
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
                $(".mode").val(val.mode)
                $(".from").val(val.from)
                $(".to").val(val.to)
               $(".reason").val(val.reason)
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