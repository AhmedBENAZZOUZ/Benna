<?php

include '../Config.php';

session_start();

$user_id = $_SESSION['id'];
$username = $_SESSION['username'];

if (!isset($user_id)) {
  header('location:auth/Auth.php');
}
$query = "SELECT * FROM `users` WHERE id = '$user_id';";
$select_profile = mysqli_query($con, $query);
$fetch_profile = mysqli_fetch_assoc($select_profile);

if (isset($_POST['delete'])) {
  header('location:..index/.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">
  <title>Benna | Profile</title>
  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  <!-- custom css file link  -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="profile.css">
  <!-- <link rel="stylesheet" href="..\assets\css\main.css"> -->

</head>

<body>

  <div class="container">
    <div class="main-body">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <div class=" d-flex align-items-center justify-content-between">
            <a href="../index.php" class="logo d-flex align-items-center me-auto me-lg-0"
              style="text-decoration: none; color:black;">
              <img src="../assets/img/icon.png" alt="" style="max-width: 25px;">
              <h5>Benna<span style="color: #ce1212;">.</span></h5>
            </a>
          </div>
        </ol>
      </nav>
      <!-- /Breadcrumb -->
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center ">
                <img src="../assets/img/profile/<?= $fetch_profile['image']; ?>" alt="user profile photo"
                  class="rounded-circle" width="150">
                <div class="mt-3">
                  <h4>
                    <?= $fetch_profile['name']; ?>
                  </h4>

                </div>
              </div>
            </div>
          </div>
          <div class="card mt-3">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <div class="row">
                  <div class="col-sm-12">
                    <i class="bi bi-gear"></i>
                    <a class="edit-btn mb-0" href="profile-update.php">Edit profile</a>
                  </div>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <div class="row">
                  <div class="col-sm-12">
                    <i class="bi bi-shield-lock"></i>
                    <a class="edit-btn mb-0" href="password-update.php">Password</a>
                  </div>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-twitter mr-2 icon-inline text-info">
                    <path
                      d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                    </path>
                  </svg>Twitter</h6>
                <span class="text-secondary">@bootdey</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-instagram mr-2 icon-inline text-danger">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                  </svg>Instagram</h6>
                <span class="text-secondary">bootdey</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <div class="row">
                  <div class="col-sm-12">
                    <i class="bi bi-trash3"></i>
                    <a class="  edit-btn " name="delete" style="color:#ce1212;" href="delete.php">Delete account</a>

                  </div>

              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Username</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $fetch_profile['username']; ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $fetch_profile['name']; ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $fetch_profile['email']; ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $fetch_profile['phone']; ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $fetch_profile['adress']; ?>
                </div>
              </div>


            </div>
          </div>

          <div class="row gutters-sm">

            <div class="col-sm mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">My recipe</i></h6>
                  <div class="d-flex flex-wrap">
                    <div class="card mb-3" style="width: 24rem; margin-right: 15px;">
                      <img class="card-img-top" src="../assets/img/recette/default.png" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                          the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                    <div class="card mb-3" style="width: 24rem; margin-right: 15px;">
                      <img class="card-img-top" src="../assets/img/recette/default.png" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                          the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                    <div class="card mb-3" style="width: 24rem; margin-right: 15px;">
                      <img class="card-img-top" src="../assets/img/recette/default.png" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                          the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                      <div class="card mb-3" style="width: 24rem; margin-right: 15px;">
                      <img class="card-img-top" src="../assets/img/recette/default.png" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                          the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



        </div>
      </div>

    </div>
  </div>
</body>

</html>