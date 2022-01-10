<?php

include $_SERVER["DOCUMENT_ROOT"]."/php/connect.php";

function adminLogin() {
    if(isset($_COOKIE["admin"])){
        return true;
    }
    else {
        return false;
    }
}

if(!adminLogin()){
    $_SESSION["admin_error"] = "You must be logged in as an admin to access this page";

    header('location: /siteadmin');
    exit;
}

if(isset($_POST["list"])){
    $apartment = htmlspecialchars(addslashes($_POST["apartment_type"]));
    $bedroom = $_POST["bedroom"];
    $bathroom = $_POST["bathroom"];
    $listing_type = $_POST["listing_type"];
    $price = $_POST["price"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $feature = htmlspecialchars(addslashes($_POST["feature"]));
    $subtitle = htmlspecialchars(addslashes($_POST["subtitle"]));
    $youtube = $_POST["yt"];

    date_default_timezone_set("Africa/Lagos");
    $date = date('d-m-Y H:i');

//THUMB
$dir = "../img/";
$file = $dir.basename($_FILES["thumb"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$lin = "/img/".$_FILES["thumb"]["name"];
$image_name = $_FILES["thumb"]["name"];
move_uploaded_file($_FILES["thumb"]["tmp_name"], $file);

//IMAGE 1
$dir = "../img/";
$file = $dir.basename($_FILES["image1"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$lin1 = "/img/".$_FILES["image1"]["name"];
$image_name = $_FILES["image1"]["name"];
move_uploaded_file($_FILES["image1"]["tmp_name"], $file);

//IMAGE 2
$dir = "../img/";
$file = $dir.basename($_FILES["image2"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$lin2 = "/img/".$_FILES["image2"]["name"];
$image_name = $_FILES["image2"]["name"];
move_uploaded_file($_FILES["image2"]["tmp_name"], $file);

//IMAGE 3
$dir = "../img/";
$file = $dir.basename($_FILES["image3"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$lin3 = "/img/".$_FILES["image3"]["name"];
$image_name = $_FILES["image3"]["name"];
move_uploaded_file($_FILES["image3"]["tmp_name"], $file);

//IMAGE 4
$dir = "../img/";
$file = $dir.basename($_FILES["image4"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$lin4 = "/img/".$_FILES["image4"]["name"];
$image_name = $_FILES["image4"]["name"];
move_uploaded_file($_FILES["image4"]["tmp_name"], $file);

//IMAGE 5
$dir = "../img/";
$file = $dir.basename($_FILES["image5"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$lin5 = "/img/".$_FILES["image5"]["name"];
$image_name = $_FILES["image5"]["name"];
move_uploaded_file($_FILES["image5"]["tmp_name"], $file);

//Image variable declaration for video
$dir = "../img/";
$file = $dir.basename($_FILES["video"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$video = "/img/".$_FILES["video"]["name"];
$image_name = $_FILES["video"]["name"];

//Upload file
move_uploaded_file($_FILES["video"]["tmp_name"], $file);

//Insert data into database
$insert = "INSERT INTO listings (apartment_type, bedroom, bathroom, listing_type, price, about, city, state, thumb, image1, image2, image3, 
image4, image5, youtube, reg_date, video_dir, subtitle) VALUES('$apartment', '$bedroom', '$bathroom', '$listing_type', '$price', '$feature', '$city', '$state', '$lin'
, '$lin1', '$lin2', '$lin3', '$lin4', '$lin5', '$youtube', '$date', '$video', '$subtitle')";
mysqli_query($conn, $insert);
?>
<script>
    alert("Listing added successfully!");
    </script>
<?php
echo '<meta http-equiv="refresh" content="0, url=/siteadmin/home.php"/>';
}


//EDIT SCRIPT
if(isset($_POST["edit_list"])){
    $apartment = htmlspecialchars(addslashes($_POST["apartment_type"]));
    $bedroom = $_POST["bedroom"];
    $bathroom = $_POST["bathroom"];
    $listing_type = $_POST["listing_type"];
    $price = $_POST["price"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $feature = htmlspecialchars(addslashes($_POST["feature"]));
    $youtube = $_POST["yt"];
    $id = $_POST["id"]; 
    date_default_timezone_set("Africa/Lagos");
    $date = date('d-m-Y H:i');

//THUMB
$dir = "../img/";
$file = $dir.basename($_FILES["thumb"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$lin = "/img/".$_FILES["thumb"]["name"];
$image_name = $_FILES["thumb"]["name"];
move_uploaded_file($_FILES["thumb"]["tmp_name"], $file);

//IMAGE 1
$dir = "../img/";
$file = $dir.basename($_FILES["image1"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$lin1 = "/img/".$_FILES["image1"]["name"];
$image_name = $_FILES["image1"]["name"];
move_uploaded_file($_FILES["image1"]["tmp_name"], $file);

//IMAGE 2
$dir = "../img/";
$file = $dir.basename($_FILES["image2"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$lin2 = "/img/".$_FILES["image2"]["name"];
$image_name = $_FILES["image2"]["name"];
move_uploaded_file($_FILES["image2"]["tmp_name"], $file);

//IMAGE 3
$dir = "../img/";
$file = $dir.basename($_FILES["image3"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$lin3 = "/img/".$_FILES["image3"]["name"];
$image_name = $_FILES["image3"]["name"];
move_uploaded_file($_FILES["image3"]["tmp_name"], $file);

//IMAGE 4
$dir = "../img/";
$file = $dir.basename($_FILES["image4"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$lin4 = "/img/".$_FILES["image4"]["name"];
$image_name = $_FILES["image4"]["name"];
move_uploaded_file($_FILES["image4"]["tmp_name"], $file);

//IMAGE 5
$dir = "../img/";
$file = $dir.basename($_FILES["image5"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$lin5 = "/img/".$_FILES["image5"]["name"];
$image_name = $_FILES["image5"]["name"];
move_uploaded_file($_FILES["image5"]["tmp_name"], $file);


$update = "UPDATE listings SET apartment_type='$apartment', bedroom='$bedroom', bathroom='$bathroom', listing_type='$listing_type', price='$price'
, about='$feature', city='$city', state='$state', thumb='$lin', image1='$lin1', image2='$lin2', image3='$lin3', image4='$lin4',  image5='$lin5', 
youtube='$youtube', reg_date='$date' WHERE id='$id'";

mysqli_query($conn, $update);
?>
<script>
    alert("Listing updated successfully!");
    </script>
<?php
echo '<meta http-equiv="refresh" content="0, url=/siteadmin/home.php"/>';
}
?>