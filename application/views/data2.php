<?php
$img_ulr = $name = $title =$specialization = $organisation_name = '';
if (!empty($users)) {
    foreach ($users as $data) {
        $id = !empty($data['id']) ? $data['id'] : '';
        $lname = !empty($data['lname']) ? $data['lname'] : '';
        $title = ($data['role'] == 'doctor') ? "Dr. " : '';
        $name = !empty($data['fname']) ? $title . " " . $data['fname'] . " " . $lname : '';
        $specialization = !empty($data['specialization']) ? $data['specialization'] : '';
        $organisation_name  = !empty($data['organisation_name']) ? $data['organisation_name'] : '';
        $name = !empty($organisation_name) ? $organisation_name : $name;
        if(!empty($data['profile_image'])){
                $img_ulr = base_url('assets/images/profile/').$data['profile_image'];
        } else {
                $img_ulr = base_url('assets/images/faces/doctors/1.jpg'); 
        }
        ?>
       <div class="col-lg-3 col-md-3 col-xl-3 col-sm-12">
            <div class="card overflow-hidden">
                <div class="item-card9-imgs">
                    <a href="<?php echo base_url().'admin/detail/'. $id ?> "></a>
                    <img src=" <?php echo $img_ulr ?>" alt="img" class="w-100 h-100">
                </div>
                <div class="card-body">
                    <div class="item-card2">
                        <div class="item-card2-desc text-center">
                            <div class="item-card2-text">
                                <a href="<?php echo base_url().'admin/detail/'. $id ?>" class="text-dark"><h6 class="font-weight-bold mb-1"><?php echo $name ?></h6></a>
                            </div>
                            <p class="fs-16"><?php echo $specialization ?></p>
                            <a class="btn btn-primary" href="<?php echo base_url().'admin/detail/'. $id ?>">Book Appointment</a>
                        </div>
                    </div>
                </div>
                <!--<div class="card-footer">
                    <div class="product-filter-desc">
                        <div class="product-filter-icons text-center">
                            <a href="#" class="border text-primary p-0"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="border text-primary p-0"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="border text-primary p-0"><i class="fa fa-google"></i></a>
                            <a href="#" class="border text-primary p-0"><i class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    <?php }
     } else { ?>
    <button type="button" id = "get-data" class="btn btn-primary btn-block">No More Data Found</button>;
     <?php   } ?>
      <div class="center-block text-center paging">
        <?php echo $this->ajax_pagination->create_links(); ?>	
   
    </div>  
                            