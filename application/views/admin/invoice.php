<?php
$amount = !empty($cardinfo[1]) ? (integer) $cardinfo[1] : 0;
$cardname = !empty($cardinfo[0]) ? $cardinfo[0] : "Free Card";
$vat_value = money_format("%i" , ($amount * 5) / 100);
$total_value = money_format("%i" , $amount + $vat_value);
$orderno = rand(1110, 987659778787);
$cardaction =$this->input->get('action');
?>
<style>
    .Checkout.is-desktop .Header-logoImageCatchError {
    position: relative;
    /* display: none; */
    width: 196%;
    /* position: absolute; */
    right: 26px;
}
</style>
<div class="col-xl-9 col-lg-12 col-md-12">
    <div class="row ">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">#INV-287</h3>
					<div class="card-options">
						<button type="button" class="btn btn-sm btn-pink mr-2"><i class="si si-wallet"></i> Pay Invoice</button>
					</div>
				</div>
				<div class="card-body">
					<div class="row ">
						<div class="col-lg-6 ">
							<p class="h3">Client Inc</p>
							<address>
								Street Address<br>
								State, City<br>
								Region, Postal Code<br>
								ltd@example.com
							</address>
						</div>
						<div class="col-lg-6 text-right">
							<p class="h3">Invoice To</p>
							<address>
								Street Address<br>
								State, City<br>
								Region, Postal Code<br>
								ctr@example.com
							</address>
						</div>
					</div>

					<div class=" text-dark">
						<p class="mb-1 mt-5"><span class="font-weight-semibold">Invoice Date :</span> 12rd July 2018</p>
						<p><span class="font-weight-semibold">Due Date :</span> 15th July 2019</p>
					</div>
					<div class="table-responsive push">
						<table class="table table-bordered table-hover text-nowrap">
							<tr>
								<th class="text-center "></th>
								<th>Item Lists</th>
								<th class="text-center" >Qanitiy</th>
								<th class="text-right">Price</th>
							</tr>
							<tr>
								<td class="text-center">1</td>
								<td>
									<p class="font-w600 mb-1">Jobs</p>
									<div class="text-muted">At vero eos et accusamus et iusto odio dignissimos ducimus qui </div>
								</td>
								<td class="text-center">1</td>

								<td class="text-right">$1,800.00</td>
							</tr>
							<tr>
								<td class="text-center">2</td>
								<td>
									<p class="font-w600 mb-1">RealEstate</p>
									<div class="text-muted">blanditiis praesentium voluptatum deleniti atque corrupti quos dolores </div>
								</td>
								<td class="text-center">1</td>
								<td class="text-right">$20,000.00</td>
							</tr>
							<tr>
								<td class="text-center">3</td>
								<td>
									<p class="font-w600 mb-1">Services</p>
									<div class="text-muted">At vero eos et accusamus et iusto odio dignissimos ducimus qui</div>
								</td>
								<td class="text-center">1</td>
								<td class="text-right">$3,200.00</td>
							</tr>
							<tr>
								<td colspan="3" class="font-w600 text-right">Subtotal</td>
								<td class="text-right">$25,000.00</td>
							</tr>
							<tr>
								<td colspan="3" class="font-w600 text-right">Vat Rate</td>
								<td class="text-right">20%</td>
							</tr>
							<tr>
								<td colspan="3" class="font-w600 text-right">Vat Due</td>
								<td class="text-right">$5,000.00</td>
							</tr>
							<tr>
								<td colspan="3" class="font-weight-semibold text-uppercase text-right">Total Due</td>
								<td class="font-weight-semibold text-right">$30,000.00</td>
							</tr>
							<tr>
								<td colspan="4" class="text-right">
									<button type="button" class="btn btn-pink"><i class="si si-wallet"></i> Pay Invoice</button>
									<button type="button" class="btn btn-primary" onClick="javascript:window.print();"><i class="si si-paper-plane"></i> Send Invoice</button>
									<button type="button" class="btn btn-info" onClick="javascript:window.print();"><i class="si si-printer"></i> Print Invoice</button>
								</td>
							</tr>
						</table>
					</div>
					<p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with you again!</p>
				</div>
			</div>
	
            </div>
        </div>
    </div>
</section>