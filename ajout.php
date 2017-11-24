<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="css/layout.css" rel="stylesheet" type="text/css" />
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/popper.js" type="text/javascript"></script>
	<script src="js/tether.js" type="text/javascript"></script>
	<script src="js/tooltip.js" type="text/javascript"></script>
	<script src="js/modal.js" type="text/javascript"></script>
	<script src="js/popover.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/jquery-ui.min.js" type="text/javascript"></script>
	<link href="css/tether.css" rel="stylesheet" type="text/css" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
	<script src="js/scripts.js" type="text/javascript"></script>
	<link href="css/layout.css" rel="stylesheet" type="text/css" />
	

	<title>Ajouter un produit</title>

</head>
<?php
require_once('./connexion.php');
// echo "<h2> Insertion en BDD (Create)</h2>";

if (isset($_GET['fruit']) and !isset($_GET['par'])) {
	$nouveau_fruit = $_GET['fruit'];
	$nouveau_fruit = strip_tags(trim($nouveau_fruit));
	echo "<br>le nouveau fruit à enregistrer est : $nouveau_fruit <br>";

	$requete3 = "INSERT INTO fruits (nom) VALUE ('$nouveau_fruit')";
	if(!$bdd->query($requete3))
		print_r($bdd->errorInfo());

	afficher_toutes_les_lignes();
}
else {
//	echo "<br> Pas de nouveau fruit <br>";
}


//echo "<h2>Mise à jour en BDD (Update)</h2>";
if (isset($_GET['fruit']) and isset($_GET['par'])) {
	$fruit_a_modifier = strip_tags(trim($_GET['fruit']));
	$nouveau_fruit = strip_tags(trim($_GET['par']));
	echo "<br> modifier le fruit : $fruit_a_modifier par $nouveau_fruit<br>";

	$requete4 = "UPDATE fruits SET nom = '$nouveau_fruit' WHERE nom = '$fruit_a_modifier'";
	if(!$bdd->query($requete4))
		print_r($bdd->errorInfo());

	afficher_toutes_les_lignes();
}
else {
//	echo "<br> Rien a modifier <br>";
}

//echo "<h2>Effacer en BDD (Delete)</h2>";
if (isset($_GET['efface'])) {
	$fruit_a_effacer = strip_tags(intval(trim($_GET['efface'])));
	echo "<br> effacer le fruit : $fruit_a_effacer <br>";

	$requete5 = "DELETE FROM produit WHERE id = '$fruit_a_effacer'";
	if(!$bdd->query($requete5))
		print_r($bdd->errorInfo());

	afficher_toutes_les_lignes();
}
else {
//	echo "<br> Rien a effacer <br>";
}


function afficher_toutes_les_lignes(){
	global $bdd;
	$les_fruits = array();

	$requete = "SELECT * FROM fruits";
	if ($req_fruits = $bdd->query($requete)) {
		$les_fruits = $req_fruits->fetchAll();
//	var_dump($les_fruits);

		foreach  ($les_fruits as $row) {
			print $row['id_fruit'] . " : ";
			print $row['nom'] . "<br>";
		}
	}
}

if (empty($_POST)){	

?>
<body>

	
	<header id="tete">
	
	</header>
		
	<main class="container">
		<div class="row" style="margin-top: 2rem;margin-bottom: 2rem;">
  			<div class="col-sm-10">
				<form action="ajout.php" method="POST">
					<legend>Faites vos courses<br><br></legend>	
					<fieldset class="form-group">
						<p><label for="nom" class="col-sm-2">Nom :</label>
						<input class="form-control col-sm-10" type="text" name="nom" id="nom" title="Nom du produit" required minlength=3 />
						</p>
						<p><label for="quantite" class="col-sm-2">Quantité :</label>
						<input class="form-control col-sm-10" type="text" name="quantite" id="quantite"/>
						</p>
						<p><label for="unite" class="col-sm-2">Unité :</label>
						
						<select id="leunite" name="leunite" class="form-control col-sm-6">
							<option value='unité'>Unité
							<option value='gramme'>Gramme
							<option value='kilogramme'>Kilogramme
							<option value='centilitre'>Centilitre
							<option value='litre'>Litre
						</select>

						</p>
			</div>		
					</fieldset>
					<div class="col-sm-6">
						<input type="reset" name="reinit" value="Recommencer">
					</div>
					<div class="col-sm-6">
						<input type="submit" name="envoie" value="Enregistrer">
					</div>
				</form>
 <?php
} // fin if empty post

//if (!empty($_POST))
else
{
	var_dump($_POST);

$prod=strip_tags($_POST['nom']);
$quant=strip_tags($_POST['quantite']);
$unit=strip_tags($_POST['leunite']);
$requete3 = "INSERT INTO produit (nom,quantite,unite) VALUE (".$prod.",".$quant.",".$unit.")";
$bdd->query($requete3)
}

?>
	</div>

	</main>
	<footer class="footer" id="fin">
	</footer>
	<script>
	charge_bloc ("#tete");
	charge_bloc ("#fin");
	lemenutitre= (window.location.pathname).split('/').pop();
	trouve_la_page(lemenutitre);



	</script>

</body>
</html>

