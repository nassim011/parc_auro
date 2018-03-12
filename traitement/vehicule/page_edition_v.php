<?php
session_start();
if (empty($_SESSION)){
    header ('Location: index.php');
}
include '../../lib/F_db.php';
include '../../partie/header_t.php';
include '../../lib/Traitement_Donne_U.php';

$m=$_POST['edit'];
$pdo=null;
$_SESSION['edition']=$m;
$pdo=rechrche($pdo,"SELECT * FROM vehicule WHERE matricule='$m'");

?>
<div class="container">
    <div class="container-fluid">
        <form action="edition_v.php" method="POST">
            <div class="form-group">
                <label for="matricule">Matricule</label>
                <input type="text" class="form-control " id="matriculem" name="matriculem" placeholder="" value="<?=$pdo['matricule'];?>" required>
            </div>
            <div class="form-group">
                <label for="date">Mise En Circulation</label>
                <input type="date" class="form-control is-valid" id="datem" name="datem" placeholder="" value="<?=$pdo['mise_circulation'];?>" required>
            </div>
            <div class="form-group">
                <label for="wilaya">Wilaya Du Matricule</label>
                <input type="text" class="form-control is-invalid" id="wilayam" name="wilayam" value="<?=$pdo['wilaya_m'];?>" required>
            </div>
            <div class="form-group">
                <label for="Marque">Marque</label>
                <input type="text" class="form-control is-invalid" id="Marquem" name="Marquem" value="<?=$pdo['marque'];?>" required>
            </div>
            <div class="form-group">
                <label for="Model">Model</label>
                <input type="text" class="form-control is-invalid" id="Modelm" name="Modelm" value="<?=$pdo['modele'];?>" required>
            </div>
            <div class="form-group">
                <label for="Couleur">Couleur</label>
                <input type="text" class="form-control is-invalid" id="Couleurm" name="Couleurm" value="<?=$pdo['couleur'];?>" required>
            </div>
            <button type="submit" class="btn btn-warning btn-block">Editer</button>
        </form>
    </div>
</div>

<?php require "../../partie/footer.php";?>