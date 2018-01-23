

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Silakan Log in</h3>
                    </div>
                    <div class="panel-body">
                        <?php if($this->session->flashdata('message')){
                            ?> <span class="label label-danger"> <?php echo $this->session->flashdata('message'); ?></span><?php 
                        }
                        ?>
                        <form role="form" name="login" action ="<?=site_url('C_Admin/authadmin'); ?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
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

