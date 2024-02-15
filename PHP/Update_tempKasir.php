<?php
include "koneksi.php";

$ID = $_GET['ID'];
$query_jumlah = mysqli_query($koneksi, "SELECT jumlah FROM t_tempkasir WHERE No = $ID");
while($info_jumlah = mysqli_fetch_array($query_jumlah)){
    $jumlah_awal = $info_jumlah['jumlah'];
}
$jumlah = $_GET['jumlah'];
$harga = $_GET['harga'];
$idBarang = $_GET['idBarang'];
$total = $jumlah * $harga;


$data = mysqli_query($koneksi, "UPDATE t_tempkasir SET jumlah = $jumlah, total = $total WHERE No = $ID");


if($data) {
    if($jumlah_awal < $jumlah){
        mysqli_query($koneksi, "UPDATE t_barang SET stok = (stok - ($jumlah - $jumlah_awal)) WHERE idBarang = '$idBarang'");
        echo "Berhasil Update Data Barang";
    }else{
        mysqli_query($koneksi, "UPDATE t_barang SET stok = (stok + ($jumlah_awal - $jumlah)) WHERE idBarang = '$idBarang'");
        echo "Berhasil Update Data Barang";
    }
}

?>