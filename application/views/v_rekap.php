        <div id="page-wrapper">
            <div class="row">
                
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">    
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $total;?></div>
                                    <div>Jumlah Objek</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>

            <div class="row">    
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $total_full;?></div>
                                    <div>Data complete</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="row">    
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $total_kota;?></div>
                                    <div>Data terisi Kota</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>

            <div class="row">    
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $total_opk;?></div>
                                    <div>Data terisi OPK</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="row">    
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $duplikat;?></div>
                                    <div>jumlah duplikat</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
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
    <script src='<?php echo HTTP_JS_PATH; ?>script.js' type='text/javascript'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

</body>

</html>
