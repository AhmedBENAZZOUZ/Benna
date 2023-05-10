<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $name = $_POST['name_recipe'];
        $prep_time = $_POST['prep_time'];
        $nb_people = $_POST['nb_people'];
        $difficulty = $_POST['difficulty'];
        $type = $_POST['type'];
        $ingredients = $_POST['ingredients'];
        $instructions = $_POST['instrucions'];
        $user_id = $_POST['user_id'];

        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
            echo '<script>alert("This is an alert message!");</script>';
            $image = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_size = $_FILES['image']['size'];
            $image_folder = '../assets/img/recette/' . $image;
            
            $sql = "insert into recette (id,name,prep_time,nb_people,difficulty,type,ingredient,instructions,image,user_id) values (NULL,?,?,?,?,?,?,?,?,?)";
            $stmt = $dbh->prepare($sql);
            if ($stmt->execute([$name,$prep_time,$nb_people,$difficulty,$type,$ingredients,$instructions,$image,$user_id])) {
                move_uploaded_file($image_tmp_name, $image_folder);
                header("Location: ./recipe_suggestion.php?success=Recipe Added successfully");
                die;
            } 
        } else {
            $default_img = 'default.png';
            $sql = "insert into recette (id,name,prep_time,nb_people,difficulty,type,ingredient,instructions,image,user_id) values (NULL,?,?,?,?,?,?,?,?,?)";
            $stmt = $dbh->prepare($sql);
            if ($stmt->execute([$name,$prep_time,$nb_people,$difficulty,$type,$ingredients,$instructions,$default_img,$user_id])) {
                header("Location: ./recipe_suggestion.php?success=Recipe Added successfully");
                die;
            } 
        }

    }
}
?>