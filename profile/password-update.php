<?php

include '../Config.php';

session_start();

$user_id = $_SESSION['id'];
$username = $_SESSION['username'];

if (!isset($user_id)) {
  header('location:auth/Auth.php');
}


$query = "SELECT * FROM `users` WHERE id = '$user_id'";
$select_profile = mysqli_query($con, $query);
$fetch_profile = mysqli_fetch_assoc($select_profile);


if (isset($_POST['save_changes'])) {
  $old_pass = $_POST['old_pass'];
  $previous_password = md5($_POST['previous_password']);
  $previous_password = filter_var($previous_password, FILTER_SANITIZE_STRING);
  $new_password = md5($_POST['new_password']);
  $new_password = filter_var($new_password, FILTER_SANITIZE_STRING);
  $repeat_password = md5($_POST['repeat_password']);
  $repeat_password = filter_var($repeat_password, FILTER_SANITIZE_STRING);

  if (!empty($previous_password) || !empty($new_password) || !empty($repeat_password)) {
    if ($previous_password != $old_pass) {
      $message[] = 'old password not matched!';
    } elseif ($new_password != $repeat_password) {
      $message[] = 'confirm password not matched!';
    } else {
      $query = "UPDATE `users` SET password = ? WHERE id = ?";
      $stmt = mysqli_prepare($con, $query);
      mysqli_stmt_bind_param($stmt, 'si', $new_password, $user_id);
      mysqli_stmt_execute($stmt);
      $affected_rows = mysqli_stmt_affected_rows($stmt);
      if ($affected_rows == 1) {
        $message[] = 'password has been updated!';
      } else {
        $message[] = 'password could not be updated';
      }
      mysqli_stmt_close($stmt);
    }
  }
  header('location:profile.php');

}



?>

<!DOCTYPE html>
<html lang="en">
<!-- ahla -->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge ">
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
  <link rel="stylesheet" href="..\assets\css\main.css">
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
      </hr>
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
                    <a class="edit-btn mb-0" href="profile.php">Go Back</a>
                  </div>
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
        <div class="col-lg-8">
          <div class="card">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Old Password</h6>
                  </div>
                  <input type="hidden" name="old_pass" value="<?= $fetch_profile['password']; ?>">
                  <div class="col-sm-9 text-secondary">
                    <input type="password" name='previous_password' class="form-control" placeholder="old password">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">New Password</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="password" name='new_password' class="form-control" placeholder="new password">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Repeat Password</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="password" name='repeat_password' class="form-control" placeholder="repeat password">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9 text-secondary">
                    <input type="submit" name="save_changes" class="btn btn-danger px-4" value="Save Changes">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>


</html>