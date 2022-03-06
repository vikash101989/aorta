<?php
$_REQUEST['specialization'] = isset($_REQUEST['specialization']) ? $_REQUEST['specialization'] : '' ;
$specialization = array_filter(explode(",",$_REQUEST['specialization']));
$this->home_page = 1;
?>
<!--Sliders Section-->
<div>
    <div class="banner-1 cover-image sptb-2 bg-background" data-image-src="<?php echo base_url();?>assets/images/banners/doctor.jpg">
        <div class="header-text1 mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-12 col-md-12 d-block mx-auto">
                        <div class="text-center text-white ">
                            <h1 class=""><span class="font-weight-bold" id ="countresult"></span> Search Doctors </h1>
                        </div>
                        <!--<div class="search-background">
                            <div class="form row no-gutters">
                                <div class="form-group col-xl-6 col-lg-5 col-md-12 mb-0">
                                    <input type="text" class="form-control input-lg border-right-0" id="search_text"  placeholder="Search Doctors, Name, Location">
                                </div>
                            </div>
                        </div>-->
                        <div class=" search-background">
							<div class="form row no-gutters">
								<div class="form-group col-xl-10 col-lg-9 col-md-12 mb-0">
									<input type="text" class="form-control input-lg border-right-0" id="search_text" placeholder="Search Doctors, Name, Location">
								</div>
								<div class="col-xl-2 col-lg-3 col-md-12 mb-0">
									<a href="#" class="btn btn-lg btn-block btn-outline-secondary" id="location"><i class="zmdi zmdi-chart-donut"></i> Detect</a>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div><!-- /header-text -->
    </div>
</div>
<!--/Sliders Section-->

