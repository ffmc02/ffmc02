<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
$formError = array();
$regexId = '/^\d+$/';
$title = 'gestion des positions du danger';
$title='gestion des status';
$listerStatus = new treatment();
//controleur de l'ajout d'un Status
if (isset($_POST['btnNewStatus'])) {
    if (!empty($_POST['addNewStatus'])) {
        $listerStatus->status = htmlspecialchars($_POST['addNewStatus']);
    } else {
        $formError['addNewStatus'] = 'le type de Stauts est incorect';
    }
    if (count($formError) == 0) {
        $successeaddNewStatus = $listerStatus->addStatu();
        if ($successeaddNewStatus == TRUE) {
            $messaageSucessAddNewStatus = 'votre nouvelle postion a étais ajouter avec succes';
        } else {
            $messageErrorAddNewStatus = 'Echec de l\'ajout';
        }
    }
}
// controleur de la modification d'un Status------------------------------------------
if (isset($_POST['bntModifyStatus'])) {
    if (!empty($_POST['newNameOfStatus'])) {
        $listerStatus->status = htmlspecialchars($_POST['newNameOfStatus']);
    } else {
        $formError['newNameOfStatus'] = 'merci de remplir le champs nouveau noms';
    }
    if (!empty($_POST['ModifyStatus'])) {
        if (preg_match($regexId, $_POST['ModifyStatus'])) {
            $listerStatus->id = htmlspecialchars($_POST['ModifyStatus']);
        } else {
            $formError['ModifyStatus'] = 'Merci de selectioner un danger';
        }
    }
    if (count($formError) == 0) {
        $successModifStatus = $listerStatus->modifyStatus();
        if ($successModifStatus == TRUE) {
            $messaageSucess = 'Le nom du status  est bien modifier.';
        } else {
            $messaageError = 'Echec de la modification ';
        }
    }
}
//---------------------supreesion d'un Status-------------------
if (isset($_POST["bntDdeleteStatus"])) {
    if (!empty($_POST['DdeleteStatus'])) {
        if (preg_match($regexId, $_POST['DdeleteStatus'])) {
            $listerStatus->id = htmlspecialchars($_POST['DdeleteStatus']);
        }
    } else {
        $formError['DdeleteStauts'] = 'merci de choisir un Status existant.';
    }
    if (count($formError) == 0) {
        $successDelete = $listerStatus->deleteStatus();
        if ($successDelete == TRUE) {
            $messaageSucess = 'le danger a été suprimer avec succes';
        } else {
            $messaageError = 'echec de la supression';
        }
    }
}
//Affichage des point noir apres modification des statue 
$StatusLister = $listerStatus->listerStatusModify();
