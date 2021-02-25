<?php
session_start();
require "vendor/autoload.php";

use App\Model\DBconfig;
use App\Controller\UserController as User;

$dbconfig = new DBconfig();
$user = new User($dbconfig->connect_db());
$result = "";
if(isset($_POST['submit']))
{
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  if($username !="" && $password !="" && $email)
  {
  if($user->registerUser($username,$email,$password))
  {
    $result ="Registration succesfull";
  }
  else
    {
    {$result ="Username or email already exists!";}
  }
  //  print_r($user->getsqlError());
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <!--Bootstrap script-->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container" style="padding-top:170px;">
      <div class ="row">
         <div class="col-xs-12 col-sm-8 col-md-4  col-sm-offset-2 col-md-offset-4">
           <div class="panel panel-default">
             <div class="panel panel-heading">
               <h3>Sign up form</h3>
             </div>
             <div class ="panel panel-body" style="margin-bottom:0px;padding-bottom:30px;">
            <form action ="signup.php" method ="post">
                <div class ="form-group ">
                  <input  class="form-control input-sm" id="email" name="username" type ="text" value ="" placeholder="Enter user name" />
                </div>
              <div class ="form-group">
                <input name="email"  class="form-control input-sm" type ="text" value ="" placeholder="Enter email" />
              </div>
              <div class ="form-group">
                <input class="form-control input-sm" type ="password" name="password" value=""placeholder="Enter Password" />
              </div>
                <span><?php echo $result;?></span>
              	<input type="submit" name="submit"value="Register" class="btn btn-info btn-block">
          </form>
</div>
        </div>
      </div>
        </div>

      </div>
</div>
  </body>
</html>
