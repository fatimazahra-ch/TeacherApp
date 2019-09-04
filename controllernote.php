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
                            if($_GET['note']=='finale')
                                $rep=$notemanager->set_note_finale($value,$val,$id_module);
                            else
                                $rep=$notemanager->set_note_rat($value,$val,$id_module);
                        }
                    }
                }
            }
        }
    if(!empty($_GET['note']) && !empty($_GET['name'])){
            ?>
            <table id="table1" >
                <thead>
                    <tr>
                        <th>CNE</th>
                        <th>NOM</th>
                        <th>Prenom</th>
                        <th>Adresse gmail</th>
                        <?php
                        if($_GET['note']=='finale')
                          echo "<th>la note finale</th>";
                        else
                          echo "<th>la note rattrapage</th>";
                         ?>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
                    $id_module=$module->get_idmodule($_GET['name']);
                    $donnees=$etudemanager->get_liste($id_module);
                    
                    while ($ligne=$donnees->fetch(PDO::FETCH_NUM)) {
                        echo "<tr >";
                       foreach ($ligne as $value) {
                           echo "<td>".$value."</td>";
                       }
                       $id_etudiant=$ligne[0];
                       if($_GET['note']=='finale'){
                        $result=$notemanager->get_note_finale($id_etudiant,$id_module);
                        $donnee=$result->fetch();
                        $note=$donnee['Valeur_finale'];
                          echo "<td>".$note."</td>";
                       }
                        else{
                        $result=$notemanager->get_note_rat($id_etudiant,$id_module);
                        $donnee=$result->fetch();
                        $note=$donnee['Valeur_apres_rat'];
                          echo "<td>".$note."</td>";
                        }
                       echo "</tr>";
                   }
                   ?>

               </tbody>
           </table>
       <?php
   }   
    require 'inc/footer.php'; 
}
}
else
        header('Location: authentification/login.php');
?>

