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

    // Periksa koneksi
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Query untuk mengambil data dari tabel promo
    $query = "SELECT * FROM promo";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        // Ambil baris pertama dari hasil query
        $row = mysqli_fetch_assoc($result);
        
        // Inisialisasi variabel-variabel dengan data dari database
        $title = $row['title'];
        $sub_title = $row['sub_title'];
        $link_tokopedia = $row['link_tokopedia'];
        $link_shopee = $row['link_shopee'];
        $add_cart = $row['add_cart'];
        $gambar = base64_encode($row['gambar']); // Encode gambar ke dalam base64
    } else {
        // Tampilkan pesan jika query gagal dieksekusi
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi
    mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="./css/common.css" />
    <link rel="stylesheet" type="text/css" href="./css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="./css/headroom.css" />
    <link rel="stylesheet" type="text/css" href="./css/product.css" />
    <link rel="stylesheet" type="text/css" href="./css/cards.css" />
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
    <main class="home main" style="--src:url(../assets/bg_product.png)">
        <section class="header">
            <div class="section-header">
                <div class="nav">
                    <div class="flex_row">
                        <img class="nav_logo" src="./assets/brand_logo_edworks.png" alt="alt text" />
                        <div class="nav_text">
                            <a href="home.html" class="info">Home</a>
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
        <section class="products">
            <div class="category-box">
                <button class="category-btn">T-Shirt</button>
                <span class="category-separator">|</span>
                <button class="category-btn">Tote Bag</button>
                <span class="category-separator">|</span>
                <button class="category-btn">Bundle</button>
            </div>
        </section>
        <section class="promo">
            <div class="promo-content" style="--src:url(../assets/bg-promo.png)">
                <div class="flex_col">
                    <h1 class="promo-text1">RELEASE/<br>PROMO</h1>
                    <h1 class="promo-text2"><?php echo $title; ?></h1>
                    <h3 class="promo-text3"><?php echo $sub_title; ?></h3>
                    <div class="checkout">
                        <div class="flex_row">
                            <a href="#" class="checkout-text">add to cart</a>
                            <img class="checkout-arrow" src="./assets/arrow_direction_indicator.png" alt="alt text" />
                        </div>
                    </div>
                </div>
                <div class="slides" id="slides-container">
                    <div class="slides-item">
                        <img src="data:image/jpeg;base64,<?php echo $gambar; ?>">
                        <div class="prev-arrow"></div>
                        <div class="next-arrow"></div>
                        <div class="slide-indicators">
                            <div class="indicator active"></div>
                            <div class="indicator"></div>
                            <div class="indicator"></div>
                            <div class="indicator"></div>
                        </div>
                    </div>
                </div>
            
                <div class="shopee">
                    <div class="shopee-content">
                        <a href="<?php echo $link_shopee; ?>"><img src="./assets/shopee.png" alt="Shopee Logo"></a>
                    </div>
                </div>
                <div class="tokopedia">
                    <div class="tokopedia-content">
                        <a href="<?php echo $link_tokopedia; ?>"><img src="./assets/Tokopedia.png" alt="Tokopedia Logo"></a>
                    </div>
                </div>
                <div class="whatsapp">
                    <div class="whatsapp-content">
                        <a href="#"><img src="./assets/whatsapp.png" alt="whatsapp Logo"></a> 
                    </div>
                </div>
                <!-- Add more if needed -->
            </div>
        </section>
        <div class="card-holder">
            <div class="card-container" id="A1">
                <div class="card">
                    <div class="card-image">
                        <img src="assets/FRONT 1.png" alt="Card Image" class="card-image-back">
                        <img src="assets/BACK 1.png" alt="Card Image" class="card-image-front">
                    </div>
                </div>
                <div class="card-description">
                    <h2 class="card-title">WYC Vol.1: Need Money for Porshce</h2>
                    <div class="desc_col">
                        <p class="card-text">150k</p>
                        <img class="card-button" src="assets/Vector.png">
                    </div>
                </div>
            </div>
            <div class="card-container" id="A2">
                <div class="card">
                    <div class="card-image">
                        <img src="assets/FRONT 1.png" alt="Card Image" class="card-image-back">
                        <img src="assets/BACK 1.png" alt="Card Image" class="card-image-front">
                    </div>
                </div>
                <div class="card-description">
                    <h2 class="card-title">WYC Vol.1: Need Money for Porshce</h2>
                    <div class="desc_col">
                        <p class="card-text">150k</p>
                        <img class="card-button" src="assets/Vector.png">
                    </div>
                </div>
            </div>
            <div class="card-container" id="A3">
                <div class="card">
                    <div class="card-image">
                        <img src="assets/FRONT 1.png" alt="Card Image" class="card-image-back">
                        <img src="assets/BACK 1.png" alt="Card Image" class="card-image-front">
                    </div>
                </div>
                <div class="card-description">
                    <h2 class="card-title">WYC Vol.1: Need Money for Porshce</h2>
                    <div class="desc_col">
                        <p class="card-text">150k</p>
                        <img class="card-button" src="assets/Vector.png">
                    </div>
                </div>
            </div>
            <div class="card-container" id="A4">
                <div class="card">
                    <div class="card-image">
                        <img src="assets/FRONT 1.png" alt="Card Image" class="card-image-back">
                        <img src="assets/BACK 1.png" alt="Card Image" class="card-image-front">
                    </div>
                </div>
                <div class="card-description">
                    <h2 class="card-title">WYC Vol.1: Need Money for Porshce</h2>
                    <div class="desc_col">
                        <p class="card-text">150k</p>
                        <img class="card-button" src="assets/Vector.png">
                    </div>
                </div>
            </div>
            <div class="card-container" id="A5">
                <div class="card">
                    <div class="card-image">
                        <img src="assets/FRONT 1.png" alt="Card Image" class="card-image-back">
                        <img src="assets/BACK 1.png" alt="Card Image" class="card-image-front">
                    </div>
                </div>
                <div class="card-description">
                    <h2 class="card-title">WYC Vol.1: Need Money for Porshce</h2>
                    <div class="desc_col">
                        <p class="card-text">150k</p>
                        <img class="card-button" src="assets/Vector.png">
                    </div>
                </div>
            </div>
            <div class="card-container" id="A6">
                <div class="card">
                    <div class="card-image">
                        <img src="assets/FRONT 1.png" alt="Card Image" class="card-image-back">
                        <img src="assets/BACK 1.png" alt="Card Image" class="card-image-front">
                    </div>
                </div>
                <div class="card-description">
                    <h2 class="card-title">WYC Vol.1: Need Money forqqqq Porshce</h2>
                    <div class="desc_col">
                        <p class="card-text">150k</p>
                        <img class="card-button" src="assets/Vector.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-details">
            <div class="left">
                <!-- <img class="left1" src="assets/show-card.png"> -->
            </div>
        </div>
        <section class="bottom-page">
            <div class="bottom-image" style="--src:url(../assets/bottom.png)">
                <div class="bottom-text_col">
                    <div class="bottom-text1">CURATED FROM CREATIVE<br>CULTURE, NOW IN A MORE<br>PHYSICAL, TANGIBLE FORM</div>
                    <div class="bottom-text2">We aim to deliver our value through everyday wears with our graphic t-shirt inspired by creative youth culture by curating music, films. and others cultural stuffs. </div>
                    <img class="bottom-logo" src="assets/brand_logo_edworks.png">
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
    <script src="JS/admin-promo.js"></script>
</body>
</html>