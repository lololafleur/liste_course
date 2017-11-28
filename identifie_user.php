<?php

	require_once('./connexion.php');

	$salt = "@~[]AhAh";

	$user=$_POST['nom'];
	$pass=$_POST['password'];
	if ( $pass=='' ) {
		echo '<script>alert("Veuillez saisir votre mot de passe")</script>';
		header('Location: u_connect.php');
	}

	$pass=md5($pass.$salt);
		$nb_ligne = "select count(*) from users where nom = '$user' ";
		if ($res=$bdd->query($nb_ligne)){
			if ($res->fetchColumn() > 0) {
				$user=$bdd->quote($user);
				$pass=$bdd->quote($pass);
				$req="select * from users where nom = $user and password= $pass";
				$rep=$bdd->query($req);
				$lignes=$rep->fetchall();
				$leid=$lignes[0]['users_id'];
				$lenom=$lignes[0]['nom'];
				$variable1 = $bdd->quote($lenom); // ON protege une chaine de caractere
				$variable2 = intval($leid); // on force le typage : Entier pour un champ : INT (nombre entier)

				$requete_insert = "INSERT INTO connecte (nom) VALUE ($variable1)";

				if( !$bdd->query($requete_insert) ){ // on execute la requete
					echo($bdd->errorInfo()[2]); // si erreur, on affiche l'erreur
				}
					header('location: index1.php');
			}
			else {
				echo '<script>alert("Si la barba baiava lou sen, les chabras sarien sabentas")</script>';
				header('Location: u_connect.php');
			}	
		}
		else {
			echo($bdd->errorInfo()[2]);
		}
	
