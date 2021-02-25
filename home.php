<?php
session_start();
require "vendor/autoload.php";
use App\Model\DBconfig;
use App\Controller\UserController as User;
$dbconfig = new DBconfig();
$user = new User($dbconfig->connect_db());
if(!$user->is_logedin())
{
    $user->redirect("index.php");
}//print_r($_SESSION['user']);die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 <!-- Optional Bootstrap theme -->
 <link rel="stylesheet" href="css/bootstrap-theme.min.css">
 <!--Bootstrap script-->
 <!--site level script-->
 <link rel="stylesheet" href="css/assets/style.css">
  <!--site level script FONT AWESOME-->
   <link rel="stylesheet" href="css/assets/font-awesome/css/font-awesome.css">

 <script src="js/jquery-1.11.3.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class ="wrapper" style="background-color:#f5f5f5;">
  <div class ="static-content-wrapper">
    <div class="page-content">
      <div class="container-fluid">
        <div class="header-top">
        <div class="col-md-12">
          <div class="row">
            <div class="col-xs-3 ink" style="">
              <h4><a href="index.php" style="color:white">INVOICE</a></h4>
            </div>
            <div class="col-xs-3 pull-right" style="">
              <button type="button" class="btn btn-danger pull-right"><a href="index.php?logout=1" style="color:white">Logout</a></button>
            </div>
        </div>
       </div>
      </div>

      </div>
      <div class="container-fluid">
          <div class="panel-body">
            <div class="col-md-3" style="  background-color: #455a64;">
              <div class="avatar">

              </div>
              <ul class="list-group">
                <a href =""><li class="list-group-item list active">HOME</li></a>
                <a href =""><li class="list-group-item list">COSTOMER</li></a>
                <a href =""><li class="list-group-item list">INVOICE</li></a>
                <a href =""><li class="list-group-item list">VIEW/MANAGE</li></a>
                <a href =""><li class="list-group-item list">SETTINGS</li></a>
              </ul>
            </div>
            <div class="col-md-8" style="margin-left:4.333333%">

            <a href ="costomer.php">  <div class="col-md-6">
                <div class = "panel-body-boxs  box1">
                  <div class="content">
                    <div class="icon">
                      <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <div class="icon-title">
                      <h3> Costomers</h3>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            <a href ="invoice.php">
              <div class="col-md-6">
                <div class = " panel-body-boxs  box2">
                  <div class="content center-block">
                    <div class="icon">
                      <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                    </div>
                    <div class="icon-title">
                      <h3> Invoice</h3>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            <a href ="send-invoice.php">
              <div class="col-md-6 ">
                <div class = " panel-body-boxs  box3">
                  <div class="content">
                    <div class="icon">
                    <i class="fa fa-tasks" aria-hidden="true"></i>
                    </div>
                    <div class="icon-title">
                      <h3> Manage/View</h3>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            <a href ="settings.php">
              <div class="col-md-6">
                <div class = " panel-body-boxs  box4">
                  <div class="content">
                    <div class="icon">
                      <i class="fa fa-cogs" aria-hidden="true"></i>
                    </div>
                    <div class="icon-title">
                      <h3> Setings</h3>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="container-fluid" style="margin-top:36px;">
        <div class="panel-footer">
          <div class="col-md-12" >
          <div class="col-md-4" style="margin-left:48.001%;">
          <h5 style="width:50%;">home</h5>
        </div>
      </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
</body>
</html>
