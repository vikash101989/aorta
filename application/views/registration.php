<style>
    .sptb {
    background: #ffffff;
}
 .text-marquee{
     color: #8e848f;
 }
 .stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.form-group.has-error {
    border: 1px solid #e9dddd;
    background: #f3c8c1;
    padding: 5px;
}
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>
<?php 
$action = $this->input->get('action');
$refrelValue = '';
if(!empty($action)){
    $ractive = (($action=='registration') || ($action!='') )? 'active' : '';
    $lactive = ($action=='login') ? 'active' : '';
    $refrelValue = (!empty($action) && $action !='registration') ? $action : '';
} else {
    $ractive = '';
    $lactive = 'active' ;
}

?>
<section class="sptb">
        <div class="container customerpage">
                    <div class="col-lg-8 d-block ">
                        <marquee>
                            <h4 class= "text-marquee">A Card holders can get discounts up to 50% on each Booking </h4>
                        </marquee>
                    </div> 
                                <div class="col-lg-4 d-block ml-auto">
                                    <?php if(validation_errors()){?>
                                    <div class="alert alert-danger alert-dismissible"> 
                                        <?php $active = "active"; 
                                        echo validation_errors(); ?>
                                    </div>
                                    <?php }?>
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
                                        <div class="col-xl-12 col-md-12 col-md-12 register-right">
                                                <ul class="nav nav-tabs nav-justified mb-5 p-2 border" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                                <a class="nav-link <?php if(!empty($lactive)){echo 'active';} ?> m-1" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
                                                        </li>
                                                        <li class="nav-item">
                                                                <a class="nav-link <?php if(!empty($ractive)){echo 'active';} ?> m-1" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
                                                        </li>
                                                </ul>
                                                <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade show <?php if(!empty($lactive)){echo 'active';} ?>" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                                <div class="card mb-0">
                                                                        <div class="card-header">
                                                                                <h3 class="card-title">Login to your Account</h3>
                                                                        </div>
                                                                        <div class="card-body">
                                                                               
                                                                            <form id= "basic-form-login" action="<?php echo base_url('admin/login'); ?>" method="post">
                                                                                <div class="tab">
                                                                                <div class="form-group">
                                                                                    <label class="form-label text-dark">Mobile No <span style="color:red;font-weight:bold"><i class="typcn typcn-starburst"></i></span><span id="error-message"></span></label>
                                                                                    <input type="text" id ="uphone" class="form-control number" placeholder="Enter Your 10 Digit mobile number" name ="mobile" value="<?php echo set_value('mobile'); ?>" maxlength="10" required>
                                                                                </div>
                                                                                </div>
                                                                                <div class="tab">
                                                                                <div class="form-group">
                                                                                    <label class="form-label text-dark">OTP number <span style="color:red;font-weight:bold"><i class="typcn typcn-starburst"></i></span> </label>
                                                                                    <input type="text" class="form-control" name ="otp" id ="otp" placeholder="Enter OTP number" value="<?php echo set_value('otp'); ?>" required>
                                                                                </div>
                                                                                </div>
                                                                                <div style="overflow:auto;">
                                                                                    <div style="float:right;">
                                                                                    <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                                                                    <button type="button" class="btn btn-primary"  id="nextBtn" onclick="nextPrev(1)">Next</button>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Circles which indicates the steps of the form: -->
                                                                                <div style="text-align:center;margin-top:40px;display:none">
                                                                                    <span class="step"></span>
                                                                                    <span class="step"></span>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="tab-pane fade show <?php if(!empty($ractive)){echo 'active';} ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                                <div class="card mb-0">
                                                                        <div class="card-header">
                                                                                <h3 class="card-title">Create an Account</h3>
                                                                               
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="stepwizard">
                                                                                    <div class="stepwizard-row setup-panel">
                                                                                    <div class="stepwizard-step">
                                                                                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                                                                        <p>Step 1</p>
                                                                                    </div>
                                                                                    <div class="stepwizard-step">
                                                                                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                                                                        <p>Step 2</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <form id= "basic-form" action="<?php echo base_url('admin/save'); ?>" method="post">
                                                                                    <div class="setup-content" id="step-1">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label text-dark">Mobile No <span style="color:red;font-weight:bold"><i class="typcn typcn-starburst"></i></span><span id="error-message"></span></label>
									                                                            <input type="text" id ="umobile" class="form-control number" placeholder="Enter Your 10 Digit mobile number" name ="umobile" value="<?php echo set_value('umobile'); ?>" maxlength="10" required>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <button class="btn btn-primary nextBtn pull-right" type="button" >Next</button>
                                                                                            </div>
                                                                                    </div>
                                                                                <div class="row setup-content" id="step-2">
                                                                                    <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label text-dark">OTP number <span style="color:red;font-weight:bold"><i class="typcn typcn-starburst"></i></span> </label>
										                                                        <input type="text" class="form-control" name ="otp" id ="otp" placeholder="Enter OTP number" value="<?php echo set_value('otp'); ?>" required>
                                                                                            </div>
                                                                                            <!-- <div class="form-group">
                                                            								<label for="inputState" class="form-label text-dark">Select Role</label>
                                                            									<select id="inputState" name = "selectrole" class="form-control" required>
                                                            										<option value="customer">Select Role</option>
                                                            										<option value="customer">Patient</option>
                                                            										<option value="doctor">Doctor</option>
                                                            										<option value="hospital">Hospital</option>
                                                            										<option value="laboratories">Diagnostic Center</option>
                                                            										<option value="medicalhall">Pharmacy</option>
                                                            										<option value="babycare">Baby Care</option>
                                                            										<option value="other">Others</option>
                                                            									</select>
                                                            								</div>
                                                            								<div class="form-group">
                                                            									<label class="form-label text-dark">Full Name <span style="color:red;font-weight:bold"><i class="typcn typcn-starburst"></i></span> </label>
                                                            										<input type="text" class="form-control" name ="uname" id ="uname" placeholder="Enter your full name" value="<?php echo set_value('uname'); ?>" required>
                                                            								</div> -->
                                                            								<div class="form-group">
                                                            									<label class="form-label text-dark">Mobile No <span style="color:red;font-weight:bold"><i class="typcn typcn-starburst"></i></span></label>
                                                            									<input type="text" id ="mmobile" class="form-control" placeholder="Enter mobile" name ="mmobile" readonly>
                                                            								</div>
                                                            							
                                                            								<!--<div class="form-group">
                                                            										<label class="form-label text-dark">Email address</label>
                                                            										<input type="email" name ="email"  class="form-control" placeholder="Enter email" value="<?php echo set_value('email'); ?>" >
                                                            								</div> 
                                                            								<div class="form-group row justify-content-end">
                                                            									<div class="col-md-9">
                                                            										<label class="custom-control custom-checkbox">
                                                            											<input type="checkbox" class="custom-control-input" name ="termcondition" value ="5" required>
                                                            											<span class="custom-control-label text-dark"> I accept <span><a href ="<?php echo base_url('aorta/term_condition');?>"><u>term and condition</u></a></span> </span><span style="color:red;font-weight:bold"><i class="typcn typcn-starburst"></i></span>
                                                            										</label>
                                                            									</div>
                                                            								</div>-->
                                                            								 <input type="hidden" name="refralValue" value="<?php echo $refrelValue;?>">
                                                            								<div class="form-footer mt-2">
                                                            									<button type="submit" class="btn btn-primary btn-block" >Create New Account</button>
                                                            								</div>
                                                                                     </div>
                                                                                </div>
                                                                            </form>
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
<!--/Login-Section-->
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  if(n == -1){
    var x = document.getElementsByClassName("tab");
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;
    showTab(currentTab);
  } else {
    if (n == 1 && !validateForm()) return false;
    if($("#nextBtn").text() == 'Submit'){
        document.getElementById("basic-form-login").submit();
        return false;
    }
    let url = '<?php echo base_url();?>admin/login_otp';
    let umobile = $('#uphone').val();
    let data = {"mobile": umobile}
    callState(data, url ).then(response => {
        console.log(response);
        //var response  = JSON.parse(value);
            if(response.statuscode){
                toastr.success(response.message);
                var x = document.getElementsByClassName("tab");
                // Exit the function if any field in the current tab is invalid:
                
                // Hide the current tab:
                x[currentTab].style.display = "none";
                // Increase or decrease the current tab by 1:
                currentTab = currentTab + n;
                showTab(currentTab);
            } else {
                toastr.error(response.message);
                return false;
            }
    });
  }
  
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

function callAjax(requestdata, endpoint) {
    return new Promise(function (resolve, reject) {
        $.ajax({
            url: endpoint,				
            type : 'POST',	
            data : requestdata,
            dataType: 'json',
            success : function(response){	
                resolve(response);
            }
        });
    });
}
async function callState(requestdata, endpoint) {
    return await callAjax(requestdata, endpoint); 
}
        
</script>
