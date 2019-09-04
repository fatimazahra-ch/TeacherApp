  <?php 
  session_start();

  if(isset($_SESSION['login'])) {
    require 'inc/header.php';
    ?>
    
    <!-- Si c'est un professeur -->
    <p>Saisir la date:</p>
    <?php
    $parametres = ['name'=>$_GET['name']];           
    echo "<form action='controllerabsence_affich.php?".http_build_query($parametres)."' method='POST'>";
    ?>
    Date:  <input type="text" name="date" placeholder="JOUR-MOIS-ANNEE" style="border: 2px solid #ccd0d5; border-radius: 10px; padding: 5px;"><br>
    <input type="submit" name="submit" class="btn" style="background-color:#1885c9 ; color: white;">
  </form>
  <?php 
  require 'inc/footer.php'; } 
    else
        header('Location: authentification/login.php');?>