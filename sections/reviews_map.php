<?php
$reviews = [
  [
    'initial' => 'R',
    'name'    => 'Roshan P.',
    'stars'   => 5,
    'text'    => '"An incredible experience. The vintage aircraft collection is breathtaking and the staff are very knowledgeable. A must-visit for anyone interested in aviation history."',
  ],
  [
    'initial' => 'S',
    'name'    => 'Samanthi K.',
    'stars'   => 4,
    'text'    => '"We visited with our school group and it was truly educational. The outdoor exhibits and the mini-cinema were our highlights. Highly recommend for families!"',
  ],
  [
    'initial' => 'A',
    'name'    => 'Amara D.',
    'stars'   => 5,
    'text'    => '"Fascinating place that honours the brave men and women of the Air Force. The library and scale model workshop are hidden gems. Well worth the trip to Ratmalana."',
  ],
];
?>
<section class="reviews-section" id="contact">
  <div class="reviews-wrapper">

    <div class="reviews-content">
      <div class="reviews-label">What Visitors Say</div>
      <h2 class="reviews-title">VISITOR<br>REVIEWS.</h2>
      <p class="reviews-description">Hear from those who have walked through our hangars and experienced the proud
        legacy of the Sri Lanka Air Force first-hand.</p>

      <div class="rating-summary">
        <div class="rating-score">4.5</div>
        <div class="rating-details">
          <div class="rating-stars">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-half"></i>
          </div>
          <div class="rating-source">Based on Google Reviews</div>
        </div>
      </div>

      <div class="review-cards">
        <?php foreach ($reviews as $r):
          $filled = (int) $r['stars'];
          $empty = 5 - $filled;
        ?>
          <div class="review-card">
            <div class="review-header">
              <div class="reviewer-avatar"><?php echo htmlspecialchars($r['initial']); ?></div>
              <div class="reviewer-info">
                <div class="reviewer-name"><?php echo htmlspecialchars($r['name']); ?></div>
                <div class="review-stars">
                  <?php for ($i = 0; $i < $filled; $i++): ?><i class="bi bi-star-fill"></i><?php endfor; ?>
                  <?php for ($i = 0; $i < $empty; $i++): ?><i class="bi bi-star"></i><?php endfor; ?>
                </div>
              </div>
              <div class="google-icon"><i class="bi bi-google"></i></div>
            </div>
            <p class="review-text"><?php echo htmlspecialchars($r['text']); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="reviews-stats-panel">

      <div class="stats-panel-label">Our Legacy in Numbers</div>

      <?php
      $stats = [
        ['icon' => 'bi-calendar3',         'value' => 75,  'suffix' => '', 'label' => 'Years of Aviation History'],
        ['icon' => 'bi-airplane',           'value' => 40,  'suffix' => '+', 'label' => 'Aircraft on Display'],
        ['icon' => 'bi-people-fill',        'value' => 500, 'suffix' => 'K+','label' => 'Visitors Welcomed'],
        ['icon' => 'bi-trophy-fill',        'value' => 18,  'suffix' => '+', 'label' => 'Rare Military Honours'],
      ];
      ?>

      <div class="stats-grid">
        <?php foreach ($stats as $s): ?>
          <div class="stat-item">
            <i class="bi <?php echo $s['icon']; ?> stat-icon"></i>
            <div class="stat-number" data-target="<?php echo $s['value']; ?>">
              0<span class="stat-suffix"><?php echo htmlspecialchars($s['suffix']); ?></span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-label"><?php echo htmlspecialchars($s['label']); ?></div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>

  </div>
</section>
<script>
/* Animated counter — triggers once when the stats panel scrolls into view */
(function () {
  const items = document.querySelectorAll(".stat-number");
  if (!items.length) return;

  function animateCounter(el) {
    const target   = parseInt(el.dataset.target, 10);
    const suffix   = el.querySelector(".stat-suffix");
    const suffixTxt = suffix ? suffix.outerHTML : "";
    const duration = 1800;
    const start    = performance.now();

    function step(now) {
      const elapsed  = now - start;
      const progress = Math.min(elapsed / duration, 1);
      /* ease-out cubic */
      const eased    = 1 - Math.pow(1 - progress, 3);
      const current  = Math.floor(eased * target);
      el.innerHTML   = current + suffixTxt;
      if (progress < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.4 });

  items.forEach(el => observer.observe(el));
})();
</script>