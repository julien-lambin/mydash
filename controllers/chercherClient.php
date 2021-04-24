<?php
require __DIR__ . '/../vendor/autoload.php';
require '../models/clients.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

$client = new stdClass();

$client->nom=$_REQUEST["nom"];
$client->prenom=$_REQUEST["prenom"];

$listeClients = clients::chercherClient($client);

echo $twig->render('modalChercherClient.html.twig', [
    "listeClients" => $listeClients
]);