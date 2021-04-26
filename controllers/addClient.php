<?php
header("Content-type: application/json; charset=utf-8");
require '../models/clients.php';

$response = "1";

$addClient = new stdClass();

$addClient->nom=$_POST["nom"];
$addClient->prenom=$_POST["prenom"];
$addClient->mail=$_POST["mail"];
$addClient->telephone=str_replace(' ', '', $_POST["telephone"]);
$addClient->adresse=$_POST["adresse"];
$addClient->code_postal=$_POST["code_postal"];

$retour = clients::addClient($addClient);
$retour = $retour[0]->id;

echo json_encode($retour);
?>