<?php
require_once('../connexion.php');
$bd = creerConnexionBD();
?>
<form method="post" action="">
Nom : <input type="text" name="nom" id="Nom" placeholder="Nom"/>
<input type="submit" name="ajout" value="Ajouter"> <br><br>
<?php
if(isset($_POST['ajout'])){
	$max="select max(id)+1 from role";
	$repMax = $bd->query($max);
	$leMax = $repMax->fetchColumn();
	$sql="insert into role values(".$leMax.",'".$_POST['nom']."')";
	$reponse=$bd->exec($sql);
}
