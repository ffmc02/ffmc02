<?php

$title = 'Mot de passe oublié';
$verifyUserExist = new users();

if (isset($_POST['passwordForget'])) {
    if (!empty($_POST['pseudo'])) {
        if (strlen($_POST['pseudo']) <= 50) {
            $pseudoUser = $verifyUserExist->pseudo = htmlspecialchars($_POST['pseudo']);
        } else {
            $formError['pseudo'] = 'Votre pseudo ne doit pas dépasser 50 caractères.';
        }
    } else {
        $formError['pseudo'] = 'Merci de remplir le champ Pseudo';
    }
    //verification de l'adresse mail!
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $mailUser = htmlspecialchars($_POST['email']);
            $verifyUserExist->email = $mailUser;
        } else {
            $formError['email'] = ' Merci de mettre une adresse mail correcte';
        }
    } else {
        $formError['email'] = 'Veuillez remplir le champ mail.';
    }
    if (count($formError) == 0) {
        //je teste si le mail existe dans la base de donnée  et le pseudo 
         $verif =$verifyUserExist->testEmail();
        if ( $verif->count = 1) {
           
            
//        if ($checEmailExist->email) {            echo 'julien';
            $subject = 'Nouveau mot de passe pour le site FFMC02.fr';
            $messageMail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd>
                <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
                <head><meta charset="utf8" />
                <title>Mot de passe oublié</title>
                </head>
     <body>
       <center><p><strong>Bonjour ' . $verif->pseudo . '</strong></p><center>
           <p> Pour récupérer votre mot de passe il vous suffit de cliquer sur le lien suivant : </p>
     <a href="http://ffmc02.fr/modifyPassword?cle='.$verif->cle.'">cliquez ICI</a>
     
</body>
     </html>';
            
            
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-859-1';
            $headers[] = 'Reply-To:ffmc02@outook.fr';
            $headers[] = 'From: FFMC02 <ffmc02@outook.fr>';
         
            if (mail($mailUser, $subject, $messageMail, implode("\r\n", $headers))) {
                $messagesucces = 'Un mail vient de vous être envoyé, vous avez juste à cliquer sur le lien <br>'
                        . 'pour pouvoir accéder au formulaire pour enregistrer un nouveau mot de passe';
            } else {
                $messageError = 'Une erreur technique est survenue, veuillez contacter l\'administrateur du site via la page de <a href="../view/contactus.php">contact</a>';
            }
        } else {
            $messageNotExiste = 'Vous n\'avez pas de compte merci de vous inscrire';
        }
    }
}

