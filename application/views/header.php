<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets/images/favicon.ico'); ?>" type="image/x-icon">

    <!-- Stylesheets -->
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/app-style.css'); ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/plugins/fancybox/css/jquery.fancybox.min.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('assets/plugins/simplebar/css/simplebar.css'); ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/plugins/select2/css/select2.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/plugins/jquery-multi-select/multi-select.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet" type="text/css">

      <link href="<?php echo base_url();?>assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <!-- animate CSS-->
  <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="<?php echo base_url();?>assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="<?php echo base_url();?>assets/css/app-style.css" rel="stylesheet"/>

    <link href="<?php echo base_url();?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
</head>
<body>

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper" data-simplebar data-simplebar-auto-hide="true">
        <div class="brand-logo">
            <a href="<?= site_url('vishal/dashboard'); ?>">
                <img src="<?= base_url('assets/images/logo-icon.png'); ?>" class="logo-icon" alt="logo icon">
                <h5 class="logo-text"><?= html_escape(isset($username) ? $username : '') ?></h5>
            </a>
        </div>

        <ul class="sidebar-menu do-nicescrol">
            <li>
                <a href="<?= site_url('dashboard'); ?>" class="waves-effect">
                    <i class="icon-home"></i> <span>Dashboard</span>
                </a>
            </li>


      <li>
        <a href="<?= site_url('Add_post'); ?>" class="waves-effect">
          <i class="fa fa-group"></i> <span> Add Post</span> 
        </a>
      </li>


        </ul>
    </div>
    <!-- End Sidebar -->

    <!-- Topbar -->
    <header class="topbar-nav">
        <nav class="navbar navbar-expand fixed-top bg-white">
            <ul class="navbar-nav mr-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link toggle-menu" href="javascript:void();">
                        <i class="icon-menu menu-icon"></i>
                    </a>
                </li>
            </ul>

            <div style="font-size:14px;">
                <h4 class='format'></h4>
                <b><p id='demo' class="text-center cal-container"></p></b>
            </div>

            <ul class="navbar-nav align-items-center right-nav-link">

                                     <li class="nav-item">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="<?= site_url('frontEnd'); ?>">
                        <span class="user-profile">  UserSide</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="<?= site_url('vishal/logout'); ?>">
                        <span class="user-profile"><i class="icon-power mr-2"></i> Logout</span>
                    </a>
                </li>

            </ul>
        </nav>
    </header>
    <!-- End Topbar -->

    <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid">

<?php
// Timestamp for JS clock
$date = new DateTime();
$current_timestamp = $date->getTimestamp();
?>

<script>
flag_time = true;
timer = '';
setInterval(function(){ phpJavascriptClock(); }, 1000);

function phpJavascriptClock() {
    if (flag_time) {
        timer = <?= $current_timestamp ?>*1000;
    }
    var d = new Date(timer);
    months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
    month_array = ['January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    day_array = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    currentYear = d.getFullYear();
    month = d.getMonth();
    var currentMonth1 = month_array[month];
    var currentDate = d.getDate();
    currentDate = currentDate < 10 ? '0'+currentDate : currentDate;

    var day = d.getDay();
    current_day = day_array[day];
    var hours = d.getHours();
    var minutes = d.getMinutes();
    var seconds = d.getSeconds();

    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour ’0′ should be ’12′
    minutes = minutes < 10 ? '0'+minutes : minutes;
    seconds = seconds < 10 ? '0'+seconds : seconds;

    var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
    timer = timer + 1000;

    document.getElementById("demo").innerHTML = currentDate + ' ' + currentMonth1 + ' , ' + currentYear + ' ' + strTime + ' ( ' + current_day + ' ) ';
    flag_time = false;
}
</script>
