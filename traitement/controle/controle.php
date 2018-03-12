<?php
session_start();
if (empty($_SESSION)){
    header ('Location: index.php');
}
include '../../lib/F_db.php';
include '../../partie/header_t.php';
include '../../lib/Traitement_Donne_U.php';
$req=null;
$controle=rechrcheall($req,"SELECT * FROM controle");


?>
    <li>
        <form class="navbar-form" action="recherche_control.php">
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
    <div class="col-xs-offset-2 col-xs-8 col-sm-offset-4 col-sm-4 col-lg-offset-4 col-lg-4 "> <h1>Les Control Dans Le Parc</h1></div>
</div>

    <div class="ajout container">
    <a href="page_add_control.php"><button type="submit" class="btn btn-primary btn-block ">Ajouter Un Control </button></a>
    </div>
    <br>
    <div class="container tab">
    <div class="table-responsive">
        <table class="table table-striped ">
            <thead>
            <tr>
                <th>Numéro Du Control</th>
                <th>Organisme</th>
                <th>Date Effet</th>
                <th>Duree</th>
                <th>Observation</th>
                <th>Matricule Du Véhicule</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($controle as $v ): ?>
                <tr>
                    <td><?= $v['num_controle'];?></td>
                    <td><?= $v['organisme'];?></td>
                    <td><?= $v['date_effet'];?></td>
                    <td><?= $v['duree'];?></td>
                    <td><?= $v['observations'];?></td>
                    <td><?= $v['matricule'];?></td>
                    <td><form method="post" action="page_edition_controle.php"><button type="submit" value="<?=$v['num_controle'];?>" name="edit" id="edit" class="btn btn-warning glyphicon glyphicon-wrench"></button></form> </td>
                    <td><form method="post" action="supp_controle.php"><button type="submit" value="<?=$v['num_controle'];?>" name="supp" id="supp" class="btn btn-danger glyphicon glyphicon-scissors" onclick="return confirm('vous les vous supprimer' )"></button></form></td>

                </tr>
            <?php endforeach ;?>

            </tbody>
        </table>
    </div>
</div>


<?php require "../../partie/footer.php";?>