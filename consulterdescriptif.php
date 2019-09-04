
<?php
session_start();
if(isset($_SESSION['login'])) {
require 'inc/header.php'; 
            echo '<table id=table1
              { style="
                font-weight:500; 
                padding: 10px;
                font-size: 0.8em;"
            }>';
            echo '<thead>';
            echo '<tr>
                        <th>Semester</th>
                        <th>Liste Des Modules</th>
                        <th>Nom et prénom enseignant</th>
                        <th>Nom et prénom responsable</th>
                        <th>Etablissement</th>
                        <th>Département</th>
                        <th>Spécialité</th>
                        <th>Grade</th>
                </tr>';
            echo '</thead>';
            echo '<tr>';
            echo '<td colspan="9">Modules Scientifiques et techniques de base et de spécialisation</td>';
            echo '</tr>';
            echo '<tbody>';
            $j=1;
            for($i=1;$i<=5;$i++)
                {
                    $var1="s".$i; 
                    $requete1="SELECT Intitulé,Département,Idresponsable,module.Id_personne,spécialité,grade  FROM module,personne  WHERE semestre='".$var1."'  AND personne.Id_personne=module.Id_personne  ORDER BY Prenom";
                    $requete2="SELECT Nom,Prenom  FROM personne ";
    
                    $resulte=$conn->query($requete1);
                if(!$resulte)
                {
                    echo"Lecture impossible ";
                }
                else
                {
                    $nbligne=$resulte->rowCount();
                   
                            foreach($conn->query($requete1) as $row1)
                            {   
                                        
                                        $requete3="SELECT Nom,Prenom FROM personne WHERE Id_personne='".$row1['Id_personne']."' ";
                                        $requete4="SELECT Nom,Prenom FROM personne WHERE personne.Id_personne='".$row1['Idresponsable']."' ";



                                echo '<tr>';
                                echo '<td>';echo "s".$i;echo '</td>';
                                echo '<td>' .$row1["Intitulé"].'</td>';
                                foreach($conn->query($requete3) as $row3)
                                    {
                                    $NomEnseignant=$row3['Nom']." ".$row3['Prenom'];
                                    echo '<td>' . $NomEnseignant.'</td>';
                                    }
                                foreach($conn->query($requete4) as $row4)
                                    {
                                    $NomResponsable=$row4['Nom']." ".$row4['Prenom'];
                                    echo '<td>' . $NomResponsable.'</td>';
                                    }
                                        
                                echo '<td> ENSAH </td>';
                                echo '<td>'. $row1["Département"].'</td>';
                                echo '<td>'. $row1["spécialité"] .'</td>';
                                echo '<td>'. $row1["grade"].'</td>';
                                echo'</tr>';     
                                
                           }
                }
                }

                echo '</tbody>';
                echo '</table>';                        
    ?>
<?php require 'inc/footer.php'; }
else
        header('Location: authentification/login.php');?>  

