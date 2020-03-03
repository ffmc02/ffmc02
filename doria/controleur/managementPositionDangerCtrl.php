<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);
$formError = array();
$regexId = '/^\d+$/';
$title = 'gestion des positions du danger';
$addPositionDanger = new positionDanger();

//controleur de l'ajout d'une position de danger
if (isset($_POST['btnaddPositionDanger'])) {
    if (!empty($_POST['addPositionDanger'])) {
        $addPositionDanger->typeDangerPosition = htmlspecialchars($_POST['addPositionDanger']);
    } else {
        $formError['addPositionDanger'] = 'le type de postition est incorect';
    }
    if (count($formError) == 0) {
        $successeAddPositionDanger = $addPositionDanger->addPositionDanger();
        if ($successeAddPositionDanger == TRUE) {
            $messaageSucessAddPositionDanger = 'votre nouvelle postion a étais ajouter avec succes';
        } else {
            $messageErroraddPositionDanger = 'Echec de l\'ajout';
        }
    }
}
// controleur de la modification d'une position de dangeer------------------------------------------
if (isset($_POST['bntModifyDangerPosition'])) {
    if (!empty($_POST['newNameOfPositionDanger'])) {
        $addPositionDanger->typeDangerPosition = htmlspecialchars($_POST['newNameOfPositionDanger']);
    } else {
        $formError['newNameDanger'] = 'merci de remplir le champs nouveau noms';
    }
    if (!empty($_POST['modifyDangerPosition'])) {
        if (preg_match($regexId, $_POST['modifyDangerPosition'])) {
            $addPositionDanger->id = htmlspecialchars($_POST['modifyDangerPosition']);
        } else {
            $formError['modifydanger'] = 'Merci de selectioner un danger';
        }
    }
    if (count($formError) == 0) {
        $successModifyDangerPosition = $addPositionDanger->modifyDangerPosition();
        if ($successModifyDangerPosition == TRUE) {
            var_dump($successModifyDangerPosition);
            $messaageSucess = 'Le nom de la postion  est bien modifier.';
        } else {
            $messaageError = 'Echec de la modification ';
        }
    }
}
//---------------------supreesion d'un danger-------------------
if (isset($_POST["bntDdeleteDangerPositionr"])) {
    echo 'proute';
    if (!empty($_POST['DdeleteDangerPositionr'])) {
        if (preg_match($regexId, $_POST['DdeleteDangerPositionr'])) {
            $addPositionDanger->id = htmlspecialchars($_POST['DdeleteDangerPositionr']);
        }
    } else {
        $formError['DdeleteDangerPositionr'] = 'merci de choisir un danger existant.';
    }
//    var_dump($_POST);
//    var_dump($addPositionDanger);
    if (count($formError) == 0) {
        $successDelete = $addPositionDanger->deletePosition();
        var_dump($successDelete);
        if ($successDelete == TRUE) {
            $messaageSucess = 'le danger a été suprimer avec succes';
        } else {
            $messaageErrorDeletePosition = 'echec de la supression';
        }
    }
}
 //liste des position 
$listerPositionDanger = $addPositionDanger->listerPositionDanger(); 