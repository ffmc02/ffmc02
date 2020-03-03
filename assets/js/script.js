$(function () {
    //On déclenche un évènement quand le champ Pseudo perd le focus
    $('#pseudo').blur(function () {
        //Appel Ajax pour traiter le pseudo en POST
        $.post('controllers/indexController.php', //Fichier PHP qui va traiter l'appel AJAX
                {
                    aliasTry: $('#pseudo').val() //Données passées en POST
                },
                function (data) { // Traitement effectué après le retour du PHP
                    if (data != '') { //Si il n'y a pas eu de données cela signifie que le champ pseudo était vide
                        $('#pseudo').after('<p>' + data + '</p>'); // Sous le champ Pseudo j'insère une balise p avec le retour de PHP
                    }
                },
                'text' // Format de retour du PHP vers le JS
                );
    });
});

//********************** pages point noirs*****************************************
$('.listeSigneling').hide();
$('.listeInfra').hide();
$('.listeRoadG').hide();
$('.addDangerPosition').hide();
$('.modifyDangerPosition').hide();
$('.deleteDangerPosition').hide();
$('.addDanger').hide();
$('.modifydanger').hide();
$('.deleteDanger').hide();
$('#identityOption').hide();
$('#extra-Urban').hide();
$('#inUrbanAreas').hide();
$('#infrastructureOption').hide();
$('#optionSignaling').hide();
$('#dangerPositionOption').hide();
$('#slipperyRoad').hide();
let varidentity = false;
$('#identity').click(function () {
    if (varidentity == false) {
        $('#identityOption').show();
        varidentity = true;
    } else {
        $('#identityOption').hide();
        varidentity = false;
    }
});
let varDangerPosition = false;
$('#dangerPosition').click(function () {
    if (varDangerPosition == false) {
        $('#dangerPositionOption').show();
        varDangerPosition = true;
    } else {
        $('#dangerPositionOption').hide();
        varDangerPosition = false;
    }
});
// Bouton en agglomération/Hors agglomération
//let varExtra=false;
$('#extra').click(function () {
//    if (varExtra==false){
    $('#extra-Urban').show();
    $('#inUrbanAreas').hide();
    $('#numberStreet').val("");
    $('#typeStreet').val("");
    $('#nameStreet').val("");
    $('#zipCode').val("");
    $('#city').val("");

});
//let varUrban=false;
$('#urban').click(function () {
//    if(varUrban ==false){
    $('#inUrbanAreas').show();
    $('#extra-Urban').hide();
    $('#numberHighway').val("");
    $('#directionOf').val("");
    $('#comingFrom').val("");

//    varUrban=true;}
//else{  $('#inUrbanAreas').hide();
//    varUrban=false;
//}
});
//absence signalisation 
$('#signaling').click(function () {
//    if(varSignaling==false){
    $('#optionSignaling').show();
    $('#infrastructureOption').hide();
    $('#slipperyRoad').hide();
    $('#slipperyRoad').val("");
    $('#infrastructureOption').val("");

//    varSignaling=true}
//else{ $('#optionSignaling').hide();
//    varSignaling=false;
//}
});
//infrastructure routier
$('#infrastructure').click(function () {
//    if(varInfrastructure==false){
    $('#optionSignaling').hide();
    $('#infrastructureOption').show();
    $('#slipperyRoad').hide();
    $('#optionSignaling').val("");
    $('#slipperyRoad').val("");
});
//sol glissant
$('#slippery').click(function () {
    $('#optionSignaling').hide();
    $('#infrastructureOption').hide();
    $('#slipperyRoad').show();
    $('#optionSignaling').val("");
    $('#infrastructureOption').val("");
});
$('#typesOfDanger').click(function () {
    $('signaling').show();
});
//infrastructure/infrastructureOption
//cachezr la partie conserné 
//************profil user */**************
$('.ModifyUser').hide();
$('#btnModify').click(function () {
    $('.ModifyUser').show();
    $('.detailUser').hide();
});
// lister point noir-----------------------------------------------------
//afficher le formulaire de modification des statues extra urban

