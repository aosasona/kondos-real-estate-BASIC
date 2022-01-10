<?php
session_start();

$host = "localhost";
$dBuser = "root";
$dBpass = "root";
$dBname = "estate";

$conn = mysqli_connect($host, $dBuser, $dBpass, $dBname);

$db = mysqli_select_db($conn, $dBname);

?>