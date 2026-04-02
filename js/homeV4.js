/* ============================================================
   SLAF MUSEUM — homeV4.js
   Sections:
   1.  Navigation (mobile toggle + scroll hide/show)
   2.  Video Section (autoplay handling)
   3.  Hangar Carousel (gallery with infinite loop)
   4.  Our History Slider (auto-advancing slider)
   5.  Services Parallax
   6.  Smooth Scroll for anchor links
   7.  Reveal on Scroll (IntersectionObserver)
============================================================ */

document.addEventListener('DOMContentLoaded', function () {


  // ==================== SECTION 1: NAVIGATION ====================

  const navbar       = document.getElementById('navbar');
  const mobileToggle = document.getElementById('mobileToggle');
  const navMenu      = document.getElementById('navMenu');

  // — Mobile nav toggle —
  if (mobileToggle && navMenu) {
    mobileToggle.addEventListener('click', function (e) {
      e.stopPropagation();
      const isOpen = navMenu.classList.toggle('nav-open');
      mobileToggle.style.transform = isOpen ? 'rotate(90deg)' : 'rotate(0deg)';
    });

    // Close when clicking outside
    document.addEventListener('click', function (event) {
      if (!navMenu.contains(event.target) && !mobileToggle.contains(event.target)) {
        navMenu.classList.remove('nav-open');
        mobileToggle.style.transform = 'rotate(0deg)';
      }
    });

    // Close when a link is tapped on mobile
    navMenu.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        if (window.innerWidth <= 1000) {
          navMenu.classList.remove('nav-open');
          mobileToggle.style.transform = 'rotate(0deg)';
        }
      });
    });
  }

  // — Scroll: hide navbar when scrolling down, show when scrolling up —
  let lastScrollY    = window.scrollY;
  let scrollRafId    = null;
  let navbarVisible  = true;

  function handleNavbarScroll() {
    const currentScrollY = window.scrollY;

    // Add 'scrolled' class for backdrop blur effect
    if (currentScrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }

    // Smooth hide/show based on scroll direction
    // Only trigger after scrolling past the navbar height to avoid jitter at the top
    if (currentScrollY > navbar.offsetHeight) {
      if (currentScrollY > lastScrollY && navbarVisible) {
        // Scrolling DOWN — hide
        navbar.classList.add('hidden');
        navbarVisible = false;
        // Close mobile menu if open
        navMenu.classList.remove('nav-open');
        mobileToggle.style.transform = 'rotate(0deg)';
      } else if (currentScrollY < lastScrollY && !navbarVisible) {
        // Scrolling UP — show
        navbar.classList.remove('hidden');
        navbarVisible = true;
      }
    } else {
      // Always show at the very top
      navbar.classList.remove('hidden');
      navbarVisible = true;
    }

    lastScrollY = currentScrollY <= 0 ? 0 : currentScrollY;
    scrollRafId = null;
  }

  window.addEventListener('scroll', function () {
    if (!scrollRafId) {
      scrollRafId = requestAnimationFrame(handleNavbarScroll);
    }
  }, { passive: true });

  // Run once on load
  handleNavbarScroll();


  // ==================== SECTION 2: VIDEO ====================

  const video = document.getElementById('backgroundVideo');

  if (video) {
    // Attempt autoplay
    const tryPlay = function () {
      video.play().catch(function (err) {
        // Autoplay blocked; try on first user interaction
        document.addEventListener('click', function () {
          video.play().catch(function () {});
        }, { once: true });
      });
    };

    setTimeout(tryPlay, 300);

    // Pause video when out of viewport to save resources
    if ('IntersectionObserver' in window) {
      const videoObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            video.play().catch(function () {});
          } else {
            video.pause();
          }
        });
      }, { threshold: 0.15 });

      videoObserver.observe(video.closest('.video-section') || video);
    }
  }


  // ==================== SECTION 3: HANGAR CAROUSEL ====================

  const track    = document.getElementById('track');
  const viewport = document.getElementById('viewport');
  const dotsWrap = document.getElementById('dots');
  const curNumEl = document.getElementById('curNum');
  const totalEl  = document.getElementById('totalNum');
  const prevBtn  = document.getElementById('prevBtn');
  const nextBtn  = document.getElementById('nextBtn');

  if (track && viewport && prevBtn && nextBtn) {
    const cards      = Array.from(document.querySelectorAll('#track .card'));
    const totalCards = cards.length;
    totalEl.textContent = totalCards;

    let activeIndex = 0; // Start at first card
    let isAnimating = false;

    // Build dot indicators
    cards.forEach(function (_, i) {
      const dot = document.createElement('button');
      dot.className = 'dot';
      dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));
      dot.addEventListener('click', function () { goTo(i); });
      dotsWrap.appendChild(dot);
    });

    const dots = Array.from(dotsWrap.querySelectorAll('.dot'));

    function applyClasses() {
      cards.forEach(function (card, i) {
        const dist = Math.abs(i - activeIndex);
        card.classList.remove('active', 'side');
        if (dist === 0) {
          card.classList.add('active');
        } else if (dist === 1) {
          card.classList.add('side');
        }
      });
      dots.forEach(function (d, i) {
        d.classList.toggle('active', i === activeIndex);
      });
      curNumEl.textContent = activeIndex + 1;
    }

    function slideTrack(instant) {
      if (instant) {
        track.style.transition = 'none';
      } else {
        track.style.transition = 'transform 0.55s ease-in-out';
      }

      requestAnimationFrame(function () {
        const vpCenter   = viewport.offsetWidth / 2;
        const activeCard = cards[activeIndex];
        if (!activeCard) return;
        const cardCenter = activeCard.offsetLeft + activeCard.offsetWidth / 2;
        track.style.transform = 'translateX(' + -(cardCenter - vpCenter) + 'px)';

        if (instant) {
          // Re-enable transitions after one frame
          requestAnimationFrame(function () {
            track.style.transition = '';
          });
        }
      });
    }

    function goTo(i) {
      if (isAnimating) return;
      isAnimating = true;

      // Infinite loop wrap
      if (i < 0) {
        activeIndex = totalCards - 1;
      } else if (i >= totalCards) {
        activeIndex = 0;
      } else {
        activeIndex = i;
      }

      applyClasses();
      slideTrack(false);

      setTimeout(function () {
        isAnimating = false;
      }, 520);
    }

    // Button listeners
    prevBtn.addEventListener('click', function () { goTo(activeIndex - 1); });
    nextBtn.addEventListener('click', function () { goTo(activeIndex + 1); });

    // Keyboard navigation
    document.addEventListener('keydown', function (e) {
      // Only if carousel is in viewport
      const rect = viewport.getBoundingClientRect();
      if (rect.bottom < 0 || rect.top > window.innerHeight) return;

      if (e.key === 'ArrowRight') { e.preventDefault(); goTo(activeIndex + 1); }
      if (e.key === 'ArrowLeft')  { e.preventDefault(); goTo(activeIndex - 1); }
    });

    // Touch swipe support
    let touchStartX = 0;
    viewport.addEventListener('touchstart', function (e) {
      touchStartX = e.touches[0].clientX;
    }, { passive: true });

    viewport.addEventListener('touchend', function (e) {
      const deltaX = e.changedTouches[0].clientX - touchStartX;
      if (Math.abs(deltaX) > 45) {
        goTo(deltaX < 0 ? activeIndex + 1 : activeIndex - 1);
      }
    }, { passive: true });

    // Click non-active cards to navigate
    cards.forEach(function (card) {
      card.addEventListener('click', function () {
        const idx = parseInt(card.dataset.index, 10);
        if (!isNaN(idx) && idx !== activeIndex) {
          goTo(idx);
        }
      });
    });

    // Initialise
    applyClasses();
    slideTrack(true);

    // Re-centre on resize
    let resizeTimer;
    window.addEventListener('resize', function () {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function () {
        slideTrack(true);
      }, 100);
    });
  }


  // ==================== SECTION 4: OUR HISTORY SLIDER ====================

  const sliderPrevBtn = document.getElementById('sliderPrevBtn');
  const sliderNextBtn = document.getElementById('sliderNextBtn');
  const indicators    = document.querySelectorAll('.slider-section .indicator');
  const sliderTrack   = document.querySelector('.slider-section .slider-track');
  const slides        = document.querySelectorAll('.slider-section .slider-slide');

  if (sliderTrack && slides.length) {
    let currentSlide  = 0;
    const totalSlides = slides.length;
    let autoInterval  = null;

    function updateSlider() {
      sliderTrack.style.transform = 'translateX(' + (-currentSlide * 100) + '%)';
      indicators.forEach(function (ind, idx) {
        ind.classList.toggle('active', idx === currentSlide);
      });
    }

    function nextSlide() {
      currentSlide = (currentSlide + 1) % totalSlides;
      updateSlider();
    }

    function prevSlide() {
      currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
      updateSlider();
    }

    function resetAutoplay() {
      clearInterval(autoInterval);
      autoInterval = setInterval(nextSlide, 1600);
    }

    if (sliderNextBtn) {
      sliderNextBtn.addEventListener('click', function () {
        nextSlide();
        resetAutoplay();
      });
    }

    if (sliderPrevBtn) {
      sliderPrevBtn.addEventListener('click', function () {
        prevSlide();
        resetAutoplay();
      });
    }

    indicators.forEach(function (indicator) {
      indicator.addEventListener('click', function () {
        currentSlide = parseInt(this.dataset.slide, 10);
        updateSlider();
        resetAutoplay();
      });
    });

    // Touch swipe for slider
    let sliderTouchStartX = 0;
    sliderTrack.addEventListener('touchstart', function (e) {
      sliderTouchStartX = e.touches[0].clientX;
    }, { passive: true });

    sliderTrack.addEventListener('touchend', function (e) {
      const delta = e.changedTouches[0].clientX - sliderTouchStartX;
      if (Math.abs(delta) > 50) {
        if (delta < 0) { nextSlide(); } else { prevSlide(); }
        resetAutoplay();
      }
    }, { passive: true });

    // Pause autoplay on hover
    const sliderWrapper = document.querySelector('.slider-wrapper');
    if (sliderWrapper) {
      sliderWrapper.addEventListener('mouseenter', function () {
        clearInterval(autoInterval);
      });
      sliderWrapper.addEventListener('mouseleave', function () {
        resetAutoplay();
      });
    }

    // Start
    updateSlider();
    resetAutoplay();
  }


  // ==================== SECTION 8: SERVICES PARALLAX ====================

  const heroImage   = document.getElementById('heroImage');
  const heroSection = document.querySelector('.services .hero-section');

  if (heroImage && heroSection) {
    let parallaxRafId = null;

    function handleParallax() {
      const scrolled     = window.pageYOffset;
      const sectionTop   = heroSection.offsetTop;
      const sectionH     = heroSection.offsetHeight;
      const scrollInSec  = scrolled - sectionTop;

      if (scrollInSec > -window.innerHeight && scrollInSec < sectionH) {
        const shift = scrollInSec * 0.38;
        heroImage.style.transform = 'translateY(' + shift + 'px)';
      }

      parallaxRafId = null;
    }

    window.addEventListener('scroll', function () {
      if (!parallaxRafId) {
        parallaxRafId = requestAnimationFrame(handleParallax);
      }
    }, { passive: true });
  }


  // ==================== SECTION 6: SMOOTH SCROLL ==================== 

  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const targetId = this.getAttribute('href');
      if (targetId === '#') return;
      const target = document.querySelector(targetId);
      if (target) {
        e.preventDefault();
        const offset = navbar ? navbar.offsetHeight + 10 : 100;
        const top = target.getBoundingClientRect().top + window.pageYOffset - offset;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    });
  });


  // ==================== SECTION 7: REVEAL ON SCROLL ====================

  const revealEls = document.querySelectorAll('.reveal');

  if ('IntersectionObserver' in window && revealEls.length) {
    const revealObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    revealEls.forEach(function (el) {
      revealObserver.observe(el);
    });
  } else {
    // Fallback: show all
    revealEls.forEach(function (el) {
      el.classList.add('visible');
    });
  }


  console.log('SLAF Museum — homeV4.js loaded successfully.');

});