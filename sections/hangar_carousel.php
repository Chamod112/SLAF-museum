<section class="gallery-section" id="hangar">
  <div class="section-head">
    <div>
      <div class="section-label fade-up" data-delay="0">The Collection</div>
      <div class="section-title fade-up" data-delay="1">Museum Hangars</div>
    </div>
  </div>

  <div class="carousel-outer">
    <button class="arrow-btn" id="prevBtn" aria-label="Previous">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
        stroke-linejoin="round">
        <polyline points="15 18 9 12 15 6" />
      </svg>
    </button>
    <button class="arrow-btn" id="nextBtn" aria-label="Next">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
        stroke-linejoin="round">
        <polyline points="9 18 15 12 9 6" />
      </svg>
    </button>

    <div class="carousel-viewport" id="viewport">
      <div class="carousel-track" id="track">
        <?php foreach ($hangars as $index => $h): ?>
          <div class="card" data-index="<?php echo $index; ?>">
            <img src="<?php echo $h['img']; ?>" alt="<?php echo htmlspecialchars($h['alt']); ?>" loading="lazy" />
            <div class="card-overlay"></div>
            <div class="card-caption">
              <div class="card-num"><?php echo $h['num']; ?></div>
              <div class="card-title"><?php echo $h['title']; ?></div>
              <div class="card-sub"><?php echo $h['sub']; ?></div>
              <div class="card-desc"><?php echo $h['desc']; ?></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div class="carousel-foot">
    <div class="dots" id="dots"></div>
    <div class="foot-right">
      <span class="count-label"><strong id="curNum">1</strong> / <span id="totalNum">5</span></span>
    </div>
  </div>
</section>
