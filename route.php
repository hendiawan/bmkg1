<?php

if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
} else {
    $menu = "";
}
if ($menu == '') {
    include "./tambahdp.php";
}else if($menu == 'map'){
    include "./map.php";
}else if($menu == 'map1'){
    include "./tambahdp.php";
}else if($menu == 'data'){
    include "./metadata.php";
}else if($menu == 'datai'){
    include "./metadata_input.php";
}else if($menu == 'datadetail'){
    include "./metadata_detail.php";
}else if($menu == 'detailAlat'){
    include "./alat_detail.php";
}else if($menu == 'rmalt'){
    include "./rmAlat.php";
}else if($menu == 'rmlp'){
    include "./rmLap.php";
}else if($menu == 'rmpos'){
    include "./rmPos.php";
}else if($menu == 'logout'){
    include "./login/logout.php";
}else if($menu == 'add'){
    include "./user/user_add.php";
}else if($menu == 'view'){
    include "./user/user_view.php";
}else if($menu == 'change'){
    include "./user/user_change.php";
}else if($menu == 'lpJenis'){
    include "./laporan/lpJenis.php";
}else if($menu == 'lpKompetensi'){
    include "./laporan/lpKompetensi.php";
}else if($menu == 'lpDetailPos'){
    include "./laporan/lpDetail.php";
}