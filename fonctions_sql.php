<?php
//Liste des fonctions :

//ouvre_base : initie une connexion sql aves la base donnée en paramètre ($labase)

//ferme_base : arrête la connexion sql avec la base donnée en paramètre ($labase)

//rempli_select : à l'intérieur d'une balise select, rempli automatiquement la liste option avec les valeurs retournées
//				d'une requete exécutée précédement ($resultat_requete). Généralement le champ ($champ_value) correspond à l'index 
//				et le champ ($champ_affiche) à ce qui sera affiché dans la liste
				

//mémento sql :

//-- update specific data with the WHERE clause
//UPDATE table1 SET col1 = 1 WHERE col2 = 2
//-- insert values manually
//INSERT INTO table1 (ID, FIRST_NAME, LAST_NAME)
//VALUES (1, ‘Rebel’, ‘Labs’);
//-- or by using the results of a query
//INSERT INTO table1 (ID, FIRST_NAME, LAST_NAME)
//SELECT id, last_name, first_name FROM table2


//-- filter your columns
//SELECT col1, col2, col3, ... FROM table1
//-- filter the rows
//WHERE col4 = 1 AND col5 = 2
//-- aggregate the data
//GROUP by …
//-- limit aggregated data:
//HAVING count(*) > 1
//-- order of the results
//ORDER BY col2

//-- convert strings to dates:
//TO_DATE (Oracle, PostgreSQL), STR_TO_DATE (MySQL)
//-- return the first non-NULL argument:
//COALESCE (col1, col2, “default value”)
//-- return current time:
//CURRENT_TIMESTAMP
//-- compute set operations on two result sets
//SELECT col1, col2 FROM table1
//UNION / EXCEPT / INTERSECT
//SELECT col3, col4 FROM table2;
//Union - returns data from both queries
//Except - rows from the first query that are not present
//in the second query
//Intersect - rows that are returned from both queries





function ouvre_base ($labase){
	
	$ligne_c=('mysql:host=localhost;dbname="' . $labase . '", "root"');
	
	$base=new PDO($ligne_c);
}

function ferme_base ($labase){
	
	$labase = null;
}

function rempli_select ($resultat_requete, $champ_value, $champ_affiche){
	while ( $resultat_requete = $resultat->fetch() ) {
					
		echo '<option value="'.$resultat[$champ_value].'">'.$resultat[$champ_affiche] ."</option>";
	};
	
	
}

