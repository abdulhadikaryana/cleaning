        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hasil Pencarian</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <form  action ="<?=site_url('C_Admin/searchsiswa'); ?>" method="post">
                            <input type="search" class='autocomplete nama' id="autocomplete1" name="nama"/>
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Data Pendaftar
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <table class="table ">
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Nama</th>
                                <th>Nomor Kontak</th>
                                <th>Daerah Pilihan</th>
                                <th>Bidang Seni</th>
                                <th>Daerah Asal</th>
                                <th>Foto Profil</th>
                                <th>Dafyar Riwayat Hidup</th>
                                <th>KTP</th>
                                <th>Surat Keterangan Sehat</th>
                                <th>Motivation Motivation Letter</th>
                                <th>Foto</th>
                                <th>Video</th>
                                <th>Download</th>
                                <!-- <th>Action</th> -->
                            </tr>
                            <?php $nom=0;foreach ($peserta as $row) { 
                                $nom++;
                                $email = $row->email;
                                ?><tr>
                                    <td><?php echo $nom;?></td>
                                    <td><?php echo $row->email;?></td>
                                    <td><?php echo $row->nama_seniman;?></td>
                                    <td><?php echo $row->no_telpon;?></td>
                                    <td><?php echo $row->region;?></td>
                                    <td><?php echo $row->jenis_seni;?></td>
                                    <td><?php echo $row->provinsi;?></td>
                                    <td>
                                        <?php
                                            if ($profpict[$email]) {
                                                ?><i class="fa fa-check" style="font-size:26px;color:green"></i><?php
                                            } else {
                                                ?><i class="fa fa-remove" style="font-size:26px;color:red"></i><?php
                                            }
                                            
                                            
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($drh[$email]) {
                                                ?><i class="fa fa-check" style="font-size:26px;color:green"></i><?php
                                            } else {
                                                ?><i class="fa fa-remove" style="font-size:26px;color:red"></i><?php
                                            }
                                            
                                            
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($ktp[$email]) {
                                                ?><i class="fa fa-check" style="font-size:26px;color:green"></i><?php
                                            } else {
                                                ?><i class="fa fa-remove" style="font-size:26px;color:red"></i><?php
                                            }
                                            
                                            
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($sks[$email]) {
                                                ?><i class="fa fa-check" style="font-size:26px;color:green"></i><?php
                                            } else {
                                                ?><i class="fa fa-remove" style="font-size:26px;color:red"></i><?php
                                            }
                                            
                                            
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($essai[$email]) {
                                                ?><i class="fa fa-check" style="font-size:26px;color:green"></i><?php
                                            } else {
                                                ?><i class="fa fa-remove" style="font-size:26px;color:red"></i><?php
                                            }
                                            
                                            
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($fk[$email]) {
                                                ?><i class="fa fa-check" style="font-size:26px;color:green"></i><?php
                                            } else {
                                                ?><i class="fa fa-remove" style="font-size:26px;color:red"></i><?php
                                            }
                                            
                                            
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($video[$email]) {
                                                ?><i class="fa fa-check" style="font-size:26px;color:green"></i><?php
                                            } else {
                                                ?><i class="fa fa-remove" style="font-size:26px;color:red"></i><?php
                                            }
                                            
                                            
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('C_Admin/download/'. $row->email) ;?>"><i class="fa fa-download" style="font-size:24px"></i></a>
                                    </td>
                                </tr><?php
                            }?>
                            </table>
                            
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
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div>
            <div class="modal-body text-center">
                <img class="img-responsive" src="#"/>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>



    <!-- Bootstrap Core JavaScript -->
    

    <!-- Metis Menu Plugin JavaScript -->
    

    <!-- Morris Charts JavaScript -->
    

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
