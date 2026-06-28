<?php

    namespace App\Repository;

    $wallets=[
        0=>['client'=>'Baila Wane','telephone'=>'771001010','code'=>'1234','solde'=>0],
        1=>['client'=>'Hawa Baila Wane','telephone'=>'782345678','code'=>'0000','solde'=>100000]
    ];

    $transactions=[
        0=>['type'=>'depot','montant'=>1000,'frais'=>0,'indexClient'=>0,],
        1=>['type'=>'retrait','montant'=>-5000,'frais'=>200,'indexClient'=>0,]
    ];


    function ajouterWallet(array $newWallet){
        global $wallets;

        array_push($wallets, $newWallet);
    }

    function afficherWallet(array $wallets): void {
        echo "\n  LISTE DES PORTEFEUILLES  \n";

        array_walk($wallets, function($wallet) {
            echo "Titulaire:" . $wallet['client'] . "\n";
            echo "Telephone:" . $wallet['telephone'] . "\n";
            
        });
    }


    function ajouterDepot(array $newDepot) {
        global $transactions;
        
        array_push($transactions, $newDepot);
    }


    function ajouterRetrait(array $newRetrait) {
        global $transactions;
        
        array_push($transactions, $newRetrait);
    }


    function afficherTransaction(array $transactions, array $wallets): void {
        if (empty($transactions)) {
            echo "Aucune transaction enregistrée.\n";
            return;
        }

        echo "\n  HISTORIQUE DES TRANSACTIONS  \n";

        array_walk($transactions, function($transaction) use ($wallets) {
            echo "Type    : " . $transaction['type'] . "\n";
            echo "Montant : {$transaction['montant']} FCFA\n";
            
            $idClient = $transaction['indexClient'];
            $client = $wallets[$idClient];
            
            echo "Titulaire : {$client['client']}\n";
            
        });
    }

?>