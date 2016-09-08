
<section class="col-lg-12 connectedSortable">
    <div class="box box-primary">
        <div class="box-header">
            <!-- tools box -->
            <div class="box-header">
                <h3 class="box-title">Data User</h3>

            </div>
        </div>
        <div class="box-body no-padding">
            <div class="table-responsive">
                <div class="box-body table-responsive no-padding">

                </div>

            </div>

        </div>

    </div>
</section>
<section class="col-lg-12 connectedSortable">
    <div class="box-tools"> 
        <a  class="btn btn-danger" data-toggle="tooltip" title="Tambah User"  href="index.php?menu=add" ><i class="fa  fa-plus"></i></a>
    </div><br>
    <div class="box box-primary">
        <div class="box">
            <div class="box-body table-responsive no-padding">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>   
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Jenis</th>
                            <td align="center"><b>Action</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $i = 1;
                        $query = mysql_query("SELECT * FROM user ");
                        while ($row = mysql_fetch_assoc($query)) {
                            ?>

                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['password'] ?></td>
                                <td><?php echo $row['level'] ?></td>


                                <td align="center">
                                    <div class=" btn-group-vertical">
                                        <a data-toggle="tooltip" title="Hapus"   onclick="return confirm('Apakah Anda Yakin Menghapus <?php echo $row['username'] ?> ?')" class="btn btn-danger" data-toggle="modal" href="./user/user_delete.php?u=<?php echo $row['idUser'] ?>"><i class="fa fa-trash-o"></i> </a>
                                    </div>

                                    </div>                                            
                                </td>
                            </tr>


                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>  
                </table>

            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</section>
<!-- Map box -->

