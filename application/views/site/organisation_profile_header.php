<?php
 $this->pcardtext = '';
 $this->pcardclass = '';
$this->pid = !empty($user_data['id'])? ucfirst($user_data['id']) : '';
$this->pfname = !empty($user_data['fname'])? ucfirst($user_data['fname']) : '';
$this->plname = !empty($user_data['lname'])? ucfirst($user_data['lname']) : '';
$this->pemail = !empty($user_data['email'])? $user_data['email'] : '';
$this->pmobile = !empty($user_data['mobile'])? $user_data['mobile'] : '';
$this->pcardno = !empty($user_data['cardnumber'])? $user_data['cardnumber'] : '----------------';
$this->paddress = !empty($user_data['address'])? $user_data['address'] : '';
$this->pcity = !empty($user_data['city'])? $user_data['city'] : '';
$this->pdescription = !empty($user_data['description'])? $user_data['description'] : '';
$this->pstate = !empty($user_data['state'])? $user_data['state'] : '';
$this->pcountry = !empty($user_data['country'])? $user_data['country'] : '';
$this->pprofile_image = !empty($user_data['profile_image'])? $user_data['profile_image'] : '';
$this->pexperience = !empty($user_data['experience'])? $user_data['experience'] : '0';
$this->pspecialization = !empty($user_data['specialization'])? $user_data['specialization'] : '';
$this->pgender =  !empty($user_data['gender']) ? $user_data['gender'] : '';
$this->ppayment_status = !empty($user_data['payment_status']) ? 1 : 0 ;



$this->porganisation_name = !empty($user_data['organisation_name']) ? $user_data['organisation_name']: "";
$this->pdiscount = !empty($user_data['discount']) ? $user_data['discount']: "";
$this->prole = !empty($user_data['role']) ? $user_data['role']: "";

$this->pstarttime = !empty($user_data['starttime']) ? json_decode($user_data['starttime'], true): [];
$this->pendtime = !empty($user_data['endtime']) ? json_decode($user_data['endtime'], true): [];
$this->pservices = !empty($user_data['services']) ? json_decode($user_data['services'], true): [];
$this->pspecializations = !empty($user_data['specializations']) ? json_decode($user_data['specializations'], true): [];
$this->pawards = !empty($user_data['awards']) ? json_decode($user_data['awards'], true): [];
$this->peducations = !empty($user_data['educations']) ? json_decode($user_data['educations'], true): [];
$this->pmemberships = !empty($user_data['memberships']) ? json_decode($user_data['memberships'], true): [];
$this->pexperiencestext = !empty($user_data['experiencestext']) ? json_decode($user_data['experiencestext'], true): [];
$this->pgeneralfee = !empty($user_data['generalfee']) ? $user_data['generalfee']: 0.00;



$this->dateofexp = !empty($user_data['card_valid_upto']) ? date('Y-m-d', strtotime($user_data['card_valid_upto'])) : 'not set' ;
$this->pcardtype = !empty($user_data['card_type']) ? explode(" ",$user_data['card_type']) : [] ;

