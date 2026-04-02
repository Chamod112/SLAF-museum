gsap.registerPlugin(ScrollTrigger);

// INIT: Character split for proportional typewriter
const typeLines = document.querySelectorAll('.line1, .line2, #air-f, #zoom-o, #rce, .line4');
typeLines.forEach(el => {
  let text = el.textContent;
  el.innerHTML = '';
  text.split('').forEach(c => {
    let span = document.createElement('span');
    span.textContent = c === ' ' ? '\u00A0' : c;
    span.style.opacity = 0;
    el.appendChild(span);
  });
});



// 1. THE AUTO-TYPEWRITER AND SCROLL "O" EXPANSION

// Auto-Typewriter on load
let introTl = gsap.timeline();
introTl.to(".line1 span, .line2 span, #air-f span, #zoom-o span, #rce span, .line4 span", {
  autoAlpha: 1,
  duration: 0.02,
  stagger: 0.04,
  ease: "none",
  delay: 0.2
});

// "O" Expansion on scroll
let scrollTl = gsap.timeline({
  scrollTrigger: {
    trigger: ".type-writer",
    start: "top top",
    end: "+=2000",
    scrub: 1,
    pin: true,
    anticipatePin: 1
  }
});

scrollTl.to(".line1, .line2, .line4",  { autoAlpha: 0, duration: 1 }, "zoom");
scrollTl.to("#air-f, #rce",            { autoAlpha: 0, duration: 1 }, "zoom");
scrollTl.to(".type-writer-video",      { autoAlpha: 0, duration: 1.5 }, "zoom");
scrollTl.to("#zoom-o",                 { scale: 150, ease: "power2.inOut", duration: 3 }, "zoom");
scrollTl.to("#zoom-o",                 { autoAlpha: 0, duration: 1 }, "-=1");


// 2. INITIAL STATES

gsap.set(".plane-eyebrow",        { autoAlpha: 0, y: 30 });
gsap.set(".plane-heading-wrap",   { autoAlpha: 0, y: 50 });
gsap.set(".plane-subline",        { autoAlpha: 0, y: 20 });
gsap.set(".plane-label-left",     { autoAlpha: 0, x: -25 });
gsap.set(".plane-label-right",    { autoAlpha: 0, x: 25 });
gsap.set(".plane-wrapper",        { autoAlpha: 0, y: 150 });
gsap.set(".plane-shadow",         { autoAlpha: 0, scaleX: 0.1 });

// "About Us" hidden
gsap.set(".plane-heading-new",    { autoAlpha: 0 });

// Left para block hidden
gsap.set(".plane-para-block",     { autoAlpha: 0 });
gsap.set(".plane-gold-sub",       { autoAlpha: 0 });

// Each paragraph starts hidden and far to the RIGHT
gsap.utils.toArray(".plane-about-para").forEach((para) => {
  gsap.set(para, { autoAlpha: 0, x: 300 });
});


// ENTRANCE ANIMATION

let planeEntrancePl = gsap.timeline({
  scrollTrigger: {
    trigger: ".plane-section",
    start: "top 60%",
    once: true,
  },
  defaults: { ease: "power3.out" }
});

planeEntrancePl.to(".plane-eyebrow",      { autoAlpha: 1, y: 0, duration: 0.8 }, 0);
planeEntrancePl.to(".plane-heading-wrap", { autoAlpha: 1, y: 0, duration: 0.9 }, 0.15);
planeEntrancePl.to(".plane-subline",      { autoAlpha: 1, y: 0, duration: 0.8 }, 0.25);
planeEntrancePl.to(".plane-label-left",   { autoAlpha: 1, x: 0, duration: 0.8 }, 0.3);
planeEntrancePl.to(".plane-label-right",  { autoAlpha: 1, x: 0, duration: 0.8 }, 0.4);
planeEntrancePl.to(".plane-wrapper",      { autoAlpha: 1, y: 0, duration: 1.6, ease: "expo.out" }, 0.1);
planeEntrancePl.to(".plane-shadow",       { autoAlpha: 1, scaleX: 1, duration: 1.2, ease: "power2.out" }, 0.85);



