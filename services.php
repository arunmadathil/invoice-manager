<?php
require "vendor/autoload.php";
session_start();
if(!$_SESSION['login'])
{
	header('location:http://vayaloram.in/admin');
}
$master = new Master();
$dbs = new Database();
$dbs->connect();
$pkg="";$name="";$description="";$idupdate ="";$value = array();
$value[0] ="";$value[1] ="";$value[2] = "";$value[3] = "";$value[4] ="";
if(isset($_GET['q_id']))
{
	$dbs->select("services","*",null,'id='.$_GET['q_id']);
	$up = $dbs->getResult();
	$value[0] = $up[0]['category'];
	$value[4] = $up[0]['title'];
	$value[1] = $up[0]['comon'];
	$value[2] = $up[0]['description'];

	$idupdate = $_GET['q_id'];
}
if(isset($_POST['submit']))
{
	$up = mysql_real_escape_string(trim($_POST['update']));
	$des = mysql_real_escape_string(trim($_POST['description']));
	$name = mysql_real_escape_string(trim($_POST['name']));
	$title = mysql_real_escape_string(trim($_POST['title']));
	$img = basename($_FILES['img1']['name']);
	$target = '../gallery/'.$img;
	if(move_uploaded_file($_FILES['img1']['tmp_name'],$target))
		{
			$re = $master->manage_services($name,$des,$img,$title,$up);
		}
	else
		{
			$master->manage_services($name,$des,$img,$title,$up);
		}
		header("location:services.php");
}
if(isset($_GET['d_id']))
{
    $q_id = $_GET['d_id'];
	$dbs->delete("services",'id = '.$q_id);
	$re = $dbs->getResult();
	if($re==true)
	{
		header("location:services.php");
	}
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<meta charset="utf-8">
<title>Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Invoice Management System User Registration">
<meta name="author" content="India: Jithin S Wilfred">
<!-- styles -->
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/jquery-ui-1.8.16.custom.css" rel="stylesheet">
<link href="../css/jquery.jqplot.css" rel="stylesheet">
<link href="../css/prettify.css" rel="stylesheet">
<link href="../css/elfinder.min.css" rel="stylesheet">
<link href="../css/elfinder.theme.css" rel="stylesheet">
<link href="../css/fullcalendar.css" rel="stylesheet">
<link href="../js/plupupload/jquery.plupload.queue/css/jquery.plupload.queue.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">
<link href="../css/bootstrap-responsive.css" rel="stylesheet">
<link href="../css/icons-sprite.css" rel="stylesheet">
<link id="themes" href="../css/themes.css" rel="stylesheet">
<link id="themes" href="../css/custom.css" rel="stylesheet">
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="css/ie/ie7.css" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="css/ie/ie8.css" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="css/ie/ie9.css" />
<![endif]-->
<!--fav and touch icons -->
<link rel="shortcut icon" href="../ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../ico/apple-touch-icon-57-precomposed.png">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#input08').change(function() {
           $('#input09').prop("required",$(this).is(":checked"));
    });
	   $('#input10').change(function() {
           $('#input11').prop("required",$(this).is(":checked"));
		   $('#input12').prop("required",$(this).is(":checked"));
		   $('#input13').prop("required",$(this).is(":checked"));
    });
});
</script>
</head>
<body>
<?php
include("head.php");
?>
<div id="main-content">
	<div class="container-fluid">
	<div class="alert alert-danger text-center" id="myAlert" style="display:none">
    <a href="#" class="close">&times;</a>
	<strong id="alerttext"></strong>
	</div>
		<ul class="breadcrumb">
			<h6><li><a href="home.php">Home</a><span class="divider">&raquo;</span></li>
			<li class="active">Aquarium</li></h6>
		</ul>
		<div class="row-fluid">
			<div class="span7">
				<div class="nonboxy-widget">
					<div class="widget-head">
						<h5>Aquarium Products</h5>
					</div>
					<div class="widget-content">
						<div class="widget-box">
							<form class="form-horizontal well" enctype="multipart/form-data" action="services.php" method="POST">
							<div class="control-group"  style="clear:none;">
										<label  class="control-label" for="input01" >Category :</label>
										<div class="controls">
										<select name="title" required>
										<option value="">--select--</option>
										<option value="Aquarium Fishes" <?php if($value[4]=='Aquarium Fishes') {echo "selected";}?>>Aquarium Fishes</option>
										<option value="Aquarium Plants" <?php if($value[4]=='Aquarium Plants') {echo "selected";}?>>Aquarium Plants</option>
										<option value="Aquarium Substrate" <?php if($value[4]=='Aquarium Substrate') {echo "selected";}?>>Aquarium Substrate</option>
										<option value="Fish Foods" <?php if($value[4]=='Fish Foods') {echo "selected";}?>>Fish Foods</option>
										<option value="Fish Tanks" <?php if($value[4]=='Fish Tanks') {echo "selected";}?>>Fish Tanks</option>
										<option value="Aquarium Accessories" <?php if($value[4]=='Other') {echo "selected";}?>>Aquarium Accessories</option>
										</select>
										</div>
									</div>
									<div class="control-group" style="clear:none;">
										<label  class="control-label" for="input01" >Name:</label>
										<div class="controls">
										<input type="text" value="<?php echo $value[0];?>" name = "name" required/>
										</div>
									</div>
									<div class="control-group" >
										<label class="control-label" for="input02">Image :</label>
										<div class="controls">
										<img src='../gallery/<?php echo $value[1];?>' height='50' width='50'/>
										</div>
									</div>
									<div class="control-group" style="clear:none;">
										<label class="control-label" for="input02">Image :</label>
										<div class="controls">
										<input type="file" name="img1" accept "image/*"/>
										</div>
									</div>
									<div class="control-group"style="width:100%;">
										<label class="control-label" for="typehead">Description:</label>
										<div class="controls">
										<textarea style="width:66%;"rows="6" name="description"><?php echo $value[2];?>
										</textarea>
										</div>
									</div>
									<div class="control-group" style="clear:none;" hidden>
										<div class="controls">
										<input type="text" value="<?php echo $idupdate;?>" name="update"/>
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" name="submit" class="btn btn-info">Submit</button>
										<button class="btn btn-warning">Cancel</button>
									</div>
							</form>
					  </div>
				  </div>
			  </div>
			</div>
			<table class="data-tbl-simple table table-bordered">
			  <thead>
			  <tr>
			  <th>Sl. No:</th>
			  <th>Category</th>
			  <th> Name</th>
			  <th>Image</th>
			  <th>Description</th>
			  <th>Action</th>
			  </tr>
			  </thead>
					<tbody>
			  <?php
			  $dbs->select("services","*");
			  $re = $dbs->getResult();$sl="";
				for($i=0;$i<sizeof($re);$i++)
				{
				  	$sl=$sl+1;
					$id = $re[$i]['id'];
					echo"<tr>
					<td>$sl</td>
					<td>".$re[$i]['title']."</td>
					<td>".$re[$i]['category']."</td>
					<td><span><img src='../gallery/".$re[$i]['comon']."' height='50' width='50'/></span></td>
					<td>".$re[$i]['description']."</td>
					<td class='center'><a href='services.php?q_id=$id' class='btn btn-info'>Edit</a>";?>
					<a href='services.php?d_id=<?php echo $re[$i]['id'];?>' class='btn btn-danger' onClick="return confirm('Are you sure to Remove this Event ?')">Remove</a></td></tr>
				<?php
				}
				  ?>
				  </tbody>
				  </table>
			 </div>
