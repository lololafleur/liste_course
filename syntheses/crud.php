<?php

/**
 * CRUD (create, read, update, delete)
 * https://fr.wikipedia.org/wiki/CRUD
 * Ensemble des 4 commandes de base pour la persistance des données, en particulier le stockage d'informations en base de données
 **/


/*
 *  On ouvre une connexion à la base de donnée pour
 *  - la base : formation
 *  - user mysql : root
 *  - mdp mysl : ""
 */
$bdd = new PDO('mysql:host=localhost;dbname=formation;charset=utf8', 'root', '');

/*
 * Select
 */
$requete_select = "SELECT * FROM ma_table"; // selectionne tous les champs de la table : ma_table

if ($resultat_select = $bdd->query($requete_select)) {  // on execute la requte
	/*
	 * méthode avec fetch() : boucler dans les lignes
	 */
	while ($ligne = $resultat_select->fetch()) {
		//var_dump($ligne);
		echo 'ligne: '.$ligne['champ1'].' '.$ligne['champ2'].'<br>';
	}

	/*
	 * méthode avec fetchAll() : créer un array de tous les résultats qu'on exploite après
	 */
	$Tab_des_resultats = $resultat_select->fetchAll();
	foreach  ($Tab_des_resultats as $tab) {
		echo $tab['champ1'] . ": ";
		echo $tab['champ2'] . "<br>";
	}
}

/*
 * Insert
 */
$variable1 = $bdd->quote($variable1); // ON protege une chaine de caractere
$variable2 = intval($variable2); // on force le typage : Entier pour un champ : INT (nombre entier)

$requete_insert = "INSERT INTO ma_table (champ1, champ2) VALUE ($variable1, $variable2)";

if( !$bdd->query($requete_insert) ){ // on execute la requete
	echo($bdd->errorInfo()[2]); // si erreur, on affiche l'erreur
}

/*
 * Update
 */
$nouvelle_valeur = $bdd->quote($nouvelle_valeur); // ici un champ de type Text
$pour_ce_champ   = intval($pour_ce_champ); // Ici un champ de type INT

$requete_update = "UPDATE ma_table SET champ1 = $nouvelle_valeur WHERE id_ma_table = $pour_ce_champ";
if(!$bdd->query($requete_update)) { // On execute la requete
	echo($bdd->errorInfo()[2]); // si erreur, on affiche l'erreur
}

/*
 * Delete
 */
$pour_ce_champ   = intval($pour_ce_champ); // Ici un champ de type INT
$requete_delete = "DELETE FROM ma_table WHERE id_ma_table = $pour_ce_champ";
if(!$bdd->query($requete_delete)) { // On execute la requete
	echo($bdd->errorInfo()[2]); // si erreur, on affiche l'erreur
}
