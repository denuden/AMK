<!--  ADMIN PANEL -->
<?php
    session_start();
    if (!isset($_SESSION['employeeid'])) {
      header("Location: /AMK/employee-login");
    }

    include "php/global/head-tag.php";   
?>
 
    <?php include_once "php/global/sidebar2.php"?>

    <!-- Custom styles for this template -->
    <link href="css/employee-panel.css" rel="stylesheet">


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
    

  <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                <h3 class="me-4">Payroll Status</h3>
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
                    <th scope="col">Employee</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Deduction Description</th>
                    <th scope="col">Allowance</th>
                    <th scope="col">Deduction Amount</th>
                    <th scope="col">Total Salary</th>
                </tr>
            </thead>
            <tbody>
            <tbody class="table-group-divider">
             <?php 
              require_once "php/config/config.php";

              $sql ="SELECT 
              e.firstname as firstname,
              e.lastname as lastname,
              e.phone as phone,
              e.position as position,
              e.salary as salary,
              e.allowance as allowance,
              e.emp_username as username,
              a.deductions as deductions,
              a.total_deduction_amount as total_deduction_amount,
              a.total_salary as total_salary,
              a.employee_id
              FROM payroll_tbl a
              LEFT JOIN employee_tbl e on a.employee_id = e.id 
               WHERE employee_id = '". $_SESSION['employeeid']."'
               ORDER BY employee_id DESC"; 

              $query = $dbh -> query($sql);
              $results=$query->fetchAll(PDO::FETCH_ASSOC);
              $rowcount=$query->rowCount();

              if ($rowcount > 0) {
                foreach ($results as $item) {
           ?> 
                <tr>
                    <td><?php echo htmlspecialchars($item['position'])?></td>
                    <td><?php echo htmlspecialchars($item['firstname'] ." ".$item['lastname'] ); ?></td>
                    <td><?php echo htmlspecialchars($item['salary'])?></td>
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

                    <td><?php echo htmlspecialchars($item['allowance'])?></td>  
                    <td><?php echo htmlspecialchars($item['total_deduction_amount'])?></td>  
                    <td><?php echo htmlspecialchars($item['total_salary'])?></td>   
                </tr>
           
                <?php          
             }} 
            ?>
            </tbody>
            <caption class="ps-2">Number of times access: <?php echo $rowcount; ?></caption>
        </table>
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

  </html>   