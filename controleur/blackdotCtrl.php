<?php

$formErrorExtraUrban = array();
$formError = array();
$formErrorUrban = array();

ini_set('display_errors', 'on');
error_reporting(E_ALL);
//$users = new users();
//$blackDot = new blackDot();
//$users->readUser();
$title = 'point noir';
//regex de verification que l'id est bien un chiffre
$regexId = '/^\d+$/';
//regexpour le titre, noms de rue, route et case autre
$regexTitle = '/^[\d+a-zA-ZÀ-ÖØ-öø-ÿ- ]+$/';
//boucle route extra Urbain
$roadExtraUrban = new roadExtraUrban();
$listerRoadExtraUrban = $roadExtraUrban->listerRoadExtraUrban();
//var_dump($listerRoadExtraUrban);
//boucle route Urbain
$sreetList = new street();
$listeUrban = $sreetList->listerStreet();
//var_dump($listeUrban);
//boucle pour la position du danger 
$postionDangerList = new positionDanger();
$positionDanger = $postionDangerList->listerPositionDanger();
//var_dump($positionDanger);
//type de danger (signalisation infrastructure et route glissante
$categorydanger = new categorydanger();
//boucle signalisation
$listeDangerPositionByIdDanger = $categorydanger->SignlingDangerListe();
//var_dump($listeDangerPositionByIdDanger);
//boucle infrastructure
$listeinfrastructure = $categorydanger->infrastureDangerListe();
//var_dump($listeinfrastructure);
//liste des chaussé glissante
$listeDangerRoad = $categorydanger->roadDangerListe();
//var_dump($listeDangerRoad);
//j'instensie la methode ajout point noir de la classe blackdot
$addblackDots = new blackDot();
// condition pour   ajoput du point noir 
if (isset($_POST['btnFormBlackDot'])) {
    //je verifie que le bouton point noir est appyer
    if (!empty($_POST['titleBlackDot'])) {
//            && preg_match($regexTitle, $_POST['titleBlackDot'])

        $addblackDots->title = htmlspecialchars($_POST['titleBlackDot']);
        //je verifie qu'un titre a été rentré et qu'il respecte la regex si non je met un message d'erreur 
    } else {
        $formError['title'] = 'Merci de remplir le champ titre avec des lettres et des chiffres sans caractéres speciaux';
    }
    if ($_POST['roatNumber'] != NULL && $_POST['numberStreet'] == NULL) {
        //hors agglomeration
        //j'instentie la methode extraUrban 
        $extraUrban = new extraUrban();
        //type de route hors agglo
        if (preg_match($regexId, $_POST['roadextraurban'])) {
            $extraUrban->idroadExtraUrban = htmlspecialchars($_POST['roadextraurban']);
        } else {
            $formErrorExtraUrban['roadextraurban'] = 'Titre non valable';
        }
        //numéro de route hors agglo
        if (!empty($_POST['roatNumber'])) {
            $extraUrban->roatNumber = htmlspecialchars($_POST['roatNumber']);
        } else {
            $formErrorExtraUrban['roadNumber'] = 'Merci de remplir le champ numéro de route';
        }
        //en venant de 
        if (!empty($_POST['inDirection'])) {
            $extraUrban->directionOf = htmlspecialchars($_POST['inDirection']);
        } else {
            $formErrorExtraUrban['inDirection'] = 'Merci de remplir le champ en direction de : ';
        }
        //en allant vers
        if (!empty($_POST['comingFrom'])) {
            $extraUrban->comingFrom = htmlspecialchars($_POST['comingFrom']);
        } else {
            $formErrorExtraUrban['comingFrom'] = 'Merci de remplir le champ en venant de : ';
        }
        if (!empty($_POST['mileagePoint'])) {
            if (preg_match($regexId, $_POST['mileagePoint'])) {

                $extraUrban->mileagePoint = htmlspecialchars($_POST['mileagePoint']);
            } else {
                $formErrorExtraUrban['comingFrom'] = 'Merci de ne mettre que des chiffres';
            }
        }
        if (count($formErrorExtraUrban) == 0) {
            //j'inser les donnée recupérer dans la variable $extraUrban dans la table extraUrban grace a la methode addExtraUrban
            $successAddExtraUrban = $extraUrban->addExtraUrban();
            $lastId = new extraUrban();
            $addblackDots->idExtraUrban = $lastId->lastInsertId();
            $addblackDots->idUrban = NULL;
        }
    } elseif ($_POST['numberStreet'] != NULL && $_POST['roadNumber'] == NULL) {
        //en aglomération 
//    j'instentie la methode urban'
        $urban = new urban();
        //Numero de rue
        if (!empty($_POST['numberStreet'])) {
//            if (preg_match($regexTitle, $_POST['numberStreet'])) {
                $urban->streetNumber = htmlspecialchars($_POST['numberStreet']);
//            } else {
//                $formErrorUrban['numberStreet'] = 'Merci de ne mettre que sous cette forme: <br> -15 <br> -15bis etc';
//            }
        } else {
            $formErrorUrban['numberStreet'] = 'Merci de remplir le champ numero de route';
        }
        //type d'axe en agglo
        if (preg_match($regexId, $_POST['typeStreet'])) {
            $urban->idStreet = htmlspecialchars($_POST['typeStreet']);
        }
        //noms de la rue 
        if (!empty($_POST['nameStreet'])) {
            $urban->nameStreet = htmlspecialchars($_POST['nameStreet']);
        } else {
            $formErrorUrban['nameStreet'] = 'Merci de remplir le champ en venant de : ';
        }
        //code postal de la commune 
        if (!empty($_POST['zipCode'])) {
            $urban->zipCode = htmlspecialchars($_POST['zipCode']);
        } else {
            $formErrorUrban['zipCode'] = 'Merci de remplir le champ en venant de : ';
        }
        //ville 
        if (!empty($_POST['city'])) {
//            if (preg_match($regexTitle, $_POST['city'])) {
                $urban->city = htmlspecialchars($_POST['city']);
//            } else {
//                $formErrorUrban['city'] = 'Merci de ne mettrre que des lettres, aucun chiffre accepté';
//            }
        } else {
            $formErrorUrban['city'] = 'Merci de remplir le champ en ville : ';
        }
        if (count($formErrorUrban) == 0) {
            //j'insère les donnée recupérées dans la variable $extraUrban dans la table extraUrban grace a la methode addExtraUrban.et grace a la variable 
            // je recupere le dernier id de la table Urbans selectioné.
            $successAddUrban = $urban->addUrban();
            $lastId = new urban();
            $addblackDots->idUrban = $lastId->lastInsertId();

            $addblackDots->idExtraUrban = NULL;
        }
    } else {
        $formError['UneEntrée'] = 'Merci de remplir soit \'Hors agglo\' soit \'En agglo\' mais pas les deux en même temps ';
    }

    //position exacte du danger
    if (!empty($_POST['gpsCoordinates'])) {
        $addblackDots->gpsCoordinates = htmlspecialchars($_POST['gpsCoordinates']);
    } else {
        $addblackDots->gpsCoordinates = '';
    }
    if (!empty($_POST['dangerPosition'])) {
        if (preg_match($regexId, $_POST['dangerPosition'])) {
            $addblackDots->idDangerPosition = htmlspecialchars($_POST['dangerPosition']);
        }
    }
//si un danger non signaler

    if (!empty($_POST['idCategoryDangerSignaline'] != " ")) {
        if (preg_match($regexId, $_POST['idCategoryDangerSignaline'])) {
            $addblackDots->idCategoryDanger = htmlspecialchars($_POST['idCategoryDangerSignaline']);
        }
    }
    if (!empty($_POST['idCategoryDangerInfrastructure'] != " ")) {
        if (preg_match($regexId, $_POST['idCategoryDangerInfrastructure'])) {
            $addblackDots->idCategoryDanger = htmlspecialchars($_POST['idCategoryDangerInfrastructure']);
        }
    }
    if (!empty($_POST['idCategoryDangerslipperyRoad'] != " ")) {
        if (preg_match($regexId, $_POST['idCategoryDangerslipperyRoad'])) {
            $addblackDots->idCategoryDanger = htmlspecialchars($_POST['idCategoryDangerslipperyRoad']);
        }
    }
    if (count($formError) == 0) {
        $addblackDots->idUser = $_SESSION['idUser'];
        if ($addblackDots->addBlackDot()) {
     //j'inser les donnée recupérer dans la variable $addblackDots 
            //dans la table blackDot grace a la methode addBlackDot
            $idBlackDot = $addblackDots->lastInsertId();
            //je recupere le dernier id inséere dans la table blackdot
            // grace a la methode lastInserId
//--------------------------------ajout des photos 
            // ajout de photos 
            if (!empty($_FILES['picture']['name'])) {
                //je recupere le fichier photos
                $addPictureBd = new picture();
                $dossier = '../apuce/';
                //je dertermine le chemin ou seras transferer ma photo
                $dossiersDb = 'apuce/';
//                je dertmine le chemin pour la base de donnée 
                $tmp_name = $_FILES['picture']['tmp_name'];
//je met la photo dans un dossier temporraire
                $extensionFile = pathinfo($_FILES['picture']['name']);
//                $extentionOk= array(png, jpeg, jpg);
//                if($extensionFile==$extentionOk){
                //je recuperre l'extention
                $name = $idBlackDot . '_1' . '.' . $extensionFile['extension'];
//                je renome ma photo et je concatene avec l'extention
                $addPictureBd->PictureName = $dossiersDb . $name;

                $addPictureBd->idBlackDot = $idBlackDot; 
//                }
// else {
//      $formError['Important']='Merci de mettre une photo au format jpg ou jpeg ou png';
// }

                if (move_uploaded_file($_FILES['picture']['tmp_name'], $dossier . $name)) {
                    //je fait la  migration de mon fichier temporraire vers le dossier envoyer 
                    //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                    if ($addPictureBd->addPicture()) {
                        $messagesuccesBd = 'Votre point noir avec photo(s) a bien été enregistré';
                        
                    } else {
                        $formError['addTrueBlackDot'] = 'Une erreur s\'est produite, veuillez contacter le Web Master via le mail ffmc02@outlook.fr ou le <a href=contactus>formulaire de contact</a>';
                    }
                } else {
                    $messagesuccesBd = 'Votre point noir sans photo a bien été enregistré';
                    
                }
//           
            } else {
                $formError['Important'] = 'Une erreur s\'est produite, veuillez contacter le Web Master via le mail ffmc02@outlook.fr ou le <a href=contactus>formulaire de contact</a>';
            }
        }
    }
