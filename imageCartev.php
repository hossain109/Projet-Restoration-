<?php
//affichge image
include("connexion.php");
if(isset($_GET['id'])) {
$sql = "SELECT nom_image,image FROM imagecartev WHERE id=" . $_GET['id'];
$result = $bdd->query("$sql");
$rows = $result->fetch(PDO::FETCH_ASSOC);
header("Content-type: " . $rows["nom_image"]);
echo $rows["image"];
//echo $rows["description"];
}
//mysql_close($conn);

?>