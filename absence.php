<?php 
session_start();
    
    if(isset($_SESSION['login'])) {
        require 'inc/header.php';
    ?>
    
    <!-- Si c'est un professeur -->
    <p>Saisir l'absence pour le jour de la date:</p>
    <form action='controllerabsence.php' method="GET" class="form-horizontal">
     Date:  <input type="text" name="date" placeholder="JOUR-MOIS-ANNEE" style="border: 2px solid #ccd0d5; border-radius: 10px; padding: 5px;"><br>
     selectionnez le module:
     <select name="module_absence" style="border: 2px solid #ccd0d5; border-radius: 10px; padding: 5px;">
        <option></option>
         <?php 
             foreach ($donnees as $value) {
                echo '<option value="'.$value.'">'.$value.'</option>';
            }
                ?>
     </select>
     <button type="submit" name="submit" class="btn" style="background-color:#1885c9 ; color: white;">Submit</button>
    </form>
    <?php 
    require 'inc/footer.php'; 
    } 
    else
        header('Location: authentification/login.php');
    ?>