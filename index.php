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
	

	<title>Liste des courses</title>

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
if (isset($_GET['ajout']) and isset($_GET['par'])) {
	$produit_a_modifier = strip_tags(trim($_GET['ajout']));
	$nouveau_quant = strip_tags(trim($_GET['par']));
	$req='select * from produit where id='.$produit_a_modifier.';';
	$rep=$bdd->query($req);
	$les_produits = $rep->fetchAll();
	$le_id = $les_produits['id'];
	$la_quantite = $les_produits['quantite'];
	if ($nouveau_quant = "plus"){
			$la_quantite = $la_quantite + 1;
	}
	else{
		$la_quantite = $la_quantite - 1;
	}
	
	$requete="update produit set quantite = ".$la_quantite." where id = ".$le_id.";";
	$rep=$bdd->query($requete);
	
//	echo "<br> modifier le fruit : $fruit_a_modifier par $nouveau_fruit<br>";

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

?>
<body>

	
	<header id="tete">
	
	</header>
		
	<main class="container">
		<div class="row" style="margin-top: 2rem;">
			<div class="col-8" >
<?php
$blanc = "   ";
$requete = "SELECT * FROM produit";

if ($req_fruits = $bdd->query($requete)) {
	$les_produits = $req_fruits->fetchAll();
	//var_dump($les_fruits);

		echo '<table class="table">';
 			echo '<thead>';
    				echo '<tr>';
      					echo '<th>Nom du produit</th>';
      					echo '<th class="text-center">Quantité</th>';
					echo '<th>Unité</th>';
					echo '<th>Fait</th>';
					echo '<th>Supprimer</th>';
    				echo '</tr>';
  			echo '</thead>';
  			echo '<tbody>';
				foreach  ($les_produits as $row) {
				$checked = ($row['coche']) ? 'checked' : "";
				echo '<tr class="'.$checked.'">';
      					echo '<td>'.$row['nom'].'</td>';
      					echo '<td class="text-center"><a href=index.php?ajout='.$row["id"].'&par=plus><i class="fa fa-plus-circle" aria-hidden="true"></i></a>&nbsp&nbsp&nbsp'.$row['quantite'].'&nbsp&nbsp&nbsp<a href=index.php?ajout='.$row["id"].'&par=moins><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>';
					echo '<td>'.$row['unite'].'</td>';					
					echo '<td><input type="checkbox" '.$checked.'></td>';
					echo '<td class="text-center"><a href=index.php?&efface='.$row['id']. '><i class="fa fa-trash" aria-hidden="true"></i></a></td>';					
					echo '</tr>';
				}
  			echo '</tbody>';
			echo '</table>';
	}
?>
	
			</div>
			<div class="col-3 align-items-center">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajout">
  					Ajouter un produit à la liste
				</button>
				<a href="./ajout.php"><button type="button" class="btn btn-light" >
					Ajouter un produit en externe
				</button></a>
			</div>
		</div>
	</main>


	<div class="modal fade">
  		<div class="modal-dialog" role="document">
    			<div class="modal-content">
			      <div class="modal-header">
					<h5 class="modal-title" id="ajout">Modal title</h5>
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          	<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
      				<div class="modal-body">

					<h2>Ajouter un produit</h2> 
					<form action="index.php" method="POST">
						<fieldset>
							<legend>Faites vos courses</legend>	
							<p><label for="nom">Nom :</label>
							<input type="text" name="nom" id="nom" title="Nom du produit" required minlength=3 />
							</p>
							<p><label for="quantite">Quantité :</label>
							<input type="text" name="quantite" id="quantite"/>
							</p>
							<p><label for="unite">Unité :</label>
							<input list="leunite" name="unite" id="unite"/>
							</p>
							<datalist id="leunite">
								<option value='unité'>
								<option value='gramme'>
								<option value='kilogramme'>
								<option value='centilitre'>
								<option value='litre'>
							</datalist>
						</fieldset>

					</form>



      				</div>

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

