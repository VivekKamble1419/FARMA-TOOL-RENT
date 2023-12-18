

let currentIndex = 0;
const totalSlides = document.querySelectorAll('.slide1').length;
const slider1 = document.querySelector('.slider1');

function changeSlide(direction) {
    currentIndex += direction;
    if (currentIndex === totalSlides) {
        currentIndex = 0;
    } else if (currentIndex < 0) {
        currentIndex = totalSlides - 1;
    }
    updateSlider();
}

function updateSlider() {
    const translateValue = -currentIndex * 100 + '%';
    slider1.style.transform = 'translateX(' + translateValue + ')';
}

setInterval(() => {
    changeSlide(1);
}, 5000); // Change slide every 5 seconds




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
