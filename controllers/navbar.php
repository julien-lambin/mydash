<?php
require __DIR__ . '/../vendor/autoload.php';
require '../models/navbar.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

if(isset($_REQUEST["modeSombre"])){
   
    $modifDarkMode = new stdClass();

    $modifDarkMode->darkMode=$_REQUEST["modeSombre"];    

    $modifDarkMode->idUser=$_SESSION["idUser"];

    navbar::modifDarkMode($modifDarkMode);
}

echo $twig->render('navbar/navbar.html.twig', [
    'session' => $_SESSION
]);