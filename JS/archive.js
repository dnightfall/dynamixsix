// Membuat fungsi untuk menampilkan kotak popup
function showPopup() {
    // Membuat elemen div untuk kotak popup
    var popup = document.createElement("div");
    popup.className = "popup";

    // Mengatur ukuran kotak popup
    popup.style.width = "740px";
    popup.style.height = "528px";

    // Menambahkan konten ke dalam kotak popup
    popup.innerHTML = `
        <h2>Popup Title</h2>
        <p id="popup-content">This is the content of the popup.</p>
        <button onclick="closePopup()">Close</button>
    `;

    // Menambahkan kotak popup ke dalam elemen body
    document.body.appendChild(popup);

    // Menambahkan event listener untuk menutup kotak popup saat klik di luar kotak
    setTimeout(function() {
        popup.classList.add("active");
    }, 50);
}

// Fungsi untuk menutup kotak popup ketika tombol "Close" diklik
function closePopup() {
    var popup = document.querySelector(".popup");
    popup.parentNode.removeChild(popup);
}

// Fungsi untuk mengubah konten kotak popup
function editContent(newContent) {
    var content = document.getElementById("popup-content");
    content.textContent = newContent;
}

