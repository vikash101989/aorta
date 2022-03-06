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
                <div class="card mb-0">
                        <div class="card-header">
                                <h3 class="card-title">Edit Profile</h3>
                        </div>
                        <div class="card-body">
                            <?php echo form_open_multipart('admin/update_profile'); ?>
                                <div class="row">
                                     <input type="hidden" name = "edit_userid" value="<?php echo $this->pid; ?>">
                                       <div class="col-sm-6 col-md-6">
                                            <?php echo form_error('fname', '<div class="error text-danger">', '</div>'); ?>
                                                <div class="form-group">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" name="fname" class="form-control disabled" value="<?php echo $this->pfname ?>" placeholder="First Name" readonly>
                                                </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" name="lname" class="form-control" value="<?php echo $this->plname ?>" placeholder="Last Name">
                                                </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                        <label class="form-label">Email address</label>
                                                        <input type="email" name ="email" class="form-control" value="<?php echo $this->pemail ?>" placeholder="Email">
                                                </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                     <?php echo form_error('mobile', '<div class="error text-danger">', '</div>'); ?>
                                                        <label class="form-label">Phone Number</label>
                                                        <input type="text" name ="mobile" class="form-control " value="<?php echo $this->pmobile ?>" placeholder="Mobile no" readonly>
                                                </div>
                                        </div>
                                    <!-- not for customer -->
                                    <?php if($this->role !='customer'){ ?>
                                        <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                        <label class="form-label">Specialization</label>
                                                        <input type="text" name="specialization" class="form-control" value="<?php echo $this->pspecialization; ?>" placeholder="Specialization">
                                                </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                        <label class="form-label">Exprerience</label>
                                                        <input type="text" name="experience" class="form-control" value="<?php echo $this->pexperience; ?>" placeholder="+ Exprerience in Year">
                                                </div>
                                        </div>
                                    <?php } ?>
                                    <!-- not for customer -->
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                        <label class="form-label">Address</label>
                                                        <input type="text" name ="address" class="form-control" value="<?php echo $this->paddress ?>" placeholder="Home Address">
                                                </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                        <label class="form-label">City</label>
                                                        <input type="text" name ="city" class="form-control" value="<?php echo $this->pcity ?>" placeholder="City">
                                                </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                        <label class="form-label">State</label>
                                                        <input type="text" name ="state" class="form-control" value="<?php echo $this->pstate ?>" placeholder="State">
                                                </div>
                                        </div>
                                        <div class="col-md-5">
                                                <div class="form-group">
                                                        <label class="form-label">Country</label>
                                                        <select class="form-control select2-show-search border-bottom-0 w-100 select2-show-search" name ="country"  data-placeholder="Select">
                                                                <optgroup label="Categories">
                                                                        <option value="india">India</option>
                                                                        <option value="nepal">Nepal</option>
                                                                </optgroup>
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                        <label class="form-label">Short Description</label>
                                                        <textarea rows="5" name ="description" class="form-control" placeholder="Enter About your description"><?php echo $this->pdescription ?></textarea>
                                                </div>
                                        </div>
                                        <div class="col-md-12">
                                                <div class="form-group mb-0">
                                                        <label class="form-label">Upload Image</label>
                                                        <div class="custom-file">
                                                                <input type="file" name ="profile_image" class="custom-file-input" name="example-file-input-custom">
                                                                <label class="custom-file-label">Choose file</label>
                                                        </div>
                                                </div>
                                        </div>
                                     </div>
                            </div>
                        <div class="card-footer">
                                <button type="submit" class="btn btn-primary pull-right">Updated Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
