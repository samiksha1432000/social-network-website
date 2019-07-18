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
    <title>Messages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/home_style2.css">
  </head>
  <style >
  #scroll_messages{
    max-height:500px;
    overflow: scroll;
  }
    #btn-msg{
      width:20%;
      height:28px;
      border-radius:5px;
      margin :5px;
      border:none;
      color:#fff;
      float:right;
      background-color: rgba(35, 68, 102,0.9);
    }
    #select_user{
      max-height:500px;
      overflow: scroll;
    }
    #green{
      background-color: rgba(72, 135, 199,0.4);
      border-color: #27aa60;
      width:45%;
      padding:2.5px;
      font-size: 19px;
      font-family: cursive;
      border-radius: 3px;
      float: left;
      margin-bottom: 5px;
    }
    #blue{
      background-color:rgba(138, 147, 156,0.4);
      border-color: 5px solid #2980b9;
      width:45%;
      padding:2.5px;
      font-size: 19px;
      font-family: cursive;
      border-radius: 5px;
      float: right;
      margin-bottom: 5px;
    }
  </style>
<body>
  <div class="row">
  <?php
  if(isset($_GET['u_id'])){
    global $con;
    $get_id=$_GET['u_id'];
    $get_user="select * from users where user_id='$get_id'";
    $run_user=mysqli_query($con,$get_user);
    $row_user=mysqli_fetch_array($run_user);
    $user_to_msg=$row_user['user_id'];
    $user_to_name=$row_user['user_name'];
  }
  $user=$_SESSION['user_email'];
  $get_user="select * from users where user_email='$user'";
  $run_user=mysqli_query($con,$get_user);
  $row=mysqli_fetch_array($run_user);
  $user_from_msg=$row['user_id'];
  $user_from_name=$row['user_name'];
   ?>
   <div class="col-sm-3" id="select_user">
      <?php
      $user="select * from users";
      $run_user=mysqli_query($con,$user);
      while($row_user=mysqli_fetch_array($run_user)){
        $user_id=$row_user['user_id'];
        $first_name=$row_user['f_name'];
        $last_name=$row_user['l_name'];
        $user_name=$row_user['user_name'];
        $user_image=$row_user['user_image'];
        echo "
        <div style='margin-top:18%;' class='container-fluid'>
        <a style='text-decoration:none;cursor:pointer;color:#3897f0;' href='messages.php?u_id=$user_id'>
          <img class='img-circle' src='users/$user_image' width='90' height='80' title='$user_name'><strong>
          &nbsp $first_name $last_name</strong><br><br>
          </a>
          </div>
        ";
      }
       ?>
   </div>
   <div style="margin-top:10%;" class="col-sm-6" >
     <div class="load_msg" id="scroll_messages">
       <?php
       $sel_msg="select * from user_messages where (user_to='$user_to_msg' AND user_from='$user_from_msg') OR (user_from='$user_to_msg' AND user_to='$user_from_msg') ORDER by 1 ASC";
       $run_msg=mysqli_query($con,$sel_msg);
       while($row_msg=mysqli_fetch_array($run_msg)){
         $user_to=$row_msg['user_to'];
         $user_from=$row_msg['user_from'];
         $msg_body=$row_msg['msg_body'];
         $msg_date=$row_msg['date'];
        ?>
        <div id="loaded_msg">
          <p>
            <?php
            if($user_to==$user_to_msg AND $user_from==$user_from_msg){
              echo "<div class='message' id='blue' data-toggle='tooltip' title='$msg_date'>$msg_body </div><br><br><br>";
            }
            else if($user_from==$user_to_msg AND $user_to==$user_from_msg){
              echo "<div class='message' id='green' data-toggle='tooltip' title='$msg_date'>$msg_body </div><br><br><br>";
            }
             ?>
          </p>
        </div>
        <?php
      }
         ?>
     </div>
     <?php
     if(isset($_GET['u_id'])){
       $u_id=$_GET['u_id'];
       if($u_id=="new"){
         echo '
         <form style="margin-top:10%;">
         <center>
         <h3>
         Select someone to start conversation
         </h3>
         </center>
         <textarea disabled class="form-control" placeholder="Type here..."></textarea><br>
         <input type="submit" value="Send" class="btn btn-primary" disabled>
         </form><br><br>
         ';
       }
       else{
         echo'
         <form action="" method="POST" style="margin-top:10%;">
         <textarea  class="form-control" placeholder="Type here..." name="msg_box" id="message_textarea"></textarea><br>
         <input type="submit" value="Send" name="send_msg" id="btn-msg">
         </form><br><br>
         ';
       }
     }
      ?>
      <?php
      if(isset($_POST['send_msg'])){
        $msg=htmlentities($_POST['msg_box']);
        if($msg==""){
          echo "<h4 style='color:red;text-align:center;'>Message was unable to send!</h4>";
        }
        else if(strlen($msg)>150){
          echo "<h4 style='color:red;text-align:center;'>Message is too long! Use only 100 characters</h4>";
        }
        else{
          $insert="insert into user_messages(user_to ,user_from,msg_body,date,msg_seen) values('$user_to_msg','$user_from_msg','$msg',NOW(),'no')";
          $run_insert=mysqli_query($con,$insert);
        }
      }
       ?>
   </div>
   <div class="col-sm-3">
     <?php
     if(isset($_GET['u_id'])){
       global $con;
       $get_id=$_GET['u_id'];
       $get_user="select * from users where user_id='$get_id'";
       $run_user=mysqli_query($con,$get_user);
       $row=mysqli_fetch_array($run_user);

       $user_id=$row['user_id'];
       $f_name=$row['f_name'];
       $describe_user=$row['describ_user'];
       $gender=$row['user_gender'];
       $user_country=$row['user_country'];
       $l_name=$row['l_name'];
       $user_name=$row['user_name'];
       $user_image=$row['user_image'];
       $register_date=$row['user_reg_date'];
      }
      if($get_id=="new"){

      }
      else{
        echo" <div class='row'>
          <div class='col-sm-2'>
          </div>
          <center>
            <div style='background-color:#e6e6e6; margin-top:10%;' class='col-sm-9 '>
              <h2>Information About</h2>
              <img src='users/$user_image' class='img-circle' width='150px' height='150px'><br><br>
              <ul class='list-group'>
                <li class='list-group-item' title='Username'><strong>$f_name $l_name</strong></li>
                <li class='list-group-item' title='User Status'><strong style='color:grey;'>$describ_user</strong></li>
                <li class='list-group-item' title='Gender'><strong>$user_gender</strong></li>
                <li class='list-group-item' title='Country'><strong>$user_country</strong></li>
                <li class='list-group-item' title='User Registration Date'><strong>$register_date</strong></li>
              </ul>
            </div>
            <div class='col-sm-1'>
            </div>
            </div>
            ";
          }
          ?>
   </div>
  </div>
  <script>
    var div=document.getElementById("scroll_messages");
    div.scrollTop=div.scrollHeight;
  </script>
</body>
</html>
