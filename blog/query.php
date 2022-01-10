<?php

include $_SERVER["DOCUMENT_ROOT"]."/php/connect.php";

error_reporting(-1);


if(isset($_POST["comment"])){

        $user = $_POST["user"];
        $com = $_POST["text"];
        $com = addslashes($com);
        $com = htmlspecialchars($com);
        $article_id = $_POST["id"];
        $none1 = "/blog/article.php?article_id=".$article_id;

date_default_timezone_set("Africa/Lagos");
$date = date("d-m-Y G:i");

$insert = "INSERT INTO comment(user, comment, article_id, updated) VALUES('$user', '$com', '$article_id', '$date')";
mysqli_query($conn, $insert);

echo '<meta http-equiv="refresh" content="0, url='.$none1.'">';

    }
?>