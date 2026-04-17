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

    <div class="reviews-map-container">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3089.806480425353!2d79.88920747499554!3d6.823862093173958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25ac61680bad9%3A0xb6dbdd061fb17aa8!2sSri%20Lanka%20Air%20Force%20Museum!5e1!3m2!1sen!2slk!4v1776401892657!5m2!1sen!2slk"
        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade" title="SLAF Museum Location">
      </iframe>
    </div>

  </div>
</section>