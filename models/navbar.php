<?php
include 'bdd.php';

class navbar {

    static function modifDarkMode($modifDarkMode){
        global $bdd;

        $requeteAddPec = $bdd->prepare("UPDATE users SET dark_mode = ? WHERE id_user = ?");
        if($requeteAddPec->execute(array($modifDarkMode->darkMode, $modifDarkMode->idUser))){
            $_SESSION["darkMode"] = $modifDarkMode->darkMode;
        }
        
    }

}