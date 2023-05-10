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
          <h2 data-aos="fade-up">Compose Your <br>Favorite Dish </h2>
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
                Welcome to Benna, your go-to destination for delicious and easy-to-follow recipes! Our website is
                dedicated to providing you with a vast selection of recipes that are both tasty and approachable,
                perfect for both beginners and experienced cooks alike. At Benna, we believe that cooking should be
                enjoyable, not stressful. That's why we've designed our recipes to be simple to follow and use
                easy-to-find ingredients. Whether you're in the mood for a quick weeknight dinner, a tasty snack, or a
                special dessert for a celebration, we've got you covered. Our team of recipe developers is passionate
                about creating dishes that are both flavorful and nutritious. We are committed to using fresh, wholesome
                ingredients and avoiding highly processed foods. We believe that healthy eating can be delicious, and we
                strive to make our recipes as healthy and balanced as possible. At Benna, we also understand the
                importance of sharing meals with loved ones. Cooking and eating together can bring people closer and
                create cherished memories. That's why we encourage you to invite your family and friends to join you in
                the kitchen and enjoy the delicious meals you create together. Thank you for choosing Benna as your
                recipe source. We hope you enjoy our recipes and find inspiration for your next culinary adventure!
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
      <form action="" method="GET">
      <div claxx ss="container" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Why Choose Benna?</h3>
              <p>
                At Benna, we offer high-quality, easy-to-follow recipes that are both delicious and nutritious. Our
                recipes are crafted to be approachable and use fresh, whole ingredients to ensure you're putting the
                best into your body. Whether you're an experienced cook or just starting out, we have something for you.
                Choose Benna for delicious, healthy meals that you'll actually want to make and enjoy!
              </p>
              <div class="text-center">
              </div>
            </div>
          </div><!-- End Why Box -->
          <div class="col-lg-8 d-flex align-items-center">
            <div class="row gy-4">
              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center"
                  style="background-color: #ce1212;">
                  <i class="fa-solid fa-bowl-food" style="color: #000000;"></i>
                  <h4>Traditional Dishes</h4>
                  <p>The Tunisian traditional kitchen is a vibrant fusion of flavors and influences from the
                    Mediterranean, Middle Eastern, and North African regions. Tunisian cuisine is characterized by its
                    use of spices, such as harissa, cumin, coriander, and mint,which add a depth of flavor to its
                    dishes. Staple ingredients in Tunisian cuisine include grains like couscous and bulgur</p>
                  <div class="why-box">
                    <a href="salty.php?type=chaud" class="more-btn">discover </a>
                  </div>
                </div>
              </div><!-- End Icon Box -->
              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center"
                  style="background-color: #ce1212;">
                  <i class="fa-solid fa-bowl-food" style="color: #000000;"></i>
                  <h4>Salty Dishes </h4>
                  <p>This could include the use of salt, pepper, and herbs to enhance the flavors of dishes, as well as
                    ingredients like cheese, cured meats, and olives to add a salty or savory element to meals. A "salty
                    kitchen" may be a term used by chefs or food enthusiasts to describe a style of cooking that focuses
                    on savory flavors and ingredients</p>
                  <div class="why-box">
                    <a href="salty.php?type=chaud" class="more-btn">discover </a>
                  </div>
                </div>
              </div><!-- End Icon Box -->
              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center"
                  style="background-color: #ce1212;">
                  <i class="fa-solid fa-bowl-food" style="color: #000000;"></i>
                  <h4>Sweet Dishes</h4>
                  <p>Sweet dishes are a type of cuisine that is characterized by its sugary or dessert-like ingredients
                    and flavors. These dishes can be enjoyed as a dessert or a treat, and typically use ingredients like
                    sugar, honey, and fruits to create a sweet taste. Common sweet dishes include cakes, pies, cookies,
                    and sweet breakfast items like waffles and pancakes.</p>
                  <div class="why-box">
                    <a href="froid.php?type=froid" class="more-btn">discover </a>
                  </div>
                </div>
              </div><!-- End Icon Box -->
            </div>
          </div>
          </form>
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
              <p>Comments</p>
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
                      <h3>Name</h3>
                      <h4></h4>
                      <p></p>
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
                      <h3>Name</h3>
                      <h4>Job</h4>
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
                      <h3>Name</h3>
                      <h4>Job</h4>
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
                      <h3>Name</h3>
                      <h4>Jon</h4>
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
          <h2>Recieps</h2>
          <p>Discover <span>The most Delicious Recieps </span> with us </p>
        </div>
        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <?php
            $query = "SELECT * FROM recette_suggestions ORDER BY created DESC LIMIT 4";
            $result = mysqli_query($con, $query);
            if ($result && mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $user_id = $row['user_id'];
                $sql = "select name,image from users where id = $user_id;";
                $result_user = mysqli_query($con, $sql);
                $row_user = mysqli_fetch_assoc($result_user);
                ?>

                <!-- Event item -->
                <div class="card swiper-slide event-item d-flex flex-column justify-content-end rounded"
                  style="width: 18rem; height: 130px;">
                  <!-- background-image: url(assets/img/about-2.jpg) -->
                  <img src="assets/img/recette/<?= $row['image']; ?>" alt="" class="card-img-top" height="420px">
                  <div class="card-body ">
                    <h2 class="card-title">
                    <a href="recette/recette.php?recId=<?php echo $row['id']; ?>" ><?php echo $row['name']; ?></a>
                    </h2>
                    <div style="display: flex; align-items: center;">
                      <img src="assets/img/profile/<?php echo $row_user['image']; ?>" alt="Card image cap"
                        class="rounded-circle" width="50px" height="50 px">
                      <div style="margin-left: 10px;">
                        <h4 class="card-text">
                          <?php echo $row_user['name']; ?>
                        </h4>
                        <p class="card-text">
                          <?php echo $row['created']; ?>
                        </p>
                      </div>
                      <div class="d-flex flex-column align-items-end">
                        <a href="#" class="btn btn-danger">View Comments</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Event item -->
              <?php
              }
            }
            ?>
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
        <div class="vote" style=" text-align: left; ::hover:text-decoration: line;">
            <a class="vote-btn"
              style=" font-size: 20px; color:#fff; padding: 8px 20px; border-radius: 50px; transition: 0.3s;
              background-color: var(--color-primary);box-shadow: 0 8px 28px rgba(206, 18, 18, 0.2);display: inline-block;"
              href="vote.php">vote here</a>
          </div>
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
                <h4>Mounir Arem</h4>
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
                <h4>Maissa Boussaida</h4>
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
                <h4>Wafik Belaid</h4>
                <span>Chef</span>
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
            <h2>Suggest Your recipe </h2>
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
                    <input type="text" name="Nom_recette" class="form-control" id="name" placeholder="Name of Recipe"
                      data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <input type="text" class="form-control" name="temps_preparation" placeholder="Time of preparation"
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
                      <option value="non_valide">Choose Difficulty</option>
                      <option value="tres facile">Very Easy</option>
                      <option value="facile">Easy</option>
                      <option value="moyenne">Medium</option>
                      <option value="facile">Difficult</option>
                    </select>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="my-3">
                    <select class="form-select" name="type_plat">
                      <option value="type of dish">Type of Dish </option>
                      <option value="chaud">Sweet Dish </option>
                      <option value="froid">Salty Dish </option>
                      <option value="traditionnelle">Plat traditionnelle</option>
                      <option value="diabetique">Dishes for Diabetics </option>
                      <option value="vegetarien">Dishes for Vegetariens</option>
                    </select>
                    <br />
                    <div class="row gy-4">
                      <div class="form-group col-lg-12 col-md-6">
                        <label for="exampleFormControlTextarea1">Ingredients and quantity : </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                          name="ingredients"></textarea>
                        <br />
                        <!-- <table id="myTable" style="display:none;">
                          <tbody>
                            <?php
                            // $query_ing = "SELECT * FROM `ingredient`;";
                            // $select_ingredients = mysqli_query($con, $query_ing);
                            // $row = mysqli_num_rows($select_ingredients);
                            // $fetch_ingredients = mysqli_fetch_assoc($select_ingredients);
                            // // Convertir le tableau $fetch en HTML
                            // for ($i = 0; $i < $row; $i++) {
                            //   echo "<tr>";
                            //   // echo "<td><img src='" . $row['image'] . "' alt='" . $row['name'] . "'></td>";
                            //   echo "<td>" . $fetch_ingredients['name'] . "</td>";
                            //   echo "</tr>";
                            // }
                            ?>
                          </tbody>
                        </table> -->
                      </div>
                    </div>
                    <div class="row gy-4" id="lk">
                      <div class="form-group col-lg-8 col-md-6">
                        <label for="instructions">Les Instructions : </label>
                        <input type="text" class="form-control" id="in" />
                      </div>
                      <!-- <div class="form-group col-lg-4 col-md-6">
                        <br />
                        <input type="button" value="Add" onclick="add()">
                      </div> -->
                    </div>
                    <br />
                    <div class="row gy-4">
                      <div class="form-group col-lg-6 col-md-6">
                        <label class="my-auto">Upload a photo of your dish</label>
                        <input id="file" type="file" class="form-control" name="image" />
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
    <!-- <section id="gallery" class="gallery section-bg">
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
    </section> --> <!--End Gallery Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Contact</h2>
          <p>Have Suggestion ? Need Help? <span>Contact Us</span></p> <br>
          <p>Don't Hesitate</p>
        </div>
        <div class="mb-3">
          <button onclick="getLocation()" class="btn btn-secondary">Try It</button>
          <p id="demo"></p>
          <iframe style="border:0; width: 100%; height: 350px;"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2665.864891111179!2d10.22999566005915!3d36.836763133183894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd353c2a9bdafb%3A0xf40a3b2820de190d!2sPolytech-Intl!5e0!3m2!1sfr!2sfr!4v1547545953166"
            frameborder="0" allowfullscreen></iframe>
        </div> <!-- End Google Maps -->
      </div>
      <form action="forms/feedback.php" method="post" role="form" class="php-email-form p-3 p-md-4">
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
        <div class="text-center"><button name="submit" type="submit">Send Message</button></div>
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