<?php

if(isset($_POST['submit'])){
    $username=$_POST['login'];
    $password=$_POST['Password'];
    
    if(empty($username) || empty($password)){
        echo '<div class="alert alert-danger">le mot de passe ou le login est incorrect</div>';
    }
    else {
        $user=new user;
        if($user->getuser($username,$password)){
            session_start();
            $_SESSION['login']=$username;
            $_SESSION['Password']=$password;
            include("../connexion_header.inc.php");
            $conn = connexion_header("parametre");
            $requete = $conn->query("SELECT * FROM personne WHERE Password_personne ='".$_SESSION['Password']."'");
            $res = $requete->fetch();
            $_SESSION['id'] = $res['Id_personne'];
            $_SESSION['nom'] = $res['Nom'];
            $_SESSION['prenom'] = $res['Prenom'];
            $_SESSION['mail'] = $res['Adr_mail'];
            $_SESSION['role'] = $res['Role'];
            $_SESSION['img'] = $res['photoProfil'];
            header('Location: ../Bonjour.php');
            exit();
        }
        else{
            echo '<div class="alert alert-danger">cet utilisateur n existe pas</div>';
        }
    }
}
?>