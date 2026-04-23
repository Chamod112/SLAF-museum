<?php

/*
 * Gallery images array.
 * To add a new photo: push another entry into $galleryImages.
 *   'src'     => image path relative to gallery.php
 *   'caption' => short label shown on hover & in lightbox
 *   'cat'     => filter category: aircraft | flight | museum | events
 *   'size'    => layout hint: small | medium | large | wide | tall
 *                JS also reads the real aspect ratio and fine-tunes flex-grow.
 */
$galleryImages = [
    ['src' => 'images/gallery1.png',  'caption' => 'Historic Aircraft Display',       'cat' => 'aircraft', 'size' => 'large'],
    ['src' => 'images/gallery2.png',  'caption' => 'Formation Flight',                'cat' => 'flight',   'size' => 'medium'],
    ['src' => 'images/gallery3.png',  'caption' => 'Cockpit Interior',                'cat' => 'aircraft', 'size' => 'small'],
    ['src' => 'images/gallery4.png',  'caption' => 'Museum Hangar',                   'cat' => 'museum',   'size' => 'wide'],
    ['src' => 'images/gallery5.png',  'caption' => 'Ceremonial Parade',               'cat' => 'events',   'size' => 'medium'],
    ['src' => 'images/gallery6.png',  'caption' => 'Engine Detail',                   'cat' => 'aircraft', 'size' => 'small'],
    ['src' => 'images/gallery7.png',  'caption' => 'SLAF Veterans',                   'cat' => 'events',   'size' => 'medium'],
    ['src' => 'images/gallery8.png',  'caption' => 'Air Defence Radar',               'cat' => 'museum',   'size' => 'tall'],
    ['src' => 'images/gallery9.jpg',  'caption' => 'Aerial View — Ratmalana',         'cat' => 'flight',   'size' => 'wide'],
    ['src' => 'images/gallery10.jpg', 'caption' => 'Jet Aircraft on Display',         'cat' => 'aircraft', 'size' => 'large'],
    ['src' => 'images/gallery11.jpg', 'caption' => 'Award Ceremony',                  'cat' => 'events',   'size' => 'medium'],
    ['src' => 'images/gallery12.jpg', 'caption' => 'Propeller Detail',                'cat' => 'aircraft', 'size' => 'small'],
    ['src' => 'images/gallery13.jpg', 'caption' => 'Museum Visitors',                 'cat' => 'museum',   'size' => 'medium'],
];

$categories = [
    'all'      => 'All Photos',
    'aircraft' => 'Aircraft',
    'flight'   => 'Flight',
    'museum'   => 'Museum',
    'events'   => 'Events',
];

$total = count($galleryImages);
?>

<section class="gallery-section">

  <!-- Filter bar -->
  <div class="gallery-filters">
    <?php foreach ($categories as $slug => $label): ?>
      <button
        class="gallery-filter-btn <?php echo $slug === 'all' ? 'active' : ''; ?>"
        data-filter="<?php echo htmlspecialchars($slug); ?>"
      ><?php echo htmlspecialchars($label); ?></button>
    <?php endforeach; ?>
  </div>

  <!-- Masonry flex grid -->
  <div class="gallery-grid" id="galleryGrid">
    <?php foreach ($galleryImages as $img): ?>
      <div
        class="gallery-item size-<?php echo htmlspecialchars($img['size']); ?>"
        data-cat="<?php echo htmlspecialchars($img['cat']); ?>"
      >
        <img
          src="<?php echo htmlspecialchars($img['src']); ?>"
          alt="<?php echo htmlspecialchars($img['caption']); ?>"
          loading="lazy"
          onload="adjustItem(this)"
        >
        <div class="gallery-item-overlay">
          <span class="gallery-item-caption"><?php echo htmlspecialchars($img['caption']); ?></span>
          <button class="gallery-item-zoom" aria-label="View full image">
            <i class="bi bi-arrows-fullscreen"></i>
          </button>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <p class="gallery-count">
    Showing <span id="visibleCount"><?php echo $total; ?></span> of <?php echo $total; ?> photos
  </p>

