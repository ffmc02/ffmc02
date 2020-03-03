<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
$regexId = '/^\d+$/';
$formError = array();
$title = 'Liste des points noirs';
$listeBlackDots = new blackDot();
//j'instentie la class blackDot 
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
     var_dump($_POST['idBlackDotUrban']);
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
//pagination black dot urban
$numberPagesUrban= $listeBlackDots->countBlackDotUrban();
$ListerBlackDotUrban = $listeBlackDots->listeBlackdotUrban();

$listerStatusBlackDots = $listeBlackDots->listerBlackDotBytitle();//lecture des point noirs
$ListerBlackDotUrban = $listeBlackDots->listeBlackdotUrban();
$countBlackDotUrban= $listeBlackDots->countBlackDotUrban();
        if (isset($_GET['pageChoiceUrban']) && $_GET['pageChoiceUrban'] <= $countBlackDotUrban->nbrBlackDoturban && $_GET['pageChoiceUrban'] > 0) {    
    $pageChoice = ((htmlspecialchars($_GET['pageChoiceUrban'])-1)*3);
    // calcule qui permet d'afficher le premier User
    $ListerBlackDotUrban = $listeBlackDots->listeBlackdotUrban($pageChoice); // affichage des pages en fonction du nombre d'id
}
else {
  $ListerBlackDotUrban = $listeBlackDots->listeBlackdotUrban();
}
//pagination black dot Extra Urbain
$ListerBlackDotExtraUrban = $listeBlackDots->listeBlackdotExtraUrban();
$countBlackDotExtraUrban= $listeBlackDots->countBlackDotExtraUrban();
        if (isset($_GET['pageChoiceExtraUrban']) && $_GET['pageChoiceExtraUrban'] <= $countBlackDotExtraUrban->nbrBlackDotExtraUrban && $_GET['pageChoiceExtraUrban'] > 0) {    
    $pageChoice = ((htmlspecialchars($_GET['pageChoiceExtraUrban'])-1)*3);
    // calcule qui permet d'afficher le premier User
    $ListerBlackDotExtraUrban = $listeBlackDots->listeBlackdotExtraUrban($pageChoice); // affichage des pages en fonction du nombre d'id
}
else {
  $ListerBlackDotExtraUrban = $listeBlackDots->listeBlackdotExtraUrban();
}
 $listerStatus = new treatment();
//Affichage des point noir apres modification des statue 
$StatusLister = $listerStatus->listerStatusModify();
//lecture des point noirs
//$ListerBlackDotUrban = $listeBlackDots->listeBlackdotUrban();
//$ListerBlackDotExtraUrban = $listeBlackDots->listeBlackdotExtraUrban();
$listerStatusBlackDot = $listeBlackDots->listerBlackDotBytitle();

