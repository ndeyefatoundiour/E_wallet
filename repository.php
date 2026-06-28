<?php

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
        $wallets[]=$newWallet;
    }

    function afficherWallet(array $wallets):void{
        // global $wallets;
        // $GLOBALS['wallets'];
        for($index=0;$index<count($wallets);$index++){
           echo "Titulaire:". $wallets[$index]['client']."\n";
           echo "Telephone:". $wallets[$index]['telephone']."\n";
        }
    }

    

    function ajouterDepot(array $newDepot) {
        global $transactions;
        
        $transactions[]=$newDepot;

    }


    function ajouterRetrait(array $newRetrait) {
        global $transactions;
        

                $transactions[]=$newRetrait;
        
    }


    function afficherTransaction(array $transactions ,array $wallets):void{

        foreach ($transactions as $index => $transaction) {

            $type = $transaction['type'];

            echo "Type    : " . $transaction['type'] . "\n";

            echo "Montant : {$transaction['montant']} FCFA\n";
            
            $idClient = $transaction['indexClient'];
            
            $client = $wallets[$idClient];
            
            echo "Titulaire : {$client['client']}\n";
        }
    }

?>