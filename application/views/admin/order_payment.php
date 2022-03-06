<?php
$amount = !empty($cardinfo[1]) ? (integer) $cardinfo[1] : 0;
$cardname = !empty($cardinfo[0]) ? $cardinfo[0] : "Free Card";
$vat_value = 0;//money_format("%i" , ($amount * 0) / 100);
$total_value =  $amount + $vat_value;
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
					<h3 class="card-title">#ORD-<?php echo $orderno ;?></h3>
					<div class="card-options">
					    <?php echo form_open_multipart('admin/payment_proceed?action=membership') ;?>
    					    <input type="hidden" name="order_id" value="<?php echo $orderno ;?>"/>
    					    <input type="hidden" name="currency" value="INR"/>
    					    <input type="hidden" name="amount" value="<?php echo $total_value ;?>"/>
    					    <input type="hidden" name="merchant_id" value="<?php echo MERCHANTID?>"/>
    					    <input type="hidden" name="redirect_url" value="<?php echo base_url('admin/ccavResponseHandler')?>"/>
    					    <input type="hidden" name="cancel_url" value="<?php echo base_url('admin/ccavResponseHandler')?>"/>
    					    <input type="hidden" name="billing_name" value="<?php echo $this->fname . " " .$this->lname; ?>"/>
    					    <input type="hidden" name="billing_address" value="<?php echo $this->paddress; ?>"/>
    					    <input type="hidden" name="billing_city" value="<?php echo $this->pcity;?>"/>
    					    <input type="hidden" name="billing_state" value="<?php echo $this->pstate;?>"/>
    					    <input type="hidden" name="merchant_param1" value="<?php echo $cardname;?>"/>
            			    <input type="hidden" name="customer_identifier" value="<?php echo $cardname;?>"/>
					    <button type="submit" class="btn btn-primary">Pay Now</button>
					    <?php  ?>
						<!--<button type="button" class="btn btn-sm btn-pink mr-2 create_payment_stripe"><i class="si si-wallet"></i> Pay Now</button> -->
					</div>
				</div>
				<div class="card-body">
					<div class=" text-dark">
						<p class="mb-1 mt-5"><span class="font-weight-semibold">Payment Date :</span> <?php echo date('d M Y');?></p>
					</div>
					<div class="table-responsive push">
						<table class="table table-bordered table-hover text-nowrap">
							<tr>
								<th class="text-center ">No</th>
								<th>Item Lists</th>
								<th class="text-center" >Qanitiy</th>
								<th class="text-right">Price</th>
							</tr>
							<tr>
								<td class="text-center">1</td>
								<td>
									<p class="font-w600 mb-1"><?php echo $cardname ; ?></p>
								</td>
								<td class="text-center">1</td>

								<td class="text-right"><?php echo  $amount; ?></td>
							</tr>
							<!--<tr>
								<td colspan="3" class="font-w600 text-right">Vat Rate</td>
								<td class="text-right">0%</td>
							</tr>
							<tr>
								<td colspan="3" class="font-w600 text-right">Vat Value</td>
								<td class="text-right"><?php echo $vat_value ;?></td>
							</tr>-->
							<tr>
								<td colspan="3" class="font-weight-semibold text-uppercase text-right">Total Pay</td>
								<td class="font-weight-semibold text-right"><?php echo $total_value ;?></td>
							</tr>
							<tr>
								<td colspan="4" class="text-right">
								<?php echo form_open_multipart('admin/payment_proceed?action=membership') ;?>
            					    <input type="hidden" name="order_id" value="<?php echo $orderno ;?>"/>
            					    <input type="hidden" name="currency" value="INR"/>
            					    <input type="hidden" name="amount" value="<?php echo $total_value ;?>"/>
            					    <input type="hidden" name="merchant_id" value="<?php echo MERCHANTID?>"/>
            					    <input type="hidden" name="redirect_url" value="<?php echo base_url('admin/ccavResponseHandler')?>"/>
            					    <input type="hidden" name="cancel_url" value="<?php echo base_url('admin/ccavResponseHandler')?>"/>
            					    <input type="hidden" name="billing_name" value="<?php echo $this->fname . " " .$this->lname; ?>"/>
            					    <input type="hidden" name="billing_address" value="<?php echo $this->paddress; ?>"/>
            					    <input type="hidden" name="billing_city" value="<?php echo $this->pcity;?>"/>
            					    <input type="hidden" name="billing_state" value="<?php echo $this->pstate;?>"/>
            					    <input type="hidden" name="merchant_param1" value="<?php echo $cardname;?>"/>
            					    <input type="hidden" name="customer_identifier" value="<?php echo $cardname;?>"/>
        					        <button type="submit" class="btn btn-primary"><i class="si si-wallet"></i>Pay Now</button>
        					    <?php  ?>
								</td>
							</tr>
						</table>
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