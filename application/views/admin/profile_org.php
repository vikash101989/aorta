<style>
    .postion-button {
        position: absolute;
        bottom: 12px;
        right: 0;
    }
    .card-text {
        font-size: 11px;
        font-weight: 700;
        
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
                                    <div class="card-title">Patients List</div>
                        
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example2" class="hover table-bordered border-top-0 border-bottom-0" >
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Card no</th>
                                                    <th>Phone</th>
                                                    <th>City</th>
                                                    <th>Booking Date</th>
                                                    <th>Cheking status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            if(!empty($patient_lists)){
                                              $sn =1;
                                              
                                              foreach($patient_lists as $all_list){
                                                  $button_name = ($all_list['payment_status']> 0) ? 'badge-success' : 'badge-danger';
                                                  $text_value = ($button_name=='badge-success') ? 'Activated' : 'pending';
                                            ?>
                                            <tr>
                                              <td><?php echo ucfirst($all_list['fname']) .' '. ucfirst($all_list['lname']);?></td>
                                              <td><?php echo $all_list['cardnumber'] ?><a href="#" class="badge <?php echo $button_name ?>"><?php echo  $text_value ?></a></td>
                                              <td><?php echo $all_list['mobile']?></td>
                                              <td><?php echo ucfirst($all_list['city']) .' '. ucfirst($all_list['lname']);?></td>
                                              <td><?php echo $all_list['selectedDate'] ?></td>
                                              <td>
                                                  <a href="javascript:void(0)" class="btn btn-outline-primary btn-pill btn-sm" data-id ="" data-table="">
                                                    <i class="fa fa-user-plus" data-toggle="tooltip" title="" data-original-title="Accept"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-outline-primary btn-pill btn-sm" data-id ="">
                                                    <i class="fa fa-user-times" data-toggle="tooltip" title="" data-original-title="Reject"></i>
                                                </a>
                                              </td>
                                            </tr>
                                              <?php } } ?>
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

<!-- small Modal -->
<div class="modal fade show" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
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

