<style>
    .item-card9-imgs {
    height: 186px;
}
.owl-item {
   // margin-right: 0px !important;
}

.sptb {
    padding-top: 1rem;
    padding-bottom: 1rem;
}
.section-title{
    padding-bottom: 0.5rem;
}
#profileImage {
   width: 60px;
    margin: auto;
    height: 60px;
    border-radius: 50%;
    background: #512DA8;
    font-size: 35px;
    color: #fff;
    text-align: center
}
.card-danger {
    background: #e93434;
    color: #fff;
}
.card-warning {
    background: #d96f01;
    color: #fff;
}
.card-success {
    background: #1f8b1d;
    color: #fff;
}
.card-default {
    background: #676a67;
    color: #fff;
}
</style>
<?php 
// echo "<pre>";
// print_r($covid);

$cardaction =$this->input->get('action'); ?>	
<!--Sliders Section-->
	<!--	<section>
			<div class="banner1 d-none d-xl-block">
				<div class="container-fuild"> -->
					<!-- Carousel -->
				<!--	<div class="owl-carousel testimonial-owl-carousel2 slider">
						<div class="item cover-image" data-image-src="">
							<img  alt="first slide" src="<?php // echo base_url();?>/assets/images/banners/banner4.jpg" >
							<div class="header-text ">
								<div class="col-md-12 text-left text-white" style="padding-left:170px;">
									<h1 class="mb-2">Upgrade your healthcare experience</h1>
									<h4>Get unlimited doctors/hospitals/clinic appointment instantly.</h4>
									<div>
										<a href="https://aortadhc.com/admin/getResult?search_text=&location=&categories=doctor" class="btn btn-primary">Appointment</a>
										<a href="#" class="btn btn-secondary">Find Services</a>
									</div>
								</div>-->
						<!--	</div>--><!-- /header-text -->
					<!--	</div>
						<div class="item">
							<img  alt="first slide" src="<?php // echo base_url();?>/assets/images/banners/banner4.jpg" >
							<div class="header-text ">
								<div class="col-md-12 text-left text-white" style="padding-left:170px;">
									<h1 class="mb-2">Our Digital health card Service</h1>
									<h4>Access Anytime Anywhere to the best care | Get instant discount upto 50%</h4>
									<div>
										<a href="https://aortadhc.com/admin/get_card" class="btn btn-secondary">Purchase Membership</a>
									</div>
								</div>
							</div><!-- /header-text -->
					<!--	</div>
						<div class="item">
							<img  alt="first slide" src="<?php // echo base_url();?>/assets/images/banners/banner4.jpg" >
							<div class="header-text ">
								<div class="col-md-12 text-left text-white" style="padding-left:170px;">
									<h1 class="mb-2">No need to stand in Q</h1>
									<h4>Consultantion with the preferred doctor | No waithing time | Fixed fee for consultation</h4>
									<div>
										<a href="#" class="btn btn-primary">Connect Directly</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->
		
		<!--<section class="sptb bg-white">-->
		<!--	<div class="container">-->
		<!--		<div class="section-title center-block text-center">-->
		<!--			<h3>Covid 19 update in India </h3><hr />-->
		<!--		</div>-->
		<!--		<div class="row">-->
		<!--					<div class="col-xl-3 col-lg-3 col-sm-6">-->
		<!--						<div class="card card-danger">-->
		<!--							<div class="card-body text-center">-->
		<!--								<div class="counter-status dash3-counter">-->
		<!--									<h5>Total Confirmed Case</h5>-->
		<!--									<h3 class="counter"><?php // echo $covid['Confirmed'] ?></h3>-->
		<!--								</div>-->
		<!--							</div>-->
		<!--						</div>-->
		<!--					</div>-->
		<!--					<div class="col-xl-3 col-lg-3 col-md-6">-->
		<!--						<div class="card card-warning">-->
		<!--							<div class="card-body text-center">-->
		<!--								<div class="counter-status dash3-counter">-->
		<!--									<h5>Active</h5>-->
		<!--									<h3 class="counter"><?php // echo $covid['Active'] ?></h3>-->
		<!--								</div>-->
		<!--							</div>-->
		<!--						</div>-->
		<!--					</div>-->
		<!--					<div class="col-xl-3 col-lg-3 col-md-6">-->
		<!--						<div class="card card-success">-->
		<!--							<div class="card-body text-center">-->
		<!--								<div class="counter-status dash3-counter">-->
		<!--									<h5>Recovered</h5>-->
		<!--									<h3 class="counter"><?php // echo $covid['Recovered'] ?></h3>-->
		<!--								</div>-->
		<!--							</div>-->
		<!--						</div>-->
		<!--					</div>-->
		<!--					<div class="col-xl-3 col-lg-3 col-md-6">-->
		<!--						<div class="card card-default">-->
		<!--							<div class="card-body text-center">-->
		<!--								<div class="counter-status dash3-counter">-->
		<!--									<h5>Deaths</h5>-->
		<!--									<h3 class="counter"><?php // echo $covid['Deaths'] ?></h3>-->
		<!--								</div>-->
		<!--							</div>-->
		<!--						</div>-->
		<!--					</div>-->
		<!--				</div>-->
		<!--	</div>-->
		<!--</section>-->
		<!--Sliders Section
    
		<!--Categories-------------------------------------------->
  	<!--  <section class="sptb">
			<div class="container ">
				<div class="">
					<h4>Top Doctors</h4>
				</div>
			</div>
		</section>
		<section class="sptb bg-white mt-0">
		   <div class="container ">
				<div id="small-categories" class="owl-carousel owl-carousel-icons2">-->
				    <?php
						/*
				    $profilevalue = 0;
				    $img_ulr = $name = $title = $specialization = $organisation_name = $location = $prfileimage = '';
                    if (!empty($doctors)) {
                        foreach ($doctors as $data) {
                            $id = !empty($data['id']) ? $data['id'] : '';
                            $lname = !empty($data['lname']) ? $data['lname'] : '';
                            $title = ($data['role'] == 'doctor') ? "Dr. " : '';
                            $name = !empty($data['fname']) ? $data['fname'] . " " . $lname : '';
                            $specialization = !empty($data['specialization']) ? $data['specialization'] : '';
                            $organisation_name  = !empty($data['organisation_name']) ? $data['organisation_name'] : '';
                            $name = !empty($organisation_name) ? $organisation_name : $name;
                            if(strlen($name) > 20){
                                $name = substr($name , 0, 20) ."..";
                            }
                            
                            $location = !empty($data['city']) ? $data['city'] : '';
                            $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
                            $colorcode = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
                            if(!empty($data['profile_image'])) {
                                $img_ulr = base_url('assets/images/profile/').$data['profile_image'];
                                if (!@getimagesize($img_ulr)) {
                                    $profilevalue = 1;
                                    $prfileimage = '<div id="profileImage" style = "background-color: '. $colorcode .' " >'.substr($name, 0, 1).'</div>'; 
                                } 
                            } else {
                                $prfileimage = '<div id="profileImage" style = "background-color: '. $colorcode .' " >'.substr($name, 0, 1).'</div>'; 
                                $profilevalue = 1;
                            }
                            
											*/
                    ?>
        	<!--  <div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<div class="cat-item text-center">
									<a href="<?php //echo base_url().'admin/detail/'. $id ?>"></a>
									<div class="cat-img image-home">
									    <?php /* if($profilevalue){ 
									     echo $prfileimage;
									    } else { */?>
									    
									    <img class="media-object brround" alt="60x60" src="<?php //echo $img_ulr ?>" alt="img" >
									    <?php // }?>
									</div>
									<div class="cat-desc">
										<!--<h5 class="mb-0"><?php // echo $specialization ?> </h5>-->
										<!--<h6 class="mb-0"><?php //echo ($data['role'] == 'doctor') ? "Dr. " : ''; echo ucfirst($name); ?></h6>--><!--<span class ="text-small"><?php // if(!empty($location)) echo "(". strtolower($location) . ")" ; ?></span>-->
								<!--		</div>
								</div>
							</div>
						</div>
					</div> -->
					 <?php /*}
                         } else { */?>
                    <!--   <button type="button" id = "get-data" class="btn btn-primary btn-block">No More Data Found</button> -->
                    <?php  // } ?>
					
				<!--	</div>
			</div>
		</section>--> 
		<!--Categories------------------------------------------------->
		
		<!--Find Specialities Categories--------------------------------->
		<section class="sptb">
			<div class="container ">
				<div class="">
					<h4>Find Specialities</h4>
				</div>
			</div>
		</section>
		<section class="sptb bg-white mt-0">
			<div class="container ">
				<div id="small-categories" class="owl-carousel owl-carousel-icons2">

					<div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<div class="cat-item text-center">
									<a href="#" id ="neurologist" data-value ="neurologist"></a>
									<div class="cat-img">
										<img src="<?php echo base_url();?>/assets/images/products/medical2/brain.png" alt="img">
									</div>
									<div class="cat-desc">
										<h5 class="mb-0">Neurologist <!--<span class="badge badge-pill badge-primary">45</span> --> </h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<div class="cat-item text-center">
								    <a href="#" id ="cardiologist" data-value ="cardiologist"></a>
									<!--<a href="https://aortadhc.com/admin/getResult?search_text=&categories=doctor&specialization=cardiologist"></a>-->
									<div class="cat-img">
										<img src="<?php echo base_url();?>/assets/images/products/medical2/heart.png" alt="img">
									</div>
									<div class="cat-desc">
										<h6 class="mb-0">Cardiologist <!--<span class="badge badge-pill badge-primary">45</span> --></h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<div class="cat-item text-center">
								    <a href="#" id ="physician" data-value ="physician"></a>
									<div class="cat-img">
										<img src="<?php echo base_url();?>/assets/images/products/medical2/intestines.png" alt="img">
									</div>
									<div class="cat-desc">
										<h6 class="mb-0">Physician <!--<span class="badge badge-pill badge-primary">45</span> --></h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<div class="cat-item text-center">
								    <a href="#" id ="hepatologist" data-value ="hepatologist"></a>
									<div class="cat-img">
										<img src="<?php echo base_url();?>/assets/images/products/medical2/liver.png" alt="img">
									</div>
									<div class="cat-desc">
										<h6 class="mb-0">Hepatologist <!--<span class="badge badge-pill badge-primary">45</span> --></h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<div class="cat-item text-center">
								    <a href="#" id ="neurologist" data-value ="neurologist"></a>
									<div class="cat-img">
										<img src="<?php echo base_url();?>/assets/images/products/medical2/lungs.png" alt="img">
									</div>
									<div class="cat-desc">
										<h6 class="mb-0">Nephrologist  <!--<span class="badge badge-pill badge-primary">45</span> --></h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<div class="cat-item text-center">
								    <a href="#" id ="gastroenterologist" data-value ="gastroenterologist"></a>
									<div class="cat-img">
										<img src="<?php echo base_url();?>/assets/images/products/medical2/pancreas.png" alt="img">
									</div>
									<div class="cat-desc">
										<h6 class="mb-0">Gastroenterologist <!--<span class="badge badge-pill badge-primary">45</span> --></h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<div class="cat-item text-center">
								    <a href="#" id ="hematology" data-value ="hematology"></a>
									<div class="cat-img">
										<img src="<?php echo base_url();?>/assets/images/products/medical2/spleen.png" alt="img">
									</div>
									<div class="cat-desc">
										<h6 class="mb-0">Hematology <!--<span class="badge badge-pill badge-primary">45</span> --></h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<div class="cat-item text-center">
								    <a href="#" id ="gynecologist" data-value ="gynecologist"></a>
									<div class="cat-img">
										<img src="<?php echo base_url();?>/assets/images/products/medical2/stomach.png" alt="img">
									</div>
									<div class="cat-desc">
										<h6 class="mb-0">Gynecologist <!--<span class="badge badge-pill badge-primary">45</span> --></h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Find Specialities Categories ------------------------------------->
		
		<!--Top Hospitals Categories------------------------------------------------->
    <section class="sptb">
			<div class="container ">
				<div class="">
					<h4>Top Hospitals</h4>
				</div>
			</div>
		</section>
		<section class="sptb bg-white mt-0">
		   <div class="container ">
				<div id="small-categories" class="owl-carousel owl-carousel-icons2">
				    <?php
				    $profilevalue = 0;
				    $img_ulr = $name = $title = $specialization = $organisation_name = $location = $prfileimage = '';
                    if (!empty($hospital)) {
                        foreach ($hospital as $data) {
                            $id = !empty($data['id']) ? $data['id'] : '';
                            $lname = !empty($data['lname']) ? $data['lname'] : '';
                            $name = !empty($data['fname']) ?  $data['fname'] . " " . $lname : '';
                            $organisation_name  = !empty($data['organisation_name']) ? $data['organisation_name'] : '';
                            $name = !empty($organisation_name) ? trim($organisation_name) : trim($name);
                            if(strlen($name) > 30){
                                $name = substr($name , 0, 30) ."..";
                            }
                            $location = !empty($data['city']) ? $data['city'] : '';
                            $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
                            $colorcode = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
                            if(!empty($data['profile_image'])) {
                                $img_ulr = base_url('assets/images/profile/').$data['profile_image'];
                                if (!@getimagesize($img_ulr)) {
                                    $profilevalue = 1;
                                    $prfileimage = '<div id="profileImage" style = "background-color: '. $colorcode .' " >'.substr($name, 0, 1).'</div>'; 
                                } 
                            } else {
                                $prfileimage = '<div id="profileImage" style = "background-color: '. $colorcode .' " >'.substr($name, 0, 1).'</div>'; 
                                $profilevalue = 1;
                            }
                            

                    ?>
                    <div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<div class="cat-item text-center">
									<a href="<?php echo base_url().'admin/detail/'. $id ?>"></a>
									<div class="cat-img image-home">
									    <?php if($profilevalue){ 
									     echo $prfileimage;
									    } else { ?>
									    <img class="media-object brround" alt="60x60" src="<?php echo $img_ulr ?>" alt="img" >
									    <?php }?>
									</div>
									<div class="cat-desc">
										<h6 class="mb-0"><?php echo ucfirst($name); ?></h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					 <?php }
                         } else { ?>
                        <button type="button" id = "get-data" class="btn btn-primary btn-block">No More Data Found</button>;
                    <?php   } ?>
					
				</div>
			</div>
		</section>
		<!--Top Hospitals Categories---------------------------------------->		
		
		
		<section class="sptb">
			<div class="container ">
				<div class="section-title block-center text-center">
				    <h4>Purchase Membership</h4>
					<p>We are flexible with your budget and health</p>
				</div>
			</div>
		</section>
		<!--Pricing Tables 1-->
		<div class="sptb bg-white" id="get-card">
			<div class="container">
				<div class="row">
				            <div class="col-sm-6 col-lg-3">
								<div class="card">
								    <div class="card-status bg-primary"></div>
									<div class="card-body text-center">
										<div class="card-category">Basic</div>
										<div class="display-3 my-4">Free</div>
										<ul class="list-unstyled leading-loose">
											<li> <i class="fe fe-check text-success mr-2"></i> Online Appointment </li>
											<li><i class="fe fe-check text-success mr-2"></i> 24/7 support</li>
											<li><i class="fe fe-check text-success mr-2"></i> DashBord</li>
											<li><i class="fe fe-x text-danger mr-2"></i>Discount upto 50%</li>
											<li><i class="fe fe-check text-success mr-2"></i> 0 Tests</li>
											<li><i class="fe fe-check text-success mr-2"></i> 1 years valid </li>
											<li>&nbsp</li>
										</ul>
										<div class="text-center mt-6">
											<?php echo form_open_multipart('admin/registration') ;?>
        							        <input type="hidden"  name="cardamount" value="0">
        							        <input type="hidden"  name="cardname" value="Free Member">
        								    <button type="submit" class="btn btn-primary">Signup Now</button>
                                        </form>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-lg-3">
								<div class="card">
									<div class="card-status bg-primary"></div>
									<div class="card-body text-center">
										<div class="card-category">Premium</div>
										<div class="display-3 my-4">₹200</div>
										<ul class="list-unstyled leading-loose">
											<li><i class="fe fe-check text-success mr-2"></i> Online Appointment </li>
											<li><i class="fe fe-check text-success mr-2"></i> 24/7 support</li>
											<li><i class="fe fe-check text-success mr-2"></i> DashBord</li>
											<li><i class="fe fe-check text-success mr-2"></i> Discount upto 50%</li>
											<li><i class="fe fe-check text-success mr-2"></i> 0 Tests</li>
											<li><i class="fe fe-check text-success mr-2"></i> 1 year valid </li>
											<li>&nbsp</li>
											<li></li>
										</ul>
										<div class="text-center mt-6">
											<?php echo form_open_multipart('admin/order_pay') ;?>
            								    <input type="hidden"  name="cardamount" value="200">
            							        <input type="hidden"  name="cardname" value="Premium Member">
            								    <button type="submit" class="btn btn-primary">Purchase Now</button>
                                            </form>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-lg-3">
								<div class="card">
								    <div class="card-status bg-primary"></div>
									<div class="card-body text-center">
										<div class="card-category">Silver</div>
										<div class="display-3 my-4">₹499</div>
										<ul class="list-unstyled leading-loose">
											<li><i class="fe fe-check text-success mr-2"></i> Online Appointment </li>
											<li><i class="fe fe-check text-success mr-2"></i> 24/7 support</li>
											<li><i class="fe fe-check text-success mr-2"></i> DashBord</li>
											<li><i class="fe fe-check text-success mr-2"></i>Discount upto 50%</li>
											<li><i class="fe fe-check text-success mr-2"></i> 8 Tests (<small><span class="">H, W, BMI, BP, Pulse, SPO2T, BG </span></small>)</li>
											<li><i class="fe fe-check text-success mr-2"></i> 1 year valid </li>
										</ul>
										<div class="text-center mt-6">
											<?php echo form_open_multipart('admin/order_pay?action='.$cardaction) ;?>
            								    <input type="hidden"  name="cardamount" value="499">
            							        <input type="hidden"  name="cardname" value="Silver Member">
            								    <button type="submit" class="btn btn-primary">Purchase Now</button>
                                            </form>
										</div>
									</div>
								</div>
							</div>
						<!--	<div class="col-sm-6 col-lg-3">
								<div class="card">
								    <div class="card-status bg-primary"></div>
									<div class="card-body text-center">
										<div class="card-category">Gold</div>
										<div class="display-3 my-4">₹2000</div>
										<ul class="list-unstyled leading-loose">
											<li> <i class="fe fe-check text-success mr-2"></i> Online Appointment </li>
											<li><i class="fe fe-check text-success mr-2"></i> 24/7 support</li>
											<li><i class="fe fe-check text-success mr-2"></i> DashBord</li>
											<li><i class="fe fe-check text-success mr-2"></i>Discount upto 50%</li>
											<li><i class="fe fe-check text-success mr-2"></i>Thyrocare Aarogyam 1.3( 90 tests)</li>
										</ul>
										<div class="text-center mt-6">
											 <?php echo form_open_multipart('admin/order_pay?action='.$cardaction) ;?>
            								    <input type="hidden"  name="cardamount" value="2000">
            							        <input type="hidden"  name="cardname" value="Gold Member">
            								    <button type="submit" class="btn btn-primary">Purchase Now</button>
                                            </form>
										</div>
									</div>
								</div>
							</div>-->
					<!--<div class="col-xs-12 col-md-6 col-xl-3 mt-2">
						<div class="panel price  panel-color card overflow-hidden">
							<div class="ribbon ribbon-top-left text-primary"><span class="bg-primary">Basic</span></div>
							<div class="panel-body text-center">
								<p class="display-5 mb-0">Free</p>
							</div>
							<ul class="list-group list-group-flush text-center">
								<li class="list-group-item"><span class="font-weight-semibold"> Online</span> Booking</li>
								<li class="list-group-item"><span class="font-weight-semibold"> </span> </li>
								<li class="list-group-item"><span class="font-weight-semibold">  </span> </li>
								<li class="list-group-item"><span class="font-weight-semibold">  </span> </li>
								<li class="list-group-item"><span class="font-weight-semibold"> 24/7</span> support</li>
							</ul>
							<div class="panel-footer text-center">
								<a class="btn btn-primary" href="<?php echo base_url('admin/get_card');?>">Purchase Now</a>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-6 col-xl-3 mt-2">
						<div class="panel price  panel-color card overflow-hidden">
							<div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">Premium</span></div>
							<div class="panel-body text-center">
								<p class="display-5 mb-0">₹150</p>
							</div>
							<ul class="list-group list-group-flush text-center">
								<li class="list-group-item"><span class="font-weight-semibold"> 8 Test Free</span> For 1 Year</li>
								<small><span class="font-weight-semibold"> Hight, Weight, BMI, BP, Pulse, SPO2 temprature, Blood Group</span></small>
								<li class="list-group-item"><span class="font-weight-semibold">  </span> </li>
								<li class="list-group-item"><span class="font-weight-semibold"> </span> </li>
								<li class="list-group-item"><span class="font-weight-semibold"> </span> </li>
								<li class="list-group-item"><span class="font-weight-semibold"> 24/7</span> support</li>
							</ul>
							<div class="panel-footer text-center">
								<a class="btn btn-primary" href="<?php echo base_url('admin/get_card');?>">Purchase Now</a>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-6 col-xl-3 mt-2">
						<div class="panel price  panel-color card overflow-hidden">
							<div class="ribbon ribbon-top-left text-info"><span class="bg-info">Silver</span></div>
							<div class="panel-body text-center">
								<p class="display-5 mb-0"><i class="fa fa-rupee-sign"></i>₹1000</p>
							</div>
							<ul class="list-group list-group-flush text-center">
								<li class="list-group-item"><span class="font-weight-semibold"> 8 Test Free</span> For 1 Year</li>
								<small><span class="font-weight-semibold"> Hight, Weight, BMI, BP, Pulse, SPO2 temprature, Blood Group</span></small>
								<li class="list-group-item"><span class="font-weight-semibold"> Upto 500000</span> Insurance</li>
								<li class="list-group-item"><span class="font-weight-semibold"> 100% </span> Secure</li>
								<li class="list-group-item"><span class="font-weight-semibold"> </span> </li>
								<li class="list-group-item"><span class="font-weight-semibold"> 24/7</span> support</li>
							</ul>
							<div class="panel-footer text-center">
								<a class="btn btn-primary" href="<?php echo base_url('admin/get_card');?>">Purchase Now</a>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-6 col-xl-3 mt-2">
						<div class="panel price  panel-color card overflow-hidden">
							<div class="ribbon ribbon-top-left text-yellow"><span class="bg-yellow">Gold</span></div>
							<div class="panel-body text-center">
								<p class="display-5 mb-0">₹2000</p>
							</div>
							<ul class="list-group list-group-flush text-center">
								<li class="list-group-item"><span class="font-weight-semibold"> 8 Test Free</span> For 1 Year</li>
									<small><span class="font-weight-semibold"> Hight, Weight, BMI, BP, Pulse, SPO2 temprature, Blood Group</span></small>
								<li class="list-group-item"><span class="font-weight-semibold"> Upto 500000</span> Insurance</li>
								<li class="list-group-item"><span class="font-weight-semibold"> Health</span> Checkup</li>
								<li class="list-group-item"><span class="font-weight-semibold"> Door Step</span> Facilities</li>
								<li class="list-group-item"><span class="font-weight-semibold"> 24/7</span> support</li>
							</ul>
							<div class="panel-footer text-center">
								<a class="btn btn-primary" href="<?php echo base_url('admin/get_card');?>">Purchase Now</a>
							</div>
						</div>
					</div>-->
				</div>
			</div>
		</div>
		<!--/Pricing Tables 1-->

		<!--Categories-->
		<!--<section class="sptb">
			<div class="container">
				<div class="section-title center-block text-center">
					<h1>Categories</h1>
					<p>Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula</p>
				</div>
				<div class="item-all-cat center-block text-center doctor-categories" id="container2" >
					<div class="row">
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Allergist or Immunologist</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Anesthesiologist</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Cardiologist</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Dermatologist</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Gastroenterologist</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Hematologist/Oncologist</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Internal Medicine Physician</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Nephrologist</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Neurologist</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Dentist</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Neurosurgeon</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Obstetrician</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Gynecologist</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Nurse-Midwifery</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Ophthalmologist</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Orthopaedic Surgeon</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Otolaryngologist</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Pathologist</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Pediatrician</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Podiatrist</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Plastic Surgeon</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6s">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Psychiatrist</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Radiation Onconlogist</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="item-all-card text-dark text-center p-4 bg-white">
								<a href="doctor-list.html"></a>
								<div class="item-all-text">
									<h5 class="mb-0 text-body font-weight-bold">Diagnostic Radiologist</h5>
								</div>
							</div>
						</div>
					</div> 
				</div>
			</div>
		</section>-->
		<!--Domain Seller-->
		<section class="sptb cover-image bg-background-color" data-image-src="<?php echo base_url();?>/assets/images/banners/banner2.jpg">
			<div class="container content-text">
				<div class="section-title center-block text-center">
					<h4 class="text-white">Find Doctor Appointment In Online</h4>
					<!--<p class="text-white">Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula</p>-->
				</div>
				<div class="text-center">
					<a class="btn btn-secondary" href="<?php echo base_url('admin/getResult'); ?>?search_text=&categories=doctor">Find Doctor</a>
				</div>
			</div>
		</section>
		<!--/Domain Seller-->
		<!--/Categories-->
        <section class="sptb">
			<div class="container ">
				<div class="section-title center-block text-center">
					<h4>Our Services</h4>
				</div>
			</div>
		</section>
		<section class="sptb bg-white">
    		<div class="container">
    			<div class="row">
    				<div class="col-lg-3 col-md-12">
    					<div class="card">
    						<div class="card-body">
    							<div class="item-box text-center">
    								<div class="stamp text-center stamp-lg bg-primary "><i class="fa fa-users"></i></div>
    								<div class="item-box-wrap">
    									<h6 class="mb-2">Health Checkup</h6>
    									<p class="text-muted mb-0">At Aorta DHC, we offer our card holders free health check-up through our most experienced and skilled doctors. The card holder won’t have to pay any cost for getting treated by the doctors of our network. </p>
    									<!--<a href="<?php echo base_url('admin/offers');?>" class="btn btn-primary btn-md">View More</a>-->
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    				<div class="col-lg-3 col-md-12">
    					<div class="card">
    						<div class="card-body">
    							<div class="item-box text-center">
    								<div class="stamp text-center stamp-lg bg-success"><i class="fa fa-clock-o"></i></div>
    								<div class="item-box-wrap">
    									<h6 class="mb-2">Online Appointment </h6>
    									<p class="text-muted mb-0">We offer you the convenience of sitting at the comfort of your home and your appointment with doctors, laboratories, clinics and other health segments. You don’t have to stand in long queues and waste your time.</p>
    									<!--<a href="<?php echo base_url('admin/offers');?>" class="btn btn-primary btn-md">View More</a> -->
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    				<div class="col-lg-3 col-md-12">
    					<div class="card">
    						<div class="card-body">
    							<div class="item-box text-center">
    								<div class="stamp text-center stamp-lg bg-info"><i class="fa fa-building-o"></i></div>
    								<div class="item-box-wrap">
    									<h6 class="mb-2">Card Benefits</h6>
    									<p class="text-muted mb-0">We conduct health camps, time to time and all our card holders can get their basic health check up done at their nearest location. In that case, you have to definitely carry your Aorta digital health card along with you.</p>
    									<!--<a href="<?php echo base_url('admin/offers');?>" class="btn btn-primary btn-md">View More</a>-->
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    				<div class="col-lg-3 col-md-12">
    					<div class="card">
    						<div class="card-body">
    							<div class="item-box text-center">
    								<div class="stamp text-center stamp-lg bg-danger"><i class="fa fa-share"></i></div>
    								<div class="item-box-wrap">
    									<h6 class="mb-2">Services on Door</h6>
    									<p class="text-muted mb-0">Aorta DHC also offers door-to-door services where our representatives collect blood samples and also deliver medicines up on placing the order. However, the customer is liable to pay service charges for availing services</p>
    									<!--<a href="<?php echo base_url('admin/offers');?>" class="btn btn-primary btn-md">View More</a> -->
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
		</section>
		

		
		<!--Testimonials--
		<section class="sptb bg-white">
			<div class="container">
				<div class="section-title center-block text-center">
					<h1>Testimonials</h1>
					<p>Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula</p>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div id="myCarousel" class="owl-carousel testimonial-owl-carousel">
							<div class="item text-center">
								<div class="row">
									<div class="col-xl-8 col-md-12 d-block mx-auto">
										<div class="testimonia">
											<div class="testimonia-img mx-auto mb-3">
												<img src="<?php echo base_url();?>/assets/images/faces/female/11.jpg" class="img-thumbnail rounded-circle alt=" alt="">
											</div>
											<p>
												<i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur quae quaerat ad velit ab. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore cum accusamus eveniet molestias voluptatum inventore laboriosam labore sit, aspernatur praesentium iste impedit quidem dolor veniam.
											</p>
											<div class="testimonia-data">
												<h4 class="">Heather Bell</h4>
												<div class="rating-stars">
													<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="3">
													<div class="rating-stars-container">
														<div class="rating-star sm">
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-star sm">
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-star sm">
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-star sm">
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-star sm">
															<i class="fa fa-star"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item text-center">
								<div class="row">
									<div class="col-xl-8 col-md-12 d-block mx-auto">
										<div class="testimonia">
											<div class="testimonia-img mx-auto mb-3">
												<img src="<?php echo base_url();?>/assets/images/faces/male/42.jpg" class="img-thumbnail rounded-circle alt=" alt="">
											</div>
											<p><i class="fa fa-quote-left"></i> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore. </p>
											<div class="testimonia-data">
												<h4 class="">David Blake</h4>
												<div class="rating-stars">
													<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="3">
													<div class="rating-stars-container">
														<div class="rating-star sm">
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-star sm">
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-star sm">
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-star sm">
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-star sm">
															<i class="fa fa-star"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item text-center">
								<div class="row">
									<div class="col-xl-8 col-md-12 d-block mx-auto">
										<div class="testimonia">
											<div class="testimonia-img mx-auto mb-3">
												<img src="<?php echo base_url();?>/assets/images/faces/female/20.jpg" class="img-thumbnail rounded-circle alt=" alt="">
											</div>
											<p><i class="fa fa-quote-left"></i> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
											<div class="testimonia-data">
												<h4 class="">Sophie Carr</h4>
												<div class="rating-stars">
													<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="3">
													<div class="rating-stars-container">
														<div class="rating-star sm">
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-star sm">
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-star sm">
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-star sm">
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-star sm">
															<i class="fa fa-star"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/Testimonials-->
		
		<script>
		    $(document).ready(function () {
		        $('#neurologist, #cardiologist, #physician, #hepatologist, #gastroenterologist, #hematology, #gynecologist, #hepatologist').click(function(){
		           var searchlocation = $('input[name="location"]').val();
		           var specialization = $(this).attr('data-value');
		           window.location.href ="<?php echo base_url('admin/getResult?search_text=') ;?>&location=" + searchlocation + "&specialization="+specialization;
		        });
		    });
		</script>