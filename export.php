<?php  
session_start();
//export.php  
require('call_manager.php');
$output = '';
if(isset($_POST["export"]))
{
$id_module=$module->get_idmodule($_SESSION['name_mod']);
$donnees=$etudemanager->get_liste($id_module);
 if($donnees)
 {
  $output .= '
   <table class="table" bordered="1" id="table1">  
                    <tr>
                <th>CNE</th>
                <th>NOM</th>
                <th>Prenom</th>
                <th>Adresse gmail</th>
                <th>Absence</th>
            </tr>
  ';
  while ($ligne=$donnees->fetch(PDO::FETCH_ASSOC))
  {
    $id_etudiant=$ligne['Id_etudiant'];
   $output .= '
    <tr>  
                         <td>'.$ligne['Id_etudiant'].'</td>  
                         <td>'.$ligne['Nom_etudiant'].'</td>  
                         <td>'.$ligne['Prenom_etudiant'].'</td>  
       <td>'.$ligne['Adr_mail'].'</td>  
       <td>'.$absencemanager->nombre_absence($id_etudiant,$id_module).'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>