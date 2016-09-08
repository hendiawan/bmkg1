<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Reset Password !</h3>
    </div>
    <div class="box-body">
        <span id="error"></span>
        <!-- Date dd/mm/yyyy -->
        <form method="post" >

            <div class="form-group">
                <label for="exampleInputEmail1">Password Baru Akan dikirim Via Email</label>
            </div>
            <div class="form-group">
                <label  for="exampleInputEmail1">Password</label>
                <input required="" name="pass" maxlength="30" type="password" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Password Baru">
            </div>
            <input value="Lanjutkan" type="submit" name="lanjut" class="btn btn-primary flat" style="width:100%">
        </form>
    </div><!-- /.box-body -->
</div><!-- /.box -->

<?php
include '../library.php';
if (isset($_POST['lanjut'])) {
    
    $user=$_GET['u'];
    $pass = $_POST['pass'];
    
    $query  =   mysql_query("select * from user where username='$user'");
    $row    = mysql_fetch_array($query);
    
 
    
    $subject    = "Perubahan Password !";
    $message    = "Password Anda Sekarang Adalah: $pass  ";
    $to         = $row['email'];
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
// More headers
    $headers .= 'From: <info@yourdomain.com>' . "\r\n";
    $headers .= 'Cc: admin@yourdomain.com' . "\r\n";
    @mail($to, $subject, $message, $headers);
    if (@mail) {
        $query  =   mysql_query("update user set ubah='no' where username='$user'");
        ?>
        <script>
            alert('Perubahan Password Telah Dikirim Via Email !');
        </script>    
        <?php
    }



   
}
?>