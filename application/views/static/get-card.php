<style>
    .item-card9-imgs {
    height: 186px;
}
</style>
<!--Sliders Section-->
<?php $cardaction =$this->input->get('action'); ?>	
		
		<!--Pricing Tables 1-->
		<div class="sptb bg-white" id="get-card">
			<div class="container">
				<div class="section-title center-block text-center">
					<h4>Purchase Membership</h4>
					<p>We are flexible with your budget and heath</p>
				</div>
				<div class="row">
				    <div class="col-sm-6 col-lg-3">
								<div class="card">
								    <div class="card-status bg-primary"></div>
									<div class="card-body text-center">
										<div class="card-category">Basic</div>
										<div class="display-3 my-4">Free</div>
										<ul class="list-unstyled leading-loose">
											<li> Online Appointment </li>
											<li><i class="fe fe-check text-success mr-2"></i> 24/7 support</li>
											<li><i class="fe fe-check text-success mr-2"></i> DashBord</li>
											<li><i class="fe fe-x text-danger mr-2"></i>Discount upto 50%</li><li><i class="fe fe-check text-success mr-2"></i> 0 Tests</li>
											<li><i class="fe fe-check text-success mr-2"></i> 1 years valid </li>
											<li>&nbsp</li>
										</ul>
										<div class="text-center mt-6">
										<?php echo form_open_multipart('admin/order_pay?action='.$cardaction) ;?>
        							        <input type="hidden"  name="cardamount" value="0">
        							        <input type="hidden"  name="cardname" value="Free Member">
        								    <button type="submit" class="btn btn-primary">Purchase Now</button>
                                        </form>
										</div>
									</div>
								</div>
							</div>
				    <div class="col-sm-6 col-lg-3">
								<div class="card">
									<div class="card-status bg-primary"></div>
									<div class="card-body text-center">
										<div class="card-category">Premium</div>
										<div class="display-3 my-4">₹200</div>
										<ul class="list-unstyled leading-loose">
											<li> Online Appointment </li>
											<li><i class="fe fe-check text-success mr-2"></i> 24/7 support</li>
											<li><i class="fe fe-check text-success mr-2"></i> DashBord</li>
											<li><i class="fe fe-check text-success mr-2"></i> Discount upto 50%</li>
											<li><i class="fe fe-check text-success mr-2"></i> 0 Tests </li>
											<li><i class="fe fe-check text-success mr-2"></i> 1 year valid </li>
											<li>&nbsp</li>
										</ul>
										<div class="text-center mt-6">
											<?php echo form_open_multipart('admin/order_pay?action='.$cardaction) ;?>
            								    <input type="hidden"  name="cardamount" value="200">
            							        <input type="hidden"  name="cardname" value="Premium Member">
            								    <button type="submit" class="btn btn-primary">Purchase Now</button>
                                            </form>
										</div>
									</div>
								</div>
							</div>
					<div class="col-sm-6 col-lg-3">
								<div class="card">
								    <div class="card-status bg-primary"></div>
									<div class="card-body text-center">
										<div class="card-category">Silver</div>
										<div class="display-3 my-4">₹499</div>
										<ul class="list-unstyled leading-loose">
											<li> Online Appointment </li>
											<li><i class="fe fe-check text-success mr-2"></i> 24/7 support</li>
											<li><i class="fe fe-check text-success mr-2"></i> DashBord</li>
											<li><i class="fe fe-check text-success mr-2"></i>Discount upto 50%</li>
											<li><i class="fe fe-check text-success mr-2"></i> 8 Tests (<small><span class="">H, W, BMI, BP, Pulse, SPO2T, BG </span></small>)</li>
											<li><i class="fe fe-check text-success mr-2"></i> 1 year valid </li>
										</ul>
										<div class="text-center mt-6">
											<?php echo form_open_multipart('admin/order_pay?action='.$cardaction) ;?>
            								    <input type="hidden"  name="cardamount" value="499">
            							        <input type="hidden"  name="cardname" value="Silver Member">
            								    <button type="submit" class="btn btn-primary">Purchase Now</button>
                                            </form>
										</div>
									</div>
								</div>
							</div>
					<!--<div class="col-sm-6 col-lg-3">
								<div class="card">
								    <div class="card-status bg-primary"></div>
									<div class="card-body text-center">
										<div class="card-category">Gold</div>
										<div class="display-3 my-4">₹2000</div>
										<ul class="list-unstyled leading-loose">
											<li> Online Appointment </li>
											<li><i class="fe fe-check text-success mr-2"></i> 24/7 support</li>
											<li><i class="fe fe-check text-success mr-2"></i> DashBord</li>
											<li><i class="fe fe-check text-success mr-2"></i>Discount upto 50%</li>
											<li><i class="fe fe-check text-success mr-2"></i>Thyrocare Aarogyam 1.3( 90 tests)</li>
										</ul>
										<div class="text-center mt-6">
											 <?php echo form_open_multipart('admin/order_pay?action='.$cardaction) ;?>
								    <input type="hidden"  name="cardamount" value="2000">
							        <input type="hidden"  name="cardname" value="Gold Member">
								    <button type="submit" class="btn btn-primary">Purchase Now</button>
                                </form>
										</div>
									</div>
								</div>
							</div>-->
					
				</div>
			</div>
		</div>
	