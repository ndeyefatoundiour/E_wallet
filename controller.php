<?php
    require_once "services.php";

    function creerWallet() {
        global $wallets;
        $newWallet = saisirWallet();
        
        enregistreWallet($newWallet); 
        
        afficherWallet($wallets); 
    }

    function faireDepot() {
        $newDepot = saisirDepot();

        enregistreDepot($newDepot); 
    }

    function faireRetrait() {
        $newRetrait = saisirRetrait();

        enregistreRetrait($newRetrait); 
    }

    function listerTransaction() {
        global $transactions, $wallets;

        afficherTransaction($transactions, $wallets);
    }

   
    function saisirWallet(): array {
        $wallet = ['client' => '', 'telephone' => '', 'code' => '', 'solde' => ''];
        
        $wallet['client']    = trim(readline("Veuillez saisir un client : "));
        $wallet['telephone'] = trim(readline("Veuillez saisir un telephone : "));
        $wallet['code']      = trim(readline("Veuillez saisir un code : "));
        $wallet['solde']     = (int)readline("Veuillez saisir un solde : ");

        return $wallet;
    }

    function saisirDepot(): array {
        $leDepot = ['type' => 'depot', 'montant' => '', 'frais' => 0, 'indexClient' => -1, 'telephone' => ''];
        
        $leDepot['telephone'] = trim(readline("Veuillez saisir le numero de telephone : "));
        $leDepot['montant']   = (int)readline("Veuillez saisir le montant : ");
        
        return $leDepot;
    }

    function saisirRetrait(): array {

    $leRetrait = ['type' => 'retrait', 'montant' => '', 'frais' => 0, 'indexClient' => -1, 'telephone' => ''];

        $leRetrait['telephone'] = trim(readline("Veuillez saisir le numero de telephone : "));
        $leRetrait['montant']   = (int)readline("Veuillez saisir le montant : ");
        
        return $leRetrait;
    }

    function controller($choix): void {

        switch (trim($choix)) {

            case '1':
                creerWallet();
                break;

            case '2':
                faireDepot();
                break;

            case '3':
                faireRetrait();
                break;

            case '4':
                listerTransaction();
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
