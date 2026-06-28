<?php

    require "repository.php";
    
    function validationNumb (string $telephone, string $code){

    $cpt1 =  strlen($telephone);
    $cpt2 = strlen($code);
    
        if($cpt1 == 9 && $cpt2 == 4){
        
            return 'valide';
        }
        return 'invalide';
    }

    function validationDebut(string $telephone ){

        if($telephone[0] !=='7' || ($telephone[1] !== '0' && $telephone[1] !== '1' && $telephone[1] !== '5' && $telephone[1] !== '6' && $telephone[1] !== '7' && $telephone[1] !== '8')){
            return 'invalide';
        }

        return 'valide';
    }

    function valideterObligatoir(string $telephone , string $code , string $nomClient , $solde){

        if( $telephone =='' || $code =='' || $nomClient == '' || $solde ==''){
            return "invalide";
        }
        return "valide";
    }

    function validerSolde(int $solde){

        if($solde < 0){
            return  "invalide";
        }
        return "valide";
    }

    function uniciterTel (array $wallets,string $telephone){

        for ($index =0 ; $index < count($wallets); $index++){

            if($wallets[$index]['telephone'] == $telephone){

                return $index;
            }
        }  

        return -1;
    }

    function uniciterCode (array $wallets,string $code ){

        foreach ($wallets as $index => $w) {

            if($w['code'] == $code){

                return $index;
            }  
        }  
        return "valide";
    }

    function validerMontant( int $montant) {
        
        if($montant ==='' || $montant <= 0){
            return "invalide";
        }
        return "valide";
    }

    function retraitSolde(array $wallets,int $montant ,$index , int $frais) {

        $walletRetrait = $wallets[$index];

        if ($walletRetrait['solde'] < $montant + $frais){
            
            return  "solde insufisant";
        }
        return "valide";
    }

?>