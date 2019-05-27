<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Panel</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/admindashboard.css">
        <link rel="stylesheet" href="assets/css/welcome.css">
        <script src="application/Resource/MyFiles/js/jquery.min.js"></script>
        <link href="application/Resource/MyFiles/calender.css" rel="stylesheet" type="text/css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="application/Resource/Angulrjs/angular.js" type="text/javascript"></script>
        <link href="application/Resource/MyFiles/myjs/allInOne.css" rel="stylesheet" type="text/css"/>
        <script src="application/Resource/JqueryUI/jquery-ui.js" type="text/javascript"></script>
        <script src="application/Resource/JqueryUI/jquery-ui.min.js" type="text/javascript"></script>
        <link href="application/Resource/JqueryUI/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/JqueryUI/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/JqueryUI/jquery-ui.structure.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/JqueryUI/jquery-ui.structure.min.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/JqueryUI/jquery-ui.theme.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/JqueryUI/jquery-ui.theme.min.css" rel="stylesheet" type="text/css"/>
        <!--My Css-->
        <link href="application/Resource/MyFiles/MyCss/colorList.css" rel="stylesheet" type="text/css"/>
        <script src="application/Resource/MyFiles/MyCss/table-edits.js" type="text/javascript"></script>
        <link href="application/Resource/MyFiles/MyCss/css3clock.css" rel="stylesheet" type="text/css"/>
        <!--     Font-->
        <!--    Home Page For -->
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link href="application/Resource/MyFiles/adminDashboard/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/MyFiles/adminDashboard/_all-skins.min.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/MyFiles/adminDashboard/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/MyFiles/adminDashboard/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/MyFiles/adminDashboard/daterangepicker.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/MyFiles/adminDashboard/ionicons.min.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/MyFiles/adminDashboard/jquery-jvectormap.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/MyFiles/adminDashboard/morris.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
        <link rel="hotel" href="Content/WebImages/DefulatImages/icon.ico">    
        <style>  

            .nav-tabs{
                background-color: #EC7C00;
            }
            .nav-tabs  li a{
                color: white;
            }
            .titleColor{
                color:white;
            }
            .imgDash{
                height: 100px;
            }
            .bottomShow{
                position: fixed;
                bottom: 0;
            }

            .scheduler-border {
                border: 2px groove #ddd !important;
                padding: 0 1.4em 1.4em 1.4em !important;
                margin: 0 0 1.5em 0 !important;
                -webkit-box-shadow: 0px 0px 0px 0px #000;
                box-shadow: 0px 0px 0px 0px #000;
            }

            .error1 {
                width:200px;
                height:20px;
                height:auto;
                position:absolute;
                z-index: 1;
                left:50%;
                margin-left:-100px;
                bottom:10px;
                background-color: #383838;
                color: #F0F0F0;
                font-family: Calibri;
                font-size: 20px;
                padding:10px;
                text-align:center;
                border-radius: 2px;
                -webkit-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
                -moz-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
                box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
            }
        </style>

        <style>
            .dashIcon{
                font-size: 50px;
            }

            .dashFont{
                font-size: 30px;
                color: white;   
                font-family: 'Bree Serif', serif; 
            }

            .pointerMouse{
                cursor: pointer;
            }

            .dashTi{
                color: white;   
            }

            #table-wrapper {
                position:relative;
            }

            #table-scroll {
                height:300px;
                overflow:auto;  
                margin-top:20px;
            }

            #table-wrapper table {
                width:100%;

            }   

            #table-wrapper table thead th .text {
                position:absolute;   
                top:-20px;
                z-index:2;
                height:20px;
                width:35%;
                border:1px solid red;
            }


            .rightBorder{
                border-right: 2px solid black;
            }


        </style>

        <script type="text/javascript">
            $(document).ready(function () {
<?php
$commentMess = $this->session->flashdata('adminBackEnd');
if ($commentMess == "AddVendor Done.") {
    ?>

                    $('.content').load("AdminAddVendor");
                    setTimeout(function () {
                        $('.error1').text('Data save.');
                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                    }, 300);

    <?php
} else if ($commentMess == "Add Purchase Done.") {
    ?>
                    $('.content').load("AdminAddPurchase");
                    setTimeout(function () {
                        $('.error1').text('Data save.');
                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                    }, 300);

    <?php
} else if ($commentMess == "Add Table Done.") {
    ?>
                    $('.content').load("AddTable");
                    setTimeout(function () {
                        $('.error1').text('Data save.');
                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                    }, 300);

    <?php
} else if ($commentMess == "Add Menu Done.") {
    ?>
                    $('.content').load("AddMenuAndSubmenu");
                    setTimeout(function () {
                        $('.error1').text('Data save.');
                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                    }, 300);

    <?php
} else if ($commentMess == "User Registation Done.") {
    ?>
                    $('.content').load("UserList");
                    setTimeout(function () {
                        $('.error1').text('User added.');
                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                    }, 300);

    <?php
} else if ($commentMess == "Add Exp Data.") {
    ?>
                    $('.content').load("AdminExpenditure");
                    setTimeout(function () {
                        $('.error1').text('Data save.');
                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                    }, 300);

    <?php
} else if ($commentMess == "MyProfile Image Upload.") {
    ?>
                    $('.content').load("MyProfile");
                    setTimeout(function () {
                        $('.error1').text('Profile Image Upload Done.');
                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                    }, 300);

    <?php
} else if ($commentMess == "Slider Add Done.") {
    ?>
                    $('.content').load("AdminAddSlider");
                    setTimeout(function () {
                        $('.error1').text('Image Upload Done.');
                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                    }, 300);

    <?php
} else if ($commentMess == "Qty Management Added.") {
    ?>
                    $('.content').load("BottleStockManagement");
                    setTimeout(function () {
                        $('.error1').text('Qty Management Added.');
                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                    }, 300);

    <?php
}
?>




            });
        </script>


    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class='error1' style="display: none"></div>
        <div class="wrapper">      
            <header class="main-header">
                <!-- Logo -->
                <a href="/Home" class="logo dashboard">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>Hotel Sameer</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Hotel Sameer </b>Panel</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu"><a href="Content/DeployFile/Hotel.apk">  
                                    <i class="fa fa-android"></i>
                                    <span class="label label-danger">New</span>
                                </a>
                            </li>

                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">10</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 10 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                                    page and may cause design problems
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-red"></i> 5 new members joined
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-user text-red"></i> You changed your username
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php foreach ($getUserData as $profileRow): ?>
                                        <?php echo '<img src="' . $profileRow['imagePath'] . '" class="user-image" alt="User Image" />'; ?>
                                        <span class="hidden-xs"> <?php
                                            echo $profileRow['fullName'];
                                            break;
                                            ?>
                                        </span>
                                    <?php endforeach; ?>
                                </a>
                            </li>
                            <li class="logout pointerMouse"><a><i class="fa fa-sign-out" aria-hidden="true"></i>  Logout</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="active pointerMouse" >
                            <a class="dashboard">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-list"></i>
                                <span>Master</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#" class="noteShow"><i class="fa fa-circle-o"></i>Note</a></li>
                                <li><a href="#" class="userList"><i class="fa fa-circle-o"></i>User List</a></li>
                                <li><a href="#" class="addVendor"><i class="fa fa-circle-o"></i>Add Vendor</a></li>
                                <li><a href="#" class="addTable"><i class="fa fa-circle-o"></i>Add Table</a></li>
                                <li><a href="#" class="addMenu"><i class="fa fa-circle-o"></i>Add Menu and Submenu</a></li>
                                <li><a href="#" class="bottleStockManagement"><i class="fa fa-circle-o"></i>Bottle Stock Qty Management</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="addSlider">
                                <i class="fa fa-picture-o" aria-hidden="true"></i> <span>Add Slider</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="userList">
                                <i class="fa fa-users" aria-hidden="true"></i> <span>User List</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="billing">
                                <i class="fa fa-money" aria-hidden="true"></i> <span>Billing</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="purchasePage">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Purchase</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="expenPage">
                                <i class="fa fa-file-text" aria-hidden="true"></i> <span>Expenditure</span>
                            </a>
                        </li>      
                        <li>
                            <a href="#" class="bottleStock">
                                <i class="fa fa-hdd-o" aria-hidden="true"></i> <span>Botteles Stock</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="myProfile">
                                <i class="fa fa-user" aria-hidden="true"></i> <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-yellow">4</small>
                                </span>
                            </a>
                        </li>

                        <li class="treeview">    
                            <a href="#">
                                <i class="fa fa-wrench"></i>
                                <span>Setting</span>  
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">   
                                <li><a  onClick="location.href = '/dataBaseBackUp/getBackup'"><i class="fa fa-circle-o"></i>Back Up</a></li>
                                <li><a href="#" class="userRegistation"><i class="fa fa-circle-o"></i>User Registation</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="logout">
                                <i class="fa fa-sign-out"></i> <span>Logout</span>
                            </a>
                        </li>
                        <li class="header" style="color: white;">Category</li>
                        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <section class="content">

                    <section class="countShow">
                        <div class="form-group">
                            <div class="col-md-2 rightBorder">
                                <i class="fa fa-users" aria-hidden="true"></i>Total Users
                                <h3 class="text-center"><?php echo $getTotalUserCount ?></h3>
                            </div> 
                            <div class="col-md-2 rightBorder">
                                <i class="fa fa-list" aria-hidden="true"></i>  Free Table
                                <h3 class="text-center"><?php echo $getTotalFreeTable ?></h3>
                            </div>
                            <div class="col-md-2 rightBorder">   
                                <i class="fa fa-list" aria-hidden="true"></i>  Booking Table
                                <h3 class="text-center"><?php echo $getTotalBookingTable ?></h3>
                            </div>
                            <div class="col-md-2 rightBorder">
                                <i class="fa fa-money" aria-hidden="true"></i>  Today Income
                                <h3 class="text-center">Rs. <?php echo $getTotalTodayAmount ?></h3>  
                            </div>
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">

                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </section>


                   



                    <div class="form-group">  
                        <div class="col-md-3 col-sm-6 col-xs-6 col-lg-3 pointerMouse">
                            <div class="panel panel-primary addSlider">
                                <div class="panel-body bg-red"> 
                                    <i class="fa fa-picture-o  pull-right dashIcon" aria-hidden="true"></i>
                                    <div class="pull-left">
                                        <big class="dashFont"><?php echo ' ' ?></big> <br/> 
                                        <span class="dashTi">Add Slider</span></div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-lg-3 pointerMouse">
                            <div class="panel panel-primary userList">
                                <div class="panel-body bg-AcidGreen"> 
                                    <i class="fa fa-users pull-right dashIcon" aria-hidden="true"></i>
                                    <div class="pull-left">
                                        <big class="dashFont"><?php echo ' ' ?></big> <br/> 
                                        <span class="dashTi">User List</span></div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-lg-3 pointerMouse">
                            <div class="panel panel-primary billing">
                                <div class="panel-body bg-Aero">
                                    <i class="fa fa-money pull-right dashIcon" aria-hidden="true"></i>

                                    <div class="pull-left">
                                        <big class="dashFont"><?php echo ' ' ?></big> <br/> 
                                        <span class="dashTi">Billing</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-lg-3 pointerMouse">
                            <div class="panel panel-primary bookingDatails">
                                <div class="panel-body bg-CadetBlue">
                                    <i class="fa fa-list-ol pull-right dashIcon" aria-hidden="true"></i>
                                    <div class="pull-left">
                                        <big class="dashFont"><?php echo ' ' ?></big> <br/> 
                                        <span class="dashTi">Booking Details</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-lg-3 pointerMouse">
                            <div class="panel panel-primary purchasePage">
                                <div class="panel-body bg-yellow">
                                    <i class="fa fa-shopping-cart pull-right dashIcon" aria-hidden="true"></i>
                                    <div class="pull-left">
                                        <big class="dashFont"><?php echo ' ' ?></big> <br/> 
                                        <span class="dashTi">Purchase</span></div>

                                </div>
                            </div>  
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-lg-3 pointerMouse">
                            <div class="panel panel-primary expenPage">
                                <div class="panel-body bg-CadetBlue">
                                    <i class="fa fa-list-alt pull-right dashIcon" aria-hidden="true"></i>
                                    <div class="pull-left">
                                        <big class="dashFont"><?php echo ' ' ?></big> <br/> 
                                        <span class="dashTi">Expenditure</span></div>

                                </div>
                            </div>  
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-lg-3 pointerMouse">
                            <div class="panel panel-primary bottleStock">
                                <div class="panel-body bg-CornflowerBlue ">
                                    <i class="fa fa-hdd-o pull-right dashIcon" aria-hidden="true"></i>
                                    <div class="pull-left">
                                        <big class="dashFont"><?php echo ' ' ?></big> <br/> 
                                        <span class="dashTi">Botteles Stock</span></div>

                                </div>
                            </div>  
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-lg-3 pointerMouse">
                            <div class="panel panel-primary" onClick="location.href = '/DataBaseBackUp/getBackup'">  
                                <div class="panel-body bg-DarkGray">
                                    <i class="fa fa-database pull-right dashIcon" aria-hidden="true"></i>
                                    <div class="pull-left">
                                        <big class="dashFont"><?php echo ' ' ?></big> <br/> 
                                        <span class="dashTi">Back Up</span></div>   

                                </div>
                            </div>  
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-6 col-lg-3 pointerMouse">
                            <div class="panel panel-primary myProfile">
                                <div class="panel-body bg-red">
                                    <i class="fa fa-user pull-right dashIcon"  aria-hidden="true"></i>
                                    <div class="pull-left">
                                        <big class="dashFont" ><?php echo ' ' ?></big> <br/> 
                                        <span class="dashTi">My Profile</span></div>

                                </div>

                            </div>
                        </div>  
                        <div class="clearfix"></div>
                    </div>  

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Sameer Sir</b>
                </div>
                <strong>Hotel</strong>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                        <p>Will be 23 on April 24th</p>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>

                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>

            <div class="control-sidebar-bg"></div>
        </div>
        <script src="application/Resource/MyFiles/adminDashboard/adminlte.min.js" type="text/javascript"></script>
        <script type="text/javascript">
                                $(document).ready(function () {

                                    $('.content-header').hide();
                                    $(".bottomShow").draggable();
                                    $('.dashboard').click(function () {
                                        location.reload();
                                    });
                                    $('.userList').click(function () {
                                        $('.content').load("UserList");
                                        $('.content-header').hide();
                                    });
                                    $('.addVendor').click(function () {
                                        $('.content').load("AdminAddVendor");
                                        $('.content-header').hide();
                                    });

                                    $('.purchasePage').click(function () {
                                        $('.content').load("AdminAddPurchase");
                                        $('.content-header').hide();
                                    });
                                    $('.addTable').click(function () {
                                        $('.content').load("AddTable");
                                        $('.content-header').hide();
                                    });

                                    $('.addMenu').click(function () {
                                        $('.content').load("AddMenuAndSubmenu");
                                        $('.content-header').hide();
                                    });
                                    $('.userRegistation').click(function () {
                                        $('.content').load("UserRagistation");
                                        $('.content-header').hide();
                                    });
                                    $('.billing').click(function () {
                                        $('.content').load("AdminBilling");
                                        $('.content-header').hide();
                                    });
                                    $('.expenPage').click(function () {
                                        $('.content').load("AdminExpenditure");
                                        $('.content-header').hide();
                                    });
                                    $('.myProfile').click(function () {
                                        $('.content').load("MyProfile");
                                        $('.content-header').hide();
                                    });
                                    $('.addSlider').click(function () {

                                        $('.content').load("AdminAddSlider");
                                        $('.content-header').hide();
                                    });
                                    $('.noteShow').click(function () {
                                        $('.content').load("HomePageNote");
                                        $('.content-header').hide();
                                    });
                                    $('.bottleStockManagement').click(function () {
                                        $('.content').load("BottleStockManagement");
                                        $('.content-header').hide();
                                    });
                                    $('.bottleStock').click(function () {
                                        $('.content').load("BottelesStock");
                                        $('.content-header').hide();
                                    });
                                    $('.bookingDatails').click(function () {
                                        $('.content').load("BookingDatils");
                                        $('.content-header').hide();
                                    });
                                    
                                    
                                    $('.logout').click(function () {
                                        location.href = '/LoginPage/logout';
                                    });
                                });
        </script>




    </body>
</html>
