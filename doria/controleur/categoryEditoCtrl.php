<?php

$title = 'gestion des categories de l\'édito';
$regexId = '/^\d+$/';
//ajouter une catégory
if (isset($_POST['addCategoryEdito'])) {
    $addCategoryEdito = new categoryEdito();
    if (!empty($_POST['nameCategory'])) {
        $addCategoryEdito->nameCategoryEdito = htmlspecialchars($_POST['nameCategory']);
    } else {
        $Error = 'Merci de remplir le champs Noms de la catégorie';
    }
    if (count($formError) == 0) {
        if ($addCategoryEdito->addCategoryEdit()) {
            $messaageSucess = 'votre catégorie  a bien été créer ';
        } else {
            $echec = 'L\'enregistement de voitre categorie a échouer contacter l\'administrateur du site par mail ffmc02@outlook.fr avec le code erreur categoryEdito! ';
        }
    }
}
//modification
if (isset($_POST['modifyCategoryEdito'])) {
    $modifyCategoryEdito = new categoryEdito();
    if (!empty($_POST['newNameCategoryEdito'])) {
        $modifyCategoryEdito->nameCategoryEdito = htmlspecialchars($_POST['newNameCategoryEdito']);
    } else {
        $Error = 'Merci de remplir le champs Noms de la catégorie';
    }
    if (!empty(['idCategoryEdito'])) {
        if (preg_match($regexId, $_POST['idCategoryEdito'])) {
            $modifyCategoryEdito->id = htmlspecialchars($_POST['idCategoryEdito']);
        }
    }
    if (count($formError) == 0) {
        if ($modifyCategoryEdito->modifyCategoryEdito()) {
            $messaageSucess = 'votre catégorie  a bien été créer ';
        } else {
            $echec = 'L\'enregistement de voitre categorie a échouer contacter l\'administrateur du site par mail ffmc02@outlook.fr avec le code erreur categoryEdito! ';
        }
    }
}
//Supression d'une catégorie
if (isset($_POST['deleteCategoryEdito'])) {
    $deletCategoryEdito = new categoryEdito();
    if (!empty(['idCategoryEdito'])) {
        if (preg_match($regexId, $_POST['idCategoryEdito'])) {
            $deletCategoryEdito->id = htmlspecialchars($_POST['idCategoryEdito']);
        }
    }
    if ($deletCategoryEdito->deleteCategoryEdito()) {
        $messaageSucess = 'Votre catégorie a bien été supprimer';
    } else {
        $echec = 'L\'enregistement de voitre categorie a échouer contacter l\'administrateur du site par mail ffmc02@outlook.fr avec le code erreur categoryEdito! ';
    }
}
//liste des catégory édito
$listercategory = new categoryEdito();
$listersCategoryEdito = $listercategory->listeCategoryEdito();
