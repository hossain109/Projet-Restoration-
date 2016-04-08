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
    <form action="change_password.php" method="post">

        <p>

        <label for="admin">Nom de Admin</label> :   <input type="text" name="admin" id="admin" /><br />

        <label for="password">Mot de pass</label> :<input type="password" name="password" id="password" /><br />

        <input type="submit" value="Envoyer" name="submit" id="submit" />

    </p>

    </form>
<?php 
     if(isset($_POST['submit'])){
	 if(!empty($_POST['admin']) && !empty($_POST['password'])){
	   $admin=$_POST['admin'];
	   $password=$_POST['password'];
	     $current_id=$bdd->query("update login set nom='$admin', password='$password' where id=111 ")or die("<b>Error:</b> Problem on Image Insert<br/>" . mysql_error());
         if($current_id==true)
         echo "vous avez reussit... ";
	   }
	   else echo "Nom de Admin ou Mot de Pass ne peut pas vide...";
	 }

?>
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