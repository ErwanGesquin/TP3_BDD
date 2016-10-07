<?php
/**
 * Created by PhpStorm.
 * User: erwan
 * Date: 28/09/16
 * Time: 18:49
 */

    $opTitulaire = $_POST['name'];
    $cardNumber = $_POST['cardNumber'];
    $dateMin = $_POST['dateMin'];
    $dateMax = $_POST['dateMax'];

    echo $opTitulaire;
    var_dump($opTitulaire);
    echo $cardNumber;

    include ('../controller/bdd.php');
    $bdd = connectBdd('localhost', 'ensibank', 'utf8', 'root', 'root');

    if($opTitulaire != "--"){
        echo "toto";
        $oprations = getOperationsByClient($bdd, $opTitulaire, $dateMax, $dateMin);
        while ($row = $oprations->fetch()) {
            echo $row;
        }
    }