</section>

<!-- Lightbox -->
<div class="gallery-lightbox" id="galleryLightbox" role="dialog" aria-modal="true" aria-label="Image viewer">
  <button class="lightbox-close" id="lightboxClose" aria-label="Close"><i class="bi bi-x-lg"></i></button>
  <button class="lightbox-prev"  id="lightboxPrev"  aria-label="Previous"><i class="bi bi-chevron-left"></i></button>
  <button class="lightbox-next"  id="lightboxNext"  aria-label="Next"><i class="bi bi-chevron-right"></i></button>
  <div class="lightbox-inner">
    <img id="lightboxImg" src="" alt="">
    <p  id="lightboxCaption" class="lightbox-caption"></p>
  </div>
</div>

<script>
/* Adjust flex-grow to match each image's real aspect ratio */
function adjustItem(img) {
  const item  = img.closest('.gallery-item');
  const ratio = img.naturalWidth / img.naturalHeight;
  item.style.flexGrow  = ratio.toFixed(3);
  item.style.flexBasis = (ratio * 200) + 'px';
}

/* ---- Filter ---- */
const filterBtns = document.querySelectorAll('.gallery-filter-btn');
const items      = document.querySelectorAll('.gallery-item');
const countEl    = document.getElementById('visibleCount');

filterBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    filterBtns.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const filter = btn.dataset.filter;
    let visible  = 0;
    items.forEach(item => {
      const show = filter === 'all' || item.dataset.cat === filter;
      item.classList.toggle('hidden', !show);
      if (show) visible++;
    });
    countEl.textContent = visible;
  });
});

/* ---- Lightbox ---- */
const lightbox    = document.getElementById('galleryLightbox');
const lbImg       = document.getElementById('lightboxImg');
const lbCap       = document.getElementById('lightboxCaption');
const lbClose     = document.getElementById('lightboxClose');
const lbPrev      = document.getElementById('lightboxPrev');
const lbNext      = document.getElementById('lightboxNext');
let currentIndex  = 0;
let currentItems  = [];

function openLightbox(idx) {
  currentItems = [...document.querySelectorAll('.gallery-item:not(.hidden)')];
  currentIndex = idx;
  showItem();
  lightbox.classList.add('open');
  document.body.style.overflow = 'hidden';
}

function showItem() {
  const item = currentItems[currentIndex];
  lbImg.src  = item.querySelector('img').src;
  lbImg.alt  = item.querySelector('img').alt;
  lbCap.textContent = item.querySelector('.gallery-item-caption').textContent;
  lbPrev.style.visibility = currentIndex > 0 ? 'visible' : 'hidden';
  lbNext.style.visibility = currentIndex < currentItems.length - 1 ? 'visible' : 'hidden';
}

function closeLightbox() {
  lightbox.classList.remove('open');
  document.body.style.overflow = '';
}

lbClose.addEventListener('click', closeLightbox);
lightbox.addEventListener('click', e => { if (e.target === lightbox) closeLightbox(); });
lbPrev.addEventListener('click', () => { if (currentIndex > 0) { currentIndex--; showItem(); } });
lbNext.addEventListener('click', () => { if (currentIndex < currentItems.length - 1) { currentIndex++; showItem(); } });

document.addEventListener('keydown', e => {
  if (!lightbox.classList.contains('open')) return;
  if (e.key === 'Escape')     closeLightbox();
  if (e.key === 'ArrowLeft')  { if (currentIndex > 0) { currentIndex--; showItem(); } }
  if (e.key === 'ArrowRight') { if (currentIndex < currentItems.length - 1) { currentIndex++; showItem(); } }
});

document.querySelectorAll('.gallery-item').forEach(item => {
  const open = () => {
    const visible = [...document.querySelectorAll('.gallery-item:not(.hidden)')];
    openLightbox(visible.indexOf(item));
  };
  item.querySelector('.gallery-item-zoom').addEventListener('click', open);
  item.querySelector('img').addEventListener('click', open);
});
</script>
