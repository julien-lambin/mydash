<?php
session_start();

if(!isset($_SESSION["prenomNom"])){
    header("location:controllers/connexion.php");
    exit();
}elseif(isset($_SESSION["prenomNom"])){
    header("location:controllers/accueil.php");
    exit();
}