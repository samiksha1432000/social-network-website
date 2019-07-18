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
    <meta charset="utf-8">
    <title>My Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/home_style2.css">
  </head>
<body>
  <div class="row">
    <div class="col-sm-12">
      <center>
        <h2>
          Your Latest Posts
        </h2>
      </center>
      <?php user_posts(); ?>
    </div>
  </div>
</body>
</html>