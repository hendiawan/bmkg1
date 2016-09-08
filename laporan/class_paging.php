<?php

// class paging untuk halaman administrator
class Paging {

// Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas) {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

// Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas) {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

// Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman, $menu, $hal) {
       
        $link_halaman = "";
         $menu;
        if ($hal < 5) {
            $hal = 1;
            if ($jmlhalaman < 5) {
                $halaman = $jmlhalaman;
            } else {
                $halaman = 5;
            }
        } else {
            $hal = $hal - 3;
            $halaman = $hal + 4;

            if ($halaman > $jmlhalaman) {
                $halaman = $jmlhalaman;
            }
        }

// Link halaman 1,2,3, ...
        for ($i = $hal; $i <= $halaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<b>$i</b> | ";
            } else {
                if ($hal > $jmlhalaman) {
                    $i = 1;
                }
                $link_halaman .= "<a href=$_SERVER[PHP_SELF]?menu=$menu&halaman=$i>$i</a> | ";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }

}

?>