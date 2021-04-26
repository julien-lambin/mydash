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


    static function detailsPEC($id){
        global $bdd;

        $detailsPEC=$bdd->prepare("SELECT pec.id_pec, pec.id_client, pec.type, pec.marque, pec.modele, pec.elements_fournis, pec.code_unlock, 
                                pec.code_sim, pec.imei, pec.serial, pec.infos_supp, pec.prix, pec.etat, pec.date_creation, type_reparation.reparation
                                FROM pec pec
                                LEFT JOIN type_reparation type_reparation ON type_reparation.id=pec.type_reparation
                                WHERE pec.id_pec = ? ");
        if($detailsPEC->execute(array($id))){
            $detailsPECBDD = $detailsPEC->fetchObject();

            $pec = new stdClass();

            $pec->idPec = $detailsPECBDD->id_pec;
            $pec->idClient = $detailsPECBDD->id_client;
            $pec->type = $detailsPECBDD->type;
            $pec->marque = $detailsPECBDD->marque;
            $pec->modele = $detailsPECBDD->modele;
            $pec->elementsFournis = str_replace(";", ", ", $detailsPECBDD->elements_fournis);
            $pec->codeUnlock = $detailsPECBDD->code_unlock;
            $pec->codeSim = $detailsPECBDD->code_sim;
            $pec->imei = $detailsPECBDD->imei;
            $pec->serial = $detailsPECBDD->serial;
            $pec->infoSupp = $detailsPECBDD->infos_supp;
            $pec->prix = $detailsPECBDD->prix;
            $pec->etat = $detailsPECBDD->etat;
            $pec->dateCreation = $detailsPECBDD->date_creation;
            $pec->reparation = $detailsPECBDD->reparation;
            
        }
       
        return $pec;
    }


    static function listeReparateurs(){
        global $bdd;
        $resultat=array();

        $listeReparateurs=$bdd->prepare("SELECT id_user, nom, prenom FROM users");
        if($listeReparateurs->execute()){
            while ($listeReparateursBDD = $listeReparateurs->fetchObject()) {

                $reparateur = new stdClass();

                $reparateur->idUser = $listeReparateursBDD->id_user;
                $reparateur->nom = strtoupper($listeReparateursBDD->nom);
                $reparateur->prenom = ucfirst(strtolower($listeReparateursBDD->prenom));

                $resultat[]=$reparateur;
            }
        }
       
        return $resultat;
    }


    static function validerPEC($pecValider){
        global $bdd;

        $requeteAddPec = $bdd->prepare("UPDATE pec SET etat = 1, reparateur = ?, date_fin = ? WHERE id_pec = ?");
        if($requeteAddPec->execute(array($pecValider->reparateur,$pecValider->date,$pecValider->idPEC))){
        
        }

    }


}