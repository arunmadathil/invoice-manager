<div class="navbar navbar-fixed-top">
  <div class="navbar-inner top-nav">
    <div class="container-fluid">
       <ul class="nav pull-right">
        <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php //echo $_SESSION['uname'];?> <span class="alert-noty"></span><i class="white-icons admin_user"></i><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="..\index.php?logout=1"><i class="icon-off"></i><strong>Logout</strong></a></li>
          </ul>
        </li>
      </ul>
      </div>
    </div>
  </div>
</div>
<div id="sidebar">
  <ul class="side-nav accordion_mnu collapsible">
   <!--<li><a href="home.php"><span class="white-icons computer_imac"></span> Home</a></li>-->
   <li><a href="banner.php"><span class="white-icons computer_imac"></span> Banner</a></li>
   <li><a href="about.php"><span class="white-icons computer_imac"></span> About</a></li>
   <li><a href="services.php"><span class="white-icons computer_imac"></span>Aquarium</a></li>
   <li><a href="events.php"><span class="white-icons computer_imac"></span>EVENTS</a></li>
    <li><a href="services-category.php"><span class="white-icons computer_imac"></span>WORKS</a></li>
   <!-->
  <!-- <li><a href="add-offers.php"><span class="white-icons computer_imac"></span>ADD OFFERS</a></li>
   <li><a href="add-packages.php"><span class="white-icons computer_imac"></span>ADD PACKAGES</a></li>
   <!--<li><a href="trainer.php"><span class="white-icons computer_imac"></span>Trainer</a></li>-->
<!--<li><a href="classes.php"><span class="white-icons computer_imac"></span> Classes & Training</a></li>-->
<li><a ='#'><span class="white-icons computer_imac"></span>Gallery</a>
	<ul class="acitem">
	<li><a href="gallery-photos.php"><span class="white-icons computer_imac"></span> Photos</a></li>
	<li><a href="gallery-videos.php"><span class="white-icons computer_imac"></span> Videos</a></li>
	</ul>
</li>
	<li><a href="contact.php"><span class="white-icons computer_imac"></span> Contact</a></li>
	<!--<li><a href="user-request.php"><span class="white-icons computer_imac"></span> User Request</a></li>-->
  </ul>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>

  function showalert(message)
   {
		$("#alerttext").text(message);			
		$("#myAlert").show();
		$('html, body').animate({scrollTop : 0},800);  
		return false;
   }
    function showsuccess(message)
   {
		$("#successtext").text(message);			
		$("#mySuccess").show();
		$('html, body').animate({scrollTop : 0},800);  
		return false;
   }
   
$(document).ready(function(){
    $(".close").click(function(){
        $("#myAlert").hide();
		$("#mySuccess").hide();
    });
});
</script>
