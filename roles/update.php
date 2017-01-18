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
Nom : <input type="text" name="nom" id="Nom" placeholder="Nom"/>
<input type="submit" name="modif" value="Modifier"> <br><br>
</form>
<?php
if(isset($_POST['modif'])){
	$sql="update role set name='".$_POST['nom']."' where id = ".$_POST['id'];
	$reponse=$bd->exec($sql);
}