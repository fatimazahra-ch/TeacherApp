<?php 
session_start();
if(isset($_POST['submit']))
{
    unset($_SESSION['login']);
    header('Location : authentification/login.php');
    exit();
}
?>
<?php if (isset($_SESSION['login'])) {?>
<?php require 'inc/header.php';


;?>

<ul id="bonjour">

	<li>
		
		<a href="#"><img src="assets/img/3actu.png" width="100"></a>
		<h4>Actualité</h4>
		<pre>
Vérifier les nouveauté de
votre profil,les modules ,
les nouveaux étudiants , 
les nouveaux professeurs
		</pre>
		<a href="#">Voir Plus</a>
	</li>

	<li>	
		
		<a href="http://www.ensah.ma"><img src="assets/img/2ens.png" width="100"></a>
		<h4>ENSAH</h4>
		<pre>
l'Ecole Nationale des Sciences 
Appliquées d'Al-Hoceima (ENSAH)
est un établissement public 
d'enseignement supérieur relevant 
de l'université Abdelmalek Essaadi.
		</pre>
		<a href="http://www.ensah.ma">Voir Plus</a>
	</li>

	<li>
		
		<a href="presentation.php"><img src="assets/img/1apro.png" width="100"></a>
		<h4>A propos de nous</h4>
		<pre>
"TeacherApp" est un site web
qui facilite la gestion au 
niveau de département 
Mathématique et informatique
de l'ENSAH.
		</pre>
		<a href="presentation">Voir Plus</a>
	</li>
</ul>

<?php require 'inc/footer.php';?>

<?php }
else{
	header('Location : authentification/login.php');
    exit();
}
?>