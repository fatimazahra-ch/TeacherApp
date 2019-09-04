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
	$msg = "";
	$msg1 = "";
	$msg2 = "";
	$aide = 0;
	$aide2 = 0;
	if(isset($_POST['save-user']))
	{
		$profilImageName = time() . '_' .$_FILES['profileImage']['name'];
		$target = 'assets/img/'.$profilImageName;
		move_uploaded_file($_FILES['profileImage']['tmp_name'],$target);
		$sql = ("UPDATE personne SET photoProfil ='".$profilImageName."' WHERE Id_personne='".$_SESSION['id']."'");
		if($conn->query($sql))
		{
				$msg = '<p id="uplo">Image est bien téléchargée et enregistrer dans la base de données , il faut reconnécter pour voir tout changement</p>';	
		}
		else{
				$msg ='<p id="notup">Erreur de Base de Données::Impossible de téléchargée la photo</p>';
		}
	}
	if(isset($_POST['Envoyer1']))
	{
		if (isset($_POST['nom']) && !empty($_POST['nom'])) 
		{
			$sql = ("UPDATE personne SET Nom ='".$_POST['nom']."' WHERE Id_personne='".$_SESSION['id']."'");
			$resu = $conn->query($sql);
			$aide = 1;
		}
		if (isset($_POST['prenom']) && !empty($_POST['prenom'])) 
		{
			$sql = ("UPDATE personne SET Prenom ='".$_POST['prenom']."' WHERE Id_personne='".$_SESSION['id']."'");
			$resu = $conn->query($sql);
			$aide = 1;
		}
		if (isset($_POST['adr']) && !empty($_POST['adr'])) 
		{
			$sql = ("UPDATE personne SET Adr_mail ='".$_POST['adr']."' WHERE Id_personne='".$_SESSION['id']."'");
			$resu = $conn->query($sql);
			$aide = 1;
		}
		if (isset($_POST['rol']) && !empty($_POST['rol'])) 
		{
			$sql = ("UPDATE personne SET Role ='".$_POST['rol']."' WHERE Id_personne='".$_SESSION['id']."'");
			$resu = $conn->query($sql);
			$aide = 1;
		}
		if($aide == 1)
		{
			$msg1 = '<p id="uplo">Les Informations Sont bien enregistrer ,il faut reconnecter pour tout voir changement</p>';
		}

	}

	if(isset($_POST['Envoyer2']))
	{
		if (isset($_POST['loginn']) && !empty($_POST['loginn'])) 
		{
			$sql = ("UPDATE personne SET login_personne ='".$_POST['loginn']."' WHERE Id_personne='".$_SESSION['id']."'");
			$resu = $conn->query($sql);
			$aide2 = 1;
		}
		if (isset($_POST['pass']) && !empty($_POST['pass'])) 
		{
			$sql = ("UPDATE personne SET Nom ='".$_POST['pass']."' WHERE Id_personne='".$_SESSION['id']."'");
			$resu = $conn->query($sql);
			$aide2 = 1;
		}
		if($aide2 == 1)
		{
			$msg2 = '<p id="uplo">Les informations sont bien enregistrer, il faut reconnecter pour tout changement</p>';
		}
	}
?>
  <h4 id="ph">Modifier Photo de Profil :</h4>
  <div id="photo">	
 	<form action="modifierParametre.php" method="post" enctype="multipart/form-data">
 		<?php 
 		if(!empty($msg))
 		{
 			echo $msg;
 		}?>
		<div class="form-group">
			<img src="assets/img/place.jpg" onclick="triggerClick()"  id="profileDisplay">
			<label for="profileImage" >Profile Image</label>	
		 	<input type="file" name="profileImage" onchange="displayImage(this)" id="profileImage" style="display: none;">
		</div>
		<div class="form-group">
		<br/><label for="bio">Bio</label>
		 	<textarea name="bio" id="bio" class="form-control">
		 				
		 	</textarea>
		</div>
		<div class="form-group">
			<button type="submit" name="save-user">
			 	Changer ! 	
			</button>		
		</div>	
	</form>			
  </div>
  <div id="mod">
  	<div id="mod1">
	  	<h3>Informations Générales :</h3>
	  	<form method="POST" action="modifierParametre.php">
	  		<?php 	
				echo $msg1; 
			?>
	  		<label for="Nom"></label><br />
	  		<input type="text" name="nom" placeholder="Nouvel Nom.."><br />
	  		
	  		<label for="Nom"></label><br />
	  		<input type="text" name="prenom" placeholder="Nouvel Prenom.."><br />
	  		
	  		<label for="Nom"></label><br />
	  		<input type="text" name="adr" placeholder="Nouvel adresse mail.."><br />
	  		
	  		<label for="Nom"></label><br />
	  		<input type="text" name="rol" placeholder="Nouvel Role.."><br />
			
	  		<input type="submit" value="Envoyer!" name="Envoyer1" class="En">
	  	</form>
  	</div>
  	<div id="mod2">
	  	<h3>Informations Sécurisés :</h3>
	  	<form method="POST" action="modifierParametre.php">
	  		<?php 	
				echo $msg2; 
			?>
	  		<label for="Nom"></label><br />
	  		<input type="text" name="loginn" placeholder="Nouvel Login.."><br />
	  		
	  		<label for="Nom"></label><br />
	  		<input type="password" name="pass" placeholder="Nouvel Mot de passe.."><br />
	  		
	  		<input type="submit" value="Envoyer!" name="Envoyer2" class="En">
	  	</form>
  	</div>
  </div>
  <script type="text/javascript" src="assets/js/scripts.js">
  </script>


<?php
	
	require 'inc/footer.php';

}
else{
	header('Location : authentification/login.php');
    exit();
}
?>
