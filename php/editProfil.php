<?php
session_start();


$ref = $_GET['ref'];

function user($ref)
{

    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');


    $query = $bdd->prepare('
        SELECT *
        FROM `users`
        WHERE id=?
        ');
    $query->execute([$ref]);

    $user = $query->fetch(PDO::FETCH_ASSOC);


    return $user;
}


$user = user($_GET['ref']);


$template = 'editProfil';
include '../html/layout.phtml';