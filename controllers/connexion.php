<?php
require __DIR__ . '/../vendor/autoload.php';

session_start();
if(isset($_SESSION["prenomNom"])){
    header("location:accueil.php");
    exit();
}

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);


echo $twig->render('connexion.html.twig', [

]);