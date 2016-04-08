
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

	<script>
$("#slideshow > div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
},  3000);
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

	function initialize() {

		CoolClock.findAndCreateClocks();

		var cal = new YAHOO.widget.Calendar("calContainer");

		cal.render();

	}

</script>
<style>
#slideshow { 
    position: relative; 
    width: 100%; 
    height: 500px; 
    padding: 1px; 
    box-shadow: 0 0 20px rgba(0,0,0,0.6); 
}
#slideshow > div { 
    position: absolute; 
    top: 1px; 
    left: 1px; 
    right: 1px; 
    bottom: 1px;
	
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

<!-- nav-->
 <?php
   include("connexion.php");
 ?>



<div id="contenu">

<div id="slideshow"> <!-- image de accuil-->

<?php
$sql = "SELECT id FROM accuil ORDER BY id DESC"; 
$result = $bdd->query($sql);
if($result){

while($rows = $result->fetch(PDO::FETCH_ASSOC)){

?>
<div>
<img id ="<?php echo $rows['id']; ?>" src="imageView.php?id=<?php echo $rows['id']; ?>"  height="500" width="100%" alt="image" /><br/>
</div>

<?php
}

}
?>
</div>
<div id="content_text"> <!--content text-->
<div class="accuil">
   <div class="titre"><a href="restov.php"><font text align="center">Bienvenue sur Resto V</font></a></div>
   <div class="text_accuil"> C’est à la fois un restaurant. 
Un lieu chaleureux où il fait bon se retrouver entre amis, faire un déjeuner de travail tranquille, organiser un repas ou 
un cocktail en assemblée. Le Restov situé dans une rue pavillonnaire, proche de la gare de la Garenne-Colombes.</div>
   <p class="button"><a href="restov.php">Les informations pratiques</a></p>
</div>
<div class="accuil">
   <div class="titre"><a href="reserve.php"><font text align="center">Réserver une table</font></a></div>
   <div class="text_accuil">Réservez en ligne ou par téléphone soit votre table, soit votre inscription à 
   nos dégustations. Pour toute demande de groupe, laissez-nous un message en remplissant le formulaire de contact,
   nous vous recontacterons dans les 24h. </div>
   <p class="button"><a href="reserve.php">Réserver une table</a></p>
</div>
<div class="accuil">
   <div class="titre"><a href="menu.php"><font text align="center">Menu d'aujourd'hui</font></a></div>
   <div class="text_accuil">il est de notre passion pour inventer différents types d'essais c'est pourquoi tous les nous
   changeons notre menu.</div>
   <p class="button"><a href="menu.php">Menu d'aujourd'hui</a></p>
</div>
</div>

<br /><br />
<div id="map_horaire">
    <div class="map-time">
	  <p style="margin-left:50px;color:#891a2b;font-size: 20px;">Plan d’accès</p>
      <iframe width="300" height="270" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.fr/maps?f=q&amp;source=s_q&amp;hl=fr&amp;geocode=&amp;q=5+Avenue+Conte,+La+Garenne-Colombes&amp;aq=0&amp;oq=5+avenue+cont%C3%A9&amp;sll=48.890456,2.337435&amp;sspn=0.132506,0.326843&amp;gl=fr&amp;ie=UTF8&amp;hq=&amp;hnear=5+Avenue+Conte,+92250+La+Garenne-Colombes&amp;t=m&amp;z=14&amp;ll=48.909012,2.240011&amp;output=embed"></iframe><br /><small><a href="https://maps.google.fr/maps?f=q&amp;source=embed&amp;hl=fr&amp;geocode=&amp;q=5+Avenue+Conte,+La+Garenne-Colombes&amp;aq=0&amp;oq=5+avenue+cont%C3%A9&amp;sll=48.890456,2.337435&amp;sspn=0.132506,0.326843&amp;gl=fr&amp;ie=UTF8&amp;hq=&amp;hnear=5+Avenue+Conte,+92250+La+Garenne-Colombes&amp;t=m&amp;z=14&amp;ll=48.909012,2.240011" style="color:#0000FF;text-align:left">Agrandir le plan</a></small>
    </div>
     <div class="map-time">
	                   <p style=" text-align:center;color:#891a2b;font-size: 20px;" >Horaires d&#8217;ouverture</p>			
                      <table border="1" color="#939185" height="270" cellpadding="5" style="margin-left:100px;">
					<tr><td><strong class="left">Lundi</strong> </td><td style="width:300px;"><span class="right"><span style="color: #891a2b;">Fermé</span></span></td></tr>
					<tr ><td ><strong class="left">Mardi</strong></td> <td><span class="right">12:00 - 15:00 — 19:00 - 23:00</span></td></tr>
        			<tr><td><strong class="left">Mercredi</strong> </td><td><span class="right">12:00 - 15:00 — 19:00 - 23:00</span></td></tr>
        			<tr><td><strong class="left">Jeudi</strong></td><td> <span class="right">12:00 - 15:00 — 19:00 - 23:00</span></td></tr>
        			<tr><td><strong class="left">Vendredi</strong></td> <td><span class="right">12:00 - 15:00 — 19:00 - 23:00</span></td></tr>
        			<tr><td><strong class="left">Samedi</strong></td><td> <span class="right">19:00 - 23:00</span></td></tr>
        			<tr><td><strong class="left">Dimanche</strong> </td><td><span class="right"><span style="color: #891a2b;">Fermé</span></span></td></tr>
					</table>
    </div>

</div>

</div>  <!-- contenu-->

 <?php
   include("include/footer.php");
 ?>
<!--footer-->
</div>
</body>
</html>