<?php
error_reporting(-1);
include $_SERVER["DOCUMENT_ROOT"]."/inc/header.php";
include $_SERVER["DOCUMENT_ROOT"]."/php/connect.php";
?>
<html>
<head>
<title>Search results</title>
</head>

<body>

<div class="grid">
<?php

if(isset($_GET["search"])) {
    $state = $_GET["state"];
    $min = $_GET["min"];
    $max = $_GET["max"];

    $pick = "SELECT * FROM listings WHERE state='$state' ORDER BY id DESC";
    $run_pick = mysqli_query($conn, $pick);
    
    while($list = mysqli_fetch_array($run_pick)){

        $price = $list["price"];

        if($price >= $min && $price <= $max){
            $id = $list["id"];
            $thumb = $list["thumb"];
            $name = ucfirst($list["apartment_type"]);
            $location = $list["city"].', '.$list["state"];
            $price = $list["price"];
            $type = $list["listing_type"];

?>
<div class="card">
    <img src=<?php echo '"'.$thumb.'"'; ?>/>
    <a href=<?php echo '"/listings/listing.php?lid='.$id.'"'; ?>><?php echo $name; ?></a>
    <h1>N<?php echo number_format($price); ?></h1>
    <div class="location">
    <?php echo strtoupper($type).' - '.strtoupper($location); ?>
</div>
</div>
<?php
        }
    }
    echo '</div>';
    if(mysqli_num_rows($run_pick) < 1){
        echo '</br></br></br></br><center><small>No match found</small></center></br></br>';
    }
}
?>

</body>

</br>
<?php include $_SERVER["DOCUMENT_ROOT"]."/inc/footer.php"; ?>


</html>

