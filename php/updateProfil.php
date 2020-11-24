<?php
session_start();

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$pseudo = $_POST['pseudo'];
$mail = $_POST['mail'];
$id = $_POST['id'];


function updateUser($nom, $prenom, $pseudo, $mail, $id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
    $query = $bdd->prepare('
        UPDATE `users` 
        SET `nom`=?,
            `prenom`=?,
            `pseudo`=?,
            `mail`=?
        WHERE id=?
        ');
    $query->execute([$nom, $prenom, $pseudo, $mail, $id]);
    header('Location:/php/editProfil.php?ref=' . $id);die();
}


$update = updateUser($nom, $prenom, $pseudo, $mail, $id);

