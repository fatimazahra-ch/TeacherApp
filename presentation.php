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
<?php require 'inc/header.php';?>

<article id="articll">
	<img src="assets/img/p1.jpg">
	<h1>Pourquoi "TeacherApp" ?</h1>
	<br />

	<div id="article1">
		<h4>"TeacherApp"...C'est quoi ?</h4>
		<p>
			"TeacherApp" est un site web qui facilite la gestion au niveau de département Mathématique et informatique de l'ENSAH , considéré comme une plateforme de gestion des professeurs.<br/>
			C’est une application destinée pour :
		</p>	
		<ul>
			<li>les Chefs de département</li>
			<li>les responsables des filiéres</li>
			<li>les Professeurs</li>
		</ul>
	</div>
	<br />
    <div id="article2">
		<h4>Pourquoi "TeacherApp" ?</h4>
		<p>
			En tant que professeur , vous voudrez consulter  quotidiennement en ligne les modules que vous enseignez , vérifier et saisir l'absence de vos étudinants , attribuer des notes finales pour chaque étudiants .<br />
			En effet , il est évident que l'enseignant doit évoluer pour suivre et intégrer les nouvelles méthodes d'éducation.<br />
			Par conséquent , "TeacherApp" est là pour vous offrir tous ces possibiltés d'une maniére rapide et intéractive . C’est une application web, accessible 24 h sur 24, actualisée quotidiennement.
		</p>	
		<br />

		<p>
			Contacte-nous :
			<ul>
				<li>charjanefatimazahra@gmail.com</li>
				<li>aassila1998@gmail.com</li>
				<li>bassmamaachi@gmail.com</li>
			</ul>
		</p>
	</div>
</article>


<?php require 'inc/footer.php';?>

<?php }
else
        header('Location: authentification/login.php');?>