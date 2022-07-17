<!--  ADMIN PANEL -->
<?php
    session_start();
    if (!isset($_SESSION['adminid'])) {
      header("Location: /AMK/admin-login");
    }

    include "php/global/head-tag.php";
?>
    
    <!-- Custom styles for this template -->
    <link href="css/admin-employee-manage.css" rel="stylesheet">


    <title>AMK Digital Payroll System </title>
   
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <!-- Favicon icon -->
      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
	  <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">


  </head>
  <body>
    <!--  SIDE BAR -->

        <?php include_once "php/global/sidebar.php"?>

        <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                <h3 class="me-4">Allowance Status</h3>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                      class="btn btn-outline-success" id="addAllowance" style="position: absolute; margin-top: -50px;  margin-left: 80%;" >Add Allowance</button>
                                    <div class="page-body">
                                      <div class="row">

                   <!-- tabs card start -->
                   <div class="col-sm-12">
                    <div class="card tabs-card">
                        <div class="card-block p-0">
                            <!-- Nav tabs -->
                      
                            <!-- Tab panes -->
                            <div class="tab-content card-block">
                                <div class="tab-pane active" id="home3" role="tabpanel">
                                    <br>
                                <div class="table-responsive">
                                        <table id="tb" class="table">
                <tr>
                    <th scope="col">Position</th>
                    <th scope="col">Salary (semi-monthly)</th>
                    <th scope="col">Allowance (per semi-monthly)</th>
                    <th scope="col">Action</th>
                    <th scope="col"></th>
          
                </tr>
            </thead>
            <tbody>
            <tbody class="table-group-divider">
                <?php 
              require_once "php/config/config.php";
              $sql ="SELECT 
              *
              FROM allowance_tbl
               ORDER BY id DESC";

              $query = $dbh -> query($sql);
              $results=$query->fetchAll(PDO::FETCH_ASSOC);
              $rowcount=$query->rowCount();

              if ($rowcount > 0) {
                foreach ($results as $item) {
           ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['position'])?></td>
                    <td><?php echo htmlspecialchars($item['salary'])?></td>
                    <td><?php echo htmlspecialchars($item['allowance'])?></td>
                    <td>
                        <div class="d-flex justify-content-evenly w-100">
                            <i class="fa-solid fa-pen edit pointer"
                             data-bs-toggle="modal" data-bs-target="#staticBackdrop" 
                             data-id = "<?php echo htmlspecialchars($item['id'])?>"
                             style="font-size: 22px;"></i>
                            <a class="fa-solid fa-trash delete pointer" style="font-size: 22px;"
                            href="php/delete-allowance/delete-allowance-confirmation.php?id=<?php echo htmlspecialchars($item['id'])?>"></a>
                        </div>
                    </td>
                </tr>
                <?php          
                }
            }
            ?>
            </tbody>
            <caption class="ps-2">Number of allowances: <?php echo $rowcount; ?></caption>
        </table>
    </div>





<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Allowance Details</h5>
                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  
                    <div class="input-group mb-3">
                        <input type="text" class="form-control position" placeholder="Position" aria-label="Position"
                            aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <input  type="number" class="form-control salary" placeholder="Salary per semi-monthly" aria-label="Salary">
                    </div>

                    <div class="input-group mb-3">
                        <input type="number" class="form-control allowance" id="basic-url" placeholder="Allowance per semi-monthly" aria-label="Allowance" aria-describedby="basic-addon3">
                    </div>

                    <h5 id="error"></h5>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add">Add Allowance</button>
                    <button type="button" class="btn btn-primary" id="update">Update Allowance</button>
                </div>
            </div>
        </div>
    </div>







  </body>

<script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="assets/pages/widget/amchart/amcharts.min.js"></script>
<script src="assets/pages/widget/amchart/serial.min.js"></script>
<!-- Chart js -->
<script type="text/javascript" src="assets/js/chart.js/Chart.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="assets/pages/todo/todo.js "></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.min.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript " src="assets/js/SmoothScroll.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/vartical-demo.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.bundle.min.js" integrity="sha512-ndrrR94PW3ckaAvvWrAzRi5JWjF71/Pw7TlSo6judANOFCmz0d+0YE+qIGamRRSnVzSvIyGs4BTtyFMm3MT/cg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/sidebar.js"></script>
  <script src="js/allowance-manage.js"></script>
  </html>   