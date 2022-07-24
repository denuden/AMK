<?php
   session_start();
   if (isset($_SESSION['adminid'])) {
     header("Location: /AMK");
   }
   if (!isset($_SESSION['tempadminid'])  ) {
      header("Location: /AMK/admin-login");
  
   }else {
    if($_SESSION['tempadminid'] == -1) {
        header("Location: /AMK");
    }
   }
include "php/global/head-tag.php";

?>
<script src="js/admin-confirmation.js"></script>

<!-- Custom styles for this page -->
<link href="css/confirmation.css" rel="stylesheet">
</head>
<!-- =============== END HEAD TAG ========== -->

<body class="text-center">

    <main class="form-signin w-100 m-auto form">
        <form id="confirmationAjax">
            <img class="mb-4 " src="http://cdn.onlinewebfonts.com/svg/img_363538.png" alt="" width="102">
            <h1 class="h3 mb-3 fw-normal">Identity Confimation</h1>

      
                <div class="form-floating"> 
                    <input type="text" class="form-control key" id="floatingInput" placeholder="0162cf0t93of0r2t" maxlength="15">
                    <label for="floatingInput"> Enter your given generated unique key</label>
                </div>

              
                <img class="mt-4 mb-2 image"  alt="" width="340">
                <button type="button" class="btn btn-warning mt-3 reload-captcha"><i class="fa-solid fa-arrows-rotate"></i></button>
            
                    <div class="form-floating">
                        <input type="number" class="form-control captcha" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Type characters shown above</label>
                    </div>

            
                <h5 id="error"></h5>
            <button class="w-50 btn btn-lg btn-primary" type="submit">Authenticate</button>

        </form>
    </main>


</body>

</html>