<?php
    require "repository.php";

    function creerWallet(){
        global $wallets;
        $newWallet = saisirWallet();
        enregistreWallet($newWallet);
        afficherWallet( $wallets);
    }

   
?>