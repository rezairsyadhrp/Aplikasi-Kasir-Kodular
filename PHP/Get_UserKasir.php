<?php
include "koneksi.php";
$ID = $_GET['ID'];

$data = mysqli_query($koneksi, "SELECT * FROM p_userkasir WHERE ID_Kasir = '$ID'");

while($result = mysqli_fetch_array($data)){
    echo $result["ID_Kasir"];
    echo "|";
    echo $result["password"];
    echo "|";
    echo $result["namaKasir"]; 
}

?>