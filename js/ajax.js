jQuery(function($) {

	trier_ajax();
});


function trier_ajax(){

	jQuery('.trier').on('click',function(){
		//var id = jQuery(this).attr('class').split(' ')[0].split('_')[1];
		//var id = jQuery(this).attr('data-idmodif');
		
		var colonne = jQuery(this).attr('class').split(' ')[0].split('_')[1];
		var sens = jQuery(this).attr('class').split(' ')[1];
		var ancien_sens = sens;

		console.log(colonne);
		console.log(sens);
//		var nouveau_nom = jQuery('input.nouveau_nom_'+id).val();

//		var coche = 'non';
//		if( jQuery(this).is(':checked') ){
//			coche = 'oui';
//		}

		if (sens == 'asc') {
			sens = 'desc';
		}
		else {
			sens = 'asc';
		}

		jQuery(this).removeClass(" "+ancien_sens+" trier");
		jQuery(this).addClass(" "+sens+" trier");
	
		var url_action = "./trier.php";
		var T_mes_donnees = {
			colonne:    colonne,
			sens:       sens
		};

		var ma_requete_ajax = jQuery.ajax({
			url: url_action, // url du fichier cible
			data: T_mes_donnees, // donnees envoyes au serveur => au fichier : url_action
			dataType: 'json',
			error: function(xhr, status, error){
			
			},
			success: function(data, status, xhr){

			},
		});
	});
}


