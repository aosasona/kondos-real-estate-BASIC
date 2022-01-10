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
?>

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


    <script src="/js/blog_show.js"></script>


    </head>

    <title>Admin cPanel - Home</title>

<body>

<center>
</br>
<h1>Admin cPanel</h1>
</br>

<!--Blog Post-->
<div class="admin-button">
    <button onclick="blog_show()">&#x270d; Blog Management</button>
</div>
<div class="blog-management" id="blog-management">
<?php include $_SERVER["DOCUMENT_ROOT"]."/siteadmin/blog.php"; ?>
</div>

</br>

<!--Blog Post-->
<div class="admin-button">
    <button onclick="estate_show()">&#x1F4DD; Listings Management</button>
</div>
<div class="estate-management" id="estate">
<?php include $_SERVER["DOCUMENT_ROOT"]."/siteadmin/estate.php"; ?>
</div>

</br></br></br>
<?php
$vis = "SELECT * FROM `log`";
$visit = mysqli_query($conn, $vis);

  echo "<b><small>Unique site visits : ".number_format(mysqli_num_rows($visit));
  $vis2 = "SELECT * FROM `log` ORDER BY id DESC LIMIT 1";
  $visit2 = mysqli_query($conn, $vis2);

while($log = mysqli_fetch_array($visit2)){
  echo "</br>Last visit : ".$log["reg_date"]."</small></b>";
}

?>

</center>
</body></html>