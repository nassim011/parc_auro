<?php
session_start();
if (empty($_SESSION)){
    header ('Location: index.php');
}
include '../../lib/F_db.php';
include '../../partie/header_t.php';
include '../../lib/Traitement_Donne_U.php';
?>
<div class="container">
    <div class="container-fluid">
        <form action="add_v.php" method="POST">
            <div class="form-group">
                <label for="matricule">Matricule</label>
                <input type="text" class="form-control " id="matriculem" name="matriculem" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="date">Mise En Circulation</label>
                <input type="date" class="form-control is-valid" id="datem" name="datem" placeholder=""  required>
            </div>
            <div class="form-group">
                <label for="wilaya">Wilaya Du Matricule</label>
                <input type="text" class="form-control is-invalid" id="wilayam" name="wilayam"  required>
            </div>
            <div class="form-group">
                <label for="Marque">Marque</label>
                <input type="text" class="form-control is-invalid" id="Marquem" name="Marquem"  required>
            </div>
            <div class="form-group">
                <label for="Model">Model</label>
                <input type="text" class="form-control is-invalid" id="Modelm" name="Modelm"  required>
            </div>
            <div class="form-group">
                <label for="Couleur">Couleur</label>
                <input type="text" class="form-control is-invalid" id="Couleurm" name="Couleurm"  required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">OK</button>
        </form>
    </div>
</div>

<?php require "../../partie/footer.php";?>