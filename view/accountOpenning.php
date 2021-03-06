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
    <?php
    include ('../controller/bdd.php');
    $bdd = connectBdd('localhost', 'ensibank', 'utf8', 'root', 'root');
    ?>
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
                <h3>Ouverture de comptes</h3>
            </div>
            <div class="row panel-body">
                <form class="form-horizontal" method="POST" action="../controller/accountCreate.php">
                    <div class="form-group">
                        <label for="clientNameInput" class="col-sm-2 control-label">Titulaire du compte</label>
                        <div class="col-sm-4">
                            <select id="clientNameInput" class="form-control" name="name"> <!-- ici sera rempli avec la liste des clients via repuête php -->
                                <option>--</option>
                                <?php
                                $clientList = getClientList($bdd);
                                while ($row = $clientList->fetch()) {
                                    echo "<option value='" .$row['numClient']. "'>" . $row['selClient'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="accountTypeInput" class="col-sm-2 control-label">Type de compte</label>
                        <div class="col-sm-4">
                            <select id="accountTypeInput" class="form-control" name="type">
                                <option value="0">Compte chèque</option>
                                <option value="1">Compte sur livret</option>
                                <option value="2">Plan épargne logement</option>
                                <option value="3">Codevi</option>
                                <option value="4">Compte de GAB</option>
                                <option value="5">Compte commercant</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="soldeInput" class="col-sm-2 control-label">Solde initial du compte</label>
                        <div class="col-sm-4">
                            <input required="required" type="number" step="0.01" class="form-control" id="soldeInput" placeholder="solde" name="initSolde">
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-default">OK</button>
                        <button type="reset" class="btn btn-default">Clear</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>