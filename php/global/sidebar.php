
<?php 
//get current page name
     $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
?>

<div class="d-flex flex-nowrap fixed-top sidebar">
  <h1 class="visually-hidden">Sidebars examples</h1>

  <div class="b-example-divider b-example-vr"></div>

  <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
    <i class="fa-brands fa-bootstrap" style="font-size: 42px;"></i>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <?php if ($curPageName == "index.php"){ ?>
            <a href="/AMK" class="nav-link active" aria-current="page">
        <?php } else { ?>
            <a href="/AMK" class="nav-link link-dark" aria-current="page">
        <?php } ?>
        <i class="fa-solid fa-house"></i>
          Panel
        </a>
      </li>
      <li>
      <?php if ($curPageName == "admin-payroll-manage.php"){ ?>
            <a href="/AMK" class="nav-link active" aria-current="page">
        <?php } else { ?>
            <a href="/AMK" class="nav-link link-dark" aria-current="page">
        <?php } ?>
        <i class="fa-solid fa-money-check-dollar"></i>
          Payroll 
        </a>
      </li>
      <li>
      <?php if ($curPageName == "admin-allowance-manage.php"){ ?>
            <a href="/AMK" class="nav-link active" aria-current="page">
        <?php } else { ?>
            <a href="/AMK" class="nav-link link-dark" aria-current="page">
        <?php } ?>
        <i class="fa-solid fa-coins"></i>
          Allowance
        </a>
      </li>
      <li>
      <?php if ($curPageName == "admin-deduction-manage.php"){ ?>
            <a href="/AMK" class="nav-link active" aria-current="page">
        <?php } else { ?>
            <a href="/AMK" class="nav-link link-dark" aria-current="page">
        <?php } ?>
        <i class="fa-solid fa-hand-holding-dollar"></i>
          Deduction
        </a>
      </li>
      <li>
      <?php if ($curPageName == "admin-employee-manage.php"){ ?>
            <a href="/AMK/admin-employee-manage" class="nav-link active" aria-current="page">
        <?php } else { ?>
            <a href="/AMK/admin-employee-manage" class="nav-link link-dark" aria-current="page">
        <?php } ?>
        <i class="fa-solid fa-user-tie"></i>
          Employee
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://static.vecteezy.com/system/resources/previews/002/275/847/original/male-avatar-profile-icon-of-smiling-caucasian-man-vector.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>Admin</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="#">Key: <?php echo $_SESSION['key'];?></a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><a class="dropdown-item" href="php/logout">Sign out</a></li>
      </ul>
    </div>
  </div>
</div>