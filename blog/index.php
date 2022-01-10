<?php
include $_SERVER["DOCUMENT_ROOT"]."/inc/header.php";
include $_SERVER["DOCUMENT_ROOT"]."/php/connect.php";
?>

<html>
<head>
<title>Blog</title>
</head>

<body>

<center>
</br>
<h1>Blog</h1>
</br>

<div class="grid">
<?php

$listing_sql = "SELECT * FROM blog ORDER BY id desc";
$listing_sql_query = mysqli_query($conn, $listing_sql);

if(mysqli_num_rows($listing_sql_query) < 1){
    echo "<small>No articles</small>";
}
while($listing_fetch = mysqli_fetch_array($listing_sql_query)){
    $id = $listing_fetch["id"];
    $thumb = $listing_fetch["thumb"];
    $name = ucfirst($listing_fetch["title"]);
    $reg_date = $listing_fetch["reg_date"];
    $body = substr($listing_fetch["article"], 0, 80);
?>
<div class="card">
    <img src=<?php echo '"'.$thumb.'"'; ?>/>
    <a href=<?php echo '"/blog/article.php?article_id='.$id.'"'; ?>><?php echo $name; ?></a>
    <div class="text">
        <?php echo nl2br($body).'...'; ?>
</div>
    <div class="location">
    <?php echo strtoupper($reg_date); ?>
</div>
</div>
<?php
}
?>
</div>

</center>

</body>

<?php include $_SERVER["DOCUMENT_ROOT"]."/inc/footer.php"; ?>

</html>