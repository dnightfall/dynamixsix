document.addEventListener("DOMContentLoaded", function() {
    const overlay = document.createElement("div");
    overlay.classList.add("overlay");
    document.body.appendChild(overlay);

    const detailBox = document.createElement("div");
    detailBox.classList.add("detail-box");
    document.body.appendChild(detailBox);

    const cardContainers = document.querySelectorAll(".card-container");

    cardContainers.forEach(container => {
        container.addEventListener("click", function() {
            overlay.style.display = "block";
            detailBox.style.display = "block";

            const cardTitle = container.querySelector(".card-title").textContent;
            const cardText = container.querySelector(".card-text").textContent;

            detailBox.innerHTML = `
                <h2>${cardTitle}</h2>
                <p>${cardText}</p>
            `;
        });
    });

    overlay.addEventListener("click", function() {
        overlay.style.display = "none";
        detailBox.style.display = "none";
    });
});
function showDetailBox() {
    const detailBox = document.querySelector('.detail-box');
    detailBox.style.display = 'block';
    // Menyesuaikan posisi detail box agar berada di tengah layar
    const topPos = (window.innerHeight - detailBox.offsetHeight) / 2;
    const leftPos = (window.innerWidth - detailBox.offsetWidth) / 2;
    detailBox.style.top = topPos + 'px';
    detailBox.style.left = leftPos + 'px';
  }
  
  function hideDetailBox() {
    const detailBox = document.querySelector('.detail-box');
    detailBox.style.display = 'none';
  }
  
