<?php
require __DIR__ . '/../vendor/autoload.php';

session_start();
$_SESSION["page"] = "fiche_client";

include "./navbar.php";
include "./sidebar.php";

if(!isset($_SESSION["prenomNom"])){
    header("location:connexion.php");
    exit();
}

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

echo $twig->render('fiche_client.html.twig', [
    "session" => $_SESSION
]);