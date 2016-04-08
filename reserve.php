
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


<script language="JavaScript">
// date format
function testchams(chams){
re = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
if(chams.contact_date.value!=""){
      if(regs = chams.contact_date.value.match(re)) {
        // day value between 1 and 31
        if(regs[1] < 1 || regs[1] > 31) {
          alert("Invalid value for day: " + regs[1]);
          chams.contact_date.focus();
          return false;
        }
        // month value between 1 and 12
        if(regs[2] < 1 || regs[2] > 12) {
          alert("Invalid value for month: " + regs[2]);
          chams.contact_date.focus();
          return false;
        }
        // year value between 2015 and 2014
        if(regs[3]<new Date().getFullYear() || regs[3] > 2016) {
          alert("Invalid value for year: " + regs[3] + " - must be between 2016 and " + (new Date()).getFullYear());
          chams.contact_date.focus();
          return false;
        }
      } else {
        alert("Invalid date format: " + chams.contact_date.value);
        chams.contact_date.focus();
        return false;
      }
    }

else alert("Date ne pas vide..");


// time format
  re = /^(\d{1,2}):(\d{2})([ap]m)?$/;
	 if(chams.contact_time.value != '') {
      if(regs = chams.contact_time.value.match(re)) {
        if(regs[3]) {
          // 12-hour value between 1 and 12
          if(regs[1] < 1 || regs[1] > 12) {
            alert("Invalid value for hours: " + regs[1]);
            chams.contact_time.focus();
            return false;
          }
        } else {
          // 24-hour value between 0 and 23
          if(regs[1] > 23) {
            alert("Invalid value for hours: " + regs[1]);
            chams.contact_time.focus();
            return false;
          }
        }
        // minute value between 0 and 59
        if(regs[2] > 59) {
          alert("Invalid value for minutes: " + regs[2]);
          chams.contact_time.focus();
          return false;
        }
      } else {
        alert("Invalid time format: " + chams.contact_time.value);
        chams.contact_time.focus();
        return false;
      }
    }
	else alert("temps ne pas vide");
	
 if(chams.contact_personne.value==""){
alert("Personne n'est pas nul, donner votre Numero personne.");
}
else if(chams.contact_name.value==""){
alert("Nom n'est pas nul, donner votre Nom");
}
else if(chams.contact_email.value.indexOf(".com",0)<0 && chams.contact_email.value.indexOf(".fr",0)<0){
alert(" Donner votre valid E-mail");
}

else if(chams.contact_message.value==""){
alert("Message n'est pas nul, donner votre Message");
}
else alert("formulaire ok");
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
	<script type="text/javascript">

	function initialize() {

		CoolClock.findAndCreateClocks();

		var cal = new YAHOO.widget.Calendar("calContainer");

		cal.render();

	}

</script>

<style>.required:focus{background-color:#e5eecc;}</style>


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

<legend style="font-size:23px;color:#47172d;text-align:center;padding-top:20px;">Réservation</legend>
<p class="text">C’est ici que vous pouvez réserver votre table dans notre restaurant. Vous pouvez nous appeler au +33 (0) 1 47 60 11 32, utiliser l’adresse grima_franck@hotmail.com ou le formulaire ci-dessous.</p>
<br />
<p class="text">Veuillez noter que le restaurant est fermé les dimanche et lundi, nous ne pourrons pas prendre de réservation pour ces jours.</p>


<div id="contact">
							<form method="post"  id="form2" name="form2" action="reserve.php">
								<legend style="font-size:23px;color:#47172d;text-align:center;padding-top:20px;padding-bottom:20px;">Informations de réservationle</legend>
								
						                              <p class="input_box">
                                                    
                                                        <label for="contact_date">Date:</label> <span class="required-star" style="color: #891a2b;">*(dd/mm/yyyy)</span><br />
                                                        <input name="contact_date" id="contact_date" class="required"  type="text" value="" onclick="fnPopUpCalendar(contact_date,contact_date,'dd/mm/yyyy')"  onfocus="this.value=''"/>                                                                        
                                                    </p><!-- input-box -->
                                                    
                                                    <p class="input_box">                                                   
                                                        <label for="contact_time" style="margin-left:130px;">Heure:</label><span class="required-star" style="color: #891a2b;">*(eg. 19:50 or 7:50pm)</span><br />
                                                        <input name="contact_time" id="contact_time" class="required"  type="text" style="margin-left:130px;"  />                                                 
                                                    </p><!-- input-box -->
                                                    
                                                    <div class="input_box">
                                                    
                                                        <label for="contact_personne" style="margin-left:130px;">Nombre de personnes:</label> <span class="required-star" style="color: #891a2b;">*</span><br />
                                                        <input name="contact_personne" id="contact_contact_personne"  class="required" style="margin-left:130px;" type="text" value="" />
													</div>
								
								 <hr width="100%" color="red">
							<legend style="font-size:23px;color:#47172d;text-align:center;padding-top:20px;padding-bottom:20px;">Info Personnele</legend>
                                 <hr width="100%" color="red">
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
                                                   <textarea name="contact_message" id="contact_message" class="required" cols="109" rows="5"></textarea>
                                                                                                                
                                                    </div><!-- input-box-wide -->
											<div class="submit">
											<input type="submit" name="submit" id="submit" value="Lancer la resarvaion" onClick="testchams(this.form)" />
											</div>
											</form>
											
<?php
if(isset($_REQUEST['submit']) && !empty($_REQUEST['contact_date']) && !empty($_REQUEST['contact_time']) && !empty($_REQUEST['contact_personne']) && !empty($_REQUEST['contact_name']) && !empty($_REQUEST['contact_email']) && !empty($_REQUEST['contact_message'])){
   $date=date("Y/m/d");
   $contact_date=$_REQUEST['contact_date'];
   $contact_date=date('Y-m-d',strtotime($contact_date)); // make phpmyadmin date format
   $contact_time=$_REQUEST['contact_time'];
   $contact_personne=$_REQUEST['contact_personne'];
   $contact_name=$_REQUEST['contact_name'];
   $contact_phone=$_REQUEST['contact_phone'];
   $contact_email=$_REQUEST['contact_email'];
   $contact_message=$_REQUEST['contact_message'];
   //echo $contact_date." ".$contact_time." ".$contact_personne." ".$contact_message;
   try{
   $current_id = $bdd->query("insert into `reserve` values('','$date','$contact_date','$contact_time','$contact_personne','$contact_name','$contact_phone','$contact_email','$contact_message') ");
    }catch(Exception $e){
	print(e."<b>Error:</b> Probleme de envoi de donnes!!");
	}
	if($current_id)
	echo "<p style='text-align:center;color:red;'>envoyé avec succès, nous vous contacterons dès que possible</p>";
   
   }
?>
</div>

<legend style="font-size:23px;color:#47172d;text-align:center;padding-top:20px;">Nos Coordonnées</legend>
<div id="cordonee">

                   <div class="details">
				   <span style="color: #891a2b;font-size:17px;">Le Resto V </span><br />                                  
                    <span style="color: #891a2b;font-size:17px;">5 avenue Conté</span> <br />                                  
                    <span style="color: #891a2b;font-size:17px;">92250 La Garenne Colombes</span>
					</div>
					<div class="details">
					<span style="margin-left:250px;color: #891a2b;font-size:17px;">Directeur : Grima Fracnk</span><br />
					<span style="margin-left:250px;color: #891a2b;font-size:17px;">Tél : 01 47 60 11 32</span><br />
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