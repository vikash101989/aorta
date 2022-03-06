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
$description = !empty($user_data['description']) ? $user_data['description']: "";
$image = !empty($user_data['profile_image']) ? $user_data['profile_image']: "";
$gender = !empty($user_data['gender']) ? $user_data['gender']: "";
$dob = !empty($user_data['dob']) ? $user_data['dob']: "";
$pay_status = isset($user_data['payment_status']) ? $user_data['payment_status']: "";
$role = !empty($user_data['role']) ? $user_data['role']: "";
$fhname = !empty($user_data['fhname']) ? $user_data['fhname']: "";
$zcode = !empty($user_data['zipcode']) ? $user_data['zipcode']: "";
$adharno = !empty($user_data['adharno']) ? $user_data['adharno']: "";
$bgroup = !empty($user_data['bgroup']) ? $user_data['bgroup']: "";
$card_type = !empty($user_data['card_type']) ? $user_data['card_type']: "";
if(!empty($user_data['profile_image'])){
    $img_ulr = base_url('assets/images/profile/').$user_data['profile_image'];
    if (!@getimagesize($img_ulr)) {
        $img_ulr =  '';
    } 
} else {
    $img_ulr = ''; 
}
?>
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Patient</h3>
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
                        <?php echo form_open_multipart('admin/update_profile'); ?>
                            <div class="row">
                                <input type="hidden" name = "edit_userid" value="<?php echo $this->uri->segment(3); ?>">
                                <input type="hidden" name = "role" value="customer">
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
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" name = "email" value="<?php echo $email; ?>" placeholder="Email address" >
                                    </div>
                                </div>
                            </div>
                        <div class="row">
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
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Blood Group</label>
                                    <select class="form-control" name = "bgroup" id="bgroup" >
                                        <option value="">Select BloodGroup</option>
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
                                    <label class="form-label">Date of birth</label>
                                    <input type="text" class="form-control" id= "dob" name = "dob" value="<?php echo $dob; ?>" placeholder="Date of birth" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Father/Husband name</label>
                                    <input type="text" class="form-control" name = "fhname" value="<?php echo $fhname; ?>" placeholder="Father/Husband name" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                 <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Adhar number</label>
                                    <input type="text" class="form-control" name = "adharno" value="<?php echo $adharno; ?>" placeholder="Adhar number" >
                                </div>
                            </div>
                             <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Card Type</label>
                                    <select class="form-control" name = "card_type" id ="card_type" >
                                        <option value="Free Member">Basic</option>
                                        <option value="Premium Member">Premium</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Payment Status</label>
                                    <select class="form-control custom-select" name = "pay_satatus" id ="pay_satatus">
                                        <option value="0">Not Done</option>
                                        <option value="1">Done</option>
                                    </select>
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
                                    <label class="form-label">Zip Code</label>
                                    <input type="text" class="form-control" name = "zcode" value="<?php echo $zcode; ?>" placeholder="Zip Code" >
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
                                <div class="col-md-4">
                                    <div class="form-group mb-0">
                                        <label class="form-label">Upload Image</label>
                                        <div class="custom-file">
                                            <input type="file" name ="profile_image" value="<?php echo $image; ?>" class="dropify" data-default-file="<?php echo $img_ulr; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script>
    $(function(){
       let gender = "<?php echo $gender; ?>";
       let pay_status = "<?php echo $pay_status; ?>";
       let bgroup = "<?php echo $bgroup; ?>";
       let card_type = "<?php echo $card_type; ?>";
       $('#genders').val(gender);
       $('#pay_satatus').val(pay_status);
       $('#bgroup').val(bgroup);
       $('#card_type').val(card_type);
       $( "#dob").datepicker({ 
            changeMonth: true, 
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            maxDate: '0',
        }); 
    });
</script>