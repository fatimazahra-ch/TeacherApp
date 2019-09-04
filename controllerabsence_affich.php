  <?php 
  session_start();

  if(isset($_SESSION['login'])) {
    require 'inc/header.php';
    ?>

    <!-- Si c'est un professeur -->
    <?php 
    if(isset($_POST['submit'])){
      $dir_glo="fich_global/".$_GET['name'];
      $name_fichier=$_POST['date'].".txt";
      if(file_exists($dir_glo.'/'.$name_fichier)){
        $tab=array();
        $tab_name=[];
        $d=[];
        $string="";
        $s=file($dir_glo.'/'.$name_fichier);
        foreach ($s as $key => $value) {
          $string=$value;
        }
        $tab=explode('-', $string);
        foreach ($tab as $value) {
          $d[]=explode(' ', $value);
        }
        ?>
        <table id="table1" >
          <thead>
            <tr>
              <th>NOM</th>
              <th>Prenom</th>
            </thead>

            <tbody>
              <?php 
              foreach ($d as $value) {
                echo "<tr>";
                foreach ($value as $val) {
                  echo "<td>".$val."</td>";
                }
                echo "</tr>"; 
              }
              ?>     
            </tbody>
          </table>
          <?php
        }
        else 
          echo "l'absence n'est pas saisis dans ce jour"; 
      }
      require 'inc/footer.php'; 
    }
    else
        header('Location: authentification/login.php');
    ?>