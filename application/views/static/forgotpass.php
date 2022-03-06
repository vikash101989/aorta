<style>
    .sptb {
    background: #ffffff;
}
 .text-marquee{
     color: #8e848f;
 }
</style>
<!--Page-->
<section class="sptb">
        <div class="container customerpage">
                    <div class="col-lg-12 d-block ">
                        <marquee>
                            <h4 class= "text-marquee">A Card holders can get discounts up to 50% on each Booking </h4>
                        </marquee>
                    </div> 
                    
        <div class="row">
            <div class="col-xl-12 col-md-12 col-md-12 register-right">
        		<div class="page ">
        			<div class="page-content z-index-10">
        				<div class="container">
        					<div class="row">
        						<div class="col-xl-4 col-md-12 col-md-12 d-block mx-auto">
        							<div class="card mb-0">
        							    <?php 
                                        $msg = $this->session->flashdata('errmsg');
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
        								<div class="card-body">
        								<form action="<?php echo base_url('admin/resetpassword'); ?>" method="post">
        									<div class="form-group">
        										<label class="form-label text-dark" for="exampleInputEmail1">Registered Mobile Number</label>
        										<input type="Text" class="form-control number" name = "mobile" placeholder="Enter Registered Mobile Number" required>
        									</div>
        									<div class="form-footer">
        										<button type="submit" class="btn btn-primary btn-block">Next</button>
        									</div>
        								</form>
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