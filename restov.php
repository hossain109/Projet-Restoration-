
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
margin: 0.8em; 
font-family: Tahoma, Arial, Helvetica, sans-serif; 
font-style: normal; 
font-weight: normal; 
font-size: 13px; 
text-align: justify; 
line-height: 18px;

}
</style>
<style>.required:focus{background-color:#e5eecc;}</style>
<script language="JavaScript">

function testchams(chams){
if(chams.contact_name.value==""){
alert("Nom n'est pas nul, donner votre Nom);
}
else if(chams.contact_email.value.indexOf(".com",0)<0 && chams.contact_email.value.indexOf(".fr",0)<0){
alert("E-mail n'est pas nul, donner votre E-mail");
}
else if(chams.contact_message.value==""){
alert("Message n'est pas nul, donner votre Message");
}
else alert("Formulaire ok..");
}

</script>
<script language="JavaScript">
function resetChams(){
document.getElementById("form1").reset();
}
</script>

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

<div id="resto_image">
<a href="images/image1.jpg">
<img src="images/image1.jpg" alt="text" height="350" width="100%" class="preview" />
</a>
</div>
<div id="resto_text">
<legend style="font-size:23px;color:#47172d;margin-top:20px;">Le Lieu</legend>
<p class="text">Situé dans une rue pavillonnaire, proche de la gare de la Garenne-Colombes,
 au calme, vous apprécierez de déjeuner en terrasse ou dans le petit patio ensoleillé.</p>
<legend style="font-size:23px;color:#47172d;margin-top:20px;">Culinaire</legend>
<p class="text">
<p class="text">Le Resto à vin, La carte des  vins change avec la carte des mets tous les mois en 
fonction de la saison et de l’accord mets/vin.

Un grand choix de vins (120 références) à la bouteille ou au verre ainsi qu’une sélection du mois
 vous est proposé afin de se marier avec la carte de notre chef qui décline une cuisine traditionnelle
 française, inventive sans être compliquée. Il affectionne particulièrement poissons et crustacés,
 légumes variés pour vous servir des plats équilibrés et gouteux. Tous nos produits sont frais et
 de saison afin de redécouvrir une cuisine simple et fine, saveurs anciennes et originales se
 côtoient pour enchanter vos papilles.</p>
<legend style="font-size:23px;color:#47172d;margin-top:20px;">Le Chef</legend>
<p class="text">Franck Grima a officié plus de 25 ans dans le domaine de la restauration, avant de prendre son envol en devenant le propriétaire du resto V. Il a une vraie passion pour la cuisine et pour les vins qui sont selon lui "indissociables".</p>

</div>
</div>




 <?php
   include("include/footer.php");
 ?>
<!--footer-->
</div>
</body>
</html>