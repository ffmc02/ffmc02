<?php

$title = 'Formulaire mot de passe oublier';
$modifyPasswordUsers = new users();

if (isset($_POST['modifyPassword'])) {
    if (!empty($_POST['email'])) {

       
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $loginEmailUser = htmlspecialchars($_POST['email']);
            $modifyPasswordUsers->email = $loginEmailUser;
            $verifyUserExistbyEmail = new users();
            $verifyUserExistbyEmail->email = htmlspecialchars($_POST['email']);
            $verifyUserExistbyEmail->cle = $_POST['cle'];
            //je verifie que la clé et le mail corresponde bien 
            if ($verifyUserExistbyEmail->verifEmailAndCle()) {
                
            } else {
                $formError['email'] = 'Veuillez remplir le champ mail.';
            }
            if (!empty($_POST['newPassword'])) {
                if ($_POST['newPassword'] == $_POST['confirmPassword']) {
                    $modifyPasswordUsers->password = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);
                } else {
                    $formError['password'] = 'les mots de passe ne sont pas identiques.';
                }
            } else {
                $formError['password'] = 'Merci de remplir les champs password';
            }

            $modifyPasswordUsers->cle = md5(microtime(TRUE) * 100000);
            if ($modifyPasswordUsers->modifyPassword()) {
                $messaageSucess = 'votre mot de passe a été modifié avec succès';
            } else {
                $formError['echec'] = 'Votre mot de passe n\'est pas changé, veuillez réessayer ou contacter le web master par mail via <a href="contactus">la page contact </a> ou par mail'
                        . 'ffmc02@outlook.fr';
            }
        }
    } else {
        $formError['email'] = ' Merci de mettre une adresse mail correcte';
    }
}