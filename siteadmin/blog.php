<div class="admin-button-small">
    <button onclick="blog_post_show()">Create New Post +</button>
</div>

<form action="/siteadmin/blog_post.php" method="POST" id="blog-post" class="float" enctype="multipart/form-data">

<div class="input-field-1">
    <input type="text" name="title" placeholder="Title (eg. Lorem Ipsum...)" required="required"/>
</div>


<textarea name="article" class="article-body" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolor..." rows="8"></textarea>

<div class="input-field-1">
    <input type="text" name="yt" placeholder="YouTube Link" value="https://" required="required"/>
</div>
</br>

<div class="show"> 
<input type="file" name="video" id="video"/>
</div>

</br>

<div class="input-field-1">
    <input type="text" name="subtitle" placeholder="Video Subtitle" />
</div>

</br>

<label for="thumb" class="thumb">
    <input type="file" name="thumb" id="thumb" required="required"/>
    <img src="/img/uploadimg.png" class="upload"/>
</label>
</br>
</br>
<input type="submit" class="button-blog" name="post" value="Post"/>
</form>

<!-- Manage Posts-->
</br>
<div class="admin-button-small">
    <button onclick="blog_manage_show()">Manage posts</button>
</div>

<div class="manage-post" id="manage-post">
<?php
$sng = "SELECT * FROM blog  ORDER BY id DESC";
$res = mysqli_query($conn, $sng);

echo '</br><div class="scroll"><table style="width:100%;">';
echo '<tr></tr>';

while($sub = mysqli_fetch_array($res)){

    echo '<tr><td class="title">'.$sub["title"].'</td>';
    echo '<td> <a href="edit_blog.php?id='.$sub["id"].'" class="action">Edit</a></td>';
    echo '<td> <a href="delete.php?id='.$sub["id"].'" class="action">Delete</a></td></tr>';

}
echo '</table></div></br>';
?>
</div>