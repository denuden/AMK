$(document).ready(function () {
  let captcha_arr = [];
  let ctr = 0;
  let id = -1;

  //load captcha
  $.ajax({
      url: 'php/captcha/load-captcha.php',
      dataType: 'JSON',
    })
    .done(function (data) {
      console.log(data);
      $.map(data, function (val, index) {
        switch (index) {
          case 'unavailable':
            $('#error').text(val);
            break;
          case 'success':
            $.map(val, function (captcha, index) {
              captcha_arr.push(captcha)
            })
            console.table(captcha_arr);
            setImage(ctr)
            break;
        }
      });
    })
    .fail(function (xhr) {
      console.log("error" + xhr.responseText + xhr.status);
    });


  $('.reload-captcha').click(function (e) {
    e.preventDefault();
    console.log(ctr);
    if (ctr == 24) {
      ctr = 0;
    } else {
      ctr++
    }
    setImage(ctr)
  });



  $('.form').on('submit', '#confirmationAjax', function (e) {
    e.preventDefault();

    $.ajax({
        url: 'php/employee-confirmation-inc.php',
        method: 'POST',
        dataType: 'JSON',
        data: {
          key: $(".key").val(),
          captcha: $(".captcha").val(),
          captchaid: id
        },
      })
      .done(function (data) {
        $.map(data, function (val, index) {
          switch (index) {
            case 'nouser':
              $('#error').text(val);
              break;
            case 'keyerror':
              $('#error').text(val);
              break;
            case 'captchaerror':
              $('#error').text(val);
              break;
            case 'success':
              window.location.replace('employee-panel');
              break;
          }
        });
      })
      .fail(function (xhr) {
        console.log("error" + xhr.responseText + xhr.status);
      });
  });



  function setImage(ctr) {
    //set id
    id = captcha_arr[ctr].id
    $('.image').attr('src', "images/captcha/" + captcha_arr[ctr].image)
  }

});