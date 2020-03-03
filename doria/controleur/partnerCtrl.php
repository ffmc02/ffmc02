<?php
$regexId = '/^\d+$/';
$title = 'gestion des partenaires';
$formError = array();
//formulaire d'ajout de partenaires
ini_set('display_errors', 'on');
error_reporting(E_ALL);
if (isset($_POST['addPartners'])) {
    $addPartner = new partner();
    if (!empty($_POST['namePartner'])) {
        $addPartner->namePartner = htmlspecialchars($_POST['namePartner']);
        $namePartner = $_POST['namePartner'];
    } else {
        $formError['namePartner'] = 'Veuillez remoplir le noms du partenaires';
    }
    if (!empty($_POST['linkExternalSite'])) {
        $addPartner->linkExternalSite = htmlspecialchars($_POST['linkExternalSite']);
    }
    if (!empty($_POST['nameLink'])) {
        $addPartner->nameLink = htmlspecialchars($_POST['nameLink']);
    }
    if (!empty($_FILES['picture']['name'])) {
        //je recupere le fichier photos
        $dossier = '../../assets/img/partner/';
        //je dertermine le chemin ou seras transferer ma photo
        $dossiersDb = 'assets/img/partner/';
//                je dertmine le chemin pour la base de donnée 
        $tmp_name = $_FILES['picture']['tmp_name'];
//je met la photo dans un dossier temporraire
        $extensionFile = pathinfo($_FILES['picture']['name']);
        //je recuperre l'extention
        $name = $namePartner . '.' . $extensionFile['extension'];
//                je renome ma photo et je concatene avec l'extention
        $addPartner->picture = $dossiersDb . $name;
        move_uploaded_file($_FILES['picture']['tmp_name'], $dossier . $name);
        //je fait la  migration de mon fichier temporraire vers le dossier envoyer 
        //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    }
    if (!empty($_POST['EndOfPartnerShip'])) {
        $addPartner->EndOfPartnerShip = htmlspecialchars($_POST['EndOfPartnerShip']);
    }
    if ($addPartner->addPartner()) {
        $messaageSucess = 'le partenaire a bien été enregistré';
    } else {
        $echec = 'Une erreur est survenue envoyer un mail a ffmc02@outlook.fr avec le code erreur Ajout PARTENAIRE';
    }
}
//modification du partenaire
if (isset($_POST['modifyPartners'])) {
    $modifyPartner = new partner();
    if (!empty($_POST['newNamePartner'])) {
        $modifyPartner->namePartner = htmlspecialchars($_POST['newNamePartner']);
       $namePartner= $_POST['newNamePartner'];
    } else {
        $formError['namePartner'] = 'Veuillez remoplir le nouveau noms du partenaires';
    }
    if (!empty($_POST['newLinkExternalSite'])) {
        $modifyPartner->linkExternalSite = htmlspecialchars($_POST['newLinkExternalSite']);
    }
    if (!empty($_POST['newNameLink'])) {
        $modifyPartner->nameLink = htmlspecialchars($_POST['newNameLink']);
    }
    if (!empty($_FILES['newPicture']['name'])) {
        //je recupere le fichier photos
        $dossier = '../../assets/img/partner/';
        //je dertermine le chemin ou seras transferer ma photo
        $dossiersDb = 'assets/img/partner/';
//                je dertmine le chemin pour la base de donnée 
        $tmp_name = $_FILES['newPicture']['tmp_name'];
//je met la photo dans un dossier temporraire
        $extensionFile = pathinfo($_FILES['newPicture']['name']);
        //je recuperre l'extention
        $name = $namePartner . '.' . $extensionFile['extension'];
//                je renome ma photo et je concatene avec l'extention
        $modifyPartner->picture = $dossiersDb . $name;
        move_uploaded_file($_FILES['newPicture']['tmp_name'], $dossier . $name);
        //je fait la  migration de mon fichier temporraire vers le dossier envoyer 
        //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    }
    if (!empty($_POST['idPartner'])) {        
        if (preg_match($regexId, $_POST['idPartner'])) {
            $modifyPartner->id = htmlspecialchars($_POST['idPartner']);
        }
    }
    if ($modifyPartner->modifyPartners()) {
        $messaageSucess = 'le partenaire a bien été modifié';
    } else {
        $echec = 'Une erreur est survenue envoyer un mail a ffmc02@outlook.fr avec le code erreur Modification PARTENAIRE';
    }
}
//supression du partenanire
if (isset($_POST['deletePartner'])) {
    $deletePartner = new partner();
    if (!empty($_POST['idPartner'])) {
        if (preg_match($regexId, $_POST['idPartner'])) {
            $deletePartner->id = htmlspecialchars($_POST['idPartner']);
            if ($deletePartner->deletePartner()) {
                $messaageSucess = 'Le Partner a été supprimé avec succés';
            } else {
                $formError['echec'] = 'contacter le web master par mail ffmc02@outlook.fr avec le code DeletePartner';
            }
        }
    }
}
//liste des partenaire de la FFMC02
$listerPartner = new partner();
$getPartner = $listerPartner->getPartner();
