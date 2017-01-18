<?php
require_once('../connexion.php');
$bd = creerConnexionBD();
$nom = "select * from role";
$rep = $bd->query($nom);?>
<form method="post" action="">Modifier <br>
<select name="id"><?php
foreach($rep as $donnees){
	echo '<option value='.$donnees['id'].'>'.$donnees['name'].'</option>';
}	
?>
</select>
<input type="submit" name="sup" value="Supprimer"> <br><br>
</form>
<?php
if(isset($_POST['sup'])){
	$sql="delete from role where id = ".$_POST['id'];
	$reponse=$bd->exec($sql);
}
header("delete.php");
?>