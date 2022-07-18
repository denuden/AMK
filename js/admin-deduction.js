$(document).ready(function () {
    deductionId = -1

    $('.accept').click(function (e) { 
      e.preventDefault();
      let itemReference = $(this)
      deductionId = itemReference.attr('data-id') 
    });

    $('.setAmount').click(function (e) { 
        e.preventDefault();
        $.ajax({
          url: 'php/admin-update-deduction.php',
          type: 'POST',
          dataType: 'JSON',
          data: {
             status: "Approved",
             id :deductionId,
             amount : $('.deduction-amount').val()

           }
         })
        .done(function(data) {
            $.map(data, function(val, index) {
                switch (index) {
                  case 'success':
                    window.location.reload();
                    break;
                }
              });
        })
        .fail(function(xhr) {
            console.log("error" + xhr.responseText + xhr.status);
          })
    });

   
    $('.decline').click(function (e) { 
        e.preventDefault();
        let itemReference = $(this)
   
        $.ajax({
          url: 'php/admin-update-deduction.php',
          type: 'POST',
          dataType: 'JSON',
          data: {
             status: "Declined",
             id : itemReference.attr('data-id'),
             amount : 0
           }
         })
         .done(function(data) {
            $.map(data, function(val, index) {
                switch (index) {
                  case 'success':
                    itemReference.parent().parent().siblings('.td-status').text('Declined')
                    itemReference.parent().parent().siblings('.td-amount').text('0')
                    itemReference.prop('disabled', true)
                    itemReference.siblings('.accept').prop('disabled', true)
                    break;
                }
              });
        })
        .fail(function(xhr) {
            console.log("error" + xhr.responseText + xhr.status);
          })
    });
    
});