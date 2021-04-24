<?php
require("../../plugins/fpdf/fpdf.php");
require '../../models/clients.php';

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

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

$infoClient = clients::chercherUnClient($pec->id_client);
$infoClient = $infoClient[0];

$date = new DateTime();
$date = $date->format('d/m/Y');

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//_____________________INFO SOCIETE________________________

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,utf8_decode('Société'),0,0);
$pdf->Cell(59	,5,'LOGO',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'Adresse, ville, cpde postale',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,utf8_decode('Tél Site Web'),0,0);
$pdf->Cell(25	,5,'',0,1);//end of line

$pdf->Cell(189	,10,'',0,1);//end of line

//_____________________NUM FACTURE________________________

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',20);
$pdf->SetTextColor(255,255,255);

$pdf->setFillColor(126,151,173); 
$pdf->Cell(130,10,'Facture',0,0,'L',1); 
$pdf->Cell(59,10,$date,0,1,'L',1); 

$pdf->Cell(189	,10,'',0,1);//end of line

//_____________________INFO CLIENT_____________________

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);

$pdf->Cell(50, 10, 'FACTURER A', 'B', 0, 'B');
$pdf->Cell(50, 10, 'EXPEDIER A', 'B', 0, 'B');
$pdf->Cell(89, 10, 'INSTRUCTIONS', 'B', 1, 'B');

$pdf->Cell(50, 10, $infoClient->nom.' '.$infoClient->prenom, 0, 0);
$pdf->Cell(50, 10, 'Identique au destinataire', 0, 0);
$pdf->Cell(89, 10, utf8_decode('Instructions supplémentaires'), 0, 1);

$pdf->Cell(50, 0, $infoClient->adresse, 0, 1);

$pdf->Cell(50, 10, $infoClient->code_postal, 0, 1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(25 ,5,utf8_decode('Quantité'),1,0);
$pdf->Cell(114 ,5,'Description',1,0);
$pdf->Cell(30 ,5,'Prix Unitaire',1,0);
$pdf->Cell(20 ,5,'Total',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(25 ,5,'1',1,0);
$pdf->Cell(114 ,5,$pec->marque.' '.$pec->modele,1,0);
$pdf->Cell(30 ,5,$pec->prix,1,0);
$pdf->Cell(20 ,5,$pec->prix,1,1,'R');//end of line

$pdf->Cell(25 ,5,'',1,0);
$pdf->Cell(114 ,5,'',1,0);
$pdf->Cell(30 ,5,'-',1,0);
$pdf->Cell(20 ,5,'',1,1,'R');//end of line

$pdf->Cell(25 ,5,'',1,0);
$pdf->Cell(114 ,5,'',1,0);
$pdf->Cell(30 ,5,'-',1,0);
$pdf->Cell(20 ,5,'',1,1,'R');//end of line

$pdf->Cell(25 ,5,'',1,0);
$pdf->Cell(114 ,5,'',1,0);
$pdf->Cell(30 ,5,'-',1,0);
$pdf->Cell(20 ,5,'',1,1,'R');//end of line

//summary

$pdf->SetFont('Arial','',10);

$pdf->Cell(100	,8,'',0,0);
$pdf->Cell(39	,8,'SOUS-TOTALE', 'B', 0, 'B');
$pdf->Cell(50	,8,'','B', 1, 'R');//end of line

$pdf->Cell(100	,8,'',0,0);
$pdf->Cell(39	,8,'TAXES VENTES', 'B', 0, 'B');
$pdf->Cell(50	,8,'TVA 20%','B', 1, 'R');//end of line

$pdf->Cell(100	,8,'',0,0);
$pdf->Cell(39	,8,'PRIX TTC', 'B', 0, 'B');
$pdf->Cell(50	,8,'','B', 1, 'R');//end of line

$pdf->Cell(100	,8,'',0,0);
$pdf->Cell(39	,8,'ECHEANCE PAIMENTE', 'B', 0, 'B');
$pdf->Cell(50	,8,'DD/MM/YYYY','B', 1, 'R');//end of line

$pdf->Output('I');
?>