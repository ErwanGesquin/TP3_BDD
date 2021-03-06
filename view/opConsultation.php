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
                <h3>Consultation des opérations</h3>
            </div>
            <div class="row panel-body">

                <form class="form-horizontal" method="POST" action="../controller/opDisplaySelection.php">
                    <div class="form-group">
                        <label for="clientNameInput" class="col-sm-2 control-label">Consulter les opérations de : </label>
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
                    <p>ou</p>
                    <div class="form-group">
                        <label for="cardNumberInput" class="col-sm-2 control-label">Consulter les opérations de la carte n° :</label>
                        <div class="col-sm-4">
                            <select id="cardNumberInput" class="form-control" name="cardNumber">
                                <option>--</option>
                                <?php
                                $cardList = getCardList($bdd);
                                while ($row = $cardList->fetch()) {
                                    echo "<option value='" . $row['numCarte'] . "'>" . $row['numCarte'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dateDepInput" class="col-sm-2 control-label">Entre le :</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" id="dateDepInput" name="dateMin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dateArrInput" class="col-sm-2 control-label">et le</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" id="dateArrInput" name="dateMax">
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