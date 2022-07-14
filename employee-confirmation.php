<?php
   session_start();
   if (isset($_SESSION['employeeid'])) {
     header("Location: /AMK/employee-panel");
   }
   if (!isset($_SESSION['tempemployeeid'])  ) {
      header("Location: /AMK/employee-login");
  
   }else {
    if($_SESSION['tempemployeeid'] == -1) {
        header("Location: /AMK/employee-panel");
    }
   }
include "php/global/head-tag.php";

?>
<script src="js/employee-confirmation.js"></script>

<!-- Custom styles for this page -->
<link href="css/confirmation.css" rel="stylesheet">
</head>
<!-- =============== END HEAD TAG ========== -->

<body class="text-center">

    <main class="form-signin w-100 m-auto form">
        <form id="confirmationAjax">
            <img class="mb-4" src="http://cdn.onlinewebfonts.com/svg/img_363538.png" alt="" width="102">
            <h1 class="h3 mb-3 fw-normal">Identity Confimation</h1>

      
                <div class="form-floating"> 
                    <input type="text" class="form-control key" id="floatingInput" placeholder="0162cf0t93of0r2t" maxlength="15">
                    <label for="floatingInput"> Enter your given generated unique key</label>
                </div>

                <img class="mt-4 mb-2" src=" http://www.learningsuccessblog.com/files/0aainput-black.gif" alt="" width="202">
               
                <div class="form-floating">
                    <input type="password" class="form-control captcha" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Type characters shown above</label>
                </div>
                <h5 id="error"></h5>
            <button class="w-50 btn btn-lg btn-primary" type="submit">Authenticate</button>

        </form>
    </main>


</body>

</html>