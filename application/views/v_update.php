<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Seniman Mengajar</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo HTTP_VENDOR_PATH;?>bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo HTTP_VENDOR_PATH;?>metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo HTTP_CSS_PATH; ?>sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo HTTP_VENDOR_PATH;?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Seniman Mengajar</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li><a href="<?php echo base_url().'C_Peserta/logout'?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </ul>
            
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="<?php echo base_url().'C_Peserta/detail'?>"><i class="fa fa-dashboard fa-fw"></i> Profil</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url().'C_Peserta/update'?>"><i class="fa fa-edit fa-fw"></i> Upload</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Peserta</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php if($this->session->flashdata('status')=="success"){ ?>
                <p><h3><span class="label label-success"><?php echo $this->session->flashdata('message'); ?></span></h3></p>
                <?php }elseif ($this->session->flashdata('status')=='danger') {?>
                    <p><h3><span class="label label-danger"><?php echo $this->session->flashdata('message'); ?></span></h3></p>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $this->session->userdata('nama_seniman'); ?>
                        </div>
                        <div class="panel-body">
                            <div class ="row">
                                <div class="col-lg-6">
                                    <div class="panel panel-default text-center">
                                        <div class ="panel-heading ">
                                            <?php if ($profpict != NULL){
                                                    ?><img class="img-responsive center-block" src="<?php echo base_url().$profpict;?>"><?php
                                                    }else {
                                                        ?> <img class="img-responsive center-block" src="<?php echo HTTP_IMAGES_PATH;?>default.png"><?php
                                            }?>
                                            <a href="#updateprofpict" class="portfolio-link btn btn-success btn-default" data-toggle="modal">
                                                UPDATE
                                            </a>
                                        </div>
                                        <div class="panel-body">
                                            <p>
                                                <span class="label label-info">Email            :</span><br><span class="label label-primary"><?php echo $this->session->userdata('email');?></span><br>
                                                <span class="label label-info">Daerah Pilihan   :</span><br><span class="label label-primary"><?php echo $this->session->userdata('region');?></span><br>
                                                <span class="label label-info">Jenis Bidang Seni:</span><br><span class="label label-primary"><?php echo $this->session->userdata('jenis_seni');?></span><br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class ="col-lg-6">
                                   <div class="panel panel-default text-center">
                                        <!-- panel untuk surat keterangan sehat -->
                                        <div class="panel-heading">
                                            <strong>Foto</strong>
                                        </div>
                                        <div class="panel-body">
                                            <?php if ($this->session->userdata('foto') != NULL){
                                                    ?><img class="img-responsive" src="<?php echo base_url().$this->session->userdata('foto');?>"><?php
                                                    }else {
                                                        ?> <img class="img-responsive center-block" src="<?php echo HTTP_IMAGES_PATH;?>blank.jpg"><?php
                                            }?>
                                            <a href="#updatefoto" class="portfolio-link btn btn-success btn-default" data-toggle="modal">
                                                UPDATE
                                            </a>
                                        </div>
                                    </div>
                                    <div class="panel panel-default text-center">
                                        <!-- panel untuk surat keterangan sehat -->
                                        <div class="panel-heading">
                                            <strong>Surat Keterangan Sehat</strong>
                                        </div>
                                        <div class="panel-body text-center">
                                            <?php if ($this->session->userdata('sks') != NULL){
                                                    ?><img class="img-responsive center-block" src="<?php echo base_url().$this->session->userdata('sks');?>"><?php
                                                    }else {
                                                        ?> <img class="img-responsive center-block" src="<?php echo HTTP_IMAGES_PATH;?>blank.jpg"><?php
                                            }?>
                                            <a href="#updatesks" class="portfolio-link btn btn-success btn-default" data-toggle="modal">
                                                UPDATE
                                            </a>
                                        </div>
                                    </div>
                                    <div class="panel panel-default text-center">
                                        <!-- panel untuk daftar riwayat hidup -->
                                        <div class="panel-heading">
                                            <strong>Daftar Riwayat Hidup</strong>
                                        </div>
                                        <div class="panel-body">
                                            <?php if ($this->session->userdata('drh') != NULL){
                                                    ?><img class="img-responsive center-block" src="<?php echo base_url().$this->session->userdata('drh');?>"><?php
                                                    }else {
                                                        ?> <img class="img-responsive center-block" src="<?php echo HTTP_IMAGES_PATH;?>blank.jpg"><?php
                                            }?>
                                            <a href="#updatedrh" class="portfolio-link btn btn-success btn-default" data-toggle="modal">
                                                UPDATE
                                            </a>
                                        </div>
                                    </div>
                                    <div class="panel panel-default text-center">
                                        <!-- panel untuk video -->
                                        <div class="panel-heading">
                                            <strong>Video</strong>
                                        </div>
                                        <div class="panel-body">
                                            <?php if ($this->session->userdata('video') != NULL){
                                                    ?><img class="img-responsive center-block" src="<?php echo base_url().$this->session->userdata('video');?>"><?php
                                                    }else {
                                                        ?> <img class="img-responsive center-block" src="<?php echo HTTP_IMAGES_PATH;?>blank.jpg"><?php
                                            }?>
                                            <a href="#updatevideo" class="portfolio-link btn btn-success btn-default" data-toggle="modal">
                                                UPDATE
                                            </a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- dialog update profpict -->
    <div class="portfolio-modal modal fade" id="updateprofpict" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-lg-offset-2">
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <form name="update" id="updateform" enctype="multipart/form-data" action ="<?=site_url('C_Peserta/updatekonten'); ?>" method="post">
                                            <div class="form-group">
                                                <label>Pilih Gambar</label>
                                                <input type="file" name="userfile">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="jenis" value="profpict">
                                            </div>
                                            <button type="submit" name ="submit" value="submit" class="btn btn-xl">Upload</button>
                                        </form>
                                        
                                    </div>
                                    <div class="row">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- dialog untuk update foto -->
    <div class="portfolio-modal modal fade" id="updatefoto" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-lg-offset-2">
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <form name="update" id="updateform" enctype="multipart/form-data" action ="<?=site_url('C_Peserta/updatekonten'); ?>" method="post">
                                            <div class="form-group">
                                                <label>Pilih Gambar</label>
                                                <input type="file" name="userfile">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="jenis" value="foto">
                                            </div>
                                            <button type="submit" name ="submit" value="submit" class="btn btn-xl">Upload</button>
                                        </form>
                                        
                                    </div>
                                    <div class="row">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
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
