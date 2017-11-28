<?php

/*
 * Traitement de $_GET
 * variable d'environnement, dans l'URL du type :
 * ?variable1=toto&variable2=titi
 */

/*
 * Traitement de $_POST
 * variables transmises via le protocole HTTP
 */

$T_variable_s = ['variable_1', 'variable_2'];
foreach ($T_variable_s as $a_tester) {
	if (isset($_GET[$a_tester])) {  // si $a_tester=variable_1,
		$$a_tester = $_GET[$a_tester]; // on cree la variable : $variable_1, etc ...
	}
	elseif (isset($_POST[$a_tester])) { // idem pour post
		$$a_tester = $_POST[$a_tester];
	}
	else {
		$$a_tester = FALSE;
	}
}


// On peut maintenant utiliser ces variables pour faire un CRUD
if ($variable_1) {
	// Action CRUD ou autre
}

if ($variable_2) {
	// Action CRUD ou autre
}

if ($variable_1 and $variable_2) {
	// Action CRUD ou autre
}

if ($variable_1) {
	// des actions
	if ($variable_2) {
		//des actions
	}
}