//  SCROLL ANIMATION

let planeScrollTl = gsap.timeline({
  scrollTrigger: {
    trigger: ".plane-section",
    start: "top top",
    end: "+=4500",
    scrub: 1,
    pin: true,
    anticipatePin: 1
  }
});

// Plane exits
planeScrollTl.to(".plane-wrapper",    { y: -500, autoAlpha: 0, duration: 1 }, 0);
planeScrollTl.to(".plane-shadow",     { autoAlpha: 0, scaleX: 0, duration: 0.5 }, 0);

// Background + color changes
planeScrollTl.to(".plane-section",    { backgroundColor: "#ffffff", duration: 0.6 }, 0.2);
planeScrollTl.to(".plane-eyebrow",    { autoAlpha: 0, duration: 0.4 }, 0.2);
planeScrollTl.to(".plane-label-left, .plane-label-right", { autoAlpha: 0, duration: 0.5 }, 0.2);
planeScrollTl.to(".plane-subline",    { autoAlpha: 0, duration: 0.25 }, 0.1);

// Text block moves RIGHT → becomes "About Us"
planeScrollTl.to(".plane-text-block", { x: "24vw", duration: 1, ease: "power2.inOut" }, 0.2);
planeScrollTl.to(".plane-heading-old",{ autoAlpha: 0, duration: 0.25 }, 0.38);
planeScrollTl.to(".plane-heading-new",{ autoAlpha: 1, duration: 0.3 }, 0.55);

// Left para block fades in
planeScrollTl.to(".plane-para-block", { autoAlpha: 1, duration: 0.2 }, 0.7);

// Gold sub fades in
planeScrollTl.to(".plane-gold-sub",   { autoAlpha: 1, duration: 0.4 }, 0.72);

// Each paragraph slides in from RIGHT → stops on LEFT one by one
gsap.utils.toArray(".plane-about-para").forEach((para, i) => {
  planeScrollTl.to(para, {
    autoAlpha: 1,
    x: 0,
    duration: 0.5,
    ease: "power2.out"
  }, 0.82 + (i * 0.12));
});


// 3. AIRCRAFT COLLECTION SECTION ANIMATIONS

// Heading hidden initially
gsap.set(".collection-heading",    { autoAlpha: 0, y: 60 });
gsap.set(".collection-subheading", { autoAlpha: 0, y: 30 });

// All slides hidden initially
gsap.set("#slide-1", { y: 60,     autoAlpha: 0 });
gsap.set("#slide-2", { y: "100%", autoAlpha: 0 });
gsap.set("#slide-3", { y: "100%", autoAlpha: 0 });

let collectionTl = gsap.timeline({
  scrollTrigger: {
    trigger: ".collection-section",
    start: "top top",
    end: "+=4000",
    scrub: 1,
    pin: true,
    anticipatePin: 1
  }
});

// Heading fades in, then slide 1 fades up after
collectionTl
  .to(".collection-heading",    { autoAlpha: 1, y: 0, duration: 0.4 }, 0)
  .to(".collection-subheading", { autoAlpha: 1, y: 0, duration: 0.3 }, 0.05)
  .to("#slide-1",               { autoAlpha: 1, y: 0, duration: 0.4, ease: "power2.out" }, 0.2);

// Animation 1: Slide 1 exits UP, Slide 2 enters from BOTTOM
collectionTl
  .to("#slide-1", { y: "-100%", autoAlpha: 0, duration: 0.6, ease: "power2.inOut" }, 0.4)
  .to("#slide-2", { y: "0%",    autoAlpha: 1, duration: 0.6, ease: "power2.inOut" }, 0.4);