$('.formMdodifyStatusExtraUrban').hide();
$('.ModifyStatusExtraUrban').click(function () {
    id = $(this).attr('data-idExtra');
    console.log(id);
    $('#BlackDotExtraUrban' + id).show();
});
$('#modfifyStatusExtraUrban').click(function () {
    $('.formMdodifyStatusExtraUrban').hide();
});
//afficher le formulaire de modification des statues urban
$('.formMdodifyStatusUrban').hide();
$('.ModifyStatusUrban').click(function () {
    idUrban = $(this).attr('data-idUrban');
    console.log(idUrban);
    $('#BlackDotUrban' + idUrban).show();
});
//affichage du formulaire de modificartion du point noir 
//formulaire Urban
$('.formMdodifyBlackDotUrban').hide();
$('.ModifyBlackDotUrban').click(function () {
    idUrban = $(this).attr('data-idUrban');
    console.log(idUrban);
    $('#ModifyBlackDotUrban' + idUrban).show();
});
//formulaire extra urbain 
$('.formMdodifyBlackDotExtraUrban').hide();
$('.ModifyBlackDotExtraUrban').click(function () {
    id = $(this).attr('data-idExtra');
    console.log(id);
    $('#modifyBlackDotExtraUrban' + id).show();
});
$('#modfifyStatusExtraUrban').click(function () {
    $('.formMdodifyStatusExtraUrban').hide();
});
//---------------------------affichages des teareva dana les points noirs
//position du danger
$('#dangerPositionOther').hide();
$('.dangerPosition').click(function () {
    var dangerPositionx = $(this).val();
//    alert(dangerPositionx);
    if (dangerPositionx == 7) {
        $('#dangerPositionOther').show();
    } else {
        $('#dangerPositionOther').hide();
    }
});
//signalisation absante
$('#signalingOther').hide();
$('.signaling').click(function () {
    var signalings = $(this).val();
//    alert(signalings);
    if (signalings == 10) {
        $('#signalingOther').show();
    } else {
        $('#signalingOther').hide();
    }
});
//infrastruture dangereuse
$('#infrastructureOther').hide();
$('.infrat').click(function () {
    var infrats = $(this).val();
//    alert(infrats);
    if (infrats == 20) {
        $('#infrastructureOther').show();
    } else {
        $('#infrastructureOther').hide();
    }
});
//route glissante
$('#slipperyRoadOther').hide();
$('.slipperyRoad').click(function () {
    var slipperyRoads = $(this).val();
//    alert(slipperyRoads);
    if (slipperyRoads == 26) {
        $('#slipperyRoadOther').show();
    } else {
        $('#slipperyRoadOther').hide();
    }
});
//*************************partie moderateur et administrateur-------------------
//gestion des dangers---------------------------------
// liste des danger 
$('#signaling').click(function () {
    $('.listeSigneling').show();
    $('.listeInfra').hide()
    $('.listeRoadG').hide()
});
$('#listerInfrastructure').click(function () {
    $('.listeSigneling').hide();
    $('.listeInfra').show();
    $('.listeRoadG').hide();
});

