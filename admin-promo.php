<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "admin", "edworks1234", "edworks");

// Query untuk mengambil data dari tabel promo
$query = "SELECT * FROM promo";
$result = mysqli_query($koneksi, $query);
?>
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

<style>
        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            border-collapse: collapse;
            width: max-content;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
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
      <p class="nav"> Promo</p>
    </div>
	<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
	<br/>
	<div class="clearfix"></div>
	<br/>
  <div class="table-container">
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Sub Title</th>
            <th>Link Shopee</th>
            <th>Link Tokopedia</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['sub_title']; ?></td>
                <td><?php echo $row['link_shopee']; ?></td>
                <td><?php echo $row['link_tokopedia']; ?></td>
                <!-- Kolom gambar dengan tombol "View" -->
                <td>
                    <button onclick="viewImage('<?php echo base64_encode($row['gambar']); ?>')">View</button>
                </td>
                <td>
                    <a href="ADMIN/hapus_promo.php?id=<?php echo $row['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
        </table>
    </div>
    <form action="ADMIN/tambah_promo.php" method="POST" enctype="multipart/form-data">
      <label for="title">Title:</label><br>
      <input type="text" id="title" name="title"><br>
      
      <label for="sub_title">Sub Title:</label><br>
      <input type="text" id="sub_title" name="sub_title"><br>
      
      <label for="link_shopee">Link Shopee:</label><br>
      <input type="text" id="link_shopee" name="link_shopee"><br>
      
      <label for="link_tokopedia">Link Tokopedia:</label><br>
      <input type="text" id="link_tokopedia" name="link_tokopedia"><br>
      
      <label for="gambar">Gambar:</label><br>
      <input type="file" id="gambar" name="gambar"><br><br>
      
      <input type="submit" value="Tambah Promo">
    </form>
	  <div class="clearfix"></div>
	  <br/>
	    <div class="clearfix"></div>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function viewImage(imageData) {
        // Dekodekan data gambar dari base64
        var decodedImageData = atob(imageData);
        
        // Buat elemen <img> untuk menampilkan gambar
        var img = document.createElement('img');
        img.src = 'data:image/jpeg;base64,' + imageData;
        img.style.width = '700px'; // Lebar gambar
        img.style.height = '350px'; // Tinggi gambar
        
        // Buat elemen <div> untuk popup window
        var popup = document.createElement('div');
        popup.style.position = 'fixed';
        popup.style.top = '50%';
        popup.style.left = '50%';
        popup.style.width = '700px'; // Lebar popup
        popup.style.height = '400px'; // Tinggi popup
        popup.style.marginLeft = '-350px'; // Setengah dari lebar popup
        popup.style.marginTop = '-200px'; // Setengah dari tinggi popup
        popup.style.backgroundColor = '#fff';
        popup.style.padding = '20px';
        popup.style.border = '1px solid #000';
        popup.style.zIndex = '9999';
        popup.appendChild(img);
        
        // Buat tombol "Close"
        var closeButton = document.createElement('button');
        closeButton.textContent = 'Close';
        closeButton.onclick = function() {
            document.body.removeChild(popup);
        };
        popup.appendChild(document.createElement('br'));
        popup.appendChild(document.createElement('br')); // Tambahkan baris baru
        popup.appendChild(closeButton);
        
        // Tambahkan popup ke dalam <body>
        document.body.appendChild(popup);
    }
</script>

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