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

if(isset($_POST["post"])){
    $name = $_POST["title"];
    $title = addslashes($name);
    $about = $_POST["article"];
    $about = addslashes($about);
    $about = htmlspecialchars($about);
    $youtube = $_POST["yt"];
    $subtitle = htmlspecialchars(addslashes($_POST["subtitle"]));

    date_default_timezone_set("Africa/Lagos");
    $date = date('d-m-Y H:i');

$sql = "SELECT * FROM blog WHERE title='$title' OR article='$about'";

if(mysqli_num_rows(mysqli_query($conn, $sql)) < 1){
    //Image variable declaration for thumbnail
$dir = "../img/";
$file = $dir.basename($_FILES["thumb"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$lin = "/img/".$_FILES["thumb"]["name"];
$image_name = $_FILES["thumb"]["name"];

//Upload file
move_uploaded_file($_FILES["thumb"]["tmp_name"], $file);


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
$insert = "INSERT INTO blog (title, article, thumb, youtube, reg_date, video_dir, subtitle) VALUES('$title', '$about', '$lin', '$youtube', '$date', '$video', '$subtitle')";
mysqli_query($conn, $insert);
?>
<script>
    alert("Article uploaded successfully!");
    </script>
<?php
}
else {
?>
<script>
    alert("Article already exists!");
    </script>
<?php
}
echo '<meta http-equiv="refresh" content="0, url=/siteadmin/home.php"/>';
}

//UPDATE

if(isset($_POST["update"])){
    $name = $_POST["title"];
    $title = addslashes($name);
    $about = $_POST["article"];
    $about = addslashes($about);
    $about = htmlspecialchars($about);
    $youtube = $_POST["yt"];
    $id = $_POST["id"];
    date_default_timezone_set("Africa/Lagos");
    $date = date('d-m-Y H:i');

    //Image variable declaration for thumbnail
$dir = "../img/";
$file = $dir.basename($_FILES["thumb"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$lin = "/img/".$_FILES["thumb"]["name"];
$image_name = $_FILES["thumb"]["name"];

//Upload file
move_uploaded_file($_FILES["thumb"]["tmp_name"], $file);


$update = "UPDATE blog SET title='$name', article='$about', thumb='$lin', youtube='$youtube', reg_date='$date' WHERE id='$id'";
mysqli_query($conn, $update);
?>
<script>
    alert("Article updated successfully!");
    </script>
<?php
echo '<meta http-equiv="refresh" content="0, url=/siteadmin/home.php"/>';
}
?>