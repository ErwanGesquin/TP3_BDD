<?php
/**
 * Created by PhpStorm.
 * User: erwan
 * Date: 28/09/16
 * Time: 18:50
 */

    include ('../controller/bdd.php');

    $civilite = $_POST['civilite'];
    $name = $_POST['name'];
    $firstName = $_POST['firstName'];
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];

    $bdd = connectBdd('localhost', 'ensibank', 'utf8', 'root', 'root');

    insertNewClient($bdd, $civilite, $name, $firstName, $address, $zipcode, $city);

