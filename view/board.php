<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ensi Bank</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/header.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-2 panel panel-default">
            <div class="titleHeader row panel-heading">
                <img src="../img/ensi.png">
            </div>
            <div class="row panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation"><a href="../model/board.php">Tableau de bord</a></li>
                    <li role="presentation"><a href="../model/opConsultation.php">Consultation des opérations</a></li>
                    <li role="presentation"><a href="../model/clientCreation.php">Création client</a></li>
                    <li role="presentation"><a href="../model/accountOpenning.php">Ouverture compte</a></li>
                </ul>
            </div>
        </div>
        <div class="col-xs-10 panel panel-default">
            <div class="titleHeader row panel-heading">
                <img src="../img/ensi.png">
                <h3>Tableaux de bord</h3>
            </div>
            <div class="row panel-body">
                <?php
                    include('../controller/bdd.php');
                    $bdd = connectBdd('localhost', 'ensibank', 'utf8', 'root', 'root');
                    $nbOp = selectNbOperation($bdd);
                    $totalOp = selectTotalOperations($bdd);
                    $gabActivity = selectGabDatas($bdd);
                ?>

                <div class="row">
                    <div class="panel panel-default col-xs-2">
                        <div class="panel-heading">
                            Nombre d'opérations
                        </div>
                        <div class="panel-body">
                            <?php
                                echo $nbOp['nbOp'];
                            ?>
                        </div>
                    </div>
                    <div class="panel panel-default col-xs-2">
                        <div class="panel-heading">
                            Total des opérations
                        </div>
                        <div class="panel-body">
                            <?php
                                echo $totalOp['totalOp'] . " €";
                            ?>
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="panel panel-default col-xs-6">
                        <div class="panel-heading">
                            Activité des GAB
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <?php
                                while ($row = $gabActivity->fetch()) {
                                    ?>
                                    <tr>
                                        <th>Numéro du GAB</th>
                                        <th>Localisation</th>
                                        <th>Compte lié</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php
                                                echo $row['numGAB'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row['adresseGAB'] . " " . $row['CPGAB'] . " " . $row['villeGAB'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row['numCompte'];
                                            ?>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>
</body>
</html>