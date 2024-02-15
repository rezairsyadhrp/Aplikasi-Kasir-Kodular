<?php
include "koneksi.php";

$NoUrut = $_GET['NoUrut'];
$idBarang = $_GET['idBarang'];
$nmBarang = $_GET['nmBarang'];
$harga = $_GET['harga'];
$noTransaksi = $_GET['NoTransksi'];
$userKasir = $_GET['userKasir'];

$tanggal = date("Y/m/d");
$jumlah = 1;
$total = $jumlah * $harga;

$data = mysqli_query($koneksi, "SELECT * FROM t_tempkasir WHERE idBarang = $idBarang");
if(mysqli_num_rows($data) == 0){
    $simpan = mysqli_query($koneksi, "INSERT INTO t_tempkasir(No, noTransaksi, tanggal, idBarang, nmBarang, jumlah, harga, total, ID_Kasir) values('$NoUrut', '$noTransaksi', '$tanggal', '$idBarang', '$nmBarang', '$jumlah', '$harga', '$total', '$userKasir')");

    if($simpan) {
        mysqli_query($koneksi, "UPDATE t_barang SET stok = (stok - 1) WHERE idBarang = $idBarang");
        echo "BERHASIL SIMPAN";
    } else {
        echo "GAGAL SIMPAN";
    }
} else {
    echo 'UPDATE';
    while($hasil = mysqli_fetch_array($data)){
        $jumlah = $hasil["jumlah"];
        $total = $jumlah * $harga;
    }
    mysqli_query($koneksi, "UPDATE t_tempkasir SET jumlah = $jumlah, total = $total WHERE idBarang = '$idBarang'");
}

?>