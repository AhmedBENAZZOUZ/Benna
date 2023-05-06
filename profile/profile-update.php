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

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $query = "UPDATE `users` SET name = '$name', email = '$email' WHERE id = '$user_id'";
    $update_profile = mysqli_query($con, $query);



    $phone = $_POST['phone'];
    $phone = filter_var($phone, FILTER_SANITIZE_STRING);

    $query = "UPDATE `users` SET phone = '$phone' WHERE id = '$user_id'";
    $update_profile = mysqli_query($con, $query);


    $adress = $_POST['adress'];
    $adress = filter_var($adress, FILTER_SANITIZE_STRING);

    $query = "UPDATE `users` SET adress = '$adress' WHERE id = '$user_id'";
    $update_profile = mysqli_query($con, $query);



    // $file = $_FILES['new_image']['name'];
    // $file_loc = $_FILES['new_image']['tmp_name'];
    // $folder = "../assets/img/profile/";
    // $new_file_name = strtolower($file);
    // $final_file = str_replace(' ', '-', $new_file_name) ;

    if (isset($_FILES['new_image']['name']) && !empty($_FILES['new_image']['name'])) {
        $image = $_FILES['new_image']['name'];
        $image_tmp_name = $_FILES['new_image']['tmp_name'];
        $image_size = $_FILES['new_image']['size'];
        $image_folder = '../assets/img/profile/' . $image;

        $query = "UPDATE users set image ='$image' where id ='$user_id';";

        if (mysqli_query($con, $query)) {
            move_uploaded_file($image_tmp_name, $image_folder);

        }

    }



    header('Location: profile.php');

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ahla -->
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

    <head>
        <style>
            .profile-img .btn-circle {
                border-radius: 50%;
                width: 2.5rem;
                height: 2.5rem;
            }

            .profile-img .btn-circle i {
                font-size: 1rem;
            }



            .profile-img .btn-circle.text-danger i {
                color: #fff;
            }
        </style>
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

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="d-flex flex-column align-items-center text-center profile-img">
                                    <div class="position-relative">
                                        <img src="../assets/img/profile/<?= $fetch_profile['image']; ?>" alt="Admin"
                                            class="rounded-circle" width="150px" height="150px">
                                        <div class="position-absolute top-0 end-0">
                                            <button type="button" class="btn btn-circle btn-outline-danger upload-btn">
                                                <i class="bi bi-camera-fill"></i>
                                            </button>
                                            <input type="file" name="new_image" class="d-none"
                                                accept="image/jpg, image/jpeg, image/png">
                                            <input type="hidden" name="new_image"
                                                value="<?= $fetch_profile['image']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    const fileInput = document.querySelector('input[name="new_image"]');
                                    const uploadButton = document.querySelector('.upload-btn');

                                    uploadButton.addEventListener('click', () => {
                                        fileInput.click();
                                    });

                                    fileInput.addEventListener('change', () => {
                                        const file = fileInput.files[0];
                                        const reader = new FileReader();
                                        reader.readAsDataURL(file);
                                        reader.onload = () => {
                                            const img = new Image();
                                            img.src = reader.result;
                                            img.onload = () => {
                                                const canvas = document.createElement('canvas');
                                                canvas.width = img.width;
                                                canvas.height = img.height;
                                                const ctx = canvas.getContext('2d');
                                                ctx.drawImage(img, 0, 0);
                                                const dataUrl = canvas.toDataURL('image/jpeg');
                                                const hiddenInput = document.querySelector('input[name="new_image"]');
                                                hiddenInput.value = dataUrl;
                                                const profileImg = document.querySelector('.profile-img img');
                                                profileImg.src = dataUrl;
                                            };
                                        };
                                    });
                                </script>
                                <div class="mt-3" style="text-align:center">
                                    <h4>
                                        <?= $fetch_profile['name']; ?>
                                    </h4>

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
                                        <i class="bi bi-shield-lock"></i>
                                        <a class="edit-btn mb-0" href="password-update.php">Password</a>
                                    </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <i class="bi bi-trash3"></i>
                                        <a class="  edit-btn " name="delete" style="color:#ce1212;"
                                            href="delete.php">Delete account</a>

                                    </div>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"> Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="name" class="form-control"
                                        value="<?= $fetch_profile['name']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="email" class="form-control"
                                        value=<?= $fetch_profile['email']; ?>>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name='phone' class="form-control"
                                        value=<?= $fetch_profile['phone']; ?>>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name='adress' class="form-control"
                                        value=<?= $fetch_profile['adress']; ?>>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" name="save_changes" class="btn btn-danger px-4"
                                        value="Save Changes">

                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="d-flex align-items-center mb-3">Project Status</h5>
                                    <p>Web Design</p>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p>Website Markup</p>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 72%"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p>One Page</p>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 89%"
                                            aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p>Mobile Template</p>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 55%"
                                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p>Backend API</p>
                                    <div class="progress" style="height: 5px">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 66%"
                                            aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
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