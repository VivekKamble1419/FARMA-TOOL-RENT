const slides = document.querySelector('.slides');

function nextSlide() {
    slides.style.transition = "transform 0.5s ease-in-out";
    slides.style.transform = "translateX(-100%)";
    setTimeout(() => {
        slides.style.transition = "none";
        slides.appendChild(slides.firstElementChild);
        slides.style.transform = "translateX(0)";
    }, 500);
}

setInterval(nextSlide, 3000); // Change slide every 3 seconds
function toggleMenu() {
    var menu = document.getElementById("menu");
    menu.classList.toggle("show");
}

