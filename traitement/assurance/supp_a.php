<?php
session_start();
if (empty($_SESSION)){
    header ('Location: index.php');
}
include '../../lib/F_db.php';
include '../../partie/header_t.php';
include '../../lib/Traitement_Donne_U.php';
if (isset($_POST['supp']))
{
    $m=$_POST['supp'];
    $sup=null;
    supprime($sup,"DELETE FROM assurance WHERE num_assurance='$m' ");
    include 'header_t.php';

}
?>
<div class="alert alert-success">
    <strong>Success!</strong> Vous Avez Bien Supprimer Le assurance num : <?=$m?> .
</div>
<?php require "../../partie/footer.php";?>