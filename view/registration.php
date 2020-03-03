<?php
include_once '../config.php';
include_once '../controleur/registrationctrl.php';
/* en tete */
include ("../include/head.php");
include ("../include/navbar.php");
?>
<!--corps de la page -->
<div class="bdPresentation container-fluid">
    <?php
    //^colone de gauche
    include ("../include/columnLeft.php");
    ?>
    <!-- colonne central-->
    <div id="columnCenter" class=" col-lg-8 px-0">

        
        <div class="registration text-center" id="registration">
            <div class="titleGreen">  
            <h1>Enregistrez-Vous !</h1>
        </div>
        <div><p>Pour pouvoir accéder au formulaire points noirs merci de bien vouloir  vous enregistez !
            </p></div>
            <?php include '../include/registerForm.php'; ?>
        </div>
       <div class="registration text-center col-lg-12" id="connexion">
           <div class="titleGreen">  
            <h1>Connectez-vous !</h1>
        </div>
        <div><p>Pour pouvoir accéder au formulaire points noirs merci de bien vouloir  vous connecter !
            </p></div>
            <div class="titleGreen">  
                <h2>connexion</h2>
            </div>
            <form method="POST"> 
                <input type="email" name="loginemail" placeholder="Votre mail" />
                <p><?= isset($formError['loginemail']) ? $formError['loginemail'] : '' ?></p>
                <input type="password" name="loginPassword" placeholder="Votre mot de passe" />
                <p><?= isset($formError['loginPassword']) ? $formError['loginPassword'] : '' ?></p>
                <input type="submit" name="connexion" value="Se connecter!"  />
            </form>
            <p><a href="passwordForget">Mot de passe oublié</a></p>
            <p> <?= isset($connexionError) ? $connexionError : '' ?></p>
            <p><?= isset($formError['userExist']) ? $formError['userExist'] : '' ?></p>
        </div>
        <div class="btnRegistration text-center">
            <p class="btn btn-link">Vous n'avez pas de compte alors inscrivez-vous ICI </p>
        </div>
        <div class="btnExistCompt text-center">
            <p class="btn btn-link"> J'ai un compte </p>
        </div>
    </div>
    <?php
//^colone de droite
    include ("../include/columnRight.php");
    ?>
</div>
<!--Fin corp de pages-->
<?php
include ("../include/footer.php");
?>
