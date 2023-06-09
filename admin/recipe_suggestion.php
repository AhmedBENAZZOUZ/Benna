<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	if (isset($_GET['del']) && isset($_GET['name'])) {
		$id = $_GET['del'];
		$name = $_GET['name'];

		$sql = "delete from users WHERE id=:id";
		$query = $dbh->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_STR);
		$query->execute();

		$sql2 = "insert into deleteduser (email) values (:name)";
		$query2 = $dbh->prepare($sql2);
		$query2->bindParam(':name', $name, PDO::PARAM_STR);
		$query2->execute();

		$msg = "Data Deleted successfully";
	}

	if (isset($_REQUEST['unconfirm'])) {
		$aeid = intval($_GET['unconfirm']);
		$memstatus = 1;
		$sql = "UPDATE users SET status=:status WHERE  id=:aeid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':status', $memstatus, PDO::PARAM_STR);
		$query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
		$query->execute();
		$msg = "Changes Sucessfully";
	}

	if (isset($_REQUEST['confirm'])) {
		$aeid = intval($_GET['confirm']);
		$memstatus = 0;
		$sql = "UPDATE users SET status=:status WHERE  id=:aeid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':status', $memstatus, PDO::PARAM_STR);
		$query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
		$query->execute();
		$msg = "Changes Sucessfully";
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

		<title>Benna || Admin Manage recipe Suggestion</title>

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
		<style>
			.errorWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #dd3d36;
				color: #fff;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}

			.succWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #5cb85c;
				color: #fff;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
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

							<h2 class="page-title">Manage recipe Suggestion</h2>

							<!-- Zero Configuration Table -->
							<div class="panel panel-default">
								<div class="panel-heading">List recipe suggested</div>
								<div class="panel-body">
									<?php if ($error) { ?>
										<div class="errorWrap" id="msgshow">
											<?php echo htmlentities($error); ?>
										</div>
									<?php } else if ($msg) { ?>
											<div class="succWrap" id="msgshow">
											<?php echo htmlentities($msg); ?>
											</div>
									<?php } ?>
									<table id="zctb" class="display table table-striped table-bordered table-hover"
										cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Image</th>
												<th>Name</th>
												<th>Preparation time</th>
												<th>For number of people</th>
												<th>difficulty</th>
												<th>type</th>
												<th>ingredients</th>
												<th>instructions</th>
												<th>User ID</th>
												<th>User</th>
												<th>Action</th>
											</tr>
										</thead>

										<tbody>

											<?php $sql = "SELECT * from  recette_suggestions ";
											$query = $dbh->prepare($sql);
											$query->execute();
											$results = $query->fetchAll(PDO::FETCH_OBJ);
											if ($query->rowCount() > 0) {
												foreach ($results as $result) { ?>
													<tr>
														<td>
															<?php echo htmlentities($result->id); ?>
														</td>
														<td><img src="../assets/img/recette/<?php echo htmlentities($result->image); ?>"
																style="width:30px; height: 30px; border-radius:50%;" /></td>
														<td>
															<?php echo htmlentities($result->name); ?>
														</td>
														<td>
															<?php echo htmlentities($result->prep_time); ?>
														</td>
														<td>
															<?php echo htmlentities($result->nb_people); ?>
														</td>
														<td>
															<?php echo htmlentities($result->difficulty); ?>
														</td>
														<td>
															<?php echo htmlentities($result->type); ?>
														</td>
														<td>
															<?php echo htmlentities($result->ingredient); ?>
														</td>
														<td>
															<?php echo htmlentities($result->instructions); ?>
														</td>
														<td>
															<?php echo htmlentities($result->user_id); ?>
														</td>
														<td>
															<?php

															$sql_user = "SELECT * from  users where id=$result->user_id";
															$query_user = $dbh->prepare($sql_user);
															$query_user->execute();
															$result_user = $query_user->fetchAll(PDO::FETCH_OBJ);
															if ($query_user->rowCount() > 0) {
																foreach ($result_user as $result) {
																	echo htmlentities($result->name);
																}
															} ?>
															<!-- <td>
											
											<?php if ($result->status == 1) { ?>
													<a href="userlist.php?confirm=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Do you really want to Un-Confirm the Account')">Confirmed <i class="fa fa-check-circle"></i></a> 
													<?php } else { ?>
													<a href="userlist.php?unconfirm=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Do you really want to Confirm the Account')">Un-Confirmed <i class="fa fa-times-circle"></i></a>
													<?php } ?>
</td>
											</td> -->

														<td>
															<a href="edit-user.php?edit=<?php echo $result->id; ?>"
																onclick="return confirm('Do you want to Edit');">&nbsp; <i
																	class="fa fa-pencil"></i></a>&nbsp;&nbsp;
															<a href="userlist.php?del=<?php echo $result->id; ?>&name=<?php echo htmlentities($result->email); ?>"
																onclick="return confirm('Do you want to Delete');"><i
																	class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
														</td>
													</tr>
													<?php $cnt = $cnt + 1;
												}
											} ?>

										</tbody>
									</table>
								</div>
							</div>
							<!-- Zero Configuration Table -->
							<div class="panel panel-default">
								<div class="panel-heading">Add Recipe</div>
								<div class="panel-body">

									<form method="post" action="test.php" name="addRecipe" class="form-horizontal"
										onSubmit="return valid();" enctype="multipart/form-data">


										<?php if ($error) { ?>
											<div class="errorWrap"><strong>ERROR</strong>:
												<?php echo htmlentities($error); ?>
											</div>
										<?php } else if ($msg) { ?>
												<div class="succWrap"><strong>SUCCESS</strong>:
												<?php echo htmlentities($msg); ?>
												</div>
										<?php } ?>
										<div class="form-group">
											<label class="col-sm-4 control-label">Name of recipe</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="name_recipe" id="name_recipe"
													required>
											</div>
										</div>


										<div class="form-group">
											<label class="col-sm-4 control-label">Preparation Time</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="prep_time" id="prep_time"
													required>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-4 control-label">Number of people</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="nb_people" id="nb_people"
													required>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-4 control-label">Difficulty</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="difficulty" id="difficulty"
													required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Type</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="type" id="type" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Ingredients</label>
											<div class="col-sm-8">
												<textarea name="ingredients" rows="5" cols="30"
													class="form-control"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Instructions</label>
											<div class="col-sm-8">
												<textarea rows="5" cols="30" class="form-control" name="instrucions"
													id="instrucions"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Image of recipe</label>
											<div class="col-sm-8">
												<input type="file" class="form-control" name="image" id="image">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">User Id</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="user_id" id="user_name"
													required>
											</div>
										</div>



										<div class="form-group">
											<div class="col-sm-8 col-sm-offset-4">

												<button class="btn btn-primary" name="submit" type="submit">Add
													Recipe</button>
											</div>
										</div>

									</form>
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
		<script type="text/javascript">
			$(document).ready(function () {
				setTimeout(function () {
					$('.succWrap').slideUp("slow");
				}, 3000);
			});
		</script>

	</body>

	</html>
<?php } ?>