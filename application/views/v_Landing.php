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
    <!-- load google maps library -->
    <?php echo $map['js']?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
                                    var bulungan = [{name:'Seni Tari', value:'senitari'}, {name:'Seni Musik', value:'senimusik'}];

                                    var bengkulutengah = [{name:'Seni Tari', value:'senitari'}, {name:'Seni Musik', value:'senimusik'}, {name:'Seni Teater', value:'seniteater'}, {name:'Seni Rupa (Kerajinan)', value:'senirupakerajinan'}, {name:'Seni Media', value:'senimedia'}];

                                    var wakatobi = [{name:'Seni Rupa (Kerajinan Kerang)', value:'senirupakerajinankerang'}, {name:'Seni Tari', value:'senitari'}, {name:'Seni Musik', value:'senimusik'}, {name:'Seni Teater', value:'seniteater'}, {name:'Seni Media', value:'senimedia'}];
                                    var mandalika = [{name:'Seni Tari', value:'senitari'}, {name:'Seni Musik', value:'senimusik'}, {name:'Seni Teater', value:'seniteater'}, {name:'Seni Rupa (Kriya Kayu)', value:'senikriyakayu'}, {name:'Seni Media', value:'senimedia'}]
                                    var morotai = [{name:'Seni Tari', value:'senitari'}, {name:'Seni Musik (Tradisi)', value:'senimusiktradisi'}, {name:'Seni Rupa (Kerajinan dan Lukis)', value:'senirupa'}, {name:'Seni Teater', value:'seniteater'}, {name:'Seni Media', value:'senimedia'}]
                                    var tanjunglesung=[{name:'Seni Tari', value:'senitari'}, {name:'Seni Musik', value:'senimusik'}, {name:'Seni Teater (Ubrug)', value:'seniteater'}, {name:'Seni Rupa (Kriya Tekstil)', value:'senirupakriyatekstil'}, {name:'Seni Media', value:'senimedia'}]
                                    var danautoba = [{name:'Seni Tari', value:'senitari'}, {name:'Seni Musik (Tradisi)', value:'senimusik'}, {name:'Seni Teater', value:'seniteater'}, {name:'Seni Rupa (Kriya Tanah liat dan Kayu)', value:'senirupa'}, {name:'Seni Media', value:'senimedia'}]
                                    $(document).ready( function() {
                                      $("input[name='chk']").on('change',function() {

                                          if($(this).is(':checked') && $(this).val() == 'wakatobi')
                                          {
                                            $('#jenis_seni').empty()
                                            $.each(wakatobi, function(index, value) {
                                             $('#jenis_seni').append('<option value="'+value.value+'">'+value.name+'</option>');
                                            });                  
                                          }
                                          else if($(this).is(':checked') && $(this).val() == 'bengkulutengah')
                                          {
                                            $('#jenis_seni').empty()
                                            $.each(bengkulutengah, function(index, value) {
                                             $('#jenis_seni').append('<option value="'+value.value+'">'+value.name+'</option>');
                                            }); 
                                          }
                                          else if($(this).is(':checked') && $(this).val() == 'bulungan')
                                          {
                                            $('#jenis_seni').empty()
                                            $.each(bulungan, function(index, value) {
                                             $('#jenis_seni').append('<option value="'+value.value+'" >'+value.name+'</option>');
                                            }); 
                                          }
                                          else if ($(this).is(':checked') && $(this).val()=='mandalika')
                                          {
                                            $('#jenis_seni').empty()
                                            $.each(mandalika, function(index, value){
                                                $('#jenis_seni').append('<option value="'+value.value+'">'+value.name+'</option>');
                                            });
                                          }else if ($(this).is(':checked') && $(this).val()=='morotai')
                                          {
                                            $('#jenis_seni').empty()
                                            $.each(morotai, function(index, value){
                                                $('#jenis_seni').append('<option value="'+value.value+'">'+value.name+'</option>');
                                            });
                                          } else if ($(this).is(':checked') && $(this).val()=='tanjunglesung')
                                          {
                                            $('#jenis_seni').empty()
                                            $.each(tanjunglesung, function(index, value){
                                                $('#jenis_seni').append('<option value="'+value.value+'">'+value.name+'</option>');
                                            });
                                          } else if ($(this).is(':checked') && $(this).val()=='danautoba')
                                          {
                                            $('#jenis_seni').empty()
                                            $.each(danautoba, function(index, value){
                                                $('#jenis_seni').append('<option value="'+value.value+'">'+value.name+'</option>');
                                            });
                                          }
                                          

                                      });
                                    });  
                                </script>

</head>

