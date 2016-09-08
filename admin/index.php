<!DOCTYPE html>
<html>
    <title>BMKG</title>
    <head>
        <meta charset="utf-8">
        <link href="../icon/logo_bmkg.png" rel="shortcut icon">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Halaman Administrator AWS|AAWS|ARG BMKG Prov. Nusa Tenggara Barat</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="../style/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../assets/libs/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../ionicons.min.css" type="">
        <!-- Theme style -->
        <link rel="stylesheet" href="../style/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../style/dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="../style/plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="../style/plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="../style/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="../style/plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../style/plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="../style/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation"></nav>

        </header>
        <div class="container" style="color:">
            <div class="row" style="margin-left:34% ">
                <div class="col-md-5">
                    <div class="panel panel-defult " style="border-color:rgb(195, 195, 204)"><br>

                        <img width="100px" height="100px" style=" margin-left:33%   " src="../icon/logo_bmkg.png" class="img-thumbnail" alt="User Image" />


                        <div class="box-header">
                            <h3 class="box-title"><a class="glyphicon glyphicon-user"></a>&nbsp; Login Admin</h3>
                        </div>
                        <div class="box-body">
                            <?php
                            if (isset($_GET['error'])) {
                                echo ' <div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                <b>Login Gagal! Cek Username Dan Password,</b></b>
                                            </div>';
                            }

                            if (isset($_GET['open'])) {
                                ?>
                                <script>
                                    window.open("../index.php", "myWindow", "fullscreen=yes,scrollbars=yes");
                                    window.location = '?'
                                </script>
                                <?php
                            }
                            ?>
                            <form method="post" action="data/login/proses_login.php">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input required="" name="user" maxlength="10" type="text" class="form-control" id="exampleInputEmail1" placeholder="Username" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input required="" name="pass" maxlength="30" type="password" class="form-control" id="exampleInputEmail1" placeholder="Password">
                                </div>
                                <input value="Login" type="submit" name="simpan" class="btn btn-primary" style="width:100%">
                            </form>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->


                </div><!-- /.col (left) -->
                <div class="col-md-7">
                </div><!-- /.col (right) -->
            </div><!-- /.row -->
        </div>


    </body>
</html>

<!-- page script -->


