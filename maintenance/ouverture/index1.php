<?php 
require('modelmailtemps.php'); ?>
<!--début du headindex-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">      
        <link rel="stylesheet" href="assets/librairie/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/librairie/css/bootstrap.css">
        <link href="assets/librairie/js/bootstrap.js"/>
        <link href="assets/librairie/js/jqurey-3.3.0.min.js"/>
        <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/solar/bootstrap.min.css" rel="stylesheet" integrity="sha384-8nq3OiMMgrVFAHyRMMO+DTfMEciSY+c3Awhj/5ljQ1xck1Uv2BUtMjsjLD8GT5Er" crossorigin="anonymous"/>
        <link rel="stylesheet" href="bobododo/assets/css/style.css" /> <!--pour mes css -->
        <script type="text/javascript">
            document.onselectstart = new Function("return false")
            document.oncontextmenu = new Function("return false")
            document.ondragstart = new Function("return false")
            function ImpEcrOff() {
                SetInterval("window.clipboardData.setData('text','')", 20);
            }
        </script>
        <title>ffmc02</title>
    </head>
    <body>
        <div class="bgIndex container-fluid text-center">

            <!--Entête-->      
            <div class="row">
                <div class="col-lg-2">
                    <img class="nickolas img-fluid" src="assets/img/imageslocal/nikolas.png"/>  
                </div>
                <div class="col-lg-8">
                    <img class="img-fluid " src="assets/img/imageslocal/logopourgiletavant.png"/>
                </div>
                <div class=" col-lg-2">
                    <img class="nickolas img-fluid" src="assets/img/imageslocal/nikolas.png"/>  
                </div>
            </div>
            <h1>SITE EN CONSTRUCTION OUVERTURE DU SITE LE 6 SEPTEMBRE A 18H

                <pre>
<span><font size="3"><font face="arial"><font color="#000000"> <div align="center">
<center><script language="JavaScript">
    TargetDate = "09/06/2019 05:59 PM";
    BackColor = false;
    ForeColor = false;
    CountActive = true;
    CountStepper = -1;
    LeadingZero = true;
    DisplayFormat = "Ouverture du site dans : %%D%% &nbsp;Jours,  %%H%% &nbsp; Heurs %%M%% &nbsp;Minutes et  %%S%% secondes";
    FinishMessage = "Ouverture du site  !";
                                                                                    </script>
<script language="JavaScript" src="http://scripts.hashemian.com/js/countdown.js">
</script></center></div></span>
                </pre></h1>
            <div class="titleGreen">
                <h2>vous souhaitez etres informé de l'ouverture</h2>
            </div>
            <p>Laisser nous votre mail via le formulaire si dessous</p>
            <form method="post" action="mailRigistration.php">
                <label>Votre pseudo</label>
                <input type="text" id="pseudotemp" name="pseudotemp" placeholder="votre pseudo" />
                <label>Votre email</label>
                <input type="email" name="mail" id="mail" placeholder="votre email" id="mail" >
                       <input type="submit" placeholder="envoyer mon maail" name="index" value="envoyer"/>
            </form>
            <?php
//            if (isset($fault)) {
//                echo $fault;
//            }
            ?>
        </div>
            <!--début du footer-->
            <footer>
                <div class="fondPartenaire2 container-fluid">

                    <!-- fin de div icone structures -->
                    <div class="row">
                        <div class=" col-sm-12 col-md-12   text-center border border-white">
                            <span class="signaturePartenaire texte-copyright">ffmc02 by gaetan jonard coordinateur de la ffmc 02 © <a href="#" >conception</a></span>
                            <span><a class="signaturePartenaire texte-contact" href="contact.php">Nous Contacter</a></span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- incorporer au besoin le javas script ou la bibiotheque jquery -->

            <script src="assets/librairie/js/jquery-3.3.0.min.js"></script>
            <script src="assets/librairie/js/script.js"></script>
            <script src="assets/librairie/js/bootstrap.min.js"></script>
    </body>
</html>
