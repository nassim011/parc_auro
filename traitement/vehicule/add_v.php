<?php
session_start();
if (empty($_SESSION)){
    header ('Location: index.php');
}
include '../../lib/F_db.php';
include '../../partie/header_t.php';
include '../../lib/Traitement_Donne_U.php';

$pdo=null;

if (isset($_POST['matriculem']) && isset($_POST['datem']) && isset($_POST['wilayam']) && isset($_POST['Marquem']) && isset($_POST['Modelm']) && isset($_POST['Couleurm']) ){
    $m=$_POST['matriculem'];
    if (preg_match('#^[0-9]{2}-[0-9]{3}-[0-9]{1,}$#',$m)){
        $date=$_POST['datem'];
        $wi=v_donne($_POST['wilayam']);
        $ma=v_donne($_POST['Marquem']);
        $mo=v_donne($_POST['Modelm']);
        $c=v_donne($_POST['Couleurm']);
        $verifwilaya= preg_replace('#^([0-9]{2})-[0-9]{3}-[0-9]{1,}$#', '$1', $m);
        if ($verifwilaya==$wi){
            try {
                $pdo = inssertion($pdo, "INSERT INTO vehicule SET matricule='$m' ,mise_circulation='$date' ,wilaya_m='$wi',marque='$ma',modele='$mo',couleur='$c'");
                echo "<div class='alert alert-success'>";
                echo "<strong>Success!</strong> Vous Avez Bien Ajouter : </div>";
            }catch(PDOException $e)
            {
                echo "<div class='alert alert-danger'>";
                echo "<strong>Error!</strong> Wilaya du Matricule deja ajoute  : </div>";
            }
        }
        else{
            echo "<div class='alert alert-danger'>";
            echo "<strong>Error!</strong> Wilaya different du Matricule Ou Matricule Incorecte  : </div>";
        }

    }else
    {
        echo "<div class='alert alert-danger'>";
        echo "<strong>Error!</strong> donne incorecte : </div>";
    }
}
?>
<?php require "../../partie/footer.php";?>