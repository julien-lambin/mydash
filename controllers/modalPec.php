<?php
require __DIR__ . '/../vendor/autoload.php';
require '../models/clients.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

$id=$_REQUEST["id"];

$client = clients::chercherUnClient($id);
$listeReparation = clients::listeTypeReparation();

echo $twig->render('modalPec.html.twig', [
    "id_client" => $id,
    "client" => $client,
    "listeReparation" => $listeReparation,
]);