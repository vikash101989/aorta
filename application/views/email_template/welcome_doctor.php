<!DOCTYPE html>
<html>
<head> 
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<style>
	.container{
    	font-size: 21px;
        font-family: open sans-serif;
        padding: 29px;
	}
	
</style>
<body> 
  <div class="container card">
      <a class="d-flex justify-content-center"><img src="<?php echo base_url('assets/images/healthcard-aorta.png');?>"></a>
       <h2 class="text-center">Welcome Letter</h2><br>
       
      <p>To,<br> <?php echo date("jS M Y ") ?></p>
      <h4 class=""><b>Subject :  </b> Welcome to you in our company Aorta Digital Health Card.</h4>
	<div class="parragraph mt-4">
	<p>
	   We are Extremely glade and happy to welcome you to our Company <b>'Aorta Digital Health Card'</b>
	   from the 14th Aug 2019 onwards. We are looking forward to grow together.
	</p>
	
	<p>
	  Our company welcome you and I am sure you would be able to fit in comfortably work with Us.We hope helps us grow further as for as the success and development it concerned.
	</p>
	</div>
	<!--ftr -->
	<p> Welcome once again!</p>
	
	<p> Yours sincerely</p>
	<p> Your Login ID and Passward below</p>
	<p> Login ID  : <?php echo $user_info['mobile'] ?></p>
	<p> Passward  : <?php echo $user_info['mobile'] ?></p>
	<p> WebSite link  : <a href ="<?php echo base_url(); ?>">AortaDHC</a></p>
  
  </div>
</body>
</html>