<?php

    function validationNumb (array $newWallet){
    $numero = $newWallet['telephone'];
    $code = $newWallet['code'];

    $cpt1 =  strlen($numero);
    $cpt2 = strlen($code);
    
        if($cpt1 == 9 && $cpt2 == 4){
        
            return 'valide';
        }
        return 'invalide';
    }

    function validationDebut(array $newWallet){

        $numero = $newWallet['telephone'];
        if($numero[0] !=='7' || ($numero[1] !== '0' && $numero[1] !== '1' && $numero[1] !== '5' && $numero[1] !== '6' && $numero[1] !== '7' && $numero[1] !== '8')){
            return 'invalide';
        }

        return 'valide';
    }

    function valideterObligatoir(array $newWallet){

        if( $newWallet['client']=='' || $newWallet['telephone']=='' || $newWallet['code'] == '' || $newWallet['solde'] ==''){
            return "invalide";
        }
        return "valide";
    }

    function validerSolde(array $newWallet){
        if($newWallet['solde'] < 0){
            return  "invalide";
        }
        return "valide";
    }

    function uniciterTel (array $wallets,array $newWallet){

        for ($index =0 ; $index < count($wallets); $index++){

            if($wallets[$index]['telephone'] == $newWallet['telephone']){

                return $index;
            }
        }  

        return "valide";
    }

    function uniciterCode (array $wallets,array $newWallet ){

        foreach ($wallets as $index => $w) {

            if($w['code'] == $newWallet['code']){

                return $index;
            }  
        }  
        return "valide";
    }

?>