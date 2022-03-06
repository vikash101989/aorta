<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        
        <div class="row mt-5">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Paitent List</div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="hover table-bordered border-top-0 border-bottom-0" >
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>created</th>
                                        <th>Payment Status</th>
                                        <th>Image & Card link</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                if(!empty($all_lists)){
                                  $sn =1;
                                  foreach($all_lists as $all_list){
                                ?>
                                <tr>
                                  <td><?php echo $sn++;?></td>
                                  <td><?php echo ucfirst($all_list['fname']) .' '. ucfirst($all_list['lname']);?></td>
                                   <td><?php echo ucfirst($all_list['mobile'])?></td>
                                  <td><?php echo ucfirst($all_list['city'])?></td>
                                  <td><?php echo date("d-m-Y", strtotime($all_list['created_at']));?></td>
                                  <td><?php echo  ($all_list['payment_status']== 1) ? "Done": "Not Done" ?></td>
                                  <td><a href="<?php echo base_url();?>admin/cardprint/<?php echo $all_list['id']?>" target="_blank" ><?php 
                                      if(!empty($all_list['profile_image'])){
                                      
                                      $img_ulr = base_url('assets/images/profile/').$all_list['profile_image'];
                                    if (!@getimagesize($img_ulr)) {
                                        $img_ulr =  base_url('assets/images/faces/doctors/1.jpg');
                                        }
                                      ?>
                                        <img src="<?php echo $img_ulr;?>" alt="profile face" width="35" style="margin-left: 10%;">
                                      <?php } else { ?>
                                        <img src="<?php echo base_url();?>assets/images/faces/male/25.jpg" alt="profile face" width="35" style="margin-left: 10%;">
                                     `<?php }?></a>
                                  </td>
                                  <td class="text-right">
                                    <a href="#" class="btn btn-outline-info btn-pill btn-sm" data-toggle="modal" data-target="#smallModal">
                                        <i class="dropdown-icon si si-user" data-toggle="tooltip" title="" data-original-title="Detail"></i> Detail
                                    </a>
                                    <!--<a href="#" class="btn btn-outline-info btn-pill btn-sm">
                                       <i class="dropdown-icon fa fa-usd" data-toggle="tooltip" title="" data-original-title="Payment status"></i>
                                    </a>-->
                                     
                                    <?php 
                                        $approvevalue = ($all_list['is_post_list'] == 1) ? "Active" : "Deactivate" ; 
                                        $button_value = ($approvevalue == "Active") ? 'btn-outline-success' : 'btn-outline-danger';
                                    ?>
                                    <a href="javascript:void(0)" class="btn <?php echo $button_value ;?> btn-pill btn-sm is_post_list" data-id ="<?php echo $all_list['id']?>">
                                        <i class="dropdown-icon  si si-user" data-toggle="tooltip" title="" data-original-title="<?php echo $approvevalue ?>"></i><?php echo $approvevalue ?>
                                    </a>
                                    
                                    <a href="<?php echo base_url();?>admin/edit_user/<?php echo $all_list['id']?>" class="btn btn-outline-primary btn-pill btn-sm" >
                                        <i class="dropdown-icon fa fa-check-square-o" data-toggle="tooltip" title="" data-original-title="Edit"></i>Edit
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
<!-- small Modal -->
			<div id="smallModal" class="modal fade">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Reset User Password</h6>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>working on</p>
						</div><!-- modal-body -->
						<div class="modal-footer">
							<button type="button" class="btn btn-primary">Save changes</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div><!-- modal-dialog -->
			</div><!-- modal -->
<script>
        $(document).ready(function(){
             $('#example2 tbody').on('click', '.is_post_list', function () {
            var appr = $(this).text().trim();
            var apprid =$(this).data('id');
            var role = '<?php echo $this->role ;?>';
            var mobile = <?php echo $this->session->userdata('session_data')['mobile'] ?>;
            if(role === 'admin' && apprid !== '' || mobile == '9871833414'){
                var apprvalue = (appr === "Active") ? 0 : 1;
                $.ajax({
                      url: '<?php echo base_url('admin/status_change');?>',
                      type:"POST",
                      data: {"apprid":apprid,"is_post_list": apprvalue},
                      success: function( response ) {
                          if(response > 0){
                              toastr.success('update Successfully!!');
                          } else {
                              toastr.error('Not Arrorve');
                          }
                            location.reload();
                      }
                  });
            } else {
                toastr.error('You do not have Permission');
            }
        });
    });

</script>
