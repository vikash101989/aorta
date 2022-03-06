<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    $this->role = !empty($session_data['role']) ? $session_data['role'] : '';
    $this->payment_status = !empty($session_data['payment_status']) ? $session_data['payment_status'] : 0;
    $this->fname = !empty($session_data['fname']) ? ucfirst($session_data['fname']) : '';
    $this->lname = !empty($session_data['lname']) ? ucfirst($session_data['lname']) : '';
    $this->email = !empty($session_data['email']) ? $session_data['email'] :'';
    $this->mobile = !empty($session_data['mobile']) ? $session_data['mobile'] : '';
    $this->urlsegment = $this->uri->segment(2);
?>
<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="msapplication-TileColor" content="#0f75ff">
		<meta name="theme-color" content="#9d37f6">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/images/favicon.png" />

		<!-- Title -->
		<title>Aorta</title>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/fonts/font-awesome.min.css">

		<!-- Sidemenu Css -->
		<link href="<?php echo base_url();?>assets/plugins/toggle-sidebar/sidemenu.css" rel="stylesheet" />


		<!-- Bootstrap Css -->
		<link href="<?php echo base_url();?>assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Dashboard Css -->
		<link href="<?php echo base_url();?>assets/css/dashboard.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/admin-custom.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="<?php echo base_url();?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!---Font icons-->
		<link href="<?php echo base_url();?>assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/plugins/iconfonts/icons.css" rel="stylesheet" />
                <!-- Data table css -->
		<link href="<?php echo base_url();?>assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/plugins/datatable/jquery.dataTables.min.css" rel="stylesheet" />

                <!-- Date Picker Plugin -->
		<link href="<?php echo base_url();?>assets/plugins/date-picker/spectrum.css" rel="stylesheet" />
		<!-- Slect2 css -->
		<link href="<?php echo base_url();?>assets/plugins/select2/select2.min.css" rel="stylesheet" />
                  <!-- SweetAlert2 -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetalert2.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/toastr.min.css">
        <!-- file Uploads -->
        <link href="<?php echo base_url();?>assets/plugins/fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />
        <style>
                <?php if($this->role =='admin') { ?> 
                    .app-sidebar {
                        background: #e6f3de;
                    }
                    
                 <?php } ?> 
                 .page-main{
                        margin-top:0px;
                    }
        </style> 
        <script src="<?php echo base_url();?>assets/js/vendors/jquery-3.2.1.min.js"></script>
	</head>
        
		<body class="app sidebar-mini">
		<div id="global-loader"><img src="<?php echo base_url();?>assets/images/other/loader.svg" class="loader-img floating" alt=""></div>
		<div class="page">
