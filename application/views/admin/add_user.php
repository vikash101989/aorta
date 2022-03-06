<style>
    .copy.hide {
        display: none;
    }
</style>

<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="row mt-5">
            <div class="col-lg-12">
                
                <?php echo form_open_multipart('admin/user_register', array('class' => 'card') ); ?>
                    <div class="card-header">
                        <h3 class="card-title">Add Members</h3>
                    </div>
                    <div class="card-body">
                        
                       <?php 
                            $msg = $this->session->flashdata('errmsg');
                                if(!empty($msg)): ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                     <h6> <?php echo $msg; ?></h6>
                                </div>
                            <?php endif; ?>
                            <?php $msg = $this->session->flashdata('msg');
                                if(!empty($msg)):  ?>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                    <div class="alert alert-success">
        									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        									 <strong>Successfully Added</strong>
        									<hr class="message-inner-separator">
        									<?php if(!empty($msg['fname'])) { ?>
        									<div class ="col-sm-12">
            								    Name : <?php echo ucfirst($msg['fname']) ." " .ucfirst($msg['lname']); ?>
            								</div>
            									<?php } ?>
            								<?php if(!empty($msg['mobile'])) { ?>
            								<div class ="col-sm-12">
            								    Password : <?php echo $msg['mobile']; ?>
            								</div>
            									<?php } ?>
            							<?php if(!empty($msg['cardnumber'])) { ?>
            								<div class ="col-sm-12">
            								    Card No : <?php echo $msg['cardnumber']; ?>
            								</div>
            								<?php } ?>
                						</div>
                					</div>
                				</div>
                                
                                
                                <!--<div class="alert alert-success alert-dismissible">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                 <h6></i> <?php echo $msg; ?></h6>
                               </div>-->
                            <?php endif; ?>

                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">First Name <span style="color:red;font-size: 9px"><i class="typcn typcn-starburst"></i></span></label>
                                        <input type="text" class="form-control" name = "fname" value="<?php echo set_value('fname'); ?>" placeholder="First Name" >
                                    </div>
                                    <?php echo form_error('fname', '<div class="error text-danger">', '</div>'); ?>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name = "lname" value="<?php echo set_value('lname'); ?>" placeholder="last name">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Mobile <span style="color:red;font-size: 9px"><i class="typcn typcn-starburst"></i></span></label>
                                        <input type="text" class="form-control number" name = "mobile" value="<?php echo set_value('mobile'); ?>" placeholder="Mobile" autocomplete="off" maxlength="10">
                                    </div>
                                    <?php echo form_error('mobile', '<div class="error text-danger">', '</div>'); ?>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" name = "email" value="<?php echo set_value('email'); ?>" placeholder="Email Address" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Choose Role <span style="color:red;font-size: 9px"><i class="typcn typcn-starburst"></i></span></label>
                                        <select class="form-control" name="role" id="role" required>
                                        <option value="" >Select role</option>
                                            <option value="doctor">Doctor</option>
                                            <option value="hospital">Hospital</option>
                                            <option value="laboratories">Diagnostic Center</option>
                                            <option value="medicalhall">Pharmacy</option>
                                            <option value="babycare">Baby Care</option>
                                            <option value="other">Others</option>
                                            <?php if($this->role =='admin' || $this->session->userdata('session_data')['mobile'] == '9871833414' ){
                                             //|| $this->session->userdata('session_data')['mobile'] == '9871833414'
                                            ?>
                                            <option value="employee">Employee</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3" id="hide-section">
                                    <div class="form-group">
                                        <label class="form-label">Specialization</label>
                                        <select class="form-control select2-show-search border-bottom-0 w-100" data-placeholder="Select" name ="specialization" id ="specialization">
                                                        <optgroup label="Categories">
                                                        <option>Category</option>
                                                        <option value="Allergist">Allergist</option>
                                                        <option value="Anesthesiologist">Anesthesiologist</option>
                                                        <option value="Cardiologist">Cardiologist</option>
                                                        <option value="Dermatologist">Dermatologist</option>
                                                        <option value="Gastroenterologist">Gastroenterologist</option>
                                                        <option value="Hematologist">Hematologist</option>
                                                        <option value="Physician">Physician</option>
                                                        <option value="Nephrologist">Nephrologist</option>
                                                        <option value="Neurologist">Neurologist</option>
                                                        <option value="Dentist">Dentist</option>
                                                        <option value="Neurosurgeon">Neurosurgeon</option>
                                                        <option value="Obstetrician">Obstetrician</option>
                                                        <option value="Gynecologist">Gynecologist</option>
                                                        <option value="Ophthalmologist">Ophthalmologist</option>
                                                        <option value="Orthopaedic Surgeon">Orthopaedic Surgeon</option>
                                                        <option value="Otolaryngologist">Otolaryngologist</option>
                                                        <option value="Pathologist">Pathologist</option>
                                                        <option value="Pediatrician">Pediatrician</option>
                                                        <option value="Podiatrist">Podiatrist</option>
                                                        <option value="Plastic Surgeon">Plastic Surgeon</option>
                                                        <option value="Psychiatrist">Psychiatrist</option>
                                                        <option value="Radiation Onconlogist">Radiation Onconlogist</option>
                                                        <option value="Diagnostic Radiologist">Diagnostic Radiologist</option>
                                                        <option value="Rheumatologist">Rheumatologist</option>
                                                        <option value="Urologist">Urologist</option>
                                                </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3" id="hide-section1">
                                    <div class="form-group">
                                        <label class="form-label">Experience</label>
                                        <input type="number" class="form-control" name ="experience" value="<?php echo set_value('experience'); ?>" placeholder="+ Exprerience in Year">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Gender</label>
                                        <select class="form-control" name = "gender" id="gender" >
                                            <option value="" >Select gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="transgender">TransGender</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="hide-section2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Organisation Name</label>
                                        <input type="text" class="form-control" name = "orgname" value="<?php echo set_value('orgname'); ?>" placeholder="Organisation Name" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label">Discount</label>
                                        <input type="text" class="form-control number" name = "discount" value="<?php echo set_value('discount'); ?>" placeholder="Discount in %" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label">Medical Registration</label>
                                        <select class="form-control" name ="registrationsvalue">
                                            <option value="1">Verified</option>
                                            <option value="0">Not Verified</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Registration Details</label>
                                        <input type="text" class="form-control number" name = "registrationstext" value="<?php echo set_value('registrationstext'); ?>" placeholder="Enter Registration Details" >
                                    </div>
                                </div>
                                </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label">Start Time</label>
                                        <input type="time" class="form-control number" name ="fromtime[]" min="00:00" max="24:00" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label">End Time</label>
                                        <input type="time" class="form-control number" name ="endtime[]" min="00:00" max="24:00">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label">Start Time</label>
                                        <input type="time" class="form-control number" name ="fromtime[]" min="00:00" max="24:00">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label">End Time</label>
                                        <input type="time" class="form-control number" name ="endtime[]" min="00:00" max="24:00">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label">Start Time</label>
                                        <input type="time" class="form-control number" name ="fromtime[]" min="00:00" max="24:00">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label">End Time</label>
                                        <input type="time" class="form-control number" name ="endtime[]" min="00:00" max="24:00">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Services</label>
                                        <input type="text" class="form-control"  name ="services[]"  placeholder="Enter your Services">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Services</label>
                                        <input type="text" class="form-control"  name ="services[]"  placeholder="Enter your Services" >
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">&nbsp</label>
                                    <button class="btn btn-success add-service-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                </div>
                            </div>
                            <div class="input_service_wrap"></div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Specializations</label>
                                        <input type="text" class="form-control"  name ="specializations[]"  placeholder="Enter your Specializations">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Specializations</label>
                                        <input type="text" class="form-control"  name ="specializations[]"  placeholder="Enter your Specializations" >
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">&nbsp</label>
                                    <button class="btn btn-success add-specializations-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                </div>
                            </div>
                            <div class="input_specializations_wrap"></div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Awards and Recognitions</label>
                                        <input type="text" class="form-control"  name ="awards[]"  placeholder="Enter your Awards and Recognitions">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Awards and Recognitions</label>
                                        <input type="text" class="form-control"  name ="awards[]"  placeholder="Enter your Awards and Recognitions" >
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">&nbsp</label>
                                    <button class="btn btn-success add-awards-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                </div>
                            </div>
                            <div class="input_awards_wrap"></div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Education</label>
                                        <input type="text" class="form-control"  name ="educations[]"  placeholder="Enter your Education">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Education</label>
                                        <input type="text" class="form-control"  name ="educations[]"  placeholder="Enter your Education" >
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">&nbsp</label>
                                    <button class="btn btn-success add-education-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                </div>
                            </div>
                            <div class="input_eduction_wrap"></div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Memberships</label>
                                        <input type="text" class="form-control"  name ="memberships[]"  placeholder="Enter your Memberships">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Memberships</label>
                                        <input type="text" class="form-control"  name ="memberships[]"  placeholder="Enter your Memberships" >
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">&nbsp</label>
                                    <button class="btn btn-success add-memberships-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                </div>
                            </div>
                            <div class="input_memberships_wrap"></div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Experience</label>
                                        <input type="text" class="form-control"  name ="experiencetext[]"  placeholder="Enter your Experience">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Experience</label>
                                        <input type="text" class="form-control"  name ="experiencetext[]"  placeholder="Enter your Experience" >
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">&nbsp</label>
                                    <button class="btn btn-success add-experience-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                </div>
                            </div>
                            <div class="input_experience_wrap"></div></div>
                            <div class="row">
                                <div class="col-md-3" id ="hide-section3">
                                    <div class="form-group">
                                        <label class="form-label">Consultancy charges</label>
                                        <input type="text" class="form-control number" name = "generalfee" value="<?php echo set_value('generalfee'); ?>" placeholder="Enter Consultancy charges" >
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" name = "address" value="<?php echo set_value('address'); ?>" placeholder="Home Address" >
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" name = "city" value="<?php echo set_value('city'); ?>" placeholder="City" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">State</label>
                                    <input type="text" class="form-control" name = "state" value="<?php echo set_value('state'); ?>" placeholder="State" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select class="form-control custom-select" name = "country" value="<?php echo set_value('country'); ?>" >
                                        <option value="india">India</option>
                                        <option value="nepal">Nepal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label class="form-label">Enter Short Description</label>
                                    <textarea rows="5" class="form-control" name = "description" value="<?php echo set_value('description'); ?>" placeholder="Enter About Entry Description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group mb-0">
                                    <label class="form-label">Upload Image</label>
                                    <div class="col-md-4">
                                            <input type="file" name ="profile_image" class="dropify">
                                    </div>
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <script>
      $(document).ready(function(){

            
            var max_fields      = 3; //maximum input boxes allowed
        	var service_wrap   	= $(".input_service_wrap"); //Fields wrapper
        	var service_more    = $(".add-service-more"); //Add button IDspecializations
        	var specializations_wrap   	= $(".input_specializations_wrap"); //Fields wrapper
        	var specializations_more    = $(".add-specializations-more"); //Add button IDspecializations
        	var awards_wrap   	= $(".input_awards_wrap"); //Fields wrapper
        	var awards_more    = $(".add-awards-more"); //Add button IDspecializations
        	var education_wrap   	= $(".input_eduction_wrap"); //Fields wrapper
        	var education_more    = $(".add-education-more"); //Add button IDspecializations
            var memberships_wrap   	= $(".input_memberships_wrap"); //Fields wrapper
        	var memberships_more    = $(".add-memberships-more"); //Add button IDspecializations
        	var experience_wrap   	= $(".input_experience_wrap"); //Fields wrapper
        	var experience_more    = $(".add-experience-more"); //Add button IDspecializations
        	var x = 1; //initlal text box count
        	$(service_more).click(function(e){ 
        	    e.preventDefault();
            		if(x < max_fields){
            			x++; 
            			$(service_wrap).append('<div class="row"><div class="col-md-5 "><div class="form-group"><label class="form-label">Services</label><input type="text" class="form-control" name ="services[]"  placeholder="Enter your Services"></div></div><div class="col-md-6"><div class="form-group"><label class="form-label">Services</label><input type="text" class="form-control" name ="services[]"  placeholder="Enter your Services"></div></div><div class="col-md-1"><label class="form-label">&nbsp</label><button class="btn btn-danger remove_field1" type="button"><i class="fa fa-minus"></i></button></div></div>'); //add input box
            		}
            	});
        	
        	$(service_wrap).on("click",".remove_field1", function(e){ //user click on remove text
        		e.preventDefault(); $(this).parent().parent('div').remove(); x--;
            
        	});
        	var y = 1; //initlal text box count
        	$(specializations_more).click(function(e){ 
        	    e.preventDefault();
            		if(y < max_fields){
            			y++; 
            			$(specializations_wrap).append('<div class="row"><div class="col-md-5 "><div class="form-group"><label class="form-label">Specializations</label><input type="text" class="form-control" name ="specializations[]"  placeholder="Enter your Specializations"></div></div><div class="col-md-6"><div class="form-group"><label class="form-label">Specializations</label><input type="text" class="form-control" name ="specializations[]"  placeholder="Enter your Specializations"></div></div><div class="col-md-1"><label class="form-label">&nbsp</label><button class="btn btn-danger remove_field2" type="button"><i class="fa fa-minus"></i></button></div></div>'); //add input box
            		}
            	});
        	
        	$(specializations_wrap).on("click",".remove_field2", function(e){ //user click on remove text
        		e.preventDefault(); $(this).parent().parent('div').remove(); y--;
            
        	});
        		var z = 1; //initlal text box count
        	$(awards_more).click(function(e){ 
        	    e.preventDefault();
            		if(z < max_fields){
            			z++; 
            			$(awards_wrap).append('<div class="row"><div class="col-md-5 "><div class="form-group"><label class="form-label">Awards and Recognitions</label><input type="text" class="form-control" name ="awards[]"  placeholder="Enter your Awards and Recognitions"></div></div><div class="col-md-6"><div class="form-group"><label class="form-label">Awards and Recognitions</label><input type="text" class="form-control" name ="awards[]"  placeholder="Enter your Awards and Recognitions"></div></div><div class="col-md-1"><label class="form-label">&nbsp</label><button class="btn btn-danger remove_field3" type="button"><i class="fa fa-minus"></i></button></div></div>'); //add input box
            		}
            	});
        	
        	$(awards_wrap).on("click",".remove_field3", function(e){ //user click on remove text
        		e.preventDefault(); $(this).parent().parent('div').remove(); z--;
            
        	});
        	var m = 1; //initlal text box count
        	$(education_more).click(function(e){ 
        	    e.preventDefault();
            		if(m < max_fields){
            			m++; 
            			$(education_wrap).append('<div class="row"><div class="col-md-5 "><div class="form-group"><label class="form-label">Education</label><input type="text" class="form-control" name ="educations[]"  placeholder="Enter your Education"></div></div><div class="col-md-6"><div class="form-group"><label class="form-label">Education</label><input type="text" class="form-control" name ="educations[]"  placeholder="Enter your Education"></div></div><div class="col-md-1"><label class="form-label">&nbsp</label><button class="btn btn-danger remove_field4" type="button"><i class="fa fa-minus"></i></button></div></div>'); //add input box
            		}
            	});
        	
        	$(education_wrap).on("click",".remove_field4", function(e){ //user click on remove text
        		e.preventDefault(); $(this).parent().parent('div').remove(); m--;
            
        	});
        	var n = 1; //initlal text box count
        	$(memberships_more).click(function(e){ 
        	    e.preventDefault();
            		if(n < max_fields){
            			n++; 
            			$(memberships_wrap).append('<div class="row"><div class="col-md-5 "><div class="form-group"><label class="form-label">Memberships</label><input type="text" class="form-control" name ="memberships[]"  placeholder="Enter your Memberships"></div></div><div class="col-md-6"><div class="form-group"><label class="form-label">Memberships</label><input type="text" class="form-control" name ="memberships[]"  placeholder="Enter your Memberships"></div></div><div class="col-md-1"><label class="form-label">&nbsp</label><button class="btn btn-danger remove_field5" type="button"><i class="fa fa-minus"></i></button></div></div>'); //add input box
            		}
            	});
        	
        	$(memberships_wrap).on("click",".remove_field5", function(e){ //user click on remove text
        		e.preventDefault(); $(this).parent().parent('div').remove(); n--;
            
        	});
        	var p = 1; //initlal text box count
        	$(experience_more).click(function(e){ 
        	    e.preventDefault();
            		if(p < max_fields){
            			p++; 
            			$(experience_wrap).append('<div class="row"><div class="col-md-5 "><div class="form-group"><label class="form-label">Experience</label><input type="text" class="form-control" name ="experiencetext[]"  placeholder="Enter your Experience"></div></div><div class="col-md-6"><div class="form-group"><label class="form-label">Experience</label><input type="text" class="form-control" name ="experiencetext[]"  placeholder="Enter your Experience"></div></div><div class="col-md-1"><label class="form-label">&nbsp</label><button class="btn btn-danger remove_field6" type="button"><i class="fa fa-minus"></i></button></div></div>'); //add input box
            		}
            	});
        	
        	$(experience_wrap).on("click",".remove_field6", function(e){ //user click on remove text
        		e.preventDefault(); $(this).parent().parent('div').remove(); p--;
            
        	});
        	
        });
    </script>