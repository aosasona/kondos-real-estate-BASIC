<?php
include $_SERVER["DOCUMENT_ROOT"]."/php/connect.php";
include $_SERVER["DOCUMENT_ROOT"]."/inc/header2.php";


?>


<?php
$id = $_GET["article_id"];
$sql = "SELECT * FROM blog WHERE id='$id'";
$result = mysqli_query($conn, $sql);

while($data = mysqli_fetch_array($result)){
$tit = $data["title"];
$key = explode(" ", $tit);
$keyword = implode(", ", $key);

echo '<head>';
echo '<meta name="description" content="'.$data["article"].'">';
echo '<meta name="keywords" content="'.$keyword.'">';
echo '</head>';
echo '<title>'.$data["title"].'</title>';
}
?>
    </head>

    <body>
<?php
$id = $_GET["article_id"];
$sql = "SELECT * FROM blog WHERE id='$id'";
$result = mysqli_query($conn, $sql);

while($data = mysqli_fetch_array($result)){
    echo '<h2 class="article"><b>'.$data["title"].'</b></h2>';
    echo '<div class="small">Posted on '.$data["reg_date"].'</div></br>';
    echo '<center><img src="'.$data["thumb"].'" class="articleimg"/>';
    echo '<div class="article-body">';
    echo '&nbsp;&nbsp;&nbsp;';
    echo nl2br($data["article"]);
    if($data["youtube"] != NULL AND $data["youtube"] != ""  AND $data["youtube"] != "https://"){
        echo '</br></br>Check out the attached video here : <a href="'.$data["youtube"].'">'.$data["youtube"].'</a>';
    }
    if($data["video_dir"] != "/img/" && $data["video_dir"] != NULL){
?>
</br>
<video width="320" height="240" controls>
    <source src=<?php echo '"'.$data["video_dir"].'"'; ?> type="video/mp4">
</video>

</br></br>

<div class="subtitle"><?php echo ucfirst($data["subtitle"]); ?></div>

<?php
    }
    echo '</div>';
}
    ?>
        </br></br>
</center>
<div class="comm">
    <h4>Your Comment</h4></br>
<form action="/blog/query.php" method="POST">
<input type="hidden" name="id" value=<?php echo '"'.$_GET["article_id"].'"'; ?>/>
<div class="input-group">
<input type="text" name="user" placeholder="Name"/>
</div>
<textarea  rows="6" name="text" required="required" placeholder="Your comment..."></textarea></br>
<input type="submit" name="comment" class="butt" value="POST"/>
</form></div>

<div class="comarea">
<?php

$com = "SELECT * FROM comment WHERE article_id='$id'";
$comres = mysqli_query($conn, $com);
echo "</br><h3>Comments</h3>";
if(mysqli_num_rows($comres) < 1){
    echo "<center><small>No comments on this post yet!</small></center>";
}
else {
    while($fetch = mysqli_fetch_array($comres)){
    echo '<center><div class="comment">';
    echo "<i>".$fetch["user"]."</i></br>";
    echo "<b>".nl2br($fetch["comment"])."</b></br>";
    echo '<div class="date">'.$fetch["updated"].'</div>';
    echo '</div></center></br>';
    }
}
?>
</div>

    </body>
</html>

<?php
include $_SERVER["DOCUMENT_ROOT"]."/inc/footer.php";
?>