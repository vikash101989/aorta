<?php $role = $this->input->get('user'); ?>

<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        
        <div class="row mt-5">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?php echo ucfirst($role)."s List";?></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="hover table-bordered border-top-0 border-bottom-0" >
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Specialization</th>
                                        <th>Organisation</th>
                                        <th>City</th>
                                        <th>Image</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                if(!empty($all_lists)){
                                  foreach($all_lists as $all_list){
                                ?>
                                <tr>
                                  <td><?php echo ucfirst($all_list['fname']) .' '. ucfirst($all_list['lname']);?></td>
                                   <?php if($this->input->get('user') !='customer'){ ?>
                                  <td><?php echo ucfirst($all_list['specialization']);?></td>
                                  <td><?php echo ucfirst($all_list['organisation_name']);?></td>
                                   <?php } ?>
                                  <td><?php echo ucfirst($all_list['city'])?></td>
                                  <td><?php 
                                  if(!empty($all_list['profile_image'])){
                                         $img_ulr = base_url('assets/images/profile/').$all_list['profile_image'];
                                    if (!@getimagesize($img_ulr)) {
                                        $img_ulr =  base_url('assets/images/faces/doctors/1.jpg');
                                        }
                                  
                                  ?>
                                    <img src="<?php echo $img_ulr ;?>" alt="profile face" width="35" style="margin-left: 10%;">
                                  <?php } else { ?>
                                    <img src="<?php echo base_url();?>assets/images/faces/male/25.jpg" alt="profile face" width="35" style="margin-left: 10%;">
                                 `<?php }?>
                                  </td>
                                    <td class="text-right">
                                        <a href="<?php echo base_url();?>admin/detail/<?php echo $all_list['id']?>" class="btn btn-outline-primary btn-pill btn-sm" >
                                                <i class="dropdown-icon si si-user" data-toggle="tooltip" title="" data-original-title="Detail"></i>Detail 
                                        </a>  
                                        <a href="<?php echo base_url();?>admin/edit_organization/<?php echo $all_list['userid']?>" class="btn btn-outline-primary btn-pill btn-sm" >
                                            <i class="dropdown-icon fa fa-check-square-o" data-toggle="tooltip" title="" data-original-title="Edit"></i>Edit
                                        </a>
                                        <?php 
                                            $approvevalue = ($all_list['is_post_list'] == 1) ? "Active" : "Deactivate" ;
                                            $button_value = ($approvevalue == "Active") ? 'btn-outline-success' : 'btn-outline-warning';
                                        ?>
                                        <a href="javascript:void(0)" class="btn <?php echo $button_value ;?> btn-pill btn-sm clickapprove" data-id ="<?php echo $all_list['userid']; ?>">
                                                <i class="dropdown-icon  fa fa-bell-o" data-toggle="tooltip" title="" data-original-title="<?php echo $approvevalue ?>"></i><?php echo $approvevalue ?>
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

