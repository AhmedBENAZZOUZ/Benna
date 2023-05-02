



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


<div class="d-flex flex-column align-items-center text-center profile-img">
    <div class="position-relative">
        <img src="../assets/img/profile/" alt="Admin" class="rounded-circle" width="150" id="profile-image">
        <label for="file-upload" class="position-absolute top-0 end-0 mt-3 me-3" style="cursor: pointer;">
            <i class="bi bi-pencil-fill"></i>
        </label>
        <input id="file-upload" type="file" name="new_image" class="d-none" accept="image/jpg, image/jpeg, image/png">
    </div>
</div>

<script>
document.getElementById("profile-image").addEventListener("click", function() {
    document.getElementById("file-upload").click();
});
</script>