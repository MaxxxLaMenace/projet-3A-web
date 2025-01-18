// Carrousel qui servait à choisir le jeu, mais idée abandonnée car pas esthétique...

const track = document.querySelector('.carousel-track');
const items = document.querySelectorAll('.carousel-item');
const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');
const indicators = document.querySelectorAll('.indicator');

let currentIndex = 0;

function updateCarousel() {
  const itemWidth = items[0].getBoundingClientRect().width;
  track.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
}

function updateIndicators() {
    indicators.forEach((indicator, index) => {
      if (index === currentIndex) {
        indicator.classList.add('active');
      } else {
        indicator.classList.remove('active');
      }
    });
  }

  function autoscroll() {
    currentIndex = (currentIndex < items.length - 1) ? currentIndex + 1 : 0;
    updateCarousel()
    updateIndicators()
  }
  

prevButton.addEventListener('click', () => {
  currentIndex = (currentIndex > 0) ? currentIndex - 1 : items.length - 1;
  updateCarousel();
  updateIndicators();
});

nextButton.addEventListener('click', () => {
  currentIndex = (currentIndex < items.length - 1) ? currentIndex + 1 : 0;
  updateCarousel();
  updateIndicators();
});

// Défilement auto du carrousel
setInterval(autoscroll, 6000);    // toutes les 6 secondes



// Ajuster la taille en cas de redimensionnement de la fenêtre
window.addEventListener('resize', updateCarousel);
