<?php
include "koneksi.php";

$ID = $_GET['ID'];
$query_jumlah = mysqli_query($koneksi, "SELECT jumlah FROM t_tempkasir WHERE No = $ID");
while($info_jumlah = mysqli_fetch_array($query_jumlah)){
    $jumlah = $info_jumlah['jumlah'];
}

$idBarang = $_GET['idBarang'];

date_default_timezone_set("ASIA/BANGKOK");
mysqli_query($koneksi, "UPDATE t_barang SET stok = (stok + $jumlah) WHERE idBarang = '$idBarang'");
$hapus = mysqli_query($koneksi, "DELETE FROM t_tempkasir WHERE No = $ID ");

if($hapus) {
    
    echo "Data Sudah Terhapus";
}

?>