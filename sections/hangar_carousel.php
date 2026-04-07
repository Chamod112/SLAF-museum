<?php

$hangars = [
  [
    'num'   => 'MAIN HANGAR',
    'title' => 'Vintage Aircraft',
    'sub'   => 'De Havilland Tiger Moth • Chipmunk TMK.10 • SLAF manufactured aircraft',
    'desc'  => 'Collection of vintage aircraft used by SLAF since inception. Fully restored flying legends. Also houses four additional hangars with picture galleries, vehicles, arms, ordnance, uniforms and a mini-cinema.',
    'img'   => 'https://images.unsplash.com/photo-1556388158-158ea5ccacbd?w=900&q=80',
    'alt'   => 'Main Hangar',
  ],
  [
    'num'   => 'OUTDOOR EXHIBITS',
    'title' => 'Aircraft & Artillery',
    'sub'   => 'LTTE aircraft shot down by SLAF • Wreckage & vehicles • 130mm howitzer',
    'desc'  => 'Positioned in a professionally landscaped area adjacent to the hangar complex. A powerful testimony to the dedication and precision of the Sri Lanka Air Force.',
    'img'   => 'https://images.unsplash.com/photo-1556388158-158ea5ccacbd?w=900&q=80',
    'alt'   => 'Outdoor Exhibits',
  ],
  [
    'num'   => 'HANGAR NO. 01',
    'title' => 'Aviation History',
    'sub'   => 'Historical photographs of SLAF',
    'desc'  => 'Extensive photographic collection depicting the past and present of the SLAF and the rich aviation history of Sri Lanka.',
    'img'   => 'https://images.unsplash.com/photo-1556388158-158ea5ccacbd?w=900&q=80',
    'alt'   => 'Hangar No.01',
  ],
  [
    'num'   => 'HANGAR NO. 02',
    'title' => 'General Exhibits',
    'sub'   => 'Link Trainer simulator • Wright Flyer • Air defence guns • Unit flags',
    'desc'  => 'General exhibits used by the SLAF over the years including the historic Link Trainer simulator model, Wright Flyer replica, air defence guns and flags of Air Force units.',
    'img'   => 'https://images.unsplash.com/photo-1556388158-158ea5ccacbd?w=900&q=80',
    'alt'   => 'Hangar No.02',
  ],
  [
    'num'   => 'HANGAR NO. 03',
    'title' => 'Civil Engineering',
    'sub'   => 'Infrastructure & engineering exhibits',
    'desc'  => 'Dedicated to Civil Engineering exhibits showcasing infrastructure development and engineering heritage of the SLAF.',
    'img'   => 'https://images.unsplash.com/photo-1556388158-158ea5ccacbd?w=900&q=80',
    'alt'   => 'Hangar No.03',
  ],
  [
    'num'   => 'HANGAR NO. 04',
    'title' => 'Vehicles',
    'sub'   => 'Historic Air Force vehicles',
    'desc'  => 'Displays various vehicles used by the Sri Lanka Air Force from the era of the Royal Air Force to the modern day.',
    'img'   => 'https://images.unsplash.com/photo-1556388158-158ea5ccacbd?w=900&q=80',
    'alt'   => 'Hangar No.04',
  ],
  [
    'num'   => 'HANGAR NO. 05',
    'title' => 'Engine Bay',
    'sub'   => 'Aircraft engine collection',
    'desc'  => 'Features a wide range of aircraft engines from vintage aircraft used by the SLAF.',
    'img'   => 'https://images.unsplash.com/photo-1556388158-158ea5ccacbd?w=900&q=80',
    'alt'   => 'Hangar No.05',
  ],
  [
    'num'   => 'HANGAR NO. 06',
    'title' => 'The Knowledge Hub',
    'sub'   => 'Command Research Library',
    'desc'  => 'Declared open on 11 March 2013 by former Commander Air Marshal Harsha Abeywickrama. Contains rare aviation books related to aircraft operated by the SLAF and Royal Ceylon Air Force.',
    'img'   => 'https://images.unsplash.com/photo-1556388158-158ea5ccacbd?w=900&q=80',
    'alt'   => 'Hangar No.06',
  ],
];
?>
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