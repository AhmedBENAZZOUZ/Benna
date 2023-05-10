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
    <?php include('header.php'); ?>
</head>


<body>
    </br>
    </br>
    </br>
    </br>
    
    <?php
    session_start();
    error_reporting(0);
    include('./admin/includes/config.php');
    if (isset($_GET['type'])) {
        if ($_GET['type'] == 'froid') {
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
    <div class="row gutters-sm">
        <div class="col-md-12 text-center mb-3">
       
            <h1>sweet Dishes</h1>
        </div>
        <div class="row">
    <?php foreach ($result as $row) {?>
    <div class="col-md-6">
        <div class="card-body">
            <div class="d-flex flex-wrap">
                <div class="card mb-3" style="width: 24rem; margin-right: 15px;">
                    <img class="card-img-top" src="assets/img/profile/<?= $row['image']; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row["name"]; ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $row["prep_time"]; ?>
                        </p>
                        <p class="card-text">
                            <?php echo $row["nb_people"]; ?>
                        </p>
                        <p class="card-text">
                            <?php echo $row["difficulty"]; ?>
                        </p>
                        <p class="card-text">
                            <?php echo $row["instructions"]; ?>
                        </p>
                        <a href="#" class="btn btn-danger">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</div>
</body>