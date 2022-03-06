<!--User Dashboard-->
<section class="sptb">
        <div class="container">
                <div class="row">
                        <div class="col-xl-3 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">My Dashboard</h3>
                                    </div>  
                                        <div class="card-body text-center item-user">
                                                <div class="profile-pic">
                                                        <div class="profile-pic-img">
                                                                <span class="bg-success dots" data-toggle="tooltip" data-placement="top" title="" data-original-title="online"></span>
                                                                <?php if(!empty($profile_image)){ ?>
                                                                <img src="<?php echo base_url();?>/assets/images/profile/<?php echo $profile_image;?>" class="" alt="user">
                                                                <?php } else { ?>
                                                                <img src="<?php echo base_url();?>/assets/images/faces/male/25.jpg" class="" alt="user">
                                                                <?php } ?>
                                                        </div>
                                                        <a href="<?php echo base_url();?>admin/profile" class="text-dark"><h4 class="mt-3 mb-0 font-weight-semibold"><?php echo $this->fname . " ".$this->lname ;?></h4></a>
                                                </div>
                                        </div>
                                        <aside class="app-sidebar doc-sidebar my-dash">
                                                <div class="app-sidebar__user clearfix">
                                                        <ul class="side-menu">
                                                                <li>
                                                                        <a class="side-menu__item <?php  if( $this->uri->segment(2) =='profile'){  echo "active";  } ?>" href="<?php echo base_url();?>admin/profile"><i class="side-menu__icon si si-user"></i><span class="side-menu__label">Edit Profile</span></a>
                                                                </li>
                                                                <li>
                                                                        <a class="side-menu__item <?php  if( $this->uri->segment(2) =='card'){  echo "active";  } ?>" href="<?php echo base_url();?>admin/card"><i class="side-menu__icon si ti-id-badge"></i><span class="side-menu__label">Your Cards</span></a>
                                                                </li>
                                                                <li>
                                                                    <a class="side-menu__item <?php  if( $this->uri->segment(2) =='reset_pass'){  echo "active";  } ?>" href="<?php echo base_url();?>admin/reset_pass"><i class="side-menu__icon si ti-id-badge"></i><span class="side-menu__label">Reset Password</span></a>
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