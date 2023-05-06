<?php
session_start();
error_reporting(0);
include('C:\wamp64\www\Benna\admin\includes\config.php');

if(isset($_POST['submit'])) {

    // get the form data
    $name = $_POST['name'];
	echo $name;
    $description = $_POST['description'];
	echo $description;
	if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
		$image = $_FILES['image']['name'];
		$image_tmp_name = $_FILES['image']['tmp_name'];
		$image_size = $_FILES['image']['size'];
		$image_folder = '../assets/img/profile/' . $image;

   

    $stmt = $dbh->prepare("INSERT INTO ingredient (name, image,description ) VALUES (:name,:image, :description )");

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);
	$stmt->execute();
        
	// Redirect to the dashboard
	header('Location: dashboard.php');
	exit();
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">
	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">

	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">


	<title>Sign in | Benna</title>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

		* {
			box-sizing: border-box;
		}

		body {
			background: #f6f5f7;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			font-family: 'Montserrat', sans-serif;
			height: 100vh;
			margin: -20px 0 50px;
		}

		h1 {
			font-weight: bold;
			margin: 0;
		}

		h2 {
			text-align: center;
		}

		p {
			font-size: 14px;
			font-weight: 100;
			line-height: 20px;
			letter-spacing: 0.5px;
			margin: 20px 0 30px;
		}

		span {
			font-size: 12px;
		}

		a {
			color: #333;
			font-size: 14px;
			text-decoration: none;
			margin: 15px 0;
		}

		button {
			border-radius: 20px;
			border: 1px solid #FF4B2B;
			background-color: #6c757d;
			color: #fff;
			font-size: 12px;
			font-weight: bold;
			padding: 12px 45px;
			letter-spacing: 1px;
			text-transform: uppercase;
			transition: transform 80ms ease-in;
		}

		button:active {
			transform: scale(0.95);
		}

		button:focus {
			outline: none;
		}

		button.ghost {
			background-color: transparent;
			border-color: #FFFFFF;
		}

		form {
			background-color: #FFFFFF;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding: 0 50px;
			height: 100%;
			text-align: center;
		}

		input {
			background-color: #eee;
			border: none;
			padding: 12px 15px;
			margin: 8px 0;
			width: 100%;
		}

		.container {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
				0 10px 10px rgba(0, 0, 0, 0.22);
			position: relative;
			overflow: hidden;
			width: 900px;
			height: 65%;
			max-width: 100%;
			min-height: 480px;
		}

		@keyframes show {

			0%,
			49.99% {
				opacity: 0;
				z-index: 1;
			}

			50%,
			100% {
				opacity: 1;
				z-index: 5;
			}
		}
	</style>
</head>

<body>
<?php include('includes/header.php'); ?>
	<div class="container" id="container">

		<form action="" method="post" enctype="multipart/form-data">

			<div class="  sign-in-container">
				<h1>Add ingredient</h1>
				<input type="text" placeholder="name" name="name" />
				<input type="text" placeholder="decription" name="description" style="height: 100px; " ; />
				<input type="file" name="image" accept=".jpg, .jpeg, .png, .gif" required />
				<a href="dashboard.php"><button type="submit" name="submit">Add</button></a>

			</div>
		</form>

	</div>


</body>

</html>