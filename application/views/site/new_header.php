<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!doctype html>
<html lang="zxx" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="msapplication-TileColor" content="#0f75ff">
		<meta name="theme-color" content="#2ddcd3">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>/assets/images/favicon.png" />

		<!-- Title -->
		<title>Digital Health Card- Aorta Laboratories Pvt. Ltd.</title>

		<!-- Bootstrap Css -->
		<link href="<?php echo base_url();?>/assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Dashboard Css -->
		<link href="<?php echo base_url();?>/assets/css/dashboard.css" rel="stylesheet" />

		<!-- Font-awesome  Css -->
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/fonts/fonts/font-awesome.min.css">

		<!--Horizontal Menu-->
		<link href="<?php echo base_url();?>assets/plugins/Horizontal2/Horizontal-menu/dropdown-effects/fade-down.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/plugins/Horizontal2/Horizontal-menu/horizontal.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/plugins/Horizontal2/Horizontal-menu/color-skins/color.css" rel="stylesheet" />

		<!--Select2 Plugin -->
		<link href="<?php echo base_url();?>assets/plugins/select2/select2.min.css" rel="stylesheet" />

		<!-- Cookie css -->
		<link href="<?php echo base_url();?>assets/plugins/cookie/cookie.css" rel="stylesheet">

		<!-- Countdown css-->
		<link href="<?php echo base_url();?>assets/plugins/count-down/flipclock.css" rel="stylesheet" />

		<!-- Date Picker Plugin -->
		<link href="<?php echo base_url();?>assets/plugins/date-picker/spectrum.css" rel="stylesheet" />

		<!-- Owl Theme css-->
		<link href="<?php echo base_url();?>assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="<?php echo base_url();?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!--Font icons-->
		<link href="<?php echo base_url();?>assets/plugins/iconfonts/plugin.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/plugins/iconfonts/icons.css" rel="stylesheet">
		 <!-- SweetAlert2 -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetalert2.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/toastr.min.css">
                <!-- Data table css -->
		<link href="<?php echo base_url();?>assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/plugins/datatable/jquery.dataTables.min.css" rel="stylesheet" />
    <style>
    
        #userTable {
            z-index: 3;
            top: 47px;
            left: 270px;
            background-color: white;
            width: 65%;
            border-radius: 3px;
        }
        #locationTable {
            z-index: 3;
            top: 47px;
            background-color: white;
            width: 100%;
            border-radius: 3px;
        }
        .absolute {
            position: absolute;
        }
        li.select2-results__option.select2-results__option--highlighted {
                font-size: 17px;
            }
        .resposelist {
            font-size: 20px;
            margin-left: 10px;
            font-family: open sans-serif;
        }
        svg:not(:root) {
            overflow: hidden;
            width: 7%;
        }
        .search-organisation {
            background: #5979ff;
            float: right;
            padding: 7px;
            color: #fff;
            margin-top: -6px;
            text-transform: capitalize;
            font-size: 14px;
            font-weight: 500;
        }
        .header-search .float-right .text-size {
			font-size: 16px;
		}
    </style>
    <!-- JQuery js-->
		<script src="<?php echo base_url();?>/assets/js/vendors/jquery-3.2.1.min.js"></script>
	</head>
	<script>
		const base_url ='<?php echo base_url() ?>';
	</script>
	<body>
