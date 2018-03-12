<?php
session_start();
if (empty($_SESSION)){
    header ('Location: index.php');
}
include '../../lib/F_db.php';
include '../../partie/header_t.php';
include '../../lib/Traitement_Donne_U.php';
$matricle=$_SESSION['matricule'];
?>
<div class="container">
    <div class="container-fluid">
        <form action="add_a.php" method="POST">
            <div class="form-group">
                <label for="num">Numero Assurance</label>
                <input type="text" class="form-control " id="num" name="num" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="de">Date Effet</label>
                <input type="date" class="form-control" id="de" name="de"  required>
            </div>
            <div class="form-group">
                <label for="dex">Date Expiration</label>
                <input type="date" class="form-control" id="dex" name="dex"  required>
            </div>
            <div class="form-group">
                <label for="nom">Nom Assurance</label>
                <input  type="text" class="form-control" id="nom" name="nom"  required>
            </div>
            <div class="form-group">
                <label for="ta">Type D'assurance</label>
                <select class="form-control" id="ta" name="ta">
                    <option value="au_tiers">Au Tiers</option>
                    <option value="sur_mesure">Sur Mesure</option>
                    <option value="tous_risques">Tous Risques</option>
                </select>
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="text" class="form-control" id="prix" name="prix"  required>
            </div>
            <select class="form-control" id="mv" name="mv" required>
                <?php
                echo "<option></option>";
                foreach ($matricle as $mat){
                    echo "<option value=".$mat['matricule'].">".$mat['matricule']."</option>";
                }?>
            </select>
            <button type="submit" class="btn btn-primary btn-block">OK</button>
        </form>
    </div>
</div>

<?php require "../../partie/footer.php";?>