$('#roadG').click(function () {
    $('.listeSigneling').hide();
    $('.listeInfra').hide();
    $('.listeRoadG').show();

});
// ajout modi sup du danger
$('#btnAddDanger').click(function () {
    $('.addDanger').show();
    $('.modifydanger').hide();
    $('.deleteDanger').hide();
});
$('#btnModifyDanger').click(function () {
    $('.addDanger').hide();
    $('.modifydanger').show();
    $('.deleteDanger').hide();
});
$('#bntDeleteDanger').click(function () {
    $('.addDanger').hide();
    $('.modifydanger').hide();
    $('.deleteDanger').show();
});
//--------------------------------gestion des position du danger----------------
$('#btnAddDangerPosition').click(function () {

    $('.addDangerPosition').show();
    $('.modifyDangerPosition').hide()
    $('.deleteDangerPosition').hide()
});
$('#btnModifyDangerPosition').click(function () {

    $('.addDangerPosition').hide();
    $('.modifyDangerPosition').show();
    $('.deleteDangerPosition').hide();
});
$('#bntDeleteDangerPosition').click(function () {
    $('.addDangerPosition').hide();
    $('.modifyDangerPosition').hide();
    $('.deleteDangerPosition').show();

});
//-----------------------------------------------gestion des evenements -------
$('.addEvent').hide();
$('.listerEvents').hide();
$('#btnReturn').hide();
$('.listeOfPastEvent').hide();
//ajout d'un évenement
$('#btnAddEvents').click(function () {
    $('.addEvent').show();
    $('.listerEvents').hide();
    $('#btnAddEvents').hide();
    $('#btnListerEvents').hide();
    $('#btnReturn').show();
    $('.listeOfPastEvent').hide();
    $('#btnListerEventsPast').hide();
});
//liste des événements future
$('#btnListerEvents').click(function () {
    $('.addEvent').hide();
    $('.listerEvents').show();
    $('#btnAddEvents').hide();
    $('#btnListerEvents').hide();
    $('#btnReturn').show();
    $('.listeOfPastEvent').hide();
    $('#btnListerEventsPast').hide();
});
//liste événement passée
$('#btnListerEventsPast').click(function () {
    $('.addEvent').hide();
    $('.listerEvents').hide();
    $('#btnAddEvents').hide();
    $('#btnListerEvents').hide();
    $('#btnReturn').show();
    $('.listeOfPastEvent').show();
    $('#btnListerEventsPast').hide();
});
//bouton retourne
$('#btnReturn').click(function () {
    $('#btnAddEvents').show();
    $('#btnListerEvents').show();
    $('#btnReturn').hide();
    $('#btnListerEventsPast').show();
    $('.addEvent').hide();
    $('.listerEvents').hide();
    $('.listeOfPastEvent').hide();
});
//mdoal 
//
//--------------------gestion des articles---------------------------
$('#btnReturnArticle').hide();
$('.addArticle').hide();
$('.listerArticle').hide();
//ajouter un article 
$('#btnAddArticle').click(function () {
    $('#btnReturnArticle').show();
    $('#btnListerArticle').hide();
    $('.addArticle').show();
    $('#btnAddArticle').hide();
    $('.listerArticle').hide();
});
//liste des articles future
$('#btnListerArticle').click(function () {
    $('#btnReturnArticle').show();
    $('#btnListerArticle').hide();
    $('.listerArticle').show();
    $('#btnAddArticle').hide();
    $('.addArticle').hide();
});
//bouton retour
$('#btnReturnArticle').click(function () {
    $('#btnReturnArticle').hide();
    $('#btnAddArticle').show();
    $('#btnListerArticle').show();
    $('.addArticle').hide();
    $('.listerArticle').hide();
});

//---------------------------------------------inscription connexion
$('.btnExistCompt').hide();
$('#registration').hide();
$('.btnRegistration').click(function () {
    $('#registration').show();
    $('#connexion').hide();
    $('.btnRegistration').hide();
    $('.btnExistCompt').show();
});

$('.btnExistCompt').click(function () {
    $('#registration').hide();
    $('#connexion').show();
    $('.btnRegistration').show();
    $('.btnExistCompt').hide();
});
//--------------------------------------------------------------------------
//EDITO
$('#btnReturnEdito').hide();
$('.addEdito').hide();
$('.listerEditot').hide();
//ajouter un éditot
$('#btnAddEdito').click(function () {
    $('#btnListerEdito').hide();
    $('.addEdito').show();
    $('#btnReturnEdito').show();
    $('#btnAddEdito').hide();
});
//liste éditot
$('#btnListerEdito').click(function () {
    $('#btnListerEdito').hide();
    $('#btnReturnEdito').show();
    $('#btnAddEdito').hide();
    $('#btnListerEdito').hide();
    $('.listerEditot').show();
});
//bouto, retour
$('#btnReturnEdito').click(function () {
    $('#btnListerEdito').show();
    $('.addEdito').hide();
    $('#btnReturnEdito').hide();
    $('#btnAddEdito').show();
    $('.listerEditot').hide();
});///////////////////////////////////////////---------------------------------
//Category d'éditos
$('#btnReturnEditoCategory').hide();
$('.addCategoryEdito').hide();
$('.listerCategoryEdito').hide();
//bouton ajouter 
$('#btnAddEditoCategory').click(function () {
    $('#btnAddEditoCategory').hide();
    $('#btnListerEditoCategory').hide();
    $('#btnReturnEditoCategory').show();
    $('.addCategoryEdito').show();
});
//liste des categories d'édito
$('#btnListerEditoCategory').click(function () {
    $('.listerCategoryEdito').show();
    $('#btnReturnEditoCategory').show();
    $('#btnListerEditoCategory').hide();
    $('#btnAddEditoCategory').hide();
    });    
