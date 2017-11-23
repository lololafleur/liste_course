

/*
Récupération de la liste des images dans le répertoire
*/

var reponse;

var mesimages = new Array();
var lanav = new Array();
var k;
var i;

var lesliens = new Object();

mesimages[0]=("./images/carte.jpg",
"Carte postale de longpré-les-corps dans la somme, années 30",
"Carte postale");


mesimages[1]=("./images/devices.png",
"Méli-mélo de téléphones portables et assistans numériques",
"Téléphones");

mesimages[2]=("./images/ecureuil.png",
"Ecureuil roux mangeant une chataigne en fermant les yeux",
"Ecureuil");

mesimages[3]=("./images/nuage.jpg",
"groupement de nuages dans un ciel bleu",
"nuage");

mesimages[3]=("./images/mat.jpg",
"Photo en noir et blanc d'une personne lisant son journal accroché à la moitié du mat d'un voilier",
"mat");


function get_la_liste(typeliste)
{
	// alert(typeliste)
	if (typeliste == "listeh")
	{
		$('#image_affiche').hide();
		$('#liste_affiche').show();
	}
	else
	{
	$('#image_affiche').show();
	$('#liste_affiche').hide();
	}
}


function creer_la_liste()
{
	for ( i in mesimages) {
		document.write("<li>'" + mesimages[i] [1] + "'</li>");
	}
}

function cache(lobjet)
{
	$('#container img').each(function(){
		switch (lobjet)
		{
			case "image":
			// console.log('switchon');
			document.all.switchon.className = "switchoff";
			$('.switchoff').css({'transform': 'rotate(180deg)'});
			$('.card').addClass("media-list").removeClass("card");
			$('.limg').addClass('limgl').removeClass('limg')
			$('.selection').empty().append('<h2><i class="fa fa-file-image-o switchoff" id="switchon"> Afficher les images</i></h2>');
			$.cookie('affiche_media',null);
			$.cookie('affiche_media','forme_liste');
			break;

			case "liste":
			// console.log('switchoff');
			document.all.switchon.className = "switchon";
			$('.switchon').css({'transform': 'rotate(0deg)'});
			$('.media-list').addClass("card").removeClass("media-list");
			$('.limgl').addClass('limg').removeClass('limgl')
			$('.selection').empty().append('<h2><i class="fa fa-list-ul switchon" id="switchon"> Afficher la liste</i></h2>');
			$.cookie('affiche_media',null);
			$.cookie('affiche_media','forme_image');
			break;
		}
// $("#switchon").mouseOver( function({
	// $("#switchon").css('cursor','pointer');
		
// });

// $("#switchon").mouseOut( function({
	// $(this).css('cursor','auto');
		
// });
// if (lobjet="image")
// {
// console.log('switchon');

// document.all.switchon.className = "switchoff";
// $('.switchoff').css({'transform': 'rotate(180deg)'});
// }
// else{
// console.log('switchoff');
// document.all.switchon.className = "switchon";
// $('.switchon').css({'transform': 'rotate(0deg)'});
// }

	});
}

function lecture_form()
{

	machaine ="Votre nom est :";
	machaine = machaine + document.forms['inscription_formulaire'].elements['nom_f'].value;
	machaine = machaine+"\n"+"Votre prénom est :";
	machaine = machaine + document.forms['inscription_formulaire'].elements['prenom_f'].value;
	if (document.forms['inscription_formulaire'].elements['n_jour_f'].value == 00)
	{
		alert("Vous n'avez pas indiqué votre jour de naissance");
		return('false');
	}
	else
	{
		machaine = machaine+"\n"+"Votre jour est :";
		machaine = machaine + document.forms['inscription_formulaire'].elements['n_jour_f'].value;
	}

	alert(machaine);

}

var ladiv;
var paragraphe = new Array();


var i = 0;

function table_matiere()
{

/*$("div").each(function(){
ladiv = $(this).className;

if (ladiv = "parag")
{
i==i+1;
paragraphe[i] = $(this).id;

}
else
{}
})*/

	$('.contenu_c h2, .contenu_c h3').each(function(){
		i = i+1;
		var actuel = $(this);
		actuel.attr("id", "title"+i);
		$(".latdm").append("<li><a id='link"+i+"' href='#title"+i+"' title='"+actuel.html() +"'>"+actuel.html()+"</a></li>");
	});




/*$('.contenu_c h3').each(function(){
i = i+1;
var actuel = $(this);
actuel.attr("id", "title"+i);
$(".latdm").append("<li style=text-aling:right><a id='link"+i+"' href='#title"+i+"' title='"+actuel.html() +"'>"+actuel.html()+"</a></li>");

});
*/
}

