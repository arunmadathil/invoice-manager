<?php
require "vendor/autoload.php";
session_start();
if(isset($_GET['logout']))
{
  $_SEEION['user']="";
  session_unset($_SEEION['user']);
}
use App\Model\DBconfig;
use App\Controller\UserController as User;
$dbconfig = new DBconfig();
$user = new User($dbconfig->connect_db());
if($user->is_logedin())
{
    $user->redirect("home.php");
}
$invalid = "";
if(isset($_POST['submit']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  if($username !="" && $password !="")
  {
    ;
    if($user->login($username,$password))
    {
      $user->redirect("home.php");
    }
    else
    {
        $invalid = "Invalid username";
    }
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <!-- Optional Bootstrap theme -->
   <link rel="stylesheet" href="css/bootstrap-theme.min.css">
   <!--Bootstrap script-->
   <script src="js/jquery-1.11.3.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
<div class ="contsiner" style="padding-top:170px;">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-3  col-md-offset-4" >
    <div class ="panel panel-default" >
      <div class="panel panel-heading">
        <h3>Please login</h3>
      </div>
      <div class ="panel panel-body" style="margin-bottom:0px;padding-bottom:30px;">
        <form action ="#" method ="post">
          <div class ="form-group ">
              <input  class="form-control input-sm"  name="username" type ="text" value ="" placeholder="Enter user name" />
          </div>
          <div class ="form-group">
            <input class="form-control input-sm" type ="password" name="password" value=""placeholder="Enter Password" />
          </div>
          <div class ="form-group" style ="display:inline;">
            <input type="checkbox" value="remember-me"  name="rememberMe">
            <label for ="checkbox" style ="font-weight:100">Remember me </label>
          </div>
            <input type="submit" name="submit"value="login" class="btn btn-info btn-block">
      </form>
    </div>
  </div>
</div>
</div>
</div>
  </body>
</html>
