
<section class="col-lg-6 connectedSortable"  style="margin-left:27% ">
    <div class="box box-primary">

        <form method="post" action=""  >


            <div class="box-header">
                <h3 class="box-title">Tambah User</h3>
            </div>
            <br>

            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                        <input required=""   name="username" type="text" class="form-control" id="exampleInputEmail1" placeholder="Username" >
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
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                        <select name="jenis" class="form-control">
                            <option>Pilih Jenis</option>
                            <option value="1">Admin</option>
                            <option value="2">Super Admin</option>

                        </select>    

                    </div>
                    <span id="message"></span>
                </div>
            </div>

            <br>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-7">
                        <input disabled=""   id="simpan" type="submit" value="Simpan" name="simpan" class="btn btn-primary" >
                    </div>
                </div>
            </div> 
        </form>





        </form>
        <?php
        if (isset($_POST['simpan'])) {
            
            $user = $_POST['username'];
            $pass = $_POST['pass'];
            $pass1 = $_POST['pass1'];
            $jenis = $_POST['jenis'];

            if ($pass != $pass1) {
                ?>
                <script>
                    Document.getElementById('error').style.backgroundColor = "rgb(204, 144, 144)";
                    Document.getElementById('error').style.color = "rgb(204, 144, 144)";
                    Document.getElementById('error').innerHTML = "Password yang Dimasukkan Tidak Sama"
                </script>    
                <?php
            } else {
                $sql_user = " insert into user(username,password,level) values('$user','" . md5($pass1) . "','$jenis')";
                $query = mysql_query($sql_user);

                if ($query) {
                    ?>
                    <script>
                        alert('Berhasil Tambah User');
                        window.location = "?menu=view"
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



    </div>
</section>

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



