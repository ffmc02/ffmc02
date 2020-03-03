<?php

// DÃ©claration d'un tableau
// qui contiendra les erreurs du formulaire
$formError = array();
$title='Page de contact';
// Regex du formulaire
$regexName = '/^[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿ \-\']+$/';
$regexPhoneNumber = '/^[0][1-79]([0-9]){8}$/';
$regexCity = '/^[a-zA-ZÃ€-Ã–Ã˜-Ã¶Ã¸-Ã¿ \-\'\/]+$/';

// RÃ©cupÃ©ration du paramÃ¨tre d'URL correspondant Ã  l'ID de la page
// Stockage des donnÃ©es du formulaire
// dans des variables
if (isset($_POST['send'])) {
     // Test prÃ©sence et Regex Nom
    if (!empty($_POST['name'])) {
        $name = htmlspecialchars($_POST['name']);
        if (!preg_match($regexName, $name)) {
            $formError['name'] = 'Erreur dans la saisie du nom';
        }
    } else {
        $formError['your-name'] = 'Veuillez saisir un nom';
    }
    // Test prÃ©sence et Regex Email
    if (!empty($_POST['email'])) {
        $email = htmlspecialchars($_POST['email']);
    } else {
        $formError['email'] = 'Veuillez saisir un Email';
    }
    // Test prÃ©sence et Regex TÃ©lÃ©phone
    if (!empty($_POST['phoneNumber'])) {
        $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        if (!preg_match($regexPhoneNumber, $phoneNumber)) {
            $formError['phoneNumber'] = 'Erreur dans la saisie du numéro de téléphone';
        }
    } else {
        $formError['phoneNumber'] = 'Veuillez saisir un numéro de téléphone';
    }
    if (!empty($_POST['city'])) {
        $city = htmlspecialchars($_POST['city']);
    } else {
        $formError['city'] = 'Merci de remplir le champs ville';
    }
    // Test prÃ©sence et Regex Sujet
    if (!empty($_POST['subject'])) {
        $subject = htmlspecialchars($_POST['subject']);
    } else {
        $formError['subject'] = 'Veuillez saisir un sujet';
    }
    // Test prÃ©sence et Regex Message
    if (!empty($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
    } else {
        $formError['message'] = 'Veuillez saisir un message';
    }
    $messageMail = $name . ' vous a laiss& un message dont le sujet est :' . $subject . 'le message est : ' . $message . 'Pour lui repondre ' . $email . 'et sont num&ro de t&l&phone : ' . $phoneNumber . 'Merci!';
    if (count($formError) == 0) {
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=UTF-8';
        $headers[] = 'Reply-To:' . $email;
        $headers[] = 'From: ' . $name . '<' . $email . '>';
        if (mail('ffmc02@outlook.fr', $subject, $messageMail)) {
            $mailMessage = 'Votre message a bien été envoyé à la FFMC Aisne';
    } else {
            $mailMessageError = 'Erreur d\'envoi';
        }
    }
}
$listEvents=  new events();
$listeEventMeeting= $listEvents->listeEventsMeeting();
$listeEvent = $listEvents->listeEvents();