<!--  ADMIN PANEL -->
<?php
    session_start();
    if (!isset($_SESSION['adminid'])) {
      header("Location: /AMK/admin-login");
    }

    include "php/global/head-tag.php";
?>
    
    <!-- Custom styles for this template -->
    <link href="css/admin-panel.css" rel="stylesheet">
  </head>
  <body>
    <!--  SIDE BAR -->

        <?php include_once "php/global/sidebar.php"?>

        <div class="container cont" >
            <h1>nakalagay dito ung login history na table siaka transaction historyfwe we we aew aew ewewgewgewg</h1>
        </div>

  </body>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.bundle.min.js" integrity="sha512-ndrrR94PW3ckaAvvWrAzRi5JWjF71/Pw7TlSo6judANOFCmz0d+0YE+qIGamRRSnVzSvIyGs4BTtyFMm3MT/cg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/sidebar.js"></script>
  </html>   