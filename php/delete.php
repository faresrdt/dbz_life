<?php
session_start();

$ref = $_GET['ref'];

function deleteArticle($ref)
{
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');    $query = $bdd->prepare('
        DELETE FROM `articles`
        WHERE id=?
        ');
    $query->execute([$ref]);
    header('Location:/Porte_Folio/DBZ-LIFE-RELOADED/php/admin.php');die();
}

$delete = deleteArticle($ref);


