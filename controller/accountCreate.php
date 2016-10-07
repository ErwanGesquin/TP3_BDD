<?php
/**
 * Created by PhpStorm.
 * User: erwan
 * Date: 28/09/16
 * Time: 18:50
 */

    include ('../controller/bdd.php');

    $accountTit = $_POST['name'];
    $accountType = $_POST['type'];
    $initSolde = $_POST['initSolde'];
    $bdd = connectBdd('localhost', 'ensibank', 'utf8', 'root', 'root');

    insertNewAccount($bdd, $accountType, $initSolde);
    $lastAccount = getAccountNumber($bdd);

    insertClientAccount($bdd, $accountTit, $lastAccount['lastAccount']);

    header('Location: ../model/accountOpenning.php');