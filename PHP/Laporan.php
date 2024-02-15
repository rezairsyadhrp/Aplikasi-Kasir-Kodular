<?php
include "koneksi.php";

$tanggaldari = $_GET['tanggaldari'];
$tanggalsampai = $_GET['tanggalsampai'];
$ID = $_GET['ID'];

$tanggaldari = substr($tanggaldari,6,4).substr($tanggaldari,2,3)."/".substr($tanggaldari,0,2);
$tanggalsampai = substr($tanggalsampai,6,4).substr($tanggalsampai,2,3)."/".substr($tanggalsampai,0,2);

date_default_timezone_set("ASIA/BANGKOK");

if($ID == 'D') {
    $data = mysqli_query($koneksi, "SELECT * FROM t_kasir WHERE tanggal BETWEEN '$tanggaldari' AND '$tanggalsampai' ORDER BY tanggal ASC");

    $No = 1;
    while($result = mysqli_fetch_array($data)) {
        echo $No;
        echo ". ";
        echo SUBSTR($result["nmBarang"],0,20);
        echo "....";
        echo $result["jumlah"];
        echo " X ";
        echo $result["harga"];
        echo " = ";
        echo number_format($result["total"]);
        echo "||";
        ++$No;
    }
}
if ($ID == 'T') {
    $detail = mysqli_query($koneksi, "SELECT SUM(total)total FROM t_kasir WHERE tanggal BETWEEN '$tanggaldari' AND '$tanggalsampai' ");

    while($harian = mysqli_fetch_array($detail)){
        echo number_format($harian["total"]);
    }
}

if($ID == 'R') {
    $data = mysqli_query($koneksi, "SELECT noTransaksi, tanggal, SUM(total)total FROM t_kasir WHERE tanggal BETWEEN '$tanggaldari' AND '$tanggalsampai' GROUP BY noTransaksi ORDER BY noTransaksi ASC");

    $No = 1;
    while($result = mysqli_fetch_array($data)) {
        echo $No;
        echo ". ";
        echo $result["noTransaksi"];
        echo " * ";
        echo $result["tanggal"];
        echo " * ";
        echo number_format($result["total"]);
        echo "||";
        ++$No;
    }
}

if($ID == 'H') {
    $data = mysqli_query($koneksi, "SELECT noTransaksi, tanggal, SUM(total)total FROM t_kasir WHERE tanggal BETWEEN '$tanggaldari' AND '$tanggalsampai' GROUP BY tanggal ORDER BY tanggal ASC");

    $No = 1;
    while($result = mysqli_fetch_array($data)) {
        echo $No;
        echo ". ";
        echo $result["tanggal"];
        echo " * ";
        echo $result["noTransaksi"];
        echo " * ";
        echo number_format($result["total"]);
        echo "||";
        ++$No;
    }
}

?>