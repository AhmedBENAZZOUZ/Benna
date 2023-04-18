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
      <?php
      if (isset($_SESSION['id'])) {
        ?>
        <li><a href="profile/profile.php">
            <?php echo $_SESSION["id"]; ?>
            <?php echo $_SESSION["username"]; ?>
          </a></li>
        <li><a href="./auth/signout.php">Sign out</a></li>
        <?php
      } else {
        ?>
        <li><a href="./auth/Auth.php">Sign in</a></li>
        <?php
      }
      ?>
    </ul>

  </nav>
  <!-- .navbar -->
  <?php
  if (isset($_SESSION['id'])) {
    ?>
    <a class="btn-book-a-table" href="#book-a-table">Ajouter une recette</a>
    <?php
  } else {
    ?>
    <a class="btn-book-a-table" href="auth/Auth.php">Ajouter une recette</a>
    <?php
  }
  ?>
  <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
  <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
</div>
</header>