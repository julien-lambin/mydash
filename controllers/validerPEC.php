<?php
header("Content-type: application/json; charset=utf-8");
require '../models/pec.php';

$response = "1";

$pecValider = new stdClass();

$date = new DateTime();

$pecValider->reparateur=$_POST["reparateur"];
$pecValider->date=$date->format("d/m/Y");
$pecValider->idPEC=$_POST["id_pec"];

pec::validerPEC($pecValider);

echo json_encode($response);
?>