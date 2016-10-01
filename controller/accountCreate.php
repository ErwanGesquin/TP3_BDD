<?php
/**
 * Created by PhpStorm.
 * User: erwan
 * Date: 28/09/16
 * Time: 18:50
 */

    $accountTit = $_POST['name'];
    $accoutType = $_POST['type'];
    $initSolde = $_POST['initSolde'];

$bdd = connectBdd('localhost', 'ensibank', 'utf8', 'root', 'root');


    echo getAccountNumber($bdd);