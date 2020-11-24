<?php
session_start();



$ref = $_SESSION['id'];

function myAccount($ref)
{

    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');


    $query = $bdd->prepare('
        SELECT * 
        FROM `users`
        WHERE id=?
        ');
    $query->execute([$ref]);

    $user = $query->fetch(PDO::FETCH_ASSOC);
    var_dump($user);
    return $user;
}

$user = myAccount($ref);

$template = 'myaccount';
include '../html/layout.phtml';