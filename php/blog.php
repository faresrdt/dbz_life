<?php
session_start();

function listeArticle()
{

    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');


    $query = $bdd->prepare('
        SELECT * 
        FROM `articles` 
        ORDER BY `dateCreation` DESC
        ');
    $query->execute();

    $article = $query->fetchAll(PDO::FETCH_ASSOC);

    return $article;
}

$liste = listeArticle();

$template = 'blog';
include '../html/layout.phtml';