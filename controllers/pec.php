<?php
require __DIR__ . '/../vendor/autoload.php';
require '../models/pec.php';

session_start();
$_SESSION["page"] = "pec";

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

$pecEnCours = pec::pecEnCours();

echo $twig->render('pec.html.twig', [
    "session" => $_SESSION,
    "pecEnCours" => $pecEnCours
]);