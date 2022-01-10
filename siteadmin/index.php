<?php
include $_SERVER["DOCUMENT_ROOT"]."/php/connect.php";
include $_SERVER["DOCUMENT_ROOT"]."/inc/header2.php";
?>

<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/desktop.css" type="text/css"/> 
    <meta name="author" content="Aer Info-Tech">
    <meta name="description" content="Admin Cpanel"/>
    <meta property="og:image" content="/img/logo.png">
    <link rel="icon" href="/img/logo.png">

    <script src="/js/navigation_show.js">
    </script>

    </head>

    <title>Admin Area</title>

<body>

<center>

<form action="/siteadmin/login.php" method="POST" class="register">
<h1>Admin Login</h1>
</br>
<?php
if(isset($_SESSION["admin_error"])){
?>
<div class="error-log">
    <?php echo $_SESSION["admin_error"]; ?>
</div>
<?php    
}
?>
</br>


<!-- Username field-->
<div class="input-group">
    <div class="input-header">Username<span class="asterisk">*</span></div>
    <input type="text" name="username" placeholder="AdminAccount" required="required"/>
</div>

<!-- Password field-->
<div class="input-group">
    <div class="input-header">Password <span class="asterisk">*</span></div>
    <input type="password" name="password" placeholder="Johndoe2021" minlength="6" required="required"/>
</div>

<input type="submit" name="adminlogin" class="butt" value="Login"/>

</br></br>

</form>
</center>
</body>
</html>
