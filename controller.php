<?php

    function controller($choix) : void {
        switch ($choix) {
            case 1:
                echo "choix1";
                break;

            case 2:
                echo "choix2";
                break;

            case 3:
                echo "choix3";
                break;

            case 4:
                echo "choix4";
                break;

            case 0:
                echo "choix0";
                break;

            default:
                echo "choix indisponible";
                break;
        }
    }







?>