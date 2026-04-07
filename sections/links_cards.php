<section class="links-section">
  <div class="links-container">
    <div class="tagline">EXPLORE. DISCOVER. INNOVATE.</div>
    <h1 class="main-heading">See what it takes.</h1>
    <div class="cards-grid">
      <?php foreach ($cards as $c): ?>
        <div class="link-card">
          <img src="<?php echo $c['img']; ?>" alt="<?php echo htmlspecialchars($c['alt']); ?>" class="link-card-image">
          <div class="link-card-overlay">
            <h2 class="link-card-title"><?php echo $c['title']; ?></h2>
            <p class="link-card-description"><?php echo $c['desc']; ?></p>
            <a href="<?php echo $c['href']; ?>" class="link-card-arrow">&#8594;</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<script>
  $cards = [
    [
      'img'   => 'images/linkG.png',
      'alt'   => 'Gallery',
      'title' => 'Gallery',
      'desc'  => 'View stunning aircraft, operations, and heritage photos from the SLAF archives.',
      'href'  => 'gallery.php',
    ],
    [
      'img'   => 'images/linkC.jpg',
      'alt'   => 'Contact',
      'title' => 'Contact',
      'desc'  => 'Connect with us. Reach out with questions, feedback, or visit enquiries.',
      'href'  => 'index.php#contact',
    ],
    [
      'img'   => 'images/linkE.jpg',
      'alt'   => 'Souvenir Shop',
      'title' => 'Souvenir Shop',
      'desc'  => 'Discover exclusive SLAF memorabilia, scale models, and collectibles.',
      'href'  => 'SouvenirShop.php',
    ],
  ];
</script>