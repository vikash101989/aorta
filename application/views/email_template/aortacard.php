<input type="button" onclick="printDiv('printableArea')" value="Print Card"/>
<style type="text/css" media="print">
    @page { 
        size: landscape;
    }
</style>
<div id="printableArea">
<?php

$pfname = !empty($user_data['fname'])? ucfirst($user_data['fname']) : '';
$plname = !empty($user_data['lname'])? ucfirst($user_data['lname']) : '';
$pcardno = !empty($user_data['cardnumber'])? $user_data['cardnumber'] : 'N/A';
$dateofexp = !empty($user_data['card_valid_upto']) ? date('Y-m-d', strtotime($user_data['card_valid_upto'])) : 'N/A' ;
$pcardtype = !empty($user_data['card_type']) ? explode(" ", $user_data['card_type']) : [] ;
$bloodgrup = !empty($user_data['bgroup'])? $user_data['bgroup'] : 'N/A';
$qr_codes = !empty($user_data['qr_codes'])? $user_data['qr_codes'] : '';
$cardtype = '';
if(isset($pcardtype[0])){
   $cardtype = ($pcardtype[0]== 'Free')? 'Basic' : $pcardtype[0];
}		
				
				$cardContent = '<!DOCTYPE><html><head></head><body style="margin:0px 0px 0px 20px;">';
				
				//--------------- Card front page -----------------------------------------
				$cardContent .='<table width="470px" height="170px" style="box-shadow: 0 5px 50px -4px rgba(0,0,0,.57);border-spacing:0; border-radius:20px; float:left;">';
				
				$cardContent .="<tr style='clear:both; display:block;'><td style='padding:10px 10px 4px 10px;'>
						<img src=".base_url('/assets/images/themeimage/aortadhc-logo.png')." style='height:80px; width:100%'/>
				</td></tr>";
								
				// body section
				$cardContent .="<tr style='clear:both; display:block; margin-bottom:4px;'><td style='padding:5px;'>
				  <div style='float:left; width:170%; padding: 12px; border:1px solid #d6ddf9; margin-left: 10px;'>
					  <div style='width:48%; float:left;'>
					    <p style='margin:0px 0px 0px 0px; font-weight:bold; font-size:11px;'>Member type:</p>
							<p style='margin:0px 0px 0px 0px; font-weight:bold; font-size:11px;'>Member ID:</p>
							<p style='margin:0px 0px 0px 0px; font-weight:bold; font-size:11px;'>Exp:</p>
							<p style='margin:0px 0px 0px 0px; font-weight:bold; font-size:11px;'>Name:</p>
							<p style='margin:0px 0px 0px 0px; font-weight:bold; font-size:11px;'>Blood Group:</p>
				    </div>
						<div style='width:48%; float:left; font-size:15px'>					  
					    <span style='position:absolute; margin:0px 0px 0px 0px; font-weight: bold; font-size:11px;'>".$cardtype."</span>
							<span style='position:absolute; margin:13px 0px 0px 0px; font-weight: bold; font-size:11px;'>".$pcardno."</span>
							<span style='position:absolute; margin:27px 0px 0px 0px; font-weight: bold; font-size:11px;'>".$dateofexp."</span>
							<span style='position:absolute; margin:39px 0px 0px 0px; font-weight: bold; font-size:11px;'>". $pfname ." " . $plname ."</span>
							<span style='position:absolute; margin:50px 0px 0px 0px; font-weight: bold; font-size:11px;'>".$bloodgrup."</span>
				    </div>					
				  </div>
					<div style='font-size:9px;'>
					  <span style='position:absolute; margin:10px 0px 0px 10px;'>TAKE THIS CARD TO YOUR SERVICES</span>
						 <span style='position:absolute; margin:30px 0px 0px 10px;'>PROVIDER TO SAVE ON YOUR BILL</span>
				  </div>
				</td></tr>";
						
				$cardContent .="<tr><td style='background:#d6ddf9;color:#fff;padding: 2%;text-align: center;font-size: 13px;'>
				<p style='color:#ff2b88; font-size:14px;'>SAVE UP TO <span style='color:#6963ff;'>50%</span> ON EVERY BOOKING</p>
				</tr>";				
								
				// Footer section
				$cardContent .= "<tr><td style='background:#6963ff;color: #fff;padding: 12px 10px;text-align: center;font-size: 13px; border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;' class='textback'>
					<div style='float:left; width:40%;'>
						<div style='width: 40%; font-size:18px; float:left;'>
							<span style='position:absolute; margin:10px 0px 0px -35px;'>24X7 Help:</span>
						</div>
						<div style='position:absolute; margin-top:0px;'><span style='border-left:1px solid #d6ddf9; font-size:38px; color:#6963ff; margin-left:85px;'></span></div>
						<div style='width:49%; float:left;'>
							<div style='position:absolute; margin:0px 0px 0px 90px;'>
							<span style='display:block; font-size:11px; padding:1px;'> +91-9001000001 </span>
							<span style='display:block; font-size:11px; padding:1px;'> help@aortadhc.com </span>
							<span style='display:block; font-size:11px; padding:1px;'> www.aortadhc.com </span>		
							</div>						
						</div>
					</div>				 
					<div style='float:right;'>
						<img style='height:100%; width:100%' src='".base_url('uploads/qr_image/'. $qr_codes)."'/>
					</div>				
				</td></tr></table>";				
				//--------------- Card back page ----------------------------------------------
				$cardContent .='<table width="490px" height="265px" style="box-shadow: 0 5px 50px -4px rgba(0,0,0,.57);clear: both; margin: auto;border-spacing:0;border-radius:20px;float:left;">';
				
				$cardContent .="<tr style='clear:both; display:block;'><td style='padding:25px 0px 0px 30px;'>
				  <p style='margin:0px; font-size:14px; font-style:italic;'>Committed to Health Services</p>
					<p style='margin:0px; color:red; font-size:16px; font-weight:800;'>Benefit to Aorta Digital Health Card</p>
				</td></tr>";
				
				// body section				
				$cardContent .="<tr style='padding: 12px;clear:both;display:block;'><td style='padding:0px 0px 0px 15px;'>
            <ul style='margin:auto;'>
              <li style='color:red; height:14px;'><span style='color:#000; font-size:14px;'>Blood donor facility</span></li>
							<li style='color:red; height:26px;'><p style='margin:0px; color:#000; font-size:14px;'>8 Type of free Services in whole one year.</p>
							    <p style='margin:0px; color:#000; font-size:12px;'>Height,wt,bmi,bp,pulse,spo2,temp...,bg.</p> 
							</li>
							<li style='color:red; height:14px;'><span style='color:#000; font-size:14px;'>Discount on medicine up to 20%.</span></li>
							<li style='color:red; height:14px;'><span style='color:#000; font-size:14px;'>Discount on Dr.fee up to 50%.</span></li>
                            <li style='color:red; height:14px;'><span style='color:#000; font-size:14px;'>Discount on Lab test up to 30%.</span></li>
							<li style='color:red; height:14px;'><span style='color:#000; font-size:14px;'>Discount on Hospital Bill up to 30%.</span></li>
							<li style='color:red; height:14px;'><span style='color:#000; font-size:14px;'>Special feature to card holder in health card.</span></li>
							<li style='color:red; height:14px;'><span style='color:#000; font-size:14px;'>Try to provide better facilities in the future.</span></li>
							<li style='color:red; height:14px;'><span style='color:#000; font-size:14px;'>Card Validity 1 Years for Issue Date.</span></li>					
            </ul>						
				</td></tr>";				
				
				// Footer section				
				$cardContent .='<tr><td style="border-top:1px solid;">
				  <p style="margin:0px 25px;font-size:12px;font-weight:800;margin-top: 12px;min-height: 56px;"><span style="color:red;">Reg.Off.:</span> Room No.377, Adarsh Nagar Oshiwara Infinity CHS Ltd, Oshiwara,Andheri(west), Mumbai 400201</p>
				</td></tr>';	
				
				$cardContent .= "</table></body></html>";
				
				print $cardContent;						
?>	
</div>
<script>

    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>