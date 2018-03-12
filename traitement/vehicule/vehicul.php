<?php
session_start();
if (empty($_SESSION)){
    header ('Location: index.php');
}
include '../../lib/F_db.php';
include '../../partie/header_t.php';
include '../../lib/Traitement_Donne_U.php';
$req=null;
$vehicule=rechrcheall($req,"SELECT * FROM vehicule");

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
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-xs-offset-2 col-xs-8 col-sm-offset-4 col-sm-4 col-lg-offset-4 col-lg-4 "> <h1>Les Véhicule Dans Le Parc</h1></div>
    </div>

    <div class="ajout container">
        <a href="page_add_v.php"><button type="submit" class="btn btn-primary btn-block "  >Ajouter Un Vehicle </button></a>
    </div>
    <br>
    <div class="container tab">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Matricule</th>
                <th>Mise En Circulation</th>
                <th>Wilaya Du Matricule</th>
                <th>Marque</th>
                <th>Model</th>
                <th>Couleur</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicule as $v ): ?>
                <tr>
                    <td><?= $v['matricule'];?></td>
                    <td><?= $v['mise_circulation'];?></td>
                    <td><?= $v['wilaya_m'];?></td>
                    <td><?= $v['marque'];?></td>
                    <td><?= $v['modele'];?></td>
                    <td><?= $v['couleur'];?></td>
                    <td><form method="post" action="page_edition_v.php"><button type="submit" value="<?=$v['matricule'];?>" name="edit" id="edit" class="btn btn-warning glyphicon glyphicon-wrench"></button></form> </td>
                    <td><form method="post" action="supp_v.php"><button type="submit" value="<?=$v['matricule'];?>" name="supp" id="supp" class="btn btn-danger glyphicon glyphicon-scissors" onclick="return confirm('vous les vous supprimer' )"></button></form></td>

                </tr>
              <?php endforeach ;?>

            </tbody>
        </table>
    </div>
</div>

<?php require "../../partie/footer.php";?>