<?php
include("includes/connect.php");
include("functions/functions.php");
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
      <?php
      $user=$_SESSION['user_email'];
      $get_user="select * from users where user_email='$user'";
      $run_user=mysqli_query($con,$get_user);
      $row=mysqli_fetch_array($run_user);
      $user_id=$row['user_id'];
      $user_name=$row['user_name'];
      $first_name=$row['f_name'];
      $last_name=$row['l_name'];
      $describ_user=$row['describ_user'];
      $relationship_status=$row['relationship'];
      $user_pass=$row['user_pass'];
      $user_email=$row['user_email'];
      $user_country=$row['user_country'];
      $user_gender=$row['user_gender'];
      $user_birthday=$row['user_birthday'];
      $user_image =$row['user_image'];
      $user_cover =$row['user_cover'];
      $recovery_account=$row['recovery_account'];
      $register_date=$row['user_reg_date'];
      $user_to_msg=$row['user_id'];
      $user_to_name=$row['user_name'];
      $user_from_msg=$row['user_id'];
      $user_posts="select * from posts where user_id='$user_id'";
      $run_posts=mysqli_query($con,$user_posts);
      $posts=mysqli_num_rows($run_posts);
      $user_msgs="select * from user_messages where (user_to='$user_to_msg' AND user_from='$user_from_msg') OR (user_from='$user_to_msg' AND user_to='$user_from_msg')";
      $run_msgs=mysqli_query($con,$user_msgs);
      $msgs=mysqli_num_rows($run_msgs);
       ?>
       <a class="navbar-brand" href="home.php?id=<?php echo $user_id;?>">Facebook</a>
     </div>
     <div class="navbar-collapse collapse " id="#bs-example-navbar-collapse-1">
       <ul class="nav navbar-nav">
       <li class="active">
         <a href='profile.php?<?php echo"u_id=$user_id" ;?>'><?php echo"$first_name" ;?></a>
       </li>
       <li class="active">
         <a href='home.php '>Home</a>
       </li>
       <li class="active">
         <a href='members.php'>Find People</a>
       </li>
       <li class="active">
         <a href='messages.php?u_id=new'>Messages</a>
       </li>
       <?php
       echo"
       <li class='dropdown' class='active'>
       <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span><i class='glyphicon glyphicon-chevron-down'></i></span></a>
       <ul class='dropdown-menu'>
       <li>
       <a href='my_post.php?u_id=$user_id'>My Posts<span class='badge badge-secondary'>$posts</span></a>
       </li>
       <li>
       <a href ='edit_profile.php?u_id=$user_id'>Edit My Account</a>
       </li>
       <li role='seperator' class='divider'></li>
       <li>
       <a href='logout.php'>logout</a>
       </li>
       </ul>
       </li>";
        ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
      <form class="navbar-form navbar-left" action="results.php" method="get">
        <div class="form-group">
          <input type="text" class="form-control" name="user_query" placeholder="Search">
        </div>
        <button type="submit" class="btn-btn-info" name="search">Search</button>
      </form>
      </li>
    </ul>
  </div>
</div>
</nav>