<?php 
    $this->search_text = $search_text = !empty($this->input->get('search_text')) ? $this->input->get('search_text') : ""; 
    $city_name = !empty($this->input->get('location')) ? $this->input->get('location') : ""; 
    $this->categories = !empty($this->input->get('categories')) ? $this->input->get('categories') : "";
    $session_data = $this->session->userdata('session_data');
    $this->role = !empty($session_data['role']) ? $session_data['role'] : '';
    $this->payment_status = !empty($session_data['payment_status']) ? $session_data['payment_status'] : 0;
    $this->fname = !empty($session_data['fname']) ? ucfirst($session_data['fname']) : '';
    $this->lname = !empty($session_data['lname']) ? ucfirst($session_data['lname']) : '';
    $this->email = !empty($session_data['email']) ? $session_data['email'] :'';
    $this->mobile = !empty($session_data['mobile']) ? $session_data['mobile'] : '';
    $this->userid = !empty($session_data['userid']) ? $session_data['userid'] : '';
    $this->home_page = 0;
    $show_search_button = !empty( trim($this->search_text) || trim($this->categories) ) ? 0 : 1;
    $ip = $_SERVER['REMOTE_ADDR'];
   //$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
     $this->citysearch = !empty($city_name) ?  $city_name : '';//$details->city
		//$this->citysearch = !empty($city_name) ?  $city_name : $details->city;
    
