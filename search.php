<?php 
session_start();
if(isset($_POST['submit']))
{
    unset($_SESSION['login']);
    header('location : authentification/login.php');
    exit();
}
if(isset($_SESSION['login'])) 
{ 	
	require 'inc/header.php';

	if(!isset($_GET['q']))
	{
		echo '';
	}
	else
	{
		if($_GET['q'] == '')
		{   
			echo "Aucun resultat... ";
		}
		else//if($_GET['q'] !== '')
		{
			$requete = $conn->query("SELECT * FROM module WHERE Intitulé LIKE '%".$_GET['q']."%'");
			$aide = 0;
			if($requete->rowCount())
			{   
				$aide = 1;?>
				<p>
					<strong><?php echo $requete->rowCount(); ?></strong>  resultat pour '<?php echo $_GET['q']; ?>'
				</p>
				<table id="table1">
		            <thead>
		                    <tr>
		                    <th>N°</th><th>Module</th><th>Semestre</th>
		                    </tr>
		            <thead>
		            <tbody>
					<?php
					while($row = $requete->fetch(PDO::FETCH_ASSOC))
					{    
					   echo '<tr>';
					   echo  '<td>'. $row['Id_module'] . '</td><td>' . $row['Intitulé'] . '</td><td>'. $row['Semestre'] .'<td/>';
					   echo '</tr>';
					}
					?>
					</tbody>
	        	</table>
	        	<br />
	        	<?php echo 'Pour Beaucoup Plus d Information visiter : <a href="moduleEnseigne.php" id="as">Module</a>';
        	}

			$requete = $conn->query("SELECT * FROM etudiant WHERE Nom_etudiant LIKE '%".$_GET['q']."%' or Prenom_etudiant LIKE '%".$_GET['q']."%' ");?>
			
			<?php 
			if($requete->rowCount()!=0 && $aide ==0)
			{ ?>
				<p><strong><?php echo $requete->rowCount(); ?></strong>  resultat pour '<?php echo $_GET['q']; ?>'</p>

				<table id="table1">
		            <thead>
		                    <tr>
		                    <th>N°</th><th>Etudiant</th><th>Adresse-Email</th>
		                    </tr>
		            <thead>
		            <tbody>
					<?php
					while($row = $requete->fetch(PDO::FETCH_ASSOC))
					{    
					   echo '<tr>';
					   echo  '<td>'. $row['Id_etudiant'] . '</td><td>' . $row['Nom_etudiant'] .' '.$row['Prenom_etudiant'] .'</td><td>'.$row['Adr_mail'].'</td>';
					   echo '</tr>';

					}
					?>
					</tbody>
	        	</table>
	        	<br />
	        	<?php echo 'Pour Beaucoup Plus d Information  : <a href="listeglobale_etud.php" id="as">Les etudiants</a>';
	     
        	}
			else if($aide==0)
			{
				echo "Aucune Résultat pour :".$_GET['q'];
			}
		}	
	}
	require 'inc/footer.php';
}
else
{
	header('Location : authentification/login.php');
    exit();
}
?>