$(document).ready(function () {

    let total_deduction = 0
    let total_salary = 0
    let employeeid = -1;    

    // ON EMPLOYEE CAHNGE
    $('.modal-body').on('change','.employee',function(){
        let itemReference = $(this)
        let employee_salary = 0
        total_salary = 0
        total_deduction = 0
        employeeid = itemReference.find(':selected').attr('data-id')

        $.ajax({
            url: 'php/list-all-employee?id='+employeeid,
            dataType: 'JSON',
          })
          .done(function(data) {
            $.map(data, function(val, index) {
              switch (index) {
                case 'unavailable':
                    $('#error').text(val);
                  break;
                case 'success':
                    $('#error').text("")
                    employee_salary = val.salary
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


          // DEDUCTIONS GET BY EMPLOYEE ID
          $.ajax({
            url: 'php/list-all-deduction?id='+employeeid,
            dataType: 'JSON',
          })
          .done(function(data) {

            $('.deductions').html('')
            $('.deductions').append('<li class="list-group-item bg-primary text-white deduction-head">Deductions : None</li>' )

            $('.total-salary').html('')

            $.map(data, function(val, index) {
              switch (index) {
                case 'unavailable':
                    $('#error').text(val);
                  break;
                case 'success':
                   $('#error').text("")
                    // loop all deductions
                    $.map(val, function(val, index) {
                        console.log(val);
                        total_deduction+= parseInt(val.deduction)
                         $('.deductions').append(
                         '<li class="list-group-item">'+ val.mode + ' : ₱ ' + val.deduction +
                         '</li>' +
                         '</li>');
                    })
                    $('.deduction-head').text('Deductions');
                        
                total_salary = parseInt(employee_salary) - parseInt(total_deduction)
                if(parseInt(total_salary) < 0){
                    total_salary = "-Negative"
                }

                $('.deductions').append('<li class=" list-group-item ps-2">Total Deduction Amount: ' + ': ₱ ' + total_deduction)
      
                $('.total-salary').append(
                '<li class="list-group-item bg-success text-white fw-bold">Total Salary: ₱ '+
                total_salary + 
                '</li>')
    
                  break;
              }
            });
          })
          .fail(function(xhr) {
            console.log("error" + xhr.responseText + xhr.status);
          });
   });



   // RELEASE PAYROLL
   $('#release').click(function (e) { 
    e.preventDefault();
    $.ajax({
            url: 'php/add-payroll?id='+employeeid,
            type: 'POST',
            dataType: 'JSON',
            data : {
                start : $('.start').val(),
                until : $('.until').val(),
                total_salary : total_salary,
                total_deduction : total_deduction,
            },
            dataType: 'JSON',
          })
          .done(function(data) {
            console.log(data);
            $.map(data, function(val, index) {
              switch (index) {
                case 'unavailable':
                    $('#error').text(val);
                  break;
                case 'success':
                  $('#error').text("")
                    window.location.reload();
                  break;
                case 'emptyfields' :
                    $('#error').text(val);
              }
            });
          })
          .fail(function(xhr) {
            console.log("error" + xhr.responseText + xhr.status);
          });
   });
});