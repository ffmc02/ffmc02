<?php
include_once '../config.php';
include_once '../controleur/contactusctrl.php';
/* en tete */
include ("../include/head.php");
?>
<title>Contactez-nous</title>
<?php
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
        <div class="titleGreen">
            <h1>Comment nous contacter</h1>
        </div>
        <div class="titleGreen">
            <h2>Vous pouvez nous contacter via le formulaire ci dessous :</h2>
        </div>

        <form action="#" method="post" class="form">
            <label>Votre nom * :</label><input name="name" value=""  type="text">
            <p class="errorMessage"><?= isset($formError['name']) ? $formError['name'] : '' ?></p> 
            <label>Votre email :</label><input name="email" value="" type="email">
            <p class="errorMessage"><?= isset($formError['email']) ? $formError['email'] : '' ?></p> 
            <label>Votre numéro de téléphone * :</label>
            <input name="phoneNumber" value="" size="40" type="tel">
            <p class="errorMessage"><?= isset($formError['phoneNumber']) ? $formError['phoneNumber'] : '' ?></p> 
            <label>Sujet :</label>
            <input name="subject" value="" size="40" type="text">
            <p class="errorMessage"><?= isset($formError['subject']) ? $formError['subject'] : '' ?></p> 
            <label>Votre ville :</label>
            <input name="city" value="" size="40" type="text">
            <p class="errorMessage"><?= isset($formError['city']) ? $formError['city'] : '' ?></p> 
            <label>Votre message * :</label>
            <textarea name="message" cols="40" rows="10" class="form-control textarea validates-as-required" id="message" ></textarea>
            <p class="errorMessage"><?= isset($formError['message']) ? $formError['message'] : '' ?></p> 
            <input  type="submit" name="send" value="Envoyer"/>
        </form>
        <i> * Ces champs sont indispensables</i>

        <?php if (isset($_POST['send'])) { ?>
            <p>Nom : <?= $_POST['name'] ?></p>
            <p>Email :<?= $_POST['email'] ?></p>
            <p>Téléphone : <?= $_POST['phoneNumber'] ?></p>
            <p>Sujet : <?= $_POST['subject'] ?></p>
            <p>Ville : <?= $_POST['city'] ?></p>
            <p>Message : <?= $_POST['message'] ?></p>

        <?php } ?>
        <p class="suceessMessage"><?= isset($mailMessage) ? $mailMessage : '' ?></p>
        <p class="errorMessage"><?= isset($mailMessageError) ? $mailMessageError : '' ?></p>
        <div class="titleGreen">
            <h2>Nos réunions mensuelles</h2>
        </div>
        <div class="text-center">
            <?php
            foreach ($listeEventMeeting AS $listerEvents) {
                if ($listerEvents->eventCategory == 1) {
                    ?>
                    <p> la  <?= $listerEvents->title ?> </p>
                    <p>aura lieu le <?= $listerEvents->dateEvent ?></p>
                    <p>Au  <?= $listerEvents->location ?></p>
                    <?php
                }
            }
            ?>
        </div>
        <div class="titleGreen">
            <h2>Nous retrouver sur les résaux sociaux</h2>
        </div> 
        <p>Vous pouvez également nous suivre via la page Facebook : <a href="https://www.facebook.com/FFMC02Aisne" class="spip_out" rel="external" target="_blank">FFMC AISNE</a> </p>
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