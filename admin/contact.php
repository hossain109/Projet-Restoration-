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
 <li><a href="accueil.php" ><span class="t">Accuil</span></a></li>
 <!--<li><a href="restov.php" class="active"><span class="t">Resto à Vin</span></a> <span class="darrow">&#9660;</span>-->
			<!--<ul class="sec1">
				<li><a href="#">Item1</a></li>
				<li><a href="#">Itexxm2</a></li>
				<li><a href="#">Item3</a></li>
				<li><a href="#">Item3</a></li>
				<li><a href="#">Item4</a></li>
			</ul> </li>-->
		
 

 <li><a href="reserve.php" ><span class="t" ><font color="blue">Reserve</font></span></a></li>
 <li><a href="menu.php" ><span class="t">Menus</span></a></li>
 <li><a href="cartev.php" ><span class="t">Carte de vin</span></a></li>
 <li><a href="galleri.php" ><span class="t">Galerie</span></a></li>
 <li><a href="contact.php" ><span class="t">contact</span></a></li>
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
<!--nav-->
 <br /><br />
<div id="contenu">
 <legend style="text-align:center;">Affiche de Contact</legend>
 <div style="width:100%;border:4 px solid black;display:block;margin-top:30px;">
  <?php 
$result=$bdd->query("SELECT date,nom,telephone,email,message FROM `contact`");

echo "<table border='2' align='center'>";
echo "<th>Time</th><th>Nom</th><th>Telephone</th><th>Email</th><th>Message</th>";
if($result){
WHILE($rows = $result->fetch(PDO::FETCH_ASSOC)){
   $date=$rows['date'];
   $nom=$rows['nom'];
   $telephone=$rows['telephone'];
   $email=$rows['email'];
   $message=$rows['message'];
	  echo "<tr><td>$date</td><td>$nom</td><td>$telephone</td><td><a href='mailto:$email?Subject=Bienvenue%20à restoV' target='_top'>$email</a></td><td>$message</td></tr> ";
 }  //endwhile;
  echo "</table>";
 }else{
 echo "error";
 }
// ?>
 <p></p>
 </div>
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