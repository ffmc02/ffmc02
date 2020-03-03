<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);
$title = 'Création d\'un article ';
$formError = array();
$regexId = '/^\d+$/';
//ajout d'un article écrit
if (isset($_POST['addArticle'])) {
    $addArticle = new articles();
    if (!empty($_POST['titleArticle'])) {
        $titleArticle = htmlspecialchars($_POST['titleArticle']);
        $addArticle->title = $titleArticle;
    } else {
        $formError['titleArticle'] = 'Veuillez remplir le titre de l\'article';
    }
    if (!empty($_POST['date'])) {
        $date = htmlspecialchars($_POST['date']);
        $addArticle->dateEvent = $date;
    }
    if (!empty($_POST['article'])) {
        $addArticle->articleDescription = htmlspecialchars($_POST['article']);
    } else {
        $formError['article'] = 'Veuillez remplir la description de l\'article';
    }
    if (!empty($_POST['video'])) {
        $addArticle->video = $_POST['video'];
    }
    if (!empty($_POST['typeArticle'])) {
        if (preg_match($regexId, $_POST['typeArticle'])) {
            $addArticle->idcategoryArticle = htmlspecialchars($_POST['typeArticle']);
        }
    }
    if (!empty($_POST['idAuthor'])) {
        $addArticle->idauthor = htmlspecialchars($_POST['idAuthor']);
    } else {
        $formError['author'] = 'Veuillez sélectionner l\'auteur de l\'article !';
    }
    if (!empty($_FILES['picture']['name'])) {
        //je recupere le fichier photos
        $dossier = '../../bob/';
        //je dertermine le chemin ou seras transferer ma photo
        $dossiersDb = 'bob/';
//                je dertmine le chemin pour la base de donnée 
        $tmp_name = $_FILES['picture']['tmp_name'];
//je met la photo dans un dossier temporraire
        $extensionFile = pathinfo($_FILES['picture']['name']);
        //je recuperre l'extention
        $name = 'pictureArticle' . $date . '.' . $extensionFile['extension'];
//                je renome ma photo et je concatene avec l'extention
        $addArticle->picture = $dossiersDb . $name;
        move_uploaded_file($_FILES['picture']['tmp_name'], $dossier . $name);
        //je fait la  migration de mon fichier temporraire vers le dossier envoyer 
        //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    }
    if (!empty($_POST['linkExternalSite'])) {
        $addArticle->linkExternalSite = $_POST['linkExternalSite'];
    }
    if (!empty($_POST['nameLinkExternal'])) {
        $addArticle->nameLinkExternal = htmlspecialchars($_POST['nameLinkExternal']);
    }
    if (!empty($_POST['typeArticle'])) {
        if (preg_match($regexId, $_POST['typeArticle'])) {
            $addArticle->id_categoryArticle = htmlspecialchars($_POST['typeArticle']);
        }
    }
    if (!empty($_POST['idAuthor'])) {
        $addArticle->id_author = htmlspecialchars($_POST['idAuthor']);
    } else {
        $formError['author'] = 'Veuillez sélectionner l\'auteur de l\'article !';
    }
    if (count($formError) == 0) {
        if ($addArticle->addArticles()) {
            $messaageSucess = 'votre \'événement a bien été créer ';
        } else {
            $formError['echec'] = 'L\'enregistement de voitre événement a échouer contacter l\'administrateur du site par mail ffmc02@outlook.fr avec le code erreur Article! ';
        }
    }
}
//---------------Modification de l'article
if (isset($_POST['modifyArticle'])) {
    $modifyArticle = new articles();
    if (!empty($_POST['idArticle'])) {
        if (preg_match($regexId, $_POST['idArticle'])) {
            $modifyArticle->id = htmlspecialchars($_POST['idArticle']);
        }
    }
    if (!empty($_POST['newTitleArticle'])) {
        $newTitleArticle = htmlspecialchars($_POST['newTitleArticle']);
        $modifyArticle->title = $newTitleArticle;
    } else {
        $formError['titleArticle'] = 'Veuillez remplir le titre de l\'article';
    }
    if (!empty($_POST['newDate'])) {
        $date = htmlspecialchars($_POST['newDate']);
        $modifyArticle->dateEvent = $date;
    }
    if (!empty($_POST['newArticle'])) {
        $modifyArticle->articleDescription = htmlspecialchars($_POST['newArticle']);
    } else {
        $formError['article'] = 'Veuillez remplir la description de l\'article';
    }
    if (!empty($_POST['newVideo'])) {
        $modifyArticle->video = $_POST['newVideo'];
    }
    if (!empty($_POST['newLinkExternalSite'])) {
        $modifyArticle->linkExternalSite = $_POST['newLinkExternalSite'];
    }
    if (!empty($_POST['newNameLinkExternal'])) {
        $modifyArticle->nameLinkExternal = htmlspecialchars($_POST['newNameLinkExternal']);
    }
    if (!empty($_POST['newTypeArticle'])) {
        if (preg_match($regexId, $_POST['newTypeArticle'])) {
            $modifyArticle->idcategoryArticle = htmlspecialchars($_POST['newTypeArticle']);
        }
    }
    if (count($formError) == 0) {
        if ($modifyArticle->modifyArticle()) {
            $messaageSucess = 'votre \'événement a bien été Modifier ';
        } else {
            $formError['echec'] = 'L\'enregistement de voitre événement a échouer contacter l\'administrateur du site par mail ffmc02@outlook.fr avec le code erreur Article! ';
        }
    }
}
//------------------------Suppression de l'article 
if (isset($_POST['deleteArticle'])) {
    $deleteArticle = new articles();
    if (!empty($_POST['idArticle'])) {
        if (preg_match($regexId, $_POST['idArticle'])) {
            $deleteArticle->id = htmlspecialchars($_POST['idArticle']);
            if ($deleteArticle->deleteAricle()) {
                $messaageSucess = 'Votre article a été supprimé avec succés';
            } else {
                $formError['echec'] = 'contacter le web master par mail ffmc02@outlook.fr avec le code Article';
            }
        }
    }
}
$listerArticle = new articles();
$listeArticles = $listerArticle->listerArticle();
$nbrArticle = $listerArticle->countArticle();
if (isset($_GET['pageChoice']) && $_GET['pageChoice'] <= $nbrArticle->nbrArticle && $_GET['pageChoice'] > 0) {
    $pageChoice = ((htmlspecialchars($_GET['pageChoice']) - 1) * 3);
    // calcule qui permet d'afficher le premier User
    $listeArticle = $listerArticle->listerArticle($pageChoice); // affichage des pages en fonction du nombre d'id
} else {
    $listeArticle = $listerArticle->listerArticle();
}
$listeAdmnin = new users();
$listeAdminAndModer = $listeAdmnin->listerAdminAndModé();
$listerCategoryArticle = new categoryArticle();
$listerArticleCategory = $listerCategoryArticle->listerCategoryArticle();
//
//$listerArticle = new articles();
//$listeArticle = $listerArticle->listerArticle();