<div class="page-main">
    <div class="app-header1 header py-1 d-flex">
            <div class="container-fluid">
                    <div class="d-flex">
                            <a class="header-brand" href="<?php echo base_url();?>admin/profile">
                                    <img src="<?php echo base_url();?>assets/images/themeimage/aortadhc-logo.png" class="header-brand-img" alt="Pinlist logo">
                            </a>
                            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
                            
                            <div class="d-flex order-lg-2 ml-auto">
                                    <div class="dropdown d-none d-md-flex" >
                                            <a  class="nav-link icon full-screen-link">
                                                    <i class="fe fe-maximize floating"  id="fullscreen-button"></i>
                                            </a>
                                            <a class="nav-link" href="<?php echo base_url();?>">
                                                <i class="fa fa-mail-reply-all"></i> 
                                            </a>
                                    </div>
                                   <div class="dropdown ">
                                            <a href="#" class="nav-link pr-0 leading-none user-img" data-toggle="dropdown">
                                                    <img src="<?php echo base_url();?>assets/images/faces/male/25.jpg" alt="profile-img" class="avatar avatar-md brround">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
                                                    <a class="dropdown-item" href="<?php echo base_url();?>admin/profile">
                                                            <i class="dropdown-icon si si-user"></i> My Profile
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                            <i class="dropdown-icon  si si-settings"></i> Reset Password
                                                    </a>
                                                    <a class="dropdown-item" href="<?php echo base_url();?>admin/logout">
                                                            <i class="dropdown-icon si si-power"></i> Log out
                                                    </a>
                                            </div>
                                    </div>
                            </div>
                    </div>
            </div>
    </div>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar doc-sidebar">
            <div class="app-sidebar__user clearfix">
                    <div class="dropdown user-pro-body">
                            <div>
                                    <img src="<?php echo base_url();?>assets/images/faces/male/25.jpg" alt="user-img" class="avatar avatar-lg brround">
                                    <!--<a href="editprofile.html" class="profile-img">
                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                    </a>-->
                            </div>
                            <div class="user-info">
                                    <h2> <?php echo $this->fname . " " .$this->lname; ?></h2>
                                    <span><?php echo ucfirst($this->role) ; ?></span>
                            </div>
                            
                    </div>
            </div>
            <ul class="side-menu">
                    <li class="<?php  if($this->input->get('user') =='hospital'){  echo "active";  } ?>">
                            <a class="side-menu__item" href="<?php echo base_url('admin/profile');?>"><i class="side-menu__icon fa fa-tachometer"></i><span class="side-menu__label">Dashboard</span></a>
                    </li>
                    <li class="slide <?php  if($this->input->get('user') =='customer'){  echo "is-expanded";  } ?>">
                            <a class="side-menu__item <?php  if($this->input->get('user') =='customer'){  echo "active";  } ?>" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Add Users</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                    <li><a class="slide-item" href="<?php echo base_url();?>admin/add_patient">Add New Patient</a></li>
                                    <li><a class="slide-item" href="<?php echo base_url();?>admin/add_family">Family Patients</a></li>
                                    <li><a class="slide-item" href="<?php echo base_url();?>admin/add_user">Add Member</a></li>
                                    
                                    <li class="<?php  if($this->input->get('user') =='customer'){  echo "active";  } ?>"><a class="slide-item <?php  if($this->input->get('user') =='customer'){  echo "active";  } ?>" href="<?php echo base_url();?>admin/all_user?user=customer">Patient list</a></li>
                            </ul>
                    </li>
                    
                    <li class="<?php  if($this->input->get('user') =='doctor'){  echo "active";  } ?>">
                            <a class="side-menu__item" href="<?php echo base_url();?>admin/all_user?user=doctor"><i class="side-menu__icon fa fa-user-md"></i><span class="side-menu__label">Doctors</span></a>
                    </li>
                    <li class="<?php  if($this->input->get('user') =='hospital'){  echo "active";  } ?>">
                            <a class="side-menu__item" href="<?php echo base_url();?>admin/all_user?user=hospital"><i class="side-menu__icon fa fa-h-square"></i><span class="side-menu__label">Hospitals</span></a>
                    </li>
                    <li class="<?php  if($this->input->get('user') =='laboratories'){  echo "active";  } ?>">
                            <a class="side-menu__item" href="<?php echo base_url();?>admin/all_user?user=laboratories"><i class="side-menu__icon fa fa-ambulance"></i><span class="side-menu__label">Diagnostic Center</span></a>
                    </li>
                    <li class="<?php  if($this->input->get('user') =='medicalhall'){  echo "active";  } ?>">
                            <a class="side-menu__item" href="<?php echo base_url();?>admin/all_user?user=medicalhall"><i class="side-menu__icon fa fa-medkit"></i><span class="side-menu__label">Pharmacy</span></a>
                    </li>
                    <li class="<?php  if($this->input->get('user') =='clinics'){  echo "active";  } ?>">
                            <a class="side-menu__item" href="<?php echo base_url();?>admin/all_user?user=clinics"><i class="side-menu__icon fa fa-ambulance"></i><span class="side-menu__label">Clinic</span></a>
                    </li>
                    <li class="<?php  if($this->input->get('user') =='other'){  echo "active";  } ?>">
                            <a class="side-menu__item" href="<?php echo base_url();?>admin/all_user?user=other"><i class="side-menu__icon fa fa-medkit"></i><span class="side-menu__label">Other</span></a>
                    </li>
            </ul>
            <div class="app-sidebar-footer">
                    <a href="#">
                            <span class="fa fa-envelope" aria-hidden="true"></span>
                    </a>
                    <a href="#">
                            <span class="fa fa-user" aria-hidden="true"></span>
                    </a>
                    <a href="#">
                            <span class="fa fa-cog" aria-hidden="true"></span>
                    </a>
                    <a href="<?php echo base_url();?>admin/logout">
                            <span class="fa fa-sign-in" aria-hidden="true"></span>
                            </a>
                    <a href="#">
                            <span class="fa fa-comment" aria-hidden="true"></span>
                    </a>
            </div>
    </aside>
