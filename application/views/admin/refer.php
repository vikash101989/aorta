<style>
   .credit{
       min-height: 152px;
       background:#ffa22b
   }
</style>
<?php 
$acountCredit = !empty($acountCredit) ? $acountCredit : 0;
?>
<div class="col-xl-9 col-lg-12 col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Use creadits</h3>
							</div>
							<?php $msg = $this->session->flashdata('errmsg');
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
                            	<div class="card-body credit">
								<div class="card-pay">
									<div class="tab-content">
									    <div class="text-center text-white" style="margin-top: 50px;">
            							    <h1><?php echo $acountCredit; ?></h1><span>Credits</span>
                    					</div>
								    </div>
							</div>
						</div>
							<div class="card-body mt-2">
								<div class="card-pay">
									<div class="tab-content">
										<div class="tab-pane active show" id="tab1">
										    <form action="<?php echo base_url('admin/refered'); ?>" method="post">
											<div class="row">
											    <div class="col-md-12">
    												<div class="offset-md-3 col-sm-4">
    													<div class="form-group">
    														<label class="form-label">Email Addess</label>
    														<div class="input-group">
    															<input type="text" class="form-control" placeholder="Enter your friend email address" name='guestemail'>
    														</div>
    													</div>
    												</div>
												</div>
												<!--div class="col-md-12"><div class="offset-md-4 col-sm-4"> <p class="or-text">OR</p>  </div></div>
												<div class="col-md-12">
    												<div class="offset-md-3 col-sm-4">
    													<div class="form-group">
    														<label class="form-label">Mobile No</label>
    														<input type="text" class="form-control number"  placeholder="Enter your friend mobile" name='guestmobile'>
    													</div>
    												</div>
    											</div>-->
											</div>
											<div class="col-md-12"><div class="offset-md-8 col-sm-4"><button type="submit" class="btn btn-primary pull-right btn-block">Submit</button> </div>
										</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/User dashboard-->