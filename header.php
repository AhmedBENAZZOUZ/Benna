<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <img src="assets/img/icon.png" alt="">
      <h1>Benna<span>.</span></h1>
    </a>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="#hero">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#events">Recettes</a></li>
        <li><a href="#chefs">Chefs</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#contact">Contact</a></li>
        <li>
          <!-- <div class="input-container"><i class="bi bi-search icon"></i> <input type="text" class="form-control rr input-field" >
          </div> -->
          <div class="input-group form-outline">
            <input type="search" class="form-control rr" placeholder="Search" />
            <button type="button" class="btn">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </li>
        <?php
        if (isset($_SESSION['id'])) {
          $user_id = $_SESSION['id'];
          $query = "SELECT * FROM `users` WHERE id = '$user_id';";
          $select_profile = mysqli_query($con, $query);
          $fetch_profile = mysqli_fetch_assoc($select_profile);
          ?>
          <li><a class="btn-book-a-table" href="#book-a-table">Ajouter une recette</a></li>
          <div class="dropdown">
            <img src="assets/img/profile/<?= $fetch_profile['image']; ?>" data-bs-toggle="dropdown" aria-expanded="false"
              class="user-pic" alt="user profile photo">
            <ul class="dropdown-menu">
              <li><img src="assets/img/profile/<?= $fetch_profile['image']; ?>" class="default-pic" />
                <b>
                  <?= $fetch_profile['name']; ?>
                </b>
              </li>
              <hr>
              <li><a href="profile/profile.php"><img src="assets/img/profile/default.png" class="default-pic" />
                  Profile</a></li>
              <li><a href="./auth/signout.php"><img src="assets/img/logout-icon.png" class="default-pic" /> Sign
                  out</a></li>
            </ul>
          </div>
          <?php
        } else {
          ?>
          <li><a class="btn-book-a-table" href="auth/Auth.php">Ajouter une recette</a></li>
          <li><a href="./auth/Auth.php"><img src="assets/img/login-icon.png" width="40px" height="40px" /></a></li>
          <?php
        }
        ?>

      </ul>
    </nav>
    <!-- .navbar -->
    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
  </div>
</header>