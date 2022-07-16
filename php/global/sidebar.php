<?php 
//get current page name
     $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
?>

<head>

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
      
 
       <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
               <div class="navbar-wrapper">
                   <div class="navbar-logo">
                       <a class="mobile-menu" id="mobile-collapse" href="#!">
                           <i class="ti-menu"></i>
                       </a>
                       <div class="mobile-search">
                           <div class="header-search">
                               <div class="main-search morphsearch-search">
                                   <div class="input-group">
                                       <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                       <input type="text" class="form-control" placeholder="Enter Keyword">
                                       <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <a href="/AMK">AMK Digital Payroll</a>
                        
                       <a class="mobile-options">
                           <i class="ti-more"></i>
                       </a>
                   </div>

                   <div class="navbar-container container-fluid">
                       <ul class="nav-left">
                           <li>
                               <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                           </li>
                       </ul>
                       <ul class="nav-right">
                           <li>
                               <a>  
                                   <span style="margin-right: 400px">Amk Variety Store</span>
                               </a>
                           </li>
                           <li class="user-profile header-notification">
                               <a href="#">
                             
                               <img src="https://static.vecteezy.com/system/resources/previews/002/275/847/original/male-avatar-profile-icon-of-smiling-caucasian-man-vector.jpg" alt="" width="40" height="40" class="rounded-circle me-2">
                                 <strong>Admin</strong>
                                   <i class="ti-angle-down"></i>
                               </a>

                               <ul class="show-notification profile-notification">
                                   <li>
                                       <a href="php/logout.php">
                                <li><a class="dropdown-item" style="padding-top:5px;" id="printableArea"  onclick="printDiv('printableArea')"  href="#" >Key: <?php echo $_SESSION['key'];?></a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="php/logout">Sign out</a></li>
                                   </a>

                                   </li>
                               </ul>
                           </li>
                       </ul>
                   </div>
                   </div>
               </div>
           </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation"></div>
                            <ul class="pcoded-item pcoded-left-item">

                                           
                                  
                            <?php if ($curPageName == "index.php"){ ?>
                                <li class="active">
                                    <?php } else { ?>  
                                        <li>
                                        <?php } ?>
                       
        
                                <a href="/AMK" class="nav-link link-dark" aria-current="page">
                                        
                                        <span class="pcoded-micon"><i class="fa-solid fa-house"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Panel</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">

                            <?php if ($curPageName == "admin-payroll-manage.php"){ ?>
                                <li class="active">
                                    <?php } else { ?>  
                                        <li>
                                        <?php } ?>
                       

                                <a href="/AMK/admin-payroll-manage" class="nav-link link-dark" aria-current="page">
                            
                                            <span class="pcoded-micon"><i class="fa-solid fa-money-check-dollar"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Payroll</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>

                                        
                            <?php if ($curPageName == "admin-allowance-manage.php"){ ?>
                                <li class="active">
                                    <?php } else { ?>  
                                        <li>
                                        <?php } ?>
                       
                                    <a href="/AMK/admin-allowance-manage" class="nav-link link-dark" aria-current="page">
                           
                                            <span class="pcoded-micon"><i class="fa-solid fa-coins"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main"> Allowance</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>


                                    <?php if ($curPageName == "admin-deduction-manage.php"){ ?>
                                <li class="active">
                                    <?php } else { ?>  
                                        <li>
                                        <?php } ?>
                    
                                            <a href="/AMK/admin-deduction-manage" class="nav-link link-dark" aria-current="page">
                                    
                                            <span class="pcoded-micon"><i class="fa-solid fa-hand-holding-dollar"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Deduction</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                       
                                  
                                    <?php if ($curPageName == "admin-employee-manage.php"){ ?>
                                <li class="active">
                                    <?php } else { ?>  
                                        <li>
                                        <?php } ?>


                            
                                            <a href="/AMK/admin-employee-manage" class="nav-link link-dark" aria-current="page">
                                 

                                                <span class="pcoded-micon"><i class="fa-solid fa-user-tie"></i><b>D</b></span>
                                                <span class="pcoded-mtext" data-i18n="nav.dash.main">Employee</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>  
                                                                        </ul>
                                 
  </nav>
 