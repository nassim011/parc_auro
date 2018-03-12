<?php
session_start();
if (empty($_SESSION)){
    header ('Location: index.php');
}
?>
<?php
include '../../lib/F_db.php';
include '../../partie/header_t.php';
$req=null;
$assurance=rechrcheall($req,"SELECT * FROM assurance");


?>
    <li>
        <form class="navbar-form" action="recherche_v.php">
            <div class="input-group">
                <input type="search" class="form-control" placeholder="Search">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </li>
<div class="row" >
    <div class="col-xs-offset-2 col-xs-8 col-sm-offset-4 col-sm-4 col-lg-offset-4 col-lg-4 "> <h1>Les Assurance Dans Le Parc</h1></div>
</div>
    <div class="ajout container">
    <a href="page_add_a.php"><button type="submit" class="btn btn-primary btn-block "  >Ajouter Une Assurance </button></a>
    </div>
    <br>
    <div class="container tab">
    <div class="table-responsive">
        <table class="table table-striped ">
            <thead>
            <tr>
                <th>Numéro Assurance</th>
                <th>Date Effet</th>
                <th>Date Expiration</th>
                <th>Nom Assurance</th>
                <th>Type D'assurance</th>
                <th>Prix</th>
                <th>Matricule Du Véhicule</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($assurance as $a ): ?>
                <tr>
                    <td><?= $a['num_assurance'];?></td>
                    <td><?= $a['date_effet'];?></td>
                    <td><?= $a['date_exp'];?></td>
                    <td><?= $a['nom_assurance'];?></td>
                    <td><?= $a['type_assurance'];?></td>
                    <td><?= $a['prix_assurance'];?></td>
                    <td><?= $a['matricule'];?></td>
                    <td><form method="post" action="page_edition_a.php"><button type="submit" value="<?=$a['num_assurance'];?>" name="edit" id="edit" class="btn btn-warning glyphicon glyphicon-wrench"></button></form> </td>
                    <td><form method="post" action="supp_a.php"><button type="submit" value="<?=$a['num_assurance'];?>" name="supp" id="supp" class="btn btn-danger glyphicon glyphicon-scissors" onclick="return confirm('vous les vous supprimer' )"></button></form></td>

                </tr>
            <?php endforeach ;?>

            </tbody>
        </table>
    </div>
</div>


<?php require "../../partie/footer.php";?>