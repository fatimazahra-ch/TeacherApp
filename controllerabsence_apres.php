<?php 
session_start();
if (isset($_SESSION['login'])){
    if(isset($_POST['submit'])){
        require 'inc/header.php';
        if(isset($_POST['absent'])){
            /*---------traitement du tableau apres le remplissage------------------------------------------*/
            $id_module=$module->get_idmodule($_GET['name']);
            $donnees=$etudemanager->get_liste($id_module);
            $tab_id=[];
            $tab_nom=[];
            $tab_prenom=[];
            $infos=$donnees->fetchALL();

            foreach ($infos as $value) {
                array_push($tab_id, $value['Id_etudiant']);
                array_push($tab_nom, $value['Nom_etudiant']);
                array_push($tab_prenom, $value['Prenom_etudiant']);
            }
            foreach ($_POST['absent'] as $key =>$value) {
                if (isset($value)) {
                    foreach ($tab_id as $cle =>$val) {
                        if($key==$cle){
                            $rep=$absencemanager->modifie_absence($val,$id_module);
                            $name_fich='fich_global/'.$_GET['name'].'/'.$_GET['date'].'.txt';
                            $file=fopen($name_fich,'a+',1);
                            $name="-".$tab_nom[$cle].' '.$tab_prenom[$cle];
                            $ret=fputs($file,$name);
                            fclose($file);
                        }
                    }
                }
            }
            if($ret)
                echo "l'operation éffectuée";
            else
                echo "operation échouée";
        }
        else
            echo "la liste est vide";
        
        require 'inc/footer.php';
    }
}
else
        header('Location: authentification/login.php');
?>

