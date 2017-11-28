// Doc:
// http://api.jquery.com/jQuery.ajax/
// https://api.jquery.com/category/ajax/

jQuery(function($) {
	var ma_superbe_variable = "cci";

	// appelle la fonction mon_ajax avec l'argument : ma_superbe_variable
	mon_ajax(ma_superbe_variable);
});

function mon_ajax(ma_variable_3){
	// ici ma_variable_3 = ma_superbe_variable !
	console.log(ma_superbe_variable); // erreur car non definie dans cette fonction
	console.log(ma_variable_3); // = cci


	var url_action = "./mon_action.php";
	var ma_variable_2 = "coucou";
	var T_mes_donnees = {
		variable1: "titi",
		variable2: ma_variable_2,
		variable3: 124,
		variable4: ma_variable_3
	};

	var ma_requete_ajax = jQuery.ajax({
		url: url_action, // url du fichier cible
		data: T_mes_donnees, // donnees envoyes au serveur => au fichier : url_action
		async: true, // defaut = true : requete asynchrone
		dataType: 'string', // defaut : string : format de retour du serveur possible : (xml, json, script, or html)
		method: 'GET', // defaut : GET. Methode HTTP, possible : "POST", "GET", "PUT"

		complete: function(xhr, status ){
			// Function appelee quand la requete est terminee
			// apres : success et error !
			// xhr : objet
			// status : "success", "notmodified", "nocontent", "error", "timeout", "abort", or "parsererror"
		},
		error: function(xhr, status, error){
			// Function appelee quand la requete est en erreur
			// xhr : objet jQuery
			// status : type d'erreur : (null, "timeout", "error", "abort", and "parsererror")
			// exception
		},
		success: function(data, status, xhr){
			// Function appelee quand la requete est reussie
			// data : donnees retournees par le serveur dans le format : dataType
			//
		},
		statusCode: {
			404: function() {
				alert( "page not found" );
			}
		}
	});
	// possibilite de remplacer :
	// success => done
	// error => fail
	// complete => always
	// de cette manière jQuery >= 1.8

	ma_requete_ajax.always(function(xhr, status){
		//idem : complete
	});

	ma_requete_ajax.fail(function(xhr, status, error){
		//idem: error
	});

	ma_requete_ajax.done(function(data, status){
		// idem : success
	});

}
