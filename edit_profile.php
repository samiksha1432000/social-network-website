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
    <title>Edit Account Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/home_style2.css">
  </head>
<body>
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
      <form style="margin-top:10%;"  action="" method="post" enctype="multipart/form-data">
        <table class="table table-bodered table-hover">
          <tr align="center">
            <td colspan="6" class="active">
              <h2 >
                Edit your profile
              </h2>
            </td>
          </tr>
          <tr>
            <td style="font-weight:bold;">Change your first name</td>
            <td>
              <input class="form-control" type="text" name="f_name" required value="<?php echo $first_name; ?>">
            </td>
          </tr>
          <tr>
            <td style="font-weight:bold;">Change your last name</td>
            <td>
              <input class="form-control" type="text" name="l_name" required value="<?php echo $last_name; ?>">
            </td>
          </tr>
          <tr>
            <td style="font-weight:bold;">Change your username</td>
            <td>
              <input class="form-control" type="text" name="u_name" required value="<?php echo $user_name; ?>">
            </td>
          </tr>
          <tr>
            <td style="font-weight:bold;">Description</td>
            <td>
              <input class="form-control" type="text" name="describ_user" required value="<?php echo $describ_user; ?>">
            </td>
          </tr>
          <tr>
            <td style="font-weight:bold;">Relationship Status</td>
            <td>
              <select class="form-control" name="relationship">
                <option><?php echo $relationship_status?></option>
                <option>Engaged</option>
                <option>Married</option>
                <option>Single</option>
                <option>In a Relationship</option>
                <option>It's a complicated</option>
                <option>Seperated</option>
                <option>Divorced</option>
                <option>Widowed</option>
              </select>
            </td>
          </tr>
          <tr>
            <td style="font-weight:bold;">Password</td>
            <td>
              <input class="form-control" type="password" name="u_pass" required value="<?php echo $user_pass; ?>">
              <input type="checkbox" onclick="show_password()"><strong>Show Password</strong>
            </td>
          </tr>
          <tr>
            <td style="font-weight:bold;">Email</td>
            <td>
              <input class="form-control" type="email" name="u_email" required value="<?php echo $user_email; ?>">
            </td>
          </tr>
          <tr>
            <td style="font-weight:bold;">Country </td>
            <td>
              <select class="form-control" name="u_country">
                <option><?php echo $user_country;?></option>
                <option>United States</option>
                <option>UAE</option>
                <option>Pakistan</option>
                <option>India</option>
                <option>Brazil</option>
                <option>Uk</option>
                <option>France</option>
                <option>Bangladesh</option>
              </select>
            </td>
          </tr>
        </tr>
        <tr>
          <td style="font-weight:bold;">Gender</td>
          <td>
            <select class="form-control" name="u_gender">
              <option><?php echo $user_gender;?></option>
              <option>Male</option>
              <option>Female</option>
              <option>Others</option>
            </select>
          </td>
        </tr>
        <tr>
          <td style="font-weight:bold;">Birthdate</td>
          <td>
            <input class="form-control" type="date" name="u_birthday" required value="<?php echo $user_birthday; ?>">
          </td>
        </tr>
        <tr>
          <td style="font-weight:bold;">
            Forgotten Password
          </td>
          <td>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Turn On</button>
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                  </div>
                  <div class="modal-body">
                    <form id="f" action="recovery.php?id=<?php echo $user_id; ?>" method="post">
                      <strong>What is your school bestfriend name?</strong>
                      <textarea name="content" rows="4" cols="83" class="form-control" placeholder="someone"></textarea><br>
                      <input class="btn btn-primary" type="submit" name="sub" value="Submit" step="width:100px;"><br><br>
                      <pre> Answer the above question will be asked if you forget your<br>password</pre><br><br>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <tr align="center">
          <td colspan="6">
          <input type="submit" name="update" class="btn btn-primary" style="width:250px;" value="Update">
          </td>
        </tr>
        </table>
      </form>
      <?php
      if(isset($_POST['sub'])){
        $bfn=htmlentities($_POST['content']);
        if($bfn==''){
          echo "<script>alert('please enter something')</script>";
          echo"<script>window.open('edit_profile.php?u_id$user_id','_self')</script>";
          exit();
        }
        else{
          $update="update users set recovery_account='$bfn' where user_id='$user_id'";
          $run=mysqli_query($con,$update);
          if($run){
            echo "<script>alert('working...')</script>";
            echo"<script>window.open('edit_profile.php?u_id$user_id','_self')</script>";
          }
          else{
            echo"<script>alert('Error while updating information')</script>";
            echo"<script>window.open('edit_profile.php?u_id$user_id','_self')</script>";
          }
        }
      }
       ?>
    </div>
    <div class="col-sm-2">
    </div>
  </div>
</body>
</html>
<?php
if(isset($_POST['update'])){
$f_name=htmlentities($_POST['f_name']);
$l_name=htmlentities($_POST['l_name']);
$u_name=htmlentities($_POST['u_name']);
$describ_user=htmlentities($_POST['describ_user']);
$relationship_status=htmlentities($_POST['relationship']);
$u_pass=htmlentities($_POST['u_pass']);
$u_email=htmlentities($_POST['u_email']);
$u_country=htmlentities($_POST['u_country']);
$u_gender=htmlentities($_POST['u_gender']);
$u_birthday=htmlentities($_POST['u_birthday']);
$update="update users set f_name='$f_name',l_name='$l_name',user_pass='$u_pass',user_email='$u_email',describ_user='$describ_user',relationship='$relationship_status',user_country='$u_country',user_gender='$u_gender',user_birthday='$u_birthday' where user_id='$user_id'";
$run=mysqli_query($con,$update);
if($run){
  echo "<script>alert('Your Profile Updated')</script>";
  echo"<script>window.open('edit_profile.php?u_id$user_id','_self')</script>";
}

}
?>
