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
            'soldeCompte' => $solde
        ));
    }catch(Exception $e){
        die('Erreur : ' . $e->getMeessage());
    }
}

function getAccountNumber($bdd){
    try{
        $req = $bdd->query('SELECT MAX(numCompte) as lastAccount FROM compte');
        return fetchDatas($req);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMeessage());
    }
}

function insertClientAccount($bdd, $client, $numAccount){
    $req = $bdd->prepare('INSERT INTO possedecompte(numClient, numCompte) VALUES (:numClient, :numCompte)');

    $req->execute(array(
        'numClient' => $client,
        'numCompte' => $numAccount
    ));
}


//Requètes tableau de bord
function selectNbOperation($bdd){
    $req = $bdd->query('SELECT COUNT(numOperation) as nbOp FROM operation');
    return fetchDatas($req);
}
function selectTotalOperations($bdd){
    $req = $bdd->query('SELECT SUM(montant) as totalOp FROM operation');
    return fetchDatas($req);
}
function selectGabDatas($bdd){
    $data = $bdd->query('SELECT * FROM gab');
    return $data;
}



//Requètes pour l'affichage de operations
function getClientList($bdd){
    $data = $bdd->query('SELECT numClient, CONCAT(civClient, " ", nomClient, " ", prenomClient) as selClient FROM client');
    return $data;
}

function getCardList($bdd){
    $data = $bdd->query('SELECT numCarte FROM carte');
    return $data;
}

function getOperationsByClient($bdd, $opTitulaire, $dateMax, $dateMin){
    $data = $bdd->query('SELECT o.* FROM operation o JOIN compte co ON co.numCompte = o.numCompte
                                                   JOIN posedecompte pc ON pc.numCompte = co.numCompte
                                                   JOIN client c ON c.numClient = pc.numClient
                                                   WHERE dateOperation < ' . $dateMax . ' && dateOperation > ' . $dateMin);
    return $data;
}