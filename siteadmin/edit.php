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


$sng = "SELECT * FROM listings WHERE id='$id'";
$res = mysqli_query($conn, $sng);
while($sub = mysqli_fetch_array($res)){
?>

<form action="/siteadmin/estate_post.php" method="POST" id="estate-post" enctype="multipart/form-data">
<input type="hidden" name="id" value=<?php echo '"'.$sub["id"].'"'; ?>/>
<div class="input-field-1">
    <input type="text" name="apartment_type" placeholder="Apartment Type (2 Bedroom Apartment)" required="required" 
    value=<?php echo '"'.$sub["apartment_type"].'"'; ?>/>
</div>


<div class="select-small">
    <select name="bedroom" required="required">
        <option selected>Bedrooms</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
</select>
<select name="bathroom" required="required">
        <option selected>Bathrooms</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
</select>
</div>
</br>
Listing Type
<div class="select">
    <select name="listing_type" required="required">
        <option value="Rent" selected>Rent</option>
        <option value="Shortlet">Shortlet</option>
        <option value="Sale">Sale</option>
        <option value="Land Sale">Land</option>
        <option value="Commercial">Commercial</option>
        <option value="Industrial">Industrial</option>
</select>
</div>
</br>

<div class="input-field-1">
    <input type="number" name="price" placeholder="Price (without NGN eg. 100000)" required="required" min="10000" value=<?php echo '"'.$sub["price"].'"'; ?>/>
</div>

<div class="input-field-1">
    <input type="text" name="city" placeholder="City (eg. Ikeja)" required="required" value=<?php echo '"'.$sub["city"].'"'; ?>/>
</div>

State
<div class="select">
    <select name="state" required="required">
        <option value="Abuja" selected>Abuja</option>
        <option value="Lagos">Lagos</option>
        <option value="Ogun">Ogun</option>
        <option value="Oyo">Oyo</option>
</select>
</div></br>

<textarea name="feature" class="article-body" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
eiusmod tempor incididunt ut labore et dolor..." rows="10" required="required"><?php echo $sub["about"]; ?></textarea>

<div class="input-field-1">
    <b>YouTube Link</b>
    <input type="text" name="yt" placeholder="YouTube Link" value="https://" required="required" value=<?php echo '"'.$sub["youtube"].'"'; ?>/>
</div>
</br>

<div class="show">
Image 1: <input type="file" name="thumb" id="thumb" required="required"/>
</br>
Image 2 : <input type="file" name="image1" id="image1" required="required"/>
</br>
Image 3 : <input type="file" name="image2" id="image2"/>
</br>
Image 4 : <input type="file" name="image3" id="image3"/>
</br>
Image 5 : <input type="file" name="image4" id="image4"/>
</br>
Image 6 : <input type="file" name="image5" id="image5"/>
</div>

</br>
<input type="submit" class="butt" name="edit_list" value="Update Listing"/>
</form>

<?php
}
?>