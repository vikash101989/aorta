<?php 

$fname = !empty($all_lists[0]['fname']) ? $all_lists[0]['fname']: ""; 
$lname = !empty($all_lists[0]['lname']) ? $all_lists[0]['lname']: "";
$email = !empty($all_lists[0]['email']) ? $all_lists[0]['email']: "";
$mobile = !empty($all_lists[0]['mobile']) ? $all_lists[0]['mobile']: "";
$city = !empty($all_lists[0]['city']) ? $all_lists[0]['city']: "";
$state = !empty($all_lists[0]['state']) ? $all_lists[0]['state']: "";
$country = !empty($all_lists[0]['country']) ? $all_lists[0]['country']: "";
$address = !empty($all_lists[0]['address']) ? $all_lists[0]['address']: "";
$description = !empty($all_lists[0]['description']) ? $all_lists[0]['description']: "";
$image = !empty($all_lists[0]['profile_image']) ? $all_lists[0]['profile_image']: "";
$role = !empty($all_lists[0]['role']) ? $all_lists[0]['role']: "";
$gender = !empty($all_lists[0]['gender']) ? $all_lists[0]['gender']: "";
$pay_status = isset($all_lists[0]['payment_status']) ? $all_lists[0]['payment_status']: "";
$created_at = isset($all_lists[0]['created_at']) ? date('Y-m-d', strtotime($all_lists[0]['created_at'])): "";
$image_url = !empty($image) ? base_url('assets/images/profile/').$image : base_url('assets/images/faces/male/25.jpg');
$cardnumber = !empty($all_lists[0]['cardnumber']) ? $all_lists[0]['cardnumber']: "";
?>

<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Aorta</title>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/fonts/font-awesome.min.css">

		<!-- Sidemenu Css -->
		<link href="<?php echo base_url();?>assets/plugins/toggle-sidebar/sidemenu.css" rel="stylesheet" />


		<!-- Bootstrap Css -->
		<link href="<?php echo base_url();?>assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet" />
		<style>
.postion-button {
    position: absolute;
    bottom: 12px;
    right: 0;
}
.card-text {
    font-size: 11px;
    font-weight: 700;
    
}
.icard-image{
    width: 100%;
}
</style>
	</head>
        
	<body class="app sidebar-mini">
	    
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-12 col-lg-12">
                    <div class ="row">
                            <div class="col-sm-6">
                                <div class="card">
                                        <div class="card-body d-flex flex-column">
                                            <div class="row">
                                               <div class ="col-4">
                                                    <img src="<?php echo base_url('assets/images/healthcard-aorta.png'); ?>" alt="dashr logo">
                                                </div>
                                                <div class ="col-8 text-right">
                                                    <h4>Aorta Digital Health Card</h4>
                                                     <div class="text-right card-text">A Group of Aorta Laboratories pvt. Ltd.</div>
                                                </div> 
                                            </div>
                                            <div class="row"><div class="col-md-12 text-right card-text">Approved (MCA) Govt. of India Reg. No. U24233MH2011PTC224638</div></div> 
                                               
                                            <div class="row">
                                                <div class="col-md-4 col-sm-12 text-center">
                                                   <img src="<?php echo $image_url ;?>" class="icard-image" height="120" alt="user">
                                                </div>
                                                <div class="col-md-8 col-sm-12 mt-4">
                                                    <div class="row">
                                                        <div class="col-md-5 col-sm-12">
                                                        <b>Card No :</b>
                                                        </div>
                                                        <div class="col-md-7 col-sm-12">
                                                        <?php echo $cardnumber ; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5 col-sm-12">
                                                        <b>Name :</b>
                                                        </div>
                                                        <div class="col-md-7 col-sm-12">
                                                        <?php echo ucfirst($fname) . " ".  ucfirst($lname); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5 col-sm-12">
                                                        <b>Sex :</b>
                                                        </div>
                                                        <div class="col-md-7 col-sm-12">
                                                        <?php echo ucfirst($gender); ?>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-md-5 col-sm-12">
                                                        <b>Phone No :</b>
                                                        </div>
                                                        <div class="col-md-7 col-sm-12">
                                                        <?php echo $mobile ; ?>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-md-5 col-sm-12">
                                                        <b>Date Join: </b>
                                                        </div>
                                                        <div class="col-md-7 col-sm-12">
                                                        <?php echo $created_at ; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            <!--<div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title text-center ">Commited to Health Servise</h5>
                                            <h6 class="card-title">Benifits of Aotra Digital Health Card </h6>
                                            <ul class="list-group ml-2">
    											<li class="listunorder">Blood donar facility</li>
    											<li class="listunorder">8 Types of free servise in one years. </li>
    											<li class="listunorder">Discount of medicine upto 20%.</li>
    											<li class="listunorder">Diccount on Doctor fee upto 50%.</li>
    											<li class="listunorder">Discount on lab test upto 30%.</li>
    											<li class="listunorder">Discount on Hospital Bills upto 30%.</li>
    											<li class="listunorder">Sepecial feature to card holder in health servise.</li>
    											<li class="listunorder">Provide better facilities in the future.</li>
    											<li class="listunorder">Card validity 1 year for issue date.</li>
    										</ul>
                                        </div>
                                    </div>
                </div>-->
                        </div>
                </div>
            </div>
        </div>

    </body>
</html>
           
      