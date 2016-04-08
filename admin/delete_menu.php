<?php
//session_start();
//require_once("../connecxion.php");
include("../connexion.php");
if(isset($_GET['delete'])){
$id=$_GET['delete'];
$sql="DELETE FROM menu WHERE id='$id'" ;
$res=$bdd->query($sql);
echo "<meta http-equiv='refresh' content='0;url=menu.php'>";
}

?>