
    function navigateSlide(direction) {
        var slides = document.querySelectorAll('.slides-item');
        var currentIndex = -1;

        // Cari index slide aktif
        for (var i = 0; i < slides.length; i++) {
            if (slides[i].classList.contains('active')) {
                currentIndex = i;
                break;
            }
        }

        // Tentukan index slide yang akan ditampilkan berikutnya atau sebelumnya
        var nextIndex;
        if (direction === 'next') {
            nextIndex = (currentIndex + 1) % slides.length; // Jika di item paling kanan, kembali ke item paling kiri
        } else {
            nextIndex = (currentIndex - 1 + slides.length) % slides.length; // Jika di item paling kiri, pergi ke item paling kanan
        }

        // Tampilkan slide berikutnya atau sebelumnya
        for (var i = 0; i < slides.length; i++) {
            slides[i].classList.remove('active');
            slides[i].querySelector('.indicator').classList.remove('active');
        }
        slides[nextIndex].classList.add('active');
        slides[nextIndex].querySelector('.indicator').classList.add('active');
    }

    // Panggil fungsi navigateSlide() saat tombol arrow diklik
    document.querySelector('.prev-arrow').addEventListener('click', function() {
        navigateSlide('prev');
    });

    document.querySelector('.next-arrow').addEventListener('click', function() {
        navigateSlide('next');
    });
