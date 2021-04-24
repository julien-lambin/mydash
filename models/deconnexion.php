<?php
   session_start();

   //Destruction de la session et redirection
   session_destroy();
   header("location: ../controllers/connexion.php");
?>