<?php

//ini_set('display_errors', 'on');
//error_reporting(E_ALL);
$title = 'Mon profil';
$regexId = '/^\d+$/';
$user = new users();
$formError = array();
if (isset($_POST['btnModifyUser'])) {
    if (!empty($_SESSION['idUser'])) {
        $user->id = htmlspecialchars($_POST['idUser']);
        if (!empty($_POST['pseudo'])) {
            $user->pseudo = htmlspecialchars($_POST['pseudo']);
        } else {
            $formError['pseudo'] = 'Merci de remplir le champ Pseudo';
        }
        if (!empty($_POST['email'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                if ($_POST['email'] == $_POST['email2']) {
                    $user->email = htmlspecialchars($_POST['email']);
                } else {
                    $formError['email2'] = 'Merci de mettre les deux mails de façon identique.';
                }
            } else {
                $formError['email'] = ' Merci de mettre une adresse mail correcte';
            }
        } else {
            $formError['email'] = 'Veuillez remplir le champ mail.';
        }
        if (count($formError) == 0) {
            if (!$user->modifyProfilUser()) {
                $messageErroUserModify = 'Une erreur est survenue, prévenez le developpeur via le mail ffmc02@outlook.fr';
                $_SESSION['loginMail'] = $user->email;
                $_SESSION['pseudo'] = $user->pseudo;
            } else {
                $_SESSION['loginMail'] = $user->email;
                $_SESSION['pseudo'] = $user->pseudo;
            }
        }
    }
}

if (isset($_POST['btnDeleteUser'])) {
    if (!empty($_SESSION['idUser']) && preg_match($regexId, $_SESSION['idUser'])) {
        $user->id = htmlspecialchars($_SESSION['idUser']);
        if ($user->id != 0) {
            $userDelet = $user->deleteUser();
            if ($userDelet == TRUE) {
                $_SESSION = array();
                session_destroy();
                header("Location: index");
            }
        }
    }
}

$listerUser = $user->getProfilUserByMail();
