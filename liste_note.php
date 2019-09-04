<?php 
    session_start();
    if(isset($_SESSION['login'])) {
        require 'inc/header.php';
        ?>
        
        <!-- traitement du absence -->
        <?php
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
                        if($_GET['note']=='finale'){
                          echo "<th>la note finale</th>";
                          echo "<th>la note finale</th>";}
                        else{
                          echo "<th>la note rattrapage</th>";
                          echo "<th>la note rattrapage</th>";}
                         ?>
                    </tr>
                </thead>
                <?php
                $parametres = ['name'=>$_GET['name'],'note'=>$_GET['note']];           
                echo "<form action='controllernote.php?".http_build_query($parametres)."' method='POST'>";
                ?>
                <tbody>
                    
                    <?php 
                    $id_module=$module->get_idmodule($_GET['name']);
                    $donnees=$etudemanager->get_liste($id_module);
                    $i=0;/*pour le tableau*/
                    while ($ligne=$donnees->fetch(PDO::FETCH_ASSOC)){
                       echo "<tr >";
                       foreach ($ligne as $value) {
                           echo "<td>".$value."</td>";
                       }
                           if($_GET['note']=='finale'){
                              $result=$notemanager->get_note_finale($ligne['Id_etudiant'],$id_module);
                              $don=$result->fetch();
                              $note=$don['Valeur_finale'];
                              echo "<td>".$note."</td>";
                            }
                            else{
                              $result=$notemanager->get_note_rat($ligne['Id_etudiant'],$id_module);
                              $don=$result->fetch();
                              $note=$don['Valeur_apres_rat'];
                              echo "<td>".$note."</td>";
                            }
                        /*if($_GET['note']=='finale'){
                          $donnees=$notemanager->get_note_finale($ligne[0],$id_module);
                          $resul=$donnees->fetch();
                          $note=$resul['Valeur_finale'];
                        }
                        else{
                          $donnees=$notemanager->get_note_rat($ligne[0],$id_module);
                          $resul=$donnees->fetch();
                          $note=$resul['Valeur_apres_rat'];
                        }
                        if($note==0){*/
                            echo '<td><input type="text" name="absent['.$i.']"></td>';
                                  $i+=1;
                          /*}
                        else
                            echo "<td>".$note."</td>";*/
                       echo "</tr>";
                   }
                   ?>

               </tbody>
           </table>
           <button type="submit" name="submit" class="btn" style="background-color:#1885c9 ; color: white;">Submit</button>
       </form>
       <?php
   }
   else{
    header('Location: bonjour.php');
}
require 'inc/footer.php'; 
}
else
        header('Location: authentification/login.php'); 
?>