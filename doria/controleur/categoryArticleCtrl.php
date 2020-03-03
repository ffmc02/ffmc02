<?php
$title='catégorie des articles';
$regexId = '/^\d+$/';
        
 if (isset($_POST['addCategoryArticle'])) {
   $addCategoryArticle = new categoryArticle();
    if (!empty($_POST['nameCategory'])) {
        $addCategoryArticle->nameCategoryArticle = htmlspecialchars($_POST['nameCategory']);
    } else {
        $Error = 'Merci de remplir le champs Noms de la catégorie';
    }
    if (count($formError) == 0) {
        if ($addCategoryArticle->addCategoryArticle()) {
            $messaageSucess = 'votre catégorie  a bien été créer ';
        } else {
            $echec = 'L\'enregistement de voitre categorie a échouer contacter l\'administrateur du site par mail ffmc02@outlook.fr avec le code erreur categoryArticle! ';
        }
    }
}
//modification
if (isset($_POST['modifyCategoryArticle'])) {
    $modifyCategoryArticle = new categoryArticle();
    if (!empty($_POST['newNameCategoryArticle'])) {
        $modifyCategoryArticle->nameCategoryArticle = htmlspecialchars($_POST['newNameCategoryArticle']);
    } else {
        $Error = 'Merci de remplir le champs Noms de la catégorie';
    }
    if (!empty(['idCategoryArticle'])) {
        if (preg_match($regexId, $_POST['idCategoryArticle'])) {
            $modifyCategoryArticle->id = htmlspecialchars($_POST['idCategoryArticle']);
        }
    }
    if (count($formError) == 0) {
        if ($modifyCategoryArticle->modifyCategoryArticle()) {
            $messaageSucess = 'votre catégorie  a bien été créer ';
        } else {
            $echec = 'L\'enregistement de voitre categorie a échouer contacter l\'administrateur du site par mail ffmc02@outlook.fr avec le code erreur categoryArticle! ';
        }
    }
}
//Supression d'une catégorie
if (isset($_POST['deleteCategoryArticle'])) {
    $deletCategoryArticle = new categoryArticle();
    if (!empty(['idCategoryArticle'])) {
        if (preg_match($regexId, $_POST['idCategoryArticle'])) {
            $deletCategoryArticle->id = htmlspecialchars($_POST['idCategoryArticle']);
        }
    }
    if ($deletCategoryArticle->deleteCategoryArticle()) {
        $messaageSucess = 'Votre catégorie a bien été supprimer';
    } else {
        $echec = 'L\'enregistement de voitre categorie a échouer contacter l\'administrateur du site par mail ffmc02@outlook.fr avec le code erreur categoryArticle! ';
    }
}       
// liste des categorie d'article.
$listerCategoryArticle = new categoryArticle();
$listerArticleCategory = $listerCategoryArticle->listerCategoryArticle();