<body id="page-top" class="index">
<!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
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
                        <a class="page-scroll" href="#lokasi">Lokasi</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Tentang</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#timeline">Timeline</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#hubungi">Hubungi Kami</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#pengumuman">Pengumuman</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#hubungi">Hubungi Kami</a>
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

    <!-- Header -->
    <header>
        <div class="container-fluid">
            <div class="intro-text">
                <div class="intro-lead-in">Seniman Mengajar</div>
                <div class="intro-heading">Gelombang 2</div>
                <a href="#daftar" class="page-scroll btn btn-xl">Daftar</a>
            </div>
            
        </div>
    </header>

    <!-- Tempat Pelaksanaan -->
    <section id="lokasi" class="bg-light-gray">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Tempat Pelaksanaan</h2>
                    <h3 class="section-subheading">Tempat Pelaksanaan Seniman Mengajar Gelombang 2.</h3>
                </div>
            </div>
            <div class ="row text-center">
                    <ul class="list-inline">
                        <li>
                            <div class="col-md-4">
                                <img src="assets/img/bulungan.png" alt="bulungan"  height="128" width="90"><br><h4>Kabupaten Bulungan,<br>Kalimantan Utara</h4><br><br>
                                <a href="#bulungan" class="portfolio-link btn btn-xl" data-toggle="modal">
                                    <!-- <div class="portfolio-hover">
                                        <div class="portfolio-hover-content">
                                            <i class="fa fa-plus fa-3x"></i>
                                        </div>
                                    </div> -->
                                    DETAIL
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="col-md-4">
                                <img src="assets/img/bengkulutengah.png" alt="bengkulutengah"  height="128" width="90" align ="center"><br><h4>Kabupaten Bengkulu Tengah,<br>Bengkulu</h4><br><br>
                                <a href="#bengkulutengah" class="portfolio-link btn btn-xl" data-toggle="modal">
                                    <!-- <div class="portfolio-hover">
                                        <div class="portfolio-hover-content">
                                            <i class="fa fa-plus fa-3x"></i>
                                        </div>
                                    </div> -->
                                    DETAIL
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="col-md-4">
                                <img src="assets/img/wakatobi.png" alt="wakatobi"  height="128" width="90"><br><h4>Kabupaten Wakatobi,<br>Sulawesi Tenggara</h4><br><br>
                                <a href="#wakatobi" class="portfolio-link btn btn-xl" data-toggle="modal">
                                    <!-- <div class="portfolio-hover">
                                        <div class="portfolio-hover-content">
                                            <i class="fa fa-plus fa-3x"></i>
                                        </div>
                                    </div> -->
                                    DETAIL
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="col-md-4">
                                <img src="assets/img/mandalika.jpg" alt="mandalika"  height="128" width="90"><br><h4>Mandalika,<br>Nusa Tenggara Barat</h4><br><br>
                                <a href="#mandalika" class="portfolio-link btn btn-xl" data-toggle="modal">
                                    <!-- <div class="portfolio-hover">
                                        <div class="portfolio-hover-content">
                                            <i class="fa fa-plus fa-3x"></i>
                                        </div>
                                    </div> -->
                                    DETAIL
                                </a>
                            </div>
                        </li>
                        
                    </ul>
            </div>
            <div class ="row text-center">
                    <ul class="list-inline">
                        <li>
                            <div class="col-md-4">
                                <img src="assets/img/morotai.jpg" alt="morotai"  height="128" width="90"><br><h4>Morotai,<br>Maluku Utara</h4><br><br>
                                <a href="#morotai" class="portfolio-link btn btn-xl" data-toggle="modal">
                                    <!-- <div class="portfolio-hover">
                                        <div class="portfolio-hover-content">
                                            <i class="fa fa-plus fa-3x"></i>
                                        </div>
                                    </div> -->
                                    DETAIL
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="col-md-4">
                                <img src="assets/img/pandeglang.jpg" alt="tanjunglesung"  height="128" width="90" align ="center"><br><h4>Tanjung Lesung,<br>Banten</h4><br><br>
                                <a href="#tanjunglesung" class="portfolio-link btn btn-xl" data-toggle="modal">
                                    <!-- <div class="portfolio-hover">
                                        <div class="portfolio-hover-content">
                                            <i class="fa fa-plus fa-3x"></i>
                                        </div>
                                    </div> -->
                                    DETAIL
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="col-md-4">
                                <img src="assets/img/danautoba.jpg" alt=""  height="128" width="90"><br><h4>Danau Toba,<br>Sumatera Utara</h4><br><br>
                                <a href="#danautoba" class="portfolio-link btn btn-xl" data-toggle="modal">
                                    <!-- <div class="portfolio-hover">
                                        <div class="portfolio-hover-content">
                                            <i class="fa fa-plus fa-3x"></i>
                                        </div>
                                    </div> -->
                                    DETAIL
                                </a>
                            </div>
                        </li>
                    </ul>
            </div>
        </div>
    </section>

    <section id="pengumuman">
        <div class="row-lg-6">
            <div class="text-center">
                <h2>Pengumuman</h2>
            </div>
        </div>
        <div class="row-lg-6">
            <p>
                
            </p>
        </div>
    </section>

    <!-- page-section tentang seniman mengajar -->
    <section id="about" >
        <div class="container ">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Tentang Kegiatan Seniman Mengajar</h2>   
                </div>
            </div>
            <div class="row-lg-12">
                <p allign="left">
                    Seniman Mengajar adalah program yang diselenggarakan Direktorat Kesenian, Direktorat Jenderal Kebudayaan, Kementerian Pendidikan dan Kebudayaan, yaitu program seniman mengajar kesenian kepada masyarakat/ komunitas/ sanggar yang berada di daerah dengan predikat 3T yang berada di Indonesia. <br><br>
                    Program ini pada prinsipnya mendorong para seniman berbagi ilmu dan pengalamannya kepada masyarakat yang berada daerah 3T dan menjunjung kearifan lokal. Dengan program ini masyarakat di daerah 3T dapat terbuka wawasannya dan dapat menjalin kerjasama dengan para seniman sehingga dapat meningkatkan kualitas ekspresi seni dan penguatan identitas budaya di daerah 3T. Pada akhir masa belajar, para seniman dapat mempresentasikan apa yang telah dikerjakannya di daerah pelaksanaan kegiatan. <br><br>
                    Dalam melaksanakan program Seniman Mengajar ditekankan prinsip – prinsip : partisipatif, dialogis, dan transformasi. Format kegiatan residensi seniman dalam kurun waktu yang ditentukan dengan target paket kegiatan selesai. Seniman berbagi ilmu dan keahlian dengan  seniman lokal yang mewakili sanggar/ komunitas.

                </p>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="team-member" style="text-align:left;">
                        <h4 style="text-align:center;">Syarat Pendaftar</h4>
                        <!-- <p class="text-muted">Lead Designer</p> -->
                       
                            <ul>
                                <li>  Warga Negara Indonesia</li>
                                <li>  Usia 30 – 60 tahun</li>
                                <li>  Non PNS</li>
                                <li>  Profesional dan berdedikasi tinggi terhadap seni</li>
                                <li>  Memiliki pengalaman minimal 5 tahun dalam berkesenian</li>
                                <li>  Mampu beradaptasi dengan lingkungan di lokasi tempat mengajar</li>
                                <li>  Dapat berkomunikasi dengan baik dan aktif</li>
                                <li>  Sehat jasmani dan rohani</li>
                                <li>  menguasai management seni, pengemasan seni dan penggalian kesenian lokal.</li>
                                <li>  Belum pernah mengikuti kegiatan Seniman Mengajar</li>
                            </ul>
                          
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="team-member" style="text-align:left;">
                        <h4 style="text-align:center;">Hak Seniman</h4>
                        <p align="left">
                            <ul>    
                                <li>  Mendapatkan insentif</li> 
                                <li>  Sertifikat</li>
                                <li>  Sarana pendukung/ keperluan belajar</li> 
                                <li>  Akomodasi (tinggal bersama masyarakat setempat) dan konsumsi</li>
                                <li>  Transportasi dari daerah asal ke lokasi kegiatan dan transportasi di lokasi kegiatan</li>
                            </ul>
                        </p>                        
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="team-member" style="text-align:left;">
                        <h4 style="text-align:center;">Kewajiban Seniman</h4>
                        <p align="left">
                            <ul>
                                <li>  Membuat rancangan bahan ajar</li>
                                <li>  Membuat materi ajar</li>
                                <li>  Melaksanakan aktivitas harian sesuai dengan rancangan bahan ajar (mengikuti lampiran 2 pada Juknis.)</li>
                                <li>  Mempresentasikan materi ajar</li>
                                <li>  Berkoordinasi dengan Dinas Kebudayaan/Instansi terkait</li>
                                <li>  Menandatangani kontrak kerja sama</li>
                                <li>  Wajib melaksanakan proses kegiatan dari awal sampai akhir</li>
                                <li>  Membuat dokumentasi (audio visual) selama kegiatan monitoring dan evaluasi</li>
                                <li>  Menyusun laporan teknis dan administrasi kegiatan</li>
                                <li>  Seniman mengajar per kelas antara 10-30 orang</li>
                            </ul>  
                        </p>   
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="team-member" style="text-align:left;">
                        <h4 style="text-align:center;">Berkas Kelengkapan</h4>
                        <p align="left">
                            <ul>
                                <li>  Mengisi daftar riwayat hidup </li>
                                <li>  Surat keterangan sehat dari dokter</li>
                                <li>  Foto diri </li>
                                <li>  Foto karya atau video karya</li>
                                <li>  Motivation Letter (max : 300 kata)</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <!--Timeline pelaksanaan Seniman Mengajar -->
    <!-- Timeline Section -->
    <section id="timeline" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Timeline</h2>
                    <h3 class="section-subheading text-muted">Jadwal Pelaksaan Seniman Mengajar Gelombang 2</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="assets/img/timeline/daftar.jpg" alt="" height="200" width="200">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Pendaftaran</h4>
                                    <h4 class="subheading">5 Juli 2017- 20 Juli 2017</h4>
                                </div>
                            </div>
                        </li>
                        
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="assets/img/timeline/pengumuman.png" alt="" height="200" width="200">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Pengumuman Hasil Seleksi</h4>
                                    <h4 class="subheading">27 Juli 2017</h4>
                                </div>
                               
                            </div>
                        </li>
                        <li >
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="assets/img/timeline/seleksi.jpg" alt="" height="200" width="200">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Daftar Ulang</h4>
                                    <h4 class="subheading">27 Juli 2017 - 29 Juli 2017</h4>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="assets/img/timeline/pelaksanaan.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Pembekalan</h4>
                                    <h4 class="subheading">1 Agustus 2017 - 3 Agustus 2017</h4>
                                </div>
                                
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="assets/img/timeline/pelaksanaan.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Pelaksanaan Kegiatan</h4>
                                    <h4 class="subheading">4 Agustus -7 September 2017</h4>
                                </div>
                                
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </section>    

    <!-- daftar form -->
     <section id="daftar"   >
        <div class="container text-center">
            <div clas ="row">
                <!-- <h1><span class="label label-success"> Pendaftaran sudah Ditutup</span><h1> -->
                <div class ="col-lg-12 text-center">
                    <h2 class="intro-text ">Pendaftaran Telah
                        <strong>Ditutup</strong>
                        <br>Terima Kasih Atas Partisipasinya

                    </h2>
                </div>
            </div>
            <div class="row">
                <div style="text-align:left; color:red; font-size: 0.875em;"><?php echo validation_errors(); ?> </div>
                        <?php if($this->session->flashdata('status')=="success"){ ?>
                <p><h3><?php echo $this->session->flashdata('message'); ?></h3></p>
                <?php }elseif ($this->session->flashdata('status')=='danger') {?>
                    <p><h3><?php echo $this->session->flashdata('message'); ?></h3></p>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="daftar" id="daftarform" action ="<?=site_url('Peserta/createpeserta'); ?>" method="post">
                        <div class="row">
                            <div class ="row-lg-12">
                                <div class ="form-group">
                                    <input type ="text" class ="form-control" placeholder="Nama"  name="nama" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                                <div class ="form-group">
                                    <input type ="text" class ="form-control" placeholder="Tempat tanggal lahir"  name="ttl" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                                <div class ="form-group">
                                    <input type ="text" class ="form-control" placeholder="alamat"  name="alamat" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                                <div class ="form-group">
                                    <input type ="text" class ="form-control" placeholder="kota"  name="kota" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                                <div class="form-group col-md-6" style="text-align:left;">   
                                <h3>Provinsi</h3>
                                <select id="provinsi" name="provinsi" >
                                    <?php
                                        foreach ($provinsi->result_array() as $key) {
                                            ?><option  value="<?php echo $key['provinsi'];?>"><?php echo $key['provinsi'];?></option><?php
                                        }
                                    ?>
                                </select>
                            </div>
                                
                                <div class ="form-group">
                                    <input type ="password" class ="form-control" placeholder="Password" id="password" name="password" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                                <div class ="form-group">
                                    <input type ="text" class ="form-control" placeholder="Nomor Telepon/Handphone" id="no_telpon" name ="no_telpon" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                                <div class ="form-group">
                                    <input type ="email" class ="form-control" placeholder="Email" id="email" name="email" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="text-align:left;">
                                <h3>Daerah yang Dipilih</h3>
                                <div class ="form-group">
                                    <input type="radio" id="region" name="chk" value="wakatobi" checked>Wakatobi <br/>
                                </div>
                                <div class ="form-group">
                                    <input type="radio" id="region" name="chk" value="bengkulutengah" >Bengkulu Tengah<br/>
                                </div>
                                <div class ="form-group">
                                    <input type="radio" id="region" name="chk" value="bulungan" >Bulungan<br/>
                                </div>
                                <div class ="form-group">
                                    <input type="radio" id="region" name="chk" value="mandalika" >Mandalika<br/>
                                </div>
                                <div class ="form-group">
                                    <input type="radio" id="region" name="chk" value="morotai" >Morotai<br/>
                                </div>
                                <div class ="form-group">
                                    <input type="radio" id="region" name="chk" value="tanjunglesung" >Tanjung Lesung<br/>
                                </div>
                                <div class ="form-group">
                                    <input type="radio" id="region" name="chk" value="danautoba" >Danau Toba<br/>
                                </div>
                            </div>
                            <div class="form-group col-md-6">   
                                <h3>Bidang Seni</h3>
                                <select id="jenis_seni" name="jenis_seni">
                                    <option name="Seni Tari" value="senitari">Seni Tari</option>
                                    <option name="Seni Musik" value="senimusik">Seni Musik</option>
                                    <option name="Seni Teater" value="seniteater">Seni Teater</option>
                                    <option name="Seni Rupa (Kerajinan Kerang)" value="senirupakerajinankerang">Seni Rupa (Kerajinan Kerang)</option>
                                    <option name="Seni Media" value="senimedia">Seni Media</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" name ="submit" value="submit" class="btn btn-xl">Daftar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            </div>
    </section>
    
    <!-- Contact Section -->
    <section id="hubungi" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Hubungi Kami</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nama *" id="name" required data-validation-required-message="Silakan masukan nama Anda.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="email *" id="email" required data-validation-required-message="Silakan masukan email Anda.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="No. Telp *" id="phone" required data-validation-required-message="Silakan masukan nomor yang bisa dihubungi.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form> -->
                    <div class ="col-md-6">
                        <div class="container">
                            <p align="justify"> 
                                <strong>
                                     Untuk Layanan Informasi Hubungi: <br>
                                </strong>
                            </p>
                                    <ul>
                                        
                                        <li><span class="glyphicon glyphicon-phone"></span>  Hilda Yulianti: 0857 1140 5934</li>
                                        <li><span class="glyphicon glyphicon-phone"></span>  Hana Nabilah : 0812 9838 6898</li>
                                        <li><span class="glyphicon glyphicon-phone"></span>  Angga : 0856 4793 3110</li>
                                        
                                        <li><span class="glyphicon glyphicon-phone"></span> Kantor : 021-5725518</li>
                                        <li><span class="glyphicon glyphicon-envelope"></span> Email : senimanmengajar.kemdikbud@gmail.com</li>
                                    </ul>      
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php echo $map['html']; ?>
                        <strong>Kementrian Pendidikan dan Kebudayaan<br>Direktorat Kesenian, DIrektorat Jenderal Kebudayaan<br>Jln. Jenderal Sudirman, Komplek Kementrian Pendidikan dan Kebudayaan <br>Gedung E Lantai 9<br>Senayan Jakarta 10270</strong>  
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- modal Bulungan -->
    <div class="portfolio-modal modal fade" id="bulungan" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Kabupaten Bulungan, Kalimantan Utara</h2>
                                <p align="justify">Rekomendasi dari BP2DK pelaksanaan kegiatan Seniman Mengajar di Kabupaten Bulungan, Kalimantan Utara di Desa Gunung Putih, Kecamatan Tanjung Palas. Jarak tempuh alternative dari kecamatan tanjung palas menuju desa gunung putih dilakukan dengan menyeberangi sungai kayan menggunakan speedbooth, bila menggunakan kendaraan roda 4 dengan jarak tempuh 15 km. Jarak antar kecamatan cukup jauh jadi tidak memungkinkan kegiatan berada di beberapa lokasi. Namun, di desa gunung putih tidak ada sanggar tentang kesenian khas dayak, di desa tersebut mayoritas masyarakatnya berasal dari suku Jawa. Rekomendasi dari dinas untuk kegiatan Seniman Mengajar yaitu desa Matau sajau dan purau sajau kecamatan Tanjung palas Timur yang mayoritas penduduk suku dayak kenyah. Desa Matau sajau dan Pura sajau terdapat sanggar ataupun komunitas seni, terdapat 2 jenis cabang seni yang berkembang yaitu seni musik dan seni tari yaitu seni tari  1). Temengang Madang (burung Enggang) 2). Pemung Tawai (satu hati) 3). Tarian Perang. Seni Musik yaitu Kulintangan.
                                Penggiat seni bukan dijadikan sebagai mata pencaharian pokok. Pelatihan seni dilakukan dari anak2 kecil hingga dewasa, pelatihan di lakukan secara rutin setiap minggu. 
                                Mata pencaharian masyarakat sebagian besar bertumpu pada sektor pertanian, perkebunan, dan peternakan. Jenis seni yang berkembang di desa ini adalah seni musik dan tari.
                                </p>
                                <p>
                                    <strong>Membutuhkan seniman yang ahli di bidang managemen seni pertunjukan dan pengemasan seni pertunjukan</strong>
                                </p>
                                <ul class="list-inline">
                                    <li>1. Seni Tari (3 orang)</li>
                                    <li>2. Seni Musik (2 orang)</li>
                                </ul>
                                
                                    
                                
                                <p class="section-subheading"> <strong>rencana lokasi pembelajaran</strong></p>
                                <ul class="list-inline">
                                    <li><img src="assets/img/bulungan1.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/bulungan2.jpg" class = "image-responsive"></li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal bengkulutengah -->
    <div class="portfolio-modal modal fade" id="bengkulutengah" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Kabupaten Bengkulu Tengah, Bengkulu</h2>
                                <p align="justify">
                                    Pelaksanaan kegiatan Seniman Mengajar di Kabupaten Bengkulu Tengah, Bengkulu akan dipusatkan di Desa Panca Mukti, Kecamatan Pondok Kelapa. Desa Pancamukti merupakan suatu desa pemekaran dan mayoritas masyarakatnya transmigrasi berasal dari suku Jawa, Padang, Batak, dari Kabupaten ke desa Pancamukti memakan waktu sekitar 1 jam. Mata pencaharian masyarakat desa ini bertumpu pada pertanian, perkebunan dan kerajinan tangan.
                                </p>
                                <p>
                                    <strong>Membutuhkan seniman yang ahli di bidang management seni pertunjukan dan pengemasan seni pertunjukan dan yang mampu menggali kesenian kearifan lokal daerah Bengkulu </strong>
                                </p>
                                <ul class="list-inline">
                                    <li>1. Seni Tari</li>
                                    <li>2. Seni Musik</li>
                                    <li>3. Seni Teater</li>
                                    <li>4. Seni Rupa (Kerajinan Bambu)</li>
                                    <li>5. Seni Media (Fotografi dan videografi)</li>
                                </ul>
                                <p class="section-subheading"> <strong>rencana lokasi pembelajaran</strong></p>
                                <ul class="list-inline">
                                    <li><img src="assets/img/bengkulutengah1.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/bengkulutengah2.jpg" class = "image-responsive"></li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal wakatobi -->
    <div class="portfolio-modal modal fade background-modal" id="wakatobi" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Kabupaten Wakatobi, Sulawesi Tenggara</h2>
                                <p align="justify">
                                    Wakatobi terletak di kepulauan jazirah Tenggara Pulau Sulawesi tepatnya di sebelah Tenggara Pulau Buton. Untuk mencapai kabupaten Wakatobi harus menempuh perjalanan dari Makassar-Kendari-Wakatobi dengan pesawat kecil. Jarak dari Bandara Wakatobi ke lokasi kegiatan berjarak 25 kilometer dengan waktu tempuh 25—30 menit. Mata pencaharian masyarakat Kabupaten Wakatobi sebagian besar adalah nelayan. Jenis seni yang berkembang di masyarakat Wakatobi kebanyakan adalah seni tari. Untuk cabang seni lainnya, lebih kecil perkembangannya dibanding seni tari. Untuk seni teater, di sana hanya terdapat satu sanggar yang benar-benar fokus pada teater sedangkan ada satu sanggar lainnya yang terdapat bidang seni teater tetapi digabungkan dengan bidang seni lainnya. Seni musik, seni rupa, dan seni media kurang mendapatkan tempat di sana karena kearifan lokal masyarakat yang mendominasi adalah seni tari. Kegiatan ini dilaksanakan di pulau Wangi-wangi, kecamatan Wangi-Wangi dan kecamatan Wangi-Wangi Selatan.
                                </p>
                                <p>
                                    <strong>Seniman yang dibutuhkan untuk daerah Wakatobi, Sulawesi Tenggara adalah di bidang :</strong>
                                </p>
                                <ul class="list-inline">
                                    <li>1. Seni Rupa (kerajinan/ ekonomi kreatif)</li>
                                    <li>2. Seni Tari</li>
                                    <li>3. Seni Teater</li>
                                    <li>4. Seni Musik </li>
                                    <li>5. Seni Media (Fotografi dan Videografi)</li>
                                </ul>
                                <p class="section-subheading"> <strong>Rencana Lokasi Pembelajaran</strong></p>
                                <ul class="list-inline">
                                    <li><img src="assets/img/wakatobi1.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/wakatobi2.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/wakatobi3.jpg" class = "image-responsive"></li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal mandalika -->
    <div class="portfolio-modal modal fade background-modal" id="mandalika" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Mandalika, Nusa Tenggara Barat</h2>
                                <p align="justify">
                                    Pelaksanaan kegiatan seniman mengajar di Mandalika yang terletak,  Kabupaten Lombok Tengah, Nusa Tenggara Barat. Untuk mencapai lokasi tersebut harus ditempuh melalui perjalanan udara atau laut ke Mataram. Setelah sampai di Mataram, langsung menuju Terminal Mandalika untuk menuju Mandalika. Jarak dari kota Mataram ke Mandalika sekitar 30 menit sampai 1 jam perjalanan. Mata pencaharian sebagian besar penduduk di daerah tersebut adalah sebagai petani dan nelayan. Jenis seni yang berkembang di daerah ini adalah seni musik, seni tari, seni teater, dan seni sastra.
                                    Dari beberapa sanggar yang dikunjungi di Lombok Tengah, rata-rata komunitas yang aktif mulai dari usia sekolah, usia dewasa bahkan diantara pemain musik Cilokaq dan kesenian Jaran Kamput rata-rata berusia 40 tahun ke atas. Kondisi ini dibarengi respon aktif masyarakat terhadap kegiatan seni menjadikan seni tradisional masih berkembang walaupun memiliki keterbatasan alat untuk mendukung aktivitas di sanggarnya, disamping harus menghadapi gempuran seni modern    
                                </p>
                                <p>
                                    <strong>Seniman yang dibutuhkan untuk daerah Mandalika, Nusa Tenggara Barat adalah di bidang : </strong>
                                </p>
                                <ul class="list-inline">
                                    <li>1. Seni Rupa (Ukir Kayu)</li>
                                    <li>2. Seni Tari</li>
                                    <li>3. Seni Teater</li>
                                    <li>4. Seni Musik (Vokal)</li>
                                    <li>5. Seni Media (Fotografi dan Videografi)</li>
                                </ul>
                                <p class="section-subheading"> <strong>Gambaran Kondisi Lokasi</strong></p>
                                <ul class="list-inline">
                                    <li><img src="assets/img/mandalika1.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/mandalika2.jpg" class = "image-responsive"></li>
                                </ul>

                                <p class="section-subheading"> <strong>Salah satu contoh kerajinan khas Mandalika, yaitu Pameje</strong></p>
                                <ul class="list-inline">
                                    <li><img src="assets/img/mandalika3.jpg" class = "image-responsive"></li>
                                    
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal morotai -->
    <div class="portfolio-modal modal fade background-modal" id="morotai" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Pulau Morotai, Maluku Utara</h2>
                                <p align="justify">
                                    Pelaksanaan kegiatan Seniman Mengajar di Kabupaten Pulau Morotai akan dipusatkan di kota Morotai Selatan yang terletak di ujung utara Kabupaten Halmahera Utara dan merupakan bagian dari Provinsi Maluku Utara. Untuk menuju ke Pulau Morotai dapat ditempuh dengan sarana transportasi laut ke Kota Daruba ataupun pesawat dari Ternate ditempuh dalam waktu 1 jam perjalanan dan dari bandara menuju lokasi memerlukan waktu 20 menit menggunakan jalur darat. Cuaca di daerah ini panas, hasil rempah yang terkenal yaitu cengkeh, pala dan kopra. Selain itu, hasil perikanannya juga cukup melimpah. Mata pencaharian masyarakat sebagian besar menjadi petani dan nelayan.
                                </p>
                                <p>
                                    <strong>Seniman yang dibutuhkan untuk daerah Morotai, Maluku Utara adalah di bidang : </strong>
                                </p>
                                <ul class="list-inline">
                                    <li>1. Seni Rupa (Kerajinan dan lukis)</li>
                                    <li>2. Seni Tari</li>
                                    <li>3. Seni Teater</li>
                                    <li>4. Seni Musik (Vokal)</li>
                                    <li>5. Seni Media</li>
                                </ul>
                                <p class="section-subheading"> <strong>Gambaran Kondisi Lokasi</strong></p>
                                <ul class="list-inline">
                                    <li><img src="assets/img/morotai1.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/morotai2.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/morotai3.jpg" class = "image-responsive"></li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal tanjung lesung -->
    <div class="portfolio-modal modal fade background-modal" id="tanjunglesung" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Tanjung Lesung, Banten</h2>
                                <p align="justify">
                                    Pantai Tanjung Lesung terletak di Desa Tanjung Jaya, Kecamatan Panimbang, Kabupaten Pandeglang, Provinsi Banten. Posisinya terletak di sebelah barat kabupaten Pandeglang dan mempunyai luas sekitar 150 hektoare. Jarak yang anda tempuh dari Jakarta menuju Tanjung Lesung sekitar 160 kilometer dengan waktu tempuh 3 (tiga) jam perjalanan menggunakan kendaraan pribadi. Mata Pencaharian penduduknya sebagian besar adalah nelayan. Kondisi daerah di sana sangat memprihatinkan, baik dari segi seninya maupun dari segi lokasinya. Banyak kesenian khas yang terdapat di kawasan tersebut, beberapa diantaranya Teater Ubruk, Rampak Beduk, Kendang hatong, Mapag Tamu, dan Kendang Lesung, tetapi tidak berkembang dengan baik. Sanggar-sanggar di sana juga masih sangat perlu sentuhan kreatifitas untuk mengembangkan diri agar dapat kesempatan untuk tampil lebih baik lagi.    
                                </p>
                                <p>
                                    <strong>Seniman yang dibutuhkan untuk daerah Tanjung Lesung, Banten adalah di bidang :</strong>
                                </p>
                                <ul class="list-inline">
                                    <li>1. Seni Rupa (Kriya Tekstil)</li>
                                    <li>2. Seni Tari</li>
                                    <li>3. Seni Teater (Ubrug)</li>
                                    <li>4. Seni Musik</li>
                                    <li>5. Seni Media (videografi)</li>
                                </ul>
                                <p class="section-subheading"> <strong>Rencana lokasi pembelajaran</strong></p>
                                <ul class="list-inline">
                                    <li><img src="assets/img/pandeglang1.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/pandeglang2.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/pandeglang3.jpg" class = "image-responsive"></li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal danau toba -->
    <div class="portfolio-modal modal fade background-modal" id="danautoba" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Danau Toba, Sumatera Utara</h2>
                                <p align="justify">
                                    Humbang  Hasundutan (Humbahas)  adalah sebuah  kabupaten di Sumatera Utara. Dibentuk pada 28 Juli 2003, kabupaten ini mempunyai luas sebesar 2.335,33 km² dan beribukotakan Dolok Sanggul. Kondisi fisik kabupaten ini berada pada ketinggian 330-2.075 meter dpl. Potensi budaya di Humbahas cukup tinggi dan perlu diagali lebih lanjut.
                                    Untuk bidang seni musik akan dilaksanakan di sanggar MARTABE yang berada di kota Dolok Sanggul. 
                                    Musik Ogung sabangunan yang terdiri dari sarune,  harapi, suling, kecapi, serunai, hesek, ogung loan, ogung ihutani dan panggora. 
                                    Ogung taganing (alat musik yang hampir punah)
                                    Bidang seni tari akan dilaksanakan di sanggar TONGGI yang berada di Dolok sanggul. Tari Tortor dan tari Martumba merupakan tarian yang harus dilestarikan 
                                    Bidang seni teater akan dilaksanakan di sanggar HUMBANG HAULI . Sanggar Humbang Hauli akan mewakili Sumatera Utara untuk perlombaan teater yang diadakan Kominfo di Palembang. Seni pertunjukannya adalah Pentas Pertunjukan Rakyat ( PETRA) 
                                    Bidang seni media akan dilaksanakan di sanggar ORSEPDO yang juga berada di Dolok Sanggul.
                                    Untuk bidang seni rupa akan dilaksanakan di Bakkara. Di Bakkara terdapat KOMUNITAS yang mengerjakan seni terapan seperti ukir dan pahat
                                </p>
                                <p>
                                    <strong>Seniman yang dibutuhkan untuk daerah Morotai, Maluku Utara adalah di bidang :</strong>
                                </p>
                                <ul class="list-inline">
                                    <li>1. Seni Rupa (Kriya Tanah liat dan Kayu)</li>
                                    <li>2. Seni Tari</li>
                                    <li>3. Seni Teater</li>
                                    <li>4. Seni Musik (tradisi)</li>
                                    <li>5. Seni Media (Fotografi dan Videografi)</li>
                                </ul>
                                <p class="section-subheading"> <strong>Gambaran Kondisi Lokasi</strong></p>
                                <ul class="list-inline">
                                    <li><img src="assets/img/danautoba1.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/danautoba2.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/danautoba3.jpg" class = "image-responsive"></li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span class="copyright">Hak Cipta &copy; Direktorat Jenderal Kebudayaan,<br> Kementrian Pendidikan dan Kebudayaan</span>
                    </div>
                    <!-- <div class="col-md-4">
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            
                            <li><a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div> -->
                    <div class="col-md-6">
                        <ul class="list-inline quicklinks">
                            <li><a href="http://kebudayaan.kemdikbud.go.id/ditsejarah" class=" btn btn-primary">Website Ditjen Kebudayaan</a>
                            </li>
                            <li><a href="http://kebudayaanindonesia.net" class="btn btn-primary">Website Kebudayaan</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </footer>
    

    
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo HTTP_JS_PATH;?>jqBootstrapValidation.js"></script>
    <script src="<?php echo HTTP_JS_PATH;?>contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="<?php echo HTTP_JS_PATH;?>agency.min.js"></script>
    

</body>

</html>
