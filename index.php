<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/popper.js" type="text/javascript"></script>
	<script src="js/tether.js" type="text/javascript"></script>
	<script src="js/tooltip.js" type="text/javascript"></script>
	<script src="js/modal.js" type="text/javascript"></script>
	<script src="js/popover.js" type="text/javascript"></script>
	<script src="js/application.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/jquery-ui.min.js" type="text/javascript"></script>
	<link href="css/tether.css" rel="stylesheet" type="text/css" />
	<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<script src="js/scripts.js" type="text/javascript"></script>
		

	<title>Liste des courses</title>

</head>
<?php
require_once('./connexion.php');

$nb_ligne = 'select count(nom) from connecte';
if ($res=$bdd->query($nb_ligne)){
	if ($res->fetchColumn() > 0) {
		$req="select * from connecte";
		$rep=$bdd->query($req);
		$lignes=$rep->fetchall();
		$c_nom=$lignes[0]['nom'];
		$message='Attention, '.$c_nom.' est toujours connecté. Pensez à vous déconnecter en partant';
		echo '<script>alert("'.$message.'")</script>';
		header('location: index1.php');

	}
	else {
	
		header('Location: u_connect.php');

	
	}



} 
else {

echo($bdd->errorInfo()[2]);
}


?>
</html>
