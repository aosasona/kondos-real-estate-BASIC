<?php
ob_start();
include $_SERVER["DOCUMENT_ROOT"]."/php/connect.php";

if(isset($_POST["adminlogin"])){
    $usermail = strtolower($_POST["username"]);
    $password = $_POST["password"];

    $chk = "SELECT * FROM admin WHERE username='$usermail'";
    $chk_query = mysqli_query($conn, $chk);

    if(mysqli_num_rows($chk_query) > 0){
        while($userdata = mysqli_fetch_array($chk_query)){
            $userpass = $userdata["password"];

            $_SESSION["admin"] = $usermail;
            

            if($password == $userpass){

                setcookie("admin", $usermail, time() + (3600*24*7), "/");

                session_destroy();

                header('location: /siteadmin/home.php');
                exit;
            }
            else {
                $_SESSION["admin_error"] = "Password is incorrect, please try again.";
                header('location: /siteadmin');
                exit;
            }
      
        }
    }
    else {
        $_SESSION["admin_error"] = "User not found, check your username and try again.";
        header('location: /siteadmin');
        exit;
    }
}
?>