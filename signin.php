<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Signin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <style>
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
    .overlap-text{
      position: relative;
    }
    .overlap-text a{
      position: absolute;
      top:8px;
      right:10px;
      font-size: 14px;
      text-decoration: none;
      font-family: 'Overpass Mono',monospace;
      letter-spacing: -1px;
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
                <h3 style="text-align:center;"><i>Log in to facebook</i></h3>
              </div>
              <div class="1-part">
              <form  action="" method="post">
                <input type="email" name="email" placeholder="Email" class="form-control input-md" required><br>
                <div class="overlap-text">
                  <input type="password" name="pass" placeholder="Password" required="required" class="form-control input-md"><br>
                  <a style="text-decoration:none;float:right;color:#187FAB;data-toggle:tooltip" title="Reset Password" href="forgot_password.php">Forgot?</a>
                </div>
                <a style="text-decoration:none;float:center;color:#187FAB;data-toggle:tooltip" title="Signin" href="signup.php">Don't  have an account?</a><br><br>
                <center><button id="login" class="btn btn-info btn-lg" name="login">Login</button></center>
                <?php include("login.php"); ?>
          </form>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>
