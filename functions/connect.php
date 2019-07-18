<?php
$con=mysqli_connect("localhost","root","samiksha","social_network");
function insertPost(){
  if(isset($_POST['sub'])){
    global $con;
    global $user_id;
    $content=htmlentities($_POST['content']);
    $upload_image=$_FILES['upload_image']['name'];
    $img_tmp=$_FILES['upload_image']['tmp_name'];
    $random_number=rand(1,100);
  }
}
 ?>
