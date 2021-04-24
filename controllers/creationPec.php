<?php
header("Content-type: application/json; charset=utf-8");
require '../models/clients.php';

$response = "1";

$pec = new stdClass();

$pec->type=$_POST["type"];
$pec->id_client=$_POST["id_client"];
$pec->marque=$_POST["marque"];
$pec->modele=$_POST["modele"];

$pec->elements = "";

if($_POST["autre_elements"] != ""){
    foreach($_POST["elements_fournis"] as $elements){
        if($elements != "999999"){
            $pec->elements .= ";".$elements;
        }
    }
    $pec->elements .= ";".$_POST["autre_elements"];
    $pec->elements = substr($pec->elements,1);

}else{
    foreach($_POST["elements_fournis"] as $elements){
        if($elements != "999999"){
            $pec->elements .= ";".$elements;
        }
    }
    $pec->elements = substr($pec->elements,1);
}

if($_POST["autre_reparation"] != ""){
    $pec->reparation = $_POST["autre_reparation"];
}else{
    $pec->reparation = $_POST["reparation"];
}

$pec->prix=$_POST["prix"];
$pec->deverrouillage=$_POST["deverrouillage"];
$pec->sim=$_POST["sim"];
$pec->imei=$_POST["imei"];
$pec->num_serie=$_POST["num_serie"];
$pec->infos=$_POST["infos"];

clients::addPec($pec);

echo json_encode($response);
?>