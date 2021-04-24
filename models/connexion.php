<?php
header("Content-type: application/json; charset=utf-8");
include 'bdd.php';

session_start();

global $bdd;
$response = "1";
//Vérifie la que tous les champs soit bien rempli
if(isset($_POST["identifiant"]) && !empty($_POST["identifiant"]) && isset($_POST["password"]) && !empty($_POST["password"])){
    
    //Récupération des données et suppréssion des caractères spéciaux
    $identifiant=trim(htmlspecialchars($_POST["identifiant"]));
    $password=trim(htmlspecialchars($_POST["password"]));
    
    //Récupération des informations de l'utilisateur connecté
    $connexion=$bdd->prepare("SELECT id_user, prenom, nom, mail, password, droits, dark_mode from users WHERE identifiant=? limit 1");
    $connexion->execute(array($identifiant));
    
    if($connexionBDD = $connexion->fetchObject()){
        //Vérication du mot de passe
        if(password_verify($password, $connexionBDD->password)){
            $_SESSION["prenomNom"]=ucfirst(strtolower($connexionBDD->prenom))." ".strtoupper($connexionBDD->nom);
            $_SESSION["autoriser"]="oui";
            $_SESSION["mail"]=$connexionBDD->mail;
            $_SESSION["idUser"]=$connexionBDD->id_user;
            $_SESSION["darkMode"]=$connexionBDD->dark_mode;
            
            $_SESSION["erreurConnexion"] = "";

        }else{//Alerte
            $_SESSION["erreurConnexion"] = "Adresse mail ou mot de passe incorrect, veuillez réessayer.";
            header('Location:../controllers/connexion.php');
        }
    }
}else{//Alerte si tous les champs ne sont pas remplie
    
    $_SESSION["erreurConnexion"] = "Veuillez renseigner tous les champs.";
    header('Location:../controllers/connexion.php');
}  

echo json_encode($response);
?>