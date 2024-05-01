<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "admin", "edworks1234", "edworks");

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengambil data dari formulir
$title = $_POST['title'];
$sub_title = $_POST['sub_title'];
$link_shopee = $_POST['link_shopee'];
$link_tokopedia = $_POST['link_tokopedia'];
$gambar = $_FILES['gambar']['tmp_name'];

// Menyimpan gambar ke dalam variabel
$gambarData = addslashes(file_get_contents($gambar)); // Menggunakan addslashes untuk memastikan karakter khusus dalam gambar di-escape

// Menghindari serangan SQL Injection
$title = mysqli_real_escape_string($koneksi, $title);
$sub_title = mysqli_real_escape_string($koneksi, $sub_title);
$link_shopee = mysqli_real_escape_string($koneksi, $link_shopee);
$link_tokopedia = mysqli_real_escape_string($koneksi, $link_tokopedia);

// Query untuk menambahkan data baru ke dalam tabel promo
$query = "INSERT INTO promo (title, sub_title, link_shopee, link_tokopedia, gambar) VALUES ('$title', '$sub_title', '$link_shopee', '$link_tokopedia', '$gambarData')";

// Eksekusi query
$result = mysqli_query($koneksi, $query);

// Periksa apakah data berhasil ditambahkan
if ($result) {
    // Menampilkan alert jika data berhasil ditambahkan
    echo '<script>alert("Data berhasil ditambahkan");</script>';
    // Mengarahkan pengguna kembali ke halaman admin-promo.php
    echo '<script>window.location.href = "../admin-promo.php";</script>';
} else {
    echo "Gagal menambahkan data: " . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>
