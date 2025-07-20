  
//---------------HEADER-------------------------//
  const header = document.querySelector('.main-header');
  const toggle = document.querySelector('.nav-toggle');
  toggle.addEventListener('click', () => {
    header.classList.toggle('open');
  });
 
//---------------SLIDER-------------------------//
  const slides = document.querySelectorAll(".slide");
  const prev = document.getElementById("prev");
  const next = document.getElementById("next");
  let currentIndex = 0;

  function showSlide(index) {
    const slidesContainer = document.querySelector(".slides");
    const totalSlides = slides.length;
    if (index >= totalSlides) currentIndex = 0;
    else if (index < 0) currentIndex = totalSlides - 1;
    else currentIndex = index;
    
    slidesContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
  }

  prev.addEventListener("click", () => showSlide(currentIndex - 1));
  next.addEventListener("click", () => showSlide(currentIndex + 1));

  // Auto-slide (opcional)
  setInterval(() => {
    showSlide(currentIndex + 1);
  }, 5000); // cambia cada 5 segundos

  // Inicializar
  showSlide(0);

//---------------FOOTER-------------------------//
  const yearSpan = document.getElementById('current-year');
  document.addEventListener('DOMContentLoaded', () => {
    if(yearSpan){
      yearSpan.textContent = new Date().getFullYear();
    }
  }
);
//---------------FOOTER-------------------------//
