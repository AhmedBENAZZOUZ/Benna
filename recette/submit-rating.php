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

    if (isset($_GET['recId']) && isset($_GET['userId'])) {
        $recipe_id = $_GET['recId'];
        $user_id = $_GET['userId'];
    }

    if (isset($_POST['submit-comment'])) {
        $comment = $_POST['comment'];
        $rating = $_POST['rating'];
    }


    echo $recipe_id . "<br />";
    echo $user_id . "<br />";
    echo $rating . "<br />";
    echo $comment . "<br />";

    $query = "insert into comment (content,rating,user_id,recipe_id) values ('$comment','$rating','$user_id','$recipe_id')";

    if (mysqli_query($con, $query)) {
        header("Location: ./recette.php?recId=$recipe_id");
        die;
    }

}

?>