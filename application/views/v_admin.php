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
                                    <div class="huge"><?php echo $count;?></div>
                                    <div>Jumlah Objek</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class = "row">
                <form>
                     <div class="col-xs-4 form-group">
                        <input type="text" name="keyword" class="form-control">
                    </div>
                    <div class="col-xs-4 form-group">
                        <label>Kategori Search<br></label>
                        <select class="form-control" name="kategori">
                            <option value="provinsi">Provinsi</option>
                            <option value="name">Nama</option>
                        </select>
                    </div>
                </form> 
            </div>
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Daftar Objek
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <table class="table ">
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <!-- <th><a href="?orderby=post_title&order=<?php echo $postTitleNextOrder; ?>" class="column-title">Provinsi</th> -->
                                <th><a href="<?php echo base_url().'C_Admin/sort/'.$order.'/orderby' ?>">Provinsi</a></th>
                                <th>Kota</th>
                                <th>OPK</th>
                                <th>Action</th>
                                
                            </tr>
                            <?php $nom=($page-1) * 20;foreach ($objek as $row) {
                                $nom++;
                                //$email = $row->email;
                                ?><tr>
                                    <td><?php echo $nom;?></td>
                                    <td><?php echo $row->IdCatatPrim;?></td>
                                    <td><?php echo $row->NamePrim;?></td>
                                    <td><?php echo $row->Ocupation;?></td>
                                    <td>
                                        <?php 
                                            if (is_null( $row->Kota)) {
                                                ?><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><?php
                                            } else {
                                                echo $row->Kota;
                                            }
                                            
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if (is_null( $row->OPK)) {
                                                ?><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><?php
                                            } else {
                                                echo $row->OPK;
                                            }
                                            
                                        ?>
                                    </td>
                                    <td> 
                                        <a href="<?php echo base_url().'C_Admin/detail/'.$row->IdCatatPrim?>"><i class="fa fa-eye fa-fw"></i></a>
                                        <a href="<?php echo base_url().'C_Admin/del/'.$row->IdCatatPrim?>"><i class="fa fa-remove fa-fw"></i> </a>
                                    </td>
                                    
                                </tr><?php
                            }?>
                            </table>
                            <div class="pagination pagination-sm">
                                <?php foreach ($links as $link) {
                                echo "<li class >". $link."</li>";
                                } ?>
                            </div>
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

<script type="text/javascript">
    $('.image-floating').click(function(e){
        $('#myModal img').attr('src', $(this).attr('data-img-url'));
    });

    $('.changestatus').click(function(e){
        e.preventDefault();
        var caper_id = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: '/calonpeserta/status',
            data: {caper_id: caper_id},
            success: function(response) {
                // alert(response);
                if(response == 'success') {
                    location.reload();
                } else {
                    alert('Ada masalah di server');
                }
            }
        });
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

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
