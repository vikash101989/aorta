
            <div class="col-xl-9 col-lg-12 col-md-12">
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
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">Reset Your Password</h3>
                    </div>
                     <span class="pull-right text-center text-danger mt-3" id="pass_err"></span>
                    <div class="card-body mb-0">
                       
                        <form class="form-horizontal">
                            
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" id="inputPassword5">New Password</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" id="inputPassword6" placeholder="New Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" id="inputPassword7">Re Password</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" id="inputPassword8" placeholder="Retype Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0 row justify-content-end">
                                <div class="col-md-9 float-right">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light pull-right" id ="password_reset" >Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
