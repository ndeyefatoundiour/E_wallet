<?php
    require "controller.php";

    function afficherMenu() : void {
        echo "\n   Menu Distributeur   \n";
        echo "\n1 - Créer Wallet\n";
        echo "\n2 - Faire Dépôt\n";
        echo "\n3 - Faire Retrait\n";
        echo "\n4 - Lister les Transactions\n";
        echo "\n0 - Quitter\n";
    }

    $choix=-1;

    do {
        afficherMenu();

        $choix = readline("donnez votre choix :");

        controller($choix);

    } while ($choix != '0');


?>