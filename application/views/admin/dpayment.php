<?php
$orgid = !empty($orgdata['orgid']) ? $orgdata['orgid']: ($orgdata['id'] ? $orgdata['id'] : ""); 
$orgname = !empty($orgdata['orgname']) ? $orgdata['orgname']: ""; 
$email = !empty($orgdata['email']) ? $orgdata['email']: ""; 
$gfee = !empty($orgdata['gfee']) ? $orgdata['gfee']: ""; 
$orderno = rand(1110, 987659778787);
?>
<div class="col-xl-9 col-lg-12 col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Payment Method</h3>
							</div>
							<div class="card-body">
								<div class="card-pay">
									<div class="tab-content">
										<div class="tab-pane active show">
										    <?php echo form_open_multipart('admin/payment_proceed?action=generalfee') ;?>
										    <div class="row">
												<div class="col-sm-6">
        											<div class="form-group">
        												<label class="form-label">Organization Name</label>
        												<input type="text" class="form-control" name="merchant_param1" value = "<?php echo $orgname; ?>" placeholder="Organization Name" readonly>
        											</div>
        										</div>
        										<div class="col-sm-6">
        											<div class="form-group">
        												<label class="form-label">Name</label>
        												<input type="text" class="form-control" name="billing_name" value = "<?php echo $this->pfname ." ". $this->plname ; ?>" placeholder="Your Name">
        											</div>
        										</div>
        									</div>
        									<div class="row">
												<div class="col-sm-6">
        											<div class="form-group">
        												<label class="form-label">Email</label>
        												<input type="text" class="form-control" name="billing_email" value = "<?php echo $this->pemail ; ?>" placeholder="Your Email">
        											</div>
        										</div>
        										<div class="col-sm-6">
        											<div class="form-group">
        												<label class="form-label">Mobile</label>
        												<input type="text" class="form-control" name="billing_tel" value = "<?php echo $this->pmobile; ?>" placeholder="First Name">
        											</div>
        										</div>
        									</div>
        									<div class="row">
												<div class="col-sm-6">
        											<div class="form-group">
        												<label class="form-label">General Fee</label>
        												<input type="text" class="form-control" name="amount" value = "<?php echo $gfee; ?>" placeholder="Fee" readonly>
        											</div>
        										</div>
        										<div class="col-sm-6">
        										</div>
        									</div>
            								<div class="row">
        									    <div class="col-sm-12">
        									        <input type="hidden" name="order_id" value="<?php echo $orderno ;?>"/>
                                					<input type="hidden" name="currency" value="INR"/>
                            					    <input type="hidden" name="merchant_id" value="<?php echo MERCHANTID?>"/>
                            					    <input type="hidden" name="redirect_url" value="<?php echo base_url('admin/orderResponseHandler')?>"/>
                            					    <input type="hidden" name="cancel_url" value="<?php echo base_url('admin/orderResponseHandler')?>"/>
                            					    <input type="hidden" name="billing_address" value="<?php echo $this->paddress; ?>"/>
                            					    <input type="hidden" name="billing_city" value="<?php echo $this->pcity;?>"/>
                            					    <input type="hidden" name="billing_state" value="<?php echo $this->pstate;?>"/>
                            					    <input type="hidden" name="customer_identifier" value="<?php echo $orgid ;?>"/>
        									    <button type="submit" class="btn btn-primary pull-right"><i class="si si-wallet"></i>Pay Now</button>
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
		</section>
		<!--/User dashboard-->