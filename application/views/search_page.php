<?php
$_REQUEST['specialization'] = isset($_REQUEST['specialization']) ? $_REQUEST['specialization'] : '' ;
$specialization = array_filter(explode(",",$_REQUEST['specialization']));
$this->home_page = 1;
?>
<style>
    
    li.showing {
    font-size: 15px;
    padding: 6px;
    }
    .item2-gl-nav {
         background: #fbfbfc;
    }
    .sptb {
        background: #f4f6fa;
    }
    .item-card9-imgs {
        height: 186px
    }
</style>


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
                    <select class="form-control select2-show-search border-bottom-0 w-100" name = "categories" id ="categories" data-placeholder="Select">
					<optgroup label="Categories">
						<option value="allcategories">All Categories</option>
						<option value="doctor">Doctor</option>
						<option value="hospital">Hospital</option>
						<option value="laboratories">Laboratories</option>
						<option value="clinics">Clinics</option>
						<option value="pharmacy">Pharmacy</option>
						<option value="generalstore">General Store</option>
						<option value="babycare">Baby Care</option>
						<option value="healthylife">Healthy Life</option>
						<option value="other">Others</option>
					</optgroup>
				</select>
				</div>
                </div>
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Doctor Sepcialization</h3>
                    </div>
                    <div class="card-body">
                        <div class="closed" id="container" style="height: 200px; overflow: hidden;">
                            <div class="filter-product-checkboxs">
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox1" value="option1" data-field_value="Allergist" <?php if(in_array('Allergist',$specialization)){ echo"checked"; } ?> >
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Allergist <!--<span class="label label-secondary float-right " >14</span>--> </a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox2" value="option2" data-field_value="Anesthesiologist" <?php if(in_array('Anesthesiologist',$specialization)){ echo"checked"; } ?>>
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Anesthesiologist <!--<span class="label label-secondary float-right " >14</span>--> </a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox3" value="option3" data-field_value="Cardiologist" <?php if(in_array('Cardiologist',$specialization)){ echo"checked"; } ?>>
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Cardiologist <!--<span class="label label-secondary float-right " >14</span>--> </a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox4" value="option3" data-field_value="Dermatologist" <?php if(in_array('Dermatologist',$specialization)){ echo"checked"; } ?>>
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Dermatologist <!--<span class="label label-secondary float-right " >14</span>--> </a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox5" value="option3" data-field_value="Gastroenterologist" <?php if(in_array('Gastroenterologist',$specialization)){ echo"checked"; } ?>>
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Gastroenterologist <!--<span class="label label-secondary float-right " >14</span>--> </a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox6" value="option3" data-field_value="Hematologist" <?php if(in_array('Hematologist',$specialization)){ echo"checked"; } ?>>
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Hematologist <!--<span class="label label-secondary float-right " >14</span>--> </a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Nephrologist" <?php if(in_array('Nephrologist',$specialization)){ echo"checked"; } ?>>
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Nephrologist <!--<span class="label label-secondary float-right " >14</span>--> </a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Neurologist" <?php if(in_array('Neurologist',$specialization)){ echo"checked"; } ?>>
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Neurologist <!--<span class="label label-secondary float-right " >14</span>--> </a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Dentist" <?php if(in_array('Dentist',$specialization)){ echo"checked"; } ?>>
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Dentist <!--<span class="label label-secondary float-right " >14</span>--> </a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Neurosurgeon" <?php if(in_array('Neurosurgeon',$specialization)){ echo"checked"; } ?> >
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Neurosurgeon <!--<span class="label label-secondary float-right " >14</span>--> </a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Obstetrician" <?php if(in_array('Obstetrician',$specialization)){ echo"checked"; } ?> >
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Obstetrician <!--<span class="label label-secondary float-right " >14</span>--> </a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Gynecologist" <?php if(in_array('Gynecologist',$specialization)){ echo"checked"; } ?> >
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Gynecologist <!--<span class="label label-secondary float-right " >14</span>--> </a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Nurse-Midwifery" <?php if(in_array('Nurse-Midwifery',$specialization)){ echo"checked"; } ?> >
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Nurse-Midwifery <!--<span class="label label-secondary float-right " >14</span>--> </a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Ophthalmologist" <?php if(in_array('Ophthalmologist',$specialization)){ echo"checked"; } ?> >
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Ophthalmologist <!--<span class="label label-secondary float-right " >14</span>--> </a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input item_filter" name="checkbox7" value="option3" data-field_value="Psychiatrist" <?php if(in_array('Psychiatrist',$specialization)){ echo"checked"; } ?> >
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Psychiatrist <!--<span class="label label-secondary float-right " >14</span>--> </a>
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
                     <div class="item2-gl-nav d-flex">
										<h6 class="mb-0 mt-2"></h6>
										<ul class="nav item2-gl-menu ml-auto">
											<li></li>
											<li></li>
										</ul>
										<div class="d-flex">
											<label class="mr-2 mt-1 mb-sm-1">Sort By:</label>
											<select name="item" class="form-control select-sm w-50" id="sortBy" onchange="searchFilter();" >
												<option value="ASC">ASC </option>
											    <option value="DESC">DESC </option>
											</select>
										</div>
									</div>
                    <div class="card-body">
                        <div class="item2-gl ">
                           
                               <div id="dataList">
                                   <div class="row">
                                <?php
                                $img_ulr = $name = $title =$specialization = $organisation_name = $location = '';
                                if (!empty($users)) {
                                    foreach ($users as $data) {
                                        $id = !empty($data['id']) ? $data['id'] : '';
                                        $lname = !empty($data['lname']) ? $data['lname'] : '';
                                        $title = ($data['role'] == 'doctor') ? "Dr. " : '';
                                        $name = !empty($data['fname']) ? $title . " " . $data['fname'] . " " . $lname : '';
                                        $specialization = !empty($data['specialization']) ? $data['specialization'] : '';
                                        $organisation_name  = !empty($data['organisation_name']) ? $data['organisation_name'] : '';
                                        $name = !empty($organisation_name) ? $organisation_name : $name;
                                        $location = !empty($data['city']) ? $data['city'] : '';
                                        if(!empty($data['profile_image'])){
                                                $img_ulr = base_url('assets/images/profile/').$data['profile_image'];
                                                if (!@getimagesize($img_ulr)) {
                                                    $img_ulr =  base_url('assets/images/faces/doctors/1.jpg');
                                                    } 
                                        } else {
                                                $img_ulr = base_url('assets/images/faces/doctors/1.jpg'); 
                                        }
                                        ?>
                                       <div class="col-lg-6 col-md-12 col-xl-4">
                                            <div class="card overflow-hidden">
                                                <div class="item-card9-imgs">
                                                    <a href="<?php echo base_url().'admin/detail/'. $id ?> "></a>
                                                    <img src=" <?php echo $img_ulr ?>" alt="img" class="w-100 h-100">
                                                </div>
                                                <div class="card-body">
                                                    <div class="item-card2">
                                                        <div class="item-card2-desc text-center">
                                                            <div class="item-card2-text">
                                                                <a href="<?php echo base_url().'admin/detail/'. $id ?>" class="text-dark"><h6 class="font-weight-bold mb-1"><?php echo strtoupper($name); ?></h6><span class ="text-small"><?php if(!empty($location)) echo "(". strtolower($location) . ")" ; ?></span></a>
                                                            </div>
                                                            <p class="fs-16"><?php echo $specialization ?></p>
                                                            <a class="btn btn-primary" href="<?php echo base_url().'admin/detail/'. $id ?>"> Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                     } else { ?>
                                    <button type="button" id = "get-data" class="btn btn-primary btn-block">No More Data Found</button>
                                <?php   } ?>
                                <br>
                                </div>
                                <div class="row">
                                    <div class="center-block text-right">
        							   	<?php echo $this->ajax_pagination->create_links(); ?>	
        							</div>
    							</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Add lists-->
            </div>

        </div>
    </div>
</section>
<script>
 $("#categories").change(function(){
            var s_text = $('input[name="search_text"]').val();
            var searchlocation = $('input[name="location"]').val();
            window.location.href ="<?php echo base_url('admin/getResult?search_text=') ;?>" + s_text.trim() + "&location=" + searchlocation + "&categories=" + $(this).val();
        });
        //============================= old code
        //aortadhc.com/admin/getResult?search_text=renu&categories=allcategories
       $('.item_filter').click(function(e){  
        e.preventDefault()
        var specialization = multiple_values('item_filter');
         s_text =$('input[name="search_text"]').val();
         categories ="<?php echo $this->categories ?>";
         var searchlocation = $('input[name="location"]').val();
         window.location.href ="<?php echo base_url('admin/getResult?search_text=') ;?>" + s_text.trim() + "&location=" + searchlocation + "&categories=" + categories + "&specialization=" + specialization;
        });
    
        function multiple_values(inputclass){
            var val = new Array();
            $("."+inputclass+":checked").each(function() {
             val.push($(this).data('field_value'));
            });
            return val.join(',');
        }
</script>
