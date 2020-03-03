<?php

//ini_set('display_errors', 'on');
//error_reporting(E_ALL);
$title = 'Gestion des danger';
$formError = array();
$regexId = '/^\d+$/';
//liste des type de danger 
$listeDanger = new danger();


//ajouter un danger 
$addTypeDangers = new categorydanger();
if (isset($_POST['btnNewTypeDanger'])) {
    if (!empty($_POST['newTypeDanger'])) {
//            && preg_match($regexTitle, $_POST['titleBlackDot'])
        $addTypeDangers->typeCategoryDanger = htmlspecialchars($_POST['newTypeDanger']);
        //je verifie qu'un titre a été rentré et qu'il respecte la regex si non je met un message d'erreur 
    } else {
        $formError['newTypeDanger'] = 'merci de remplir le champs quel nouveau danger  avec des lettres  sans caratére speciaux';
    }
    if (!empty($_POST['danger'])) {
        if (preg_match($regexId, $_POST['danger'])) {
            $addTypeDangers->idDanger = htmlspecialchars($_POST['danger']);
        } else {
            $formError['newTypeDanger'] = 'Le champs cathégorienon valide';
        }
    } else {
        $formError['newTypeDanger'] = 'mercie de selectionner une catégory de danger';
    }
    if (count($formError) == 0) {
        $sucessAddTypeDanger = $addTypeDangers->addTypeDanger();
        if ($sucessAddTypeDanger == TRUE) {
            $messaageSucess = 'votre nouveau nom de point noir a été ajouté avec succés';
        } else {
            $messaageSucess = 'Echec de l\'ajout';
        }
    }
}

//modifier un danger
$modifydanger = new categorydanger();
if (isset($_POST['btnModifyDanger'])) {
    if (!empty($_POST['newNameDanger'])) {
        $modifydanger->typeCategoryDanger = htmlspecialchars($_POST['newNameDanger']);
    } else {
        $formError['newNameDanger'] = 'merci de remplir le champs nouveau noms';
    }
    if (!empty($_POST['modifydanger'])) {
        if (preg_match($regexId, $_POST['modifyDanger'])) {
            $modifydanger->id = htmlspecialchars($_POST['modifyDanger']);
        } else {
            $formError['modifydanger'] = 'Merci de selectioner un danger';
        }
    }
    if (count($formError) == 0) {
        $successModifyDanger = $modifydanger->modifyDangerType();
        if ($successModifyDanger == TRUE) {
            $messaageSucess = 'Le nom du danger est bien modifier.';
        } else {
            $messaageSucess = 'Echec de la modification ';
        }
    }
}

//---------------------supreesion d'un danger-------------------
if (isset($_POST["bntDeleteDanger"])) {
    echo 'proute';
    if (!empty($_POST['deleteDanger'])) {
        if (preg_match($regexId, $_POST['deleteDanger'])) {
            $modifydanger->id = htmlspecialchars($_POST['deleteDanger']);
        }
    } else {
        $formError['deleteDanger'] = 'merci de choisir un danger existant.';
    }
    if (count($formError) == 0) {
        $successDelete = $modifydanger->deleteDanger();
        if ($successDelete == TRUE) {
            $messaageSucess = 'le danger a été suprimer avec succes';
        } else {
            $messaageSucess = 'echec de la supression';
        }
    }
}
//liste des type de danger 
$listerDangerType = $listeDanger->listeDanger();
//liste de tout les danger
$listerTypeDangers = $addTypeDangers->listerTypeDanger();
//boucle signalisation
$listeDangerPositionByIdDanger = $addTypeDangers->SignlingDangerListe();
//var_dump($listeDangerPositionByIdDanger);
//boucle infrastructure
$listeinfrastructure = $addTypeDangers->infrastureDangerListe();
//var_dump($listeinfrastructure);
//liste des chaussé glissante
$listeDangerRoad = $addTypeDangers->roadDangerListe();
