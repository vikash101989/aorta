<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    $session_data = $this->session->userdata('session_data');
    $this->role = !empty($session_data['role']) ? $session_data['role'] : '';
    $this->payment_status = !empty($session_data['payment_status']) ? $session_data['payment_status'] : 0;
    $this->fname = !empty($session_data['fname']) ? ucfirst($session_data['fname']) : '';
    $this->lname = !empty($session_data['lname']) ? ucfirst($session_data['lname']) : '';
    $this->email = !empty($session_data['email']) ? $session_data['email'] :'';
    $this->mobile = !empty($session_data['mobile']) ? $session_data['mobile'] : '';
    $this->userid = !empty($session_data['userid']) ? $session_data['userid'] : '';
    $this->home_page = 0;
?>
<!doctype html>
<html lang="en" dir="ltr">
    <head>
            <meta charset="UTF-8">
            <meta http-equiv="x-ua-compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="msapplication-TileColor" content="#0f75ff">
            <meta name="theme-color" content="#2ddcd3">
            <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="mobile-web-app-capable" content="yes">
            <meta name="HandheldFriendly" content="True">
            <meta name="MobileOptimized" content="320">
            <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.png" type="image/x-icon"/>
            <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

            <!-- Title -->
            <title>Aorta</title>

            <!-- Bootstrap Css -->
            <link href="<?php echo base_url();?>assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet" />

            <!-- Dashboard Css -->
            <link href="<?php echo base_url();?>assets/css/dashboard.css" rel="stylesheet" />

            <!-- Font-awesome  Css -->
            <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/fonts/font-awesome.min.css">

            <!--Horizontal Menu-->
            <link href="<?php echo base_url();?>assets/plugins/Horizontal2/Horizontal-menu/dropdown-effects/fade-down.css" rel="stylesheet" />
            <link href="<?php echo base_url();?>assets/plugins/Horizontal2/Horizontal-menu/horizontal.css" rel="stylesheet" />
            <link href="<?php echo base_url();?>assets/plugins/Horizontal2/Horizontal-menu/color-skins/color.css" rel="stylesheet" />

            <!--Select2 Plugin -->
            <link href="<?php echo base_url();?>assets/plugins/select2/select2.min.css" rel="stylesheet" />

            <!-- Cookie css -->
            <link href="<?php echo base_url();?>assets/plugins/cookie/cookie.css" rel="stylesheet">

            <!-- Owl Theme css-->
            <link href="<?php echo base_url();?>assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" />

            <!-- Custom scroll bar css-->
            <link href="<?php echo base_url();?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

            <!--Font icons-->
            <link href="<?php echo base_url();?>assets/plugins/iconfonts/plugin.css" rel="stylesheet">
            <link href="<?php echo base_url();?>assets/plugins/iconfonts/icons.css" rel="stylesheet">
            <!-- Date Picker Plugin -->
            <link href="<?php echo base_url();?>assets/plugins/date-picker/spectrum.css" rel="stylesheet" />
            <!-- Time picker Plugin -->
            <link href="<?php echo base_url();?>assets/plugins/time-picker/jquery.timepicker.css" rel="stylesheet" />
            <!-- SweetAlert2 -->
            <link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetalert2.min.css">
            <!-- Toastr -->
            <link rel="stylesheet" href="<?php echo base_url();?>assets/css/toastr.min.css">

    </head>
    <body>


            <!--Loader-->
            <div id="global-loader">
                    <img src="<?php echo base_url();?>assets/images/other/loader.svg" class="loader-img floating" alt="">
            </div>


            <!--Topbar-->
<div class="header-main">
        <div class="top-bar">
                <div class="container">
                        <div class="row">
                                <div class="col-xl-8 col-lg-8 col-sm-4 col-7">
                                        <div class="top-bar-left d-flex">
                                                <div class="clearfix">
                                                        <ul class="socials">
                                                                <li>
                                                                        <a class="social-icon text-dark" href="#"><i class="fa fa-facebook"></i></a>
                                                                </li>
                                                                <li>
                                                                        <a class="social-icon text-dark" href="#"><i class="fa fa-twitter"></i></a>
                                                                </li>
                                                                <li>
                                                                        <a class="social-icon text-dark" href="#"><i class="fa fa-linkedin"></i></a>
                                                                </li>
                                                                <li>
                                                                        <a class="social-icon text-dark" href="#"><i class="fa fa-google-plus"></i></a>
                                                                </li>
                                                        </ul>
                                                </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-sm-8 col-5">
                                        <div class="top-bar-right">
                                                <ul class="custom">
                                                        <li>
                                                            <?php if($this->role){ ?>
                                                            <!--<a href="<?php echo base_url();?>admin/logout" class="text-dark"><i class="fa fa-sign-in mr-1"></i> <span>Logout</span></a>  -->
                                                            <?php } else { ?>
                                                            <a href="<?php echo base_url();?>admin/registration" class="text-dark"><i class="fa fa-user mr-1"></i> <span>Login/Signup</span></a>
                                                            <?php } ?>
                                                            
                                                            
                                                        </li>
                                                        <?php if($this->role){ ?>
                                                        <li class="dropdown">
                                                                <a href="#" class="text-dark" data-toggle="dropdown"><i class="fa fa-home mr-1"></i><span> My Dashboard</span></a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                        <a href="<?php echo base_url();?>admin/profile" class="dropdown-item" >
                                                                                <i class="dropdown-icon si si-user"></i> My Profile
                                                                        </a>
                                                                        <a href="<?php echo base_url();?>admin/reset_pass" class="dropdown-item" >
                                                                                <i class="dropdown-icon  si si-settings"></i> Account Settings
                                                                        </a>
                                                                        <a class="dropdown-item" href="<?php echo base_url();?>admin/logout">
                                                                                <i class="dropdown-icon si si-power"></i> Log out
                                                                        </a>
                                                                </div>
                                                        </li>
                                                        <?php } ?>
                                                </ul>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>

        <!-- Mobile Header -->
        <div class="sticky">
                <div class="horizontal-header clearfix ">
                        <div class="container">
                                <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
                                <span class="smllogo"><img src="<?php echo base_url();?>assets/images/logo.png" width="120" alt=""/></span>
                                <a href="tel:245-6325-3256" class="callusbtn"><i class="fa fa-phone" aria-hidden="true"></i></a>
                        </div>
                </div>
        </div>
        <!-- Mobile Header -->

        <div class="sticky">
                <div class="horizontal-main clearfix">
                        <div class="horizontal-mainwrapper container clearfix">
                                <div class="desktoplogo">
                                        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/logo.png" alt=""></a>
                                </div>

                                <!--Nav-->
                                <nav class="horizontalMenu clearfix d-md-flex">
                                        <ul class="horizontalMenu-list">
                                            <li aria-haspopup="true"><a class="active" href="<?php echo base_url();?>"><i class="fa fa-mail-reply-all"></i> </a></li>
                                        </ul>
                                        <!--<ul class="mb-0">
                                                <li aria-haspopup="true" class="mt-5 d-none d-lg-block ">
                                                        <span><a class="btn btn-secondary" href="#">Post Free Ad</a></span>
                                                </li>
                                        </ul> -->
                                </nav>
                                <!--Nav-->
                        </div>
                </div>
        </div>
</div>