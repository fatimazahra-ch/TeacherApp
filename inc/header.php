  <?php 
  $username=$_SESSION['login'];
  require 'call_manager.php';
  /*---------------------liste des modules-----------------*/
  $result=$module->liste_module($id);
  $donnees=[];
  while ($ligne=$result->fetch(PDO::FETCH_NUM)) {
    foreach ($ligne as $value) {
      array_push($donnees,$value);
    }
  }
  /*------------------------------------------------------*/
  ?>
  <!doctype html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>document.getElementsByTagName("html")[0].className += " js";</script>
    
    <link rel="stylesheet" href="assets/css/style.css">
    <!--<link rel="stylesheet" href="assets/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style2.css">
    <title>Our team project</title>
  </head>
  <body>
    <header class="cd-main-header js-cd-main-header" id="header">
      <div class="cd-logo-wrapper">
        <a href="presentation.php" class="cd-logo" target="_blank">
          TeacherApp
        </a>
      </div>
      
    <div class="cd-search js-cd-search" id="ss">
      <form method="GET" action="search.php" id="searchForm">
        <input class="reset" type="search" name="q" placeholder="Search..." id="searchBox">
        <!--<input type="submit" id="submit" value=" ">-->
      </form>
    </div>

      <button class="reset cd-nav-trigger js-cd-nav-trigger" aria-label="Toggle menu"><span></span></button>
      
      <ul class="cd-nav__list js-cd-nav__list">
         <li class="cd-nav__item"><a href="presentation.php">A propos de nous ?</a></li><!-- Accede Vers Mon Compte -->
        <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">
          <a href="#0">
          <img src="<?php echo 'assets/img/'.$_SESSION['img']; ?>" width="900px" style="border-radius: 50%;">
          <span><?php if(isset($_SESSION['login'])) {echo $_SESSION['login'];} ?></span>
        </a>

          <ul class="cd-nav__sub-list">
            <li class="cd-nav__sub-item"><a href="parametreLogin.php">Mes Parametres</a></li><!-- Afficher les Parametres -->
            <li class="cd-nav__sub-item"><a href="modifierParametre.php">Modifier Parametres</a></li>
          </ul>
        </li>
      </ul>

    </header> <!-- .cd-main-header -->
    <main class="cd-main-content">
    <nav class="cd-side-nav js-cd-side-nav">
      <div id="nav">
      <ul class="cd-side__list js-cd-side__list">
        <li class="cd-side__label"><span>Consulter :</span></li>
        <li class="cd-side__item cd-side__item--has-children cd-side__item--overview js-cd-item--has-children">
          <a href="Bonjour.php">Acceuil</a>
         </li> 
        <li class="cd-side__item cd-side__item--has-children cd-side__item--images js-cd-item--has-children"> 
            <a href="#0">Modules</a>
            
            <ul class="cd-side__sub-list">
              <li class="cd-side__sub-item"><a href="moduleEnseigne.php">Module enseigné</a></li>
              <li class="cd-side__sub-item"><a href="module_responsable.php">Module responsable</a></li>
            </ul>
          </li>
          <!-- ---------------------------------------------------------------- -->
          <!-- -----------------LA LISTE DES ETUDIANTS ------------------------ -->
          <li class="cd-side__item cd-side__item--has-children cd-side__item--notifications cd-side__item--selected js-cd-item--has-children">
            <a href="listeglobale_etud.php">Liste des etudiants<span class="cd-count"><?php echo count($donnees);?></span></a>
            <ul class="cd-side__sub-list">
              <?php 
              foreach ($donnees as $value) {
                $parametres = ['name'=>$value];
                echo '<li class="cd-side__sub-item"><a aria-current="page" href="listeEtudiant.php?'.http_build_query($parametres).'">'.$value.'</a></li>';
              }
              ?>
            </ul>
          </li>
          <!-- ---------------------------------------------------------------- -->
          <!-- ----------------------------LES NOTES--------------------------- -->
          <li class="cd-side__item cd-side__item--has-children cd-side__item--comments js-cd-item--has-children">
            <a href="#0">Notes</a>
            
            <ul class="cd-side__sub-list">
              <li class="cd-side__sub-item"><a aria-current="page" href="#0">Note Final</a>
                <ul>
                  <?php 
                  foreach ($donnees as $value) {
                    $parametres = ['name'=>$value,'note'=>'finale'];
                    echo '<li class="cd-side__sub-item"><a href="liste_note.php?'.http_build_query($parametres).'">'.$value.'</a></li>';
                  }
                  ?>
                </ul>
              </li>
              <li class="cd-side__sub-item"><a aria-current="page"href="#0">Note de rattrapage</a>
                <ul >
                  <?php 
                  foreach ($donnees as $value) {
                   $parametres = ['name'=>$value,'note'=>'ratt'];
                   echo '<li class="cd-side__sub-item"><a href="liste_note.php?'.http_build_query($parametres).'">'.$value.'</a></li>';
                 }
                 ?>
               </ul>
             </li>
           </ul>
         </li>
       </ul>
       <!-- ---------------------------------------------------------------- -->
       <ul class="cd-side__list js-cd-side__list">
        <li class="cd-side__label"><span>Secondary</span></li>
        <!-- --------------------L ABSENCE----------------------------- -->
        <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
          <a href="absence.php">L'absence</a>

          <ul class="cd-side__sub-list">
            <?php 
            foreach ($donnees as $value) {
             $parametres = ['name'=>$value];
             echo '<li class="cd-side__sub-item"><a href="absence_affich.php?'.http_build_query($parametres).'">'.$value.'</a></li>';
           }
           ?>
         </ul>
       </li>
       <!-- ---------------------------------------------------------------- -->
    </ul>
    <?php
    if($_SESSION['role']=="Responsable de filiére"){
     echo '<ul class="cd-side__list js-cd-side__list">
              <li class="cd-side__label"><span>Thirdly</span></li>
              <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children"><a href="modifierdescriptif.php">Modifier Descriptif</a></li>
              <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children"><a href="consulterdescriptif.php">Consulter Descriptif</a></li>
     </ul>';}
     elseif($_SESSION['role']=="chef de département"){ 
       echo '<ul class="cd-side__list js-cd-side__list">
              <li class="cd-side__label"><span>Thirdly</span></li>
              <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children"><a href="consulterdescriptif.php"> Consulter Descriptif</a></li>
     </ul>';
   }
    ?>
    <ul class="cd-side__list js-cd-side__list">
      <li class="cd-side__label"><span>Action</span></li>
      <li class="cd-side__btn"><a href="deconnecter.php"><button class="reset">Déconnexion</button></a></li>
    </ul>
  </nav>

  <div class="cd-content-wrapper">
    <div class="text-component text--center">