if(!empty($this->pcardtype)){
    if($this->pcardtype[0] == 'Free'){
        $this->pcardtext = 'Basic';
        $this->pcardclass = 'bg-primary';
    } else if($this->pcardtype[0]== 'Premium'){
        $this->pcardtext = 'Premium';
        $this->pcardclass = 'bg-danger';
    } else if($this->pcardtype[0] == 'Silver'){
        $this->pcardtext = 'Silver';
        $this->pcardclass = 'bg-info';
    } else if($this->pcardtype[0] == 'Gold'){
        $this->pcardtext = 'Gold';
        $this->pcardclass = 'bg-yellow';
    } 
}

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
                                                <a href="<?php echo base_url();?>admin/profile" class="text-dark"><h4 class="mt-3 mb-0 font-weight-semibold"><?php echo $this->pfname . " ".$this->plname ;?></h4></a>
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
                                                                </li>-->
                                                                 
                                                 
        									    <!--<li class="slide">
        											<a class="side-menu__item" href="<?php echo base_url();?>admin/myads"><i class="side-menu__icon si si-diamond"></i><span class="side-menu__label"> My records</span></a>
        											
        										</li>
        										<li class="slide">
        											<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon si si-heart"></i><span class="side-menu__label"> My Cards</span><i class="angle fa fa-angle-right"></i></a>
        											<ul class="slide-menu">
        												<li><a class="slide-item" href="<?php echo base_url();?>admin/myfavorite"> My Card</a></li>
        												<li><a class="slide-item" href="<?php echo base_url();?>admin/myfavorite"> Add Card</a></li>
        											</ul>
        										</li>
        										<li>
        											<a class="side-menu__item" href="<?php echo base_url();?>admin/payments"><i class="side-menu__icon si si-credit-card"></i><span class="side-menu__label">Payments</span></a>
        										</li>
        										<li class="slide">
        											<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon si si-basket"></i><span class="side-menu__label">Orders</span><i class="angle fa fa-angle-right"></i></a>
        											<ul class="slide-menu">
        												<li><a class="slide-item" href="<?php echo base_url();?>admin/orders">Orders-1</a></li>
        											</ul>
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
        										</li>-->
        									
        										 <li>
        										     <a class="side-menu__item <?php  if( $this->uri->segment(2) =='editprofile'){  echo "active";  } ?>" href="<?php echo base_url();?>admin/editprofile"><i class="side-menu__icon si ti-id-badge"></i><span class="side-menu__label">Edit Profile</span></a>
                                                </li>
                                                
                                                    <li>
                                                            <a class="side-menu__item <?php  if( $this->uri->segment(2) =='current_patient'){  echo "active";  } ?>" href="<?php echo base_url();?>admin/profile?patient=current_patientt"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Current Patients </span></a>
                                                    </li>
                                                     <li>
                                                        <a class="side-menu__item <?php  if( $this->uri->segment(2) =='upcoming_patient'){  echo "active";  } ?>" href="<?php echo base_url();?>admin/profile?patient=upcoming_patient"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Upcoming Patients </span></a>
                                                    </li>
                                                    <li>
                                                        <a class="side-menu__item <?php  if( $this->uri->segment(2) =='past_patient'){  echo "active";  } ?>" href="<?php echo base_url();?>admin/profile?patient=past_patient"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Past Patients </span></a>
                                                    </li>
                                                   <!--<li>
                                                        <a class="side-menu__item <?php  if( $this->uri->segment(2) =='check_card'){  echo "active";  } ?>" href="<?php echo base_url();?>admin/check_card"><i class="side-menu__icon fa fa-user-secret"></i><span class="side-menu__label">Check Card</span></a>
                                                    </li>-->
                                                <li>
        											<a class="side-menu__item" href="#" data-toggle="modal" data-target="#exampleModal2"><i class="side-menu__icon fa fa-question"></i><span class="side-menu__label">I AM</span></a>
        										</li>
                                                <li>
        											<a class="side-menu__item" href="<?php echo base_url();?>admin/logout"><i class="side-menu__icon si si-power"></i><span class="side-menu__label">Logout</span></a>
        										</li>
        										<li class="slide">
        											<a class="side-menu__item" href="<?php echo base_url();?>admin/tips"><i class="side-menu__icon si si-game-controller"></i><span class="side-menu__label"> Safety Tips</span></a>
        											<ul class="slide-menu">
        												<li><a class="slide-item" href="">Safety Tips-1</a></li>
        											</ul>
        										</li>
        									</ul>
        								</div>
        							</aside>
                                </div>
                             
                                <div class="card mb-xl-0">
                                        <div class="card-header">
                                                <h3 class="card-title">Highlights of Points</h3>
                                        </div>
                                        <div class="card-body">
                                                <ul class="list-unstyled widget-spec  mb-0">
                                                        <li class="">
                                                                <i class="fa fa-check text-success" aria-hidden="true"></i> Meet Seller at public Place
                                                        </li>
                                                        <li class="">
                                                                <i class="fa fa-check text-success" aria-hidden="true"></i> Check item before you buy
                                                        </li>
                                                        <li class="">
                                                                <i class="fa fa-check text-success" aria-hidden="true"></i> Pay only after collecting item
                                                        </li>
                                                        <li class="ml-5 mb-0">
                                                                <a href="tips.html"> View more..</a>
                                                        </li>
                                                </ul>
                                        </div>
                                </div>
                        </div>