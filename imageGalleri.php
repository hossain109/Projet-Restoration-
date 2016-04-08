<?php
//mysql_connect("127.0.0.1","root","root") or die(mysql_error());
//mysql_select_db("restov") or die(mysql_error());
include("connexion.php");
if(isset($_GET['id'])) {
$sql = "SELECT description,name,image FROM galleri WHERE id=" . $_GET['id'];
$result = mysql_query("$sql") or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysql_error());
$rows = mysql_fetch_array($result);
header("Content-type: " . $rows["name"]);
echo $rows["image"];
//echo $rows["description"];
}
//mysql_close($conn);

?>
