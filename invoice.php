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
  <link rel ="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/responsive.bootstrap.min.css">
 <!-- Optional Bootstrap theme -->
 <link rel="stylesheet" href="css/bootstrap-theme.min.css">
 <!--Bootstrap script-->
 <!--site level script-->
 <link rel="stylesheet" href="css/assets/style.css">
  <!--site level script FONT AWESOME-->
   <link rel="stylesheet" href="css/assets/font-awesome/css/font-awesome.css"/>
	<link href="css/date/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen"/>   
	<style>
	.form-control1 {
    display: block;
    
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
dd, dt {
    line-height: 2;
}
.error{
  border-color: #e91e63;
  outline:none;
  box-shadow:0 1px 1px #e91e63;
}
	</style>
    <SCRIPT TYPE="text/javascript">
    function popup(mylink, windowname)
     {
       if (! window.focus)
       return true;
       var href;
        if (typeof(mylink) == 'string')
        href=mylink;
         else href=mylink.href;
         window.open(href, windowname,  'type=fullWindow,fullscreen,scrollbars=yes'); return false; }
    </SCRIPT>
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
          <div class="col-md-9" style="">
            <div class="alert alert-info" style="padding-top:10px;">
      				<h3>Create Invoice</h3>
      		</div>
        <div class="panel panel-body" style="padding-top:60px;padding-bottom:40px;">
		   <div class="tab-pan" style="margin-left:  0%;">
           <form id="myForm" onSubmit="return saveInputs();"  action="#" class="inline">
            <div class="form-group col-md-8">
                  <label for="userIdType">Select Customer Name:</label>
                  <input type="text" class="form-control" id="userIdType" list="lst_userIdTypes" value="" required >
                  <datalist id="lst_userIdTypes">
                    <option> AD_ID</option>
                    <option>PU_ID</option>
                    <option>XU_ID</option>
                    <option>DE_ID</option>
                    <option>AP_ID</option>
                  </datalist>
            </div>
			<div id ="" class="input_fields_wrap">
            <div style="display:inline-block">
			<div class=" form-group col-md-4" >
                <label for="dtp_input2" class="col-md-12 control-label">&nbsp;</label>
                <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" value="" placeholder="Select Invoice Date" readonly>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" /><br/>
            </div> 
			<div >
			<div class=" form-group col-md-3 " >
                <label for="dtp_input2" class=" control-label">&nbsp;</label>
				 <select class="form-control" id="sel1">
					<option>Open</option>
					<option>Closed</option>
				  </select>
            </div>
			<div class="form-group input-group col-md-4 pull-right " style="padding-left:16px; padding-right:16px;margin-top:27px;">
				<span class="input-group-addon">Invoice #</span>
				<input type="text" class="form-control copy-input required" name="invoice" id="customer_email" required/>
			</div>
			</div>
			<!--
			<div class=" form-group col-md-3">
			<label for="dtp_input2" class="col-md-12 control-label">Date Picking</label>
                <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
					<input class="form-control" size="16" type="text" value="" readonly>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" /><br/>
            </div>-->        
            </div>	
            </div>
            <div id ="inputFields" class="input_fields_wrap">
			<div class="col-md-12 form-group">
                <button style ="margin-left:1%;" type="button" class="btn btn-success"onclick="addElements()">+</button>
            </div>
            <div style="">
                    <div class="col-md-5 form-group">
                      <label class="text-center">Add Items</label>
                      <input type="text" class="form-control"   name="itemName[]" value ="" placeholder="Add items.">
                    </div>
                    <div class="form-group col-md-2  ">
                      <label>Price</label>
                      <input type="text" min ="0"  onkeyup ="findTotal()" id ="itemprice"class="form-control" name="itemPrice[]" value =""  placeholder="0.00">
                    </div>
                   <div class="col-md-2   form-group">
                     <label>Quantity</label>
                     <input  type="text" min ="1" onkeyup ="findTotal()" id ="itemQua" class="form-control" name="itemQua[]" value="" placeholder="0">
				   </div>
				    <div class="col-md-2   form-group">
                     <label>Discount(%)</label>
                     <input  type="text" onkeyup ="findTotal()" id ="itemDis" class="form-control" name="itemDis[]" value=""  placeholder="0.00%" >
				   </div>
				  <div class=" col-md-1 form-group">
					<span style="margin-left:28px;">&nbsp;</span>
				  </div>     
            </div>
				<div id ="formSubmit" style="margin-bottom:10px;">
					<div class="col-md-2 form-group" style="margin-left:32%;">
					<button  type ="submit" name ="submit" class="btn btn-default"/>submit</button>   
					</div>
				</div>
				<div class="col-md-6 form-group" style="border :none">
				<dl class="dl-horizontal mb20">
					<dt>Total Amount :</dt>
					<dd class="input-group"><span class="input-group-addon">$</span> <input class="form-control col-md-5" id ="sum" type="text" value="" placeholder="0.00" readonly /></dd>
					</dd>
					<dt>Discount :</dt>
					<dd class="input-group"><span class="input-group-addon">$</span> <input class="form-control col-md-5" id ="disc" type="text" value="" placeholder="0.00" readonly /></dd>
					<dt>Sub Total :</dt>
					<dd class="input-group"><span class="input-group-addon">$</span> <input class="form-control col-md-5" id ="subt" type="text" value="" placeholder="0.00" readonly /></dd>
					<dt>Tax Amount : </dt>
					<dd class="input-group">
					<span class="input-group-addon">%</span>
					<input class="form-control col-md-3" type="text" value="" name="tax" id ="tax" onkeyup ="findTotal()" placeholder="0.00"/>
					</dd>
					<dt style="padding-top:10px;">Grant Total :</dt>
					<dd  style="padding-top:12px;"> <b>$ <span id ="grandt">0</span> </b></dd>
				</dl>
				</div>
            </div>
           </form>
      </div>
	  </div>
      <div class="panel panel-default" style="padding-top:10px;">
        <table id="example" class="table table-responsive table-striped " cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>Costomer Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Date</th>
                  <th></th>
                  <th></th>
              </tr>
          </thead>
        <!--  <tfoot>
              <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th>Salary</th>
                  <th></th>
              </tr>
          </tfoot>-->
          <tbody>
              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td class="text-center"><a href =""><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href =""><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                  <td class="text-center"><button type="button" class="btn btn-info">>></button></td>
              </tr>
              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td class="text-center"><a href =""><i class="fa fa-pencil" aria-hidden="true"></i></a>   <a href =""><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                  <td class="text-center"><button type="button" class="btn btn-info">>></button></td>
              </tr>
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
<script type="text/javascript" src="js/datepickerBootstrap/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/datepickerBootstrap/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/appendElement.js"></script>
<script type="text/javascript">
	$('.form_date').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
</script>
</body>
</html>
