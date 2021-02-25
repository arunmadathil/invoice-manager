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
   <link rel="stylesheet" href="css/assets/font-awesome/css/font-awesome.css">
   <link type="text/css" href="css/dataTables.bootstrap.css" rel="stylesheet">
   <link type="text/css" href="css/dataTables.fontAwesome.css" rel="stylesheet">

 <script src="js/jquery-1.11.3.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/table/dataTables.bootstrap.min.js"></script>
    <script src="js/table/jquery-1.12.4.js"></script>
    <script src="js/table/jquery.dataTables.min.js"></script>
    <script >
    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
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
  <div class="container-fluid">

  <div class="">
      <div class="col-md-12">
          <div class="panel panel-transparent">
              <div class="panel-body">
                  <div class="clearfix">
                      <div class="pull-left">
                          <img src="http://placehold.it/300&amp;text=Placeholder" class="mt-md mb-md" alt="Avenger">
                          <address class="mt-md mb-md">
                              <strong>Avenger, Inc.</strong><br>
                              705 Folsom Ave, Suite 400<br>
                              San Francisco, CA 94107<br>
                          </address>
                      </div>
                      <div class="pull-right">
                          <h1 class="text-primary text-right" style="font-weight: normal;">
                              INVOICE
                              <small style="display: block;">#10007819</small>
                          </h1>
                      </div>
                  </div>
                  <hr>
                  <div class="row mb-xl">
                      <!-- <div class="col-md-12">
                          <h1 class="text-primary text-center" style="font-weight: normal;">INVOICE</h1>
                      </div> -->
                      <div class="col-md-12">
                          <div class="pull-left">
                              <h3 class="text-muted">To</h3>
                              <address>
                                  <strong>Customer Company, Inc.</strong><br>
                                  795 Folsom Ave, Suite 600<br>
                                  San Francisco, CA 94107<br>
                              </address>
                          </div>
                          <div class="pull-right">
                              <h3 class="text-muted">Info</h3>
                              <ul class="text-left list-unstyled">
                                  <li><strong>Date:</strong> 20/04/2015</li>
                                  <li><strong>Due:</strong> 19/05/2015</li>
                                  <li><strong>Late Fee:</strong> 0.5%</li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-xl">
                      <div class="col-md-12">
                          <div class="panel">
                              <div class="panel-body no-padding">
                                  <div class="table-responsive">
                                      <table class="table table-hover m-n">
                                          <thead>
                                              <tr>
                                                  <th>#</th>
                                                  <th>Item</th>
                                                  <th>Description</th>
                                                  <th class="text-right">Quantity</th>
                                                  <th class="text-right">Unit Cost</th>
                                                  <th class="text-right">Total</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td>1</td>
                                                  <td>Dolor</td>
                                                  <td>Mel no dictas commune</td>
                                                  <td class="text-right">1</td>
                                                  <td class="text-right">$30.00</td>
                                                  <td class="text-right">$30.00</td>
                                              </tr>
                                              <tr>
                                                  <td>2</td>
                                                  <td>Quaestio</td>
                                                  <td>Animal alterum in ius partem delectus ut</td>
                                                  <td class="text-right">3</td>
                                                  <td class="text-right">$75.00</td>
                                                  <td class="text-right">$225.00</td>
                                              </tr>
                                              <tr>
                                                  <td>3</td>
                                                  <td>Offendit Interpretaris</td>
                                                  <td>Eos an laoreet reprehendunt</td>
                                                  <td class="text-right">1</td>
                                                  <td class="text-right">$12.50</td>
                                                  <td class="text-right">$12.50</td>
                                              </tr>
                                              <tr>
                                                  <td>4</td>
                                                  <td>Noluisse</td>
                                                  <td>Malorum assentior eos cu</td>
                                                  <td class="text-right">1</td>
                                                  <td class="text-right">$20.00</td>
                                                  <td class="text-right">$20.00</td>
                                              </tr>
                                              <tr>
                                                  <td>5</td>
                                                  <td>Wisi Blandit</td>
                                                  <td>Vix an omnis elitr</td>
                                                  <td class="text-right">4</td>
                                                  <td class="text-right">$150.00</td>
                                                  <td class="text-right">$600.00</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="col-md-12">
                          <div class="row" style="border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px;">
                              <div class="col-md-3 col-md-offset-9">
                                  <p class="text-right"><strong>SUB TOTAL: $887.50</strong></p>
                                  <p class="text-right">DISCOUNT: 12.5%</p>
                                  <p class="text-right">VAT: 15%</p>
                                  <hr>
                                  <h3 class="text-right text-danger" style="font-weight: bold;">USD 893.05</h3>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <div class="pull-right">
                              <a href="javascript:window.print()" class="btn btn-inverse"><i class="fa fa-print"></i></a>
                              <a href="#" class="btn btn-primary">Submit</a>
                          </div>
                      </div>
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
<script>
$(document).ready(function() {
    var max_fields      = 150; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment

            $(wrapper).append('<div><div class ="col-xs-6 form-group"><input type="text" class="form-control" name="addItem[]" id="email"></div><div class ="col-xs-2 form-group"><input type="text" class="form-control" name="addItem[]" id="email"></div><div class ="col-xs-2 form-group"><input type="text" class="form-control" name="addItem[]" id="email"></div><a href="#" class="remove_field btn btn-danger col-xs-1  form-group"><i class="fa fa-minus" aria-hidden="true"></i></a></div>'); //add input box
        }
    });
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
<script type="text/javascript" src="js/table/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/table/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="js/table/demo-datatables.js"></script>
</body>
</html>
