<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="css/index.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/jquery-3.2.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <title>rien</title>

    </head>
    <body>
        <div>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Parc Automobile</a>
                    </div>
                </div>
            </nav>
            <div class="container">
                <form action="lib/traitement_log.php" method="POST">
                    <div class="form-group">
                        <label for="user"></label>
                        <input type="text" class="form-control" required="required" id="user" name="user" placeholder="Nom Utilisiteur">
                    </div>
                    <div class="form-group">
                        <label for="pass"></label>
                        <input type="password" class="form-control" required="required" id="pass" name="pass" placeholder="Password">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-danger btn-block">Se connecter</button>
                </form>
            </div>
        </div>
    </body>
</html>