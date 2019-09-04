<?php 
session_start();
    if(isset($_SESSION['login'])){
        require 'inc/header.php';
        $donnees=$etudiantmanager->get_liste_etudiant();
    if(!$donnees)
        echo "Lecture impossible";
    else{
    ?>
    
    <!-- Si c'est un professeur -->
    <table id="table1" >
        <thead>
            <tr>
                <th>CNE</th>
                <th>NOM</th>
                <th>Prenom</th>
                <th>Adresse gmail</th>
            </tr>
        </thead>
         
        <tbody>
            <?php 
                   while ($ligne=$donnees->fetch(PDO::FETCH_ASSOC)) {
                       echo "<tr>";
                       foreach ($ligne as $value) {
                           echo "<td>".$value."</td>";
                       }
                       echo "</tr>";
                   }
                ?>
        </tbody>
    </table>
    <?php } 
    require 'inc/footer.php'; }
    else
        header('Location: authentification/login.php');?>