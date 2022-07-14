<!--  ADMIN PANEL -->
<?php
    session_start();
    if (!isset($_SESSION['employeeid'])) {
      header("Location: /AMK/employee-login");
    }

    include "php/global/head-tag.php";
?>
    
    <!-- Custom styles for this template -->
    <link href="css/employee-panel.css" rel="stylesheet">
  </head>
  <body>

        <div class="container cont" >
            <h1>UNIQUE KEY : <?php echo htmlspecialchars($_SESSION['key']);?></h1>
        </div>
        <li><a class="btn btn-primary" href="php/logout">Sign out</a></li>

  </body>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.bundle.min.js" integrity="sha512-ndrrR94PW3ckaAvvWrAzRi5JWjF71/Pw7TlSo6judANOFCmz0d+0YE+qIGamRRSnVzSvIyGs4BTtyFMm3MT/cg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/sidebar.js"></script>
  </html>   