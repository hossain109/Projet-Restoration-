
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
<style>.required:focus{background-color:#e5eecc;}</style>
<script language="JavaScript">

function testchams(chams){
if(chams.contact_name.value==""){
alert("Nom n'est pas nul, donner votre Nom");
}
else if(chams.contact_email.value.indexOf(".com",0)<0 && chams.contact_email.value.indexOf(".fr",0)<0){
alert(" Donner votre valid E-mail");
}
else if(chams.contact_message.value==""){
alert("Message n'est pas nul, donner votre Message");
}
else alert("Formulaire ok..");
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
<br />
<legend style="font-size:23px;color:#47172d;text-align:center;padding-top:20px;">Formulire de contact</legend><br />
<div id="contact">
											<form method="post"  id="form1" name="form1" action="contact.php">
												   <p class="input_box">
                                                    
                                                        <label for="contact_name">Nom:</label> <span class="required-star" style="color: #891a2b;">*</span><br />
                                                        <input name="contact_name" id="contact_name" class="required"  type="text" value="" />                                                                        
                                                    </p><!-- input-box -->
                                                    
                                                    <p class="input_box">                                                   
                                                        <label for="contact_phone" style="margin-left:130px;">Téléphone:</label><br />
                                                        <input name="contact_phone" id="contact_phone" class="required"  type="text" style="margin-left:130px;"  />                                                 
                                                    </p><!-- input-box -->
                                                    
                                                    <div class="input_box">
                                                    
                                                        <label for="contact_email" style="margin-left:130px;">Email:</label> <span class="required-star" style="color: #891a2b;">*</span><br />
                                                        <input name="contact_email" id="contact_email"  class="required" style="margin-left:130px;" type="text" value="" />
													</div>
                                             <div class="message">                                                   
                                                   <label for="contact_message">Message:</label> <span class="required-star" style="color: #891a2b;">*</span><br />
                                                   <textarea name="contact_message" id="contact_message" class="required" cols="109" rows="5" ></textarea>
                                                                                                                
                                                    </div><!-- input-box-wide -->
											<div class="submit">
											<input type="submit" name="submit" id="submit" value="Envoi l'email" onClick="testchams(this.form)" />
											</div>
											</form>

<?php
if(isset($_REQUEST['submit'])&& !empty($_REQUEST['contact_name'])&& !empty($_REQUEST['contact_email'])&& !empty($_REQUEST['contact_message'])){
  $date=date("Y/m/d");
//$time=date("h:i:sa");
   $contact_name=$_REQUEST['contact_name'];
   $contact_phone=$_REQUEST['contact_phone'];
   $contact_email=$_REQUEST['contact_email'];
   $contact_message=$_REQUEST['contact_message'];
   //echo $contact_name." ".$contact_message." ".$contact_email." ".$contact_message;
   $current_id=$bdd->query("insert into `contact` values('','$date','$contact_name','$contact_phone','$contact_email','$contact_message') ")or die("<b>Error:</b> Probleme de envoi de donnes!!<br/>" . mysql_error());
    if($current_id)
	echo "<p style='text-align:center;color:red;'>envoyé avec succès, nous vous contacterons dès que possible</p>";
   }
?>
</div>

<legend style="font-size:23px;color:#47172d;text-align:center;padding-top:20px;">Nos coordonnés</legend>
<div id="cordonee">

                   <div class="details">
				   <span style="color: #891a2b;font-size:17px;">Le Resto V </span><br />                                  
                    <span style="color: #891a2b;font-size:17px;">5 avenue Conté</span> <br />                                  
                    <span style="color: #891a2b;font-size:17px;">92250 La Garenne Colombes</span>
					</div>
					<div class="details">
					<span style="margin-left:250px;color: #891a2b;font-size:17px;">Directeur : Grima Franck</span><br />
					<span style="margin-left:278px;color: #891a2b;font-size:17px;">Tél : 01 47 60 11 32</span><br />
					<span style="margin-left:180px;color: #891a2b;font-size:17px;">Email : grima_franck@hotmail.com</span>
					</div>



</div>

<hr width="100%" height="10" color="#939185">
<div id="map_horaire">
    <div class="map-time">
	  <p style="margin-left:50px;color:#891a2b;font-size: 20px;">Plan d’accès</p>
      <iframe width="300" height="270" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.fr/maps?f=q&amp;source=s_q&amp;hl=fr&amp;geocode=&amp;q=5+Avenue+Conte,+La+Garenne-Colombes&amp;aq=0&amp;oq=5+avenue+cont%C3%A9&amp;sll=48.890456,2.337435&amp;sspn=0.132506,0.326843&amp;gl=fr&amp;ie=UTF8&amp;hq=&amp;hnear=5+Avenue+Conte,+92250+La+Garenne-Colombes&amp;t=m&amp;z=14&amp;ll=48.909012,2.240011&amp;output=embed"></iframe><br /><small><a href="https://maps.google.fr/maps?f=q&amp;source=embed&amp;hl=fr&amp;geocode=&amp;q=5+Avenue+Conte,+La+Garenne-Colombes&amp;aq=0&amp;oq=5+avenue+cont%C3%A9&amp;sll=48.890456,2.337435&amp;sspn=0.132506,0.326843&amp;gl=fr&amp;ie=UTF8&amp;hq=&amp;hnear=5+Avenue+Conte,+92250+La+Garenne-Colombes&amp;t=m&amp;z=14&amp;ll=48.909012,2.240011" style="color:#0000FF;text-align:left">Agrandir le plan</a></small>
    </div>
     <div class="map-time">
	                   <p style=" text-align:center;color:#891a2b;font-size: 20px;" >Horaires d&#8217;ouverture</p>			
                      <table border="2" color="black" height="270" cellpadding="5" style="margin-left:100px;">
					<tr><td><strong class="left">Lundi</strong> </td><td style="width:300px;"><span class="right"><span style="color: #891a2b;">Fermé</span></span></td></tr>
        			<tr><td><strong class="left">Mardi</strong></td> <td><span class="right">12:00 - 15:00 — 19:00 - 23:00</span></td></tr>
        			<tr><td><strong class="left">Mercredi</strong> </td><td><span class="right">12:00 - 15:00 — 19:00 - 23:00</span></td></tr>
        			<tr><td><strong class="left">Jeudi</strong></td><td> <span class="right">12:00 - 15:00 — 19:00 - 23:00</span></td></tr>
        			<tr><td><strong class="left">Vendredi</strong></td> <td><span class="right">12:00 - 15:00 — 19:00 - 23:00</span></td></tr>
        			<tr><td><strong class="left">Samedi</strong></td><td> <span class="right">19:00 - 23:00</span></td></tr>
        			<tr><td><strong class="left">Dimanche</strong> </td><td><span class="right"><span style="color: #891a2b;">Fermé</span></span></td></tr>
					</table>
    </div>

</div>
</div>




 <?php
   include("include/footer.php");
 ?>
<!--footer-->
</div>
</body>
</html>