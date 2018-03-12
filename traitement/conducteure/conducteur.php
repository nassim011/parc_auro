<?php
session_start();
if (empty($_SESSION)){
    header ('Location: index.php');
}
include '../../lib/F_db.php';
include '../../partie/header_t.php';
include '../../lib/Traitement_Donne_U.php';
$req=null;
$conducteur=rechrcheall($req,"SELECT * FROM conducteur");


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
    <div class="col-xs-offset-2 col-xs-8 col-sm-offset-4 col-sm-4 col-lg-offset-4 col-lg-4 "> <h1>Les Conducteur Dans Le Parc</h1></div>
</div>
    <div class="ajout container">
    <a href="page_add_c.php"><button type="submit" class="btn btn-primary btn-block "  >Ajouter Un Conducteur </button></a>
    </div>
    <br>
    <div class="container tab">
    <div class="table-responsive">
        <table class="table table-striped ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>prénom</th>
                <th>date De Naissance</th>
                <th>Adresse</th>
                <th>Situation Familiale</th>
                <th>Genre</th>
                <th>num_p</th>
                <th>Année Du Permis</th>
                <th>Wilaya Du Permis</th>
                <th>Matricule Du Véhicule</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($conducteur as $v ): ?>
                <tr>
                    <td><?= $v['ID_c'];?></td>
                    <td><?= $v['nom'];?></td>
                    <td><?= $v['prenom'];?></td>
                    <td><?= $v['date_n'];?></td>
                    <td><?= $v['adresse'];?></td>
                    <td><?= $v['situation_familiale'];?></td>
                    <td><?= $v['genre'];?></td>
                    <td><?= $v['num_p'];?></td>
                    <td><?= $v['annne_p'];?></td>
                    <td><?= $v['wilaya_p'];?></td>
                    <td><?= $v['matricule'];?></td>
                    <td><form method="post" action="page_edition_c.php"><button type="submit" value="<?=$v['ID_c'];?>" name="edit" id="edit" class="btn btn-warning glyphicon glyphicon-wrench"></button></form> </td>
                    <td><form method="post" action="supp_c.php"><button type="submit" value="<?=$v['ID_c'];?>" name="supp" id="supp" class="btn btn-danger glyphicon glyphicon-scissors" onclick="return confirm('vous les vous supprimer' )"></button></form></td>

                </tr>
            <?php endforeach ;?>

            </tbody>
        </table>
    </div>
</div>


<?php require "../../partie/footer.php";?>