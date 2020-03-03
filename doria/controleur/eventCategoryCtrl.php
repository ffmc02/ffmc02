<?php
$title='gestion des categorie de l\'événement';
ini_set('display_errors', 'on');
$regexId = '/^\d+$/';
error_reporting(E_ALL);
$formError = array();
//ajouut d'une catégorie d'événement
 if (isset($_POST['addEventCategory'])) {
   $addEventCategory = new eventCategory();
    if (!empty($_POST['nameEvent'])) {
        $addEventCategory->nameCategoryEvents = htmlspecialchars($_POST['nameEvent']);
    } else {
        $formError['Error'] = 'Merci de remplir le champs Noms de la catégorie';
    }
    if (count($formError) == 0) {
        if ($addEventCategory->addCategoryEvent()) {
            $messaageSucess = 'votre catégorie  a bien été créer ';
        } else {
            $echec = 'L\'enregistement de voitre categorie a échouer contacter l\'administrateur du site par mail ffmc02@outlook.fr avec le code erreur catégorie Event! ';
        }
    }
}
//modification d'un événement
//modification
if (isset($_POST['modifyCategoryevent'])) {
    $modifyCategoryEvent = new eventCategory();
    if (!empty($_POST['newNameCategoryEvent'])) {
        $modifyCategoryEvent->nameCategoryEvents = htmlspecialchars($_POST['newNameCategoryEvent']);
    } else {
        $formError['Error'] = 'Merci de remplir le champs Noms de la catégorie';
    }
    if (!empty(['idCategoryEvent'])) {
        if (preg_match($regexId, $_POST['idCategoryEvent'])) {
            $modifyCategoryEvent->id = htmlspecialchars($_POST['idCategoryEvent']);
        }
    }
    if (count($formError) == 0) {
        if ($modifyCategoryEvent->modifyCategoryEvent()) {
            $messaageSucess = 'votre catégorie  a bien été modifiée ';
        } else {
            $echec = 'L\'enregistement de voitre categorie a échouer contacter l\'administrateur '
                    . 'du site par mail ffmc02@outlook.fr avec le code erreur catégorie Event! ';
        }
    }
}
//Supression d'une catégorie
if (isset($_POST['deleteCategoryEvent'])) {
    $deletCategoryEvent = new eventCategory();
    if (!empty(['idCategoryEvent'])) {
        if (preg_match($regexId, $_POST['idCategoryEvent'])) {
            $deletCategoryEvent->id = htmlspecialchars($_POST['idCategoryEvent']);
        }
    }
    if ($deletCategoryEvent->deleteCategoryEvent()) {
        $messaageSucess = 'Votre catégorie a bien été supprimer';
    } else {
        $echec = 'L\'enregistement de voitre categorie a échouer contacter l\'administrateur du site par mail ffmc02@outlook.fr avec le code erreur categoryArticle! ';
    }
}
//liste des catégories 
$listerCategoryEvent = new eventCategory();
$listersCategoryEvent = $listerCategoryEvent->listeEventCategory();
