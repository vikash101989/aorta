<style>
    .disablea{
    pointer-events: none;
    background-color: #b6b4e0;
    }
</style>

<div class="col-xl-9 col-lg-12 col-md-12">
						<div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Orders List</div>
                        
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example2" class="hover table-bordered border-top-0 border-bottom-0" >
                                            <thead>
                                                <tr>
                                                    <th>#Sr. No</th>
                                                    <th>#OrderNo</th>
                                                    <th>Category</th>
                                                    <th>Date</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            if(!empty($order_list)){
                                              $sn =1;
                                              
                                              foreach($order_list as $order){
                                            ?>
                                            <tr>
                                              <td><?php echo $sn;?></td>
                                              <td><?php echo $order['orderno'] ;?></td>
                                              <td><?php echo $order['payfor'] ;?></td>
                                              <td><?php echo $order['created_at'] ;?></td>
                                              <td><?php echo $order['amount'] ;?></td>
                                              <td><a href="<?php echo base_url('admin/invoice/'.$this->pid); ?>" class="badge badge-primary disablea">Invoice</a></td>
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
		</section>