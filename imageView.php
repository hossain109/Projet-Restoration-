<?php
include("connexion.php");
if(isset($_GET['id'])) {
$sql = "SELECT name,image FROM accuil WHERE id=" . $_GET['id'];
$result = $bdd->query($sql);
$rows = $result->fetch(PDO::FETCH_ASSOC);
header("Content-type: " . $rows["name"]);
echo $rows["image"];
}
//mysql_close($conn);

?>
