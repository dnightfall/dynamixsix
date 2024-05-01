<!Doctype HTML>
<html>
<head>
	<title>Admin Page</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
	<link rel="stylesheet" href="css/admin-styles.css" type="text/css"/>
  <link rel="stylesheet" href="css/admin-button.css" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="./css/fonts.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
	
	<div id="mySidenav" class="sidenav">
    <p class="logo">EDWORKS <span class="menu">☰</span></p>
    <p class="logo1"> <span class="menu1">☰</span></p>
    <a href="admin-index.php" class="icon-a"><i class="fa fa-dashboard icons"></i>   Main Page</a>
    <a href="#"class="icon-a"><i class="fa fa-shopping-bag icons"></i>   Products</a>
    <a href="#"class="icon-a"><i class="fa fa-list icons"></i>   Archive</a>
    <a href="#"class="icon-a"><i class="fa fa-circle icons"></i>   About Us</a>


</div>
<div id="main">

	<div class="head">
		<div class="col-div-6">
<p class="nav"> Dashboard</p>

</div>
	<div class="clearfix"></div>
</div>

	<div class="clearfix"></div>
	<br/>

	<div class="clearfix"></div>
	<br/>

	
	<div class="col-div-4-1">
		<div class="box-1">
			<div class="content-box-1">
			<p class="head-1">Promo</p>
      <a href="admin-promo.php" class="button-view">View</a>
		</div>
	</div>
	</div>
	<div class="col-div-4-1">
		<div class="box-1">
			<div class="content-box-1">
			<p class="head-1">1x1 Banner</p>
      <a href="admin-1x1.php" class="button-view">View</a>
		</div>
		</div>
	</div>

	
	<div class="clearfix"></div>
	<br/>
	
	
		
	<div class="clearfix"></div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

  $(".menu").click(function(){
    $("#mySidenav").css('width','70px');
    $("#main").css('margin-left','70px');
    $(".logo").css('display', 'none');
    $(".logo1").css('display','block');
    $(".logo span").css('visibility', 'visible');
     $(".logo span").css('margin-left', '-10px');
     $(".icon-a").css('visibility', 'hidden');
     $(".icon-a").css('height', '25px');
     $(".icons").css('visibility', 'visible');
     $(".icons").css('margin-left', '-8px');
      $(".menu1").css('display','block');
      $(".menu").css('display','none');
  });

$(".menu1").click(function(){
    $("#mySidenav").css('width','300px');
    $("#main").css('margin-left','300px');
    $(".logo").css('visibility', 'visible');
    $(".logo").css('display','block');
     $(".icon-a").css('visibility', 'visible');
     $(".icons").css('visibility', 'visible');
     $(".menu").css('display','block');
      $(".menu1").css('display','none');
 });

</script>
<script>
$(document).ready(function(){
  $(".profile p").click(function(){
    $(".profile-div").toggle();
    
  });
  $(".noti-icon").click(function(){
    $(".notification-div").toggle();
  });



  
});
</script>
</body>


</html>