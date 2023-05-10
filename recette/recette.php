<?php
session_start();

include("../Config.php");

if (isset($_SESSION['id'])) {

    $id = $_SESSION['id'];
    $query = "select * from users where id = '$id' limit 1";

    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
    }


}
if (isset($_GET['recId'])) {
    $recipe_id = $_GET['recId'];
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
    <link href="../assets/img/icon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-3xq3s1b2alY/+Fu2zQ2gk9rEz7EkDZ/TGJZb14xM/jHLcUBnNCp0lHxytNvSg9Sd5wk5HxdZ0/P1aQza4dD4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Template Main CSS File -->
    <link href="../assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="test.css">
    <style>
        .rating {
            display: inline-block;
            font-size: 0;
            unicode-bidi: bidi-override;
            direction: rtl;
        }

        .star {
            display: inline-block;
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
            margin-right: 5px;
        }

        .star:before {
            content: "\2605";
            font-size: 30px;
        }

        .star:hover:before,
        .star:hover~.star:before,
        .star.checked:before,
        .star.checked~.star:before,
        .star.clicked:before,
        .star.clicked~.star:before {
            content: "\2605";
            color: #f5a623;
        }

        .text-left {
            text-align: left;
        }

        .star {
            display: inline-block;
            font-size: 24px;
            cursor: pointer;
        }

        .star:before {
            content: '\2605';
        }

        .rated:before,
        .clicked:before {
            color: gold;
        }

        .rated~.star:before,
        .clicked~.star:before {
            color: gray;
        }

        .rated:hover~.star:before,
        .clicked:hover~.star:before {
            color: gold;
        }

        .rated:hover:before {
            color: gold;
        }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="../index.php" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="../assets/img/icon.png" alt="">
                <h1>Benna<span>.</span></h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#events">Recieps</a></li>
                    <li><a href="#chefs">Chefs</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li>
                        <!-- <div class="input-container"><i class="bi bi-search icon"></i> <input type="text" class="form-control rr input-field" >
          </div> -->

                        <div class="input-group form-outline d-flex">
                            <form method="GET" class="d-flex" action="search.php">
                                <input type="search" class="form-control flex-grow-1" placeholder="Search for recipe"
                                    style="border-radius: 50px;" name="search" />
                                <button type="submit" class="btn" name="search-submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>

                    </li>
                    <?php
                    if (isset($_SESSION['id'])) {
                        $user_id = $_SESSION['id'];
                        $query = "SELECT * FROM `users` WHERE id = '$user_id';";
                        $select_profile = mysqli_query($con, $query);
                        $fetch_profile = mysqli_fetch_assoc($select_profile);
                        ?>
                        <li> <a class="btn-book-a-table" href="#book-a-table">Suggest Recipe </a></li>
                        <li class="dropdown"><img src="../assets/img/profile/<?= $fetch_profile['image']; ?>"
                                data-bs-toggle="dropdown" aria-expanded="false" class="user-pic" alt="user profile photo">
                            <ul>
                                <li><img src="../assets/img/profile/<?= $fetch_profile['image']; ?>" class="default-pic" />
                                    <b>
                                        <?= $fetch_profile['name']; ?>
                                    </b>
                                </li>
                                <hr>
                                <li><a href="../profile/profile.php"><img src="../assets/img/profile/default.png"
                                            class="default-pic" />
                                        Profile</a></li>
                                <li><a href="../auth/signout.php"><img src="../assets/img/logout-icon.png"
                                            class="default-pic" /> Sign
                                        out</a></li>
                            </ul>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li><a href="../auth/Auth.php"><img src="../assets/img/login-icon.png" width="40px"
                                    height="40px" /></a>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
            </nav>
            <!-- .navbar -->
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header>
    <?php
    $query = "SELECT * FROM `recette` WHERE id = '$recipe_id';";
    $select_profile = mysqli_query($con, $query);
    $fetch_profile = mysqli_fetch_assoc($select_profile);
    $user_id = $fetch_profile['user_id'];
    $query_user = "SELECT * FROM `users` WHERE id = '$user_id';";
    $select_user = mysqli_query($con, $query_user);
    $fetch_user = mysqli_fetch_assoc($select_user);
    ?>
    <section id="events" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <div class="row justify-content-between gy-5">
                <div
                    class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2 data-aos="fade-up">
                        <?= $fetch_profile['name']; ?>
                    </h2>
                    <p data-aos="fade-up" data-aos-delay="100"></p>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <img src="../assets/img/profile/<?= $fetch_user['image']; ?>" alt="" width="40px" height="40px"
                            style="border-radius:50%; margin-right:10px;">
                        <h6>
                            <?= $fetch_user['name']; ?> <br />
                            <?= $fetch_profile['created']; ?>
                        </h6>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                    <img src="../assets/img/recette/<?= $fetch_profile['image']; ?>" class="img-fluid" alt=""
                        data-aos="zoom-out" data-aos-delay="300">
                </div>
            </div>
        </div>
    </section>


    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="events" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <p><span style="font-size:50px;">Ingredients</span></p>
                    <h2 style="font-size:30px;">
                        <?= $fetch_profile['ingredient']; ?>
                    </h2>
                </div>
                <div class="section-header">
                    <p><span style="font-size:50px;">Instructions</span></p>
                    <h2 style="font-size:30px;">
                        <?= $fetch_profile['instructions']; ?>
                    </h2>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-7 position-relative about-img" style="" data-aos="fade-up" data-aos-delay="150">
                        <table>
                            <tr>
                                <td class="col">
                                    <div class="col-lg-7 " data-aos="fade-up" data-aos-delay="150">
                                        <h1> <i class="bi bi-hourglass"></i> </h1>
                                        <h2>
                                            Preparation Time : <br />
                                            <?= $fetch_profile['prep_time']; ?>
                                        </h2>
                                        <hr style="width:220px;">
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td class="col">
                                    <div class="column float-left" style="margin-bottom: 50px;" data-aos="fade-up"
                                        data-aos-delay="150">
                                        <h1> <i class="bi bi-person"></i> </h1>
                                        <h2>
                                            For
                                            <?= $fetch_profile['nb_people']; ?> People
                                        </h2>
                                        <hr style="width:210px;">
                                    </div>

                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                        <div class="content ps-0 ps-lg-5">
                            <div class="col-lg-7 position-relative about-img" style="" data-aos="fade-up"
                                data-aos-delay="150">
                                <table>
                                    <tr>
                                        <td class="col ">
                                            <div class="col-lg-7 " data-aos="fade-up" data-aos-delay="150">
                                                <h1> <i class="fa fa-bowl-food"></i> </h1>
                                                <h2>
                                                    Type :
                                                    <?= $fetch_profile['type']; ?>
                                                </h2>
                                                <hr style="width:220px;">
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col ">
                                            <div class="col-lg-7 " data-aos="fade-up" data-aos-delay="150">
                                                <h1> <i class="bi bi-speedometer2"></i> </h1>
                                                <h2>
                                                    Difficulty :
                                                    <?= $fetch_profile['difficulty']; ?>
                                                </h2>
                                                <hr style="width:310px;">
                                            </div>

                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION['id'])) { ?>
                    <div>
                        <b> Rate : </b>
                        <form action="submit-rating.php?recId=<?= $fetch_profile['id']; ?>&userId=<?= $id ?>" method="post">
                            <div class="rating text-left mb-3">
                                <span class="star" data-rating="5" name="5"></span>
                                <span class="star" data-rating="4" name="4"></span>
                                <span class="star" data-rating="3" name="3"></span>
                                <span class="star" data-rating="2" name="2"></span>
                                <span class="star" data-rating="1" name="1"></span>
                                <input type="hidden" name="rating" id="rating">
                            </div>
                            <script>
                                let stars = document.querySelectorAll('.star');
                                let ratingInput = document.querySelector('#rating');
                                let form = document.querySelector('#ratingForm');

                                stars.forEach(star => {
                                    star.addEventListener('click', () => {
                                        let rating = star.getAttribute('name');
                                        ratingInput.value = rating;
                                    });
                                });

                            </script>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8">
                                <input type="text" name="comment" placeholder="Write a comment ..." class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <input type="submit" name="submit-comment" value="Comment" class="btn btn-danger">
                            </div>
                        </div>
                        </form>
                    </div>
                <?php } else { ?>
                    <div>
                        <b> Rate : </b>
                        <form action="" method="post">
                            <div class="rating text-left mb-3">
                                <span class="star" data-rating="5" name="5"></span>
                                <span class="star" data-rating="4" name="4"></span>
                                <span class="star" data-rating="3" name="3"></span>
                                <span class="star" data-rating="2" name="2"></span>
                                <span class="star" data-rating="1" name="1"></span>
                                <input type="hidden" name="rating" id="rating">
                            </div>
                            <script>
                                let stars = document.querySelectorAll('.star');
                                let ratingInput = document.querySelector('#rating');
                                let form = document.querySelector('#ratingForm');

                                stars.forEach(star => {
                                    star.addEventListener('click', () => {
                                        let rating = star.getAttribute('name');
                                        ratingInput.value = rating;
                                    });
                                });

                            </script>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8">
                                <input type="text" name="comment" placeholder="Write a comment ..." class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <a href="../auth/Auth.php" class="btn btn-danger">Comment</a>
                            </div>
                        </div>
                        </form>
                    </div>
                <?php } ?>
                <?php
                $sql1 = "SELECT * from comment where recipe_id = $recipe_id ORDER BY created DESC;";
                $select_comment = mysqli_query($con, $sql1);
                // $comments = mysqli_fetch_assoc($select_comment);
                while ($row = mysqli_fetch_assoc($select_comment)) {
                    $user_id = $row['user_id'];
                    $sql_user = "SELECT * from users where id = $user_id;";
                    $select_user = mysqli_query($con, $sql_user);
                    $user = mysqli_fetch_assoc($select_user);

                    // $comment_date = $row['created'];
                    // $now = new DateTime("now", new DateTimeZone("UTC"));
                    // $comment_time = new DateTime($comment_date, new DateTimeZone("UTC"));
                    // $comment_time->setTimezone(new DateTimeZone("Europe/Paris"));
                    // $diff = $now->diff($comment_time);
                
                    // if ($diff->y > 0) {
                    //     $comment_time_string = $diff->y . " year" . ($diff->y > 1 ? "s" : "") . " ago";
                    // } elseif ($diff->m > 0) {
                    //     $comment_time_string = $diff->m . " month" . ($diff->m > 1 ? "s" : "") . " ago";
                    // } elseif ($diff->d > 0) {
                    //     $comment_time_string = $diff->d . " day" . ($diff->d > 1 ? "s" : "") . " ago";
                    // } elseif ($diff->h > 0) {
                    //     $comment_time_string = $diff->h . " hour" . ($diff->h > 1 ? "s" : "") . " ago";
                    // } elseif ($diff->i > 0) {
                    //     $comment_time_string = $diff->i . " minute" . ($diff->i > 1 ? "s" : "") . " ago";
                    // } else {
                    //     $comment_time_string = "just now";
                    // }
                

                    ?>
                    <div id="comment" class="card mb-4 mt-3" style="width:80%;">
                        <div class="card-body">
                            <p>
                                <?= $row['content'] ?>
                            </p>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <img src="../assets/img/profile/<?= $user['image'] ?>" alt="avatar" width="30"
                                        height="30" style="border-radius:50%;" />
                                    <p class="small mb-0 ms-2">
                                        <?= $user['name'] ?>
                                    </p>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <p class="small text-muted mb-0">
                                        <?= $row['created'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>


            </div>
        </section>
    </main>
    <!-- ======= Footer ======= -->
    <?php include '../footer.php'; ?>
    <!-- End Footer -->
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>
    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script>
        $(document).ready(function () {
            $(".chat_on").click(function () {
                $(".Layout").toggle();
            });
        });

    </script>
</body>

</html>