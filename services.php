<?php
    require_once "validator.php";
    

    function enregistreWallet(array $newWallet) {
        global $wallets;
        
        $telephone = $newWallet['telephone'];
        $code      = $newWallet['code'];
        $nomClient = $newWallet['client'];
        $solde     = $newWallet['solde'];
        
        if (
            validationNumb($telephone, $code) == 'valide' && 
            validationDebut($telephone) == 'valide' && 
            valideterObligatoir($telephone, $code, $nomClient, $solde) == 'valide' &&
            validerSolde($solde) == 'valide' && 
            uniciterTel($wallets, $telephone) == -1 && 
            uniciterCode($wallets, $code) == 'valide'
        ) {
            echo "\n    tres bien inscription reussi    \n";
            
            ajouterWallet($newWallet); 
            return 'valide';
        }
        
        echo "\n     echec de l'insciption           \n";
        return "invalide";
    }


    function enregistreDepot(array $newDepot) {
        global $wallets;

        $telephone = $newDepot['telephone'];
        $montant   = $newDepot['montant'];

        $indexClient = uniciterTel($wallets, $telephone);

        if ($indexClient !== -1 && validerMontant($montant) == 'valide') {

        $newDepot['indexClient'] = $indexClient;

            $wallets[$indexClient]['solde'] += $montant;

            echo "\n    tres bien depot reussi    \n";
            
            ajouterDepot($newDepot);
            return "valide";
        }

        echo "depot echoue : numero introuvable ou montant incorrect\n";
        return "invalide";
    }

    
    function enregistreRetrait(array $newRetrait) {
        global $wallets;

        lesFrais($newRetrait);

        $telephone = $newRetrait['telephone'];
        $montant   = $newRetrait['montant'];
        $frais     = $newRetrait['frais'];

        $indexClient = uniciterTel($wallets, $telephone);

        if (
            $indexClient !== -1 && 
            validerMontant($montant) == 'valide' && 
            retraitSolde($wallets, $montant, $indexClient, $frais) == 'valide'
        ) {
            $newRetrait['indexClient'] = $indexClient;

            $wallets[$indexClient]['solde'] -= ($montant + $frais);

            echo "\n    tres bien retrait reussi    \n";
            
            ajouterRetrait($newRetrait); 
            return 'valide';
        }

        echo "retrait echoue : solde insuffisant ou numero introuvable\n";
        return "invalide";
    }


    function lesFrais(array &$newRetrait) {

        if ($newRetrait['montant'] <= 10000) {

            $newRetrait['frais'] = 200;

            return $newRetrait['frais'];

        } elseif ($newRetrait['montant'] >= 10001 && $newRetrait['montant'] <= 100000) {

            $newRetrait['frais'] = 5000;

            return $newRetrait['frais'];

        } elseif ($newRetrait['montant'] >= 100001) {

            $newRetrait['frais'] = $newRetrait['montant'] / 100;

            return $newRetrait['frais'];

        } else {

            $newRetrait['frais'] = 5000;
            
            return $newRetrait['frais'];
        }
    }
?>