?>
		<!--Loader-->
		<div id="global-loader"><img src="<?php echo base_url();?>assets/images/other/loader.svg" class="loader-img floating" alt=""></div>

		<!--Topbar-->
		<div class="header-main">
			<div class="top-bar">
				<div class="container">
					<div class="row">
						<div class="col-xl-8 col-lg-8 col-sm-4">
							<div class="top-bar-left d-flex">
								<div class="clearfix">
									<ul class="socials">
										<li>
											<a class="social-icon text-dark" id ="doctorclick" href="javascript:void(0)" ><i class="fa fa-user-md"></i> Find Doctor</a>
										</li>
										<li>
											<a class="social-icon text-dark" id ="hospitalclick" href="javascript:void(0)"><i class="fa fa-h-square"></i> Find Hospital</a>
										</li>
										<li>
											<a class="social-icon text-dark" id ="medicalhallclick" href="javascript:void(0)" ><i class="fa fa-user-md"></i> Find Medical Hall</a>
										</li>
										<li>
											<a class="social-icon text-dark" id ="labclick" href="javascript:void(0)" ><i class="fa fa-address-card-o"></i> Find Lab</a>
										</li>
									</ul>
								</div>
								<div class="clearfix">
									<ul class="contact border-left">
										<li class="mr-5 d-lg-none">
											<a href="#" class="callnumber text-dark"><span><i class="fa fa-phone mr-1"></i>: +91-9525510009</span></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-sm-12">
							<div class="top-bar-right">
								<ul class="custom"> <span style="font-size:12px;line-height: 10px;padding:4px">A company of Aorta Laboratories Pvt. Ltd. </span>
                                                        
                                                        
                                                </ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!--Mobile Header-->
			<div class="sticky">
				<div class="horizontal-header clearfix ">
					<div class="container">
					<!--<a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>-->
					<span class="smllogo" style="float: left;"><a class="header-logo" href="<?php echo base_url();?>"> 
					<img src="<?php echo base_url();?>assets/images/themeimage/aortadhc-logo.png" class="" alt="dashr logo" style="margin-top: 0px;">
					</a></span>
					<!--<a href="tel:245-6325-3256" class="callusbtn"><i class="fa fa-phone" aria-hidden="true"></i></a>-->
						<div class="top-bar-right">
								<ul class="custom">									
									<li class="dropdown">
									    <?php if($this->role){ ?>
                                        <a href="<?php echo base_url();?>admin/logout" class="text-dark"><i class="fa fa-sign-in mr-1"></i> <span>Logout</span></a>
                                        <?php } else { ?>
                                        <a href="<?php echo base_url();?>admin/registration" class="text-dark"><i class="fa fa-user mr-1"></i> <span>Login/Signup</span></a>
                                        <?php } ?>
									</li>
								</ul>
							</div>
					</div>
				</div>
			</div>
			
			
			<!--Header Search-->
				<header class="clearfix header-search border-bottom p-2 bg-transparent">
					<div class="container">
						<div class="row">
							<div class="col-lg-2 col-md-12 col-12">
								<div class="header-search-logo d-none d-lg-block">
									<a class="header-logo" href="<?php echo base_url();?>">
										<img src="<?php echo base_url();?>assets/images/themeimage/aortadhc-logo.png" class="" alt="dashr logo" style="margin-top: 0px;">
									</a>
								</div>
							</div>
							<div class="col-lg-8 col-md-12">
								<div class="header-inputs mb-lg-0">
									<div>
									    <?php echo form_open('admin/getResult',  array('method'=>'get','class'=>'row no-gutters')); ?>
									    
										    <div class="form-group col-xl-4 col-lg-4 select2-lg  col-md-12 mb-0">
										        <input type="text" class="form-control input-lg border-right-0"  name = "location" id ="searchlocation"  value = "<?php echo $this->citysearch; ?>">
										        <div id="locationTable" class="absolute" ></div>
												<!--<select class="form-control select2-show-search border-bottom-0 w-100" name = "categories" id ="categories" data-placeholder="Select">
													<optgroup label="Categories">
														<option value="allcategories">All Categories</option>
														<option value="doctor">Doctor</option>
														<option value="hospital">Hospital</option>
														<option value="laboratories">Laboratories</option>
														<option value="medicalhall">Medical Hall</option>
														<option value="pharmacy">Pharmacy</option>
														<option value="babycare">Baby Care</option>
														<option value="other">Others</option>
													</optgroup>
												</select>-->
											</div>
											<div class="form-group col-xl-6 col-lg-5 col-md-12 mb-0">
												<input type="text" class="form-control input-lg border-right-0" id="gsearchsimple" name = "search_text"  value ="<?php echo $search_text ?>" placeholder="Search doctors, Hospitals & More">
    										</div>
										    <div id="userTable" class="absolute" ></div>
											
											<div class="col-xl-2 col-lg-3 col-md-12 mb-0">
											    <button type="submit" class="btn btn-lg btn-block btn-secondary" value="search">Search</button>
											</div>
										</form>
									   
                                    </div>
								</div>
							</div>
							
							<div class="d-none d-sm-block  col-lg-2 col-md-12">								
								<div class="header-icons float-right">
									<ul class="custom">									
    									<li class="dropdown">
    									<?php if(!$this->role){ ?>
    										 My Account <i class="fa fa-chevron-down"></i>
    									<?php } if($this->role){ ?>
    										<a href="#" class="text-dark text-size" data-toggle="dropdown"> <?php echo ucfirst($this->fname. " ". $this->lname); ?> <i class="fa fa-chevron-down"></i></a>
    											<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
    													<a href="<?php echo base_url();?>admin/profile" class="dropdown-item" >
    															<i class="dropdown-icon si si-user"></i> My Profile
    													</a>
    													<a class="dropdown-item" href="<?php echo base_url();?>admin/logout">
    															<i class="dropdown-icon si si-power"></i> Log out
    													</a>
    											</div>
    										<?php } ?>
    									</li>
								    </ul>
								</div>
								<?php if(!$this->role){ ?>
							    <span>
							      <div class="account-login arotha-login"><div class="account-close-btn"></div>
								     <a href="<?php echo base_url();?>admin/registration" class="btn btn-lg btn-block btn-secondary"><span>Login or Sign Up</span></a>
								    <ul class="account-links"><li class="account-link--faqs account-link">
								        <a href="faqs.html" target="_blank" rel="noopener noreferrer nofollow"><div class="btn-link__text" data-test-id="faq"><i class="fa fa-question-circle"></i> FAQs</div></a>
								        <li class="account-link--hiw account-link"><a href="how-it-works.html"><div class="btn-link__text" data-test-id="offers"><i class="fa fa-chevron-right"></i> How it Works</div></a></li>
								    </ul>
								    </div>
							    </span>
							    <?php } ?>
							</div>
						</div>
					</div>
				</header>
		</div>
<div class="page-main">

		