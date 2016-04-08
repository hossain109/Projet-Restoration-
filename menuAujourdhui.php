<?php
//connexion base de donnes
include("connexion.php");
if(isset($_GET['id'])) {
$sql = "SELECT description,nom,image FROM menu_aujourdhui WHERE id=" . $_GET['id'];
$result = $bdd->query("$sql");
$rows = $result->fetch(PDO::FETCH_ASSOC);
header("Content-type: " . $rows["nom"]);
echo $rows["image"];
//echo $rows["description"];
}
//mysql_close($conn);

?>