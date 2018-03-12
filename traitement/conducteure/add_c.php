<?php
session_start();
if (empty($_SESSION)){
    header ('Location: index.php');
}
include '../../lib/F_db.php';
include '../../partie/header_t.php';
include '../../lib/Traitement_Donne_U.php';
$pdo=null;

if (isset($_POST['nom']) && isset($_POST['pre']) && isset($_POST['dn']) && isset($_POST['adresse']) && isset($_POST['sf']) && isset($_POST['sexe'])&& isset($_POST['num_p'])&& isset($_POST['dp'])&& isset($_POST['wp'])&& isset($_POST['mv'])){
    $m=$_POST['mv'];
    if (preg_match('#^[0-9]{2}-[0-9]{3}-[0-9]{1,}$#',$m) && preg_match("/^([a-zA-Z'àâéèêôùûçÀÂÉÈÔÙÛÇ[:blank:]-]{1,30})$/",$_POST['nom'])&& preg_match("/^([a-zA-Z'àâéèêôùûçÀÂÉÈÔÙÛÇ[:blank:]-]{1,30})$/",$_POST['pre'])) {
        $daten = $_POST['dn'];
        $datem = $_POST['dp'];
        $sf = $_POST['sf'];
        $sexe = $_POST['sexe'];
        $nom = v_donne($_POST['nom']);
        $pre = v_donne($_POST['pre']);
        $add = v_donne($_POST['adresse']);
        $nump = v_donne($_POST['num_p']);
        $wp = v_donne($_POST['wp']);
        try {
            $pdo = inssertion($pdo, "INSERT INTO conducteur SET nom='$nom' ,prenom='$pre' ,date_n='$daten',adresse='$add',situation_familiale='$sf',genre='$sexe',num_p='$nump',annne_p='$datem',wilaya_p='$wp',matricule='$m'");
            echo "<div class='alert alert-success'>";
            echo "<strong>Success!</strong> Vous Avez Bien Ajouter : </div>";
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'><strong>Error!</strong> matricule introuvable : </div>";
        }

    }elseif ($_POST['mv']=="") {
        $daten=$_POST['dn'];
        $datem=$_POST['dp'];
        $sf=$_POST['sf'];
        $sexe=$_POST['sexe'];
        $nom=v_donne($_POST['nom']);
        $pre=v_donne($_POST['pre']);
        $add=v_donne($_POST['adresse']);
        $nump=v_donne($_POST['num_p']);
        $wp=v_donne($_POST['wp']);
        $m=$_POST['mv'];
        $pdo = inssertion($pdo, "INSERT INTO conducteur SET nom='$nom' ,prenom='$pre' ,date_n='$daten',adresse='$add',situation_familiale='$sf',genre='$sexe',num_p='$nump',annne_p='$datem',wilaya_p='$wp',matricule=NULL");
        echo "<div class='alert alert-success'>";
        echo "<strong>Success!</strong> Vous Avez Bien Ajouter Le Conducteur Sans Lui Affecter De Vehicule: </div>";
    }
    else
    {
        echo "<div class='alert alert-danger'>";
        echo "<strong>Error!</strong> donne incorecte : </div>";
    }
}
?>
<?php require "../../partie/footer.php";?>