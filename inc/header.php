<!DOCTYPE html>
<html>
<head>
    <style>
        <?php
        include $_SERVER["DOCUMENT_ROOT"]."/css/mobile.css";
        include $_SERVER["DOCUMENT_ROOT"]."/css/desktop.css";
        ?>
        </style>
<meta name="author" content="Ayodeji Osasona"/>
<meta name="keywords" content="condos, nigeria, real estate, real, estate, condosNG"/>
<meta name="description" content="Let us help you get your dream home!"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta property="og:image" content="/img/logo.png">
<link rel="icon" href="/img/logo.png">

<script src="/js/nav.js"></script>
</head>

<body id="home">
    <center>
<div class="top">
<div class="header-fixed">
<a onclick="shownav()" class="nav"><img src="/img/nav2.png" class="nav-button"/></a>
<center>
<img src="/img/condos-header.png" class="head-img"/>
</center>
</div>

<div class="nav-menu" id="nav-menu">
<a onclick="shownav()" class="close">&larr;</a>
<a href="/index.php" class="link">Home</a>
<a href="/listings" class="link">Listings</a>
<a href="/blog" class="link">Blog</a>
<a href="/about-us" class="link">About Us</a>
<a href="/contact-us" class="link">Contact Us</a>
</div>

</br>
<div class="pitch">
    Build your dream home anywhere in Nigeria!
</div>

<form action="/listing-search.php" method="GET">
Where would you like to live ?
<div class="select">
    <select name="state">
        <option value="Abuja" selected>Abuja</option>
        <option value="Lagos">Lagos</option>
        <option value="Ogun">Ogun</option>
        <option value="Oyo">Oyo</option>
</select>
</div>

<div class="select-small">
    <select name="min">
        <option value="0" selected>Min. Cost (None)</option>
        <option value="100000">N100,000</option>
        <option value="200000">N200,000</option>
        <option value="500000">N500,000</option>
        <option value="1000000">N1,000,000</option>
        <option value="2000000">N2,000,000</option>
        <option value="5000000">N5,000,000</option>
</select>
<select name="max">
        <option value="100000000" selected>Max. Cost (None)</option>
        <option value="500000">N500,000</option>
        <option value="1000000">N1,000,000</option>
        <option value="2000000">N2,000,000</option>
        <option value="5000000">N5,000,000</option>
        <option value="10000000">N10,000,000</option>
        <option value="20000000">N20,000,000</option>
</select>
</div>

<input type="submit" name="search" class="searchbtn" value="Show Listings"/>
</form>
</div>

</center>
</body>
</html>