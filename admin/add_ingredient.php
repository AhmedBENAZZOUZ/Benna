<?php
session_start();
error_reporting(0);
include('.\includes\config.php');

if (isset($_POST['submit'])) {

	// get the form data
	$name = $_POST['name'];
	$description = $_POST['description'];
	
	if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
		$image = $_FILES['image']['name'];
		$image_tmp_name = $_FILES['image']['tmp_name'];
		$image_size = $_FILES['image']['size'];
		$image_folder = '../assets/img/' . $image;



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
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Admin | Benna</title>
	
	<link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

		* {
			box-sizing: border-box;
		}










		button {
			border-radius: 20px;
			border: 1px solid #6c757d;
			;
			background-color: #6c757d;
			;
			color: #FFFFFF;
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

		.form-container {
			position: absolute;
			top: 0;
			height: 100%;
			transition: all 0.6s ease-in-out;
		}

		.sign-in-container {
			left: 0;
			width: 50%;
			z-index: 2;
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

	<div class="ts-main-content">
		<?php include('includes/leftbar.php'); ?>
		<div class="content-wrapper">

			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<br>
						</br>
						</br>
						</br>

						<div class="container-fluid">

							<div class="container" id="container">

								<form action="" method="post" enctype="multipart/form-data">

									<div class="  sign-in-container">
										</br>
										</br>
										</br>
										<h1>Add ingredient</h1>
										<input type="text" placeholder="name" name="name"required />
										<input type="text" placeholder="decription" name="description"
											style="height: 100px; " ; />
										<input type="file" name="image" accept=".jpg, .jpeg, .png, .gif" required />
										<a href="dashboard.php"><button type="submit" name="submit">Add</button></a>

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

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

	<script>

		window.onload = function () {

			// Line chart from swirlData for dashReport
			var ctx = document.getElementById("dashReport").getContext("2d");
			window.myLine = new Chart(ctx).Line(swirlData, {
				responsive: true,
				scaleShowVerticalLines: false,
				scaleBeginAtZero: true,
				multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
			});

			// Pie Chart from doughutData
			var doctx = document.getElementById("chart-area3").getContext("2d");
			window.myDoughnut = new Chart(doctx).Pie(doughnutData, { responsive: true });

			// Dougnut Chart from doughnutData
			var doctx = document.getElementById("chart-area4").getContext("2d");
			window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, { responsive: true });

		}
	</script>
</body>

</html>