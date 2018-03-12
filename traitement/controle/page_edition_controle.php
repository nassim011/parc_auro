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
$_SESSION['num_controle']=$num;
$pdo=rechrche($pdo,"SELECT * FROM controle WHERE num_controle='$num'");
$matricle=$_SESSION['matricule'];
?>
<div class="container">
    <div class="container-fluid">
        <form action="edition_controle.php" method="POST">
            <div class="form-group">
                <label for="num">Numero controle</label>
                <input type="text" class="form-control " id="num" name="num" placeholder="" value="<?=$pdo['num_controle'];?>" required>
            </div>
            <div class="form-group">
                <label for="nom">Nom controle</label>
                <input  type="text" class="form-control" id="nom" name="nom" value="<?=$pdo['organisme'];?>" required>
            </div>
            <div class="form-group">
                <label for="de">Date Effet</label>
                <input type="date" class="form-control" id="de" name="de"  value="<?=$pdo['date_effet'];?>" required>
            </div>
            <div class="form-group">
                <label for="dure">Date Expiration</label>
                <input type="date" class="form-control" id="dure" name="dure"  value="<?=$pdo['duree'];?>" required>
            </div>
            <div class="form-group">
                <label for="obss">Obsservation</label>
                <textarea class=" form-control" id="obss" name="obss" placeholder="" required></textarea>
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