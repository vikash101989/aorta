<?php
$this->pcardtext = '';
$this->pcardclass = '';
$this->pid = !empty($user_data['id'])? ucfirst($user_data['id']) : '';
$pfname = $this->pfname= !empty($user_data['fname'])? ucfirst($user_data['fname']) : '';
$lname = $this->plname=  !empty($user_data['lname'])? ucfirst($user_data['lname']) : '';
$this->fullname = !empty($user_data['lname'] && $user_data['fname']) ? trim($pfname ." ". $lname): "Your Name";
$this->pemail = !empty($user_data['email'])? $user_data['email'] : '';
$this->pmobile = !empty($user_data['mobile'])? $user_data['mobile'] : '';
$this->pcardno = !empty($user_data['cardnumber'])? $user_data['cardnumber'] : '----------------';
$this->paddress = !empty($user_data['address'])? $user_data['address'] : '';
$this->pcity = !empty($user_data['city'])? $user_data['city'] : '';
$this->pdescription = !empty($user_data['description'])? $user_data['description'] : '';
$this->pstate = !empty($user_data['state'])? $user_data['state'] : '';
$this->pcountry = !empty($user_data['country'])? $user_data['country'] : '';
$this->pprofile_image = !empty($user_data['profile_image'])? $user_data['profile_image'] : '';
$this->pexperience = !empty($user_data['experience'])? "+ ".$user_data['experience']." years" : '0';
$this->pspecialization = !empty($user_data['specialization'])? $user_data['specialization'] : '';
$this->pgender = ($user_data['gender'] =='male')? 'male' : (($user_data['gender'] =='female')? 'female' : '');
$this->ppayment_status = !empty($user_data['payment_status']) ? 1 : 0 ;
$this->dateofexp = !empty($user_data['card_valid_upto']) ? date('Y-m-d', strtotime($user_data['card_valid_upto'])) : 'not set' ;
$this->pbgroup = !empty($user_data['bgroup']) ? $user_data['bgroup'] : '' ;


?>
<style>
    #profileImage {
       width: 80px;
        margin: auto;
        height: 80px;
        border-radius: 50%;
        background: #512DA8;
        font-size: 35px;
        color: #fff;
        text-align: center
    }
    </style>
