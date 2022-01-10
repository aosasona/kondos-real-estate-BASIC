<?php
include $_SERVER["DOCUMENT_ROOT"]."/php/connect.php";
include $_SERVER["DOCUMENT_ROOT"]."/inc/header.php";
include $_SERVER["DOCUMENT_ROOT"]."/inc/log.php";
?>

<html>
<head>
<title>Kondos NG</title>
</head>

<body>

<center>

</br>
<div class="mainpage">
Get good value for your money. Check out some of our recent listings below.
</div>


<div class="section1">
    <?php include $_SERVER["DOCUMENT_ROOT"]."/inc/listings.php"; ?>
</div>
</br>

<a href="/listings" class="mail">View All Listings</a>

</br></br></br></br>
<div class="mainpage">
Learn more about real estate investment choices in Nigeria. Check out our recent articles below to help you make the right decision.
</div>



<div class="section1">
    <?php include $_SERVER["DOCUMENT_ROOT"]."/inc/blog.php"; ?>
</div>
</br>

<a href="/blog" class="mail">View All Articles</a>

</br></br>
</center>

</body>

<?php include $_SERVER["DOCUMENT_ROOT"]."/inc/footer.php"; ?>

</html>