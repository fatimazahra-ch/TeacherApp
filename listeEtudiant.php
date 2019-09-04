<?php 
session_start();
    if(isset($_SESSION['login'])){
        require 'inc/header.php';
        $_SESSION['name_mod']=$_GET['name'];
        echo $_GET['name'];
        $id_module=$module->get_idmodule($_GET['name']);
        $donnees=$etudemanager->get_liste($id_module);

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
                <th>Absence</th>
            </tr>
        </thead>
         
        <tbody>
            <?php 
                   while ($ligne=$donnees->fetch(PDO::FETCH_NUM)) {
                       echo "<tr>";
                       $id_etudiant=$ligne[0];
                       foreach ($ligne as $value) {
                           echo "<td>".$value."</td>";
                       }
                       echo "<td>".$absencemanager->nombre_absence($id_etudiant,$id_module)."</td>";
                       echo "</tr>";
                   }
                ?>
        </tbody>
    </table>
    <form method="post" action="export.php">
     <input type="submit" name="export" class="btn" value="Export" style="background-color:#1885c9 ; color: white;" />
    </form>
    <?php } 
    require 'inc/footer.php'; }
    else
        header('Location: authentification/login.php');?>