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
                <h3>Création de clients</h3>
            </div>
            <div class="row panel-body">
                <form class="form-horizontal" method="POST" action="../controller/clientCreate.php">
                    <div class="form-group">
                        <label for="genderInput" class="col-sm-2 control-label">Sexe</label>
                        <div class="col-sm-4">
                            <select id="genderInput" class="form-control" name="civilite">
                                <option>M</option>
                                <option>Mme</option>
                                <option>Mlle</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nameInput" class="col-sm-2 control-label" >Nom</label>
                        <div class="col-sm-4">
                            <input required="required" type="text" class="form-control" id="nameInput" placeholder="Nom" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstNameInput" class="col-sm-2 control-label">Prénom</label>
                        <div class="col-sm-4">
                            <input required="required" type="text" class="form-control" id="firstNameInput" placeholder="Prénom" name="firstName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="addressInput" class="col-sm-2 control-label">Adresse</label>
                        <div class="col-sm-4">
                            <input required="required" type="text" class="form-control" id="addressInput" placeholder="Adresse" name="address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cpInput" class="col-sm-2 control-label">Code postal</label>
                        <div class="col-sm-4">
                            <input required="required" type="number" class="form-control" id="cpInput" placeholder="CP" name="zipcode">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cityInput" class="col-sm-2 control-label">Ville</label>
                        <div class="col-sm-4">
                            <input required="required" type="text" class="form-control" id="cityInput" placeholder="ville" name="city">
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