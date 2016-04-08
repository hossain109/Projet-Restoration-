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
		//echo "<br /> Successfully Logout";
		
		header( "Location:http://localhost/stage/index.php");
		}//else{
		//echo "Not working";
		//}
		}?>
 </div>

</div>


<div id="contenu">
<center>
<p style="color:red;font-weight:20px;">Upload votre image de menu de aujourdhui</p>
<form action="menu.php" method="post" enctype="multipart/form-data">
<pre>
<label>Image de votre menu de aujourdhui:</label><input type="file" name="image" id="image" /><br/>
                                  <input type="submit" name="validation1" id="validation1" value="Envoyer" /></pre>
</form>

<?php

 if(isset($_POST['validation1'])) {

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

 //récupération des infos saisies
 //$description = mysql_escape_string($_POST['description']);


 //Lecture de l'image . J'utilise la fonction mysql_escape_string car les données binaires contiennent des caractères spéciaux.
 //$image = mysql_escape_string(file_get_contents($_FILES['image']['tmp_name']));

 //Il ne reste qu'à insérer tout ça dans notre table.
 //mysql_query("INSERT INTO `accuil` VALUES('','".$nom."','".$_FILES[image][type]."')") or exit (mysql_error());
 //mysql_close();
 //echo 'L insertion s est bien déroulée !';
 
  $imageName=mysql_real_escape_string($_FILES["image"]["name"]);
 //print_r($_FILES["image"]);
 $imageData=mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
   
 $current_id=$bdd->query("update menu_aujourdhui set nom='$imageName', image='$imageData' where description='sohrab' ")or die("<b>Error:</b> Problem on Image Insert<br/>" . mysql_error());
if($current_id==true)
echo "image uploaded";

 }
 }
 }
 }
?>


<hr width="100%" height="3" color="red"><br /><br />
 <p style="color:red;font-weight:20px;">Inserer votre nom de Menus</p>
<hr width="100%" height="3" color="red"><br /><br />
<div id="insert_image" style="width:600px; height:120px;border-style:solid; border-width:5px;margin-bottom:5px;">
 <form action="menu.php" method="post" enctype="multipart/form-data">
 <pre>
<label>Type de Menu:                </label><select name="choice" size="1" >
      <option value="entrees" >Entree</option>
       <option value="plats" >Plat</option>
       <option value="dessarts" >Dessarts</option>
       <option value="cafes" >Cafe</option>
	   <?php 
	  // if(isset($_POST['choice'])){
	    //$selcet_choice=$_POST['choice'];
	   //}
	   ?>
</select><br />
 <label>Decription de Menu: </label><input type="text" name="nom" id="nom" ><br/>
        <label>Prix:        </label><input type="text" name="prix" id="prix">&euro;<br/>
 
                                 <input type="submit" name="validation" id="validation" value="Envoyer">
								 
								 
 </pre>
 </form>

  
 <?php

 if(isset($_POST['validation']) && isset($_POST['choice'] )) {
 
 if(!empty($_POST['nom'])&& !empty($_POST['prix'])){
         $nom=$_POST['nom'];
		 //echo $nom;
         $prix=$_POST['prix'];
         //echo $prix;
		 $selcet_choice=$_POST['choice'];
    
//if ($selcet_choice=="entrees") {
   
 $current_id=$bdd->query("insert into `menu` values('','$nom','$prix','$selcet_choice') ")or die("<b>Error:</b> Probleme sur inserer menu<br/>" . mysql_error());
// }
 //else if($selcet_choice=="plats"){
  //$current_id=mysql_query("insert into `menu_plats` values('','$nom','$prix')")or die("<b>Error:</b> Probleme sur inserer menu<br/>" . mysql_error());
 //}
 //else if($selcet_choice=="dessarts"){
 // $current_id=mysql_query("insert into `menu_dessarts` values('','$nom','$prix') ")or die("<b>Error:</b>Probleme sur inserer menu<br/>" . mysql_error());
 //}
 // else if($selcet_choice=="cafes"){
 // $current_id=mysql_query("insert into `menu_cafes` values('','$nom','$prix') ")or die("<b>Error:</b>Probleme sur inserer menu<br/>" . mysql_error());
 }
 if($current_id)
 echo "successful";
 else echo "error";

}

else {
echo ">>>selectioner votre nom et prix de menu..<<<<";
}

 ?>
 </div>
 </center><br /> <br /></br>
  <center>
    
	<hr width="100%" height="3" color="red"><br /><br />
	<p>Votre Menu sur le base de donnees</p>
Menu de entrees
	<div id="display_image" style="width:600px;border-style:solid; border-width:5px;margin-bottom:50px;">

 <?php 
$result=$bdd->query("SELECT id,nom,prix FROM `menu` where nom_menu='entrees' ");
echo "<table border='2'>";
echo "<th>Nom de enrees<th>prix &euro;</th><th>Supprimer</th>";
if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $id=$rows['id'];
   $nom=$rows['nom'];
   $prix=$rows['prix'];
	  echo "<tr><td> $nom </td><td>$prix</td><td><a href='delete_menu.php?delete=$rows[id]'>suppreme</a></td></tr>";
 }  //endwhile;
 	 echo "</table>";
 }else{
 echo "error";
 }
?>
  
  </div>
  
 Menu de Plats
	<div id="display_image" style="width:600px;border-style:solid; border-width:5px;margin-bottom:50px;">

 <?php 
$result=$bdd->query("SELECT id,nom,prix FROM `menu` where nom_menu='plats' ");
echo "<table border='2'>";
echo "<th>Nom de plats<th>prix &euro;</th><th>Supprimer</th>";
if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $id=$rows['id'];
   $nom=$rows['nom'];
   $prix=$rows['prix'];
	  echo "<tr><td> $nom </td><td>$prix</td><td><a href='delete_menu.php?delete=$rows[id]'>suppreme</a></td></tr>";
 }  //endwhile;
 	 echo "</table>";
 }else{
 echo "error";
 }
?>
  
  </div>
  
  Menu de dessarts
	<div id="display_image" style="width:600px;border-style:solid; border-width:5px;margin-bottom:50px;">

 <?php 
$result=$bdd->query("SELECT id,nom,prix FROM `menu` where nom_menu='dessarts' ");
echo "<table border='2'>";
echo "<th>Nom de dessarts<th>prix &euro;</th><th>Supprimer</th>";
if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $id=$rows['id'];
   $nom=$rows['nom'];
   $prix=$rows['prix'];
	  echo "<tr><td> $nom </td><td>$prix</td><td><a href='delete_menu.php?delete=$rows[id]'>suppreme</a></td></tr>";
 }  //endwhile;
 	 echo "</table>";
 }else{
 echo "error";
 }
?>
  
  </div>
  
    Menu de Cafe
	<div id="display_image" style="width:600px;border-style:solid; border-width:5px;margin-bottom:50px;">

 <?php 
$result=$bdd->query("SELECT id,nom,prix FROM `menu` where nom_menu='cafes' ");
echo "<table border='2'>";
echo "<th>Nom de cafe<th>prix &euro;</th><th>Supprimer</th>";
if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $id=$rows['id'];
   $nom=$rows['nom'];
   $prix=$rows['prix'];
	  echo "<tr><td> $nom </td><td>$prix</td><td><a href='delete_menu.php?delete=$rows[id]'>suppreme</a></td></tr>";
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

</div>
</body>
</html>
<?php
}
?>