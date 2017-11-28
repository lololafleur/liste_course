<?php
	require_once('./connexion.php');

	$salt = "@~[]AhAh";

	if ( isset($_POST['n_user']) && isset($_POST['n_pass']) ){
		$user=$bdd->quote($_POST['n_user']);
		$pass=$bdd->quote($_POST['n_pass']);

		$nb_ligne = "select count(*) from users where nom = '$user' ";
		if ($res=$bdd->query($nb_ligne)){
			if ($res->fetchColumn() = 0) {
				$requete_insert = "INSERT INTO users (nom,password) VALUES ('$user', '$pass')";
				if( !$bdd->query($requete_insert) ){ // on execute la requete
					echo($bdd->errorInfo()[2]); // si erreur, on affiche l'erreur
				}
					header('location: index1.php');
			}
			else {
				echo '<script>alert ("je suis navré, mais cet utilisateur existe déjà")</script>';
				header('Location: new_user.php');
			}
	elseif ( isset($_POST['n_user']) ){
		echo '<script>alert ("Vous devez renseigner un mot de passe")</script>';
		header('Location: new_user.php');
	}
	else{
		echo '<script>alert ("Vous devez renseigner un nom d\'utilisateur")</script>';
		header('Location: new_user.php');
		
	}
	
		

