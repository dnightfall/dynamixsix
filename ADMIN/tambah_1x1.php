<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "admin", "edworks1234", "edworks");

// Periksa apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $sub_title_desc = $_POST['sub_title_desc'];
    $gambar = $_FILES['1x1']['tmp_name'];
    $gambarData = addslashes(file_get_contents($gambar));
    
    // Query untuk mengupdate data di tabel 1x1
    $query = "UPDATE 1x1 SET title='$title', sub_title='$sub_title', sub_title_desc='$sub_title_desc', 1x1='$gambarData' LIMIT 1";
    
    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil diupdate.'); window.location = '../admin-1x1.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data.'); window.location = '../admin-1x1.php';</script>";
    }
}

// Query untuk mengambil data dari tabel 1x1
$query_select = "SELECT * FROM 1x1 LIMIT 1";
$result = mysqli_query($koneksi, $query_select);

// Periksa apakah query berhasil dieksekusi
if ($result && mysqli_num_rows($result) > 0) {
    // Ambil baris pertama dari hasil query
    $row = mysqli_fetch_assoc($result);
} else {
    // Tampilkan pesan jika data tidak ditemukan atau query gagal dieksekusi
    echo "Data tidak ditemukan atau terjadi kesalahan.";
}
?>

