<?php 
session_start();
  if(isset($_SESSION['login'])) {?>
    <?php 
        require 'inc/header.php'; 
        
        $result = $module->module_responsable($id);
    if(!$result)
        echo "Lecture impossible";
    else{
    ?>
    
    <!-- Si c'est un professeur -->
    <table id="table1" >
        <thead>
            <tr>
                <th>N°= </th>
                <th>Module</th>
            </tr>
        </thead>
         
        <tbody>
            <?php 
                   while ($ligne=$result->fetch(PDO::FETCH_NUM)) {
                       echo "<tr>";
                       foreach ($ligne as $value) {
                           echo "<td>".$value."</td>";
                       }
                       echo "</tr>";
                   }
                ?>
        </tbody>
    </table>
    
    <?php } require 'inc/footer.php'; }
    else
        header('Location: authentification/login.php');?>  