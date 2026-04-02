/* =========================
NAVBAR BLUR ON SCROLL
========================= */

window.addEventListener("scroll", function(){

const navbar = document.getElementById("navbar");

if(window.scrollY > 50){
navbar.classList.add("scrolled");
}
else{
navbar.classList.remove("scrolled");
}

});


/* =========================
MOBILE MENU TOGGLE
========================= */

const toggle = document.querySelector(".mobile-nav-toggle");
const navMenu = document.querySelector(".navbar ul");

if(toggle){

toggle.addEventListener("click", function(){

navMenu.classList.toggle("active");

});

}

document.addEventListener('DOMContentLoaded', function () {

  // Disable Swiper for info section and show all slides
  var infoSlider = document.querySelector('.info .testimonials-slider');
  if (infoSlider && infoSlider.swiper) {
    infoSlider.swiper.destroy(true, true);
  }

  // Scroll reveal
  const infoItems = document.querySelectorAll('.info .testimonial-item');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });

  infoItems.forEach(item => observer.observe(item));

});