<?php
require_once('../connexion.php');
$bd = creerConnexionBD();
?>
<form action="" method="post">
Nom : <input type="text" name="nom" id="Nom" placeholder="Nom"/> 
<input type="submit" name="envoi" value="Envoyer"> <br><br>
<input type="submit" name="ordre" value="Tri alphab�tique"><br><br>
<input type="submit" name="tri" value="Tri par nombre"><br><br>
<?php
$alpha=false;
$tri=false;

if((isset($_POST['tri']) && $tri==true))
	$tri=false;
else if((isset($_POST['tri']) && $tri==false))
	$tri=true;

if((isset($_POST['ordre']) && $alpha==true))
	$alpha=false;
else if((isset($_POST['ordre']) && $alpha==false))
	$alpha=true;



if((!isset($_POST['ordre']) && !isset($_POST['envoi'])) || $alpha==false){
	$sql="select count(idrole) as id, name from role r join user u on u.idrole=r.id group by name order by name desc";
	$reponse = $bd->query($sql);
	echo "Nom des roles : <br>";
	foreach($reponse as $donnees){
		echo $donnees['name']." ".$donnees['id']."<br>"; 
	}	
}

if(isset($_POST['envoi'])){
	$sql = "select count(idrole) as id, name from role r join user u on u.idrole=r.id where name='".$_POST['nom']."' group by name ";
	$reponse=$bd->query($sql);
	foreach($reponse as $donnees){
		echo $donnees['name']." ".$donnees['id']."<br>"; 
	}
}

if($alpha==true){
	$sql="select count(idrole) as id, name from role r join user u on u.idrole=r.id group by name order by name";
	$reponse = $bd->query($sql);
	echo "Nom des roles : <br>";
	foreach($reponse as $donnees){
		echo $donnees['name']." ".$donnees['id']."<br>"; 
	}
}

if($tri == true){
	$sql = "select count(idrole) as idr, name from role r join user u on u.idrole=r.id where name='".$_POST['nom']."' group by name order by idr";
	$reponse=$bd->query($sql);
	foreach($reponse as $donnees){
	
		echo $donnees['name']." ".$donnees['idr']."<br>"; 
	}
}




?>
</form>