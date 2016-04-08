 <?php
   include("../connexion.php");
   session_start();
if(isset($_SESSION['username']) && $_SESSION['password'])		//si administrateur afficher la page
	{
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css">
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script> -->
    <title>Resto v</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
		<link rel="shortcut icon" type="image/png" href="../images/ico.png" />
	<script type="text/javascript" src="../js/coolclock.js"></script>
	<script type="text/javascript" src="../js/moreskins.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript">

	function initialize() {

		CoolClock.findAndCreateClocks();

		var cal = new YAHOO.widget.Calendar("calContainer");

		cal.render();

	}

</script>
	<script type="text/javascript">
$(function (){

    $('#nav ul li a').each(function(){
        var path = window.location.href;
        var current = path.substring(path.lastIndexOf('/')+1);
        var url = $(this).attr('href');

        if(url == current){
            $(this).addClass('active');
        };
    });         
});

</script> 
<style >
        #logout_tab{
		 color: #00AE00;
         text-decoration:none;
         text-align:center;
         line-height:25px;
         display:block;
		 background-color:black;
		 height:35px;
		 margin-left:845px;
		 padding-top:6px;
</style>
</head>
<body onload="initialize();">
<div id="wrapper">
 <?php
   include("../include/header.php");
 ?>

<!--header-->
<div id="nav">

<ul id="nav-ligne"  >
 <li><a href="accueil.php"><span class="t">Accuil</span></a></li>
 <!--<li><a href="restov.php" class="active"><span class="t">Resto à Vin</span></a> <span class="darrow">&#9660;</span>-->
			<!--<ul class="sec1">
				<li><a href="#">Item1</a></li>
				<li><a href="#">Itexxm2</a></li>
				<li><a href="#">Item3</a></li>
				<li><a href="#">Item3</a></li>
				<li><a href="#">Item4</a></li>
			</ul></li>-->
		
 
 
 <li><a href="reserve.php"><span class="t" ><font color="blue">Reserve</font></span></a></li>
 <li><a href="menu.php"><span class="t">Menus</span></a></li>
 <li><a href="cartev.php"><span class="t">Carte de vin</span></a></li>
 <li><a href="galleri.php"><span class="t">Galerie</span></a></li>
 <li><a href="contact.php"><span class="t">contact</span></a></li>
 <li><a href="change_password.php"><span class="t">Changer ID</span></a></li>
 </ul>
 <div id="logout_tab">
 		 <?php if(isset($_SESSION['username'])){
		//echo "test";
		echo "<a href='?logout=true'>Logout</a>";
		
		if(isset($_GET['logout']) && $_GET['logout']=="true"){
		session_destroy();
		//section logout
		
		header( "Location:http://localhost/stage/index.php");
		}//else{
		//echo "Not working";
		//}
		}?>
 </div>

</div>
<!--nav-->

 <br /><br />
<div id="contenu">
<center>
 <p style="color:red;font-weight:20px;">Inserer votre image pour Galleri</p>
<hr width="100%" height="3" color="red"><br /><br />
<div id="insert_image" style="width:600px; height:120px;border-style:solid; border-width:5px;margin-bottom:5px;">
 <form action="galleri.php" method="post" enctype="multipart/form-data">
 <pre>
<label>Type de Image:                </label><select name="choice" size="1" >
      <option value="plats" >plats</option>
       <option value="vins" >vins</option>
       <option value="dessarts" >dessarts</option>
	   <?php 
	   if(isset($_POST['choice'])){
	    $selcet_choice=$_POST['choice'];
	   }
	   ?>
</select><br />
 <label>Decription de Image: </label><input type="text" name="description" id="description"><br/>
                       <label>Image:        </label><input type="file" name="image" id="image"><br/>
                                  <input type="submit" name="validation" id="validation" value="Envoyer">
 </pre>
 </form><br/><br/>

  
 <?php
 
 
 if(isset($_POST['validation'])) {

 //Indique si l'image a été téléchargé
 if(!is_uploaded_file($_FILES['image']['tmp_name']))
 echo 'Un problème est survenu durant l opération. Veuillez réessayer !';
 else {
 //liste des extensions possibles 
 $extensions = array('/png', '/gif', '/jpg', '/jpeg');

 //récupère la chaîne à partir du dernier / pour connaître l'extension
 $extension = strrchr($_FILES['image']['type'], '/');

 //vérifie si l'extension est dans notre tableau 
 if(!in_array($extension, $extensions))
 echo 'Vous devez uploader un fichier de type png, gif, jpg, jpeg.';
 else { 

 //on définit la taille maximale
 define('MAXSIZE', 300000); 
 if($_FILES['image']['size'] > MAXSIZE)
 echo 'Votre image est supérieure à la taille maximale de '.MAXSIZE.' octets';
 else {
 $description = $_POST['description'];
  $imageName=mysql_real_escape_string($_FILES["image"]["name"]);
 //print_r($_FILES["image"]);
 $imageData=mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
if ($selcet_choice=="plats") {
$result = $bdd->query("SELECT * FROM plats");
$rows =  $result->rowCount();
echo "There are " . $rows . " rows in my table.";
 if($rows<7)
 $current_id=$bdd->query("insert into `plats` values('','$description','$imageName','$imageData') ")or die("<b>Error:</b> Problem on Image Insert<br/>" . mysql_error());
   else echo "stack overflow pour $selcet_choice";
 }
 
 else if($selcet_choice=="vins"){
 $result = $bdd->query("SELECT * FROM vins");
$rows =  $result->rowCount();
//echo "There are " . $rows . " rows in my table.";
 if($rows<7)
  $current_id=$bdd->query("insert into `vins` values('','$description','$imageName','$imageData') ")or die("<b>Error:</b> Problem on Image Insert<br/>" . mysql_error());
   else echo "stack overflow pour $selcet_choice";
 }
 
 else if($selcet_choice=="dessarts"){
 $result = $bdd->query("SELECT * FROM dessarts");
$rows =  $result->rowCount();
//echo "There are " . $rows . " rows in my table.";
 if($rows<7)
  $current_id=$bdd->query("insert into `dessarts` values('','$description','$imageName','$imageData') ")or die("<b>Error:</b> Problem on Image Insert<br/>" . mysql_error());
   else echo "stack overflow pour $selcet_choice";
 }
 else echo "error";
 
 //if($current_id){
//header("Location: /stage/galleri.php");
//}
 }
 }
 }
 }

 ?>
 </div>
 </center>
  <center>
    <p style="margin-top:50px;">Votre image sur le base de donnees</p>
	<hr width="100%" height="3" color="red"><br /><br />
Image de Plats
	<div id="display_image" style="width:600px;border-style:solid; border-width:5px;margin-bottom:50px;">

 <?php 
$result=$bdd->query("SELECT id,description,name FROM `plats`");
echo "<table border='2'>";
echo "<th>Description de image<th>Nom de image</th><th>Supprimer</th>";
if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $id=$rows['id'];
   $description=$rows['description'];
   $name=$rows['name'];
	  echo "<tr><td> $description </td><td>$name</td><td><a href='delete_plats.php?delete_plats=$rows[id]'>suppreme</a></td></tr>";
 }  //endwhile;
 	 echo "</table>";
 }else{
 echo "error";
 }
