<?php
include 'bdd.php';

class clients {

    static function addClient($addClient){
        global $bdd;

        $date = new DateTime();

        $requeteAddClient = $bdd->prepare("INSERT INTO clients (nom,prenom,mail,tel,adresse,code_postal,date_creation) values(?,?,?,?,?,?,?)");
        if($requeteAddClient->execute(array($addClient->nom,$addClient->prenom,$addClient->mail,$addClient->telephone,$addClient->adresse,$addClient->code_postal,$date->format("d/m/Y")))){
            
            $client = new stdClass();

            $client->nom=$addClient->nom;
            $client->prenom=$addClient->prenom;

            return clients::chercherClient($client);

        }

        return 0;

    }

    static function chercherClient($client){
        global $bdd;
        $resultat=array();
        $tabComplementReq = array();

        if($client->prenom == ""){
            $complementReq = "nom = ?";
            $tabComplementReq = [$client->nom];
        }else{
            $complementReq = "nom = ? AND prenom = ?";
            $tabComplementReq = [$client->nom,$client->prenom];
        }

        $listeClients=$bdd->prepare("SELECT id_client, nom, prenom, tel, adresse FROM clients WHERE ".$complementReq."");
        if($listeClients->execute($tabComplementReq)){
            while ($listeClientsBDD = $listeClients->fetchObject()) {

                $clients = new stdClass();

                $clients->id = $listeClientsBDD->id_client;
                $clients->nom = strtoupper($listeClientsBDD->nom);
                $clients->prenom = ucfirst($listeClientsBDD->prenom);
                $clients->tel = $listeClientsBDD->tel;
                $clients->adresse = $listeClientsBDD->adresse;

                $resultat[]=$clients;
            }
        }
       
        return $resultat;
    }


    static function chercherUnClient($client){
        global $bdd;
        $resultat=array();

        $listeClients=$bdd->prepare("SELECT id_client, nom, prenom, tel, adresse, code_postal FROM clients WHERE id_client = ?");
        if($listeClients->execute(array($client))){
            $listeClientsBDD = $listeClients->fetchObject();

                $clients = new stdClass();

                $clients->id = $listeClientsBDD->id_client;
                $clients->nom = strtoupper($listeClientsBDD->nom);
                $clients->prenom = ucfirst($listeClientsBDD->prenom);
                $clients->tel = $listeClientsBDD->tel;
                $clients->adresse = $listeClientsBDD->adresse;
                $clients->code_postal = $listeClientsBDD->code_postal;


                $resultat[]=$clients;
            
        }
        
        return $resultat;
    }


    static function listeTypeReparation(){
        global $bdd;
        $resultat=array();

        $listeTypeRepa=$bdd->prepare("SELECT id, reparation, prix FROM type_reparation");
        if($listeTypeRepa->execute()){
            while($listeTypeRepaBDD = $listeTypeRepa->fetchObject()){

                $reparation = new stdClass();

                $reparation->id = $listeTypeRepaBDD->id;
                $reparation->reparation = $listeTypeRepaBDD->reparation;
                $reparation->prix = $listeTypeRepaBDD->prix;

                $resultat[]=$reparation;
            }
        }
        
        return $resultat;
    }


    static function addPec($pec){
        global $bdd;

        $date = new DateTime();

        $requeteAddPec = $bdd->prepare("INSERT INTO pec (type,id_client,marque,modele,elements_fournis,code_unlock,code_sim,imei,serial,infos_supp,type_reparation,prix,date_creation) values(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        if($requeteAddPec->execute(array($pec->type,$pec->id_client,$pec->marque,$pec->modele,$pec->elements,$pec->deverrouillage,$pec->sim,$pec->imei,$pec->num_serie,$pec->infos,$pec->reparation,$pec->prix,$date->format("d/m/Y")))){
        
        }

    }

}