<?php
//	$json_source = file_get_contents('http://localhost/liste_course/utilisateur.json');
//	$json_data = json_decode($json_source, true);
//	$json_name = $json_data['nom'];

	require_once('./connexion.php');
$nb_ligne = 'select count(nom) from connecte';
if ($res=$bdd->query($nb_ligne)){
	if ($res->fetchColumn() > 0) {
		$req="select * from connecte";
		$rep=$bdd->query($req);
		$lignes=$rep->fetchall();
		$c_nom=$lignes[0]['nom'];

	}
	else {
	
		header('Location: u_connect.php');

	
	}



} 
else {

echo($bdd->errorInfo()[2]);
}

?>

<script>



</script>


<nav class="navbar navbar-expand-lg navbar-light bg-light" id='barrenav'>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul id="ulliste" class="navbar-nav mr-auto">
			<li class="nav-item">
				<a id="p_index" class="nav-link" href="./index.php">Acceuil</a>
			</li>
			<li class="nav-item">
				<a id="p_inscription" class="nav-link" href="./ajout.php">Ajouter un produit</a>
			</li>	
			<li class="nav-item">
				<a id="p_test" class="nav-link" href="./test.php">Page de test</a>
			</li>
			<li class="nav-item">
				<a id="p_n_user" class="nav-link" href="./new_user.php">Enregister un nouvel utilisateur</a>
			</li>
		</ul>
	</div>

 </nav>
 <div class="col-10 text-right">
<?php
	
	echo '<p>Salute   '.$c_nom.'</p>';

	echo '<a class="navbar-brand" href="./deconnecte.php">Deconnexion<i class="fa fa-power-off" aria-hidden="true"></i></a>';


?>
 </div>
