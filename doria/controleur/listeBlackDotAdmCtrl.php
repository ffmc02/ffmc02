<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
$regexId = '/^\d+$/';
//$regexTitle = '/^[a-zA-ZÀ-ÖØ-öø-ÿ- ]+$/';
$formError = array();
$title = 'Liste des points noirs Admin';
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
//------------------------modification du point noir urbain------------
if(isset($_POST['modifyUrban'])){
    $mdofiyBlackDotUrban = new blackDot();
    if(!empty($_POST['modifyTitle'])){
        $mdofiyBlackDotUrban->title = htmlspecialchars($_POST['modifyTitle']);
        if(!empty($_POST['idBlackDotUrban']) && preg_match($regexId, $_POST['idBlackDotUrban'])){
            $mdofiyBlackDotUrban->id= htmlspecialchars($_POST['idBlackDotUrban']);
        }
    } else {
    $formError['title']='votre titre ne pas correct';    
    }
    if (count($formError) == 0) {
        if($mdofiyBlackDotUrban->modifyBlackDot()){
            $messaageSucess='votre point noir a été modifier avec succés';
        } else {
            $formError['title']='une erreur c\'est produite contacter l\'administrateur du site';
        }
    }
}
//----------modifaction du point noir extra urbain 
if(isset($_POST['modifyExtraUrban'])){
    $mdofiyBlackDotExtraUrban = new blackDot();
    if(!empty($_POST['modifyTitleExtraUrban'])){
        $mdofiyBlackDotExtraUrban->title = htmlspecialchars($_POST['modifyTitleExtraUrban']);
        if(!empty($_POST['idBlackDotExtraUrban']) && preg_match($regexId, $_POST['idBlackDotExtraUrban'])){
            $mdofiyBlackDotExtraUrban->id= htmlspecialchars($_POST['idBlackDotExtraUrban']);
        }
    } else {
    $formError['title']='votre titre ne pas correct';    
    }
    if (count($formError) == 0) {
        if($mdofiyBlackDotExtraUrban->modifyBlackDot()){
            $messaageSucess='votre point noir a été modifier avec succés';
        } else {
            $formError['title']='une erreur c\'est produite contacter l\'administrateur du site';
        }
    }
}
 $listerStatus = new treatment();
//Affichage des point noir apres modification des statue 
$StatusLister = $listerStatus->listerStatusModify();
//lecture des point noirs
$ListerBlackDotUrban = $listeBlackDots->listeBlackdotUrban();
$countBlackDotUrban= $listeBlackDots->countBlackDotUrban();
        if (isset($_GET['pageChoiceUrban']) && $_GET['pageChoiceUrban'] <= $countBlackDotUrban->nbrBlackDoturban && $_GET['pageChoiceUrban'] > 0) {    
    $pageChoice = ((htmlspecialchars($_GET['pageChoiceUrban'])-1)*2);
    // calcule qui permet d'afficher le premier User
    $ListerBlackDotUrban = $listeBlackDots->listeBlackdotUrban($pageChoice); // affichage des pages en fonction du nombre d'id
}
else {
  $ListerBlackDotUrban = $listeBlackDots->listeBlackdotUrban();
}
$ListerBlackDotExtraUrban = $listeBlackDots->listeBlackdotExtraUrban();
$countBlackDotExtraUrban= $listeBlackDots->countBlackDotExtraUrban();
        if (isset($_GET['pageChoiceExtraUrban']) && $_GET['pageChoiceExtraUrban'] <= $countBlackDotExtraUrban->nbrBlackDotExtraUrban && $_GET['pageChoiceExtraUrban'] > 0) {    
    $pageChoice = ((htmlspecialchars($_GET['pageChoice'])-1)*2);
    // calcule qui permet d'afficher le premier User
    $ListerBlackDotExtraUrban = $listeBlackDots->listeBlackdotExtraUrban($pageChoice); // affichage des pages en fonction du nombre d'id
}
else {
  $ListerBlackDotExtraUrban = $listeBlackDots->listeBlackdotExtraUrban();
}
$listerStatusBlackDot = $listeBlackDots->listerBlackDotBytitle();

