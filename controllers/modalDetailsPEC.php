<?php
require __DIR__ . '/../vendor/autoload.php';
require '../models/pec.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

$id=$_REQUEST["id"];

$detailsPEC = pec::detailsPEC($id);

echo $twig->render('modalDetailsPEC.html.twig', [
    "detailsPEC" => $detailsPEC
]);