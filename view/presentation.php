<?php
include_once '../config.php';
/* en tete */
include ("../include/head.php");
?>
<title>Présentation de l'antenne de l'Aisne</title>
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
            <h1>Présentation de La FFMC02 </h1>
        </div>
        <div class="titleGreen">
            <h2>Conseil d'administration de la FFMC 02 :</h2>
        </div>
        <p>
            Nous avons:
        </p> 
        <div class="row">
            <div class="col-lg-6 ">
                <img id="imgPresentation" class="img-fluid text-center" src="../assets/img/imagespresentation/gaetan.jpg" alt="photo-coordinateur"/>
                <h2>Coordinateur <br>Gaëtan Jonard</h2>
            </div>
            <div class="col-lg-6">
                <img id="imgPresentation" class="img-fluid" src="../assets/img/imagespresentation/fred.jpg" alt="photo-coord-adjoint"/>
                <h2>Coordinateur-Adjoint <br>Frédéric Fleury</h2>
            </div>
            <div class="col-lg-4">
                <img id="imgPresentation" class="img-fluid" src="../assets/img/imagespresentation/francki.jpg" alt="photo-secretaire"/> 
                <h2>Secrétaire<br> Franck Blanchet</h2>
            </div>
            <div class="col-lg-4">
                <img id="imgPresentation" class="img-fluid" src="../assets/img/imagespresentation/nikolas.png" alt="photo-secretaire-adjoint-nord"/>
                <h2>Secrétaire-adjoint-nord <br>Raphael Caze</h2>
            </div>
            <div class="col-lg-4">
                <img id="imgPresentation" class="img-fluid" src="../assets/img/imagespresentation/martine.jpg" alt="secraitre-adjoint-sud" />
                <h2>Secrétaire-adjoint-sud <br>Martine KLESZEZ</h2>
            </div>
            <div class="col-lg-6">
                <img id="imgPresentation" class="img-fluid" src="../assets/img/imagespresentation/nikolas.png" alt="photo-coord-adjoint"/>
                <h2>Trésorier<br>Jean Denis Massette</h2>
            </div>
            <div class="col-lg-6">
                <img id="imgPresentation" class="img-fluid" src="../assets/img/imagespresentation/nikolas.png" alt="photo-coord-adjoint"/>
                <h2>Trésorier-adjoint<br>Mathieu Mullet</h2>
            </div>
                     <div class="col-lg-4">
               <img id="imgPresentation" class="img-fluid" src="../assets/img/imagespresentation/photobenji.jpg" alt="membre-ca" />
                <h2>Membre du conseil d'administration<br>Benjamin Marchandise</h2>
            </div>
                          <div class="col-lg-4">
                              <img id="imgPresentation" class="img-fluid" src="../assets/img/imagespresentation/nikolas.png" alt="secraitre-adjoint-sud" />
                <h2>Membre du conseil d'administration<br>Bruno KLESZEZ</h2>
            </div>
              <div class="col-lg-4">
                <img id="imgPresentation" class="img-fluid" src="../assets/img/imagespresentation/nikolas.png" alt="mandataire-ca" />
                <h2>Mandataire<br>Eddy Vache</h2>
            </div>
        </div>
        <div class="titleGreen">
            <h2> Petite histoire de la Nouvelle FFMC02.</h2>  
        </div>
        <p>La FFMC02 a été réactivée au mois de janvier 2017 lors de l'assemblée générale de constitution.<br>
            L'idée de faire revivre cette dernière est venue de deux amis motards, Benjamin et Gaëtan.<br>
            C'est grâce à eux et plusieurs autres personnes que la FFMC est à nouveau représentée sous forme d'une antenne locale dans l'Aisne.<br>
            Merci à toutes les personnes qui ont soutenu la FFMC 02 ainsi qu'aux antennes Marraines.
        </p>
        <div class="titleGreen">
            <h2>Le rôle et les ambitions de la FFMC02</h2>
        </div>
        <p>La FFMC02 est une association loi 1901 à but non lucratif.<br>
            Notre association a pour but de défendre les deux et trois roues motorisés, mais également de remonter les zones de danger comme :<br>
            les nids de poules , gravillons, dos d'ânes trop hauts...<br>
            La FFMC02 organise également des journées "pédagogique" de type Reprise de Guidon, <br> 
                        Son action ne s'arrête pas là car, quand le besoin et l'actualité politique le demandent, elle organise des manifestations :<br>
            - Départementale <br>
            - Régionale <br>
            - Du conseil régional des Hauts de France (notamment notre grosse action avril 2018 contre les 80km/h sur les routes à double sens sans séparateur central).
        </p>
        <div class="titleGreen">
            <h2>Contact</h2>
        </div>
        <p>
            Vous pouver nous contacter ici : <a href="contactus.php">page Contact</a><br>
            Vous devez vous inscrire pour déclarer un point noir : <a href="blackdot">inscription</a>
        <p>
            <!-- fin petite presentation ffmc02 -->
            <!--<div class="row">-->
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