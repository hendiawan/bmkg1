
<div class="container">
    <section class="right-side">
        <div class="row" style="margin-left:60px ">
            <form method="post" action=""  >
                <div class="col-md-7" ">
                    <div class="box ">
                        <div class="box-header">
                            <h3 class="box-title">Ganti Password</h3>
                        </div>
                        <br>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php
                                    $level = $_SESSION['level'];
                                    $user = $_SESSION['username'];
                                    $level;
                                    if ($level == '2') {
                                        echo "<input required='' value='$user'  name='username' type='text' class='form-control' id='exampleInputEmail1' placeholder='Username' >";
                                    } else {
                                        echo "<input required=''  readonly='' value='$user'  name='username' type='text' class='form-control' id='exampleInputEmail1' placeholder='Username' >";
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <input required=""  name="pass_lama" type="password" class="form-control" id="exampleInputEmail1" placeholder="Password Lama" >
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <input required=""  id="pass" name="pass" type="password" class="form-control" id="exampleInputEmail1" placeholder="Password " >
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <input required="" id="pass1" name="pass1" onchange="checkPass()" type="password" class="form-control" id="exampleInputEmail1" placeholder="Ulangi Password" >
                                </div>
                                <span id="message"></span>
                            </div>
                        </div>


                        <br>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-7">
                                    <input disabled="" style="width:460px"  id="simpan" type="submit" value="Simpan" name="simpan" class="btn btn-primary" >
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>



            </form>
            <?php
            if (isset($_POST['simpan'])) {

                $user = $_POST['username'];
                $pass_lama = $_POST['pass_lama'];
                $pass = $_POST['pass'];
                $pass1 = $_POST['pass1'];



                if ($pass != $pass1) {
                    ?>
                    <script>
                        Document.getElementById('error').style.backgroundColor = "rgb(204, 144, 144)";
                        Document.getElementById('error').style.color = "rgb(204, 144, 144)";
                        Document.getElementById('error').innerHTML = "Password yang Dimasukkan Tidak Sama"
                    </script>    
                    <?php
                } else {
                    $sql_user = " update user set password= '" . md5($pass) . "' where username='$user' and password='" . md5($pass_lama) . "'";
                    $query = mysql_query($sql_user);

                    if ($query) {
                        ?>
                        <script>
                            alert('Password Berhasil DiUpdate !');
                            window.location = "index.php?menu=view"
                        </script>
                        <?php
                    } else {
                        ?>
                        <script>
                            alert('Gagal');</script>
                            <?php
                    }
                }
            }
            ?>





        </div><!-- /.row -->

    </section><!-- /.content -->

</div>

<script>

    function checkPass()
    {
        //Store the password field objects into variables ...
        var pass1 = document.getElementById('pass');
        var pass2 = document.getElementById('pass1');
        var message = document.getElementById('message');
        //Set the colors we will be using ...
        var goodColor = "rgb(145, 198, 145)";
        var badColor = "rgb(204, 144, 144)";
        //Compare the values in the password field 
        //and the confirmation field
        if (pass1.value == pass2.value) {
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "Password Tepat!"
            document.getElementById("simpan").disabled = false;
        } else if (pass1.value !== pass2.value) {
            //The passwords do not match.
            //Set the color to the bad color and
            //notify the user.
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = "Password yang Dimasukkan Tidak Sama"
            document.getElementById("simpan").disabled = true;
        }
    }
</script>



