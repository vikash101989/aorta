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
                                                             <input type="hidden" name = "role" value="customer">
                                                               <div class="col-sm-6 col-md-6">
                                                                    <?php echo form_error('fname', '<div class="error text-danger">', '</div>'); ?>
                                                                        <div class="form-group">
                                                                                <label class="form-label">First Name</label>
                                                                                <input type="text" name="fname" class="form-control" value="<?php echo $this->pfname ?>" placeholder="First Name">
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
                                                                <div class="col-sm-6 col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Blood Group</label>
                                                                            <select class="form-control" name = "bgroup" id="bgroup" >
                                                                                <option >Select Blood Group</option>
                                                                                <option value="A+">A+</option>
                                                                                <option value="A-">A-</option>
                                                                                <option value="B+">B+</option>
                                                                                <option value="B-">B-</option>
                                                                                <option value="O+">O+</option>
                                                                                <option value="O-">O-</option>
                                                                                <option value="AB+">AB+</option>
                                                                                <option value="AB-">AB-</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6">
                                                                        <div class="form-group">
                                                                                <label class="form-label">Gender</label>
                                                                                <select class="form-control" name = "gender" id="gender">
																					<option>Select Gender</option>
                                                                                    <option value="male">Male</option>
                                                                                    <option value="female">Female</option>
                                                                                    <option value="transgender">TransGender</option>
                                                                               </select>
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
		
<script>
    $(function(){
        let pbgroup = '<?php echo $this->pbgroup ?>';
        let pgender = '<?php echo $this->pgender; ?>';
		if(pbgroup){
			$('#bgroup').val(pbgroup);
        }
		if(pgende){
			$('#gender').val(pgender);
		}
       
    })
</script>