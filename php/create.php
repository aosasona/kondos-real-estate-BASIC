<?php
include $_SERVER["DOCUMENT_ROOT"]."/php/connect.php";
?>

<?php
//USERS TABLE
$listing = "CREATE TABLE IF NOT EXISTS listings (
    id INT(255) AUTO_INCREMENT PRIMARY KEY,
    apartment_type VARCHAR(600) NOT NULL,
    bedroom VARCHAR(600) NOT NULL,
    bathroom VARCHAR(600) NOT NULL,
    listing_type VARCHAR(600) NOT NULL,
    price VARCHAR(600) NOT NULL,
    about TEXT NOT NULL,
    city VARCHAR(600) NOT NULL,
    state VARCHAR(600) NOT NULL,
    thumb VARCHAR(600) NOT NULL,
    image1 VARCHAR(600),
    image2 VARCHAR(600),
    image3 VARCHAR(600),
    image4 VARCHAR(600),
    image5 VARCHAR(600),
    youtube VARCHAR(800),
    reg_date VARCHAR(200) NOT NULL)";

mysqli_query($conn, $listing);

if(!mysqli_query($conn, $listing)){
    die(mysqli_error($conn));
}

//BLOG TABLE
$blog = "CREATE TABLE IF NOT EXISTS blog (
    id INT(255) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(600) NOT NULL,
    article VARCHAR(700) NOT NULL,
    thumb VARCHAR(500) NOT NULL,
    youtube VARCHAR(800) NOT NULL,
    reg_date VARCHAR(200) NOT NULL)";

mysqli_query($conn, $blog);

if(!mysqli_query($conn, $blog)){
    die(mysqli_error($conn));
}

//ADMIN TABLE
$admin = "CREATE TABLE IF NOT EXISTS `admin` (
    `id` INT(255) AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(600) NOT NULL,
    `password` VARCHAR(700) NOT NULL)";

mysqli_query($conn, $admin);

if(!mysqli_query($conn, $admin)){
    die(mysqli_error($conn));
}

$comment = "CREATE TABLE IF NOT EXISTS comment(
    id INT(255) AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(255) NOT NULL,
    comment TEXT NOT NULL,
    article_id VARCHAR(255) NOT NULL,
    updated VARCHAR(255) NOT NULL)";

mysqli_query($conn, $comment);

if(!mysqli_query($conn, $comment)){
    die(mysqli_error($conn));
}

//LOG TABLE
$log = "CREATE TABLE IF NOT EXISTS `log` (
    `id` INT(255) AUTO_INCREMENT PRIMARY KEY,
    `ip` VARCHAR(600) NOT NULL,
    `reg_date` VARCHAR(700) NOT NULL)";

mysqli_query($conn, $log);

if(!mysqli_query($conn, $admin)){
    die(mysqli_error($log));
}

//ADD VIDEO TABLE TO LISTING TABLE

$video = "ALTER TABLE listings ADD video_dir TEXT";

mysqli_query($conn, $video);

//ADD VIDEO TABLE TO ARTICLES TABLE

$video = "ALTER TABLE blog ADD video_dir TEXT";

mysqli_query($conn, $video);


//ADD SUBTITLE TABLE TO ARTICLES TABLE

$subtitle = "ALTER TABLE blog ADD subtitle TEXT";

mysqli_query($conn, $subtitle);

//ADD SUBTITLE TABLE TO LISTING TABLE

$sub_list = "ALTER TABLE listings ADD subtitle TEXT";

mysqli_query($conn, $sub_list);
?>