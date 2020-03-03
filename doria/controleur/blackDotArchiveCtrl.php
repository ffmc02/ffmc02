<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);
$regexId = '/^\d+$/';
$formError = array();
$title = 'Liste des points noirs archivé';
$listeBlackDots = new blackDot();
//Modification du statut du points noirs hors agglo
if (isset($_POST['modfifyStatusExtraUrban'])) {
    $listerStatus = new treatment();
    $ModifyStatus = new blackDot();
     $ModifyStatus->id = htmlspecialchars($_POST['idBlackDotExtra']);
    if (!empty($_POST['NewStatus']) && preg_match($regexId, $_POST['NewStatus'])) {
        $ModifyStatus->idTreatment = htmlspecialchars($_POST['NewStatus']);
    } else {
        $formError['NewStatus'] = 'Le statut choisi n\'est pas référencé';
    }
    if (count($formError) == 0) {
        $ModifyStatusBD = $ModifyStatus->modifyStatusBlackDot();// extra
        if ($ModifyStatusBD == TRUE) {
            $formError['NewStatus'] = 'Statut modifié avec succés';
        }
    } else {
        $formError['NewStatus'] = 'Echec de la modification du statut';
    }
}
//modifcation statut BD Urban----------------------------------------------------
if (isset($_POST['modfifyStatusUrban'])) {
    $listerStatus = new treatment();
     $ModifyStatusUrban = new blackDot();
     $ModifyStatusUrban->id = htmlspecialchars($_POST['idBlackDotUrban']);
    if (!empty($_POST['NewStatusUrban']) && preg_match($regexId, $_POST['NewStatusUrban'])) {
         $ModifyStatusUrban->idTreatment = htmlspecialchars($_POST['NewStatusUrban']);
    } else {
        $formError['NewStatus'] = 'Le statut choisi n\'est pas référencé';
    }
    if (count($formError) == 0) {
        $ModifyStatusBD =  $ModifyStatusUrban->modifyStatusBlackDot();// URBAN
        if ($ModifyStatusBD == TRUE) {
            $formError['NewStatus'] = 'Statut modifié avec succés';
        }
    } else {
        $formError['NewStatus'] = 'Echec de la modification du statut';
    }
}

 $listerStatus = new treatment();
//Affichage des point noir apres modification des statue 
$StatusLister = $listerStatus->listerStatusModify();
//lecture des point noirs
$ListerBlackDotUrban = $listeBlackDots->listeBlackdotUrbanArchive();
$ListerBlackDotExtraUrban = $listeBlackDots->listeBlackdotExtraUrbanArchive();
$listerStatusBlackDot = $listeBlackDots->listerBlackDotBytitle();

