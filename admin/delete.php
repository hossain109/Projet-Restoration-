<?php
//session_start();
//require_once("../connecxion.php");
 include("../connexion.php");
if(isset($_GET['delete'])){
$id=$_GET['delete'];
$sql="DELETE FROM accuil WHERE id='$id'" ;
$res=$bdd->query($sql) or die("could not delete".mysql_error());
echo "<meta http-equiv='refresh' content='0;url=accueil.php'>";
}

?>