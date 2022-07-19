<!--  ADMIN PANEL -->
<?php
    session_start();
    if (!isset($_SESSION['employeeid'])) {
      header("Location: /AMK/employee-login");
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

        <?php include_once "php/global/sidebar2.php"?>

        <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                <h3 class="me-4">Request Status</h3>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                      class="btn btn-outline-success" id="request" style="position: absolute; margin-top: -50px;  margin-left: 80%;" >Request</button>
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
                <th scope="col">Type of Request</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Reason</th>
                <th scope="col">Status</th>
                <th scope="col">Date Requested</th>
                </tr>
            </thead>
            <tbody>
            <tbody class="table-group-divider">
                <?php 
              require_once "php/config/config.php";
              $sql ="SELECT 
              *
              FROM deduction_tbl
              WHERE employee_id = '". $_SESSION['employeeid']."'
               ORDER BY date_requested DESC";

              $query = $dbh -> query($sql);
              $results=$query->fetchAll(PDO::FETCH_ASSOC);
              $rowcount=$query->rowCount();

              if ($rowcount > 0) {
                foreach ($results as $item) {
           ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['mode'])?></td>
                    <td><?php echo htmlspecialchars($item['start'])?></td>
                    <td><?php echo htmlspecialchars($item['until'])?></td>
                    <td><?php echo htmlspecialchars($item['reason'])?></td>
                    <th><?php echo htmlspecialchars($item['status'])?></th>
                    <td>
                    <?php
                      $date = date_create(htmlspecialchars($item['date_requested']));
                      $formattedDate = date_format($date, 'D M j-Y, g:i a');
                      echo $formattedDate;
                    ?>
                    </td>
                    </td>
                </tr>
                <?php          
                }
            }
            ?>
            </tbody>
            <caption class="ps-2">Number of request: <?php echo $rowcount; ?></caption>
        </table>
    </div>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Request Form</h5>
                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  
                    <div class="input-group mb-3">
                    <span class="input-group-text">Mode</span>
                        <select type="text" class="form-control mode" placeholder="Mode" aria-label="Mode"
                            aria-describedby="basic-addon1">
                            <option> </option>
                            <option value="Absent"> Absent</option>
                            <option value="Cash Advance"> CA</option>
                            <option value="Dayoff">Dayoff</option>
                            <option value="Leave"> Leave</option>
                          </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">From:</span>
                        <input type="date" class="form-control from" id="basic-url" aria-label="From" aria-describedby="basic-addon3">
                        </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">to:</span>
                        <input type="date" class="form-control to" id="basic-url" aria-label="To" aria-describedby="basic-addon3">
                    </div>

                    <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Reason</span>
                    <textarea class="form-control reason" aria-label="Reason"></textarea>
                
                    </div>

                    <h5 id="error"></h5>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add">Request</button>
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
  <script src="js/employee-request.js"></script>
  </html>   