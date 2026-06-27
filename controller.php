<?php
    
    require "services.php";

    function controller($choix) : void {

        switch ($choix) {
            case '1':
                creerWallet();
            break;

            case '2':
                echo "choix2\n";
            break;

            case '3':
                echo "choix3\n";
            break;

            case '4':
                echo "choix4\n";
            break;

            case '0':
                echo "BYE BYE A LA PROCHAINE\n";
            break;

            default:
                echo "Choix invalide, veuillez réessayer\n";
            break;
        }
    }
?>