<?php
session_start();
if (empty($_SESSION)){
    header ('Location: index.php');
}
include '../../lib/F_db.php';
include '../../partie/header_t.php';
include '../../lib/Traitement_Donne_U.php';
$pdo=null;

if (isset($_POST['num']) && isset($_POST['de']) && isset($_POST['dex']) && isset($_POST['nom']) && isset($_POST['ta']) && isset($_POST['prix'])&& isset($_POST['mv'])){
    $m=$_POST['mv'];
    if (preg_match('#^[0-9]{2}-[0-9]{3}-[0-9]{1,}$#',$m) && $_POST['de']<$_POST['dex']){
        $datef=$_POST['de'];
        $datex=$_POST['dex'];
        $num=$_POST['num'];
        $ta=$_POST['ta'];
        $nom=v_donne($_POST['nom']);
        $prix=v_donne($_POST['prix']);
        try{
            $pdo=inssertion($pdo,"INSERT INTO assurance SET num_assurance='$num' ,date_effet='$datef' ,date_exp='$datex',nom_assurance='$nom',type_assurance='$ta',prix_assurance='$prix',matricule='$m'");
            echo "<div class='alert alert-success'>";
            echo "<strong>Success!</strong> Vous Avez Bien Ajouter : </div>";
        }
        catch(PDOException $e) {
            echo "<div class='alert alert-danger'><strong>Error!</strong> matricule introuvable : </div>";
        }

    }else
    {
        echo "<div class='alert alert-danger'>";
        echo "<strong>Error!</strong> donne incorecte : </div>";
    }
}
?>
<?php require "../../partie/footer.php";?>