<!--User Dashboard-->
<section class="sptb">
        <div class="container">
                <div class="row">
                        <div class="col-xl-3 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title" style="margin-right: 65px;">Dashboard</h3>
                                    </div>  
                                        <div class="card-body text-center item-user">
                                                <div class="profile-pic">
                                                        <div class="profile-pic-img">
                                                                <?php if(!empty($this->pprofile_image)){ 
                                                                    $img_ulr = base_url('assets/images/profile/').$this->pprofile_image;
                                                                    if (!@getimagesize($img_ulr)) {
                                                                    ?>
                                                                    <div id="profileImage" > <?php echo substr($this->pfname, 0, 1)?></div>
                                                                    <?php } else { ?>
                                                                    <img src="<?php echo base_url();?>/assets/images/profile/<?php echo $this->pprofile_image;?>" class="" alt="user">
                                                                    
                                                                    
                                                                <?php } } else { ?>
                                                                <div id="profileImage" ><?php echo substr($this->pfname, 0, 1)?> </div>
                                                                <?php } ?>
                                                        </div>
                                                        <a href="<?php echo base_url();?>admin/profile" class="text-dark"><h4 class="mt-3 mb-0 font-weight-semibold"><?php echo $this->fullname;?></h4></a>
                                                </div>
                                        </div>
                                        <aside class="app-sidebar doc-sidebar my-dash">
                                                <div class="app-sidebar__user clearfix">
                                                    <ul class="side-menu">
                                                        <!--<li>
                                                                <a class="side-menu__item <?php  if( $this->uri->segment(2) =='profile'){  echo "active";  } ?>" href="<?php echo base_url();?>admin/profile"><i class="side-menu__icon si si-user"></i><span class="side-menu__label">Profile</span></a>
                                                        </li>-->
                                                        <!--<li>
                                                            <a class="side-menu__item <?php  if( $this->uri->segment(2) =='reset_pass'){  echo "active";  } ?>" href="<?php echo base_url();?>admin/reset_pass"><i class="side-menu__icon si fa fa-unlock-alt"></i><span class="side-menu__label">Reset Password</span></a>
                                                        </li>
                                                         
                                         
                									    <li class="slide">
                											<a class="side-menu__item" href="<?php echo base_url();?>admin/myads"><i class="side-menu__icon si si-diamond"></i><span class="side-menu__label"> My records</span></a>
                											
                										</li>
        										<li class="slide">
        											<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon si si-heart"></i><span class="side-menu__label">Membership</span><i class="angle fa fa-angle-right"></i></a>
        											<ul class="slide-menu">
        												<li><a class="slide-item" href="<?php echo base_url();?>admin/mymembership"> My Membership</a></li>
        												<li><a class="slide-item" href="<?php echo base_url();?>admin/add_mymembership"> Add Membership</a></li>
        											</ul>
        										</li>-->
        										<li>
        										     <a class="side-menu__item <?php  if( $this->uri->segment(2) =='profile'){  echo "active";  } ?>" href="<?php echo base_url();?>admin/profile"><i class="side-menu__icon si si-user"></i><span class="side-menu__label">Dashboard</span></a>
                                                </li>
        										<li>
        										     <a class="side-menu__item <?php  if( $this->uri->segment(2) =='editprofile'){  echo "active";  } ?>" href="<?php echo base_url();?>admin/editprofile"><i class="side-menu__icon si ti-id-badge"></i><span class="side-menu__label">Edit Profile</span></a>
                                                </li>
        										<li>
        											<a class="side-menu__item <?php  if( $this->uri->segment(2) =='mymembership'){  echo "active";  } ?>" href="<?php echo base_url();?>admin/mymembership"><i class="side-menu__icon si si-heart"></i><span class="side-menu__label">Membership</span></a>
        										</li>
        										<li>
        											<a class="side-menu__item <?php  if( $this->uri->segment(2) =='referal'){  echo "active";  } ?>" href="<?php echo base_url();?>index.php/admin/referal"><i class="side-menu__icon fa fa-diamond"></i><span class="side-menu__label">Refer To</span></a>
        										</li>
        										<!--<li>
        											<a class="side-menu__item <?php  if( $this->uri->segment(2) =='payments'){  echo "active";  } ?>"  href="<?php echo base_url();?>admin/payments"><i class="side-menu__icon si si-credit-card"></i><span class="side-menu__label">Payments</span></a>
        										</li>
        										<li>
        										    <a class="side-menu__item <?php  if( $this->uri->segment(2) =='orders'){  echo "active";  } ?>"  href="<?php echo base_url();?>admin/orders"><i class="side-menu__icon si si-basket"></i><span class="side-menu__label">Orders</span></a>
        										</li>
        										<li class="slide">
        											<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon si si-settings"></i><span class="side-menu__label"> Settings </span><i class="angle fa fa-angle-right"></i></a>
        											<ul class="slide-menu">
        												<li><a class="slide-item" href="<?php echo base_url();?>admin/settings">Settings-1</a></li>
        											</ul>
        										</li>
        										<li class="slide">
        											<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon si si-folder-alt"></i><span class="side-menu__label">Help</span><i class="angle fa fa-angle-right"></i></a>
        											<ul class="slide-menu">
        												<li><a class="slide-item" href="http://aortadhc.com/support/">Support</a></li>
        												<li><a class="slide-item" href="http://aortadhc.com/support/user/login.html">My Ticket</a></li>
        												<li class="sub-slide">
        													<a class="side-menu__item border-top-0 slide-item" href="#" data-toggle="sub-slide"><span class="side-menu__label">My Ticket</span> <i class="sub-angle fa fa-angle-right"></i></a>
        													<ul class="child-sub-menu ">
        														<li><a class="slide-item" href="<?php echo base_url();?>admin/manged">My Ticket</a></li>
        													</ul>
        												</li>
        											</ul>
        										</li>
        									    <li class="slide">
        											<a class="side-menu__item" href="<?php echo base_url();?>admin/tips"><i class="side-menu__icon si si-game-controller"></i><span class="side-menu__label"> Safety Tips</span></a>
        											<ul class="slide-menu">
        												<li><a class="slide-item" href="">Safety Tips-1</a></li>
        											</ul>
        										</li>-->
                                                                                        <li>
        											<a class="side-menu__item" href="#" data-toggle="modal" data-target="#exampleModal2"><i class="side-menu__icon fa fa-question"></i><span class="side-menu__label">I AM</span></a>
        										</li>
        										<li>
        											<a class="side-menu__item" href="<?php echo base_url();?>admin/logout"><i class="side-menu__icon si si-power"></i><span class="side-menu__label">Logout</span></a>
        										</li>
        									</ul>
        								</div>
        							</aside>
                                </div>
                             
                                <div class="card mb-xl-0">
                                        <div class="card-header">
                                                <h3 class="card-title">Highlights of Card uesrs</h3>
                                        </div>
                                        <div class="card-body">
                                                <ul class="list-unstyled widget-spec  mb-0">
                                                        <li class="">
                                                                <i class="fa fa-check text-success" aria-hidden="true"></i> Get upto 50% discount of each booking
                                                        </li>
                                                        <li class="">
                                                                <i class="fa fa-check text-success" aria-hidden="true"></i>  8 Tests free (HT, WT, BMI, BP, Pulse, SPO2T, BG )
                                                        </li>
                                                        <li class="">
                                                                <i class="fa fa-check text-success" aria-hidden="true"></i> Save your time
                                                        </li>
                                                        <!--<li class="ml-5 mb-0">
                                                                <a href="tips.html"> View more..</a>
                                                        </li>-->
                                                </ul>
                                        </div>
                                </div>
                        </div>