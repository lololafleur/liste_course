<?php

	require_once('./connexion.php');

	echo '<script>';
    	echo 'if (confirm("Voulez vous vous déconnecter ?") == true) {';
	$req='delete from connecte';
	$rep=$bdd->exec($req);
	header ('location: index.php');
    	echo '} else {';
    	echo '}';
	echo '</script>';
