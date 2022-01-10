<?php

$listing_sql = "SELECT * FROM listings ORDER BY id DESC LIMIT 15";
$listing_sql_query = mysqli_query($conn, $listing_sql);

if(mysqli_num_rows($listing_sql_query) < 1){
    echo "<small>No listings</small>";
}
while($listing_fetch = mysqli_fetch_array($listing_sql_query)){
    $id = $listing_fetch["id"];
    $thumb = $listing_fetch["thumb"];
    $name = ucfirst($listing_fetch["apartment_type"]);
    $location = $listing_fetch["city"].', '.$listing_fetch["state"];
    $price = $listing_fetch["price"];
    $type = $listing_fetch["listing_type"];
?>
<div class="listing-card">
    <img src=<?php echo '"'.$thumb.'"'; ?>/>
    <a href=<?php echo '"/listings/listing.php?lid='.$id.'"'; ?>><?php echo $name; ?></a>
    <h1>N<?php echo number_format($price); ?></h1>
    <div class="location">
    <?php echo strtoupper($type).' - '.strtoupper($location); ?>
</div>
</div>
<?php
}
?>