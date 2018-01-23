

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Silakan Masukan Email</h3>
                    </div>
                    <div class="panel-body">
                        <div style="text-align:left; color:red; font-size: 0.875em;"><?php echo validation_errors(); ?> </div>
                        <?php if($this->session->flashdata('status')=="success"){ ?>
                        <p><h3><?php echo $this->session->flashdata('message'); ?></h3></p>
                        <?php }elseif ($this->session->flashdata('status')=='danger') {?>
                            <p><h3><?php echo $this->session->flashdata('message'); ?></h3></p>
                        <?php } ?>
                        <form role="form" name="login" action ="<?=site_url('Peserta/forgotpassword'); ?>" method="post">
                            <fieldset>
                                <div class ="form-group">
                                    <input type ="email" class ="form-control" placeholder="Email" id="email" name="email" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <!-- <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
                                <button type="submit" name ="submit" value="submit" class="btn btn-lg btn-success btn-block">Masuk</button>
                            </fieldset>
                        </form>
                        <div class="clear"></div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo HTTP_VENDOR_PATH;?>jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo HTTP_VENDOR_PATH;?>bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo HTTP_VENDOR_PATH;?>metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo HTTP_JS_PATH; ?>sb-admin-2.js"></script>


</body>
</html>