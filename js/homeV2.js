// =========================================
// NAVBAR — scroll blur effect
// =========================================

const navbar = document.getElementById('navbar');

window.addEventListener('scroll', () => {
  navbar.classList.toggle('scrolled', window.scrollY > 50);

  // Scroll to top button visibility
  scrollTopBtn.classList.toggle('visible', window.scrollY > 300);
});


// =========================================
// NAVBAR — mobile toggle
// =========================================

const mobileToggle = document.getElementById('mobileToggle');
const navList      = document.getElementById('navList');

if (mobileToggle && navList) {
  mobileToggle.addEventListener('click', () => {
    const isOpen = navList.classList.toggle('active');
    mobileToggle.className = isOpen
      ? 'bi bi-x mobile-nav-toggle'
      : 'bi bi-list mobile-nav-toggle';
  });
}


// =========================================
// NAVBAR — mobile accordion dropdowns
// =========================================

document.querySelectorAll('#navList .has-dropdown > a').forEach(link => {
  link.addEventListener('click', function (e) {
    if (window.innerWidth <= 1000) {
      e.preventDefault();
      const parent  = this.parentElement;
      const wasOpen = parent.classList.contains('mobile-open');

      // Close all siblings first
      parent.parentElement.querySelectorAll('.has-dropdown').forEach(el => {
        if (el !== parent) el.classList.remove('mobile-open');
      });

      parent.classList.toggle('mobile-open', !wasOpen);
    }
  });
});


// =========================================
// SCROLL TO TOP BUTTON
// =========================================

const scrollTopBtn = document.getElementById('scrollTopBtn');

scrollTopBtn.addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});


// =========================================
// FOOTER — auto year
// =========================================

const yearEl = document.getElementById('footerYear');
if (yearEl) yearEl.textContent = new Date().getFullYear();


// =========================================
// SCROLL REVEAL ANIMATION
// =========================================

const revealEls = document.querySelectorAll('.reveal');

const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      revealObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.12 });

revealEls.forEach(el => revealObserver.observe(el));


// =========================================
// HEADING FADE-IN ON SCROLL
// =========================================

const headingObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('in-view');
      headingObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.2 });

document.querySelectorAll('.reveal-heading').forEach(el => {
  headingObserver.observe(el);
});

function renderMiniCalendar() {
    const cal = document.getElementById('mini-calendar');
    const now = new Date();
    const year = now.getFullYear();
    const month = now.getMonth();

    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    let html = `
        <table>
            <tr><th colspan="7" style="color:#ffd700; font-size:1.05rem; padding-bottom:14px;">
                ${now.toLocaleString('default', { month: 'long' })} ${year}
            </th></tr>
            <tr style="color:#ffd700; font-size:0.9rem;">
                <th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th>
            </tr><tr>`;

    for (let i = 0; i < firstDay; i++) html += '<td></td>';

    for (let d = 1; d <= daysInMonth; d++) {
        const isMonday = new Date(year, month, d).getDay() === 1;
        const isToday = (d === now.getDate() && month === now.getMonth() && year === now.getFullYear());
        let cls = isToday ? 'today' : (isMonday ? 'closed' : '');
        html += `<td class="${cls}">${d}</td>`;
        if ((firstDay + d) % 7 === 0) html += '</tr><tr>';
    }
    html += '</tr></table>';
    cal.innerHTML = html;
}

// Run when page loads
window.onload = renderMiniCalendar;