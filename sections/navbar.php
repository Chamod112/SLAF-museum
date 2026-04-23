
    <nav id="navbar" class="navbar">
      <div class="logo">
        <a href="index.php">
          <img src="images/logo.png" alt="SLAF Museum Logo">
        </a>
      </div>

      <ul id="navMenu">

        <li>
          <a class="nav-link <?php echo ($activePage === 'home') ? 'active' : ''; ?>" href="index.php">HOME</a>
        </li>

        <li class="dropdown">
          <a href="history.php"><span>HISTORY</span></a>
        </li>

        <li>
          <a class="nav-link <?php echo ($activePage === 'exhibits') ? 'active' : ''; ?>" href="exhibits.php">EXHIBITS</a>
        </li>

        <li>
          <a class="nav-link <?php echo ($activePage === 'gallery') ? 'active' : ''; ?>" href="gallery.php">GALLERY</a>
        </li>

        <li>
          <a href="contact.php">CONTACT US</a>
        </li>

      </ul>

      <i class="bi bi-list mobile-nav-toggle" id="mobileToggle"></i>
    </nav>
