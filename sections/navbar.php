
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
          <a href="#"><span>HISTORY</span> <i class="bi bi-chevron-down"></i></a>
          <ul class="dropdown-menu multi-level">

            <li class="dropdown">
              <a href="#"><span>THE PAST</span> <i class="bi bi-chevron-down"></i></a>
              <ul class="dropdown">

                <li class="dropdown">
                  <a href="#"><span>FLEDGLING FLIGHT</span><i class="bi bi-chevron-down"></i></a>
                  <ul class="dropdown-submenu">
                    <li><a href="ff_the_beginning.php">IN THE BEGINNING</a></li>
                    <li><a href="ff_men_and_material.php">MEN AND MATERIAL</a></li>
                    <li><a href="ff_early_management.php">EARLY MANAGEMENT</a></li>
                    <li><a href="ff_early_wings.php">EARLY WINGS</a></li>
                    <li><a href="ff_the_raf.php">RAF AND RCYAF</a></li>
                    <li><a href="ff_the_barker.php">BARKER YEARS</a></li>
                    <li><a href="ff_the_first_jets.php">JETS ARRIVE</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a href="#">LEARNING CURVE<i class="bi bi-chevron-down"></i></a>
                  <ul class="dropdown-submenu">
                    <li><a href="lc_setting_things_up.php">SETTING THINGS-UP</a></li>
                    <li><a href="lc_the_winds.php">HISTORY WINDS</a></li>
                    <li><a href="lc_the_riley.php">RILEY HERON</a></li>
                    <li><a href="lc_a_new_commander.php">TASK OVER</a></li>
                    <li><a href="lc_the_sixth.php">SIXTH COMMANDER</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a href="#">COMING OF AGE<i class="bi bi-chevron-down"></i></a>
                  <ul class="dropdown-submenu">
                    <li><a href="coa_development.php">ADMIST GROWING</a></li>
                    <li><a href="coa_doctrine.php">STRATEGY</a></li>
                    <li><a href="coa_operation.php">LIBERATION</a></li>
                    <li><a href="coa_the_zonal.php">ZONAL CONCEPT</a></li>
                    <li><a href="coa_the_roar.php">JETS ONCE AGAIN</a></li>
                    <li><a href="coa_restructure.php">FLYING SQUADRONS</a></li>
                    <li><a href="coa_dawn.php">NEW ERA</a></li>
                    <li><a href="coa_new_millennium.php">NEW MILLENNIUM</a></li>
                  </ul>
                </li>

              </ul>
            </li>

            <li><a href="FormerCommanders.php">FORMER COMMANDERS</a></li>

            <li class="dropdown">
              <a href="#"><span>50TH ANNIVERSARY</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="50th_anniversary.php">SRI LANKA AIR FORCE 50TH ANNIVERSARY MEDAL</a></li>
                <li><a href="50th_coin.php">COMMEMORATIVE COIN</a></li>
                <li><a href="50th_Stamp.php">COMMEMORATIVE STAMP</a></li>
                <li><a href="50th_gallery.php">IMAGE GALLERY</a></li>
                <li><a href="50th_award.php">AWARD OF COLORS TO SLAF FORMATIONS</a></li>
              </ul>
            </li>

          </ul>
        </li>

        <li>
          <a class="nav-link <?php echo ($activePage === 'exhibits') ? 'active' : ''; ?>" href="exhibits.php">EXHIBITS</a>
        </li>

        <li>
          <a class="nav-link <?php echo ($activePage === 'gallery') ? 'active' : ''; ?>" href="gallery.php">GALLERY</a>
        </li>

        <li>
          <a href="index.php#contact">CONTACT US</a>
        </li>

      </ul>

      <i class="bi bi-list mobile-nav-toggle" id="mobileToggle"></i>
    </nav>
