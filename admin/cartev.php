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
 <p style="color:red;font-weight:20px;">Inserer le image pour carte de vins</p>
<hr width="100%" height="3" color="red">
<div style="width:600px; height:140px;border-style:solid; border-width:5px;margin-bottom:5px;">
 <form action="cartev.php" method="post" enctype="multipart/form-data">
 <pre>
<label>Type de Vin:     </label><select name="choice" size="1" >
<option value="vin_rouge" >Vin Rouge</option>
       <option value="vin_blanc" >Vin Blanc</option>
       <option value="vin_rose" >Vin Rose</option>
</select><br />
                             <label>Image:        </label><input type="file" name="image" id="image" /><br/> 
                     <input type="submit" name="envoyer" id="envoyer" value="Envoyer">
 </pre>
 </form>
</div>
 <?php
 if(isset($_POST['envoyer']) && isset($_POST['choice'])) {

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
 //on se connecte à la bdd
 //$bdd=new PDO('mysql:host=localhost;dbname=nfa021','root','');
 //récupération des infos saisies



 //Lecture de l'image . J'utilise la fonction mysql_escape_string car les données binaires contiennent des caractères spéciaux.
 //$image = mysql_escape_string(file_get_contents($_FILES['image']['tmp_name']));

 //Il ne reste qu'à insérer tout ça dans notre table.
 //mysql_query("INSERT INTO `accuil` VALUES('','".$nom."','".$_FILES[image][type]."')") or exit (mysql_error());
 //mysql_close();
 //echo 'L insertion s est bien déroulée !';
  $imageName=mysql_real_escape_string($_FILES["image"]["name"]);
 //print_r($_FILES["image"]);
 $imageData=mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
 $selcet_choice=$_POST['choice'];
 if($selcet_choice=='vin_rouge')
 $current_id=$bdd->query("update imageCartev set nom_image='$imageName', image='$imageData' where nom_vin='vin_rouge' ");
 else if($selcet_choice=='vin_blanc')
 $current_id=$bdd->query("update imageCartev set nom_image='$imageName', image='$imageData' where nom_vin='vin_blanc' ");
 else if($selcet_choice=='vin_rose')
 $current_id=$bdd->query("update imageCartev set nom_image='$imageName', image='$imageData' where nom_vin='vin_rose' ");
 else echo "votre choix pas bon";
 if($current_id==true)
echo "image uploaded";

 }
 }
 }
 }
 ?>

 <p style="color:red;font-weight:20px;">Inserer les valeurs pour carte de vins</p>
<hr width="100%" height="3" color="red"><br /><br />
<div id="insert_image" style="width:600px; height:270px;border-style:solid; border-width:5px;margin-bottom:5px;">
 <form action="cartev.php" method="post" enctype="multipart/form-data">
 <pre>
<label>Type de Vin:     </label><select name="choice" size="1" >
<option value="vin_rouge" >Vin Rouge</option>
       <option value="vin_blanc" >Vin Blanc</option>
       <option value="vin_rose" > Vin Rosé</option>
</select><br />
<label>Description: </label><input type="text" name="description" id="description" /><br/>
     <label>Region: </label><input type="text" name="region" id="region" /><br/>
       <label>Anée: </label><input type="text" name="anee" id="anee" /><br/>
       <label>Prix: </label><input type="text" name="prix" id="prix" /><br/> 
                     <input type="submit" name="validation" id="validation" value="Envoyer">
 </pre>
 </form>

  
 <?php
 if(isset($_POST['validation']) && isset($_POST['choice']) && !empty($_POST['region']) && !empty($_POST['anee']) && !empty($_POST['prix'])) {
 $selcet_choice=$_POST['choice'];
 $description = $_POST['description'];
  $region = $_POST['region'];
 $anee = $_POST['anee'];
 $prix = $_POST['prix'];
 $current_id=$bdd->query("insert into `cartev` values('','$selcet_choice','$description','$region','$anee','$prix') ");
 //echo "successful";
 if($current_id){
//header("Location: /stage/index.php");
echo "successful";
}
 }

 ?>
 </div>
 </center><br /> <br />
 <center>
    <p>Votre donees des Rouge</p>
	<hr width="100%" height="3" color="red"><br /><br />
 <div class="display_image" style="width:600px;border-style:solid; border-width:5px;margin-bottom:50px;">
  <?php 
$result=$bdd->query("SELECT id,region,description,anee,prix FROM `cartev` where nom_vin='vin_rouge' ");
echo "<table border='2'>";
 echo "<th>Description</th><th>Region</th><th>Anee</th><th>Prix</th><th>Supprimer</th>";
 if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $id=$rows['id'];
   $description=$rows['description'];
   $region=$rows['region'];
   $anee=$rows['anee'];
   $prix=$rows['prix'];
	  echo "<tr><td>$description</td><td>$region</td><td>$anee</td><td>$prix</td><td><a href='delete_cartev.php?delete=$rows[id]'>suppreme</a></td></tr>";
 }  //endwhile;
 	 echo "</table>";
 }
else{
 echo "Aucun donees ou error";
 }
?>  
</div>
 </center>
 
  <center>
    <p>Votre donees des Blanc</p>
	<hr width="100%" height="3" color="red"><br /><br />
 <div class="display_image" style="width:600px;border-style:solid; border-width:5px;margin-bottom:50px;">
  <?php 
$result=$bdd->query("SELECT id,description,region,anee,prix FROM `cartev` where nom_vin='vin_blanc' ");
echo "<table border='2'>";
 echo "<th>Description</th><th>Region</th><th>Anee</th><th>Prix</th><th>Supprimer</th>";
 if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $id=$rows['id'];
   $description=$rows['description'];
   $region=$rows['region'];
   $anee=$rows['anee'];
   $prix=$rows['prix'];
	  echo "<tr><td>$description</td><td>$region</td><td>$anee</td><td>$prix</td><td><a href='delete_cartev.php?delete=$rows[id]'>suppreme</a></td></tr>";
 }  //endwhile;
 	 echo "</table>";
 }
else{
 echo "Aucun donees ou error";
 }
?>  
</div>
 </center>
 
  <center>
    <p>Votre donees des Rosé</p>
	<hr width="100%" height="3" color="red"><br /><br />
 <div class="display_image" style="width:600px;border-style:solid; border-width:5px;margin-bottom:50px;">
  <?php 
$result=$bdd->query("SELECT id,description,region,anee,prix FROM `cartev` where nom_vin='vin_rose' ");
echo "<table border='2'>";
 echo "<th>Description</th><th>Region</th><th>Anee</th><th>Prix</th><th>Supprimer</th>";
 if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $id=$rows['id'];
   $description=$rows['description'];
   $region=$rows['region'];
   $anee=$rows['anee'];
   $prix=$rows['prix'];
	  echo "<tr><td>$description</td><td>$region</td><td>$anee</td><td>$prix</td><td><a href='delete_cartev.php?delete=$rows[id]'>suppreme</a></td></tr>";
 }  //endwhile;
 	 echo "</table>";
 }
else{
 echo "Aucun donees ou error";
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