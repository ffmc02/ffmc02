<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);
$title = 'création d\'évenements ';
$listeEventsCategory = new eventCategory();
$listEvents = new events();
$formError = array();
$regexId = '/^\d+$/';
$regexDate = '/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/';
$regexHour = '/^(0[0-9]|1[0-9]|2[0-3]|[0-9]):[0-5][0-9]$/';

if (isset($_POST['addEvents'])) {
    $addEvents = new events();
    if (!empty($_POST['date'])) {
        if (preg_match($regexDate, $_POST['date'])) {
            $date = htmlspecialchars($_POST['date']);
        } else {
            $formError['date'] = 'Veuillez renseigner une heure de rendez-vous.';
        }
    } else {
        $formError['date'] = 'Merci de remplir le champs date.';
    }
    //Vérification de l'heure.
    if (!empty($_POST['hour'])) {
        if (preg_match($regexHour, $_POST['hour'])) {
            $hour = htmlspecialchars($_POST['hour']);
        } else {
            $formError['hour'] = 'Veuillez renseigner un format d\'heure correct.';
        }
    } else {
        $formError['hour'] = 'Merci de remplir le champ date et heure';
    }
    //je concatene la variable date et la variable hour pour ajouter en base de données
    $addEvents->dateEvent = $date . ' ' . $hour;
    if (!empty($_POST['titleEvents'])) {

        $titleEvent = htmlspecialchars($_POST['titleEvents']);
        $addEvents->title = $titleEvent;
    } else {
        $formError['titleEvents'] = 'veuillez remplir le titre !';
    }
    if (!empty($_POST['descriptionEvents'])) {
        $addEvents->description = htmlspecialchars($_POST['descriptionEvents']);
    } else {
        $formError['descriptionEvents'] = 'Veuillez remplire la description !';
    }
    if (!empty($_POST['idAuthor'])) {
        $addEvents->author = htmlspecialchars($_POST['idAuthor']);
    } else {
        $formError['author'] = 'Veuillez sélectionner l\'auteur de l\'événement !';
    }
    if (!empty($_POST['location'])) {
        $addEvents->location = htmlspecialchars($_POST['location']);
    } else {
        $formError['location'] = 'Veuillez remoplir le lieu de l\'événement!';
    }
    if (!empty($_POST['typeEvents'])) {
        if (preg_match($regexId, $_POST['typeEvents'])) {
            $addEvents->eventCategory = htmlspecialchars($_POST['typeEvents']);
        }
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
        $name = 'pictureEvents'.$titleEvent . '.' . $extensionFile['extension'];
//                je renome ma photo et je concatene avec l'extention
        $addEvents->picture = $dossiersDb . $name;
        move_uploaded_file($_FILES['picture']['tmp_name'], $dossier . $name);
        //je fait la  migration de mon fichier temporraire vers le dossier envoyer 
        //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    }

    if (count($formError) == 0) {
        if ($addEvents->addEvents()) {
            $messaageSucess = 'votre \'événement a bien été créer ';
        } else {
            $formError['echec'] = 'L\'enregistement de voitre événement a échouer contacter l\'administrateur du site par mail ffmc02@outlook.fr avec le code erreur évén! ';
        }
    }
}
//------------------------------------------------Modification d'un événement 
if (isset($_POST['modifyEvents'])) {
    $modifyEvents = new events();
    if (!empty($_POST['events'])) {
        if (preg_match($regexId, $_POST['events'])) {
            $modifyEvents->id = htmlspecialchars($_POST['events']);
        }
    }
    if (!empty($_POST['newDate'])) {
        if (preg_match($regexDate, $_POST['newDate'])) {
            $date = htmlspecialchars($_POST['newDate']);
        } else {
            $formError['date'] = 'Veuillez renseigner une heure de rendez-vous.';
        }
    } else {
        $formError['date'] = 'Merci de remplir le champs date.';
    }
    //Vérification de l'heure.
    if (!empty($_POST['newHour'])) {
        if (preg_match($regexHour, $_POST['newHour'])) {
            $hour = htmlspecialchars($_POST['newHour']);
        } else {
            $formError['hour'] = 'Veuillez renseigner un format d\'heure correct.';
        }
    } else {
        $formError['hour'] = 'Merci de remplir le champ date et heure';
    }
    //je concatene la variable date et la variable hour pour ajouter en base de données
    $modifyEvents->dateEvent = $date . ' ' . $hour;
    if (!empty($_POST['newTitleEvents'])) {

        $titleEvent = htmlspecialchars($_POST['newTitleEvents']);
        $modifyEvents->title = $titleEvent;
    } else {
        $formError['titleEvents'] = 'veuillez remplir le titre !';
    }
    if (!empty($_POST['newDescriptionEvents'])) {
        $modifyEvents->description = htmlspecialchars($_POST['newDescriptionEvents']);
    } else {
        $formError['descriptionEvents'] = 'Veuillez remplire la description !';
    }
    if (!empty($_POST['newLocation'])) {
        $modifyEvents->location = htmlspecialchars($_POST['newLocation']);
    } else {
        $formError['location'] = 'Veuillez remoplir le lieu de l\'événement!';
    } if (!empty($_POST['newTypeEvents'])) {
        if (preg_match($regexId, $_POST['newTypeEvents'])) {
            $modifyEvents->eventCategory = htmlspecialchars($_POST['newTypeEvents']);
        }
    }

    if (count($formError) == 0) {
        if ($modifyEvents->modifyEvent()) {
            $messaageSucess = 'votre \'événement modifier ';
        } else {
            $formError['echec'] = 'L\'enregistement de voitre événement a échouer contacter l\'administrateur du site par mail ffmc02@outlook.fr avec le code erreur évén! ';
        }
    }
}

//--------------------------------------suppression d'un événement 
if (isset($_POST['btnDeleteEvent'])) {
    if (!empty($_POST['deleteEvent'])) {
        $deleteEvents = new events();
        $deleteEvents->id = htmlspecialchars($_POST['deleteEvent']);
        if ($deleteEvents->deleteEvent()) {
            $messaageSucess = 'Votre événement a été supprimer correctement';
        } else {
            $formError['echec'] = 'Une erreur technique est survenue contacter le web masteur du site ';
        }
    }
}
$listeAdmnin= new users();
//liste des administrateur et modérateur du site internet 
$listeAdminAndModer =$listeAdmnin->listerAdminAndModé();
//liste pour la modifiction
$listeEventsModify = $listEvents->listeEventsModify();
//liste des réunions 
$listeEventMeeting = $listEvents->listeEventsMeeting();
//listes des catégory d'événement
$eventsListCategory = $listeEventsCategory->listeEventCategory();
//liste des événement future
$listeEvent = $listEvents->listeEvents();
//liste des événement passer
$listOfPastEvents= $listEvents->listOfPastEvent();