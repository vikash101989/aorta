<style>
    .copy.hide {
        display: none;
    }
</style>

<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card">
               
                    <div class="card-header">
                        <h3 class="card-title">Add Patient</h3>
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
            								    UserID : <?php echo $msg['mobile']; ?>
            								</div>
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
                            <?php endif; ?>
                        <?php echo form_open_multipart('admin/patient_register'); ?>
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">First Name <span style="color:red;font-size: 9px"><i class="typcn typcn-starburst"></i></span></label>
                                    <input type="text" class="form-control" name = "fname" value="<?php echo set_value('fname'); ?>" placeholder="First Name" required>
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
                                    <input type="text" class="form-control number" name = "mobile" value="<?php echo set_value('mobile'); ?>" placeholder="Mobile" autocomplete="off" maxlength="10" required>
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
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Gender</label>
                                    <select class="form-control" name = "gender" >
                                        <option value="male" selected>Male</option>
                                        <option value="female">Female</option>
                                        <option value="transgender">TransGender</option>
                                   </select>
                                </div>
                            </div>
                           <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Date of birth</label>
                                    <input type="text" class="form-control" id= "dob" name = "dob" value="<?php echo set_value('dob'); ?>" placeholder="Date of birth" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Father/Husband name</label>
                                    <input type="text" class="form-control" name = "fhname" value="<?php echo set_value('fhname'); ?>" placeholder="Father/Husband name" >
                                </div>
                            </div>
                            </div>
                             <div class="row">
                                 <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Adhar number</label>
                                    <input type="text" class="form-control" name = "adharno" value="<?php echo set_value('adharno'); ?>" placeholder="Adhar number" >
                                </div>
                            </div>
                             <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Card Type</label>
                                    <select class="form-control" name = "card_type" >
                                        <option value="Free Member" selected>Basic</option>
                                        <option value="Premium Member">Premium</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Payment status</label>
                                    <select class="form-control" name = "payment">
                                        <option value="0" >No Payment</option>
                                        <option value="1" selected>By cash</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--
                            -->
                           
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

$(function() {
    $( "#dob").datepicker({ 
        changeMonth: true, 
        changeYear: true,
        dateFormat: 'dd-mm-yy',
        maxDate: '0',
    }); 
});
</script>