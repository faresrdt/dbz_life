<?php
session_start();

$ref = $_GET['ref'];

function deleteUser($ref)
{
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        $query = $bdd->prepare('
        DELETE FROM `users`
        WHERE id=?
        ');
    $query->execute([$ref]);
    // Détruit toutes les variables de session
    $_SESSION = array();

// Finalement, on détruit la session.
    session_destroy();

    header('Location:/Porte_Folio/DBZ-LIFE-RELOADED/index.php');die();
}

$delete = deleteUser($ref);


