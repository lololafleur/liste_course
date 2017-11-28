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
	

	<title>Nouvel utilisateur</title>

<script>
</script>

</head>
<body>
	<header id="tete">
	
	</header>


	<main class="container">

		<div class="row">

			<div class="col-sm-10">

				<form action="nouveau_user.php" method="POST">
					<legend>Ajouter un utilisateur<br><br></legend>
					<fieldset class="form-group">
						<label for="n_user">Entrez votre nom :  </label>
						<input type=text name="n_user" id="n_user" placeholder="Votre nom">
					</fieldset>
					<fieldset class="form-group">
						<label for="n_pass">Entrez votre mot de passe :  </label>
						<input type=password name="n_pass" id="n_pass">
					</fieldset>
					<fieldset class="form-group">
						<button type="submit" id="b_n_user" class="btn btn-primary">Enregistrer</button>
						<button type="reset" id="b_an_user" class="btn btn-outline-danger">Réinitialiser</button>
						<button type="button" id="b_n_user_close" class="btn btn-danger" onclick="history.back()">fermer</button>
					</fieldset>	
				
				
				
				</form> <!-- fin formulaire -->



			</div>


		</div> <!-- fin div row -->








	</main> <!-- fin de main -->
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

