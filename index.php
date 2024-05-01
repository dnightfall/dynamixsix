<?php
session_start();

// Inisialisasi variabel $user_email jika pengguna sudah login

if(isset($_SESSION['user_email'])) {
    $dropdown_text = 'Profile';
    $dropdown_link = 'profile.php'; // Ganti dengan halaman profil yang sesuai
    $sign_out_text = 'Sign Out';
    $sign_out_link = 'logout.php'; // Ganti dengan skrip logout yang sesuai
} else {
    $dropdown_text = 'Sign In';
    $dropdown_link = 'login.php'; // Ganti dengan halaman login yang sesuai
}
?>
<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "admin", "edworks1234", "edworks");

// Query untuk mengambil data gambar dari tabel promo
$query = "SELECT * FROM promo";
$result = mysqli_query($koneksi, $query);
?>
<?php
// Query untuk mengambil data dari tabel 1x1
$query_select = "SELECT * FROM 1x1 LIMIT 1";
$result1 = mysqli_query($koneksi, $query_select);

// Periksa apakah query berhasil dieksekusi
if ($result1 && mysqli_num_rows($result1) > 0) {
    // Ambil baris pertama dari hasil query
    $row1 = mysqli_fetch_assoc($result1);
} else {
    // Tampilkan pesan jika data tidak ditemukan atau query gagal dieksekusi
    echo "Data tidak ditemukan atau terjadi kesalahan.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edworks</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="./css/common.css" />
    <link rel="stylesheet" type="text/css" href="./css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="./css/headroom.css" />
    <link rel="stylesheet" type="text/css" href="./css/index.css" />
    <link rel="stylesheet" type="text/css" href="./css/Header.css" />
    <link rel="stylesheet" type="text/css" href="./css/dropdown.css" />
    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sticky-js@1.3.0/dist/sticky.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
</head>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var dropdown = document.querySelector(".nav_prof_container");
    var dropdownContent = document.querySelector("#dropdownContent");

    dropdown.addEventListener("mouseenter", function() {
        dropdownContent.style.display = "block";
    });

    dropdown.addEventListener("mouseleave", function() {
        dropdownContent.style.display = "none"; // Ubah menjadi none saat mouse keluar
    });

    // Menyembunyikan dropdown saat dokumen dimuat
    dropdownContent.style.display = "none";
});
</script>
<body class="flex-column">
    <main class="home main" style="--src:url(../assets/Texturelabs.png);">
        <section class="header">
            <div class="section-header">
                <div class="nav">
                    <div class="flex_row">
                        <img class="nav_logo" src="./assets/brand_logo_edworks.png" alt="alt text"/>
                        <div class="nav_text">
                            <a href="index.php" class="info">Home</a>
                            <a href="product.html" class="nav_detail">Products</a>
                            <a href="archive.html" class="nav_detail">Archive</a>
                            <a href="cart.html" class="nav_detail">Cart</a>
                            <a href="wishlist.html" class="nav_detail">Wishlist</a>
                            <a href="about.html" class="nav_detail">About us</a>
                            <div class="nav_prof_container">
                                <img class="nav_prof" src="./assets/user_avatar_placeholder.png" alt="alt text"/> 
                                <div class="dropdown_content" id="dropdownContent">
                                    <a href="<?php echo $dropdown_link; ?>"><?php echo $dropdown_text; ?></a>
                                    <?php if(isset($sign_out_text)) { ?>
                                        <a href="<?php echo $sign_out_link; ?>"><?php echo $sign_out_text; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="top-page">
            <img class="image-top" src="assets/mixed_collage_images.png" alt="edworks">
        </section>
        <section class="promo">
            <div class="promo-content" style="--src:url(../assets/bg-promo.png)">
                <div class="flex_col">
                    <h1 class="promo-text1">
                        RELEASE/<br>PROMO</h1>
                    <h1 class="promo-text2">Lorem ipsum dolor sit</h1>
                    <h3 class="promo-text3">amet, consectetur adipiscing elit. Quisque tristique cursus elit et scelerisque. Nam efficitur cursus
                        venenatis. Duis sem dui, ornare ac magna at, pulvinar placerat metus. In eu mauris arcu.</h3>
                    <div class="checkout">
                        <div class="flex_row">
                            <a href="#" class="checkout-text">add to cart</a>
                            <img class="checkout-arrow" src="./assets/arrow_direction_indicator.png" alt="alt text" />
                        </div>
                    </div>
                </div>
                <div class="slides" id="slides-container">
                    <?php $index = 0; ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="slides-item">
                            <a href="<?php echo $row['link']; ?>" target="_blank"> <!-- Tambahkan link dari kolom link -->
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['gambar']); ?>"> <!-- Tampilkan gambar dari kolom gambar -->
                            </a>
                            <div class="prev-arrow"></div> <!-- Tombol navigasi ke kiri -->
                            <div class="next-arrow"></div> <!-- Tombol navigasi ke kanan -->
                            <div class="slide-indicators">
                                <?php for ($i = 0; $i < mysqli_num_rows($result); $i++) { ?>
                                    <div class="indicator <?php echo ($index == $i) ? 'active' : ''; ?>"></div> <!-- Tambahkan indikator aktif -->
                                <?php } ?>
                            </div>
                        </div>
                        <?php $index++; ?>
                    <?php } ?>
                </div>
                <div class="shopee">
                    <div class="shopee-content">
                        <img src="./assets/shopee.png" alt="Shopee Logo">
                    </div>
                </div>
                <div class="tokopedia">
                    <div class="tokopedia-content">
                        <img src="./assets/Tokopedia.png" alt="Tokopedia Logo">
                    </div>
                </div>
                <div class="whatsapp">
                    <div class="whatsapp-content">
                        <img src="./assets/whatsapp.png" alt="whatsapp Logo">
                    </div>
                </div>
            </div>
        </section>
        <section class="middle-page">
            <div class="box-middle">
                <div class="text-middle">CULTIVATING<br>YOUTH<br>CREATIVE<br>COULTURE<br>THROUGH<br>DESIGNS.</div>
                <img class="img-middle" src="assets/brand_logo_edworks.png">
            </div>
        </section>
        <section class="bottom-page">
            <img class="bottom-item-left" src="data:image/jpeg;base64,<?php echo base64_encode($row1['1x1']); ?>">
            <div class="borrom-item-right">
                <div class="text-bottom1"><?php echo $row1['title']; ?></div>
                <div class="text-bottom2"><?php echo $row1['sub_title']; ?></div>
                <div class="text-bottom3"><?php echo $row1['sub_title_desc']; ?></div>
                <div class="archive-button">
                    <div class="archive-row">
                        <a href="archive.html" class="archive-text">design archive</a>
                        <img class="archive-arrow" src="./assets/arrow_direction_indicator.png" alt="alt text" />
                    </div>
                </div>
            </div>
        </section>
        <section class="footer">
            <div class="flex_col4">
                <div class="footer_content">
                    <div class="footer_row">
                        <a href="#" class="footer_item">PRODUCTS</a>
                        <a href="#" class="footer_item">ARCHIVE</a>
                        <a href="#" class="footer_item">ABOUT US</a>
                        <a href="#" class="footer_item">CONTACT US</a>
                    </div>
                </div>
                <h3 class="subtitle">2024 EDWORKS DESIGN</h3>
            </div>
        </section>
    </main>
    <script src="JS/header.js"></script>
    <script src="JS/card-detail.js"></script>
    <script src="JS/slide.js"></script>
</body>
</html>