//bouton retour
$('#btnReturnEditoCategory').click(function () {
    $('#btnReturnEditoCategory').hide();
    $('.addCategoryEdito').hide();
    $('.listerCategoryEdito').hide();
     $('#btnAddEditoCategory').show();
    $('#btnListerEditoCategory').show();
});  
//-----------------------------category artilce-------------------------------
$('#btnReturnArticleCategory').hide();
$('.addCategoryArticle').hide();
$('.listeCategoryArticle').hide();
//bouton ajouter 
$('#btnAddArticleCategory').click(function () {
    $('#btnAddArticleCategory').hide();
    $('#btnListerArticleCategory').hide();
    $('#btnReturnArticleCategory').show();
    $('.addCategoryArticle').show();
});
//liste des categories d'édito
$('#btnListerArticleCategory').click(function () {
    $('.listeCategoryArticle').show();
    $('#btnReturnArticleCategory').show();
    $('#btnListerArticleCategory').hide();
    $('#btnAddArticleCategory').hide();
    });    
//bouton retour
$('#btnReturnArticleCategory').click(function () {
    $('#btnReturnArticleCategory').hide();
    $('.addCategoryArticle').hide();
    $('.listeCategoryArticle').hide();
     $('#btnAddArticleCategory').show();
    $('#btnListerArticleCategory').show();
});  
// Cartégorie d'événement---------------------+----------------------------------
$('#btnReturnEventCategory').hide();
$('.addEventCategory').hide();
$('.listeEventCategory').hide();
//bouton ajouter 
$('#btnAddEventCategory').click(function () {
    $('#btnAddEventCategory').hide();
    $('#btnListerEventCategory').hide();
    $('#btnReturnEventCategory').show();
    $('.addEventCategory').show();
});
//liste des categories d'évenment-
$('#btnListerEventCategory').click(function () {
    $('.listeEventCategory').show();
    $('#btnReturnEventCategory').show();
    $('#btnListerEventCategory').hide();
    $('#btnAddEventCategory').hide();
    });    
//bouton retour
$('#btnReturnEventCategory').click(function () {
    $('#btnReturnEventCategory').hide();
    $('.addEventCategory').hide();
    $('.listeEventCategory').hide();
     $('#btnAddEventCategory').show();
    $('#btnListerEventCategory').show();
});  
// La presse parle de nous -----------------------------------------------------
$('#btnReturnPressArticle').hide();
$('.addPressArticle').hide();
$('.listPressArticle').hide();
//bouton ajouter 
$('#btnAddPressArticle').click(function () {
    $('#btnAddPressArticle').hide();
    $('#btnListerPressArticle').hide();
    $('#btnReturnPressArticle').show();
    $('.addPressArticle').show();
});
//liste des categories d'évenment-
$('#btnListerPressArticle').click(function () {
    $('.listPressArticle').show();
    $('#btnReturnPressArticle').show();
    $('#btnListerPressArticle').hide();
    $('#btnAddPressArticle').hide();
    });    
//bouton retour
$('#btnReturnPressArticle').click(function () {
    $('#btnReturnPressArticle').hide();
    $('.addPressArticle').hide();
    $('.listPressArticle').hide();
     $('#btnAddPressArticle').show();
    $('#btnListerPressArticle').show();
});  
//Partenaire-----------------------------------------------------------------
$('#btnReturnPartner').hide();
$('.addPartner').hide();
$('.listePartners').hide();
//bouton ajouter 
$('#btnAddPartner').click(function () {
    $('#btnAddPartner').hide();
    $('#btnListerPartner').hide();
    $('#btnReturnPartner').show();
    $('.addPartner').show();
});
//liste
$('#btnListerPartner').click(function () {
    $('.listePartners').show();
    $('#btnReturnPartner').show();
    $('#btnListerPartner').hide();
    $('#btnAddPartner').hide();
    });    
//bouton retour
$('#btnReturnPartner').click(function () {
    $('#btnReturnPartner').hide();
    $('.addPartner').hide();
    $('.listePartners').hide();
     $('#btnAddPartner').show();
    $('#btnListerPartner').show();
});