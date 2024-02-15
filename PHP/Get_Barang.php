<?php
include "koneksi.php";
$ID = $_GET['ID'];

date_default_timezone_set("ASIA/BANGKOK");

if(strlen($ID) >= 4) {
    $data = mysqli_query($koneksi, "SELECT * FROM t_barang WHERE idBarang = $ID");

    while($result = mysqli_fetch_array($data)){
        echo $result["nmBarang"];
        echo "|";
        echo $result["hargaJual"];
        echo "|";
        echo $result["stok"];

        mysqli_query($koneksi, "UPDATE t_barang SET stok = stok - 1 WHERE idBarang = $ID");
    }
} else {
    $dataKasir = mysqli_query($koneksi, "SELECT * FROM t_tempkasir WHERE idBarang = $ID");

    while($hasil = mysqli_fetch_array($dataKasir)){
        echo $hasil["nmBarang"];
        echo "|";
        echo $hasil["jumlah"];
        echo "|";
        echo $hasil["harga"];
    }
}

?>