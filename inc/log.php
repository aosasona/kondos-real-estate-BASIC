<?php
$ip = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set("Africa/Lagos");
$today = date('d-m-Y');

$sep = "SELECT * FROM `log` WHERE ip='$ip' AND reg_date='$today'";
$re = mysqli_query($conn, $sep);
$cnt = mysqli_num_rows($re);

if($cnt < 1){
$sqe = "INSERT INTO `log` (ip, reg_date) VALUES('$ip', '$today')";
mysqli_query($conn, $sqe);
}
?>