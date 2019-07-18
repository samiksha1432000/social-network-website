<!DOCTYPE html>
<html>
<head>
  <title> facebook</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style>
body{
  overflow-x:hidden;
}
#centred1{
  position:absolute;
  font-size: 10px;
  top: 30%;
  left: 30%;
  transform: translate(-50%,-50%);

}
#centred2{
  position:absolute;
  font-size: 10px;
  top: 50%;
  left: 35%;
  transform: translate(-50%,-50%);

}
#centred3{
  position:absolute;
  font-size: 10px;
  top: 70%;
  left: 30%;
  transform: translate(-50%,-50%);

}
#signup{
  width: 60%;
  border-radius:30px;
}


#login{
  width: 60%;
  background-color: #fff;
  border: 1px solid #1da1f2;
  color:#1da1f2;
  border-radius: 30px;
}
#login:hover{
  width: 60%;
  background-color: #fff;
  border: 2px solid #1da1f2;
  color:#1da1f2;
  border-radius: 30px;
}
.well{
  background-color: #187FAB;
}
</style>
<body>
  <div class="row">
    <div class="col-sm-12">
      <div class="well">
        <center><h1 style="color:white">Facebook</h1></center>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6" style="left:0.5%;">
      <img src="images/facebook.jpeg "  class="img-rounded" title="facebook" width="550px" height="565px">
      <div id="centred1" class="centered"><h3 style ="color:white;"><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp<i>Follow Your Intrest</i></h3></div>
      <div id="centred2" class="centered"><h3 style ="color:white;"><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp<i>What People Are Talking About </i></h3></div>
      <div id="centred3" class="centered"><h3 style ="color:white;"><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp<i>Join The Conversation</i></h3></div>
</div>
<div class="col-sm-6"style="left:8%;" >
    <img src="images/facebook.png "  class="img-rounded" title="facebook" width="80px" height="80px">
    <h2><i>See what's happening in <br>the world right now</i></h2><br><br>
    <h4><i>Join Facebook today</i></h4>
    <form method="post" action"">
      <button id="signup" class="btn btn-info btn-large" name="signup">Sign up</button><br><br>
      <?php
      if(isset($_POST['signup'])){
        echo "<script>window.open('signup.php','_self')</script>";
      }
       ?>
      <button id="login" class="btn btn-info btn-large" name="login">Log in</button><br><br>
      <?php
      if(isset($_POST['login'])){
        echo "<script>window.open('signin.php','_self')</script>";
      }
       ?>
    </form>
</div>
  </div>
</body>
</html>
