<?php
session_start();
include 'model/dbConfig.php';
include 'controller/controller.php';
$dbconfig = new DBconfig();
$user = new User($dbconfig->connect_db());
if(!$user->is_logedin())
{
  $user->redirect("index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name ="viewport"  content="width=device-width, initial-scale=1">
  <link rel ="stylesheet" type="text/css" href="css/bootstrap.min.css">
 <!-- Optional Bootstrap theme -->
 <link rel="stylesheet" href="css/bootstrap-theme.min.css">
 <!--Bootstrap script-->
 <!--site level script-->
 <link rel="stylesheet" href="css/assets/style.css">
  <!--site level script FONT AWESOME-->
   <link rel="stylesheet" href="css/assets/font-awesome/css/font-awesome.css">
   <link type="text/css" href="css/dataTables.bootstrap.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="css/responsive.bootstrap.min.css">
   <link type="text/css" href="css/dataTables.fontAwesome.css" rel="stylesheet">
 <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/table/dataTables.bootstrap.min.js"></script>
    <script src="js/table/jquery-1.12.4.js"></script>
    <script src="js/table/jquery.dataTables.min.js"></script>
    <script >
    $(document).ready(function()
	{
    $('#example').DataTable();
	} );
    </script>

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
        <div class="  ">
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
          <div class="col-md-8" style="margin-left:4.333333%;">
            <div class="alert alert-info" style="padding-top:10px;">
      				<h3>Add Costomer Details</h3>
      			</div>

        <div class="well well-lg">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label class="control-label" for="input-date-issued-start">Date Issued Start</label>
            <div class="input-group date form-date">
              <input type="text" name="filter_date_issued_start" value="2017-03-01" placeholder="Date Issued Start" data-date-format="YYYY-MM-DD" id="start-date" class="form-control">
              <span class="input-group-btn">
                <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
              </span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="input-date-issued-end">Date Issued End</label>
            <div class="input-group date">
              <input type="text" name="filter_date_issued_end" value="2017-03-15" placeholder="Date Issued End" data-date-format="YYYY-MM-DD" id="end-date" class="form-control">
              <span class="input-group-btn">
                <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label class="control-label" for="input-status">Status</label>
            <select name="filter_status_id" id="input-status" class="form-control">
              <option value="">All Statuses</option>
                            <option value="1">Approved</option>
                            <option value="2">Draft</option>
                            <option value="3">Overdue</option>
                            <option value="4">Paid</option>
                            <option value="5">Pending</option>
                            <option value="6">Void</option>
                          </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="input-group">Group By</label>
            <select name="filter_group" id="input-group" class="form-control">
                            <option value="year" selected="selected">Year</option>
                            <option value="month">Month</option>
                            <option value="week">Week</option>
                            <option value="day">Day</option>
                          </select>
          </div>
          <button type="button" title="" data-toggle="tooltip" class="btn btn-primary pull-right" onclick="filter();" data-original-title="Filter"><i class="fa fa-search"></i></button>
        </div>
      </div>
    </div>  
		  <div class="panel panel-default">
			<div class="panel-body panel-no-padding" >
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Rendering engine</th>
							<th>Browser</th>
							<th>Platform(s)</th>
							<th>Engine version</th>
							<th>CSS grade</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
							<td>Trident</td>
							<td>Internet
							   Explorer 4.0</td>
							   <td>Win 95+</td>
							   <td class="center"> 4</td>
							   <td class="center">X</td>
						   </tr>
						   <tr class="even gradeC">
							<td>Trident</td>
							<td>Internet
							   Explorer 5.0</td>
							   <td>Win 95+</td>
							   <td class="center">5</td>
							   <td class="center">C</td>
						   </tr>
						   <tr class="odd gradeA">
							<td>Trident</td>
							<td>Internet
							   Explorer 5.5</td>
							   <td>Win 95+</td>
							   <td class="center">5.5</td>
							   <td class="center">A</td>
						   </tr>
						   <tr class="even gradeA">
							<td>Trident</td>
							<td>Internet
							   Explorer 6</td>
							   <td>Win 98+</td>
							   <td class="center">6</td>
							   <td class="center">A</td>
						   </tr>
						   <tr class="odd gradeA">
							<td>Trident</td>
							<td>Internet Explorer 7</td>
							<td>Win XP SP2+</td>
							<td class="center">7</td>
							<td class="center">A</td>
						</tr>
						<tr class="even gradeA">
							<td>Trident</td>
							<td>AOL browser (AOL desktop)</td>
							<td>Win XP</td>
							<td class="center">6</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Firefox 1.0</td>
							<td>Win 98+ / OSX.2+</td>
							<td class="center">1.7</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Firefox 1.5</td>
							<td>Win 98+ / OSX.2+</td>
							<td class="center">1.8</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Firefox 2.0</td>
							<td>Win 98+ / OSX.2+</td>
							<td class="center">1.8</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Firefox 3.0</td>
							<td>Win 2k+ / OSX.3+</td>
							<td class="center">1.9</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Camino 1.0</td>
							<td>OSX.2+</td>
							<td class="center">1.8</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Camino 1.5</td>
							<td>OSX.3+</td>
							<td class="center">1.8</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Netscape 7.2</td>
							<td>Win 95+ / Mac OS 8.6-9.2</td>
							<td class="center">1.7</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Netscape Browser 8</td>
							<td>Win 98SE+</td>
							<td class="center">1.7</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Netscape Navigator 9</td>
							<td>Win 98+ / OSX.2+</td>
							<td class="center">1.8</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Mozilla 1.0</td>
							<td>Win 95+ / OSX.1+</td>
							<td class="center">1</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Mozilla 1.1</td>
							<td>Win 95+ / OSX.1+</td>
							<td class="center">1.1</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Mozilla 1.2</td>
							<td>Win 95+ / OSX.1+</td>
							<td class="center">1.2</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Mozilla 1.3</td>
							<td>Win 95+ / OSX.1+</td>
							<td class="center">1.3</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Mozilla 1.4</td>
							<td>Win 95+ / OSX.1+</td>
							<td class="center">1.4</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Mozilla 1.5</td>
							<td>Win 95+ / OSX.1+</td>
							<td class="center">1.5</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Mozilla 1.6</td>
							<td>Win 95+ / OSX.1+</td>
							<td class="center">1.6</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Mozilla 1.7</td>
							<td>Win 98+ / OSX.1+</td>
							<td class="center">1.7</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Mozilla 1.8</td>
							<td>Win 98+ / OSX.1+</td>
							<td class="center">1.8</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Seamonkey 1.1</td>
							<td>Win 98+ / OSX.2+</td>
							<td class="center">1.8</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Gecko</td>
							<td>Epiphany 2.20</td>
							<td>Gnome</td>
							<td class="center">1.8</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Webkit</td>
							<td>Safari 1.2</td>
							<td>OSX.3</td>
							<td class="center">125.5</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Webkit</td>
							<td>Safari 1.3</td>
							<td>OSX.3</td>
							<td class="center">312.8</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Webkit</td>
							<td>Safari 2.0</td>
							<td>OSX.4+</td>
							<td class="center">419.3</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Webkit</td>
							<td>Safari 3.0</td>
							<td>OSX.4+</td>
							<td class="center">522.1</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Webkit</td>
							<td>OmniWeb 5.5</td>
							<td>OSX.4+</td>
							<td class="center">420</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Webkit</td>
							<td>iPod Touch / iPhone</td>
							<td>iPod</td>
							<td class="center">420.1</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Webkit</td>
							<td>S60</td>
							<td>S60</td>
							<td class="center">413</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Presto</td>
							<td>Opera 7.0</td>
							<td>Win 95+ / OSX.1+</td>
							<td class="center">-</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Presto</td>
							<td>Opera 7.5</td>
							<td>Win 95+ / OSX.2+</td>
							<td class="center">-</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Presto</td>
							<td>Opera 8.0</td>
							<td>Win 95+ / OSX.2+</td>
							<td class="center">-</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Presto</td>
							<td>Opera 8.5</td>
							<td>Win 95+ / OSX.2+</td>
							<td class="center">-</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Presto</td>
							<td>Opera 9.0</td>
							<td>Win 95+ / OSX.3+</td>
							<td class="center">-</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Presto</td>
							<td>Opera 9.2</td>
							<td>Win 88+ / OSX.3+</td>
							<td class="center">-</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Presto</td>
							<td>Opera 9.5</td>
							<td>Win 88+ / OSX.3+</td>
							<td class="center">-</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Presto</td>
							<td>Opera for Wii</td>
							<td>Wii</td>
							<td class="center">-</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Presto</td>
							<td>Nokia N800</td>
							<td>N800</td>
							<td class="center">-</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>Presto</td>
							<td>Nintendo DS browser</td>
							<td>Nintendo DS</td>
							<td class="center">8.5</td>
							<td class="center">C/A<sup>1</sup></td>
						</tr>
						<tr class="gradeC">
							<td>KHTML</td>
							<td>Konqureror 3.1</td>
							<td>KDE 3.1</td>
							<td class="center">3.1</td>
							<td class="center">C</td>
						</tr>
						<tr class="gradeA">
							<td>KHTML</td>
							<td>Konqureror 3.3</td>
							<td>KDE 3.3</td>
							<td class="center">3.3</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>KHTML</td>
							<td>Konqureror 3.5</td>
							<td>KDE 3.5</td>
							<td class="center">3.5</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeX">
							<td>Tasman</td>
							<td>Internet Explorer 4.5</td>
							<td>Mac OS 8-9</td>
							<td class="center">-</td>
							<td class="center">X</td>
						</tr>
						<tr class="gradeC">
							<td>Tasman</td>
							<td>Internet Explorer 5.1</td>
							<td>Mac OS 7.6-9</td>
							<td class="center">1</td>
							<td class="center">C</td>
						</tr>
						<tr class="gradeC">
							<td>Tasman</td>
							<td>Internet Explorer 5.2</td>
							<td>Mac OS 8-X</td>
							<td class="center">1</td>
							<td class="center">C</td>
						</tr>
						<tr class="gradeA">
							<td>Misc</td>
							<td>NetFront 3.1</td>
							<td>Embedded devices</td>
							<td class="center">-</td>
							<td class="center">C</td>
						</tr>
						<tr class="gradeA">
							<td>Misc</td>
							<td>NetFront 3.4</td>
							<td>Embedded devices</td>
							<td class="center">-</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeX">
							<td>Misc</td>
							<td>Dillo 0.8</td>
							<td>Embedded devices</td>
							<td class="center">-</td>
							<td class="center">X</td>
						</tr>
						<tr class="gradeX">
							<td>Misc</td>
							<td>Links</td>
							<td>Text only</td>
							<td class="center">-</td>
							<td class="center">X</td>
						</tr>
						<tr class="gradeX">
							<td>Misc</td>
							<td>Lynx</td>
							<td>Text only</td>
							<td class="center">-</td>
							<td class="center">X</td>
						</tr>
						<tr class="gradeC">
							<td>Misc</td>
							<td>IE Mobile</td>
							<td>Windows Mobile 6</td>
							<td class="center">-</td>
							<td class="center">C</td>
						</tr>
						<tr class="gradeC">
							<td>Misc</td>
							<td>PSP browser</td>
							<td>PSP</td>
							<td class="center">-</td>
							<td class="center">C</td>
						</tr>
						<tr class="gradeU">
							<td>Other browsers</td>
							<td>All others</td>
							<td>-</td>
							<td class="center">-</td>
							<td class="center">U</td>
						</tr>
					</tbody>
				</table>
				
			</div>
		</div>
        </div>
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
<script src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/table/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/table/dataTables.bootstrap.js"></script>
</body>
</html>
