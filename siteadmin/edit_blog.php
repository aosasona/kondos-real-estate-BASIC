<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/admin.css" type="text/css"/> 
    <link rel="stylesheet" href="/css/desktop.css" type="text/css"/>
    <link rel="stylesheet" href="/css/mobile.css" type="text/css"/> 
    <meta name="author" content="Aer Info-Tech">
    <meta name="description" content="Cpanel Home"/>
    <meta property="og:image" content="/img/logo.png">
    <link rel="icon" href="/img/logo.png">


    <style>
        form {
            background : #ccc;
            padding : 10px;
            width : 90%;
        }
</style>

    </head>

    <title>Admin cPanel - Edit</title>

<body>

<center>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/php/connect.php";
include $_SERVER["DOCUMENT_ROOT"]."/inc/header2.php";


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

$id = $_GET["id"];


$sng = "SELECT * FROM blog WHERE id='$id'";
$res = mysqli_query($conn, $sng);
while($sub = mysqli_fetch_array($res)){
?>

<form action="/siteadmin/blog_post.php" method="POST" id="blog-post" enctype="multipart/form-data">
<input type="hidden" name="id" value=<?php echo '"'.$sub["id"].'"'; ?>/>

<div class="input-field-1">
    <input type="text" name="title" placeholder="Title (eg. Lorem Ipsum...)" required="required" value=<?php echo '"'.$sub["title"].'"'; ?>/>
</div>


<textarea name="article" class="article-body" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit,
 sed do eiusmod tempor incididunt ut labore et dolor..." rows="8"><?php echo $sub["article"]; ?></textarea>

<div class="input-field-1">
    <input type="text" name="yt" placeholder="YouTube Link" value="https://" required="required" value=<?php echo '"'.$sub["youtube"].'"'; ?>/>
</div>
</br>

<label for="thumb" class="thumb">
    <input type="file" name="thumb" id="thumb" required="required"/>
    <img src="/img/uploadimg.png" class="upload"/>
</label>
</br>
</br>
<input type="submit" class="butt" name="update" value="Save Changes"/>
</form>

<?php
}
?>