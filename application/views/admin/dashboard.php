<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <?php 
        $msg = $this->session->flashdata('errmsg');
            if(!empty($msg)): ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 <h6 class ="mt-2"> <?php echo $msg; ?></h6>
            </div>
        <?php endif; ?>
        <?php $msg = $this->session->flashdata('msg');
            if(!empty($msg)): ?>
            <div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <h6 class ="mt-2"> <?php echo $msg; ?></h6>
           </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
					<div>
						<div class="page-header">
							<h4 class="page-title">Dashboard</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
							</ol>
						</div>
						<div class="row">
							<div class="col-xl-3 col-lg-6 col-md-12">
								<div class="card ">
									<div class="card-body text-center">
										<div class="counter-status dash3-counter">
											<div class="counter-icon bg-primary text-primary">
												<i class="si si-people text-white"></i>
											</div>
											<h5>Doctor</h5>
											<h2 class="counter"><?php if(isset($countResult['doctor'])) { echo $countResult['doctor']; } else { echo "0" ;} ?></h2>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-12">
								<div class="card ">
									<div class="card-body text-center">
										<div class="counter-status dash3-counter">
											<div class="counter-icon bg-info text-info">
												<i class="fa fa-header text-white"></i>
											</div>
											<h5>Hospital</h5>
											<h2 class="counter"><?php if(isset($countResult['hospital'])) { echo $countResult['hospital']; } else { echo "0" ;} ?></h2>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-12">
								<div class="card ">
									<div class="card-body text-center">
										<div class="counter-status dash3-counter">
											<div class="counter-icon bg-success text-success">
												<i class="fa fa-flask text-white"></i>
											</div>
											<h5>Laboratories</h5>
											<h2 class="counter"><?php if(isset($countResult['laboratories'])) { echo $countResult['laboratories']; } else { echo "0" ;} ?></h2>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-12">
								<div class="card ">
									<div class="card-body text-center">
										<div class="counter-status dash3-counter">
											<div class="counter-icon bg-danger text-danger">
												<i class="si si-emotsmile text-white"></i>
											</div>
											<h5>Patient</h5>
											<h2 class="counter"><?php if(isset($countResult['customer'])) { echo $countResult['customer']; } else { echo "0" ;} ?></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-3 col-lg-6 col-md-12">
								<div class="card ">
									<div class="card-body text-center">
										<div class="counter-status dash3-counter">
											<div class="counter-icon bg-primary text-primary">
												<i class="fa fa-medkit text-white"></i>
											</div>
											<h5>Pharmacy</h5>
											<h2 class="counter"><?php if(isset($countResult['medicalhall'])) { echo $countResult['medicalhall']; } else { echo "0" ;} ?></h2>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-12">
								<div class="card ">
									<div class="card-body text-center">
										<div class="counter-status dash3-counter">
											<div class="counter-icon bg-info text-info">
												<i class="si si-rocket text-white"></i>
											</div>
											<h5>Clinic</h5>
											<h2 class="counter"><?php if(isset($countResult['clinics'])) echo $countResult['clinics']; else echo "0"; ?></h2>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-12">
								<div class="card ">
									<div class="card-body text-center">
										<div class="counter-status dash3-counter">
											<div class="counter-icon bg-success text-success">
												<i class="si si-docs text-white"></i>
											</div>
											<h5>Other</h5>
											<h2 class="counter"><?php if(isset($countResult['other'])) { echo $countResult['other']; } else { echo "0" ;} ?></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card m-b-20">
									<div class="card-header">
										<h3 class="card-title">Recent join list</h3>

									</div>
									<div class="card-body">
										<div class="visitor-list">
											<div class="media m-0 mt-0 border-bottom">
												<img class="avatar brround avatar-md mr-3" alt="avatra-img" src="../assets/images/faces/male/18.jpg">
												<div class="media-body">
													<a href="" class="text-default font-weight-semibold">John Paige</a>
													<p class="text-muted ">Uploaded new invoices for RedBus</p>
												</div>
											</div>
											<div class="media mt-2 border-bottom">
												<img class="avatar brround avatar-md mr-3" alt="avatra-img" src="../assets/images/faces/male/20.jpg">
												<div class="media-body">
													<a href="" class="text-default font-weight-semibold">Lillian Quinn</a>
													<p class="text-muted">Created new work flow for the current</p>
												</div>
											</div>
											<div class="media">
												<img class="avatar brround avatar-md mr-3" alt="avatra-img" src="../assets/images/faces/female/18.jpg">
												<div class="media-body">
													<a href="" class="text-default font-weight-semibold">Irene Harris</a>
													<p class="text-muted mb-0">Submitted the project schedule to the manager</p>
												</div>
											</div>

										</div>
									</div>
								</div>
                            </div>
							<div class="col-lg-6">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">10 Payment list</h3>
									</div>
									<div class="card-body">
										<div class="table-responsive border-top mb-0">
											<table class="table table-bordered table-hover mb-0">
												<thead>
													<tr>
														<th>Order ID</th>
														<th>Category</th>
														<th>Date</th>
														<th>Price</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>#89345</td>
														<td>Resturant</td>
														<td>07-12-2018</td>
														<td class="font-weight-semibold fs-16">$893</td>
														<td>
															<a href="#" class="badge badge-danger">Pending</a>
														</td>
													</tr>
													<tr>
														<td>#39281</td>
														<td>Electorincs</td>
														<td>12-11-2018</td>
														<td class="font-weight-semibold fs-16">$254</td>
														<td>
															<a href="#" class="badge badge-primary">Completed</a>
														</td>
													</tr>
													<tr>
														<td>#62391</td>
														<td>Jobs</td>
														<td>10-11-2018</td>
														<td class="font-weight-semibold fs-16">$643</td>
														<td>
															<a href="#" class="badge badge-danger">Pending</a>
														</td>
													</tr>
													<tr>
														<td>#92481</td>
														<td>Education</td>
														<td>07-11-2018</td>
														<td class="font-weight-semibold fs-16">$392</td>
														<td>
															<a href="#" class="badge badge-primary">Activated</a>
														</td>
													</tr>
													<tr>
														<td>#29381</td>
														<td>Services</td>
														<td>31-10-2018</td>
														<td class="font-weight-semibold fs-16">$295</td>
														<td>
															<a href="#" class="badge badge-danger">Pending</a>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div
            
        </div>
    </div>
</div>


