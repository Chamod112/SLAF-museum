<script src="js/homeV4.js"></script>
<script src="js/main.js"></script>
<?php
$quickLinks = [
  ['label' => 'Home', 'href' => 'index.php'],
  ['label' => 'Exhibits', 'href' => 'exhibits.php'],
  ['label' => 'Gallery', 'href' => 'gallery.php'],
  ['label' => 'Former Commanders', 'href' => 'FormerCommanders.php'],
  ['label' => 'Souvenir Shop', 'href' => 'SouvenirShop.php'],
  ['label' => 'Contact Us', 'href' => 'index.php#contact'],
];

?>
<footer class="footer">
  <div class="footer-content">

    <div class="footer-about">
      <h1>SLAF MUSEUM</h1>
      <div class="footer-tagline">GUARDIANS OF AERIAL HERITAGE</div>
      <p>The Sri Lanka Air Force Museum at Ratmalana preserves and presents the proud history of aviation in Sri Lanka,
        honouring the legacy of the Sri Lanka Air Force since 1951.</p>
    </div>

    <div class="footer-contact">
      <h3>CONTACT US</h3>
      <div class="contact-info">
        <div class="contact-item">
          <span class="contact-icon">📞</span>
          <span><a href="tel:+94112635855">+94 11 2635855</a></span>
        </div>
        <div class="contact-item">
          <span class="contact-icon">✉️</span>
          <span><a href="mailto:museum@airforce.lk">museum@airforce.lk</a></span>
        </div>
        <div class="contact-item">
          <span class="contact-icon">🕐</span>
          <span>Tue &ndash; Sun: 9:00 AM &ndash; 5:00 PM</span>
        </div>
      </div>
      <div class="address">
        <p>Sri Lanka Air Force Museum</p>
        <p>Air Force Base Ratmalana,</p>
        <p>Ratmalana, Sri Lanka</p>
      </div>
    </div>

    <div class="footer-services">
      <h3>QUICK LINKS</h3>
      <ul class="services-list">
        <?php foreach ($quickLinks as $link): ?>
          <li><a href="<?php echo $link['href']; ?>"><?php echo $link['label']; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

  </div>
  <div class="footer-bottom">
    <p>&copy; <?php echo date('Y'); ?> Sri Lanka Air Force Museum. All Rights Reserved.</p>
  </div>
</footer>
</body>
</html>