// Animation 2: Slide 2 exits UP, Slide 3 enters from BOTTOM
collectionTl
  .to("#slide-2", { y: "-100%", autoAlpha: 0, duration: 0.6, ease: "power2.inOut" }, 0.75)
  .to("#slide-3", { y: "0%",    autoAlpha: 1, duration: 0.6, ease: "power2.inOut" }, 0.75);



// 4. SERVICES SECTION ANIMATIONS

gsap.set(".services-eyebrow",    { autoAlpha: 0, y: 30 });
gsap.set(".services-heading",    { autoAlpha: 0, y: 50 });
gsap.set(".services-subheading", { autoAlpha: 0, y: 20 });
gsap.set("#scard-1",             { autoAlpha: 0, y: 60 });
gsap.set("#scard-2",             { autoAlpha: 0, y: 60 });
gsap.set("#scard-3",             { autoAlpha: 0, y: 60 });

let servicesTl = gsap.timeline({
  scrollTrigger: {
    trigger: ".services-section",
    start: "top 85%",
    end: "bottom 18%",
    scrub: 1,
  }
});

servicesTl
  .to(".services-eyebrow",    { autoAlpha: 1, y: 0, duration: 0.4, ease: "power2.out" }, 0)
  .to(".services-heading",    { autoAlpha: 1, y: 0, duration: 0.5, ease: "power2.out" }, 0.08)
  .to(".services-subheading", { autoAlpha: 1, y: 0, duration: 0.4, ease: "power2.out" }, 0.16)
  .to("#scard-1",             { autoAlpha: 1, y: 0, duration: 0.5, ease: "power2.out" }, 0.26)
  .to("#scard-2",             { autoAlpha: 1, y: 0, duration: 0.5, ease: "power2.out" }, 0.36)
  .to("#scard-3",             { autoAlpha: 1, y: 0, duration: 0.5, ease: "power2.out" }, 0.46);



// 5. GALLERY SECTION — TYPEWRITER + CARD STACK SLIDER

// --- TYPEWRITER ---
const galleryText  = "Frames From The Flightline";
const typewriterEl = document.querySelector(".gallery-typewriter");
const gallerySubEl = document.querySelector(".gallery-subheading");
let   twDone       = false;

ScrollTrigger.create({
  trigger: ".gallery-section",
  start: "top 70%",
  once: true,
  onEnter: () => {
    if (twDone) return;
    twDone = true;
    let i = 0;
    typewriterEl.textContent = "";
    const interval = setInterval(() => {
      typewriterEl.textContent += galleryText[i];
      i++;
      if (i >= galleryText.length) {
        clearInterval(interval);
        gsap.to(gallerySubEl, { opacity: 1, duration: 0.6, ease: "power2.out" });
      }
    }, 80);
  }
});

// --- CARD STACK ---
const totalCards = 8;

// All cards start hidden
for (let i = 1; i <= totalCards; i++) {
  const offset = totalCards - i;
  gsap.set(`#gcard-${i}`, {
    zIndex: i,
    x: offset * 16,
    y: offset * 8,
    scale: 1 - (offset * 0.03),
    autoAlpha: 0
  });
}

let galleryTl = gsap.timeline({
  scrollTrigger: {
    trigger: ".gallery-section",
    start: "top top",
    end: "+=6000",
    scrub: 1,
    pin: true,
    anticipatePin: 1
  }
});

// All cards fully visible, no transparency
galleryTl.to("#gcard-8, #gcard-7, #gcard-6, #gcard-5, #gcard-4", { autoAlpha: 2, duration: 0.2 }, 0.05);

// Each card slides out to the left one by one
const slideOut = "-120vw";
const step     = 1 / 7;

for (let i = totalCards; i >= 2; i--) {
  const pos  = (totalCards - i) * step;
  const next = i - 1;

  galleryTl.to(`#gcard-${i}`, {
    x: slideOut,
    autoAlpha: 0,
    duration: 0.5,
    ease: "power2.inOut"
  }, pos + 0.1);

  galleryTl.to(`#gcard-${next}`, {
    x: 0,
    y: 0,
    scale: 1,
    autoAlpha: 1,
    duration: 0.5,
    ease: "power2.out"
  }, pos + 0.1);
}



