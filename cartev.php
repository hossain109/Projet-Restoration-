
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
<br />
<p class="text">Chez nous  le vin ici est aussi important que la cuisine. La carte des vins change avec la carte des mets régulièrement en 
fonction de la saison et de l’accord mets/vin. Un grand choix (50 références) vous est proposé à la bouteille ou au verre ainsi 
qu’une sélection du mois. Par exemple…</p><b />

<div class="carte_vin" style="width:100%;border-style:solid; border-width:0px;min-height:350px;">

<br />
<p style="text-align:center;color:#3e0d24;font-family: Tahoma, Arial, Helvetica, sans-serif;font-weight: normal;font-size: 26px; text-decoration: underline;">Vin Rouge</p>
<div class="carte_image" style="float:left;width:20%;">
<?php
$sql = "SELECT id FROM imagecartev where nom_vin='vin_rouge' ";  //image for vin rouge
$result = $bdd->query($sql);
if($result){

while($rows = $result->fetch(PDO::FETCH_ASSOC)){
?>
<p style="width:150px;height:180px;margin-left:0px;display:block;margin-top:0;border:2px solid red;">
<a href="imageCartev.php?id=<?php echo $rows["id"]; ?>"><img id ="<?php echo $rows["id"]; ?>" src="imageCartev.php?id=<?php echo $rows["id"]; ?>" height="180" width="150" alt="image" /></a>
</p>
<?php
}

}
?>
</div>

<table class="descrtiption_menu" id="" border ="0" width="" cellpadding="3" cellspacing="0" align="center">
<?php 
$result=$bdd->query(" select id,description,region,anee,prix FROM `cartev` where nom_vin='vin_rouge' "); //informaiton for vin rouge

if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $description=$rows['description'];
   $region=$rows['region'];
   $anee=$rows['anee'];
   $prix=$rows['prix'];
	  echo "<tr><td> $description,$region, $anee,&nbsp;</td>  <td>  $prix &euro;</td></tr>";
 }  //endwhile;
 }else{
 echo "error";
 }
?>

</table>

</div>


<div class="carte_vin" style="width:100%;border-style:solid; border-width:0px;min-height:350px;">

<br />
<p style="text-align:center;color:#3e0d24;font-family: Tahoma, Arial, Helvetica, sans-serif;font-weight: normal;font-size: 26px; text-decoration: underline;">Vin Blanc</p>
<div class="carte_image" style="float:left;width:20%;">
<?php
$sql = "SELECT id FROM imagecartev where nom_vin='vin_blanc' ";  //image for vin blanc
$result = $bdd->query($sql);
if($result){

while($rows = $result->fetch(PDO::FETCH_ASSOC)){
?>
<p style="width:150px;height:180px;margin-left:0;display:block;margin-top:0;border:2px solid red;">
<a href="imageCartev.php?id=<?php echo $rows["id"]; ?>"><img   id ="<?php echo $rows["id"]; ?>" src="imageCartev.php?id=<?php echo $rows["id"]; ?>" height="180" width="150" alt="image" /></a>
</p>
<?php
}

}
?>
</div>

<table class="descrtiption_menu" id="" border ="0" width="" cellpadding="3" cellspacing="0" align="center">
<?php 
$result=$bdd->query(" select id,description,region,anee,prix FROM `cartev` where nom_vin='vin_blanc' ");  //information for vin blanc

if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $description=$rows['description'];
   $region=$rows['region'];
   $anee=$rows['anee'];
   $prix=$rows['prix'];
	  echo "<tr><td> $description,$region, $anee,&nbsp;</td>  <td>  $prix &euro;</td></tr>";
 }  //endwhile;
 }else{
 echo "error";
 }
?>

</table>
</div>

<div class="carte_vin" style="width:100%;border-style:solid; border-width:0px;min-height:350px;">

<br />
<p style="text-align:center;color:#3e0d24;font-family: Tahoma, Arial, Helvetica, sans-serif;font-weight: normal;font-size: 26px; text-decoration: underline;">Vin Rosé</p>
<div class="carte_image" style="float:left;width:20%;">
<?php
$sql = "SELECT id FROM imagecartev where nom_vin='vin_rose' ";   //image for vin rose
$result = $bdd->query($sql);
if($result){

while($rows = $result->fetch(PDO::FETCH_ASSOC)){
?>
<p style="width:150px;height:180px;margin-left:0px;display:block;margin-top:0;border:2px solid red;">
<a href="imageCartev.php?id=<?php echo $rows["id"]; ?>"><img   id ="<?php echo $rows["id"]; ?>" src="imageCartev.php?id=<?php echo $rows["id"]; ?>" height="180" width="150" alt="image" /></a>
</p>
<?php
}

}
?>
</div>
<table class="descrtiption_menu" id="" border ="0" width="" cellpadding="3" cellspacing="0" align="center">
<?php 
$result=$bdd->query(" select id,description,region,anee,prix FROM `cartev` where nom_vin='vin_rose' ");  //infromation for vin rose

if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $description=$rows['description'];
   $region=$rows['region'];
   $anee=$rows['anee'];
   $prix=$rows['prix'];
	  echo "<tr><td> $description,$region, $anee,&nbsp;</td>  <td>  $prix &euro;</td></tr>";
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