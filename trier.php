<?php

require_once('./connexion.php');
$colonne = '';
if (isset($_GET['colonne'])) {
	$colonne = $_GET['colonne'];
}

$sens = '';
if (isset($_GET['sens'])) {
	$sens = $_GET['sens'];
}




$requete = "select * from produit ORDER BY {$colonne} {$sens}";
if ( $rep=$bdd->query($requete) ){
	echo($bdd->errorInfo()[2]); // si erreur, on affiche l'erreur
}

header('Content-Type: application/json');
echo json_encode($rep->fetchall());
