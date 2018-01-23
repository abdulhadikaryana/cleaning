        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <strong>Kirim Email</strong>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php if($this->session->flashdata('status')=="success"){ ?>
                    <p><h3><span class="label label-success"><?php echo $this->session->flashdata('message'); ?></span></h3></p>
                    <?php }elseif ($this->session->flashdata('status')=='danger') {?>
                    <p><h3><span class="label label-danger"><?php echo $this->session->flashdata('message'); ?></span></h3></p>
                    <?php } ?>
                </div>
                
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-envelope-o fa-fw"></i> Buat Email
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <!--  form kirim email  -->
                           
                           <form name="daftar" enctype="multipart/form-data" id="daftarform" action ="<?=site_url('C_Admin/send'); ?>" method="post">
                                <div class="row-lg-12">
                                    <div class="form-group">
                                        <input type ="text" class ="form-control" placeholder="Kepada" id="address" name="address" >
                                        <p class ="help-block text-danger"></p>
                                    </div>
                                    <div class="btn-group form-group" >
                                        <label class="btn btn-info active">
                                            <input type="checkbox" autocomplete="off" name="all"> Send To All
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input type ="text" class ="form-control" placeholder="Subject" id="subject" name="subject" required data-validation-required-message="silakan masukan Subject Email">
                                        <p class ="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <strong>Pesan</strong>
                                        <textarea style="min-height:250px" type ="text" class ="form-control"  id="pesan" name="pesan" required data-validation-required-message="silakan masukan Pesan"></textarea>
                                        <p class ="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Attach File</label>
                                        <input type="file" name="userfile">
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <div id="success"></div>
                                        <button type="submit" name ="submit" value="submit" class="btn btn-xl">Kirim</button>
                                    </div>
                                </div>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo HTTP_VENDOR_PATH;?>raphael/raphael.min.js"></script>
    <script src="<?php echo HTTP_VENDOR_PATH;?>morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url();?>/assets/admin/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    

    <script src="<?php echo HTTP_VENDOR_PATH;?>jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo HTTP_VENDOR_PATH;?>bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo HTTP_VENDOR_PATH;?>metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo HTTP_JS_PATH; ?>sb-admin-2.js"></script>

</body>

</html>
