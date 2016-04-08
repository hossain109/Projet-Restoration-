<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Resto v</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
		<link rel="shortcut icon" type="image/png" href="../images/ico.png" />
<style>
<!--
  fieldset{
  height:250px;
  width:600px;
  background-color:gray;
  margin-left:150px;
  
  }
  -->
</style>

</head>
<body>

<div id="wrapper">

 <?php
   include("../include/header.php");
 ?>
<!--header-->
<body>
          <div id="login"> 
            <form method="post" action="#" >
                <fieldset>
                    <label for="username">
                        <span>Username</span>
                        <input type="text" id="username" name="username" placeholder="Admin" value=""></input>
                    </label><br /><br />
                    <label for="password">
                        <span>Password</span>
                        <input type="password" id="password" name="password" placeholder="Password" value=""></input>
                    </label><br /><br />
                    
                <input type="submit" name="submit" value="Connexion" /><br /><br />
                <a href="#" id="forgot-password-link">Forgot your password? Click here.</a>
				</fieldset>
            </form>
			</div>
<?php
if(isset($_POST['submit']) && $_POST['submit'] == 'Connexion')
{
    if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']))
    {
	  	$username=trim($_POST['username']);
        $password=trim($_POST['password']);
		//$password=md5($password);
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=restov', 'root', '');

        }
        catch(Exception $e)
        {
            die('Erreur log : ' . $e->getMessage());
        }
         
        $req = $bdd->query(' SELECT * FROM login' );
         
        //$_POST['password'] = sha1($_POST['password']);
		
         
        $found;
         
        while($donnees = $req->fetch())
        {
           
		   if($donnees['nom'] == $username && $donnees['password'] == $password)
            {
               
			   $found = true;
                break;
            }
            else
            {
                $found = false;
            }
        }
		
        if($found == true)
        {
		   $_SESSION['username']=$username;
		   $_SESSION["password"]=$password;
           header('Location:http://localhost/stage/admin/accueil.php');
            //echo 'Hello '.$_POST['username'];
        }
        else
        {
            //header('Location: connexion.php?error=notfoundlog');document.getElementById("login-dialog").innerHTML= "Error";
			echo "User name or password error";
        }
        $req->closeCursor();
    }
}
?>

 <?php
   include("../include/footer.php");
 ?>
<!--footer-->
</div>
</body>
</html>
