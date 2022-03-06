<style>
    .postion-button {
        position: absolute;
        bottom: 12px;
        right: 0;
    }
    .card-text {
        font-size: 11px;
        font-weight: 700;
        width: 100%;
    }
    .modal-booking{
        background-color: #896388;
        color: #fff;
    }
    .modalheader {
        color: #fff;
        background: #6963ff;
    }
</style>

                <div class="col-xl-9 col-lg-12 col-md-12">
                    <?php 
                        $msg = $this->session->flashdata('errmsg');
                        if(!empty($msg)): ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h6> <?php echo $msg; ?></h6>
                        </div>
                    <?php endif; ?>
                    <?php 
                        $msg = $this->session->flashdata('msg');
                        if(!empty($msg)): ?>
                        <div class="alert alert-success alert-dismissible">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <h6><?php echo $msg; ?></h6>
                       </div>
                    <?php endif; ?>
                         <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Booking List</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example2" class="hover table-bordered border-top-0 border-bottom-0" >
                                            <thead>
                                                <tr>
                                                    <th>Sr. No</th>
                                                    <th>Name</th>
                                                    <th>Profession</th>
                                                    <th>Location</th>
                                                    <th>City</th>
                                                    <th>Booking Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            if(!empty($patient_lists)){
                                               
                                             $sn =1;
                                             foreach($patient_lists as $all_list){
                                            ?>
                                            <tr>
                                              <td><?php echo $sn ;?></td>
                                              <td><?php echo ucfirst($all_list['fname']) .' '. ucfirst($all_list['lname']);?></td>
                                              <td><?php echo ucfirst($all_list['role']);?></td>
                                              <td><?php echo ucfirst($all_list['address']);?></td>
                                              <td><?php echo ucfirst($all_list['city']);?></td>
                                              <td><?php echo $all_list['selectedDate'] ?></td>
                                              <td>
                                                <?php 
                                                    $approvevalue = ($all_list['status'] == 1) ? "Cancel" : (($all_list['status'] == 2) ? "Cancelled" : "Done"); 
                                                    $button_value = ($approvevalue == "Cancel") ? 'btn-outline-success' : (($approvevalue == "Cancelled") ? "btn-outline-primary" : "btn-outline-primary");
                                                ?>
                                               
                        					    <!--<a href="javascript:void(0)" class="btn <?php echo $button_value ;?> btn-pill btn-sm is_deleted" data-id ="<?php echo $all_list['ordertableid'] ; ?>" data-table="ordertable">
                                                    <i class="fa fa-trash" data-toggle="tooltip" title="" data-original-title="Delete"></i>
                                                </a>-->
                                                <a href="javascript:void(0)" class="btn <?php echo $button_value ;?> btn-pill btn-sm is_cancel" data-id ="<?php echo $this->userid ; ?>">
                                                    <i class="fa fa-remove"" data-toggle="tooltip" title="" data-original-title="<?php echo $approvevalue ?>"></i>
                                                </a>
                                                <input type="hidden" class="organization_id" value="<?php echo $all_list['organization_id'] ;?>">
                        					    <input type="hidden" class="created_at" value="<?php echo $all_list['created_at'] ;?>"> 
                        					    <input type="hidden" class="selecteddate" value="<?php echo $all_list['selectedDate'] ;?>"> 
                                              </td>
                                            </tr>
                                              <?php $sn++; } } ?>
                                            </tbody>
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
<!--/User Dashboard-->

<!-- small Modal -->
<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-booking">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alert!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>You have not an active card. Please click on Buy Card or Renew card button below. If you already purchased and show this dialog box please contact our support.</p>
            </div>
            <div class="modal-footer">
                <div class="btn-list text-center">
					<a href="<?php echo base_url('admin/get_card?action=newcard')?>" class="btn btn-primary">Get Card</button></a>
					<a href="<?php echo base_url('admin/get_card?action=renewcard')?>" class="btn btn-secondary">Renew Card</button></a>
					<a href="#" class="btn btn-danger" data-dismiss="modal">Close</button></a>
				</div>
            </div>
        </div>
    </div>
</div>

<!-- small Modal -->
<div class="modal fade show" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modalheader">
                <h5 class="modal-title" id="exampleModalLabel">I am ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form id= "basic-form" action="<?php echo base_url('admin/roleupdate'); ?>" method="post">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="selectrole" class="form-label text-dark">Select Role</label>
                        <select id="selectrole" name ="selectrole"  class="form-control" required>
                            <option value="">Select Role</option>
                            <option value="customer">Patient</option>
                            <option value="doctor">Doctor</option>
                            <option value="hospital">Hospital</option>
                            <option value="laboratories">Diagnostic Center</option>
                            <option value="medicalhall">Pharmacy</option>
                            <option value="babycare">Baby Care</option>
                            <option value="other">Others</option>
                        </select>
                    </div>
                    <div class="form-footer mt-2">
                        <button type="submit" class="btn btn-primary btn-block">Role update</button>
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <div class="btn-list text-center">
					<a href="#" class="btn btn-danger" data-dismiss="modal">Close</button></a>
				</div>
            </div>
        </div>
    </div>
</div>

<script>
  $(document).ready(function () {
    $("#selectrole").val('<?php echo $this->role ?>');
    $("#selectrole").change(function(){
        if (confirm('Are you sure you want to change your role?')) {
            return true;
        } else {
            $("#selectrole").val('<?php echo $this->role ?>');
            return false;
        }
    });

  });
</script>

