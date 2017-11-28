<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/popper.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui.min.js" type="text/javascript"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
	<script src="js/scripts.js" type="text/javascript"></script>
	<script src="js/ajax.js" type="text/javascript"></script>
	
<style type="text/css">
.checked{
	background-color: goldenrod;
}

.table{
	background-color: burlywood;
}

.curseur {
	
}
</style>
	<title>Liste des courses</title>

</head>
<?php
require_once('./connexion.php');
// echo "<h2> Insertion en BDD (Create)</h2>";

$ajout = false;
$par = false;
$coche = false;
$efface = false;
$modif = false;
$course = false;
$range=false;

$requete = "SELECT * FROM produit";

if ($req_fruits = $bdd->query($requete)) {
	$les_produits = $req_fruits->fetchAll();

$actions = array ("ajout","par","coche","efface","modif","course","range");
foreach ($actions as $test){
	if (isset($_GET[$test])){
		$$test = $_GET[$test];		
	
	}
	elseif (isset($_POST[$test])){
		$$test = $_POST[$test];
	
	}
} // fin foreach

if ($ajout){

			// ********************************************
			//	ajout suppression quantite produit
			// ********************************************


			$produit_a_modifier = intval($ajout);	
			$nouveau_quant = $par;
			$req='select * from produit where id_produit='.$produit_a_modifier.';';
			$rep=$bdd->query($req);
			$les_produits = $rep->fetchAll();
			foreach ($les_produits as $ligne){
				$le_id = $ligne['id_produit'];
				$la_quantite = $ligne['quantite'];
			}
			if ($nouveau_quant == "plus"){
				$la_quantite = ($la_quantite + 1);
			}
			else{
				$la_quantite = ($la_quantite - 1);
			}
			$requete="update produit set quantite = ".$la_quantite." where id_produit = ".$le_id.";";
			$rep=$bdd->query($requete);
}

elseif ($coche){

			// ********************************************
			//	gestion case à cocher : fait
			// ********************************************


			$produit_a_modifier = intval($coche);	
			$req='select * from produit where id_produit='.$produit_a_modifier.';';
			$rep=$bdd->query($req);
			$les_produits = $rep->fetchAll();
			foreach ($les_produits as $ligne){
				$le_id = $ligne['id_produit'];
				$le_coche = $ligne['coche'];
			}
			if ($le_coche == 0){
				$le_coche = 1;
			}
			else{
				$le_coche = 0;
			}
	
			$requete="update produit set coche = ".$le_coche." where id_produit = ".$le_id.";";
			$rep=$bdd->query($requete);
}

elseif ($efface){


			// ********************************************
			//	suppression d'un produit
			// ********************************************

			$produit_a_supprimer = intval($efface);
			$req="delete from produit where id_produit=".$produit_a_supprimer.";";
			$rep=$bdd->query($req);
}
elseif ($modif){
		// ********************************************
	//	modification d'un produit
	// ********************************************
	
	$req=("select * from produit where id_produit=".$modif);
	$rep=$bdd->query($req);
	$ligne=$rep->fetchall();
	$leid=$ligne[0]['id_produit'];
	$lenom=$ligne[0]['nom'];
	$lequantite=$ligne[0]['quantite'];
	$launite=$ligne[0]['unite'];

	

}
elseif ($course){
	$req=("select * from produit where id_produit=".$course);
	$rep=$bdd->query($req);
	$lignes=$rep->fetchall();
	$leid=$lignes[0]['id_produit'];
	$lenom=$lignes[0]['nom'];
	$launite=$lignes[0]['unite'];
//	echo '<form method="POST" action="index1.php">';
//	echo '<label for "qte">Veuillez entrer la quantité  :</label>';
//	echo '<input type="text" name="qte">';
//	echo '<button type="submit">Mettre dans le caddy</button>';
//	echo '</form>';	
//	$laquantite=$_POST['qte'];
//	if ( $laquantite > 0 ){
//	$requete=("INSERT INTO courses (id_produit, quantite, unite) VALUES ($leid,$laquantite,$launite)");
//	}
//	else{
//		echo '<script>alert("Il faut entrer une quantite")</script>';
	//	}
	header('location: caddy.php');
}


?>
<body>
<script>



</script>
	
	<header id="tete">
	
	</header>
		
	<main class="container">
		<div class="row" style="margin-top: 2rem;">
			<div class="col-8" >
<?php
	//var_dump($les_fruits);

		echo '<table class="table" id="table_produit">';
 			echo '<thead>';
    				echo '<tr class="text-center">';
      					echo "<th><span class='tri_nom asc trier'>Nom du produit</span></th>";
      					echo "<th><span class='tri_quantite asc trier'>Quantité</span></th>";
					echo "<th><span class='tri_unite asc trier'>Unité</span></th>";
					echo "<th><span class='tri_coche asc trier'>Fait</span></th>";
					echo "<th>Supprimer</th>";
					echo "<th>Dans le panier</th>";
    				echo '</tr>';
  			echo '</thead>';
  			echo '<tbody>';
				foreach  ($les_produits as $row) {
				$checked = ($row['coche']) ? 'checked' : "";
				echo '<tr class="'.$checked.'">';
      					echo "<td><a href=modif.php?modif=".$row['id_produit'].">".$row['nom']."</a></td>";
      					echo '<td class="text-center"><a href=index.php?ajout='.$row["id_produit"].'&par=plus><i class="fa fa-plus-circle" aria-hidden="true"></i></a>&nbsp&nbsp&nbsp'.$row['quantite'].'&nbsp&nbsp&nbsp<a href=index.php?ajout='.$row["id_produit"].'&par=moins><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>';
					echo '<td>'.$row['unite'].'</td>';					
					echo '<td><a href=index.php?&coche='.$row['id_produit'].'><input type="checkbox" '.$checked.'></a></td>';
					echo '<td class="text-center"><a href=index.php?&efface='.$row['id_produit']. '><i class="fa fa-trash" aria-hidden="true"></i></a></td>';					
					echo '<td class="text-center"><a href=index.php?&course='.$row['id_produit']. '><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a></td>';					
					echo '</tr>';
				}
  			echo '</tbody>';
			echo '</table>';
	}
?>
	
			</div>
			<div class="col-3 align-items-center">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  					Ajouter un produit à la liste
				</button>
				<a href="./ajout.php"><button type="button" class="btn btn-light" >
					Ajouter un produit en externe
				</button></a>
			</div>
		</div>
	</main>


	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
			</div>
		</div>
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

