let lastScrollTop = 0;
const sectionHeader = document.querySelector(".section-header");

window.addEventListener("scroll", function() {
    let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    if (currentScroll > lastScrollTop) {
        // Scroll down
        sectionHeader.style.top = "-100px"; // Hide section header when scrolling down
    } else {
        // Scroll up
        sectionHeader.style.top = "0"; // Show section header when scrolling up
    }
    lastScrollTop = currentScroll;
});