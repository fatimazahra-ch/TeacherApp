
<?php
session_start();
       if (isset($_SESSION['login'])){
       require 'inc/header.php'; 
            echo'<form method="POST" action="">';

            echo '<table id="table1" style="width=100%;">';
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
                $requete1="SELECT Intitulé,Département,Nom,Prenom,spécialité,grade,Nomprenom  FROM module,personne  WHERE semestre='".$var1."'  AND personne.Id_personne=module.Id_personne ORDER BY Prenom";
                //$requete2="SELECT Nom,Prenom  FROM personne ";
                $requete2="SELECT Nomprenom  FROM personne ";


                $resulte=$conn->query($requete1);
                if(!$resulte)
                {
                    echo"Lecture impossible ";
                }
                else
                {
                    $nbligne=$resulte-> rowCount();
                   
                            foreach($conn->query($requete1) as $row)
                            {   
                                        $namechoix="choix".$j;
                                        $intitule= $namechoix."intitule";
                                        $_SESSION[$intitule]=$row["Intitulé"];
                                echo '<tr>';
                                echo '<td>';echo "s".$i;echo '</td>';
                                echo '<td>' .$row["Intitulé"].'</td>';
                               echo '<td>';
                                       
                                        //echo'<form method="POST" action="">';
                                            echo"<input list='Enseignant' name='".$namechoix."' style='width:60%;' >" ;
                                            echo'<datalist id="Enseignant" >' ;
                                            foreach($conn->query($requete2) as $row2)
                                            {
                                            //$var1=$row2["Nom"] ;
                                            //$var2=$row2["Prenom"];
                                            //$Nomprenom=$var1.$var2;
                                            $Nomprenom=$row2["Nomprenom"];
                                            echo"<option value='".$Nomprenom."'  name='".$namechoix."'>";
                                            }
                                            echo' </datalist>';
                                           // echo'<input type="submit" name="submit"  style="background-color:#1e93db; color:white;"/>';
                                            if(isset($_POST['submit'])) 
                                            {
                                                if(isset($_POST[$namechoix]))
                                                {
                                                    $_SESSION[$namechoix]=$_POST[$namechoix];
                                                    if(isset($_SESSION[$namechoix]) && !empty($_SESSION[$namechoix])) 
                                                    {
                                                        $requete4="SELECT Id_personne FROM personne WHERE Nomprenom='".$_SESSION[$namechoix]."' ";
                                                        $resulte4=$conn->query($requete4);
                                                        foreach($conn->query($requete4) as $row3)
                                                        {
                                                            $res=$row3['Id_personne'];
                                                        
                                                        $intitule= $namechoix."intitule";
                                                   
                                                        $sql = ("UPDATE module SET Id_personne='".$row3['Id_personne']."' WHERE Intitulé='".$_SESSION[$intitule]."'");
                                                    }
                                                       
                                                    }

                                                } 

                                            }

                                            $j++;   
                                           
                                           
                                            
                                            
                                echo '</td>';
                                echo '<td>';
                                       
                                        $namechoix="choix".$j;
                                        $intitule= $namechoix."intitule";
                                        $_SESSION[$intitule]=$row["Intitulé"];
                                        
                                            echo"<input list='Responsable' name='".$namechoix."' style='width:60%;' >" ;
                                            echo'<datalist id="Responsable" >';
                                            foreach($conn->query($requete2) as $row2)
                                            {
                                            //$var1=$row2["Nom"] ;
                                            //$var2=$row2["Prenom"];
                                            $Nomprenom=$row2["Nomprenom"];
                                            echo"<option value='".$Nomprenom."' name='".$namechoix."'>";
                                            }
                                            echo' </datalist>';
                                            if(isset($_POST['submit'])) 
                                            {
                                                if(isset($_POST[$namechoix]))
                                                {
                                                    $_SESSION[$namechoix]=$_POST[$namechoix];
                                                    if(isset($_SESSION[$namechoix]) && !empty($_SESSION[$namechoix])) 
                                                    {
                                                        $requete4="SELECT Id_personne FROM personne WHERE Nomprenom='".$_SESSION[$namechoix]."' ";
                                                        $resulte4=$conn->query($requete4);
                                                        foreach($conn->query($requete4) as $row3)
                                                        {
                                                            $res=$row3['Id_personne'];
                                                        
                                                        $intitule= $namechoix."intitule";
                                                   
                                                        $sql = ("UPDATE module SET Idresponsable='".$row3['Id_personne']."' WHERE Intitulé='".$_SESSION[$intitule]."'");
                                                    }
                                                       
                                                    }

                                                } 

                                            }

                                            
                                            $j++; 
                                                                         
     

                                             
                                echo '</td>';
                                echo '<td> ENSAH </td>';
                                echo '<td>'. $row["Département"].'</td>';
                                echo '<td>'. $row["spécialité"] .'</td>';
                                echo '<td>'. $row["grade"].'</td>';
                                echo'</tr>';     
                                
                           }


                        
                  
                    
                }
                }

                echo '</tbody>';
                echo '</table>';
                echo'<input type="submit" name="submit" class="btn" style="background-color:#1885c9 ; color: white;"/>';echo'  ';
                echo'</form>';



                



               
    $req
 
                                          
    ?>
    
        
            
                  


<?php require 'inc/footer.php';}
else
        header('Location: authentification/login.php'); ?>  

