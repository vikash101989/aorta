<style>
    .ribbon span {
     width: 260px;
    }
.markt{
    position: absolute;
    right: 8px;
}
@media (min-width: 576px){
    .modal-dialog {
         width: 100%; 
    }
}
div#ferror {
    color: red;
}
</style>

    <div class="col-xl-9 col-lg-12 col-md-12">
		<div class ="row">
            <div class="col-sm-12">
                <div class="card">
					<div class="card-header">
						<h3 class="card-title">Members</h3>
						<div class="markt"><a href="#" class="btn btn-pill btn-primary pull-right" /*data-toggle="modal" data-target="#largeModal" */><i class="fa fa-user-plus" data-toggle="tooltip" title="" data-original-title="fa fa-user-plus"></i> Add New</a></div>
						
					</div>
					<div class="card-body">
						<div class="manged-ad table-responsive border-top userprof-tab">
							<table class="table table-bordered table-hover mb-0 text-nowrap">
								<thead>
									<tr>
										<th>Details</th>
										<th>MemberType</th>
										<th>Created Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								   <?php 
								   if($user_members){
								       foreach($user_members as $user_member){
								            $dateofexp = !empty($user_member['card_valid_upto']) ? date('Y-m-d', strtotime($user_member['card_valid_upto'])) : 'not set' ;
								            $cardtype = !empty($user_member['card_type']) ? explode(" ", $user_member['card_type']) : '' ;
                                            $pcreated_at = !empty($user_member['created_at'])? $user_member['created_at'] : '';
                                            if(!empty($cardtype)){
                                                if(strtolower($cardtype[0]) == 'free'){
                                                    $this->pcardtext = 'Basic';
                                                    $this->pcardclass = 'badge-primary';
                                                } else if(strtolower($cardtype[0])== 'premium'){
                                                    $this->pcardtext = 'Premium';
                                                    $this->pcardclass = 'badge-danger';
                                                } else if(strtolower($cardtype[0]) == 'silver'){
                                                    $this->pcardtext = 'Silver';
                                                    $this->pcardclass = 'badge-info';
                                                } else if(strtolower($cardtype[0]) == 'gold'){
                                                    $this->pcardtext = 'Gold';
                                                    $this->pcardclass = 'badge-yellow';
                                                } 
                                            }
								    ?>
									<tr>
										<td>
											<div class="media mt-0 mb-0">
												<div class="card-aside-img">
													<a href="#"></a>
													<?php if(!empty($user_member['profile_image'])){  
													    
                                                        $imgurl =  base_url('assets/images/profile/'). $user_member['profile_image'];
                                                        if (!@getimagesize($imgurl)) {
                                                            $imgurl =  base_url('assets/images/products/h1.png');
                                                        }
													} else {
													    $imgurl =  base_url('assets/images/products/h1.png');
													}?>
                                                    <img src="<?php echo $imgurl; ?>" class="icard-image" height="120" alt="user" >
                                                </div>
												<div class="media-body">
													<div class="card-item-desc ml-4 p-0 mt-2">
														<a href="#" class="text-dark"><h4 class="font-weight-semibold"><?php echo ucfirst($user_member['fname']) . " ".  ucfirst($user_member['lname']); ?></h4></a>
														<a href="#"><i class="fa fa-clock-o mr-1"></i> <?php echo $dateofexp ; ?></a><br>
													</div>
												</div>
											</div>
										</td>
										<td>
										    <?php if(!empty($this->pcardtext)) { ?>
										        <a href="<?php echo base_url('admin/cardprint/'.$user_member['id']);?>" class=" badge <?php echo $this->pcardclass; ?>" target="_blank"><?php echo $this->pcardtext; ?> </a>
										    <?php } else { ?>
										        <a href="https://aortadhc.com/admin/get_card?action=newcard" class="btn btn-primary btn-sm">Purches Card</a>
										    <?php } ?>
										</td>
										<td>
										    <?php echo $pcreated_at ; ?>
										</td>
										<td>
										    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
											<a class="btn btn-primary btn-sm text-white" href ="<?php echo base_url('admin/cardprint/'.$user_member['id']);?>" target="_blank" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
										</td>
									</tr>
									<?php } } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>
		
		
<!-- Large Modal -->
	<div id="largeModal" class="modal fade">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content ">
				<div class="modal-header pd-x-20">
					<h6 class="modal-title">Add Member</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body pd-20">
				    <form name="add_member" id ="add_member">
					    <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">First Name <span style="color:red;font-size: 9px"><i class="typcn typcn-starburst"></i></span></label>
                                    <input type="text" class="form-control" name = "fname" id = "fname" value="<?php echo set_value('fname'); ?>" placeholder="First Name" required>
                                    <div id="ferror"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name = "lname" value="<?php echo set_value('lname'); ?>" placeholder="last name">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name = "email" value="<?php echo set_value('email'); ?>" placeholder="Email Address" >
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Blood Group</label>
                                    <select class="form-control" name = "bgroup" id="bgroup" >
                                        <option value="">Select Blood Group</option>
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
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Gender</label>
                                    <select class="form-control" name = "gender" >
                                        <option value="male" selected>Male</option>
                                        <option value="female">Female</option>
                                        <option value="transgender">TransGender</option>
                                   </select>
                                </div>
                            </div>
                           <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Date of birth</label>
                                    <input type="text" class="form-control" id= "dob" name = "dob" value="<?php echo set_value('dob'); ?>" placeholder="Date of birth" >
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Father/Husband name</label>
                                    <input type="text" class="form-control" name = "fhname" value="<?php echo set_value('fhname'); ?>" placeholder="Father/Husband name" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Adhar number</label>
                                    <input type="text" class="form-control" name = "adharno" value="<?php echo set_value('adharno'); ?>" placeholder="Adhar number" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
                                    <label class="form-label">Zip Code</label>
                                    <input type="text" class="form-control" name = "zcode" value="<?php echo set_value('zcode'); ?>" placeholder="Zip Code" >
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
                            <div class="col-md-12 mt-2">
                                <div class="form-group mb-0">
                                    <label class="form-label">Upload Image</label>
                                    <div class="col-md-4">
                                            <input type="file" name ="profile_image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-primary" id="saveUsers">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
				</div><!-- modal-body -->
				<!--<div class="modal-footer">
					<button type="button" class="btn btn-primary">Save changes</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>-->
			</div>
		</div><!-- modal-dialog -->
	</div><!-- modal -->
<script>
    $(function(){
        $("#saveUsers").click(function(){
            let fname = $("#fname").val();
            if(fname == ''){
                $('#ferror').text('Enter first name');
                return false;
            } else {
                let data = $("#add_member").serialize();
                console.log(data);
            }
            
        });
        
    });
</script>
