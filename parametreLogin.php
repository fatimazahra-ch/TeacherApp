<?php 
session_start();
if(isset($_POST['submit']))
{
    unset($_SESSION['login']);
    header('Location : authentification/login.php');
    exit();
}

if (isset($_SESSION['login'])) 
{
	require 'inc/header.php';
    $requette = $conn->query("SELECT photoProfil from personne WHERE Password_personne ='".$_SESSION['Password']."'");
    $res = $requette->fetch();
    $Image = $res['photoProfil'];
    $src='assets/img/'.$Image;
	
?>	
	<div id="Info">
		<div id="Info1">
			<h3>Informations Générales</h3>	
			<p>
				Nom           : <?php echo $_SESSION['nom']; ?><br />
				Prenom        : <?php echo $_SESSION['prenom']; ?><br />
				Adresse-Email : <?php echo $_SESSION['mail']; ?><br />
				Département   : Mathématique et Informatique<br />
				Role : <?php echo $_SESSION['role']; ?><br />
			</p>
		</div>
		<div id="Info2">
			<h3>Informations sécurisés</h3>
			<p>
				Login    : <?php echo $_SESSION['login']; ?><br />
				Password : <?php echo $_SESSION['Password']; ?><br />
			</p>
		</div>
	</div>
	<div id="InfoLogin">
		<h3 id="hprof">Photo de Profile :</h3>
		<img src="<?php echo $src;?>" width="250">
	</div>
<?php
	require 'inc/footer.php';

}
else{
	header('Location : authentification/login.php');
    exit();
}
?>
