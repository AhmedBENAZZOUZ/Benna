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
</head>

<body>

  <div class="container">
    <div class="main-body">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">User Profile</li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->

      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
<<<<<<< HEAD
              <div class="d-flex flex-column align-items-center text-center">
                <img src="../assets/img/profile/<?= $fetch_profile['image']; ?>" alt="user profile photo"
                  class="rounded-circle" width="150">
                <div class="mt-3">
                  <h4>
                    <?= $fetch_profile['name']; ?>
                  </h4>
                  <!-- <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> -->
                </div>
              </div>
=======
                <div class="d-flex flex-column align-items-center text-center ">
                  <img src="../assets/img/profile/<?= $fetch_profile['image']; ?>" alt="user profile photo"
                    class="rounded-circle" width="150">
                  <div class="mt-3">
                    <h4>
                      <?= $fetch_profile['name']; ?>
                    </h4>
                    <!-- <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> -->
                  </div>
                </div>
>>>>>>> 90aaf5c84aa89a5fedabf71c22c8cbac304495f0
            </div>
          </div>
          <div class="card mt-3">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<<<<<<< HEAD
                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-globe mr-2 icon-inline">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <path
                      d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                    </path>
                  </svg>Website</h6>
                <span class="text-secondary">https://bootdey.com</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-github mr-2 icon-inline">
                    <path
                      d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                    </path>
                  </svg>Github</h6>
                <span class="text-secondary">bootdey</span>
=======
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
>>>>>>> 90aaf5c84aa89a5fedabf71c22c8cbac304495f0
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
<<<<<<< HEAD
                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-facebook mr-2 icon-inline text-primary">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                  </svg>Facebook</h6>
                <span class="text-secondary">bootdey</span>
=======
                <div class="row">
                  <div class="col-sm-12">
                    <i class="bi bi-trash3"></i>
                    <a class="  edit-btn " style="color:#ce1212;" href="#">Delete account</a>
                  </div>

>>>>>>> 90aaf5c84aa89a5fedabf71c22c8cbac304495f0
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
<<<<<<< HEAD
                  <h6 class="mb-0">Mobile</h6>
=======
                  <h6 class="mb-0">Phone</h6>
>>>>>>> 90aaf5c84aa89a5fedabf71c22c8cbac304495f0
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
<<<<<<< HEAD
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-info " href="profile-update.php">Edit</a>
                </div>
              </div>
=======
                </div>
              </div>


>>>>>>> 90aaf5c84aa89a5fedabf71c22c8cbac304495f0
            </div>
          </div>

          <div class="row gutters-sm">
<<<<<<< HEAD
=======

>>>>>>> 90aaf5c84aa89a5fedabf71c22c8cbac304495f0
            <div class="col-sm mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <h6 class="d-flex align-items-center mb-3"><i
                      class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                  <small>Web Design</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small>Website Markup</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small>One Page</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small>Mobile Template</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small>Backend API</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66"
                      aria-valuemin="0" aria-valuemax="100"></div>
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