<?php
session_start();
include 'Traitement_form_log.php';
include 'F_db.php';
$pdo=null;
$donne = new traitement_form_log($_POST['user'],$_POST['pass']);
$req_compte="SELECT * FROM users WHERE user='".$donne->getname()."' AND pass='".$donne->getpass()."'";
$rech_u =rechrcheall($pdo,$req_compte);
$matricle =rechrcheall($pdo,"SELECT matricule FROM vehicule");
$_SESSION['matricule']=$matricle;

if ($rech_u ==true)
{
    $_SESSION['log'] = array('id' => $rech_u[0]['ID_Utilisateur'],'name' => $donne->getname(), 'pass' =>$donne->getpass());

  header ('Location: ../traitement/home.php');
}else
 {
  header ('Location: ../index.php');

}

 ?>
