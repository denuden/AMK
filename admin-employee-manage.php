<!--  ADMIN PANEL -->
<?php
      session_start();
      if (!isset($_SESSION['adminid'])) {
        header("Location: /AMK/admin-login");
      }
    include "php/global/head-tag.php";
    require_once 'php/config/config.php';
?>

<!-- Custom styles for this template -->
<link href="css/admin-employee-manage.css" rel="stylesheet">
</head>

<body>
    <!--  SIDE BAR -->

    <?php include_once "php/global/sidebar.php"?>

    <div class=" cont">
        <div class="w-100 bg-light d-flex p-4 text-dark">
            <h3 class="me-4">Employee Details</h3>
            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                class="btn btn-outline-success ms-4" id="addEmployee">Add new employee</button>
        </div>
        <table class="table table-hover align-middle table-striped ">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Address</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <tbody class="table-group-divider" style="border-top-color:#7a1c77;">
                <?php 
              $sql ="SELECT * FROM employee_tbl";
              $query = $dbh -> query($sql);
              $results=$query->fetchAll(PDO::FETCH_ASSOC);
              $rowcount=$query->rowCount();

              if ($rowcount > 0) {
                foreach ($results as $item) {
           ?>
                <tr>
                    <th scope="row"><?php echo htmlspecialchars($item['id'])?></th>
                    <td><?php echo htmlspecialchars($item['firstname'])?></td>
                    <td><?php echo htmlspecialchars($item['lastname'])?></td>
                    <td><?php echo htmlspecialchars($item['phone'])?></td>
                    <td><?php echo htmlspecialchars($item['age'])?></td>
                    <td><?php echo htmlspecialchars($item['gender'])?></td>
                    <td><?php echo htmlspecialchars($item['address'])?></td>
                    <td>
                        <div class="d-flex justify-content-evenly w-100">
                            <i class="fa-solid fa-pen edit pointer"
                             data-bs-toggle="modal" data-bs-target="#staticBackdrop" 
                             data-id = "<?php echo htmlspecialchars($item['id'])?>"
                             style="font-size: 22px;"></i>
                            <i class="fa-solid fa-trash delete pointer" style="font-size: 22px;"></i>
                        </div>
                    </td>
                </tr>
                <?php          
                }
            }
            ?>
            </tbody>
            <caption class="ps-2">List of active employees: <?php echo $rowcount; ?></caption>
        </table>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Employee Details</h5>
                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control firstname" placeholder="First Name" aria-label="First Name"
                            aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control lastname" placeholder="Last Name"
                            aria-label="Last Name" aria-describedby="basic-addon2">
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control phone" id="basic-url" placeholder="Phone" aria-label="Phone" aria-describedby="basic-addon3">
                    </div>


                    <div class="input-group mb-3">
                        <input type="number" class="form-control age" placeholder="Age" aria-label="Age" maxlength="3"
                        onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;" >
                        <span class="input-group-text"> </span>
                        <input type="text" class="form-control gender" placeholder="Gender" aria-label="Gender">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Address</span>
                        <textarea class="form-control address" aria-label="Address"></textarea>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control usn" placeholder="Username"
                            aria-label="username" aria-describedby="basic-addon2" maxlength="25">
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control pass" placeholder="Password"
                            aria-label="Password" aria-describedby="basic-addon2">
                    </div>

                    <h5 id="error"></h5>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add">Add Employee</button>
                    <button type="button" class="btn btn-primary" id="update">Update Employee</button>
                </div>
            </div>
        </div>
    </div>



</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.bundle.min.js"
    integrity="sha512-ndrrR94PW3ckaAvvWrAzRi5JWjF71/Pw7TlSo6judANOFCmz0d+0YE+qIGamRRSnVzSvIyGs4BTtyFMm3MT/cg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/sidebar.js"></script>
<script src="js/employee-manage.js"></script>

</html>