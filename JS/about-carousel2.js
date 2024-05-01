document.addEventListener('DOMContentLoaded', function () {
    const prevButton = document.querySelector('.prev-button');
    const nextButton = document.querySelector('.next-button');
    const carouselWrapper = document.querySelector('.carousel-wrapper');
  
    let currentIndex = 0;
    const totalSlides = 4; // Jumlah total slide
    const slideWidth = 360; // Lebar setiap slide
  
    function goToSlide(index) {
      currentIndex = index;
      const offset = -index * slideWidth;
      carouselWrapper.style.transition = "transform 0.5s ease";
      carouselWrapper.style.transform = `translateX(${offset}px)`;
    }
  
    function goToPrevSlide() {
      let newIndex = currentIndex - 1;
      if (newIndex < 0) {
        newIndex = totalSlides - 1; // Kembali ke slide terakhir jika slide pertama
      }
      goToSlide(newIndex);
    }
  
    function goToNextSlide() {
      let newIndex = currentIndex + 1;
      if (newIndex >= totalSlides) {
        newIndex = 0; // Kembali ke slide pertama jika slide terakhir
      }
      goToSlide(newIndex);
    }
  
    prevButton.addEventListener('click', goToPrevSlide);
    nextButton.addEventListener('click', goToNextSlide);
  
    setInterval(goToNextSlide, 3000); // Auto slide every 3 seconds
  });
  