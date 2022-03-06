<input type="button" onclick="printDiv('printableArea')" value="Print Card"/>
<div id="printableArea">
<?php

$pfname = !empty($user_data['fname'])? ucfirst($user_data['fname']) : '';
$plname = !empty($user_data['lname'])? ucfirst($user_data['lname']) : '';
$pcardno = !empty($user_data['cardnumber'])? $user_data['cardnumber'] : 'N/A';
$dateofexp = !empty($user_data['card_valid_upto']) ? date('Y-m-d', strtotime($user_data['card_valid_upto'])) : 'N/A' ;
$pcardtype = !empty($user_data['card_type']) ? explode(" ", $user_data['card_type']) : [] ;
$bloodgrup = !empty($user_data['bloodgrup'])? ucfirst($user_data['bloodgrup']) : '';
$cardtype = '';
if(isset($pcardtype[0])){
   $cardtype = ($pcardtype[0]== 'Free')? 'Basic' : $pcardtype[0];
}



				$cardContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="box-shadow: 0 5px 50px -4px rgba(0,0,0,.57);border-spacing:0;border-radius:20px;margin-top: 18px;margin-left: 50px;"><tr><td style="height:20px"></td></tr>';
				
				$cardContent .="<tr style='clear:both; display:block;'><td style='padding:25px;'>
				  <div style='float:left; width:40%;'>
				  <img src=".base_url('/assets/images/themeimage/aortadhc-logo.png')." alt='Girl in a jacket' width='200'>
					  <!--<div style='width:50%; float:left; font-size:30px;'>
					    <span style='margin:10px 0px 0px 15px; color:#ff2b88; font-weight:bold;'>Aorta</span>					
				    </div>
						<div style='border-left:0px solid #d6ddf9; height:60px; position:absolute; left: 38%; margin-left:-15px; margin-top:-10px;'></div>
						<div style='width:50%; float:left; font-size:24px'>					  
					    <span style='position:absolute; margin:-10px 0px 0px 90px; color:green;'>Digital</span>
							<span style='position:absolute; margin:20px 0px 0px 90px; color:green;'>Health Service</span>
				    </div>-->					
				  </div>
					<div style='float:left; font-size:14px;'>
					  <span style='position:absolute; margin:0px 0px 0px 210px;'>TAKE THIS CARD TO YOUR SERVICES</span>
					  <span style='position:absolute; margin:20px 0px 0px 210px;'>PROVIDER TO SAVE ON YOUR BILL</span>
				  </div>
				</td></tr>";
				
				// body section
				$cardContent .='<tr><td style="height:20px"></td></tr>';
				$cardContent .="<tr style='clear:both; display:block;'><td style='padding:0px;'>
				  <div style='float:left; width:180%; padding: 5px; border:1px solid #d6ddf9; margin-left: 15px;'>
					  <div style='width:48%; float:left;'>
					    <p style='margin:0px 0px 0px 15px; font-weight:bold;'>Member type:</p>
							<p style='margin:0px 0px 0px 15px; font-weight:bold;'>Member ID:</p>
							<p style='margin:0px 0px 0px 15px; font-weight:bold;'>Exp:</p>
							<p style='margin:0px 0px 0px 15px; font-weight:bold;'>Name:</p>
							<p style='margin:0px 0px 0px 15px; font-weight:bold;'>Blood Group:</p>
				    </div>
						<div style='width:48%; float:left; font-size:15px'>					  
					    <span style='position:absolute; margin:1px 0px 0px 10px; font-weight: bold;'>".$cardtype."</span>
							<span style='position:absolute; margin:18px 0px 0px 10px; font-weight: bold;'>".$pcardno."</span>
							<span style='position:absolute; margin:36px 0px 0px 10px; font-weight: bold;'>".$dateofexp."</span>
							<span style='position:absolute; margin:54px 0px 0px 10px; font-weight: bold;'>". $pfname ." " . $plname ."</span>
							<span style='position:absolute; margin:70px 0px 0px 10px; font-weight: bold;'>'".$bloodgrup."'</span>
				    </div>					
				  </div>
					<div style='font-size:16px;'>
					  <!--<span style='position:absolute; margin:0px 0px 0px 50px; font-weight:800;'>Note</span>
					  <span style='position:absolute; margin:20px 0px 0px 50px;'>Card information must be entered</span>
						 <span style='position:absolute; margin:40px 0px 0px 50px;'>completely on first use.</span>
						  <span style='position:absolute; margin:70px 0px 0px 50px;'>This is not insurance</span>-->
				  </div>
				</td></tr>";
				
				$cardContent .='<tr><td style="height:20px"></td></tr>';				
				$cardContent .="<tr><td style='background:#c0d4ec;color:#fff;padding: 2%;text-align: center;font-size: 13px;'>
				<p style='color:#ff2b88; font-size:25px;'>SAVE UP TO <span style='color:#6963ff;'>50%</span> ON EVERY BOOKING</p>
				</tr>";
				
				// Footer section
				$cardContent .= "<tr><td style='background:#3F51B5;color: #fff;padding: 2%;text-align: center;font-size: 13px; border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;'>
					<div style='float:left; width:40%;'>
						<div style='width: 50%; font-size:24px; float:left;'>
							<span style='position:absolute; margin:35px 0px 0px -55px;'>24X7 Help:</span>
						</div>
						<div style='border-left:0px solid #d6ddf9; height:72px; position:absolute; left: 38%; margin-left:-4px; margin-top:12px;'></div>
						<div style='width:50%; float:left;'>
							<div style='position:absolute; margin:10px 0px 0px 130px;'>
							<span style='display:block; font-size:14px; padding:5px;'> +91-9001000001 </span>
							<span style='display:block; font-size:14px; padding:5px;'> help@aortadhc.com </span>
							<span style='display:block; font-size:14px; padding:5px;'> www.aortadhc.com </span>		
							</div>						
						</div>
					</div>				 
					<div style='float:right;'>
						<img style='height:100px; width:150px' src='".base_url('/assets/images/themeimage/download.png')."'/>
					</div>				
				</td></tr></table>";
				$cardContent .='<table width="600px" style="box-shadow: 0 5px 50px -4px rgba(0,0,0,.57);border-spacing:0;border-radius:20px;margin-top: 18px;margin-left: 50px;"><tr><td style="height:20px"></td></tr>';
				
				$cardContent .="<tr style='clear:both; display:block;'><td style='padding:25px;'>
				  <div style='float:left; width:40%;'>
				  <div style='width:50%; float:left; font-size:30px;'>
				</div>  </div>
				</td></tr>";
				
				// body section
				$cardContent .='<tr><td style="height:20px"></td></tr>';
				$cardContent .="<tr style='clear:both; display:block;'><td style='padding:0px;'>
				  <div style='float:left; width:180%; padding: 5px; margin-left: 15px;'>
					  <div style='width:48%; float:left;'>
					        <p style='margin:0px 0px 0px 15px; font-weight:bold;'>Member type:</p>
							<p style='margin:0px 0px 0px 15px; font-weight:bold;'>Member ID:</p>
							<p style='margin:0px 0px 0px 15px; font-weight:bold;'>Exp:</p>
							<p style='margin:0px 0px 0px 15px; font-weight:bold;'>Name:</p>
							<p style='margin:0px 0px 0px 15px; font-weight:bold;'>Blood Group:</p>
				    </div>
				  </div>
					<div style='font-size:16px;'>
					  <!--<span style='position:absolute; margin:0px 0px 0px 50px; font-weight:800;'>Note</span>
					  <span style='position:absolute; margin:20px 0px 0px 50px;'>Card information must be entered</span>
						 <span style='position:absolute; margin:40px 0px 0px 50px;'>completely on first use.</span>
						  <span style='position:absolute; margin:70px 0px 0px 50px;'>This is not insurance</span>-->
				  </div>
				</td></tr>";
				
				$cardContent .='<tr><td style="height:20px"></td></tr>';				
				$cardContent .="<tr><td style='background:#c0d4ec;color:#fff;padding: 2%;text-align: center;font-size: 13px;'>
				<p style='color:#ff2b88; font-size:25px;'>SAVE UP TO <span style='color:#6963ff;'>50%</span> ON EVERY BOOKING</p>
				</tr>";
				
				// Footer section
				$cardContent .= "<tr><td style='background:#3F51B5;color: #fff;padding: 2%;text-align: center;font-size: 13px; border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;'>
					<div style='float:left; width:40%;'>
						<div style='width: 50%; font-size:24px; float:left;'>
							<span style='position:absolute; margin:35px 0px 0px -55px;'>24X7 Help:</span>
						</div>
						<div style='border-left:0px solid #d6ddf9; height:72px; position:absolute; left: 38%; margin-left:-4px; margin-top:12px;'></div>
						<div style='width:50%; float:left;'>
							<div style='position:absolute; margin:10px 0px 0px 130px;'>
							<span style='display:block; font-size:14px; padding:5px;'> +91-9001000001 </span>
							<span style='display:block; font-size:14px; padding:5px;'> help@aortadhc.com </span>
							<span style='display:block; font-size:14px; padding:5px;'> www.aortadhc.com </span>		
							</div>						
						</div>
					</div>				 
					<div style='float:right;'>
						<img style='height:100px; width:150px' src='".base_url('/assets/images/themeimage/download.png')."'/>
					</div>				
				</td></tr></table>";
				$cardContent .= "</body></html>";
				
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