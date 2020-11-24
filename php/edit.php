<?php
session_start();


$ref = $_GET['ref'];

function oneArticle($ref)
{

    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');


    $query = $bdd->prepare('
        SELECT `titre`, 
               `sujet`, 
               `dateCreation`, 
               `description`, 
               `auteur`,
               `img`,
               `id`
        FROM `articles`
        WHERE id=?
        ');
    $query->execute([$ref]);

    $article = $query->fetch(PDO::FETCH_ASSOC);

    
    return $article;
}


$article = oneArticle($_GET['ref']);


$template = 'edit';
include '../html/layout.phtml';