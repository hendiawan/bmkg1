
<!-- Main content -->
<section class="right-side">
    <div class="row" style="margin-left: -100px ">

        <div class="col-md-11">                
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Permintaan Perubahan Password Mahasiswa</h3>
                            <div class="box-tools">                                             
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>   
                                    <tr>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Jenis</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $jenis = $_SESSION['jenis'];
                                    $query = mysql_query("SELECT * FROM user where ubah='yes'");
                                    while ($row = mysql_fetch_assoc($query)) {
                                        ?>

                                        <tr>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['pass'] ?></td>
                                            <td><?php echo $row['jenis'] ?></td>
                                            

                                            <td>
                                                <div class=" btn-group-vertical">
                                                         <a  class="btn btn-primary" data-toggle="modal" href="./index.php?menu=usru&&u=<?php echo $row['username']?>"><i class="fa fa-edit"></i>Ubah</a>
                                                </div>

                                                </div>                                            
                                            </td>
                                        </tr>


                                        <?php
                                    }
                                    ?>
                                </tbody>  
                            </table>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->


                </div>
            </div>





        </div><!-- /.col (right) -->
    </div><!-- /.row -->

</section><!-- /.content -->
