<?php
/**
 * Created by PhpStorm.
 * User: erwan
 * Date: 28/09/16
 * Time: 18:46
 */

function connectBdd($host, $dbName, $charset, $password, $user){
    try{
        $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbName . ';charset=' . $charset, $user, $password);
        return $bdd;
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
}

function fetchDatas($result){
    $fetchedDatas = $result->fetch();
    return $fetchedDatas;
}

//Functions création nouveau client
function insertNewClient($bdd, $cliCivilite, $cliName, $cliFrstName, $cliAddress, $cliCP, $cliCity){

    try{
        $req = $bdd->prepare('INSERT INTO client(civClient, nomClient, prenomClient, adresseClient, CPClient, villeClient) VALUES(:civClient, :nomClient, :prenomClient, :adresseClient, :CPClient, :villeClient)');

        $req->execute(array(
            'civClient' => $cliCivilite,
            'nomClient' => $cliName,
            'prenomClient' => $cliFrstName,
            'adresseClient' => $cliAddress,
            'CPClient' => $cliCP,
            'villeClient' => $cliCity
        ));

    }catch(Exception $e){
        die('Erreur : ' . $e->getMeessage());
    }

}

//Functions création nouveau compte
function insertNewAccount($bdd, $accountType, $solde){
    try{
        $req = $bdd->prepare('INSERT INTO compte(typeCompte, soldeCompte) VALUES(:typeCompte, :soldeCompte)');

        $req->execute(array(
            'typeCompte' => $accountType,
            'soldeComte' => $solde
        ));
    }catch(Exception $e){
        die('Erreur : ' . $e->getMeessage());
    }
}

function getAccountNumber($bdd){
    try{
        $req = $bdd->prepare('SELECT MAX(numCompte) FROM compte');

        $res = $req->execute();

        return fetchDatas($res);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMeessage());
    }
}




//Requètes tableau de bord
function selectNbOperation(){}
function selectTotalOperations(){}
function selectGabDatas(){}
function selectCommercantsDatas(){}

//Requètes pour l'affichage de operations