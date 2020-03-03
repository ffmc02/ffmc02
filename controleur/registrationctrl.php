<?php

//ini_set('display_errors', 'on');
//error_reporting(E_ALL);
//                            header("Location: ../view/connection.php");
//                               header("Location: ../view/registration.php");
$title = 'Se connecter';
$user = new users();
$formError = array();
$error = array();
if (isset($_POST['registration'])) {
    //verification du pseudo
    if (!empty($_POST['pseudo'])) {
        $user->pseudo = htmlspecialchars($_POST['pseudo']);
        
    } else {
        $formError['pseudo'] = 'Merci de remplir le champ Pseudo';
    }
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
           $newUser=  htmlspecialchars($_POST['email']);
           $user->email = $newUser;
        } else {
            $formError['email'] = ' Merci de mettre une adresse mail correcte';
        }
    } else {
        $formError['email'] = 'Veuillez remplir le champ mail.';
    }
    if (!empty($_POST['password'])) {
        if ($_POST['password'] == $_POST['confirmPassword']) {
            $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        } else {
            $formError['password'] = 'Attention, les mots de passe ne sont pas identiques.';
        }
    } else {
        $formError['password'] = 'Merci de remplir les champs password';
    }
    $user->cle = md5(microtime(TRUE) * 100000);
    if (count($formError) == 0) {
        $testEmail = new users();
        $testEmail->email = htmlspecialchars($_POST['email']);
        $checkEmail = $testEmail->testEmail();
        //verification permetant de ce connecter directement apres l'insription 
        if ($checkEmail->countId < 1) {
            $checkAddUser = $user->addUser();
            if ($checkAddUser == TRUE) {
                $addUserMessage = 'Vous êtes bien enregistré';
                $_POST['connexion'] = '';
                $_POST['loginemail'] = $user->email;
                $_POST['loginPassword'] = $_POST['password'];
            } else {
                $addUserMessage = 'Une erreur est survenue, veuillez contacter le webmaster via ffmc02@outlook.fr. Merci.';
            }
        } else {
            $addUserMessage = 'Un compte existe déja avec le même Email.';
        }
    }
    $subject='nouvel inscrit' .' ' . $newUser;
   $messageMail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd>
                <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
                <head><meta charset="utf8" />
                <title>NOUVELLE INSCRIT</title>
                </head>
     <body>
       <center><p><strong>Bonjour Gaetan Un nouvel Utilisitateur vien de s\'enregisetre.</strong></p><center>
       
           
</body>
     </html>';
$email='conctact@ffmc02.fr';
   $name= 'ffmc02';
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=UTF-8';
        $headers[] = 'Reply-To:' . $email;
        $headers[] = 'From: ' . $name . '<' . $email . '>';
        mail('ffmc02@outlook.fr', $subject, $messageMail, implode("\r\n", $headers));
}
//--------------------------------------------------partie connexion --------------------------------
if (isset($_POST['connexion'])) {
    $users = new users();
    $idUser = new users();
    $formError = array();
    if (!empty($_POST['loginemail'])) {
        if (filter_var($_POST['loginemail'], FILTER_VALIDATE_EMAIL)) {
            $users->email = htmlspecialchars($_POST['loginemail']);
        } else {
            $formError['loginemail'] = 'Veuillez mettre un mail correct';
        }
    } else {
        $formError['loginemail'] = 'Veuillez remplir mail';
    }
    if (!empty($_POST['loginPassword'])) {

        $loginPassword = $_POST['loginPassword'];
    } else {
        $formError['loginPassword'] = 'Merci de remplir les champs password';
    }

    if (count($formError) == 0) {
        //je conte les messages d'erreurs 

        $verif = $users->connexionUser();
        if ($verif->count == 1) {
            //je verifier que l'utilisateur existe bien dans la base de donnée grace a son email  
            //
//          je verifie que le password entré par l'utilisateur et le meme que celui renseigner dans la base de donnée
            $password = $verif->password;
            $validPassword = password_verify($loginPassword, $password);
            if ($validPassword) {
                $_SESSION['idUser'] = $verif->idUser;
                $_SESSION['loginMail'] = $verif->loginMail;
                $_SESSION['access'] = $verif->access;
                $_SESSION['pseudo'] = $verif->pseudoUser;
                header("Location: connectionUser");
            } 
        } else {
            $formError['userExist'] = 'Vous n\'êtes pas inscrit. Merci de vous inscrire.';
        }
    } else {
        $verif = 'Une erreur est survenue, veuillez contactez le web master par mail: ffmc02@outlook.fr';
    }
}
    