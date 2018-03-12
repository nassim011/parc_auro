<?php
session_start();
if (empty($_SESSION)){
    header ('Location: index.php');
}
include '../../lib/F_db.php';
include '../../partie/header_t.php';
include '../../lib/Traitement_Donne_U.php';

$pdo=null;
$numold=$_SESSION['num_assurance'];
if (isset($_POST['num']) && isset($_POST['de']) && isset($_POST['dex']) && isset($_POST['nom']) && isset($_POST['ta']) && isset($_POST['prix'])&& isset($_POST['mv'])){
    if (preg_match('#^[0-9]{2}-[0-9]{3}-[0-9]{1,}$#',$_POST['mv'])&& $_POST['de']<$_POST['dex']){
        $m=$_POST['mv'];
        $datef=$_POST['de'];
        $datex=$_POST['dex'];
        $num=$_POST['num'];
        $ta=$_POST['ta'];
        $nom=v_donne($_POST['nom']);
        $prix=v_donne($_POST['prix']);
        try{
            $pdo=inssertion($pdo,"UPDATE assurance SET num_assurance='$num' ,date_effet='$datef' ,date_exp='$datex',nom_assurance='$nom',type_assurance='$ta',prix_assurance='$prix',matricule='$m' WHERE  num_assurance='$numold'");
            echo "<div class='alert alert-success'>";
            echo "<strong>Success!</strong> Vous Avez Bien Modifier La Assurance : </div>";
        }
        catch (PDOException $e){
            echo "<div class='alert alert-danger'><strong>Error!</strong> matricule introuvable : </div>";
            echo $e;
        }

    }else
    {
        echo "<div class='alert alert-danger'>";
        echo "<strong>Error!</strong> donne incorecte : </div>";
    }
}
?>
<?php require "../../partie/footer.php";?>