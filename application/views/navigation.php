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
    
<!-- Bootstrap Core CSS -->
    <link href="<?php echo HTTP_VENDOR_PATH;?>bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo HTTP_VENDOR_PATH;?>metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo HTTP_CSS_PATH; ?>sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo HTTP_VENDOR_PATH;?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="<?php echo HTTP_VENDOR_PATH;?>morrisjs/morris.css" rel="stylesheet">

    <script src='<?php echo HTTP_JS_PATH; ?>script.js' type='text/javascript'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
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
                <a class="navbar-brand" href="index.html">Selamat Berbahagia</a>
            </div>
            <!-- /.navbar-header -->
            
            
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!-- <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            
                        </li> -->
                        <li>
                            <a href="<?php echo base_url().'C_Admin/admin';?>"><i class="fa fa-dashboard fa-fw"></i> Pencatatan</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url().'C_Admin/rekap';?>"><i class="fa fa-book fa-fw"></i> Rekap</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url().'C_Admin/duplikat';?>"><i class="fa fa-clipboard fa-fw"></i> Duplikat</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url().'C_Admin/tetap';?>"><i class="fa fa-clipboard fa-fw"></i> Penetapan</a>
                        </li>
                       <!--  <li>
                            <a href="<?php echo base_url().'C_Admin/upload';?>"><i class="fa fa-clipboard fa-fw"></i> Upload</a>
                        </li> -->
                        
                    </ul>

                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        