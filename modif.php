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
	

	<title>Modifier un produit</title>

</head>
<?php
require_once('./connexion.php');
	$modif = false;

	$actions = array ("modif");
	foreach ($actions as $test){
		if (isset($_GET[$test])){
			$$test = $_GET[$test];		
	
		}
		elseif (isset($_POST[$test])){
			$$test = $_POST[$test];
	
		}
	} // fin foreach

if ($modif){
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

if (empty($_POST)){	
	

?>
<body>

	
	<header id="tete">
	
	</header>
		
	<main class="container">
		<div class="row" style="margin-top: 2rem;margin-bottom: 2rem;">
  			<div class="col-sm-10">
				<form action="modif.php" method="POST">
					<legend>Modifiez vos produits<br><br></legend>	
					<fieldset class="form-group">
						<p><label for="nom" class="col-sm-2">Nom :</label>
<?php
						echo '<input type="hidden" name="leidprod" value='.intval($leid).'>';
						echo '<input class="form-control col-sm-10" type="text" name="nom" id="nom" title="Nom du produit" value="'.$lenom.'"required minlength=3 />';
						echo '</p>';
						echo '<p><label for="quantite" class="col-sm-2">Quantité :</label>';
						echo '<input class="form-control col-sm-10" type="text" name="quantite" id="quantite" value="'.$lequantite.'"/>';
						echo '</p>';
						echo '<p><label for="unite" class="col-sm-2">Unité :</label>';
						$row = $bdd->query("SHOW COLUMNS FROM produit LIKE 'unite';");
						$ligne= ($row->fetch(PDO::FETCH_ASSOC));
						preg_match('/enum\(\'(.*)\'\)$/', $ligne['Type'], $matches);
						$values = explode('\',\'', $matches[1]);	

						echo '<select id="leunite" name="leunite" class="form-control col-sm-6" value="'.$launite.'">';
						foreach ($values as $cle=>$valeur){

							echo "<option value='".$valeur."'>".$valeur;
						}
?>
						</select>

						</p>
			</div>		
					</fieldset>
					<div class="col-sm-6">
						<input type="submit" name="envoie" value="Enregistrer">
						<button type="button" id="b_n_user_close" class="btn btn-danger" onclick="history.back()">fermer</button>
					</div>
				</form>
 <?php
} // fin if empty post

//if (!empty($_POST))
else
{
$leid=$_POST['leidprod'];
$prod=strip_tags($_POST['nom']);
$quant=strip_tags($_POST['quantite']);
$unit=strip_tags($_POST['leunite']);
$requete3 = "update produit set nom ='$prod', quantite ='$quant' , unite = '$unit' where id_produit='$leid'";
$bdd->query($requete3);
echo '<script>window.history.back();</script>';
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

