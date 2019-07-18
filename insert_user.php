<?php
include("includes/connect.php");
if(isset($_POST['sign_up'])){
  $first_name=htmlentities(mysqli_real_escape_string($con,$_POST['first_name']));
  $last_name=htmlentities(mysqli_real_escape_string($con,$_POST['last_name']));
  $pass=htmlentities(mysqli_real_escape_string($con,$_POST['u_pass']));
  $email=htmlentities(mysqli_real_escape_string($con,$_POST['u_email']));
  $country=htmlentities(mysqli_real_escape_string($con,$_POST['u_country']));
  $gender=htmlentities(mysqli_real_escape_string($con,$_POST['u_gender']));
  $birthday=htmlentities(mysqli_real_escape_string($con,$_POST['u_birthday']));
  $status="verified";
  $posts="no";
  $newgid=sprintf('%05d',rand(0,99999));
  $username =strtolower($first_name . "_".$last_name." ".$newgid);
  $check_username_query="select user_name from users where user_email='$email'";
  $run_username=mysqli_query($con,$check_username_query);
      if(strlen($pass)<9){
        echo" <script>alert('Password should be minimum 9 characters!')</script>";
        exit();
      }
      $check_email="select *from users where user_email='$email'";
      $run_email  =mysqli_query($con,$check_email);
      $check=mysqli_num_rows($run_email);
      if($check==1){
        echo "<script>alert('Email already exist,Please try using another email')</script>";
        echo "<script>window.open('signup.php','_self')</script>";
        exit();
      }
      $rand=rand(1,3);
      if($rand==1)
      $profile_pic="profile1.png";
      else if($rand==2)
      $profile_pic="profile2.png";
      else if($rand==3)
      $profile_pic="profile3.jpeg";

      $insert = "insert into users (f_name,l_name,user_name,describ_user,relationship,user_pass,user_email,user_country,user_gender,user_birthday,user_image,user_cover,user_reg_date,status,posts,recovery_account)values('$first_name','$last_name','$username','Hello facebook!this is my default status!','...','$pass','$email','$country','$gender','$birthday','$profile_pic','cover1.jpeg',NOW(),'$status','$posts','iwanttoputadingintheuniverse.')";
      $query=mysqli_query($con,$insert);
      if($query){
        echo "<script>alert('Well Done $first_name,you are good to go.')</script>";
        echo "<script>window.open('signin.php','_self')</script>";
      }
      else{
        echo" <script>alert('Registration failed,please try again!')</script>";
        echo "<script>window.open('signup.php','_self')</script>";
      }
}
 ?>
