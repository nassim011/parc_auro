<?php
session_start();
if (empty($_SESSION)){
    header ('Location: index.php');
}
include '../../lib/F_db.php';
include '../../partie/header_t.php';
include '../../lib/Traitement_Donne_U.php';

$pdo=null;
$matricle=$_SESSION['matricule'];
?>
<div class="container">
    <div class="container-fluid">
        <form action="add_controle.php" method="POST">
            <div class="form-group">
                <label for="num">Numero controle</label>
                <input type="text" class="form-control " id="num" name="num" placeholder=""  required>
            </div>
            <div class="form-group">
                <label for="nom">Nom controle</label>
                <input  type="text" class="form-control" id="nom" name="nom"  required>
            </div>
            <div class="form-group">
                <label for="de">Date Effet</label>
                <input type="date" class="form-control" id="de" name="de"   required>
            </div>
            <div class="form-group">
                <label for="dure">Date Expiration</label>
                <input type="date" class="form-control" id="dure" name="dure"   required>
            </div>
            <div class="form-group">
                <label for="obss">Obsservation</label>
                <textarea class=" form-control" id="obss" name="obss" placeholder="" required></textarea>
            </div>
            <div class="form-group">
                <label for="mv">Matricule Du Vehicule</label>
                <select class="form-control" id="mv" name="mv" required>
                    <?php
                    echo "<option></option>";
                    foreach ($matricle as $mat){
                        echo "<option value=".$mat['matricule'].">".$mat['matricule']."</option>";
                    }?>
                </select>
            <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
        </form>
    </div>
</div>

<?php require "../../partie/footer.php";?>