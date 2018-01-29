        <div id="page-wrapper">
            <div class="row">
                
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
           
            <div class = "row">
                <form>
                    <!--  <div class="col-xs-4 form-group">
                        <input type="text" name="keyword" class="form-control">
                    </div> -->
                    <!-- <div class="col-xs-4 form-group">
                        <label>Kategori Search<br></label>
                        <select class="form-control" name="kategori">
                            <option value="provinsi">Provinsi</option>
                            <option value="name">Nama</option>
                        </select>
                    </div> -->
                </form> 
            </div>
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Upload
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <form name="upload" id="uploadform" enctype="multipart/form-data" action ="<?=site_url('C_Admin/importExcel'); ?>" method="post">
                                <div class="form-group">
                                    <label>Pilih File</label>
                                    <input type="file" name="importfile">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="jenis" value="sks">
                                </div>
                                <button type="submit" name ="submit" value="submit" class="btn btn-xl">Upload</button>
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                    
                </div>
                
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <!-- Modal -->




    <!-- Bootstrap Core JavaScript -->
    

    <!-- Metis Menu Plugin JavaScript -->
    

    <!-- Morris Charts JavaScript -->
    

    <!-- Custom Theme JavaScript -->
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table_data').DataTable();
        } );
    </script>
    <script src="<?php echo HTTP_VENDOR_PATH;?>jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo HTTP_VENDOR_PATH;?>bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo HTTP_VENDOR_PATH;?>metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo HTTP_JS_PATH; ?>sb-admin-2.js"></script>
    <script src='<?php echo HTTP_JS_PATH; ?>jquery-1.12.0.min.js' type='text/javascript'></script>
    

</body>

</html>