//    insetion des autre si l'id 7 de la table danger position existe alors je recupére le text et je l'inser dans la table other.
    if (!empty($_POST['dangerPositionOther'])) {
        $otherdangerType = new other();
        $otherdangerType->idOtherTypes = 1;
        $otherdangerType->idBlackDot = $idBlackDot;
        $otherdangerType->other = htmlspecialchars($_POST['dangerPositionOther']);
        var_dump($otherdangerType);
        $otherdangerType->addOther();
    } else {
        
    }
//    ajout du dernier id point noir incerer et inscertion dans la bd des autres sur les typs de danger
    $dangertypeOther = new other();
    $dangertypeOther->idBlackDot = $idBlackDot;
    if ($_POST['idCategoryDangerSignaline'] = 10) {
        if (!empty($_POST['otherSignaling'])) {
            $dangertypeOther->idOtherTypes = 2;
            $dangertypeOther->other = htmlspecialchars($_POST['otherSignaling']);
            $dangertypeOther->addOther();
        }
    }
    if ($_POST['idCategoryDangerInfrastructure'] = 20) {
        if (!empty($_POST['otherInfrastructure'])) {
            $dangertypeOther->idOtherTypes = 3;
            $dangertypeOther->other = htmlspecialchars($_POST['otherInfrastructure']);
            $dangertypeOther->addOther();
        }
    }
    if ($_POST['idCategoryDangerInfrastructure'] = 26) {
        if (!empty($_POST['otherSlipperyRoad'])) {
            $dangertypeOther->idOtherTypes = 4;
            $dangertypeOther->other = htmlspecialchars($_POST['otherSlipperyRoad']);
            $dangertypeOther->addOther();
        }
    }
}
