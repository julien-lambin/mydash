<?php
include 'bdd.php';

class pec {

    static function pecEnCours(){
        global $bdd;
        $resultat=array();

        $listePecEnCours=$bdd->prepare("SELECT pec.id_pec, pec.id_client, pec.type, pec.marque, pec.modele, pec.elements_fournis, pec.code_unlock, 
                                pec.code_sim, pec.imei, pec.serial, pec.infos_supp, pec.prix, pec.etat, pec.date_creation, type_reparation.reparation
                                FROM pec pec
                                LEFT JOIN type_reparation type_reparation ON type_reparation.id=pec.type_reparation
                                WHERE pec.etat = 0 ");
        if($listePecEnCours->execute()){
            while ($listePecEnCoursBDD = $listePecEnCours->fetchObject()) {

                $pecEnCours = new stdClass();

                $pecEnCours->idPec = $listePecEnCoursBDD->id_pec;
                $pecEnCours->idClient = $listePecEnCoursBDD->id_client;
                $pecEnCours->type = $listePecEnCoursBDD->type;
                $pecEnCours->marque = $listePecEnCoursBDD->marque;
                $pecEnCours->modele = $listePecEnCoursBDD->modele;
                $pecEnCours->elementsFournis = $listePecEnCoursBDD->elements_fournis;
                $pecEnCours->codeUnlock = $listePecEnCoursBDD->code_unlock;
                $pecEnCours->codeSim = $listePecEnCoursBDD->code_sim;
                $pecEnCours->imei = $listePecEnCoursBDD->imei;
                $pecEnCours->serial = $listePecEnCoursBDD->serial;
                $pecEnCours->infoSupp = $listePecEnCoursBDD->infos_supp;
                $pecEnCours->prix = $listePecEnCoursBDD->prix;
                $pecEnCours->etat = $listePecEnCoursBDD->etat;
                $pecEnCours->dateCreation = $listePecEnCoursBDD->date_creation;
                $pecEnCours->reparation = $listePecEnCoursBDD->reparation;

                $resultat[]=$pecEnCours;
            }
        }
       
        return $resultat;
    }

}