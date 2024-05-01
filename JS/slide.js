document.addEventListener("DOMContentLoaded", function() {
    const prevArrows = document.querySelectorAll(".prev-arrow");
    const nextArrows = document.querySelectorAll(".next-arrow");
    const slides = document.getElementById("slides-container");

    let currentSlideIndex = 0;
    let isAnimating = false;

    // Fungsi untuk perpindahan slide ke slide sebelumnya
    function goToPrevSlide() {
        if (currentSlideIndex > 0 && !isAnimating) {
            currentSlideIndex--;
            updateSlide();
        }
    }

    // Fungsi untuk perpindahan slide ke slide berikutnya
    function goToNextSlide() {
        if (currentSlideIndex < slides.children.length - 1 && !isAnimating) {
            currentSlideIndex++;
            updateSlide();
        }
    }

    // Fungsi untuk memperbarui tampilan slide dengan animasi
    function updateSlide() {
        const targetScroll = currentSlideIndex * slides.offsetWidth;
        const currentScroll = slides.scrollLeft;
        const distance = targetScroll - currentScroll;
        const duration = 500; // Durasi animasi (milidetik)
        const startTime = performance.now();

        isAnimating = true;

        function animate(currentTime) {
            const elapsedTime = currentTime - startTime;
            const progress = Math.min(elapsedTime / duration, 1); // Batasi nilai progress antara 0 dan 1
            slides.scrollLeft = currentScroll + distance * progress;

            if (progress < 1) {
                requestAnimationFrame(animate);
            } else {
                isAnimating = false;
                slides.scrollLeft = targetScroll;
            }
        }

        requestAnimationFrame(animate);
    }

    // Menambahkan event listener untuk tombol panah sebelumnya
    prevArrows.forEach(arrow => {
        arrow.addEventListener("click", goToPrevSlide);
    });

    // Menambahkan event listener untuk tombol panah berikutnya
    nextArrows.forEach(arrow => {
        arrow.addEventListener("click", goToNextSlide);
    });
});
