<?php
session_start();
if (empty($_SESSION)){
header ('Location: index.php');
}
require '../lib/F_db.php';
$pdo=null;
$date_actu=date('Y-m-d');
$control=rechrcheall(getPDO($pdo),"Select duree from controle WHERE duree=$date_actu");
if($control!=false){
    foreach ($control as $value) {
        $val=$value['matricule'];
        $inser=inssertion(getPDO($pdo),"UPDATE controle SET matricule=NULL WHERE  matricule=$val");
    }
}
$pdo=null;
$assurance=rechrcheall(getPDO($pdo),"Select duree from controle WHERE duree=$date_actu");
?>
<!DOCTYPE html>
<html>
   <head>
     <meta charset="utf-8">
     <link href="../css/index.css" rel="stylesheet">
     <link href="../css/bootstrap.min.css" rel="stylesheet">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="../js/jquery-3.2.1.js"></script>
     <script src="../js/bootstrap.min.js"></script>
     <title>Parc Auto</title>
   </head>

   <body>
     <nav class="navbar navbar-inverse" >
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Parc Automobile</a>
           </div>
           <ul class="tabs nav navbar-nav">
            <li><a href="../traitement/vehicule/vehicul.php">Véhicules</a></li>
            <li><a href="../traitement/conducteure/conducteur.php">Conducteurs</a></li>
            <li><a href="../traitement/assurance/assurance.php">Assurance</a></li>
            <li><a href="../traitement/controle/controle.php">Contrôle Technique</a></li>
            <li><a href="../traitement/diagnostique/diagnostique.php">Diagnostique</a></li>
            <li><a href="../traitement/rapport/rapport.php">Rapport</a></li>
           </ul>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="../lib/deconnexion.php"><span class="glyphicon glyphicon-user"></span> Deconnexion</a></li>
           </ul>
         </div>
      </nav>
     <div class="h1 alert-info">
      <h1>Home page</h1>
     </div>
   </body>
</html>

    