<?php
include "koneksi.php";

date_default_timezone_set("ASIA/BANGKOK");
$data = mysqli_query($koneksi, "INSERT INTO t_kasir(noTransaksi, tanggal, idBarang, nmBarang, jumlah, harga, total, ID_Kasir) SELECT noTransaksi, tanggal, idBarang, nmBarang, jumlah, harga, total, ID_Kasir FROM t_tempkasir");

if($data){
    echo "Berhasil Simpan Data Kasir";
    mysqli_query($koneksi, "DELETE FROM t_tempkasir");
    mysqli_query($koneksi, "UPDATE FROM p_noTransaksi SET nomor = nomor + 1");
} else {
    echo "Gagal Simpan";
}

?>