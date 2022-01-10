<div class="admin-button-small">
    <button onclick="estate_post_show()">Add listing</button>
</div>

<form action="/siteadmin/estate_post.php" method="POST" id="estate-post" class="float" enctype="multipart/form-data">

<div class="input-field-1">
    <input type="text" name="apartment_type" placeholder="Apartment Type (2 Bedroom Apartment)" required="required"/>
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
    <input type="number" name="price" placeholder="Price (without NGN eg. 100000)" required="required" min="10000"/>
</div>

<div class="input-field-1">
    <input type="text" name="city" placeholder="City (eg. Ikeja)" required="required"/>
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
eiusmod tempor incididunt ut labore et dolor..." rows="10" required="required"></textarea>

<div class="input-field-1">
    <b>YouTube Link</b>
    <input type="text" name="yt" placeholder="YouTube Link" value="https://" required="required"/>
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
</br>
Video : <input type="file" name="video" id="video"/>
</div>


</br> 

<div class="input-field-1">
    <input type="text" name="subtitle" placeholder="Video Subtitle" />
</div>

</br>

<input type="submit" class="button-blog" name="list" value="Add Listing"/>
</form>

<!-- Manage Posts-->
</br>
<div class="admin-button-small">
    <button onclick="estate_manage_show()">Manage Listings</button>
</div>

<div class="manage-post" id="manage-estate">
<?php
$sng = "SELECT * FROM listings  ORDER BY id DESC";
$res = mysqli_query($conn, $sng);

echo '</br><div class="scroll"><table style="width:100%;">';
echo '<tr></tr>';

while($sub = mysqli_fetch_array($res)){

    echo '<tr><td class="title">'.$sub["apartment_type"].'</td>';
    echo '<td> <a href="edit.php?id='.$sub["id"].'" class="action">Edit</a></td>';
    echo '<td> <a href="delete_list.php?id='.$sub["id"].'" class="action">Delete</a></td></tr>';

}
echo '</table></div></br>';
?>
</div>