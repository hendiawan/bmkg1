<?php
include "koneksi.php";


session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <link href="./icon/logo_bmkg.png" rel="shortcut icon">
        <script type="text/javascript" src="jquery-1.4.3.min.js"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Halaman Administrator AWS|AAWS|ARG BMKG Prov. Nusa Tenggara Barat</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="style/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="./assets/libs/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="ionicons.min.css" type="">
        <!-- Theme style -->
        <link rel="stylesheet" href="style/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="style/dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="style/plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="style/plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="style/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="style/plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="style/plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="style/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b></b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b></b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div hidden="" id="login" class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li   class="dropdown user user-menu notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span>&nbsp;&nbsp;<i class="fa fa-close"> <b></b></i></span>
                <!--                               <span><img  style="border-radius: 3px; ;  border: 2px solid " alt="User Image" src="../../img/avatar04.png" height="28px" width="28"><i class="caret"></i></span>-->
                                </a>
                                <ul class="dropdown-menu" style="width: 200px">
                                    <li class="header">Akun</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">                                         
                                            <li hidden="" id="manage">
                                                <a href="index.php?menu=view">
                                                    <i class="fa fa-circle-o text-red"></i>Manage User 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="index.php?menu=change">
                                                    <i class="fa fa-circle-o text-red"></i>Change Password 
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="footer"><a href="?menu=logout" class="btn btn-default btn-flat">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="icon/logo_bmkg.png" class="img-rounded" alt="User Image">
                        </div><br>  

                    </div>
                    <!-- search form -->

                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->


                    <script>
                        $(document).ready(function() {
                            $('#mapmenu').hide();
                        });
                    </script>
                    <ul class="sidebar-menu">
                        <li class="header" style="color:white">STASIUN KLIMATOLOGI KLAS I<br> KEDIRI - MATARAM<br>
                            PROVINSI NUSA TENGGARA BARAT
                        </li>
                    </ul><br>
                    <ul class="sidebar-menu">
                        <li hidden="" id="legenda1" class="header">LEGENDA POS KERJASAMA</li>
                        <li hidden="" id="legenda2" ><a  id="aws" href="#"><i class="fa fa-circle-o text-yellow"></i> <span><img src="./icon/aws2.png"> AWS</span></a></li>
                        <li hidden="" id="legenda3"><a id="awsp"  href="#"><i class="fa fa-circle-o text-yellow"></i> <span><img  src="./icon/awsp2.png"> AWS PLUS</span></a></li>
                        <li hidden="" id="legenda4"><a id="aaws"  href="#"><i class="fa fa-circle-o text-yellow"></i> <span><img  src="./icon/aaws2.png"> AAWS</span></a></li>
                        <li hidden="" id="legenda5"><a id="arg" href="#"><i class="fa fa-circle-o text-yellow"></i> <span><img  src="./icon/arg2.png"> ARG</span></a></li>
                        <li hidden="" id="legenda5"><a id="observasi" href="#"><i class="fa fa-circle-o text-yellow"></i> <span><img  src="./icon/observasi2.png"> POS OBSERVASI</span></a></li>
                        <li hidden="" id="legenda7"><a  id="smpk" href="#"><i class="fa fa-circle-o text-yellow"></i> <span><img src="./icon/smpk2.png">SMPK</span></a></li>

                        <li class="header">MENU UTAMA</li>
                        <li class="treeview">
                            <a href="index.php?menu=map1">
                                <i class="glyphicon glyphicon-home"></i> <span>Map Distribusi Pos</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>



                        <li hidden="" id="master" class="treeview">
                            <a href="index.php?menu=data">
                                <i class="glyphicon  glyphicon-tasks"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>

                        <li hidden="" id="laporan" class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-book"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul id="representasi" class="treeview-menu">
                                 <li><a href="index.php?menu=lpJenis"><i class="fa fa-circle-o"></i>By Jenis & Jumlah<span></span> </a></li>
                                 <li><a href="index.php?menu=lpKompetensi"><i class="fa fa-circle-o"></i>By Kompetensi<span></span> </a></li>
                                 <li><a href="index.php?menu=lpDetailPos"><i class="fa fa-circle-o"></i>By Detail Pos<span></span> </a></li>
 
                            </ul>
                        </li>


                        <li id="mapmenu1" hidden="" class="treeview">
                            <a href="#">
                                <i class="fa fa-credit-card"></i> <span>Identitas POS</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php?menu=meta"><i class="fa fa-circle-o"></i>Nomer ID<span id="teksnama"></span> </a></li>
                                <li><div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input readonly="" id="idaws" type="text" class="form-control" >
                                    </div></li>

                                <li><a href="index.php?menu=meta"><i class="fa fa-circle-o"></i>Jenis Komunikasi<span id="teksalamat"></span></a></li>
                                <li><div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input readonly="" id="jenis_komunikasi" type="text" class="form-control" >
                                    </div></li>
                                <li><a href="index.php?menu=meta"><i class="fa fa-circle-o"></i>Nomor GSM<span id="kontak"></span>  </a></li>
                                <li><div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input readonly="" id="nomorgsm" type="text" class="form-control" >
                                    </div></li>
                                <li><a href="index.php?menu=meta"><i class="fa fa-circle-o"></i>Merk<span id="kontak"></span>  </a></li>
                                <li><div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input readonly="" id="merk" type="text" class="form-control" >
                                    </div></li>
                                <li><a href="index.php?menu=meta"><i class="fa fa-circle-o"></i>Nama Pos<span id="kontak"></span>  </a></li>
                                <li><div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input  readonly="" id="namapos" type="text" class="form-control" >
                                    </div></li>

                            </ul>
                        </li>
                        <li id="mapmenu2" hidden="" class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-road"></i> <span>Alamat Pos</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">

                                <li><a href="index.php?menu=meta"><i class="fa fa-circle-o"></i>Lokasi<span id="teksalamat"></span></a></li>
                                <li><div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input readonly="" id="lokasi" type="text" class="form-control" >
                                    </div></li>
                                <li><a href="index.php?menu=meta"><i class="fa fa-circle-o"></i>Alamat<span id="teksalamat"></span></a></li>
                                <li><div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input readonly="" id="alamat" type="text" class="form-control" >
                                    </div></li>
                                <li><a href="index.php?menu=meta"><i class="fa fa-circle-o"></i>DUSUN|DESA<span id="teksalamat"></span></a></li>
                                <li><div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input readonly="" id="desaI" type="text" class="form-control" >
                                    </div></li>
                                <li><a href="index.php?menu=meta"><i class="fa fa-circle-o"></i>KECAMATAN<span id="kontak"></span>  </a></li>
                                <li><div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input readonly="" id="kecamatanI" type="text" class="form-control" >
                                    </div></li>
                                <li><a href="index.php?menu=meta"><i class="fa fa-circle-o"></i>KABUPATEN<span id="kontak"></span>  </a></li>
                                <li><div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input readonly="" id="kabupatenI" type="text" class="form-control" >
                                    </div></li>
                                <li><a href="index.php?menu=meta"><i class="fa fa-circle-o"></i>PROVINSI<span id="kontak"></span>  </a></li>
                                <li><div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input readonly="" id="provinsiI" type="text" class="form-control" >
                                    </div></li>

                            </ul>
                        </li>
                        <li id="mapmenu3" hidden="" class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-map-marker"></i> <span>Koordinat Pos</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php?menu=meta"><i class="fa fa-circle-o"></i>LATITUDE<span></span> </a></li>
                                <li><div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input readonly=""  id="lat" type="text" class="form-control" >
                                    </div></li>
                                <li><a href="index.php?menu=meta"><i class="fa fa-circle-o"></i>LONGITUDE<span></span> </a></li>
                                <li><div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input id="lng" readonly="" type="text" class="form-control" >
                                    </div></li>



                            </ul>
                        </li>

                        <li id="mapmenu5" hidden="" class="treeview" >
                            <a href="#">
                                <i class="glyphicon glyphicon-screenshot"></i> <span>Representasi Pos</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul id="representasi" class="treeview-menu">
                                <li><a id="timur"><i class="fa fa-circle-o"></i>TIMUR<span id="teksnama"></span> </a></li>
                                <li><a id="barat"><i class="fa fa-circle-o"></i>BARAT<span id="teksnama"></span> </a></li>
                                <li><a id="utara"><i class="fa fa-circle-o"></i>UTARA<span id="teksnama"></span> </a></li>
                                <li><a id="selatan"><i class="fa fa-circle-o"></i>SELATAN<span id="teksnama"></span> </a></li>

                            </ul>
                        </li>



                        <li class="header">KONDISI POS KERJASAMA</li>
                        <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>Baik</span></a></li>
                        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Rusak Ringan</span></a></li>
                        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Rusak Berat</span></a></li>


                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Sistem Informasi
                        <small>MONITORING KONDISI PERALATAN POS KERJASAMA</small>
                    </h1>
                    <ol class="breadcrumb">

                        <?php if (isset($_SESSION['username'])) {
                            ?>
                            <li><a href="#"><i class="fa fa-user"></i> User : <b style="color:red"><?php echo strtoupper($_SESSION['username']) ?></b></a></li>
                        <?php }
                        ?>


                    </ol>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php include './route.php'; ?>
                        </div>
                    </div>
                </section>

            </div>
        </div>




        <!-- /.content -->
    </div>

    <?php
    if (isset($_SESSION['login-bmkg'])) {

        $level = $_SESSION['level'];
        $level;
        if ($level == '2') {
            ?>
            <script>
                $(document).ready(function() {
                    $("#tambahDataPos").removeAttr('hidden');
                    $("#master").removeAttr('hidden');
                    $("#laporan").removeAttr('hidden');

                    $("#addAlat").removeAttr('hidden');
                    $("#changePos").removeAttr('hidden');
                    $("#upPenanggungJawab").removeAttr('hidden');
                    $("#upPenjaga").removeAttr('hidden');
                    $("#upTimur").removeAttr('hidden');
                    $("#upBarat").removeAttr('hidden');
                    $("#upUtara").removeAttr('hidden');
                    $("#upSelatan").removeAttr('hidden');
                    $("#remove").removeAttr('hidden');
                    $("#remove1").removeAttr('hidden');
                    $("#changeAlat").removeAttr('hidden');
                    $("#manage").removeAttr('hidden');
                    $("#login").removeAttr('hidden');
                    $("#lap").removeAttr('hidden');

                });
            </script>    
            <?php
        } else {
            ?>
            <script>
                $(document).ready(function() {
                    $("#master").removeAttr('hidden');
                    $("#laporan").removeAttr('hidden');
                    $("#login").removeAttr('hidden');

                });
            </script>    
            <?php
        }
    }
    ?>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2016-2017 <a>Hendiawan </a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="style/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
        $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="style/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="style/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="style/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="style/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="style/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="style/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="style/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="style/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="style/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="style/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="style/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="style/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="style/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->

<script src="style/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="style/plugins/input-mask/jquery.inputmask.js"></script>
<script src="style/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="style/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="style/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="style/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="style/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="style/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="style/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="style/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="style/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App --> 
<script src="style/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="style/dist/js/demo.js"></script>
<!-- Page script -->
<script>
        $(function() {
            //Initialize Select2 Elements
            $(".select2").select2();

            //Datemask dd/mm/yyyy
            $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            //Datemask2 mm/dd/yyyy
            $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
            //Money Euro
            $("[data-mask]").inputmask();

            //Date range picker
            $('#reservation').daterangepicker();
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                    {
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                        },
                        startDate: moment().subtract(29, 'days'),
                        endDate: moment()
                    },
            function(start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            );

            //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            });

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            });
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });

            //Colorpicker
            $(".my-colorpicker1").colorpicker();
            //color picker with addon
            $(".my-colorpicker2").colorpicker();

            //Timepicker
            $(".timepicker").timepicker({
                showInputs: false
            });
        });
</script>
</body>
</html>
