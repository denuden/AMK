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
  </head>
    <!-- =============== END HEAD TAG ========== -->

  <body class="text-center">
    
<main class="form-signin w-100 m-auto formE">
  <form id="employeeAjax">
    <img class="mb-4" src="images/logo.png" alt="" width="102">
    <h1 class="h3 mb-3 fw-normal">Please sign in | Employee</h1>

    <div class="form-floating">
      <input type="text" class="form-control usnE" id="floatingInput" placeholder="Username" required>
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control pwdE" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>
    <h5 id="error"></h5>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <a href="admin-login" class="w-100 btn mt-1 btn-lg btn-outline-info" type="button">Admin</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2020 - 2022</p>
  </form>
</main>


  </body>
</html>
