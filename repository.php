<?php

    require "validator.php";

    $wallets=[
        0=>['client'=>'Baila Wane','telephone'=>'771001010','code'=>'1234','solde'=>0],
        1=>['client'=>'Hawa Baila Wane','telephone'=>'782345678','code'=>'0000','solde'=>100000]
    ];

    function saisirWallet():array{
        $wallet=['client'=>'','telephone'=>'','code'=>0,'solde'=>0];
        
        $wallet['client'] = readline("Veuillez saisir un client :");
        $wallet['telephone'] = readline("Veuillez saisir un telephone :");
        $wallet['code'] = readline("Veuillez saisir un code :");
        $wallet['solde']= (int)readline("veuillez saisir un solde");

            return $wallet ;
    }

    function enregistreWallet(array $newWallet){
        global $wallets;
        
       if (validationNumb ( $newWallet ) == 'valide' && validationDebut ( $newWallet ) == 'valide' && valideterObligatoir ( $newWallet ) == 'valide' &&
            validerSolde ( $newWallet ) == 'valide' && uniciterTel ( $wallets, $newWallet ) == 'valide' && uniciterCode ( $wallets, $newWallet ) == 'valide' ){
                echo "\n    tres bien inscription reussi    \n";
                $wallets[]=$newWallet;
                
                return 'valide';
                
        }
        echo "\n     echec de l'insciption           \n";
        return "invalide";
    }


    function afficherWallet(array $wallets):void{
        // global $wallets;
        // $GLOBALS['wallets'];

        for($index=0;$index<count($wallets);$index++){
           echo "Titulaire:". $wallets[$index]['client']."\n";
           echo "Telephone:". $wallets[$index]['telephone']."\n";
        }

    }

    

?>