<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "admin", "edworks1234", "edworks");

// Periksa apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data dari tabel 1x1
$query = "SELECT * FROM 1x1 LIMIT 1";
$result = mysqli_query($koneksi, $query);

// Periksa apakah query berhasil dieksekusi
if ($result) {
    // Periksa apakah data ditemukan
    if (mysqli_num_rows($result) > 0) {
        // Ambil baris pertama dari hasil query
        $row = mysqli_fetch_assoc($result);
    } else {
        // Tampilkan pesan jika data tidak ditemukan
        echo "Data tidak ditemukan.";
    }
} else {
    // Tampilkan pesan jika query gagal dieksekusi
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
?>

<!Doctype HTML>
<html>
<head>
	<title>Admin Page</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
	<link rel="stylesheet" href="css/admin-styles.css" type="text/css"/>
  <link rel="stylesheet" href="css/admin-button.css" type="text/css"/>
  <link rel="stylesheet" href="css/1x1-button.css" type="text/css"/>
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
<p class="nav"> 1x1 Banner</p>

</div>
	<div class="clearfix"></div>
</div>

	<div class="clearfix"></div>
	<br/>

    <form action="ADMIN/tambah_1x1.php" method="post" enctype="multipart/form-data">
        <label class="label" for="title">Title:</label><br>
        <input class="title-text" type="text" id="title" name="title" value="<?php echo $row['title']; ?>"><br>
        
        <label class="label" for="sub_title">Sub Title:</label><br>
        <input class="title-text" type="text" id="sub_title" name="sub_title" value="<?php echo $row['sub_title']; ?>"><br>
        
        <label class="label" for="sub_title_desc">Sub Title Description:</label><br>
        <textarea class="textarea" id="sub_title_desc" name="sub_title_desc" rows="4"><?php echo $row['sub_title_desc']; ?></textarea><br>
        
        <label class="label" for="1x1">1x1 Image:</label><br>
        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['1x1']); ?>" width="300" height="300px"><br>
        <input type="file" id="1x1" name="1x1"><br>
        
        <input type="submit" value="Submit">
    </form>	
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