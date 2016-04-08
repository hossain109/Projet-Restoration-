<?php
//session_start();
//require_once("../connecxion.php");
include("../connexion.php");
if(isset($_GET['delete_plats'])){
$id=$_GET['delete_plats'];
$sql="DELETE FROM plats WHERE id='$id'" ;
$res=$bdd->query($sql);
echo "<meta http-equiv='refresh' content='0;url=galleri.php'>";
}

?>