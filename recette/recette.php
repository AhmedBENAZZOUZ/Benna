<?php
include('../Config.php');

session_start();
$user_id = $_SESSION['id'];

if (isset($_POST['submit-recette'])) {
    $name = $_POST['Nom_recette'];
    $time = $_POST['temps_preparation'];
    $number_pp = $_POST['nbre_personne'];
    $difficulty = $_POST['difficulte'];
    $type = $_POST['type_plat'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_folder = '../assets/img/recette/' . $image;
  
        if($image_size > 2000000){
           header("Location: ../index.php?error=Image size too large");
           die;
        }
  
        $query = "insert into recette_suggestions (id,name,prep_time,nb_people,difficulty,type,ingredient,instructions,image,user_id) values (NULL,'$name','$time','$number_pp','$difficulty','$type','$ingredients','$instructions','$image','$user_id')";
  
        if (mysqli_query($con, $query)) {
           move_uploaded_file($image_tmp_name, $image_folder);
           header("Location: ../index.php?success=recipe suggested succesfully");
           die;
        }
     } else {
        $default_img = 'default.png';
        $query = "insert into recette_suggestions (id,name,prep_time,nb_people,difficulty,type,ingredient,instructions,image,user_id) values (NULL,'$name','$time','$number_pp','$difficulty','$type','$ingredients','$instructions','$default_img','$user_id')";
  
        if (mysqli_query($con, $query)) {
            header("Location: ../index.php?success=recipe suggested succesfully");
           die;
        }
     }

}