<?php
include "koneksi.php";

date_default_timezone_set("ASIA/BANGKOK");
$data = mysqli_query($koneksi, "SELECT SUM(total)total, COUNT(*)item FROM t_tempkasir");

while($result = mysqli_fetch_array($data)){
    echo number_format($result["total"]);
    echo "|";
    echo $result["item"];
    echo "|";
}

?>