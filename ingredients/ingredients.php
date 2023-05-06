 <?php
// Connexion à la base de données
 include('../Config.php');

 //Récupération de la valeur de recherche depuis la requête AJAX
 $search_term = mysqli_real_escape_string($con, $_GET['term']);

// // Recherche des ingrédients correspondant à la valeur de recherche
 $query = "SELECT * FROM ingredients WHERE name LIKE '%$search_term%'";
 $result = mysqli_query($con, $query);

// // Construction du tableau de résultats au format JSON
 $results = array();
 while ($row = mysqli_fetch_assoc($result)) {
   $results[] = $row['name'];
 }
 echo json_encode($results); 
?>