// 6. VISITOR SECTION ANIMATIONS

gsap.set(".visitor-eyebrow",      { autoAlpha: 0, y: 30 });
gsap.set(".visitor-heading",      { autoAlpha: 0, y: 50 });
gsap.set(".visitor-subheading",   { autoAlpha: 0, y: 20 });
gsap.set(".visitor-hours-block",  { autoAlpha: 0, x: -40 });
gsap.set(".visitor-notice",       { autoAlpha: 0, y: 30 });
gsap.set(".visitor-fees-heading", { autoAlpha: 0, y: 30 });

gsap.utils.toArray(".visitor-fee-group").forEach((group) => {
  gsap.set(group, { autoAlpha: 0, y: 40 });
});

let visitorTl = gsap.timeline({
  scrollTrigger: {
    trigger: ".visitor-section",
    start: "top 85%",
    end: "bottom 80%",
    scrub: 1,
  }
});

visitorTl
  .to(".visitor-eyebrow",      { autoAlpha: 1, y: 0, duration: 0.4 }, 0)
  .to(".visitor-heading",      { autoAlpha: 1, y: 0, duration: 0.5 }, 0.08)
  .to(".visitor-subheading",   { autoAlpha: 1, y: 0, duration: 0.4 }, 0.14)
  .to(".visitor-hours-block",  { autoAlpha: 1, x: 0, duration: 0.5 }, 0.22)
  .to(".visitor-notice",       { autoAlpha: 1, y: 0, duration: 0.4 }, 0.30)
  .to(".visitor-fees-heading", { autoAlpha: 1, y: 0, duration: 0.4 }, 0.16);

gsap.utils.toArray(".visitor-fee-group").forEach((group, i) => {
  visitorTl.to(group, { autoAlpha: 1, y: 0, duration: 0.4 }, 0.26 + (i * 0.1));
});



// 7. CONTACT SECTION ANIMATIONS

gsap.set(".contact-eyebrow",    { autoAlpha: 0, y: 30 });
gsap.set(".contact-heading",    { autoAlpha: 0, y: 50 });
gsap.set(".contact-subheading", { autoAlpha: 0, y: 20 });
gsap.set(".contact-bg-text",    { autoAlpha: 0, scale: 1.2 });
gsap.set("#ccard-1",            { autoAlpha: 0, y: 60 });
gsap.set("#ccard-2",            { autoAlpha: 0, y: 80 });
gsap.set("#ccard-3",            { autoAlpha: 0, y: 60 });
gsap.set("#contact-location",   { autoAlpha: 0, y: 40 });

let contactTl = gsap.timeline({
  scrollTrigger: {
    trigger: ".contact-section",
    start: "top 85%",
    end: "bottom 80%",
    scrub: 1,
  }
});

contactTl
  .to(".contact-bg-text",    { autoAlpha: 1, scale: 1,  duration: 0.6 }, 0)
  .to(".contact-eyebrow",    { autoAlpha: 1, y: 0, duration: 0.4 }, 0.08)
  .to(".contact-heading",    { autoAlpha: 1, y: 0, duration: 0.5 }, 0.14)
  .to(".contact-subheading", { autoAlpha: 1, y: 0, duration: 0.4 }, 0.20)
  .to("#ccard-1",            { autoAlpha: 1, y: 0, duration: 0.5 }, 0.28)
  .to("#ccard-2",            { autoAlpha: 1, y: 0, duration: 0.5 }, 0.36)
  .to("#ccard-3",            { autoAlpha: 1, y: 0, duration: 0.5 }, 0.44)
  .to("#contact-location",   { autoAlpha: 1, y: 0, duration: 0.5 }, 0.54);