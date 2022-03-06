<style>
    div#showerro {
        text-align: center;
        color: #050505;
        background: #ffffff;
        padding: 10px;
    }
    .ribbon-top-right {
        top: -1px;
        right: -25px;
    }
    .ribbon {
        width: 178px;
    }
    i.fa.fa-check-square.icon-color-success {
        margin-right: 4px;
        color: green;
    }
    i.fa.fa-check-square.icon-color-warning {
        margin-right: 4px;
        color: #FF5722;
    }
    a.more-color {
        color: blue;
    }
    .tab-menu-heading {
        background: #f6f6f6;
    }
    
    .error {
        border: 1px solid red;
    }
</style>
<!-- Tabs Style -->
	<!-- 	<link href="/assets/plugins/tabs/style.css" rel="stylesheet" />-->
<!--Add listing-->
<section class="sptb">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12">
                <?php 
                $discount = $price = $registrationsvalue = $generalfee = $uid = 0;
                $full_address = $specialization = $organisation_name = $name =  $date = $phone = $description = $locationcordinate =  $profile_image =  '';
                $registrationstext = $starttime = $endtime = $services = $specializations = $awards = $educations = $memberships = $experiencestext = [];
                if(!empty($datas)){
                    
                    $id = !empty($datas[0]['id']) ? $datas[0]['id']: '';
                    $uid = !empty($datas[0]['userid']) ? $datas[0]['userid']: '';
                    $lname = !empty($datas[0]['lname']) ? $datas[0]['lname'] :'';
                    $title =($datas[0]['role']=='doctor')? "Dr. " : '';
                    $name = !empty($datas[0]['fname']) ? $title. " ". $datas[0]['fname'] ." ". $lname :'';
                    $profile_image = !empty($datas[0]['profile_image']) ? $datas[0]['profile_image'] :'';
                    $specialization = !empty($datas[0]['specialization']) ? $datas[0]['specialization'] :'';
                    $organisation_name = !empty($datas[0]['organisation_name']) ? $datas[0]['organisation_name'] :'';
                    $date = date(" F Y ", strtotime($datas[0]['created_at']));
                    $address = !empty($datas[0]['address']) ? $datas[0]['address'] :'';
                    $city = !empty($datas[0]['city']) ? $datas[0]['city'] :'';
                    $state = !empty($datas[0]['state']) ? $datas[0]['state'] :'';
                    $country = !empty($datas[0]['country']) ? $datas[0]['country'] :'';
                    $phone = !empty($datas[0]['mobile']) ? $datas[0]['mobile'] :'';
                    $full_address = $address . ", " . $city .", ". $state .", ". $country;
                    $description = !empty($datas[0]['description']) ? $datas[0]['description'] :'';
                    $discount = !empty($datas[0]['discount']) ? $datas[0]['discount'] :0;
                    $locationcordinate = !empty($datas[0]['latitute']) ? $datas[0]['latitute'].",".$datas[0]['longitute'] :0;
                    $price = !empty($datas[0]['latitute']) ? $datas[0]['latitute'].",".$datas[0]['longitute'] :"not set";
                    $registrationsvalue = !empty($datas[0]['registrationsvalue']) ? $datas[0]['registrationsvalue'] :'';
                    $registrationstext = !empty($datas[0]['registrationstext']) ? $datas[0]['registrationstext'] :'';
                    $starttime = !empty($datas[0]['starttime']) ? json_decode($datas[0]['starttime'],true) :'';
                    $endtime = !empty($datas[0]['endtime']) ? json_decode($datas[0]['endtime'],true) :'';
                    $services = !empty($datas[0]['services']) ? json_decode($datas[0]['services'],true) :'';
                    $specializations = !empty($datas[0]['specializations']) ? json_decode($datas[0]['specializations'],true) :'';
                    $awards = !empty($datas[0]['awards']) ? json_decode($datas[0]['awards'],true) :'';
                    $educations = !empty($datas[0]['educations']) ? json_decode($datas[0]['educations'],true) :'';
                    $memberships = !empty($datas[0]['memberships']) ? json_decode($datas[0]['memberships'],true) :'';
                    $experiencestext = !empty($datas[0]['experiencestext']) ? json_decode($datas[0]['experiencestext'],true) :'';
                    $generalfee = !empty($datas[0]['generalfee']) ? $datas[0]['generalfee'] :'not set';
                }
                $full_name = '';
                if(!empty($this->fname) || !empty($this->lname)){
                   $full_name = $this->fname . " " . $this->lname; 
                }
                $img_ulr = '';
                 if(!empty($profile_image)){
                        $img_ulr = base_url('assets/images/profile/').$profile_image;
                        if (!@getimagesize($img_ulr)) {
                        $img_ulr =  base_url('assets/images/faces/doctors/1.jpg');
                        } 
                } else {
                        $img_ulr = base_url('assets/images/faces/doctors/1.jpg'); 
                }
                ?>
                <!--Jobs Description-->
                <div class="card overflow-hidden">
                    <div class="ribbon ribbon-top-right text-danger"><span class="bg-danger">upto <?php echo $discount ?> % discount </span></div>
                    <div class="card-body  item-user">
                        <div class="profile-pic mb-0">
                            <div class="d-md-flex">
                                <img src="<?php echo $img_ulr ; ?>" class="w-150 h-100 br-2" alt="user"> 
                                <div class="ml-4">
                                    <div class="text-dark"><h6 class="mt-3 mb-1 font-weight-bold"><?php echo ucwords($organisation_name) ;?></h6></div>
                                    <?php $bold = !empty($organisation_name)? '': 'font-weight-bold'?>
                                    <div class="text-dark"><h6 class="mt-3 mb-1  <?php echo $bold;?>"><?php echo $name ;?></h6></div>
                                    <span class="text-gray"><?php echo $specialization ;?></span><br>
                                    <!--<div class="rating-stars d-inline-flex mb-2 mr-3">
                                        <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="4">
                                        <div class="rating-stars-container mr-2">
                                            <div class="rating-star sm">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="rating-star sm">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="rating-star sm">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="rating-star sm">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="rating-star sm">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div> 4.0
                                    </div>-->
                                    <?php 
                                    if($registrationsvalue > 0){
                                        $registrationsmessage = "Medical Registration Verified" ;
                                        $icon_color_class = "icon-color-success";
                                    } else {
                                        $registrationsmessage = "Medical Registration Not Verified";
                                        $icon_color_class = "icon-color-warning";
                                    }
                                   ?>
                                    <h6 class="mt-2 mb-0"><i class="fa fa-check-square <?php echo $icon_color_class; ?>" data-toggle="tooltip" title="" data-original-title="fa fa-check-square-o"></i><span><?php echo $registrationsmessage; ?></span></h6>
                                    <p class="mt-2 mb-0"><?php echo substr($description, 0,100) ;?><span id="text-hide"><?php echo substr($description, 100)?></span>....<a href="javascript:void(0)" class="more-color" value="shink">more</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--<div class="card-body">

                        <div class="item-det">
                            <a href="#" class="text-dark"><h5 class="font-weight-bold">Address</h5></a>
                            <div class="">
                                <div class="mb-2 mt-3"><a href="#" class="icons"><i class="si si-location-pin text-muted mr-1"></i> <?php echo $full_address ;?></a></div>
                                <!--<div><a href="#" class="icons"><i class="si si-phone text-muted mr-1"></i> <?php echo $phone; ?></a></div> 
                            </div>

                        </div>
                    </div>-->
                    
                   
                   
					<div class="panel panel-primary">
						<div class="tab-menu-heading">
							<div class="tabs-menu ">
								<!-- Tabs -->
								<ul class="nav panel-tabs">
									<li class=""><a href="#tab1" class="active" data-toggle="tab">Info</a></li>
									<li><a href="#tab2" data-toggle="tab" class="">Feedback</a></li>
									<li><a href="#tab3" data-toggle="tab" class="">Consult Q&A</a></li>
									<li><a href="#tab4" data-toggle="tab" class="">Healthfeed</a></li>
								</ul>
							</div>
						</div>
						<div class="panel-body tabs-menu-body">
							<div class="tab-content">
								<div class="tab-pane active" id="tab1">
								    <div class="row">
								        <div class="col-md-4">
								            <!--<a href="https://www.google.com/maps/place/<?php echo $locationcordinate; ?> -->
								            <div class="mb-2 mt-3"><a href="#" class="icons"><i class="si si-location-pin text-muted mr-1"></i> <?php echo $full_address ;?></a></div>
								        </div>
								        <div class="col-md-4">
								            <p><b>Visiting Time</b></p>
								            <?php if(!empty($starttime)) {
								            foreach($starttime as $key => $values){ 
								            if(!empty($values) && $values != '00:00'){
								            ?>
									        <li><?php echo $values." - ". $endtime[$key] ; ?></li>
									        <?php 
									        }}}
									        ?>
								        </div>
								        <div class="col-md-4">
								            <p><b>Consultation Fee:</b>  <i class="fa fa-rupee"></i> <?php echo $generalfee; ?></p>
								        </div>
								    </div>
								    
								</div>
								<div class="tab-pane" id="tab2">
									<!--<p> default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like</p>
									<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et</p> -->
								</div>
								<div class="tab-pane" id="tab3">
								</div>
								<div class="tab-pane " id="tab4">
								</div>
							</div>
						</div>
					</div>
					<?php if(!empty($services)){ ?>
					<div class="card-body border-top">
                        <h4 class="mb-4 font-weight-semibold"><b>Services</b></h4>
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                        <?php 
                                        foreach($services as $service){ 
                                        if(!empty($service)){
                                        ?>
                                        <tbody class="col-lg-4 col-xl-4 p-0">
                                            <tr>
                                                <td><span class=""><i class="fa fa-caret-right mr-2"></i> <?php echo $service ;?></td>
                                            </tr>
                                        </tbody>
                                        <?php } } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } if(!empty($specializations || $awards)){ ?>
                    <div class="card-body border-top">
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <h4 class="mb-4 font-weight-semibold"><b>Specializations</b></h4>
                                <div class="table-responsive">
                                    <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                         <?php  
                                         foreach($specializations as $specialization){ 
                                            if(!empty($specialization)){
                                         ?>
                                        <tbody class="col-lg-12 col-xl-12 p-0">
                                            <tr>
                                                <td><span class=""><i class="fa fa-caret-right mr-2"></i> <?php echo $specialization ;?></td>
                                            </tr>
                                        </tbody>
                                        <?php } } ?>
                                    </table>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <h4 class="mb-4 font-weight-semibold"><b>Awards and Recognitions</b></h4>
                                <div class="table-responsive">
                                    <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                        <?php 
                                        foreach($awards as $award){ 
                                            if(!empty($award)) {
                                        ?>
                                        <tbody class="col-lg-12 col-xl-12 p-0">
                                            <tr>
                                                <td><span class=""><i class="fa fa-caret-right mr-2"></i> <?php echo $award ;?></td>
                                            </tr>
                                        </tbody>
                                        <?php } } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   <?php } if(!empty($educations)){ ?>
                    <div class="card-body border-top">
                       <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <h4 class="mb-4 font-weight-semibold"><b>Education</b></h4>
                                <div class="table-responsive">
                                    <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                        <?php 
                                        foreach($educations as $education){ 
                                            if(!empty($education)) {
                                        ?>
                                        <tbody class="col-lg-12 col-xl-12 p-0">
                                            <tr>
                                                <td><span class=""><i class="fa fa-caret-right mr-2"></i> <?php echo $education ;?></td>
                                            </tr>
                                        </tbody>
                                        <?php } } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } if(!empty( $memberships)){ ?>
                    <div class="card-body border-top">
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <h4 class="mb-4 font-weight-semibold"><b>Memberships</b></h4>
                                <div class="table-responsive">
                                    <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                        <?php 
                                        foreach($memberships as $membership){ 
                                            if(!empty($membership)) {
                                        ?>
                                        <tbody class="col-lg-12 col-xl-12 p-0">
                                            <tr>
                                                <td><span class=""><i class="fa fa-caret-right mr-2"></i> <?php echo $membership ;?></td>
                                            </tr>
                                        </tbody>
                                        <?php } } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } if(!empty($experiencestext)){ ?>
                    <div class="card-body border-top">
                       <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <h4 class="mb-4 font-weight-semibold"><b>Experience</b></h4>
                                <div class="table-responsive">
                                    <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                        <?php 
                                        foreach($experiencestext as $experiencetext){ 
                                            if(!empty($experiencetext)) {
                                        ?>
                                        <tbody class="col-lg-12 col-xl-12 p-0">
                                            <tr>
                                                <td><span class=""><i class="fa fa-caret-right mr-2"></i> <?php echo $experiencetext ;?><b> Years</b></td>
                                            </tr>
                                        </tbody>
                                        <?php } } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } if(!empty($registrationstext)){ ?>
                    <div class="card-body border-top">
                       <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <h4 class="mb-4 font-weight-semibold"><b>Registrations</b></h4>
                                <div class="table-responsive">
                                    <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                        <tbody class="col-lg-12 col-xl-12 p-0">
                                            <tr>
                                                <td><span class=""><i class="fa fa-caret-right mr-2"></i> <?php echo $registrationstext ;?></td>
                                            </tr>
                                        </tbody>
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!--Details Description-->
            </div>

            <!--Right Side Content-->
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title">Book a Visit</h3>
                    </div>
                    <div class="card-body" id ="bookslots" >
                        
                        <?php  
                        $display = "display: none"; $size = count($user_members); if($size > 1 ){ $display = "";  } ?>
                        <div class="form-group" style="<?php echo $display; ?>">
							<label class="form-label">Choose Patient</label>
							<select class="form-control" id = "person">
								<option value="">Select name</option>
								<?php if(!empty($user_members)){ 
								foreach($user_members as $user_member){	?>
								<option value=<?php echo $user_member['id'] ?>><?php echo $user_member['fname'] . ' ' . $user_member['lname']; ?></option>
								<?php } }  ?>
							</select>
						</div>
                        <div class="row">
                            <div class="col-6">
                                 <div class="form-group">
                                   <label class="form-label">Full Name<span class=" text-danger">*</span></label><span class="pull-right text-danger" id="name_err"></span>
                                    <input type="text" class="form-control input-lg" id ="name" value="<?php echo $full_name;?>" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Phone Number<span class=" text-danger">*</span><span class="pull-right text-danger" id="mob_err"></span></label>
                                    <input type="text" class="form-control input-lg number" id = "mobile" value="<?php echo $this->mobile; ?>" maxlength="10" placeholder="Enter Phone ">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label"><?php echo $organisation_name;?> Fee <span class=" text-danger">*</span><span class="pull-right text-danger"></span></label>
                                <h6 class="mt-2" id="amount-not-set"><span><i class="fa fa-rupee" title="fa fa-rupee"></i> <?php echo $generalfee;?></span></h6>
                                <input type="hidden" id = "originalamount" name ="originalamount" value="<?php echo $generalfee ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Discount </label>
                                <h6 class="text-justify"><span><i class="fa fa-money"></i> <?php echo $discount;?> %</span></h6>
                                <input type="hidden" id = "discount" name ="discount" value="<?php echo $discount ?>">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-9">
                                 <div class="form-group">
                                    <input type="text" class="form-control" id ="couponcode" value="" placeholder="Enter coupon code">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <a href="#" class="btn btn-primary pull-right" id="couponapply">Apply Now </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-5">
                                    <label class="form-label" id="examplenameInputname2">Net Pay Amount </label>
                                </div>
                                <div class="col-7">
                                    <input type="text" class="form-control" id="netamount" name="netamount" value="<?php echo $datas[0]['netamount']?>" placeholder="Net amount" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Appointemnt Date<span class=" text-danger">*</span><span class="pull-right text-danger" id="date_err"></span></label>
                            <input class="form-control fc-datepicker" id = "date" placeholder="Appointment Date" type="text">
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Time Slots<span class="text-danger">*</span><span class="pull-right text-danger" id="timeslot_err"></span></label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="timeslots" required>
                                        <option value="">Time Slots</option>
                                        <?php if($timeslots) { 
                                            foreach($timeslots as $timeslot){ ?>
                                                <option value="<?php echo $timeslot; ?>"><?php echo $timeslot; ?></option>
                                        <?php  } } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id = "organization_id" value="<?php echo $uid ?>">
                        <input type="hidden" id = "organization_name" value="<?php echo ucwords($organisation_name) ; ?>">
                        <input type="hidden" id = "owner_name" value="<?php echo $name ; ?>">
                        <div class="">
                            <a href="#" class="btn btn-primary pull-right " id="prev-event">Book Appointment</a>
                        </div>
                    </div>
                </div>

            </div>
            <!--/Right Side Content-->
        </div>
    </div>
</section>
<!--/Add listing-->

<!-- small Modal -->
<div class="modal fade" id="smallModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alert Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div id ="showerro"></div>
                    <p></p>
                    <div class="btn-list text-center">
                    <a href="<?php echo base_url('admin/registration?action=registration'); ?>" class="btn btn-primary">Sign Up</button></a>
					<a href="<?php echo base_url('admin/registration?action=login'); ?>" class="btn btn-secondary">SignIn</button></a></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- small Modal -->
			<div id="smallModal12" class="modal fade">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Successfully Booked</h6>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="media-body text-center" id ="successmessage">
							    
							</div>
						</div><!-- modal-body -->
						<div class="modal-footer">
						    <?php echo form_open_multipart('admin/dpaymment?id='.$uid) ;?>
						     <input type="hidden" name ="organization_id" value="<?php echo $uid ?>">
                             <input type="hidden" name ="organization_name" value="<?php echo ucwords($organisation_name) ; ?>">
                             <input type="hidden" name ="generalfee" value="<?php echo $generalfee ; ?>">
							    <button type="submit" class="btn btn-primary">Make Payment </button>
							</form>
						    
							<button type="button" class="btn btn-deafult" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div><!-- modal-dialog -->
			</div><!-- modal -->
			
			
<script>
jQuery(document).ready(function($){
     var userid = '<?php echo $this->userid; ?>';
    $('#prev-event').on('click', function(e){
        e.preventDefault();
        var name = $("#name").val();
        var mobile = $("#mobile").val();
        var date =  $("#date").val();
        var timeslots =  $("#timeslots").val();
        var organization_name = $("#organization_name").val();
        var owner_name = $("#owner_name").val();
        var originalamount = $("#originalamount").val();
        var role = '<?php echo $this->role; ?>';
        var organization_id = $("#organization_id").val();
        if(role =='' || role =='customer'){
            $(".error").empty();
            if( originalamount =='' || originalamount =='not set'){
                $("#amount-not-set").addClass('error');
                $("#amount-not-set").css("padding","5px");
                $("#prev-event" ).addClass("disabled");
                $("#couponapply").addClass("disabled");
                return false;
            }
            if( name.trim() ==''){
                $("#name").addClass('error');
            }
            if( mobile.trim() == ''){
                $("#mobile").addClass('error');
            }
            $("#date").empty();
            if( date ==''){
                $("#date").addClass('error');
            }
            if(timeslots == ''){
                $("#timeslots").addClass('error');
            } else {
                $('#prev-event').text('Please wait..');
                $("#prev-event" ).addClass("disabled");
                $.ajax({
                url: '<?php echo base_url('admin/book_slots');?>',
                type:"POST",
                data: {"name":name, "mobile":mobile, "date":date, "organization_id":organization_id, "userid": userid},
                success: function( response ) {
                    var result  = JSON.parse(response);
                    if(result.success) {
                        //   var messages = "<div class ='row'> ";
                        //   if(organization_name != ''){
                        //       messages += "<div class = 'col-sm-12'>" + organization_name + "</div>";
                        //   } 
                        //   if(owner_name != '') {
                        //       messages += "<div class = 'col-sm-12'>" + owner_name + "</div>";
                        //   }
                        //   messages += "<div class = 'col-sm-12'>" + name + "</div>";
                        //   messages += "<div class = 'col-sm-12'>" + date + "</div></div>";
                           
                        //   $("#successmessage").html(messages);
                        //   $('#smallModal12').modal('show');

                        $('<form action="form2.html"><input type="hidden" name="order_id" value="<?php echo $orderno ;?>"/><input type="hidden" name="currency" value="INR"/><input type="hidden" name="amount" value="<?php echo $total_value ;?>"/><input type="hidden" name="merchant_id" value="<?php echo MERCHANTID?>"/><input type="hidden" name="redirect_url" value="<?php echo base_url('admin/ccavResponseHandler')?>"/><input type="hidden" name="cancel_url" value="<?php echo base_url('admin/ccavResponseHandler')?>"/><input type="hidden" name="billing_name" value="<?php echo $this->fname . " " .$this->lname; ?>"/><input type="hidden" name="billing_address" value="<?php echo $this->paddress; ?>"/><input type="hidden" name="billing_city" value="<?php echo $this->pcity;?>"/><input type="hidden" name="billing_state" value="<?php echo $this->pstate;?>"/><input type="hidden" name="billing_tel" value="9876543210"/><input type="hidden" name="billing_email" value="test@test.com"/><input type="hidden" name="merchant_param1" value="<?php echo $cardname;?>"/><input type="hidden" name="customer_identifier" value="<?php echo $cardname;?>"/></form>').appendTo('body').submit();
                          $('#prev-event').text('Book Appointment');
                          $("#prev-event" ).removeClass("disabled");
                      } else {
                            $("#showerro").html(result.error);
                            $('#smallModal1').modal('show');
                            $('#prev-event').text('Book Appointment');
                        }
                    }
                });
            }
        } else {
            if(role !=''){
                toastr.error('You are note a paitent.');
            } else {
               toastr.error('First login to your account.');
            }
        }
    });
    
    $('#person').change(function(){
        let idvalue = $(this).val();
        userid = idvalue;
        $.ajax({
                url: '<?php echo base_url('admin/getValue');?>',
                type:"POST",
                data: {"userid": idvalue},
                success: function( response ) {
                    let obj = JSON.parse(response);
                    $('#name').val(obj[0].fname + " "+ obj[0].lname);
                     $('#mobile').val(obj[0].mobile );
                }
            });
    });
    $(".numberonly").inputFilter(function(value) {
            return /^\d*$/.test(value);    // Allow digits only, using a RegExp
    });
    $("#couponapply").on('click', function(e){
        alert('working');
    })
});
</script>
