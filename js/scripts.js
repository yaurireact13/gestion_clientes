  
//---------------HEADER-------------------------//
// Este bloque controla la apertura/cierre del menú de navegación en el header principal
const header = document.querySelector('.main-header');
const toggle = document.querySelector('.nav-toggle');
toggle.addEventListener('click', () => {
  header.classList.toggle('open'); // Alterna la clase 'open' para mostrar u ocultar el menú
});
 
//---------------SLIDER-------------------------//
// Lógica para el slider de imágenes/banner principal
const slides = document.querySelectorAll(".slide");
const prev = document.getElementById("prev");
const next = document.getElementById("next");
let currentIndex = 0;

// Muestra el slide correspondiente según el índice
function showSlide(index) {
  const slidesContainer = document.querySelector(".slides");
  const totalSlides = slides.length;
  if (index >= totalSlides) currentIndex = 0;
  else if (index < 0) currentIndex = totalSlides - 1;
  else currentIndex = index;
  
  slidesContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Botones para navegar entre slides
prev.addEventListener("click", () => showSlide(currentIndex - 1));
next.addEventListener("click", () => showSlide(currentIndex + 1));

// Auto-slide: cambia de slide automáticamente cada 5 segundos
setInterval(() => {
  showSlide(currentIndex + 1);
}, 5000);

// Inicializa el slider mostrando el primer slide
showSlide(0);

//---------------FOOTER-------------------------//
// Este bloque actualiza el año actual en el footer automáticamente
const yearSpan = document.getElementById('current-year');
document.addEventListener('DOMContentLoaded', () => {
  if(yearSpan){
    yearSpan.textContent = new Date().getFullYear();
  }
}
);
//---------------FOOTER-------------------------//
