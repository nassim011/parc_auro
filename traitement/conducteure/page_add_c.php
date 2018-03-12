<?php
session_start();
if (empty($_SESSION)){
    header ('Location: index.php');
}
include '../../lib/F_db.php';
include '../../partie/header_t.php';
include '../../lib/Traitement_Donne_U.php';
$matricle=$_SESSION['matricule'];
$null=null;
?>
<div class="container">
    <div class="container-fluid">
        <form action="add_c.php" method="POST">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control " id="nom" name="nom" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="pre">prénom</label>
                <input type="text" class="form-control " id="pre" name="pre" placeholder=""  required>
            </div>
            <div class="form-group">
                <label for="dn">date De Naissance</label>
                <input type="date" class="form-control" id="dn" name="dn"  required>
            </div>
            <div class="form-group">
                <label for="adresse">adresse</label>
                <textarea  class="form-control" id="adresse" name="adresse"  required></textarea>
            </div>
            <div class="form-group">
                <label for="sf">Situation Familiale</label>
                <select class="form-control" id="sf" name="sf">
                    <option value="celibataire">Celibataire</option>
                    <option value="marier">Marier</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sexe">sexe</label>
                <select class="form-control" id="sexe" name="sexe">
                    <option value="masculin">Masculin</option>
                    <option value="feminin">Feminin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="num_p">num_p</label>
                <input type="text" class="form-control" id="num_p" name="num_p"  required>
            </div>
            <div class="form-group">
                <label for="dp">Annne Du Permis</label>
                <input type="date" class="form-control " id="dp" name="dp"  required>
            </div>
            <div class="form-group">
                <label for="wp">Wilaya Du Permis</label>
                <input type="text" class="form-control " id="wp" name="wp"  required>
            </div>
            <div class="form-group">
                <label for="mv">Matricule Du Vehicule</label>
                <select class="form-control" id="mv" name="mv" required>
                    <?php
                    echo "<option value=".$null.">Désaffecter</option>";
                    foreach ($matricle as $mat){
                            echo "<option value=".$mat['matricule'].">".$mat['matricule']."</option>";
                    }?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">OK</button>
        </form>
    </div>
</div>

<?php require "../../partie/footer.php";?>