</div>
<!-- javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="../js/jquery.ui.touch-punch.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/prettify.js"></script>
<script src="../js/jquery.sparkline.min.js"></script>
<script src="../js/jquery.nicescroll.min.js"></script>
<script src="../js/accordion.jquery.js"></script>
<script src="../js/smart-wizard.jquery.js"></script>
<script src="../js/vaidation.jquery.js"></script>
<script src="../js/jquery-dynamic-form.js"></script>
<script src="../js/fullcalendar.js"></script>
<script src="../js/raty.jquery.js"></script>
<script src="../js/jquery.noty.js"></script>
<script src="../js/jquery.cleditor.min.js"></script>
<script src="../js/data-table.jquery.js"></script>
<script src="../js/TableTools.min.js"></script>
<script src="../js/ColVis.min.js"></script>
<script src="../js/plupload.full.js"></script>
<script src="../js/elfinder/elfinder.min.js"></script>
<script src="../js/chosen.jquery.js"></script>
<script src="../js/uniform.jquery.js"></script>
<script src="../js/jquery.tagsinput.js"></script>
<script src="../js/jquery.colorbox-min.js"></script>
<script src="../js/check-all.jquery.js"></script>
<script src="../js/inputmask.jquery.js"></script>
<script src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>
<script src="../js/plupupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>
<script src="../js/excanvas.min.js"></script>
<script src="../js/jquery.jqplot.min.js"></script>
<script src="../js/chart/jqplot.highlighter.min.js"></script>
<script src="../js/chart/jqplot.cursor.min.js"></script>
<script src="../js/chart/jqplot.dateAxisRenderer.min.js"></script>
<script src="../js/custom-script.js"></script>
<!-- html5.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="../js/respond.min.js"></script>
<script src="../js/ios-orientationchange-fix.js"></script>
</body>
</html>
