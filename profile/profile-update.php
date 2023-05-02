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
    // $image = $_POST['new_image'];

    // if (move_uploaded_file($file_loc, $folder . $final_file)) {
    //     $image = $final_file;
    // }

    // Update the image in the database
    // $query = "UPDATE `users` SET image = ? WHERE id = ?";
    // $stmt = mysqli_prepare($con, $query);
    // mysqli_stmt_bind_param($stmt, 'si', $image, $user_id);
    // mysqli_stmt_execute($stmt);



    // $old_image = $fetch_profile['image'];
    // $image = $_FILES['new_image']['name'];
    // $image_tmp_name = $_FILES['new_image']['tmp_name'];
    // $image_size = $_FILES['new_image']['size'];
    // $message = array();

    // if (!empty($image)) {
    //     if ($image_size > 2000000) {
    //         $message[] = 'Image size is too large';
    //     } else {
    //         // Upload the new image to the server
    //         $image_folder = '../assets/img/profile/' . $image;
    //         move_uploaded_file($image_tmp_name, $image_folder);

    //         // Update the image in the database
    //         $query = "UPDATE `users` SET image = ? WHERE id = ?";
    //         $stmt = mysqli_prepare($con, $query);
    //         mysqli_stmt_bind_param($stmt, 'si', $image, $user_id);
    //         mysqli_stmt_execute($stmt);

    //         if (mysqli_stmt_affected_rows($stmt) == 1) {
    //             // Delete the old image from the server
    //             unlink("../assets/img/profile/" . $old_image);
    //             $message[] = 'Image has been updated!';
    //         } else {
    //             $message[] = 'Image could not be updated';
    //         }

    //         mysqli_stmt_close($stmt);
    //     }
    // }


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
</head>

<body>

    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="d-flex flex-column align-items-center text-center profile-img">
                                    <img src="../assets/img/profile/<?= $fetch_profile['image']; ?>" alt="Admin"
                                        class="rounded-circle " width="150">
                                    <div class="file btn btn-lg btn-primary fit ">
                                        <span class="">Change Photo</span>
                                        <input type="file" name="new_image" class="box"
                                            accept="image/jpg, image/jpeg, image/png">
                                        <input type="hidden" name="new_image" value="<?= $fetch_profile['image']; ?>">
                                    </div>
                                </div>

                                <div class="mt-3" style="text-align:center;">
                                    <h4>
                                        <?= $fetch_profile['name']; ?>
                                    </h4>
                                </div>
                        </div>
                        <hr class="my-4">
                        <ul class="card list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <div class="col-sm-12">
                                    <i class="bi bi-gear"></i>
                                    <a class="edit-btn mb-0 " href="profile.php">Go Back</a>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <i class="bi bi-shield-lock"></i>
                                        <a class="edit-btn mb-0" href="password-update.php">Password</a>
                                    </div>
                            </li>
                            <!-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-twitter me-2 icon-inline text-info">
                                        <path
                                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                        </path>
                                    </svg>Twitter</h6>
                                <span class="text-secondary">@bootdey</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-instagram me-2 icon-inline text-danger">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>Instagram</h6>
                                <span class="text-secondary">bootdey</span>
                            </li> -->

                        </ul>
                    </div>
                </div>



                <div class="col-lg-8">
                    <div class="card">

                        <!-- <form action="" method="post" enctype="multipart/form-data"> -->
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