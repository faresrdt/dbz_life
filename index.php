<?php
session_start();
/*$pdo = new PDO('mysql:host=localhost:8888;dbname=dbz', 'dbz', 'Sabrina95');*/
/*$pdo->exec('SET NAMES UTF8');*/
$bdd = new PDO('mysql:host=localhost;port=8889;dbname=blog;charset=utf8', 'root', 'root');

$query=$bdd->prepare('SELECT * FROM articles');
$query->execute();

$listeArticle=$query->fetchAll(PDO::FETCH_ASSOC);



$template = 'index';
include 'html/layout.phtml';
