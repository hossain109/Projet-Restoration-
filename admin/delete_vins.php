<?php
//session_start();
//require_once("../connecxion.php");
include("../connexion.php");
if(isset($_GET['delete_vins'])){
$id=$_GET['delete_vins'];
$sql="DELETE FROM vins WHERE id='$id'" ;
$res=$bdd->query($sql);
echo "<meta http-equiv='refresh' content='0;url=galleri.php'>";
}

?>