<?php
//mysql_connect("127.0.0.1","root","root") or die(mysql_error());
//mysql_select_db("restov") or die(mysql_error());
include("connexion.php");
if(isset($_GET['id'])) {
$sql = "SELECT description,name,image FROM dessarts WHERE id=" . $_GET['id'];
$result = $bdd->query("$sql");
$rows = $result->fetch(PDO::FETCH_ASSOC);
header("Content-type: " . $rows["name"]);
echo $rows["image"];
//echo $rows["description"];
}
//mysql_close($conn);

?>
