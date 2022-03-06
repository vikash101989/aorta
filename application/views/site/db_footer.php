</div>
<!--footer-->
<footer class="footer">
        <div class="container">
                <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
                                Copyright © <?php echo date('Y');?> Aorta Laboratories Pvt. Ltd. | All rights reserved.</a> Developed by <a href="#" class="fs-14 text-primary">Vikash</a>
                        </div>
                </div>
        </div>
</footer>
<!-- End Footer-->
    </div>

    <!-- Back to top -->
    <a href="#top" id="back-to-top" ><i class="fa fa-rocket"></i></a>


    <!-- Dashboard Core -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-4.1.3/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-4.1.3/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/vendors/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/vendors/selectize.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/vendors/jquery.tablesorter.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/vendors/circle-progress.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/rating/jquery.rating-stars.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/echarts/echarts.js"></script>

    <!-- Fullside-menu Js-->
    <script src="<?php echo base_url();?>assets/plugins/toggle-sidebar/sidemenu.js"></script>

    <!-- Data tables -->
    <script src="<?php echo base_url();?>assets/plugins/datatable/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/datatable.js"></script>
    <!--Select2 js -->
    <script src="<?php echo base_url();?>assets/plugins/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/select2.js"></script>

    <!-- Charts Plugin -->
    <script src="<?php echo base_url();?>assets/plugins/chart/Chart.bundle.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/chart/utils.js"></script>

    <!-- Input Mask Plugin -->
    <script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.mask.min.js"></script>

    <!--Morris.js Charts Plugin -->
    <script src="<?php echo base_url();?>assets/plugins/morris/raphael-min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/morris/morris.js"></script>
    <!-- Datepicker js -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Index Scripts -->
    <script src="<?php echo base_url();?>assets/js/index2.js"></script>

    <!-- Custom scroll bar Js-->
    <script src="<?php echo base_url();?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

    <!--Counters -->
    <script src="<?php echo base_url();?>assets/plugins/counters/counterup.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/counters/waypoints.min.js"></script>

    <!-- Custom Js-->
    <script src="<?php echo base_url();?>assets/js/admin-custom.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo base_url();?>assets/js/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?php echo base_url();?>assets/js/toastr.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/formelements.js"></script>
    <!-- file uploads js -->
    <script src="<?php echo base_url();?>assets/plugins/fileuploads/js/dropify.js"></script>
    
    <script>
      $(document).ready(function(){
          
            var role =    '<?php echo set_value('role'); ?>';
            var gender =    '<?php echo set_value('gender'); ?>';
            var sepecialization = '<?php echo set_value('sepecialization'); ?>';
            $('#role').val(role);
            $('#gender').val(gender);
            $('#sepecialization').val(sepecialization);
            setTimeout(function() { 
              $('.alert-dismissible').hide(); 
            }, 3000);
            
            $( "#role" ).change(function () {
                var role = $(this).val();
                if(role === 'customer' || role === 'employee') {
                    $('#hide-section').hide("3000");
                    $('#hide-section1').hide("3000");
                    $('#hide-section2').hide("3000");
                    $('#hide-section3').hide("3000");
                } else {
                    $('#hide-section').show("4000");
                    $('#hide-section1').show("4000");
                    $('#hide-section2').show("4000");
                    $('#hide-section3').hide("3000");
                }
              });
              $('#example2 tbody').on('click', '.clickapprove', function () {
            //$('.clickapprove').on('click', function(){
                var appr = $(this).text().trim();
                var apprid =$(this).data('id');
                var role = '<?php echo $this->role ;?>';
                if((role === 'admin' || role === 'employee') && apprid !== ''){
                    var apprvalue = (appr === "Active") ? 0 : 1;
                    $.ajax({
                           url: '<?php echo base_url('admin/approve');?>',
                           type:"POST",
                           data: {"apprid":apprid,"apprvalue": apprvalue},
                           success: function( response ) {
                               if(response > 0){
                                   toastr.success('Update Successfully!!');
                               }else {
                                   toastr.error('Not Arrorve');
                               }
                                location.reload();
                           }
                       });
                }else{
                    toastr.error('You do not have Permission');
                }
            });
            
        });
    </script>
    <?php if(!empty($this->role) && $this->urlsegment ==='edit_user' || $this->urlsegment ==='edit_organization'){ ?>
        <script>
            var erole =    '<?php echo $this->role; ?>';
            var egender =    '<?php echo $this->gender; ?>';
            var esepecialization = '<?php echo $this->specialization; ?>';
            $('#roles').val(erole);
            $('#genders').val(egender);
            $('#specialization').val(esepecialization);
        </script>
     <?php } ?>

</body>
</html>