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

   

          <div class="d-flex justify-content-between mb-2">
             <h3 class="me-4">Payroll</h3>
            <div class="d-flex">
              <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline-success me-2"
              id="addEmployee">Add Payroll</button>
              <button type="button" onclick="printTable('tablePrintArea')"  class="btn btn-info">Print</button>
            </div>
          </div>

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
                        <div class="table-responsive" id="tablePrintArea">
                          <table id="tb" class="table"   >
                            <tr>
                              <th scope="col">Full Name</th>
                              <th scope="col">Position</th>
                              <th scope="col">Salary</th>
                              <th scope="col">Allowance Amount</th>
                              <th scope="col">Deductions</th>
                              <th scope="col">Total Deduction Amount</th>
                              <th scope="col">Total Salary </th>
                              <th scope="col">Date Range</th>
                              <th scope="col">Date Payroll Released</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tbody class="table-group-divider">
                              <?php 
              require_once "php/config/config.php";
              $sql ="SELECT 
                *
              FROM payroll_tbl 
               ORDER BY date_released DESC";

              $query = $dbh -> query($sql);
              $results=$query->fetchAll(PDO::FETCH_ASSOC);
              $rowcount=$query->rowCount();

              if ($rowcount > 0) {
                foreach ($results as $item) {
           ?>
                              <tr>
                                <th scope="row">
                                <i class="fa-solid fa-print printIndiv" 
                                data-id="<?php echo htmlspecialchars($item['id'])?>" 
                                style="font-size: 22px; cursor:pointer;"></i>  
                                <?php echo htmlspecialchars($item['fullname'])?></th>
                                <td><?php echo htmlspecialchars($item['position'])?></td>
                                <td>₱ <?php echo htmlspecialchars($item['salary'])?></td>
                                <td>₱ <?php echo htmlspecialchars($item['allowance_amount'])?></td>

                                <td>
                                  <ul class="list-group list-group-flush">
                                    <?php 
                               foreach (json_decode($item['deductions']) as $row) {
                         ?>
                                    <li class="list-group-item">
                                      <?php echo htmlspecialchars($row->mode . ': ₱' . $row->deduction)?></li>
                                    <?php } ?>


                                  </ul>
                                </td>

                                <td>₱ <?php echo htmlspecialchars($item['total_deduction_amount'])?></td>
                                <td>₱ <?php echo htmlspecialchars($item['total_salary'])?></td>
                                <td><?php echo htmlspecialchars($item['start'] . ' to ' . $item['until'])?></td>
                                <td>
                                  <?php
                                    $date = date_create(htmlspecialchars($item['date_released']));
                                    $formattedDate = date_format($date, 'D M j-Y, g:i a');
                                    echo $formattedDate;
                                  ?>
                                        </td>
                                      
                              </tr>
                              <?php          
                }
            }
            ?>
                            </tbody>
                            <caption class="ps-2">Number of payroll processed: <?php echo $rowcount; ?></caption>
                          </table>
                        </div>





                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                          tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Payroll Details</h5>
                                <button type="button" class="btn-close close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">


                                <?php 
              require_once "php/config/config.php";

              $sql ="SELECT * FROM employee_tbl";
              $query = $dbh -> query($sql);
              $results=$query->fetchAll(PDO::FETCH_ASSOC);
              $rowcount=$query->rowCount();
                ?>
                                <div class="input-group mb-3">
                                  <span class="input-group-text">Employee</span>
                                  <select type="text" class="form-control employee" placeholder="Employee"
                                    aria-label="Employee">
                                    <option> </option>
                                    <?php if ($rowcount > 0) {
                             foreach ($results as $item) {
                    ?>
                                    <option data-id="<?php echo htmlspecialchars($item['id'])?>"
                                      value="<?php echo htmlspecialchars($item['firstname'] . " " . $item['lastname'])?>">
                                      <?php echo htmlspecialchars($item['firstname'] . "s " . $item['lastname'])?>
                                    </option>
                                    <?php }} ?>
                                  </select>
                                </div>




                                <div class="input-group mb-3">
                                  <span class="input-group-text">Position</span>
                                  <input readonly type="text" class="form-control position" placeholder="Position"
                                    aria-label="Position" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                  <span class="input-group-text">Salary ₱</span>
                                  <input readonly type="text" class="form-control salary" placeholder="Salary"
                                    aria-label="Salary" aria-describedby="basic-addon2">
                                </div>



                                <div class="input-group mb-3">
                                  <span class="input-group-text">Allowance Amount ₱</span>
                                  <input readonly type="text" class="form-control allowance" id="basic-url"
                                    placeholder="Allowance Amount" aria-label="Allowance Amount"
                                    aria-describedby="basic-addon3">
                                </div>


                                <ul class="list-group mb-3 deductions">
                                  <!--  FROM JAVASCRIPT  -->
                                </ul>


                                <div class="input-group mb-3">
                                  <span class="input-group-text">* From:</span>
                                  <input type="date" class="form-control start" id="basic-url" aria-label="From"
                                    aria-describedby="basic-addon3">
                                </div>

                                <div class="input-group mb-3">
                                  <span class="input-group-text">* to:</span>
                                  <input type="date" class="form-control until" id="basic-url" aria-label="To"
                                    aria-describedby="basic-addon3">
                                </div>

                                <ul class="list-group mb-3 total-salary">
                                  <!--  FROM JAVASCRIPT  -->
                                </ul>

                                <h5 id="error"></h5>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary close"
                                  data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="release">Release Payroll</button>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.bundle.min.js"
  integrity="sha512-ndrrR94PW3ckaAvvWrAzRi5JWjF71/Pw7TlSo6judANOFCmz0d+0YE+qIGamRRSnVzSvIyGs4BTtyFMm3MT/cg=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/sidebar.js"></script>
<script src="js/tablePrint.js"></script>
<script src="js/admin-payroll-manage.js"></script>

</html>