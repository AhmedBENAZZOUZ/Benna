<?php
session_start();

include("./Config.php");

if (isset($_SESSION['id'])) {

  $id = $_SESSION['id'];
  $query = "select * from users where id = '$id' limit 1";

  $result = mysqli_query($con, $query);
  if ($result && mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_assoc($result);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-pUA-Compatible" content="ie=edge" />
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Benna</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>

<body>
  <!-- ======= Header ======= -->
  <?php include 'header.php'; ?>
  <!-- End Header -->
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div
          class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">Composez votre <br>plat prefere </h2>
          <p data-aos="fade-up" data-aos-delay="100"></p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#book-a-table" class="btn-book-a-table">Search recipe </a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="assets/img/hero-img.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero Section -->
  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>About Us</h2>
          <p>Learn More <span>About Us</span></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background-image: url(assets/img/about.jpg) ;"
            data-aos="fade-up" data-aos-delay="150">

          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                  irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla
                  pariatur.</li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
              </p>

              <div class="position-relative mt-4">
                <img src="assets/img/about-2.jpg" class="img-fluid" alt="">
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Why Choose Benna?</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Duis aute irure dolor in reprehenderit
                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad
                corporis.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->
          <div class="col-lg-8 d-flex align-items-center">
            <div class="row gy-4">
              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center"
                  style="background-color: #ce1212;">
                  <i class="fa-solid fa-bowl-food" style="color: #000000;"></i>
                  <h4>Cuisine traditionnelle</h4>
                  <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                  <div class="why-box">
                    <a href="#" class="more-btn">discover </a>
                  </div>
                </div>
              </div><!-- End Icon Box -->
              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center"
                  style="background-color: #ce1212;">
                  <i class="fa-solid fa-bowl-food" style="color: #000000;"></i>
                  <h4>Cuisine salée</h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                  <div class="why-box">
                    <a href="#" class="more-btn">discover </a>
                  </div>
                </div>
              </div><!-- End Icon Box -->
              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center"
                  style="background-color: #ce1212;">
                  <i class="fa-solid fa-bowl-food" style="color: #000000;"></i>
                  <h4>Cuisine sucré</h4>
                  <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                  <div class="why-box">
                    <a href="#" class="more-btn">discover </a>
                  </div>
                </div>
              </div><!-- End Icon Box -->
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Why Us Section -->
    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="zoom-out">
        <div class="row gy-4">
          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>commentaire</p>
            </div>
          </div><!-- End Stats Item -->
          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>recette</p>
            </div>
          </div>
          <!-- End Stats Item -->
          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>ingredients</p>
            </div>
          </div><!-- End Stats Item -->
          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>admin</p>
            </div>
          </div><!-- End Stats Item -->
        </div>
      </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Testimonials</h2>
          <p>What Are They <span>Saying About Us</span></p>
        </div>
        <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Saul Goodman</h3>
                      <h4>Ceo &amp; Founder</h4>
                      <p>this is a good way to discover new recepies </p>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                          class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets/img/testimonials/testimonials-1.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Sara Wilsson</h3>
                      <h4>Designer</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                          class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets/img/testimonials/testimonials-2.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>

                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Jena Karlis</h3>
                      <h4>Store Owner</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                          class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets/img/testimonials/testimonials-3.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>

                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>John Larson</h3>
                      <h4>Entrepreneur</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                          class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets/img/testimonials/testimonials-4.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Testimonials Section -->
    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container-fluid" data-aos="fade-up">
        <div class="section-header">
          <h2>Recettes</h2>
          <p>Découvrez <span>les plus délicieuses recettes</span> avec nous </p>
        </div>
        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide event-item d-flex flex-column justify-content-end"
              style="background-image: url(assets/img/cake_chocolata.jpg)">
              <h3>Peanut Butter Cup Cake</h3>
              <div class="price align-self-start">70Dt</div>
              <p class="description"></p>
            </div><!-- End Event item -->
            <!-- Test -->
            <div class="card swiper-slide event-item d-flex flex-column justify-content-end rounded"
              style="width: 18rem; height: 130px;">
              <!-- background-image: url(assets/img/about-2.jpg) -->
              <img src="assets/img/about-2.jpg" alt="" class="card-img-top">
              <div class="card-body ">
                <h2 class="card-title">
                  <?php echo $user_data['username']; ?>
                </h2>
                <div style="display: flex; align-items: center;">
                  <img src="assets/img/profile/<?php echo $user_data['image']; ?>" alt="Card image cap"
                    class="rounded-circle">
                  <div style="margin-left: 10px;">
                    <h4 class="card-text">
                      <?php echo $user_data['name']; ?>
                    </h4>
                    <p class="card-text">
                      <?php echo $user_data['created_at']; ?>
                    </p>
                  </div>
                </div>
              </div><!-- Test -->
            </div>
            <div class="swiper-slide event-item d-flex flex-column justify-content-end"
              style="background-image: url(assets/img/spaghetti.jpg)">
              <h3>Pasta Carbonara</h3>
              <div class="price align-self-start">42Dt</div>
              <p class="description">

              </p>
            </div><!-- End Event item -->
            <div class="swiper-slide event-item d-flex flex-column justify-content-end"
              style="background-image: url(assets/img/brika.jpg)">
              <h3>Brike à l'oeuf</h3>
              <div class="price align-self-start">5Dt</div>
              <p class="description">

              </p>
            </div><!-- End Event item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Events Section -->
    <!-- <div style="height:600px; width:400px">
      <iframe src="https://ora.sh/embed/48b31b4b-4efb-4278-b7df-240acc087d14" width="100%" height="60%"
        style="border:0; border-radius: 4px" />
    </div> -->
    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Chefs</h2>
          <p>Our <span>Winners</span> of the best <span>recipe</span>this week</p>
        </div>
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="chef-member">
              <div class="member-img">
                <img src="assets/img/chefs/chefs-1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Master Chef</span>
                <p></p>
              </div>
            </div>
          </div><!-- End Chefs Member -->
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="chef-member">
              <div class="member-img">
                <img src="assets/img/chefs/chefs-2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Patissier</span>
                <p></p>
              </div>
            </div>
          </div><!-- End Chefs Member -->
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="chef-member">
              <div class="member-img">
                <img src="assets/img/chefs/chefs-3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>Cook</span>
                <p></p>
              </div>
            </div>
          </div><!-- End Chefs Member -->
        </div>
      </div>

    </section><!-- End Chefs Section -->
    <!-- ======= Book A Table Section ======= -->
    <?php
    if (isset($_SESSION['id'])) {
      ?>
      <section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">
          <div class="section-header">
            <h2>Add Your recipe </h2>
            <!-- <p>Here you can <span>contact the admin to </span> add a recipe </p> -->
          </div>
          <div class="row g-0">
            <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);"
              data-aos="zoom-out" data-aos-delay="200"></div>
            <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
              <form action="recette/recette.php" method="post" role="form" class="php-email-form" data-aos="fade-up"
                data-aos-delay="100" enctype="multipart/form-data">
                <div class="row gy-4">
                  <div class="col-lg-6 col-md-6">
                    <input type="text" name="Nom_recette" class="form-control" id="name" placeholder="Nom de la recette"
                      data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <input type="text" class="form-control" name="temps_preparation" placeholder="Temps de préparation"
                      data-rule="email" data-msg="Please enter a time">
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <div class="validate"></div>
                </div>
                <div class="row gy-4">
                  <div class="col-lg-6 col-md-6">
                    <input type="text" name="nbre_personne" class="form-control" id="date"
                      placeholder="Nombre de personne" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <select class="form-select" name="difficulte">
                      <option value="non_valide">Choisir la difficulté</option>
                      <option value="tres facile">Très Facile</option>
                      <option value="facile">Facile</option>
                      <option value="moyenne">Moyenne</option>
                      <option value="facile">Difficile</option>
                    </select>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="my-3">
                    <select class="form-select" name="type_plat">
                      <option value="type of dish">Type de plat</option>
                      <option value="chaud">Plat sucré</option>
                      <option value="froid">Plat salé </option>
                      <option value="traditionnelle">Plat traditionnelle</option>
                      <option value="diabetique">Plat pour les diabetiques</option>
                      <option value="vegetarien">Plat pour les vegetariens</option>
                    </select>
                    <br />
                    <div class="row gy-4">
                      <div class="form-group col-lg-12 col-md-6">
                        <label>les Ingredients : </label>
                        <input type="text" class="form-control icon_search" id="ingredient-search"
                          name="ingredient-search" placeholder="recherche de ...">
                        <br />
                        <!-- <table id="myTable" style="display:none;">
                          <tbody>
                            <?php
                            // $query_ing = "SELECT * FROM `ingredient`;";
                            // $select_ingredients = mysqli_query($con, $query_ing);
                            // $fetch_ingredients = mysqli_fetch_assoc($select_ingredients);
                            // // Convertir le tableau $fetch en HTML
                            // while ($fetch_ingredients) {
                            //   echo "<tr>";
                            //   // echo "<td><img src='" . $row['image'] . "' alt='" . $row['name'] . "'></td>";
                            //   echo "<td>" . $fetch_ingredients['name'] . "</td>";
                            //   echo "</tr>";
                            // }
                            ?>
                          </tbody>
                        </table> -->
                      </div>
                      <script>
                        // Récupération de la barre de recherche et du tableau
                        var input = document.getElementById("ingredient-search");
                        var table = document.getElementById("myTable");

                        // Ajout d'un événement d'écoute de saisie pour la barre de recherche
                        input.addEventListener("input", function () {
                          var filter = input.value.toUpperCase(); // Conversion de la valeur de la barre de recherche en majuscules
                          var rows = table.getElementsByTagName("tr"); // Récupération de toutes les lignes du tableau

                          // Parcours de toutes les lignes et filtrage des résultats
                          for (var i = 0; i < rows.length; i++) {
                            var cells = rows[i].getElementsByTagName("td"); // Récupération de toutes les cellules de la ligne
                            var visible = false;

                            // Parcours de toutes les cellules de la ligne et comparaison avec la valeur de recherche
                            for (var j = 0; j < cells.length; j++) {
                              var cell = cells[j];
                              if (cell) {
                                if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) { // Comparaison avec la valeur de recherche
                                  visible = true;
                                  break;
                                }
                              }
                            }

                            // Affichage ou masquage de la ligne en fonction des résultats de la recherche
                            if (visible) {
                              rows[i].style.display = "";
                            } else {
                              rows[i].style.display = "none";
                            }
                          }
                        });
                      </script>
                    </div>
                    <div class="row gy-4" id="lk">
                      <div class="form-group col-lg-8 col-md-6">
                        <label for="instructions">Les Instructions : </label>
                        <input type="text" class="form-control" id="in" />
                      </div>
                      <div class="form-group col-lg-4 col-md-6">
                        <br />
                        <input type="button" value="Add" onclick="add()">
                      </div>
                    </div>
                    <br />
                    <div class="row gy-4">
                      <div class="form-group col-lg-6 col-md-6">
                        <label class="my-auto">Upload a photo of your dish</label>
                        <input id="file" type="file" class="form-control" name="image" multiple />
                      </div>
                      <div class="form-group col-lg-6 col-md-6">
                        <label class="my-auto">Upload a video of your dish</label>
                        <input id="file" type="file" class="form-control" name="video" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="loading">Loading</div>
                  <div class="error-message">
                    <?php if ($_GET['error'] == "No instructions") { ?>
                      <div class="alert alert-danger" role="alert">
                        <?php echo "You can't add recipe without instructions"; ?>
                      </div>
                    <?php } ?>
                    <?php if ($_GET['error'] == "File upload failed") { ?>
                      <div class="alert alert-danger" role="alert">
                        <?php echo "The upload of the video failed"; ?>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="sent-message"></div>
                </div>
                <div class="text-center">
                  <button type="submit" name="submit-recette">Add A recipe </button>
                </div>
              </form>
            </div><!-- End Reservation Form -->
          </div>
        </div>
      </section><!-- End Book A Table Section -->
    <?php } ?>
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>gallery</h2>
          <p>Check <span>Our Gallery</span></p>
        </div>
        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                href="assets/img/gallery/gallery-1.jpg"><img src="assets/img/gallery/gallery-1.jpg" class="img-fluid"
                  alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                href="assets/img/gallery/gallery-2.jpg"><img src="assets/img/gallery/gallery-2.jpg" class="img-fluid"
                  alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                href="assets/img/gallery/gallery-3.jpg"><img src="assets/img/gallery/gallery-3.jpg" class="img-fluid"
                  alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                href="assets/img/gallery/gallery-4.jpg"><img src="assets/img/gallery/gallery-4.jpg" class="img-fluid"
                  alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                href="assets/img/gallery/gallery-5.jpg"><img src="assets/img/gallery/gallery-5.jpg" class="img-fluid"
                  alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                href="assets/img/gallery/gallery-6.jpg"><img src="assets/img/gallery/gallery-6.jpg" class="img-fluid"
                  alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                href="assets/img/gallery/gallery-7.jpg"><img src="assets/img/gallery/gallery-7.jpg" class="img-fluid"
                  alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                href="assets/img/gallery/gallery-8.jpg"><img src="assets/img/gallery/gallery-8.jpg" class="img-fluid"
                  alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Gallery Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Contact</h2>
          <p>Have Suggestion ? Need Help? <span>Contact Us</span></p> <br>
          <p>Don't Hesitate</p>
        </div>
        <!-- <div class="mb-3">
           <button onclick="getLocation()" class="btn btn-secondary">Try It</button>
          <p id="demo"></p> 
           <iframe style="border:0; width: 100%; height: 350px;"
            src="https://www.google.com/maps/place/Polytech-Intl/@36.8364622,10.230462,16.95z/data=!4m6!3m5!1s0x12fd353c2a9bdafb:0xf40a3b2820de190d!8m2!3d36.8367566!4d10.231694!16s%2Fg%2F1ptwg6hg_"
            frameborder="0" allowfullscreen></iframe> 
        </div>--> <!-- End Google Maps -->
        <!-- <div class="row gy-4">
          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>Adresse</h3>
                <p></p>
              </div>
            </div>
          </div> --> <!-- End Info Item -->
        <!-- <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email</h3>
                <p>Contact@benna.com</p>
              </div>
            </div>
          </div> --> <!-- End Info Item -->
        <!-- <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Télephone</h3>
                <p>+216 70 70 70 70</p>
              </div>
            </div>
          </div> --> <!-- End Info Item -->
        <!-- <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Opening Hours</h3>
                <div><strong>Mon-Sat:</strong> 11AM - 23PM;
                  <strong>Sunday:</strong> Closed
                </div>
              </div>
            </div>
          </div> --> <!-- End Info Item  -->
      </div>
      <form action="forms/contact.php" method="post" role="form" class="php-email-form p-3 p-md-4">
        <div class="row">
          <div class="col-xl-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
          </div>
          <div class="col-xl-6 form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
        </div>
        <div class="my-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your message has been sent. Thank you!</div>
        </div>
        <div class="text-center"><button type="submit">Send Message</button></div>
      </form><!--End Contact Form -->
      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <?php include 'footer.php'; ?>
  <!-- End Footer -->
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="//code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>