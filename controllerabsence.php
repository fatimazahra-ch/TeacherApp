    <?php 
    session_start();
    if(isset($_SESSION['login'])) {
        require 'inc/header.php';
        ?>
        
        <!-- traitement du absence -->
        <?php
        if(!empty($_GET['date']) && !empty($_GET['module_absence'])){
            $name_golb='fich_global/'.$_GET['module_absence'];
            $name_fichier=$_GET['date'].".txt";
            if(file_exists($name_golb)){
                $file=fopen($name_golb.'/'.$name_fichier,'a+',1);
            }
            else{
                mkdir($name_golb);
                $file=fopen($name_golb.'/'.$name_fichier,'a+',1);
            }
            ?>
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
                <?php
                $parametres = ['name'=>$_GET['module_absence'],'date'=>$_GET['date']];           
                echo "<form action='controllerabsence_apres.php?".http_build_query($parametres)."' method='POST'>";
                ?>
                <tbody>
                    
                    <?php 
                    $id_module=$module->get_idmodule($_GET['module_absence']);
                    $donnees=$etudemanager->get_liste($id_module);
                    $i=0;/*pour le tableau*/
                    while ($ligne=$donnees->fetch(PDO::FETCH_NUM)) {
                       echo "<tr >";
                       foreach ($ligne as $value) {
                           echo "<td>".$value."</td>";
                       }
                       echo '<td><input type="checkbox" name="absent['.$i.']"></td>';
                       $i+=1;
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
    header('Location: absence.php');
}
require 'inc/footer.php'; 
} 
else
        header('Location: authentification/login.php');
?>