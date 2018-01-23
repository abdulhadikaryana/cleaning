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
    <link href="<?php echo HTTP_CSS_PATH;?>bootstrap.css" rel="stylesheet">
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="<?php echo HTTP_CSS_PATH;?>agency.css" rel="stylesheet">
    <link href="<?php echo HTTP_CSS_PATH;?>sb-admin-2.css" rel="stylesheet">
    <!-- load google maps library -->
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
</head>
<body>
<!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="<?=site_url('#page-top');?>">Seniman Mengajar</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="<?=site_url('#page-top');?>"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=site_url('#lokasi');?>">Pelaksanaan</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=site_url('#about');?>">Tentang</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=site_url('#timeline');?>">Timeline</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=site_url('#daftar');?>">Daftar</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=site_url('#hubungi');?>">Hubungi Kami</a>
                    </li>
                    <li>
                        <!--<a class="page-scroll" href="#masuk">Masuk</a>-->
                        <a href="<?=site_url('Peserta/login');?>">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
