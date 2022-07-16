<?php
   session_start();
   if (isset($_SESSION['adminid'])) {
    header("Location: /AMK");
  }
   if (isset($_SESSION['employeeid'])) {
     header("Location: /AMK/employee-panel");
   }
   if (isset($_SESSION['tempemployeeid'])  ) {
    if ($_SESSION['tempemployeeid'] != -1) {
        header("Location: /AMK/employee-confirmation");
    }
   }


   if (isset($_SESSION['tempadminid'])  ) {
    header("Location: /AMK/admin-confirmation");
   }
    include "php/global/head-tag.php";
?>
    <script src="js/login.js"></script>
    
    <!-- Custom styles for this page -->
    <link href="css/login.css" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

  </head>
    <!-- =============== END HEAD TAG ========== -->

    <body class="text-center">
    
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">

    <main class="form-signin w-100 m-auto formE">
    <form id="employeeAjax"  class="md-float-material">

            <div class="auth-box">
            <div class="row m-b-20">
            <div class="col-md-12">
            <img class="mb-4 amklogo" src="images/logo.png" alt="" width="70">
            <h3 class="text-left txt-primary">Please sign in | Employee</h3>
                    </div>
                    </div>
              <hr>          
    <!-- <img class="mb-4" src="images/logo.png" alt="" width="102">
    <h1 class="h3 mb-3 fw-normal">Please sign in | Admin</h1> -->

               <div class="input-group">
                <input type="text" class="form-control usnE" id="floatingInput"     placeholder="Username" >          
                <span class="md-line"></span>
                </div>
                <div class="input-group">
                <input type="password" class="form-control pwdE" id="floatingPassword"  placeholder="Password" id="myInput" >
                <span class="md-line"></span>
                </div>

    <h5 id="error"></h5>
    <button class="w-100 btn btn-primary" type="submit">Sign in</button>
    <a href="admin-login" class="w-100 btn mt-1  btn-outline-info" type="button">Admin</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2020 - 2022</p>
    <section>
  </form>
</main>


 <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>
    <script type="text/javascript" src="assets/js/common-pages.js"></script>

  </body>
</html>
