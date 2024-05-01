// script.js

$(document).ready(function() {
    // Variabel untuk menyimpan ID data yang sedang ditampilkan
    var currentId = 1; // Mulai dari ID pertama
    
    // Fungsi untuk memuat data baru dari server berdasarkan ID
    function loadData(id) {
        $.ajax({
            url: 'load_data.php',
            type: 'POST',
            dataType: 'json',
            data: {id: id},
            success: function(data) {
                // Update elemen HTML dengan data baru
                $('.promo-text2').text(data.title);
                $('.promo-text3').text(data.sub_title);
                $('.checkout-text').attr('href', data.add_cart);
                $('.shopee-content img').attr('src', data.link_shopee);
                $('.tokopedia-content img').attr('src', data.link_tokopedia);
                $('.slides-item img').attr('src', 'data:image/jpeg;base64,' + data.gambar);
            },
            error: function(xhr, status, error) {
                // Tampilkan pesan error jika terjadi masalah dalam memuat data
                console.error(error);
            }
        });
    }
    
    // Handler untuk tombol next
    $('.next-arrow').click(function() {
        currentId++; // Tingkatkan ID
        // Memuat data baru berdasarkan ID yang baru
        loadData(currentId);
    });
    
    // Handler untuk tombol prev
    $('.prev-arrow').click(function() {
        currentId--; // Kurangi ID
        // Memuat data baru berdasarkan ID yang baru
        loadData(currentId);
    });
});
