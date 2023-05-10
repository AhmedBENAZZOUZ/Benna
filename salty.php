<?php
error_reporting(0);
include("./admin/includes/config.php");
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM users WHERE id = :id LIMIT 1";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
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
                        $query = "SELECT * FROM `users` WHERE id = :id";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam(':id', $id);
                        $stmt->execute();
                        $fetch_profile = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <li><a class="btn-book-a-table" href="#book-a-table">Suggest Recipe </a></li>
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
                                            class="default-pic" />Profile</a></li>
                                <li><a href="../auth/signout.php"><img src="../assets/img/logout-icon.png"
                                            class="default-pic" />Sign out</a></li>
                            </ul>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li><a class="btn-book-a-table" href="auth/Auth.php">Suggest Recipe </a></li>
                        <li><a href="./auth/Auth.php"><img src="assets/img/login-icon.png" width="40px" height="40px" /></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </nav>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>
    <?php
    if (isset($_GET['type'])) {
        if ($_GET['type'] == 'chaud') {
            $type = $_GET['type'];
            $sql11 = "SELECT * FROM recette WHERE type = (:type)";
            $stmt = $dbh->prepare($sql11);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
            }
        }


    }

    ?>
    <style>
        .card-body {
            padding-left: 50px;
            /* adjust the value as needed */
        }
    </style>
    <br>
    <br>
    <br>
    <br>

    <div class="row gutters-sm">
        <div class="col-md-12 text-center mb-3">
            <h1>salty Dishes</h1>
        </div>
        <div class="row">
            <?php foreach ($result as $row) { ?>
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="d-flex flex-wrap">
                            <div class="card mb-3" style="width: 24rem; margin-right: 15px;">
                                <img class="card-img-top" src="assets/img/profile/<?= $row['image']; ?>"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Name :
                                        <?php echo $row["name"]; ?>
                                    </h5>
                                    <p class="card-text">
                                        Preparation time :
                                        <?php echo $row["prep_time"]; ?>
                                    </p>
                                    <p class="card-text">
                                        Number Of People :
                                        <?php echo $row["nb_people"]; ?>
                                    </p>
                                    <p class="card-text">
                                        Difficulty :
                                        <?php echo $row["difficulty"]; ?>
                                    </p>
                                    <p class="card-text">
                                        Instructions :
                                        <?php echo $row["instructions"]; ?>
                                    </p>
                                    <a href="#" class="btn btn-danger">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
</body>