<?php
include $_SERVER["DOCUMENT_ROOT"]."/php/connect.php";

$id = $_GET["id"];

$sql = "DELETE FROM blog WHERE id='$id'";
mysqli_query($conn, $sql);

echo '<meta http-equiv="refresh" content="0, url=/siteadmin/home.php">';
?>