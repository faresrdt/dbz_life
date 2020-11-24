<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');




if (array_key_exists('pseudo', $_POST)) {
    $pseudo   = $_POST['pseudo'];
    $password = $_POST['password'];


    $query=$bdd->prepare('
                          SELECT * 
                          FROM users
                          WHERE pseudo=?');

    $query->execute([$pseudo]);
    $user = $query->fetch(PDO::FETCH_ASSOC);



    if ($pseudo == $user['pseudo'] AND $password == $user['password']) {
        $_SESSION['connected'] = true;
        $_SESSION['pseudo']    = $user['pseudo'];
        $_SESSION['nom']       = $user['nom'];
        $_SESSION['prenom']    = $user['prenom'];
        $_SESSION['mail']      = $user['mail'];
        $_SESSION['role']      = $user['role'];
        $_SESSION['id']        = $user['id'];


        if ($_SESSION['role']  == 'admin')
        {$sessionAdmin ='Bienvenue Admin !';header('Location:/php/admin.php');die();}
        else
        {header('Location:/index.php');die();}

    } else {
        $errorMessage = '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> La saisie des informations est incorrecte.';
        $template = 'login';
        include '../html/layout.phtml';
    }

}


else {

    $template = 'login';
    include '../html/layout.phtml';
}






