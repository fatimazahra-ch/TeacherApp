<?php
		include ("autoloader_header.php");
        autoloader_header::register();
        include("connexion_header.inc.php");
        $conn = connexion_header("parametre");
        $personne=new personnemanager($conn);
        $module = new moduleManager($conn);
        $etudemanager=new etudemanager($conn);
        $etudiantmanager=new etudiantmanager($conn);
        $absencemanager=new absencemanager($conn);
        $notemanager=new notemanager($conn);
        $id=$personne->get_id($_SESSION['Password']);
?>