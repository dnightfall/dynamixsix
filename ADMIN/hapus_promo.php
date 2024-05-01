<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "admin", "edworks1234", "edworks");

// Periksa apakah parameter ID disediakan
if(isset($_GET['id'])) {
    // Ambil ID dari parameter URL
    $id = $_GET['id'];

    // Query untuk menghapus data dari tabel promo
    $query = "DELETE FROM promo WHERE id='$id'";
    
    // Eksekusi query
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah data berhasil dihapus
    if ($result) {
        // Menampilkan alert jika data berhasil dihapus
        echo '<script>alert("Data berhasil dihapus");</script>';
    } else {
        // Menampilkan alert jika gagal menghapus data
        echo '<script>alert("Gagal menghapus data");</script>';
    }
} else {
    // Jika parameter ID tidak disediakan, redirect ke halaman admin-promo.php
    header("Location: admin-promo.php");
    exit();
}

// Redirect ke halaman admin-promo.php
echo '<script>window.location.href = "../admin-promo.php";</script>';

// Tutup koneksi
mysqli_close($koneksi);
?>
