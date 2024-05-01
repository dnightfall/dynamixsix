document.addEventListener('DOMContentLoaded', function () {
  // Carousel 1
  const prevButton1 = document.querySelector('.carousel1 .prev-button');
  const nextButton1 = document.querySelector('.carousel1 .next-button');
  const carouselWrapper1 = document.querySelector('.carousel1 .carousel-wrapper');
  const totalSlides1 = document.querySelectorAll('.carousel1 .carousel-content img').length;
  let currentIndex1 = 0;

  // Carousel 2
  const prevButton2 = document.querySelector('.carousel2 .prev-button');
  const nextButton2 = document.querySelector('.carousel2 .next-button');
  const carouselWrapper2 = document.querySelector('.carousel2 .carousel-wrapper');
  const totalSlides2 = document.querySelectorAll('.carousel2 .carousel-content img').length;
  let currentIndex2 = 0;

  // Carousel 3
  const prevButton3 = document.querySelector('.carousel3 .prev-button');
  const nextButton3 = document.querySelector('.carousel3 .next-button');
  const carouselWrapper3 = document.querySelector('.carousel3 .carousel-wrapper');
  const totalSlides3 = document.querySelectorAll('.carousel3 .carousel-content img').length;
  let currentIndex3 = 0;

  const slideWidth = 360; // Lebar setiap slide

  function goToSlide(wrapper, index) {
      const offset = -index * slideWidth;
      wrapper.style.transition = "transform 0.5s ease";
      wrapper.style.transform = `translateX(${offset}px)`;
  }

  function goToPrevSlide(wrapper, currentIndex, totalSlides) {
      let newIndex = currentIndex - 1;
      if (newIndex < 0) {
          newIndex = totalSlides - 1; // Kembali ke slide terakhir jika slide pertama
      }
      goToSlide(wrapper, newIndex);
      return newIndex;
  }

  function goToNextSlide(wrapper, currentIndex, totalSlides) {
      let newIndex = currentIndex + 1;
      if (newIndex >= totalSlides) {
          newIndex = 0; // Kembali ke slide pertama jika slide terakhir
      }
      goToSlide(wrapper, newIndex);
      return newIndex;
  }

  prevButton1.addEventListener('click', function() {
      currentIndex1 = goToPrevSlide(carouselWrapper1, currentIndex1, totalSlides1);
  });

  nextButton1.addEventListener('click', function() {
      currentIndex1 = goToNextSlide(carouselWrapper1, currentIndex1, totalSlides1);
  });

  prevButton2.addEventListener('click', function() {
      currentIndex2 = goToPrevSlide(carouselWrapper2, currentIndex2, totalSlides2);
  });

  nextButton2.addEventListener('click', function() {
      currentIndex2 = goToNextSlide(carouselWrapper2, currentIndex2, totalSlides2);
  });

  prevButton3.addEventListener('click', function() {
      currentIndex3 = goToPrevSlide(carouselWrapper3, currentIndex3, totalSlides3);
  });

  nextButton3.addEventListener('click', function() {
      currentIndex3 = goToNextSlide(carouselWrapper3, currentIndex3, totalSlides3);
  });

  setInterval(function() {
      currentIndex1 = goToNextSlide(carouselWrapper1, currentIndex1, totalSlides1);
  }, 3000); // Auto slide every 3 seconds

  setInterval(function() {
      currentIndex2 = goToNextSlide(carouselWrapper2, currentIndex2, totalSlides2);
  }, 3000); // Auto slide every 3 seconds

  setInterval(function() {
      currentIndex3 = goToNextSlide(carouselWrapper3, currentIndex3, totalSlides3);
  }, 3000); // Auto slide every 3 seconds
});
