<?php
include $_SERVER["DOCUMENT_ROOT"]."/php/connect.php";
include $_SERVER["DOCUMENT_ROOT"]."/inc/header2.php";

$id = $_GET["lid"];
$sql = "SELECT * FROM listings WHERE id='$id'";
$result = mysqli_query($conn, $sql);

while($data = mysqli_fetch_array($result)){
$tit = $data["apartment_type"];
$key = explode(" ", $tit);
$keyword = implode(", ", $key);

echo '<head>';
echo '<meta name="description" content="'.$data["about"].'">';
echo '<meta name="keywords" content="'.$keyword.'">';
echo '</head>';
echo '<title>'.$data["apartment_type"].' For '.ucfirst($data["listing_type"]).' - '.$data["city"].', '.$data["state"].'</title>';
}
?>
    </head>

    <body>
<?php
$id = $_GET["lid"];
$sql = "SELECT * FROM listings WHERE id='$id'";
$result = mysqli_query($conn, $sql);

while($data = mysqli_fetch_array($result)){
    echo '<center><div class="image-slide">';
    echo '<img src="'.$data["thumb"].'"/>';

    if($data["image1"] != NULL && $data["image1"] != "/img/"){
        echo '<img src="'.$data["image1"].'"/>';
    }
    
    if($data["image2"] != NULL && $data["image2"] != "/img/"){
        echo '<img src="'.$data["image2"].'"/>';
    }
    
    if($data["image3"] != NULL && $data["image3"] != "/img/"){
        echo '<img src="'.$data["image3"].'"/>';
    }
    
    if($data["image4"] != NULL && $data["image4"] != "/img/"){
        echo '<img src="'.$data["image4"].'"/>';
    }
    
    if($data["image5"] != NULL && $data["image5"] != "/img/"){
        echo '<img src="'.$data["image5"].'"/>';
    }

    echo '</div>';
    echo '<h1 class="apartment">'.ucfirst($data["apartment_type"]).'</h1>';
    echo '<div class="spec">';
?>
<span class="spec-list"><img src="/img/location.png"/><?php echo ucfirst($data["city"]).", ".ucfirst($data["state"])." - ".ucfirst($data["listing_type"]); ?></span>
<span class="spec-list"><img src="/img/cost.png"/><?php echo "N".number_format($data["price"]); ?></span>   
<?php
if($data["apartment_type"] != "LAND"){  
?>

<span class="spec-list"><img src="/img/bed.png"/><?php echo $data["bedroom"]." BEDROOMS"; ?></span> 
<span class="spec-list"><img src="/img/tub.png"/><?php echo $data["bathroom"]." BATHROOMS"; ?></span>

<?php
}
?>
</br>
<?php
    echo '</div>';

    echo '<div class="features">';
    echo nl2br($data["about"]);

    if($data["youtube"] != NULL AND $data["youtube"] != "" AND $data["youtube"] != "https://"){
        echo '</br></br>Check out the attached video here : <a href="'.$data["youtube"].'">'.$data["youtube"].'</a>';
    }
if($data["video_dir"] != "/img/" && $data["video_dir"] != NULL){
?>
</br>
<video width="320" height="240" controls>
    <source src=<?php echo '"'.$data["video_dir"].'"'; ?> type="video/mp4">
</video>

</br></br>

<div class="subtitle"><?php echo ucfirst($data["subtitle"]); ?></div>
<?php
            }
    echo '</div>';
}
    ?>
    </br></br>
    <center>
        <a href="https://wa.me/2347064028070" class="mail">Contact Us</a>
</center>
    </body>
</html>

<?php
include $_SERVER["DOCUMENT_ROOT"]."/inc/footer.php";
?>