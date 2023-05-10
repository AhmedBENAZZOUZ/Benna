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
  header('location:../index.php');
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
                  class="rounded-circle" width="145px" height="145px">
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
                    <form action="" method="GET">
                      <div class="row">
                        <?php
                        $query = "SELECT * FROM recette WHERE user_id = '$user_id'";
                        $result = mysqli_query($con, $query);
                        $recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        foreach ($recipes as $recipe) {
                          ?>
                          <div class="col-md-6">
                            <div class="card mb-3">
                              <img class="card-img-top" src="../assets/img/recette/<?= $recipe['image']; ?>"
                                alt="Card image cap">
                              <div class="card-body">
                                <h5 class="card-title">
                                  Name :
                                  <a href="../recette/recette.php?recId=<?php echo $recipe['id']; ?>" style="text-decoration:none;" class="text-danger"><?= $recipe['name']; ?></a>
                                </h5>
                                <h5 class="card-title">
                                  Preparation Time :
                                  <?= $recipe['prep_time']; ?>
                                </h5>
                                <h5 class="card-title">
                                  Number of People :
                                  <?= $recipe['nb_people']; ?>
                                </h5>
                                <h5 class="card-title">
                                  Difficulty :
                                  <?= $recipe['difficulty']; ?>
                                </h5>
                                <h5 class="card-title">
                                  Type :
                                  <?= $recipe['type']; ?>
                                </h5>
                                <h5 class="card-title">
                                  Ingredients :
                                  <?= $recipe['ingredient']; ?>
                                </h5>
                                <h5 class="card-title">
                                  Instruction :
                                  <?= $recipe['instructions']; ?>
                                </h5>


                                <a href="../recette/recette.php?recId=<?= $recipe['id'] ?>#comment" class="btn btn-danger">View
                                  Comments</a>
                              </div>
                            </div>
                          </div>
                          <?php
                        }
                        ?>
                      </div>
                    </form>



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