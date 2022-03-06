<?php 
$fname = !empty($user_data['fname']) ? $user_data['fname']: ""; 
$lname = !empty($user_data['lname']) ? $user_data['lname']: "";
$email = !empty($user_data['email']) ? $user_data['email']: "";
$mobile = !empty($user_data['mobile']) ? $user_data['mobile']: "";
$experience = !empty($user_data['experience']) ? $user_data['experience']: "";
$city = !empty($user_data['city']) ? $user_data['city']: "";
$state = !empty($user_data['state']) ? $user_data['state']: "";
$country = !empty($user_data['counrty']) ? $user_data['county']: "";
$address = !empty($user_data['address']) ? $user_data['address']: "";
$organisation_name = !empty($user_data['organisation_name']) ? $user_data['organisation_name']: "";
$discount = !empty($user_data['discount']) ? $user_data['discount']: "";
$description = !empty($user_data['description']) ? $user_data['description']: "";
$image = !empty($user_data['profile_image']) ? $user_data['profile_image']: "";
$this->role = !empty($user_data['role']) ? $user_data['role']: "";
$this->specialization = !empty($user_data['specialization']) ? $user_data['specialization']: "";
$this->gender = !empty($user_data['gender']) ? $user_data['gender']: "";
$pay_status = isset($user_data['payment_status']) ? $user_data['payment_status']: "";
$starttime = !empty($user_data['starttime']) ? json_decode($user_data['starttime'], true): [];
$endtime = !empty($user_data['endtime']) ? json_decode($user_data['endtime'], true): [];
$services = !empty($user_data['services']) ? json_decode($user_data['services'], true): [];
$specializations = !empty($user_data['specializations']) ? json_decode($user_data['specializations'], true): [];
$awards = !empty($user_data['awards']) ? json_decode($user_data['awards'], true): [];
$educations = !empty($user_data['educations']) ? json_decode($user_data['educations'], true): [];
$memberships = !empty($user_data['memberships']) ? json_decode($user_data['memberships'], true): [];
$experiencestext = !empty($user_data['experiencestext']) ? json_decode($user_data['experiencestext'], true): [];
$generalfee = !empty($user_data['generalfee']) ? $user_data['generalfee']: 0.00;
?>
<style>
.panel-heading1 {
    box-shadow: 1px 2px #f1f1f1;
    border: 1px solid #d3dadf;
}
</style>
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="row mt-5">
            <div class="col-lg-12">
                <?php echo form_open_multipart('admin/update_profile', array('class' => 'card') ); ?>
                    <div class="card-header">
                        <h3 class="card-title">Edit Members</h3>
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
                                if(!empty($msg)): ?>
                                <div class="alert alert-success alert-dismissible">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                 <h6></i> <?php echo $msg; ?></h6>
                               </div>
                            <?php endif; ?>

                        <div class="row">
                            <input type="hidden" name = "edit_userid" value="<?php echo $this->uri->segment(3); ?>">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" name = "fname" value="<?php echo $fname; ?>" placeholder="First Name" >
                                </div>
                                <?php echo form_error('fname', '<div class="error text-danger">', '</div>'); ?>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name = "lname" value="<?php echo $lname; ?>" placeholder="last name">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Mobile No</label>
                                    <input type="text" class="form-control number" name = "mobile" value="<?php echo $mobile; ?>" placeholder="Mobile no." autocomplete="off" maxlength="10">
                                </div>
                                <?php echo form_error('mobile', '<div class="error text-danger">', '</div>'); ?>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Emai</label>
                                    <input type="text" class="form-control" name = "email" value="<?php echo $email; ?>" placeholder="Email address" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Role</label>
                                    <select class="form-control custom-select" name = "role" id="roles" >
                                        <option value="customer">Select Role</option>
                                        <option value="customer">Customer</option>
                                        <option value="doctor">Doctor</option>
                                        <option value="hospital">Hospital</option>
                                        <option value="laboratories">Laboratries</option>
                                        <option value="medicalhall">Medical Hall</option>
                                        <option value="other">Others</option>
                                        <option value="pharmacy">Pharmacy</option>
										<option value="babycare">Baby Care</option>
                                        <?php if($this->role =='admin'){ ?>
                                        <option value="employee">Employee</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3" id="hide-section">
                                <div class="form-group">
                                    <label class="form-label">Specialization</label>
                                    <select class="form-control select2-show-search border-bottom-0 w-100" data-placeholder="Select" name ="specialization" id ="specialization">
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
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3" id="hide-section1">
                                <div class="form-group">
                                    <label class="form-label">Experience</label>
                                    <input type="number" class="form-control" name = "experience" value="<?php echo $experience; ?>" placeholder="+ Exprerience in Year">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Gender</label>
                                    <select class="form-control" name = "gender" id="genders" >
                                        <option value="">Select gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">Organisation Name</label>
                                    <input type="text" class="form-control" name = "orgname" value="<?php echo $organisation_name; ?>" placeholder="Organisation Name" >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-label">Discount</label>
                                    <input type="text" class="form-control number" name = "discount" value="<?php echo $discount; ?>" placeholder="Discount in %" >
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Registration Details</label>
                                    <input type="text" class="form-control number" name = "registrationstext" value="<?php echo set_value('registrationstext'); ?>" placeholder="Enter Registration Details" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php for($i= 0; $i < 3; $i++) { ?>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-label">Start Time</label>
                                    <input type="time" class="form-control number" name ="fromtime[]" value="<?php echo !empty($starttime[$i]) ? $starttime[$i] : "00:00"; ?>" min="00:00" max="24:00" >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-label">End Time</label>
                                    <input type="time" class="form-control number" name ="endtime[]" value="<?php echo !empty($endtime[$i]) ? $endtime[$i] : "00:00"; ?>" min="00:00" max="24:00">
                                </div>
                            </div>
                            
                        <?php } ?>   
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-group1" id="accordion2">
									<div class="panel panel-default mb-4">
										<div class="panel-heading1 ">
											<h4 class="panel-title1">
												<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour" aria-expanded="false">Services</a>
											</h4>
										</div>
										<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
											<div class="panel-body">
											    <div class="row">
											        <?php for($i= 0; $i <6; $i++) { ?>
											        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"  name ="services[]"  value="<?php echo !empty($services[$i]) ? $services[$i] : ""; ?>" placeholder="Enter your Services">
                                                        </div>
                                                    </div>
                                                    <?php } ?>
											    </div>
											</div>
										</div>
									</div>
									<div class="panel panel-default mb-4">
										<div class="panel-heading1">
											<h4 class="panel-title1">
												<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive" aria-expanded="false">Specializations</a>
											</h4>
										</div>
										<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
											<div class="panel-body">
											<div class="row">
											        <?php for($i= 0; $i <6; $i++) { ?>
											        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"  name ="specializations[]" value="<?php echo !empty($specializations[$i]) ? $specializations[$i] : ""; ?>" placeholder="Enter your Specializations">
                                                        </div>
                                                    </div>
                                                    <?php } ?>
											    </div>
											</div>
										</div>
									</div>
									<div class="panel panel-default mb-4">
										<div class="panel-heading1">
											<h4 class="panel-title1">
												<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne" aria-expanded="false">Awards and Recognitions</a>
											</h4>
										</div>
										<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
											<div class="panel-body">
											<div class="row">
											        <?php for($i= 0; $i <6; $i++) { ?>
											        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"  name ="awards[]"  value="<?php echo !empty($awards[$i]) ? $awards[$i] : ""; ?>" placeholder="Enter your Awards and Recognitions">
                                                        </div>
                                                    </div>
                                                    <?php } ?>
											    </div>
											</div>
										</div>
									</div>
									<div class="panel panel-default mb-4">
										<div class="panel-heading1">
											<h4 class="panel-title1">
												<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" aria-expanded="false">Education</a>
											</h4>
										</div>
										<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
											<div class="panel-body">
											<div class="row">
											        <?php for($i= 0; $i <6; $i++) { ?>
											        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"  name ="educations[]"  value="<?php echo !empty($educations[$i]) ? $educations[$i] : ""; ?>" placeholder="Enter your Education">
                                                        </div>
                                                    </div>
                                                    <?php } ?>
											    </div>
											</div>
										</div>
									</div>
									<div class="panel panel-default mb-4">
										<div class="panel-heading1">
											<h4 class="panel-title1">
												<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree" aria-expanded="false">Memberships</a>
											</h4>
										</div>
										<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
											<div class="panel-body">
											<div class="row">
											        <?php for($i= 0; $i <6; $i++) { ?>
											        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"  name ="memberships[]"  value="<?php echo !empty($memberships[$i]) ? $memberships[$i] : ""; ?>" placeholder="Enter your Memberships">
                                                        </div>
                                                    </div>
                                                    <?php } ?>
											    </div>
											</div>
										</div>
									</div>
									<div class="panel panel-default mb-4">
										<div class="panel-heading1">
											<h4 class="panel-title1">
												<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix" aria-expanded="false">Experience</a>
											</h4>
										</div>
										<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
											<div class="panel-body">
											<div class="row">
											        <?php for($i= 0; $i <6; $i++) { ?>
											        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"  name ="experiencestext[]"  value="<?php echo !empty($experiencestext[$i]) ? $experiencestext[$i] : ""; ?>" placeholder="Enter your Experience">
                                                        </div>
                                                    </div>
                                                    <?php } ?>
											    </div>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Consultancy charges</label>
                                    <input type="text" class="form-control number" name = "generalfee" value="<?php echo $generalfee ; ?>" placeholder="Enter Consultancy charges" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name = "address" value="<?php echo $address; ?>" placeholder="Home Address" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" name = "city" value="<?php echo $city; ?>" placeholder="City" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">State</label>
                                    <input type="text" class="form-control" name = "state" value="<?php echo $state; ?>" placeholder="State" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select class="form-control custom-select" name = "country" value="<?php echo $country; ?>" >
                                        <option value="india">India</option>
                                        <option value="nepal">Nepal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label class="form-label">About Me</label>
                                    <textarea rows="5" class="form-control" name = "description" placeholder="Enter About your description"><?php echo $description; ?></textarea>
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
                            <!---<div class="col-md-12 mt-2">
                                <div class="form-group mb-0">
                                    <label class="form-label">Upload Image</label>
                                    <div class="custom-file">
                                        <input type="file" name ="profile_image" value="<?php echo $image; ?>" class="custom-file-input" name="example-file-input-custom">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>--->
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>