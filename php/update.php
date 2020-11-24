<?php
session_start();

$titre = $_POST['titre'];
$img = $_POST['img'];
$sujet = $_POST['sujet'];
$description = $_POST['description'];
$auteur = $_POST['auteur'];
$id = $_POST['id'];


function updateArticle($titre, $img, $sujet, $description, $auteur, $id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
    $query = $bdd->prepare('
        UPDATE `articles` 
        SET `titre`=?,
            `sujet`=?,
            `description`=?,
            `auteur`=?,
            `img`=?
        WHERE id=?
        ');
    $query->execute([$titre, $sujet, $description, $auteur, $img, $id]);
    header('Location:/php/edit.php?ref=' . $id);die();
}


$update = updateArticle($titre, $img, $sujet, $description, $auteur, $id);