function droits_fichier()
{

	drtexte='';
	droct = '';
	pro = 0;

	/*
	************************************
	propriétaire
	************************************
	*/
	calcul_droit('o');

	drtexte = drtexte + prot;
	droct = droct + pro;

	/*
	************************************
	groupe
	************************************
	*/
	calcul_droit('g');
	
	drtexte = drtexte + prot;
	droct = droct + pro;

	/*
	************************************
	everyone
	************************************
	*/
	calcul_droit('a');

	drtexte = drtexte + prot;
	droct = droct + pro;


	document.forms['chmod'].elements['rwx'].value = drtexte;
	document.forms['chmod'].elements['oct'].value = droct;
}

var pro;
var prot;
var drtexte;
var droct;

function calcul_droit(champ)
{
	lire = champ+'r';
	ecrire = champ+'w';
	execut = champ+'x';


	if (document.forms['chmod'].elements[lire].checked == true)
	{
		por = 1;
		port = "r";
	}
	else
	{
		por = 0;
		port = "-";
	}

	if (document.forms['chmod'].elements[ecrire].checked == true)
	{
		pow = 2;
		powt = "w";
	}
	else
	{
	pow = 0;
	powt = "-";
	}

	if (document.forms['chmod'].elements[execut].checked == true)
	{
		pox = 4;
		poxt = "x";
	}
	else
	{
		pox = 0;
		poxt = "-";
	}

	pro = por + pow + pox;

	prot = port + powt + poxt;
	pro = pro.toString();


}

// ***************************************************
// chargement d'une page dans un bloc
// ***************************************************

function charge_bloc(lebloc, lapage) {
		$(document).ready( function(){
			switch (lebloc) {
				
				case "#tete":
				lapage = "entete.html";
				break;
				
				case "#fin":
				lapage="pieddepage.html";
				break;
				
				default:
				
				break;
			};
			// console.log(lebloc);
			// console.log(lapage);
		$(lebloc).load(lapage);
			
			
		});
	
	
}

// ***************************************************
// Surbrillance de la barre de menu
// ***************************************************

function trouve_la_page(lapage) {
	$(document).ready( function(){
	
	// **********************************************
		// ma solution
	// **********************************************
	
	// lesliens = document.getElementsByClassName("nav-link");
	// for (i=0; i < lesliens.length;i++){
		// reponse = (lesliens[i]).toString().split("/").pop();
		// debut=reponse.indexOf(".");
		// lareponse=reponse.slice(0,debut);
			
		// switch (reponse) {
			
			// case lapage:
				// var leid = "#"+lareponse;
				// $(".nav-link").removeClass("text-white bg-dark");
				// $(leid).addClass("text-white bg-dark");
				// break;
			
						
		// };
	// }
		
		$('nav li a').each( 
		function () {
			reponse=$(this).attr('href').split('/').pop();
			if (reponse == lapage) {
				$(this).addClass ("text-white bg-dark");
				
			}
			
		});
		
		

	});
	}


function menp_table(thetable){
	// register modal component
// Vue.component('modal', {
  // template: '#modal-template'
// })

// start app
// new Vue({
  // el: '#app',
  // data: {
    // showModal: false,
	// selected: lalangue
  // }
// })

	// var lalangue = document.getElementsByClassName("langue").selectedIndex;
	thetable = "#"+thetable;
		$(thetable).DataTable({
		language: {
		url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/French.json'}
		
		// language: {
			// processing:     "Traitement en cours...",
			// search:         "Rechercher&nbsp;:",
			// lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
			// info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
			// infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
			// infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
			// infoPostFix:    "",
			// loadingRecords: "Chargement en cours...",
			// zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
			// emptyTable:     "Aucune donnée disponible dans le tableau",
			// paginate: {
				// first:      "Premier",
				// previous:   "Pr&eacute;c&eacute;dent",
				// next:       "Suivant",
				// last:       "Dernier"
			// },
			// aria: {
				// sortAscending:  ": activer pour trier la colonne par ordre croissant",
				// sortDescending: ": activer pour trier la colonne par ordre décroissant"
			// }
		// }
		

		
		
	
	
	
	
 });
	
}




