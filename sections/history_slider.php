
    <section class="slider-section">
      <div class="slider-section-header">
        <div class="slider-header-label">Legacy &amp; Heritage</div>
        <h2 class="slider-header-title">FROM THE ARCHIVES<br>OF OUR HISTORY</h2>
      </div>

      <div class="slider-container">
        <div class="slider-wrapper">
          <div class="slider-track">
            <?php foreach ($slides as $s) : ?>
            <div class="slider-slide" style="background-image: url('<?php echo $s['bg']; ?>');">
              <div class="<?php echo $s['overlay']; ?>">
                <h3 class="slide-title"><?php echo $s['title']; ?></h3>
                <p class="<?php echo $s['pdesc']; ?>"><?php echo $s['desc']; ?></p>
                <span class="slide-btn"><?php echo $s['num']; ?></span>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <button class="slider-btn prev-btn" id="sliderPrevBtn" aria-label="Previous slide">
          <i class="bi bi-chevron-left"></i>
        </button>
        <button class="slider-btn next-btn" id="sliderNextBtn" aria-label="Next slide">
          <i class="bi bi-chevron-right"></i>
        </button>

        <div class="slider-indicators">
          <?php foreach ($slides as $i => $s) : ?>
          <button class="indicator <?php echo $i === 0 ? 'active' : ''; ?>" data-slide="<?php echo $i; ?>" aria-label="Slide <?php echo $i + 1; ?>"></button>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
<script>
   $slides = [
        [
            'bg'      => 'images/gallery11.jpg',
            'title'   => 'Aircraft Preservation &amp; Storage Unit',
            'desc'    => 'The museum was first established as a fully fledged formation in 1993 as the Aircraft Preservation and Storage Unit at Air Force Base Ratmalana, with the intention of preserving the history of aviation in Sri Lanka and the history of the SLAF.',
            'num'     => '01',
            'overlay' => 'slide-overlay',
            'pdesc'   => 'slide-description',
        ],
        [
            'bg'      => 'images/gallery9.jpg',
            'title'   => 'Museum Restructured',
            'desc'    => 'The present form of the museum was initiated by Air Chief Marshal WDMRJ Goonetileke, the 12th Commander of the Sri Lanka Air Force, who initiated a special project in 2008 with the intention of modernising the Museum.',
            'num'     => '02',
            'overlay' => 'slide-overlays',
            'pdesc'   => 'slide-descriptions',
        ],
        [
            'bg'      => 'images/gallery10.jpg',
            'title'   => 'Aviation Research Reference Library',
            'desc'    => 'A comprehensive Aviation Research Reference Library was opened on 11th March 2013 under the continuous modernising efforts initiated by Air Marshal HD Abeywickrama, enriching the knowledge base of the museum.',
            'num'     => '03',
            'overlay' => 'slide-overlay',
            'pdesc'   => 'slide-description',
        ],
        [
            'bg'      => 'images/gallery12.jpg',
            'title'   => 'Scale Model Workshop',
            'desc'    => 'A fully fledged Craft Lab was integrated into the facility on 19th September 2014 under the patronage of Air Marshal KA Gunathilake, enabling the creation of detailed scale models of SLAF aircraft.',
            'num'     => '04',
            'overlay' => 'slide-overlays',
            'pdesc'   => 'slide-descriptions',
        ],
    ];
</script>