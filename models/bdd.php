<?php
    //session_start();
    //Ouverture de la connexion avec la base de données
    try
    {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=mydash', 'root', '', $pdo_options);
        $bdd->exec("SET CHARACTER SET utf8");
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

?>