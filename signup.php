<!doctype html>
<html>
<head>
  <title>Signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style >
body{
  overflow-x: hidden;
}
.main-content{
  width: 50%;
  height:40%;
  margin:10px auto;
  background-color: #fff;
  border: 2px solid #e6e6e6;
  padding: 40px 50px;
}
  .well{
    background-color:#187FAB;
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
    <div class="col-sm-12">
    <div class="main-content">
      <div class="header">
            <h3 style="text-align:center;"><i>Join facebook</i></h3>
          </div>
          <div class="1-part">
            <form  action="" method="post">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"> </i></span>
                <input type="text" class="form-control" placeholder="First Name" name="first_name" required>
              </div><br>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"> </i></span>
                <input type="text" class="form-control" placeholder="Last Name" name="last_name" required>
              </div><br>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"> </i></span>
                <input type="password" class="form-control" placeholder="Password" name="u_pass" required>
              </div><br>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"> </i></span>
                <input type="email" class="form-control" placeholder="Email" name="u_email" required>
              </div><br>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"> </i></span>
                <select class="form-control" name="u_country" required>
                  <option disabled>Select Your Countrty</option>
                  <option>India</option>
                  <option>Pakistan</option>
                  <option>United State Of America</option>
                  <option>Japan</option>
                  <option>China</option>
                  <option>France</option>
                  <option>Afganistan</option>
                  <option>Bangladesh</option>
                  <option>Canada</option>
                  <option>Austraila</option>
                </select>
              </div><br>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"> </i></span>
                <select class="form-control input-md" name="u_gender" required>
                  <option disabled>Select Your Gender</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Others</option>
                </select>
              </div><br>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"> </i></span>
                <input type="date" class="form-control" placeholder="" name="u_birthday" required>
              </div><br>
              <center><button id="signup" class="btn btn-info btn-lg" name="sign_up">Sign up</button></center><br><br>
              <a style="text-decoration:none;float:center;color:#187FAB;data-toggle:tooltip" title="Signin" href="signin.php">Already have an account?</a><br>
              <?php include("insert_user.php"); ?>
                </form>
          </div>
    </div>
  </div>
</div>
</body>
</html>
