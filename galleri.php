
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
.zit
{
    position:relative;
    display:inline;
    width:120px;
    height:120px;
    left:0px;
    top:0px;
    border:3px solid black;
    /* Apply a CSS3 Transition to width, height, top and left properties */
    transition: width 0.3s ease,height 0.3s ease,left 0.3s ease,top 0.3s ease;
    -webkit-transition: width 0.3s ease,height 0.3s ease,left 0.3s ease,top 0.3s ease;
    -o-transition: width 0.3s ease,height 0.3s ease,left 0.3s ease,top 0.3s ease;
    -moz-transition: width 0.3s ease,height 0.3s ease,left 0.3s ease,top 0.3s ease;
}

.zit:hover
{
    width:350px;
    height:320px;
    left:-25px;
    top:-25px;
    z-index:9999;
   
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
<legend style="font-size:23px;color:#47172d;text-align:center;padding-top:20px;">Retrouvez ici les photos du Resto V.</legend><br /><br />

<p class="gall_text" style="font-size:20px;color:#3e0d24;text-align:center;text-decoration:underline;">image de plats...</p>
<div id="PZoomIt" style="height:220px;width:100%; border-width:1px;margin-bottom:1px;position:relative;">

<?php
$sql = "SELECT id,description FROM plats ORDER BY id DESC"; 
$result = $bdd->query($sql);
if($result){

while($rows = $result->fetch(PDO::FETCH_ASSOC)){
?>
<p style="width:120px;height:120px;margin-left:7px;display: block;float:left;position:relative;">
<a href="imagePlats.php?id=<?php echo $rows["id"]; ?>"><img  class="zit" id ="<?php echo $rows["id"]; ?>" src="imagePlats.php?id=<?php echo $rows["id"]; ?>" height="120" width="120" alt="image" /></a>
</p>
<?php
}

}
?>
</div>
<p class="gall_text" style="font-size:20px;color:#3e0d24;text-align:center;text-decoration:underline;">image de vins...</p>
<div id="VZoomIt" style="height:220px;width:100%; border-width:1px;margin-bottom:1px;">

<?php
$sql = "SELECT id,description FROM vins ORDER BY id DESC"; 
$result = $bdd->query($sql);
if($result){

while($rows = $result->fetch(PDO::FETCH_ASSOC)){
?>
<p style="width:120px;height:120px;margin-left:7px;display: block;float:left;position:relative;">
<a href="imageVins.php?id=<?php echo $rows["id"]; ?>"><img class="zit" id ="<?php echo $rows["id"]; ?>" src="imageVins.php?id=<?php echo $rows["id"]; ?>"  height="120" width="120" alt="image" /></a>
</p>
<?php
}

}
?>
</div>
<p class="gall_text" style="font-size:20px;color:#3e0d24;text-align:center;text-decoration:underline;">image de Dessarts...</p><br /><br />
<div id="DZoomIt" style="height:220px;width:100%; border-width:1px;margin-bottom:1px;">

<?php
$sql = "SELECT id,description FROM dessarts ORDER BY id DESC"; 
$result = $bdd->query($sql);
if($result){

while($rows = $result->fetch(PDO::FETCH_ASSOC)){
?>
<p style="width:120px;height:120px;margin-left:4px;display: block;float:left;position:relative;">
<a href="imageDessarts.php?id=<?php echo $rows["id"]; ?>"><img class="zit" id ="<?php echo $rows["id"]; ?>" src="imageDessarts.php?id=<?php echo $rows["id"]; ?>"  height="120" width="120" alt="image" /></a>
</p>
<?php
}

}
?>
</div>

</div>


 <?php
   include("include/footer.php");
 ?>
<!--footer-->
</div>
</body>
</html>