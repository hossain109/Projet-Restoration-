<?php
//session_start();
//require_once("../connecxion.php");
include("../connexion.php");
if(isset($_GET['delete'])){
$id=$_GET['delete'];
$sql="DELETE FROM menu_entrees WHERE id='$id'" ;
$res=mysql_query($sql) or die("could not delete".mysql_error());
echo "<meta http-equiv='refresh' content='0;url=menu.php'>";
}

?>