<?php
// echo "<pre>";
// print_r($invoicedata);
?>

<div class="col-xl-9 col-lg-12 col-md-12" id ="dvContainer">
    <style type="text/css">
		table {
			border-collapse: collapse;
			border-spacing: 0;
		}

		caption, th, td {
			text-align: left;
			font-weight: normal;
			vertical-align: middle;
		}

		q, blockquote {
			quotes: none;
		}
		q:before, q:after, blockquote:before, blockquote:after {
			content: "";
			content: none;
		}

		a img {
			border: none;
		}

		article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section2, summary {
			display: block;
		}

		section1 {
			font-size: 14px;
			font-weight: 400;
			line-height: 1.5;
			font-family: 'Maven Pro', sans-serif;
			color: #605e7e;
			margin: 0;
			padding: 0;
			color: #777777;
		}
		section1 a {
			text-decoration: none;
			color: inherit;
		}
		section1 a:hover {
			color: inherit;
			opacity: 0.7;
		}
		section1 .container {
		    margin-top: 40px;
			min-width: 500px;
			margin: 0 auto;
			padding: 0 30px;
		}
		section1 .clearfix:after {
			content: "";
			display: table;
			clear: both;
		}
		section1 .left {
			float: left;
		}
		section1 .right {
			float: right;
		}
		section1 .helper {
			height: 100%;
		}

		header {
			height: 40px;
			margin-top: 20px;
			margin-bottom: 40px;
			padding: 0px 5px 0;
		}
		header figure {
			float: left;
			width: 40px;
			margin-right: 10px;
		}
		header figure img {
			height: 40px;
		}
		header .company-info {
			color: #BDB9B9;
		}
		header .company-info .title {
			margin-bottom: 5px;
			color: #2A8EAC;
			font-weight: 600;
			font-size: 2em;
		}
		header .company-info .line {
			display: inline-block;
			height: 9px;
			margin: 0 4px;
			border-left: 1px solid #2A8EAC;
		}

		section2 .details {
		    margin-top: 40px;
			min-width: 500px;
			margin-bottom: 40px;
			padding: 10px 35px;
			background-color: #2A8EAC;
			color: #ffffff;
		}
		section2 .details .client {
			width: 50%;
			line-height: 16px;
		}
		section2 .details .client .name {
			font-weight: 600;
		}
		section2 .details .data {
			width: 50%;
			text-align: right;
		}
		section2 .details .title {
			margin-bottom: 15px;
			font-size: 2em;
			font-weight: 400;
			text-transform: uppercase;
		}
		section2 .table-wrapper {
			position: relative;
			overflow: hidden;
		}
		section2 .table-wrapper:before {
			content: "";
			display: block;
			position: absolute;
			top: 33px;
			left: 30px;
			width: 90%;
			height: 100%;
			border-top: 2px solid #BDB9B9;
			border-left: 2px solid #BDB9B9;
			z-index: -1;
		}
		section2 .no-break {
			page-break-inside: avoid;
		}
		footer {
			margin-bottom: 20px;
			padding: 0 5px;
		}
		footer .thanks {
			text-align: right;
			color: #2A8EAC;
			font-size: 1.16666666666667em;
			font-weight: 600;
		}
		footer .notice {
			margin-bottom: 25px;
		}
		footer .end {
			padding-top: 5px;
			border-top: 2px solid #2A8EAC;
			text-align: center;
		}
		#customers {
		  font-family: 'Maven Pro', sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		  margin-bottom: 40px;
		}

		#customers td, #customers th {
		  border: 1px solid #ddd;
		  padding: 8px;
		}

		#customers tr:nth-child(even){background-color: #f2f2f2;}

		#customers tr:hover {background-color: #ddd;}

		#customers th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: left;
		  background-color: #2A8EAC;
		  color: white;
		}
		.button {
		  background-color: #4CAF50; /* Green */
		  border: none;
		  color: white;
		  padding: 15px 32px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
		  margin: 4px 2px;
		  cursor: pointer;
		}

		.button2 {background-color: #008CBA;} /* Blue */
		.button4 {background-color: #e7e7e7; color: black;} /* Gray */ 
		.button5 {background-color: #555555;}
	</style>
	<!--<div class="card">
			<div class="card-header">
				<h3 class="card-title">#<?php echo !empty($invoicedata['order_id']) ? $invoicedata['order_id'] : "";?></h3>
				<div class="card-options">
					<button type="button" class="btn btn-sm btn-info mr-2"><i class="si si-printer"></i> Print Invoice</button>
				</div>
			</div>
			<div class="card-body">
				<div class="row ">
					<div class="col-lg-6 ">
						<p class="h3">Aorta DHC</p><span> A company of Aorta Laboratories Pvt. Ltd </span>
						<address>
							Room No: 377 Adarsh Nagar<br>
							Oshiwara Infinity CHS LDT<br>
							Andhreri(west), Mumbai 400201<br>
							Email : info@aortalab.co.in<br>
							Mobile no :+91-9525510009
							
						</address>
					</div>
					<div class="col-lg-6 text-right">
						<p class="h3">Invoice To</p>
						<address>
						    <?php echo !empty($invoicedata['billing_name']) ? $invoicedata['billing_name'] : "";?><br>
							<?php echo !empty($invoicedata['billing_address']) ? $invoicedata['billing_address'] : "";?><br>
							<?php echo !empty($invoicedata['billing_city']) ? $invoicedata['billing_city'] . ", " .  $invoicedata['billing_state'] : "";?><br>
							<?php echo !empty($invoicedata['billing_zip']) ? $invoicedata['billing_zip'] : "";?><br>
							<?php echo !empty($invoicedata['billing_tel']) ? $invoicedata['billing_tel'] : "";?><br>
							<?php echo !empty($invoicedata['billing_email']) ? $invoicedata['billing_email']  : "";?>
						</address>
					</div>
				</div>

				<div class=" text-dark">
					<p class="mb-1 mt-5"><span class="font-weight-semibold">Invoice Date :</span> <?php echo !empty($invoicedata['trans_date']) ? $invoicedata['trans_date']  : "";?></p>
					<!--<p><span class="font-weight-semibold">Due Date :</span> 15th July 2019</p>-->
					<!--</div>
				<div class="table-responsive push">
					<table class="table table-bordered table-hover text-nowrap">
						<tbody><tr>
							<th class="text-center ">#</th>
							<th>Item Lists</th>
							<th class="text-center">Qanitiy</th>
							<th class="text-right">Price</th>
						</tr>
						<tr>
							<td class="text-center">1</td>
							<td>
								<p class="font-w600 mb-1"><?php echo !empty($invoicedata['merchant_param1']) ? $invoicedata['merchant_param1']  : "";?></p>
								<!--<div class="text-muted">  </div>
							</td>
							<td class="text-center">1</td>

							<td class="text-right"><?php echo !empty($invoicedata['amount']) ? $invoicedata['amount']  : "";?></td>
						</tr>
						<tr>
							<td colspan="3" class="font-w600 text-right">Paid Amount</td>
							<td class="text-right"><?php echo !empty($invoicedata['amount']) ? $invoicedata['amount']  : "";?></td>
						</tr>
						<tr>
							<td colspan="3" class="font-w600 text-right">Payment Mode </td>
							<td class="text-right"><?php echo !empty($invoicedata['payment_mode']) ? $invoicedata['payment_mode']  : "";?></td>
						</tr>
						<tr>
							<td colspan="3" class="font-w600 text-right">Order Status</td>
							<td class="text-right"><?php echo !empty($invoicedata['order_status']) ? $invoicedata['order_status']  : "";?></td>
						</tr>
						<tr>
							<td colspan="4" class="text-right">
								<button type="button" class="btn btn-success"><i class="si si-user"></i> Status Membership</button>
								<button type="button" class="btn btn-primary" onclick="invoiceprint()"><i class="si si-paper-plane"></i> Send Invoice</button>
								<button type="button" class="btn btn-info" onclick="javascript:window.print();"><i class="si si-printer"></i> Print Invoice</button>
							</td>
						</tr>
					</tbody></table>
				</div>
				<p class="text-muted text-center">Thank you very much for become a member of Aorta Group!</p>
			</div>
		</div>-->
		<section1 class="card">
        	<section2>
        	<div class="container ">
        		<div class="details clearfix">
        			<div class="client left">
        				<p class="name"><?php echo !empty($invoicedata['billing_name']) ? $invoicedata['billing_name'] : "";?></p>
        				<p>
        					<?php echo !empty($invoicedata['billing_address']) ? $invoicedata['billing_address'] : "";?>,<br>
        					<?php echo !empty($invoicedata['billing_city']) ? $invoicedata['billing_city'] . ", " .  $invoicedata['billing_state'] : "";?><br>
							<?php echo !empty($invoicedata['billing_zip']) ? $invoicedata['billing_zip'] : "";?><br>
							<?php echo !empty($invoicedata['billing_tel']) ? $invoicedata['billing_tel'] : "";?><br>
							
        				</p>
        				<a href="mailto:'<?php echo !empty($invoicedata['billing_email']) ? $invoicedata['billing_email']  : "";?>'"><?php echo !empty($invoicedata['billing_email']) ? $invoicedata['billing_email']  : "";?></a>
        			</div>
        			<div class="data right">
        				<div class="title">#<?php echo !empty($invoicedata['order_id']) ? $invoicedata['order_id'] : "";?></div>
        				<div class="date">
        					Date of Invoice: <?php echo !empty($invoicedata['trans_date']) ? $invoicedata['trans_date']  : "";?><br>
        				</div>
        			</div>
        		</div>
        		
        			<table id="customers">
        				  <tr>
        					<th>Item name</th>
        					<th>Qanitiy</th>
        					<th>Price</th>
        				  </tr>
        				  <tr>
        					<td><?php echo !empty($invoicedata['merchant_param1']) ? $invoicedata['merchant_param1']  : "";?></td>
        					<td> 1 </td>
        					<td><?php echo !empty($invoicedata['amount']) ? $invoicedata['amount']  : "";?></td>
        				  </tr>
        				  <tr>
        					<td></td>
        					<td>Paid Amount</td>
        					<td><?php echo !empty($invoicedata['amount']) ? $invoicedata['amount']  : "";?></td>
        				  </tr>
        				  <tr>
        					<td></td>
        					<td>Payment Mode</td>
        					<td><?php echo !empty($invoicedata['payment_mode']) ? $invoicedata['payment_mode']  : "";?></td>
        				  </tr>
        				  <tr>
        					<td></td>
        					<td>Order Status</td>
        					<td><?php echo !empty($invoicedata['order_status']) ? $invoicedata['order_status']  : "";?></td>
        				  </tr>
        				</table>
        			
        		</div>
        	</section2>
        </section1>
        <footer>
    		<div class="container">
        		    <div class="end">Thank you very much for become a member of Aorta Group!!.</div>
        			<div class="thanks">
        				<button type="button" class="btn btn-success" id = "member-status"><i class="si si-user"></i> Status Membership</button>
								<!--<button type="button" class="btn btn-primary"><i class="si si-paper-plane"></i> Send Invoice</button>-->
						<button type="button" class="btn btn-info" onclick="invoiceprint()"><i class="si si-printer"></i> Print Invoice</button>
        			</div>
        			<!--<div class="notice">
        				<div>NOTICE:</div>
        				<div>A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        			</div>-->
        			
        		</div>
        	</footer>
        
    </div>
        
    </div>
</section>
<script type="text/javascript">
function invoiceprint()
{
            var divContents = $("#dvContainer").html();
            console.log(divContents);
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body>');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
}

    </script>