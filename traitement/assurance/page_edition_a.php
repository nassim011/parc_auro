<?php
session_start();
if (empty($_SESSION)){
    header ('Location: index.php');
}
include '../../lib/F_db.php';
include '../../partie/header_t.php';
include '../../lib/Traitement_Donne_U.php';

$num=$_POST['edit'];
$pdo=null;
$_SESSION['num_assurance']=$num;
$pdo=rechrche($pdo,"SELECT * FROM assurance WHERE num_assurance='$num'");
$matricle=$_SESSION['matricule'];
?>
<div class="container">
    <div class="container-fluid">
        <form action="edition_a.php" method="POST">
            <div class="form-group">
                <label for="num">Numero Assurance</label>
                <input type="text" class="form-control " id="num" name="num" placeholder="" value="<?=$pdo['num_assurance'];?>" required>
            </div>
            <div class="form-group">
                <label for="de">Date Effet</label>
                <input type="date" class="form-control" id="de" name="de"  value="<?=$pdo['date_effet'];?>" required>
            </div>
            <div class="form-group">
                <label for="dex">Date Expiration</label>
                <input type="date" class="form-control" id="dex" name="dex"  value="<?=$pdo['date_exp'];?>" required>
            </div>
            <div class="form-group">
                <label for="nom">Nom Assurance</label>
                <input  type="text" class="form-control" id="nom" name="nom" value="<?=$pdo['nom_assurance'];?>" required>
            </div>
            <div class="form-group">
                <label for="ta">Type D'assurance</label>
                <select class="form-control" id="ta" name="ta" value="<?= $pdo['type_assurance'];?>">
                    <option value="au_tiers">Au Tiers</option>
                    <option value="sur_mesure">Sur Mesure</option>
                    <option value="tous_risques">Tous Risques</option>
                </select>
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="text" class="form-control" id="prix" name="prix"  value="<?= $pdo['prix_assurance'];?>" required>
            </div>
            <div class="form-group">
                <label for="mv">Matricule Du Vehicule</label>
                <select class="form-control" id="mv" name="mv" required>
                    <?php
                    echo "<option value=".$pdo['matricule'].">".$pdo['matricule']."</option>";
                    foreach ($matricle as $mat){
                        if ($mat['matricule']!=$pdo['matricule'])
                            echo "<option value=".$mat['matricule'].">".$mat['matricule']."</option>";
                    }?>
                </select>
            </div>
            <button type="submit" class="btn btn-warning btn-block">Editer</button>
        </form>
    </div>
</div>

<?php require "../../partie/footer.php";?>