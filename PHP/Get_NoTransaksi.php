<?php
include "koneksi.php";

date_default_timezone_set("ASIA/BANGKOK");

$data = mysqli_query($koneksi, "SELECT * FROM p_notransaksi");

while($result = mysqli_fetch_array($data)){
    echo date("dmY");
    echo "/", $result["Nomor"];
}

?>