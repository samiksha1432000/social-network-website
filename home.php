<!DOCTYPE html>
<?php
session_start();
include("header.php");
if(!isset($_SESSION['user_email'])){
  header("location:index.php");
}
 ?>
<html lang="en" dir="ltr">
  <head>
    <?php
    $user=$_SESSION['user_email'];
    $get_user="select * from users where user_email='$user'";
    $run_user=mysqli_query($con,$get_user);
    $row=mysqli_fetch_array($run_user);
    $user_name=$row['user_name'];
     ?>
    <meta charset="utf-8">
    <title><?php echo "$user_name"; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/home_style2.css">
  </head>
  <style>
    #f{
      margin-top: 3%;
    }
    #upload_image_button{
      margin-top: 1.6%;
    }
  </style>
<body>
  <div class="row">
    <div id="insert_post" class="col-sm-12">
      <center>
      <form id="f" action="home.php?id=<?php echo $user_id;?>" method="post" enctype="multipart/form-data">
        <textarea class="form-control" id="content" name="content" rows="4" placeholder="What's in your mind"></textarea><br>
        <label class="btn btn-warning" id="upload_image_button">Select Image
          <input type="file" name="upload_image" size="30 ">
        </label>
        <button id="btn-post" name="sub" class="btn btn-success">Post</button>
      </form>
      <?php insertPost(); ?>
    </center>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <center><h2><strong><i>News Feed</i></strong></h2><br></center>
      <?php echo get_posts(); ?>
    </div>
  </div>
</body>
</html>
