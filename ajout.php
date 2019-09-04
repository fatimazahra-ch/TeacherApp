<?php
		include ("autoloader_header.php");
        autoloader_header::register();
        include("connexion_header.inc.php");
        $conn = connexion_header("parametre");
        $personne=new personnemanager($conn);
        $module = new moduleManager($conn);
        $etudemanager=new etudemanager($conn);
        $id=$personne->get_id($_SESSION['Password']);
?>