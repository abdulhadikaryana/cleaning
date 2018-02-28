<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Selamat Berbahagia</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo HTTP_VENDOR_PATH;?>bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo HTTP_VENDOR_PATH;?>metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo HTTP_CSS_PATH; ?>sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo HTTP_VENDOR_PATH;?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='<?php echo HTTP_JS_PATH; ?>script.js' type='text/javascript'></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style> 
        .wrap {
            word-wrap: break-word;
            word-break: break-all;
            -webkit-hyphens: auto;
            -moz-hyphens: auto;
            hyphens: auto;
        }
    </style>
</head>

<body>

    <div id="wrapper">

        

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <ul class="breadcrumb">
             <?php
             foreach ($breadcrumb as $key=>$value) {
              if($value!=''){
             ?>
                 <li><a href="<?=$value; ?>"><?=$key; ?></a> <span class="divider">></span></li>
                 <?php }else{?>
                 <li class="active"><?=$key; ?></li>
                 <?php }
             }
             ?>     
                </ul>
            </div>
            <!-- /.row -->
            
            <div class="row" >
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $Nama; ?>
                        </div>
                        <div class="panel-body">
                            <div class ="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default text-center">
                                        
                                        <div class="panel-body" >
                                            <div class="row-lg-6" >
                                                <div class="col-sm-3"><label class="label label-info">Tahun Pencatatan:</label><br><label><?php echo $tahun;?></label></div>
                                                <div class="col-sm-3"><label class="label label-info">Domain:</label><br><label ><?php echo $domain;?></label></div>
                                                <div class="col-sm-3"><label class="label label-info">Kategori:</label><br><label ><?php echo $kategori;?></label></div>
                                                <div  id="provinsi_holder" class="col-sm-3"><label    class="label label-info append">Provinsi:</label><br><label id="provinsi_label"><?php echo $provinsi;?></label>
                                                    <span id="change_provinsi" onclick="change_provinsi();" class="btn btn-xl glyphicon glyphicon-repeat"></span><br>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form id="edit" name="edit" action="<?=site_url('C_Admin/edittetap'); ?>" method="post">
                                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" id="page" name="page" value="<? echo $page;?>">
                                <div class="row form-group">
                                    <textarea class="form-control resizable" rows="7"  name="deskripsi" form="edit"><?php echo addslashes($Deskripsi);?></textarea>
                                </div>
                                <div class="row">
                                    <div class="panel panel-default text-center">
                                        <!-- panel untuk foto karya -->
                                         <div class="panel-heading">
                                            <strong>Kota dan OPK</strong>
                                        </div>
                                        <div class="panel-body">
                                            <div id="kota_holder" class="col-lg-6" style="text-align:left">
                                            <label class="label label-info">Kota   :</label><br>
                                                   
                                                <?php 
                                                    if (is_null($kota) or $kota=='') {
                                                        ?>
                                                        <?php
                                                            foreach ($kosong ->result_array() as $key ) {
                                                                ?><input class="wrap form-group" type="checkbox" name="kota[]" value="<?php echo $key['WILAYAH'];?>"><?php echo $key['WILAYAH'];?><br>

                                                                <?php

                                                            }
                                                            ?>
                                                            <?php
                                                    } else {
                                                         echo $kota;
                                                    }
                                                    ?>
                                                     <br>
                                        </div>
                                        <div class="col-lg-6 text-left">
                                            <label class="label label-info">Kategori OPK</label><br>
                                            <?php
                                                if (is_null($OPK) or $OPK=='') {
                                                    ?>
                                                    <label><input type="checkbox" name="OPK[]" value="tradisi lisan">tradisi lisan</label><br>
                                                    <label><input type="checkbox" name="OPK[]" value="manuskrip">manuskrip</label><br>
                                                    <label><input type="checkbox" name="OPK[]" value="adat istiadat">adat istiadat</label><br>
                                                    <label><input type="checkbox" name="OPK[]" value="ritus">ritus</label><br>
                                                    <label><input type="checkbox" name="OPK[]" value="pengetahuan tradisional">pengetahuan tradisional</label><br>
                                                    <label><input type="checkbox" name="OPK[]" value="teknologi  tradisional">teknologi  tradisional</label><br>
                                                    <label><input type="checkbox" name="OPK[]" value="seni">Seni</label><br>
                                                    <label><input type="checkbox" name="OPK[]" value="bahasa">Bahasa</label><br>
                                                    <label><input type="checkbox" name="OPK[]" value="permainan rakyat">Permainan Rakyat</label><br>
                                                    <label><input type="checkbox" name="OPK[]" value="olahraga tradisional">Olahraga Tradisional</label><br><?php
                                                 } else {
                                                    echo $OPK;
                                                 }
                                                  
                                            ?>
                                            
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group text-center">
                                    <button type="submit" name ="submit" value="submit" class="portfolio-link btn btn-success btn-default">Edit</button>
                                </div>
                            </form>
                            
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
