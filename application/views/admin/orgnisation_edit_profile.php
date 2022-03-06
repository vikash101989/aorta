

<div class="col-xl-9 col-lg-12 col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Edit Profile</h3>
							</div>
							<div class="card-body">
								<div class="card-pay">
									<ul class="tabs-menu nav">
										<li class=""><a href="#tab1" class="active" data-toggle="tab"><i class="side-menu__icon si si-user"></i> Edit Profile </a></li>
										<li><a href="#tab2" data-toggle="tab" class=""><i class="side-menu__icon si fa fa-unlock-alt"></i>  Password Reset</a></li>
										<li><a href="#tab3" data-toggle="tab" class=""><i class="fa fa-envelope-open-o"></i>  Admin Message </a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active show" id="tab1">
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
                                            <div class="card mb-0">
                                                <div class="card-header">
                                                        <h3 class="card-title">Edit Profile</h3>
                                                </div>
                                                <div class="card-body">
                                                    <?php echo form_open_multipart('admin/update_profile'); ?>
                                                        <div class="row">
                                                             <input type="hidden" name = "edit_userid" value="<?php echo $this->pid; ?>">
                                                               <div class="col-sm-6 col-md-6">
                                                                    <?php echo form_error('fname', '<div class="error text-danger">', '</div>'); ?>
                                                                        <div class="form-group">
                                                                                <label class="form-label">First Name</label>
                                                                                <input type="text" name="fname" class="form-control disabled" value="<?php echo $this->pfname ?>" placeholder="First Name" readonly>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6">
                                                                        <div class="form-group">
                                                                                <label class="form-label">Last Name</label>
                                                                                <input type="text" name="lname" class="form-control" value="<?php echo $this->plname ?>" placeholder="Last Name">
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6">
                                                                        <div class="form-group">
                                                                                <label class="form-label">Email address</label>
                                                                                <input type="email" name ="email" class="form-control" value="<?php echo $this->pemail ?>" placeholder="Email">
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6">
                                                                        <div class="form-group">
                                                                             <?php echo form_error('mobile', '<div class="error text-danger">', '</div>'); ?>
                                                                                <label class="form-label">Phone Number</label>
                                                                                <input type="text" name ="mobile" class="form-control " value="<?php echo $this->pmobile ?>" placeholder="Mobile no" readonly>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6" id="hide-section">
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
                                                                <div class="col-sm-6 col-md-6">
                                                                        <div class="form-group">
                                                                                <label class="form-label">Exprerience</label>
                                                                                <input type="text" name="experience" class="form-control number" value="<?php echo $this->pexperience; ?>" placeholder="+ Exprerience in Year">
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Gender</label>
                                                                        <select class="form-control" name = "gender" id="genders" >
                                                                            <option value="">Select gender</option>
                                                                            <option value="male">Male</option>
                                                                            <option value="female">Female</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Organisation Name</label>
                                                                            <input type="text" class="form-control" name = "orgname" value="<?php echo $this->porganisation_name; ?>" placeholder="Organisation Name" >
                                                                        </div>
                                                                </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Discount</label>
                                                                            <input type="text" class="form-control number" name = "discount" value="<?php echo $this->pdiscount; ?>" placeholder="Discount in %" >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Medical Registration</label>
                                                                            <select class="form-control" name ="registrationsvalue">
                                                                                <option value="1">Verified</option>
                                                                                <option value="0">Not Verified</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Registration Details</label>
                                                                            <input type="text" class="form-control number" name = "registrationstext" placeholder="Enter Registration Details" >
                                                                        </div>
                                                                    </div>
                                                                <?php for($i= 0; $i < 3; $i++) { ?>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Start Time</label>
                                                                                <input type="time" class="form-control number" name ="fromtime[]" value="<?php echo !empty($this->pstarttime[$i]) ? $this->pstarttime[$i] : "00:00"; ?>" min="00:00" max="24:00" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label class="form-label">End Time</label>
                                                                                <input type="time" class="form-control number" name ="endtime[]" value="<?php echo !empty($this->pendtime[$i]) ? $this->pendtime[$i] : "00:00"; ?>" min="00:00" max="24:00">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    <?php } ?>   
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
                                                                                                <input type="text" class="form-control"  name ="services[]"  value="<?php echo !empty($this->pservices[$i]) ? $this->pservices[$i] : ""; ?>" placeholder="Enter your Services">
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
                                                                                                <input type="text" class="form-control"  name ="specializations[]" value="<?php echo !empty($this->pspecializations[$i]) ? $this->pspecializations[$i] : ""; ?>" placeholder="Enter your Specializations">
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
                                                                                                <input type="text" class="form-control"  name ="awards[]"  value="<?php echo !empty($this->pawards[$i]) ? $this->pawards[$i] : ""; ?>" placeholder="Enter your Awards and Recognitions">
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
                                                                                                <input type="text" class="form-control"  name ="educations[]"  value="<?php echo !empty($this->peducations[$i]) ? $this->peducations[$i] : ""; ?>" placeholder="Enter your Education">
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
                                                                                                <input type="text" class="form-control"  name ="memberships[]"  value="<?php echo !empty($this->pmemberships[$i]) ? $this->pmemberships[$i] : ""; ?>" placeholder="Enter your Memberships">
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
                                                                                                <input type="text" class="form-control"  name ="experiencestext[]"  value="<?php echo !empty($this->pexperiencestext[$i]) ? $this->pexperiencestext[$i] : ""; ?>" placeholder="Enter your Experience">
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php } ?>
                                    											    </div>
                                    											</div>
                                    										</div>
                                    									</div>
                                    								</div>
                                    							</div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Consultancy charges</label>
                                                                        <input type="text" class="form-control number" name = "generalfee" value="<?php echo $this->pgeneralfee ; ?>" placeholder="Enter Consultancy charges" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                        <div class="form-group">
                                                                                <label class="form-label">Address</label>
                                                                                <input type="text" name ="address" class="form-control" value="<?php echo $this->paddress ?>" placeholder="Home Address">
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-6 col-md-4">
                                                                        <div class="form-group">
                                                                                <label class="form-label">City</label>
                                                                                <input type="text" name ="city" class="form-control" value="<?php echo $this->pcity ?>" placeholder="City">
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-6 col-md-3">
                                                                        <div class="form-group">
                                                                                <label class="form-label">State</label>
                                                                                <input type="text" name ="state" class="form-control" value="<?php echo $this->pstate ?>" placeholder="State">
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-5">
                                                                        <div class="form-group">
                                                                                <label class="form-label">Country</label>
                                                                                <select class="form-control select2-show-search border-bottom-0 w-100 select2-show-search" name ="country"  data-placeholder="Select">
                                                                                        <optgroup label="Categories">
                                                                                                <option value="india">India</option>
                                                                                                <option value="nepal">Nepal</option>
                                                                                        </optgroup>
                                                                                </select>
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                        <div class="form-group">
                                                                                <label class="form-label">Short Description</label>
                                                                                <textarea rows="5" name ="description" class="form-control" placeholder="Enter About your description"><?php echo $this->pdescription ?></textarea>
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                        <div class="form-group mb-0">
                                                                                <label class="form-label">Upload Image</label>
                                                                                <div class="custom-file">
                                                                                        <input type="file" name ="profile_image" class="custom-file-input" name="example-file-input-custom">
                                                                                        <label class="custom-file-label">Choose file</label>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                             </div>
                                                    </div>
                                                <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary pull-right">Updated Profile</button>
                                                </div>
                                                </form>
                                            </div>
										</div>
										<div class="tab-pane" id="tab2">
											<div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="card m-b-20">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Reset Your Password</h3>
                                                    </div>
                                                     <span class="pull-right text-center text-danger mt-3" id="pass_err"></span>
                                                    <div class="card-body mb-0">
                                                       
                                                        <form class="form-horizontal">
                                                            
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <label class="form-label" id="inputPassword5">New Password</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input type="password" class="form-control" id="inputPassword6" placeholder="New Password">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <label class="form-label" id="inputPassword7">Re Password</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input type="password" class="form-control" id="inputPassword8" placeholder="Retype Password">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-0 row justify-content-end">
                                                                <div class="col-md-9 float-right">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light pull-right" id ="password_reset" >Submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
										</div>
										<div class="tab-pane" id="tab3">
										    <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="form-label">Message</label>
                                                    <textarea class="form-control" name="maintailgenerals" rows="4" placeholder="Enter message " spellcheck="true"></textarea>
                                                </div>
                                                <div class="form-group mb-0 row justify-content-end">
                                                    <div class="col-md-9 float-right">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light pull-right" id ="admin_message" >Submit</button>
                                                    </div>
                                                </div>
                                            </form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--<div class="card mb-0">
							<div class="card-header">
								<h3 class="card-title">Payments</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive border-top">
									<table class="table table-bordered table-hover text-nowrap">
										<thead>
											<tr>
												<th>Invoice ID</th>
												<th>Category</th>
												<th>Purchase Date</th>
												<th>Price</th>
												<th>Due Date</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>#INV-348</td>
												<td>Restaurant</td>
												<td>07-12-2018</td>
												<td class="font-weight-semibold fs-16">$89</td>
												<td>17-12-2018</td>
												<td>
													<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
													<a class="btn btn-danger btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a><br>
												</td>
											</tr>
											<tr>
												<td>#INV-186</td>
												<td>Rela Estate</td>
												<td>02-12-2018</td>
												<td class="font-weight-semibold fs-16">$14,276</td>
												<td>14-12-2018</td>
												<td>
													<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
													<a class="btn btn-danger btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a><br>
												</td>
											</tr>
											<tr>
												<td>#INV-831</td>
												<td>Jobs</td>
												<td>30-11-2018</td>
												<td class="font-weight-semibold fs-16">$25,000</td>
												<td>04-12-2018</td>
												<td>
													<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
													<a class="btn btn-danger btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a><br>
												</td>
											</tr>
											<tr>
												<td>#INV-672</td>
												<td>Education</td>
												<td>25-18-2018</td>
												<td class="font-weight-semibold fs-16">$50.00</td>
												<td>07-12-2018</td>
												<td>
													<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
													<a class="btn btn-danger btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a><br>
												</td>
											</tr>
											<tr>
												<td>#INV-428</td>
												<td>Electornics</td>
												<td>24-11-2018</td>
												<td class="font-weight-semibold fs-16">$99.99</td>
												<td>11-12-2018</td>
												<td>
													<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
													<a class="btn btn-danger btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a><br>
												</td>
											</tr>
											<tr>
												<td>#INV-543</td>
												<td>Vechicle</td>
												<td>22-11-2018</td>
												<td class="font-weight-semibold fs-16">$145</td>
												<td>12-12-2018</td>
												<td>
													<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
													<a class="btn btn-danger btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a><br>
												</td>
											</tr>
											<tr>
												<td>#INV-986</td>
												<td>Pet & Animals</td>
												<td>18-11-2018</td>
												<td class="font-weight-semibold fs-16">$378</td>
												<td>07-12-2018</td>
												<td>
													<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
													<a class="btn btn-danger btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a><br>
												</td>
											</tr>
											<tr>
												<td>#INV-867</td>
												<td>Cloting</td>
												<td>17-11-2018</td>
												<td class="font-weight-semibold fs-16">$509.00</td>
												<td>06-12-2018</td>
												<td>
													<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
													<a class="btn btn-danger btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a><br>
												</td>
											</tr>
											<tr>
												<td>#INV-893</td>
												<td>Computer</td>
												<td>16-11-2018</td>
												<td class="font-weight-semibold fs-16">$347</td>
												<td>30-11-2018</td>
												<td>
													<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
													<a class="btn btn-danger btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a><br>
												</td>
											</tr>
											<tr>
												<td>#INV-267</td>
												<td>Health & Fitness</td>
												<td>12-11-2018</td>
												<td class="font-weight-semibold fs-16">$895</td>
												<td>27-11-2018</td>
												<td>
													<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
													<a class="btn btn-danger btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a><br>
												</td>
											</tr>
											<tr>
												<td>#INV-931</td>
												<td>Beauty & Spa</td>
												<td>11-11-2018</td>
												<td class="font-weight-semibold fs-16">$765</td>
												<td>25-12-2018</td>
												<td>
													<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
													<a class="btn btn-danger btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a><br>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<ul class="pagination">
									<li class="page-item page-prev disabled">
										<a class="page-link" href="#" tabindex="-1">Prev</a>
									</li>
									<li class="page-item active"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item page-next">
										<a class="page-link" href="#">Next</a>
									</li>
								</ul>
							</div>
						</div>-->
					</div>
				</div>
			</div>
		</section>
		<!--/User dashboard-->