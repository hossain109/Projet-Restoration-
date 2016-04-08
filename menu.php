
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<meta name="keywords" content="restov,resto-v,resto v, resto à vin, vin de resto restov,
	reserve, carte de vin, gallarie, contact, resto de La Garenne Colombes" />

	<meta name="description" content="restov le restoration, reserver pour place,
	message de chef frank grima. restov sur Facebook, astuces web, couverture de live sur le Web." />
	

    <title>Resto v</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
		<link rel="shortcut icon" type="image/png" href="images/ico.png" />
	<script type="text/javascript" src="js/coolclock.js"></script>
	<script type="text/javascript" src="js/moreskins.js"></script>
	   <script src="http://code.jquery.com/jquery-1.5.min.js"></script>
	<script src="http://cdn.wideskyhosting.com/js/jquery.cycle.js"></script>
	<!-- jQuery & Nivo Slider -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


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
<style>
p.text{
margin: 0.9em;  
font-family: Tahoma, Arial, Helvetica, sans-serif; 
font-style: normal; 
font-weight: normal; 
font-size: 13px; 
text-align: justify; 
line-height: 18px;
}
</style>
</head>
<body onload="initialize();">
<div id="wrapper">
 <?php
   include("include/header.php");
 ?>

<!--header-->

 <?php
   include("include/nav.php");
 ?>
<!--nav-->
 <?php
   include("connexion.php");
 ?>



<div id="contenu">

<div id ="manu_content">
<p style="display:block;border:2px solid blue;background:yellow;width:100px;text-align:center;margin-left:40px;font-size:24px;">Menu</p>
<ul id="list_menu">
 	<li>
		<a href="#menu_aujourdhui" class="active"><span style="color:black;opacity:.7;font-family: Tahoma, Arial, Helvetica, sans-serif;font-weight: normal;font-size: 23px;" >Menu d'aujourd'hui</span></a>
		<hr width="100%" color="#fff">
	</li>
	<li>
		<a href="#les_entrees" class="active"><span style="color:black;opacity:.7;font-family: Tahoma, Arial, Helvetica, sans-serif;font-weight: normal;font-size: 23px;">Les Entrees</span></a>
		<hr width="100%" color="#fff">
	</li>
	<li>
	    <a href="#les_plats" class="active"><span style="color:black;opacity:.7;font-family: Tahoma, Arial, Helvetica, sans-serif;font-weight: normal;font-size: 23px;">Les Plats</span></a>
		<hr width="100%" color="#fff">
	</li>
	<li>   
	   <a href="#les_dessarts" class="active"><span style="color:black;opacity:.7;font-family: Tahoma, Arial, Helvetica, sans-serif;font-weight: normal;font-size: 23px;">Les Dessarts</span></a>
	   <hr width="100%" color="#fff">
	</li>   
	<li>
	    <a href="#les_cafes" class="active"><span style="color:black;opacity:.7;font-family: Tahoma, Arial, Helvetica, sans-serif;font-weight: normal;font-size: 23px;"> Les Cafes</span></a>
		<hr width="100%" color="#fff">
	</li>
</ul>
</div>
<div id="body_content">
<br />
<p class="text">Notre équipe en cuisine décline une cuisine traditionnelle française, inventive sans être compliquée. Nous travaillons particulièrement les poissons et crustacés, légumes variés pour vous servir des plats équilibrés et gouteux. Tous nos produits sont frais et de saison afin de redécouvrir une cuisine simple et fine où saveurs anciennes et originales se côtoient pour enchanter vos papilles.</p>
<br /><br />
<p style="text-align:center;"><a name="menu_aujourdhui" style="color:#891a2b;">Aujourd'hui, nous vous proposons</a></p>


<?php
$sql = "SELECT id,description FROM menu_aujourdhui ORDER BY id DESC";  //image de menu d'aujourdhui
$result = $bdd->query($sql);
if($result){

while($rows = $result->fetch(PDO::FETCH_ASSOC)){
?>
<p style="width:480px;height:500px;margin-left:100px;display: block;position:relative;">
<a href="menuAujourdhui.php?id=<?php echo $rows["id"]; ?>"><img   id ="<?php echo $rows["id"]; ?>" src="menuAujourdhui.php?id=<?php echo $rows["id"]; ?>" height="500" width="480" alt="image" /></a>
</p>
<?php
}

}
?>
<br />
<p style="text-align:center;color:#3e0d24;font-family: Tahoma, Arial, Helvetica, sans-serif;font-weight: normal;font-size: 26px;"><a name="les_entrees">Les entrees</a></p>
<table class="descrtiption_menu"  border="0" width="100%" cellpadding="3" cellspacing="0" align="center">
<?php 
$result=$bdd->query(" select nom,prix FROM `menu` where nom_menu='entrees' ");   //fiche des menus entrees

if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $nom=$rows['nom'];
   $prix=$rows['prix'];
	  echo "<tr><td> $nom</td>   <td style='width:100px;'>  $prix &euro;</td>";
 }  //endwhile;
 }else{
 echo "error";
 }
?>

</table>
<br />
<p style="text-align:center;color:#3e0d24;font-family: Tahoma, Arial, Helvetica, sans-serif;font-weight: normal;font-size: 26px;"><a name="les_plats">Les plats</a></p>
<table class="descrtiption_menu" border ="0" width="100% cellpadding="3" cellspacing="0" align="center">
<?php 
$result=$bdd->query(" select nom,prix FROM `menu` where nom_menu='plats' ");  //fiche des menus plats

if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $nom=$rows['nom'];
   $prix=$rows['prix'];
	  echo "<tr><td> $nom</td>   <td style='width:100px;'>  $prix &euro;</td>";
 }  //endwhile;
 }else{
 echo "error";
 }
?>

</table>
<br />
<p style="text-align:center;color:#3e0d24;font-family: Tahoma, Arial, Helvetica, sans-serif;font-weight: normal;font-size: 26px;"><a name="les_dessarts">Les dessarts</p>
<table class="descrtiption_menu" border ="0" width="100% cellpadding="3" cellspacing="0" align="center">
<?php 
$result=$bdd->query(" select nom,prix FROM `menu` where nom_menu='dessarts' "); //fiche des menus dessarts

if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $nom=$rows['nom'];
   $prix=$rows['prix'];
	  echo "<tr><td> $nom</td>   <td style='width:100px;'>  $prix &euro;</td>";
 }  //endwhile;
 }else{
 echo "error";
 }
?>

</table>
<br />
<p style="text-align:center;color:#3e0d24;font-family: Tahoma, Arial, Helvetica, sans-serif;font-weight: normal;font-size: 26px;"><a name="les_cafes">Les cafes</a></p>
<table class="descrtiption_menu" border ="0" width="100% cellpadding="3" cellspacing="0" align="center">
<?php 
//liste pour cafes
$result=$bdd->query(" select nom,prix FROM `menu` where nom_menu='cafes' ");

if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $nom=$rows['nom'];
   $prix=$rows['prix'];
	  echo "<tr><td> $nom</td>   <td style='width:100px;'>  $prix &euro;</td>";
 }  //endwhile;
 }else{
 echo "error";
 }
?>

</table>

</div>


</div>


 <?php
   include("include/footer.php");
 ?>
<!--footer-->
</div>
</body>
</html>