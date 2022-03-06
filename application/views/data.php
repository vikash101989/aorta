<div class="row">
 <?php

$img_ulr = $name = $title =$specialization = $organisation_name = $location = '';
if (!empty($users)) {
    foreach ($users as $data) {
        $id = !empty($data['id']) ? $data['id'] : '';
        $lname = !empty($data['lname']) ? $data['lname'] : '';
        $title = ($data['role'] == 'doctor') ? "Dr. " : '';
        $name = !empty($data['fname']) ? $title . " " . $data['fname'] . " " . $lname : '';
        $specialization = !empty($data['specialization']) ? $data['specialization'] : '';
        $organisation_name  = !empty($data['organisation_name']) ? $data['organisation_name'] : '';
        $name = !empty($organisation_name) ? $organisation_name : $name;
        $location = !empty($data['city']) ? $data['city'] : '';
        if(!empty($data['profile_image'])){
                $img_ulr = base_url('assets/images/profile/').$data['profile_image'];
                if (!@getimagesize($img_ulr)) {
                    $img_ulr =  base_url('assets/images/faces/doctors/1.jpg');
                } 
        } else {
                $img_ulr = base_url('assets/images/faces/doctors/1.jpg'); 
        }
        ?>
       <div class="col-lg-6 col-md-12 col-xl-4">
            <div class="card overflow-hidden">
                <div class="item-card9-imgs">
                    <a href="<?php echo base_url().'admin/detail/'. $id ?> "></a>
                    <img src=" <?php echo $img_ulr ?>" alt="img" class="w-100 h-100">
                </div>
                <div class="card-body">
                    <div class="item-card2">
                        <div class="item-card2-desc text-center">
                            <div class="item-card2-text">
                                <a href="<?php echo base_url().'admin/detail/'. $id ?>" class="text-dark"><h6 class="font-weight-bold mb-1"><?php echo strtoupper($name);?></h6><span class ="text-small"><?php if(!empty($location)) echo "(". strtolower($location) . ")" ; ?></span></a>
                            </div>
                            <p class="fs-16"><?php echo $specialization ?></p>
                            <a class="btn btn-primary" href="<?php echo base_url().'admin/detail/'. $id ?>"> Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
     } else { ?>
    <button type="button" id = "get-data" class="btn btn-primary btn-block">No More Data Found</button>
     <?php   } ?>
     <br>
	</div>
	<div class="row">
        <div class="center-block text-center">
		   	<?php echo $this->ajax_pagination->create_links(); ?>	
		</div>
	</div>
                            