<?php
session_start();
if (empty($_SESSION)){
    header ('Location: index.php');
}
include '../../lib/F_db.php';
include '../../partie/header_t.php';
include '../../lib/Traitement_Donne_U.php';

$pdo=null;
$numold=$_SESSION['num_controle'];
if (isset($_POST['num']) && isset($_POST['nom']) && isset($_POST['de']) && isset($_POST['dure']) && isset($_POST['obss']) && isset($_POST['mv'])){
    if (preg_match('#^[0-9]{2}-[0-9]{3}-[0-9]{1,}$#',$_POST['mv']) && $_POST['de']<$_POST['dure']){
        $m=$_POST['mv'];
        $datef=$_POST['de'];
        $datex=$_POST['dure'];
        $obss=v_donne($_POST['obss']);
        $nom=v_donne($_POST['nom']);
        $num=v_donne($_POST['num']);
        try{
            $pdo=inssertion($pdo,"INSERT INTO controle SET num_controle='$num' ,organisme='$nom',date_effet='$datef' ,duree='$datex',observations='$obss',matricule='$m'");
            echo "<div class='alert alert-success'>";
            echo "<strong>Success!</strong> Vous Avez Bien Ajouter La controle : </div>";
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