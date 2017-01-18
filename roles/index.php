<?php
require_once('../connexion.php');
$bd = creerConnexionBD();

$sql="select * from role order by name";
$reponse = $bd->query($sql);
echo "Nom des roles : <br>";
foreach($reponse as $donnees){
	echo $donnees['name']."<br>"; 
}

$sql="select count(*) from role";
$reponse=$bd->query($sql);
$rep=$reponse->fetchColumn();
echo "<br>Nombre de roles : ".$rep;


?>