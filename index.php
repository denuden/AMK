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

        <div class=" cont">
        <div class="w-100 bg-warning d-flex p-4 text-dark">
            <h3 class="me-4">Access Logs</h3>
        </div>
        <table class="table table-hover align-middle table-striped ">
            <thead class="table-warning">
                <tr>
                    <th scope="col">Account ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Username</th>
                    <th scope="col">Date Accessed</th>
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
              e.emp_username as username,
              a.date_accessed as date,
              a.employee_id
              FROM access_history_tbl a
              LEFT JOIN employee_tbl e on a.employee_id = e.id
               ORDER BY date DESC";

              $query = $dbh -> query($sql);
              $results=$query->fetchAll(PDO::FETCH_ASSOC);
              $rowcount=$query->rowCount();

              if ($rowcount > 0) {
                foreach ($results as $item) {
           ?>
                <tr>
                    <th scope="row"><?php echo htmlspecialchars($item['employee_id'])?></th>
                    <td><?php echo htmlspecialchars($item['firstname'])?></td>
                    <td><?php echo htmlspecialchars($item['lastname'])?></td>
                    <td><?php echo htmlspecialchars($item['phone'])?></td>
                    <td><?php echo htmlspecialchars($item['username'])?></td>
                    <td>
                    <?php
                      $date = date_create(htmlspecialchars($item['date']));
                      $formattedDate = date_format($date, 'D M j-Y, g:i a');
                      echo $formattedDate;
                    ?>
                
                </tr>
                <?php          
                }
            }
            ?>
            </tbody>
            <caption class="ps-2">Number of times access: <?php echo $rowcount; ?></caption>
        </table>
    </div>

  </body>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.bundle.min.js" integrity="sha512-ndrrR94PW3ckaAvvWrAzRi5JWjF71/Pw7TlSo6judANOFCmz0d+0YE+qIGamRRSnVzSvIyGs4BTtyFMm3MT/cg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/sidebar.js"></script>
  </html>   