<!--/Testimonials-->
<section class="sptb">
    <div class="container">
        <div class="row">
            <!--Left Side Content-->
            <div class="col-xl-3 col-lg-4 col-md-12">
               <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Categories</h3>
                    </div>
                    <div class="card-body">
                        <div class="closed" id="container" style="height: 200px; overflow: hidden;">
                            <div class="filter-product-checkboxs">
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox1" value="option1" data-field_value="Allergist" <?php if(in_array('Allergist',$specialization)){ echo"checked"; } ?> >
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Allergist<span class="label label-secondary float-right " >14</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox2" value="option2" data-field_value="Anesthesiologist" <?php if(in_array('Anesthesiologist',$specialization)){ echo"checked"; } ?>>
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Anesthesiologist<span class="label label-secondary float-right">22</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox3" value="option3" data-field_value="Cardiologist" <?php if(in_array('Cardiologist',$specialization)){ echo"checked"; } ?>>
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Cardiologist<span class="label label-secondary float-right">78</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox4" value="option3" data-field_value="Dermatologist" <?php if(in_array('Dermatologist',$specialization)){ echo"checked"; } ?>>
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Dermatologist<span class="label label-secondary float-right">35</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox5" value="option3" data-field_value="Gastroenterologist" <?php if(in_array('Gastroenterologist',$specialization)){ echo"checked"; } ?>>
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Gastroenterologist<span class="label label-secondary float-right">23</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox6" value="option3" data-field_value="Hematologist" <?php if(in_array('Hematologist',$specialization)){ echo"checked"; } ?>>
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Hematologist<span class="label label-secondary float-right">14</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Nephrologist" <?php if(in_array('Nephrologist',$specialization)){ echo"checked"; } ?>>
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Nephrologist<span class="label label-secondary float-right">45</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Neurologist" <?php if(in_array('Neurologist',$specialization)){ echo"checked"; } ?>>
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Neurologist<span class="label label-secondary float-right">34</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Dentist" <?php if(in_array('Dentist',$specialization)){ echo"checked"; } ?>>
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Dentist<span class="label label-secondary float-right">12</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Neurosurgeon" <?php if(in_array('Neurosurgeon',$specialization)){ echo"checked"; } ?> >
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Neurosurgeon<span class="label label-secondary float-right">18</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Obstetrician" <?php if(in_array('Obstetrician',$specialization)){ echo"checked"; } ?> >
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Obstetrician<span class="label label-secondary float-right">02</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Gynecologist" <?php if(in_array('Gynecologist',$specialization)){ echo"checked"; } ?> >
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Gynecologist<span class="label label-secondary float-right">15</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Nurse-Midwifery" <?php if(in_array('Nurse-Midwifery',$specialization)){ echo"checked"; } ?> >
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Nurse-Midwifery<span class="label label-secondary float-right">32</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Ophthalmologist" <?php if(in_array('Ophthalmologist',$specialization)){ echo"checked"; } ?> >
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Ophthalmologist<span class="label label-secondary float-right">23</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Psychiatrist" <?php if(in_array('Psychiatrist',$specialization)){ echo"checked"; } ?> >
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Psychiatrist<span class="label label-secondary float-right">19</span></a>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                
            </div>
            <!--Left Side Content-->

            <div class="col-xl-9 col-lg-8 col-md-12">
                <!--Add lists-->
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="item2-gl ">
                            <div class="row" id="load_data">
                                
                                <!--<div class="col-lg-6 col-md-12 col-xl-4">
                                    <div class="card overflow-hidden">
                                        <div class="item-card9-imgs">
                                            <a href="doctor.html"></a>
                                            <img src="<?php echo base_url();?>assets/images/faces/doctors/2.jpg" alt="img" class="w-100">
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card2">
                                                <div class="item-card2-desc text-center">
                                                    <div class="item-card2-text">
                                                        <a href="doctor.html" class="text-dark"><h4 class="font-weight-bold mb-1">Dr. Roseann Graig</h4></a>
                                                    </div>
                                                    <p class="fs-16">Cardiologist</p>
                                                    <a class="btn btn-primary" href="<?php echo base_url();?>admin/doctor/124">Book Appointment</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="product-filter-desc">
                                                <div class="product-filter-icons text-center">
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-facebook"></i></a>
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-twitter"></i></a>
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-google"></i></a>
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-dribbble"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-xl-4">
                                    <div class="card overflow-hidden">
                                        <div class="item-card9-imgs">
                                            <a href="doctor.html"></a>
                                            <img src="<?php echo base_url();?>assets/images/faces/doctors/3.jpg" alt="img" class="w-100">
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card2">
                                                <div class="item-card2-desc text-center">
                                                    <div class="item-card2-text">
                                                        <a href="doctor.html" class="text-dark"><h4 class="font-weight-bold mb-1">Dr. Sheridan Bastin</h4></a>
                                                    </div>
                                                    <p class="fs-16">Dermatologist</p>
                                                    <a class="btn btn-primary" href="#">Book Appointment</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="product-filter-desc">
                                                <div class="product-filter-icons text-center">
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-facebook"></i></a>
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-twitter"></i></a>
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-google"></i></a>
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-dribbble"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-xl-4">
                                    <div class="card overflow-hidden">
                                        <div class="item-card9-imgs">
                                            <a href="doctor.html"></a>
                                            <img src="<?php echo base_url();?>assets/images/faces/doctors/4.jpg" alt="img" class="w-100">
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card2">
                                                <div class="item-card2-desc text-center">
                                                    <div class="item-card2-text">
                                                        <a href="doctor.html" class="text-dark"><h4 class="font-weight-bold mb-1">Dr. Tanner Fullerton</h4></a>
                                                    </div>
                                                    <p class="fs-16">Gastroenterologist</p>
                                                    <a class="btn btn-primary" href="#">Book Appointment</a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="product-filter-desc">
                                                <div class="product-filter-icons text-center">
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-facebook"></i></a>
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-twitter"></i></a>
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-google"></i></a>
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-dribbble"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-xl-4">
                                    <div class="card overflow-hidden">
                                        <div class="item-card9-imgs">
                                            <a href="doctor.html"></a>
                                            <img src="<?php echo base_url();?>assets/images/faces/doctors/5.jpg" alt="img" class="w-100">
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card2">
                                                <div class="item-card2-desc text-center">
                                                    <div class="item-card2-text">
                                                        <a href="doctor.html" class="text-dark"><h4 class="font-weight-bold mb-1">Dr. Shala Boyko</h4></a>
                                                    </div>
                                                    <p class="fs-16">Hematologist</p>
                                                    <a class="btn btn-primary" href="#">Book Appointment</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="product-filter-desc">
                                                <div class="product-filter-icons text-center">
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-facebook"></i></a>
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-twitter"></i></a>
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-google"></i></a>
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-dribbble"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-xl-4">
                                    <div class="card overflow-hidden">
                                        <div class="item-card9-imgs">
                                            <a href="doctor.html"></a>
                                            <img src="<?php echo base_url();?>assets/images/faces/doctors/6.jpg" alt="img" class="w-100">
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card2">
                                                <div class="item-card2-desc text-center">
                                                    <div class="item-card2-text">
                                                        <a href="doctor.html" class="text-dark"><h4 class="font-weight-bold mb-1">Dr. Tod Ulm</h4></a>
                                                    </div>
                                                    <p class="fs-16">Neurologist</p>
                                                    <a class="btn btn-primary" href="#">Book Appointment</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="product-filter-desc">
                                                <div class="product-filter-icons text-center">
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-facebook"></i></a>
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-twitter"></i></a>
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-google"></i></a>
                                                    <a href="#" class="border text-primary p-0"><i class="fa fa-dribbble"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                            </div>
                            <div id ="load_data_message"></div>
                        </div>
                    </div>
                </div>
                <!--Add lists-->
            </div>

        </div>
    </div>
</section>