?>
  
  </div>
  
  Image de vins
	<div id="display_image" style="width:600px;border-style:solid; border-width:5px;margin-bottom:50px;">

 <?php 
$result=$bdd->query("SELECT id,description,name FROM `vins`");
echo "<table border='2'>";
echo "<th>Description de image<th>Nom de image</th><th>Supprimer</th>";
if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $id=$rows['id'];
   $description=$rows['description'];
   $name=$rows['name'];
	  echo "<tr><td> $description </td><td>$name</td><td><a href='delete_vins.php?delete_vins=$rows[id]'>suppreme</a></td></tr>";
 }  //endwhile;
 	 echo "</table>";
 }else{
 echo "error";
 }
?>
  
  </div>
  
  Image de dessarts
	<div id="display_image" style="width:600px;border-style:solid; border-width:5px;margin-bottom:50px;">

 <?php 
$result=$bdd->query("SELECT id,description,name FROM `dessarts`");
echo "<table border='2'>";
echo "<th>Description de image<th>Nom de image</th><th>Supprimer</th>";
if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $id=$rows['id'];
   $description=$rows['description'];
   $name=$rows['name'];
	  echo "<tr><td> $description </td><td>$name</td><td><a href='delete_dessarts.php?delete_dessarts=$rows[id]'>suppreme</a></td></tr>";
 }  //endwhile;
 	 echo "</table>";
 }else{
 echo "error";
 }
?>
  
  </div>
  </center>
   </div>

 <?php
   include("../include/footer.php");
 ?>
 <!--footer-->
</div>
</body>
</html>
<?php
}
?>