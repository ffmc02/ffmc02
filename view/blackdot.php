<?php
include_once '../config.php';
include_once '../controleur/blackdotCtrl.php';
/* en tete */
include ("../include/head.php");
include ("../include/navbar.php");
?>
<!--corps de la page -->
<div class="bdBlackDot container-fluid">
    <!-- colonne central-->
    <?php
    //^colone de gauche
    include ("../include/columnLeft.php");
    ?>
    <div id="columnCenter" class=" col-lg-8 px-0">
        <?php
        //conditionn de restriction d'accès
        $auth = array(4, 6, 7);
        if (isset($_SESSION['access']) && in_array($_SESSION['access'], $auth)) {
            ?>
            <!--presentation du formulaire point noir-->
            <div class="titleGreen">
                <h1>Les points noirs</h1>
            </div>
            <p id="messageHello" class="text-center">Bienvenue <?= $_SESSION['pseudo'] ?> sur le formulaire des points noirs</p>

            <div class="titleGreen">
                <h2>Pour nous faire remonter un point dangereux dit "point noir"</h2>
            </div>
            <p> deux solutions : <br>
                - utiliser le formulaire <a href="#formBlackDot" >ci-dessous,</a><br>
                - nous envoyer un Mail via le <a href="contactus" >formulaire de contact,</a><br>
                - voir la liste des points noirs <a href="listeBlackDot">déjà déclarés</a>
            </p>

            <div class="titleGreen">
                <h2>Les catégories à remplir dans le formulaire</h2>
            </div>
            <div class="titleGreen">
                <h2>La localisation du point noir</h2>
            </div>
            <p>Une partie également très importante, elle nous permet d'aller sur place constater le type exact de danger,
                puis envoyer un courrier au bon interlocuteur. Si vous avez la possibilité de mettre les points GPS, n'hésitez pas.</p>
            <div class="titleGreen">
                <h2>Le type de point noir </h2>
            </div>
            <p>Vous trouverez plusieurs catégories :</p>
            <ul class="text-center">  
                <li>Les nids de poules ou trous dans la route</li>
                <li>Les barrières de sécurité non doublées</li>
                <li>Les dos d'âne ou coussins berlinois</li>
                <li>et les dangers temporaires (gravillons, boue etc)</li>
            </ul>
            <div class="titleGreen" id="formBlackDot">
                <h2>Le formulaire point noir</h2>
            </div>
            <!--message d'erreur-->
            <p class="suceessMessage"><?= isset($messagesuccesBd) ? $messagesuccesBd : '' ?></p>
            <p class="errorMessage"><?= isset($formError['zipCode']) ? $formError['zipCode'] : '' ?></p>
            <p class="errorMessage"><?= isset($formError['roatNumber']) ? $formError['roatNumber'] : '' ?></p>
            <p class="errorMessage"><?= isset($formError['addTrueBlackDot']) ? $formError['addTrueBlackDot'] : '' ?></p>
            <p class="errorMessage"><?= isset($formError['inDirection']) ? $formError['inDirection'] : '' ?></p>
            <p class="errorMessage"><?= isset($formError['title']) ? $formError['title'] : '' ?></p>
            <p class="errorMessage"><?= isset($formError['comingFrom']) ? $formError['comingFrom'] : '' ?></p>
            <form class="my-0" name="blackdot" method="POST" enctype="multipart/form-data">
                <div class="titleGreen">
                    <h2><b>titre du point noir</b></h2>
                </div>
                <p><?= isset($formError['UneEntrée']) ? $formError['UneEntrée'] : '' ?></p>
                <p>Pour le titre vous pouvez par exemple l'appeler : "nid de poule RN2 Champignonnière"</p>
                <label for="titleBlackDot">Titre : *</label>
                <input name="titleBlackDot" type="text" id="titleBlackDot" />
                <h2><b>Le lieu général</b></h2>

                <button type="button" class="btn btn-success" id="extra"><b>Hors agglomération </b></button>
                <button type="button" class="btn btn-success" id="urban"><b>En agglomération</b></button>
                <div id="extra-Urban" class="text-center">
                    <!--hors aglomeration-->
                    <div class="mb-3">
                        <label>Sélectionnez le type d'axe dans la liste suivante :* </label><br>
                        <select name="roadextraurban" id="roadextraurban">
                            <option selected></option>
                            <?php foreach ($listerRoadExtraUrban as $roadExtraUrbanData) { ?>
                                <option value="<?= $roadExtraUrbanData->id ?>"> <?= $roadExtraUrbanData->typeRoadExtraUrban ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Numéro de la route : *</label><br>
                        <input type="text" id="numberHighway" name="roatNumber" placeholder="exemple : Rn2"/>

                    </div>
                    <div class="mb-3">
                        <label>En direction de : *</label><br>
                        <input type="text" id="directionOf" name="inDirection" placeholder="exemple : Laon"/>
                    </div>
                    <div class="mb-3">
                        <label>En venant de : </label><br>
                        <input type="text" id="comingFrom" name="comingFrom" placeholder="exemple : Soissons"/>
                    </div>
                    <div class="mb-3">
                        <label>Point kilométrique : </label><br>
                        <input type="text" id="mileagePoint" name="mileagePoint" placeholder="exemple : 77" />
                        <small id="fileHelp" class="form-text text-muted">*OBLIGATOIRE</small>
                    </div>
                </div>
                <!--en agglomeration-->
                <div id="inUrbanAreas" class="text-center">
                    <div class="mb-3">
                        <label>A proximité du numéro : *</label><br>
                        <input type="text" id="numberStreet" name="numberStreet" placeholder="exemple : 25 bis"/>
                        <p><?= isset($formErrorUrban['numberStreet']) ? $formErrorUrban['numberStreet'] : '' ?></p>
                    </div>
                    <div class="mb-3">
                        <label>Sélectionnez le type d'axe dans la liste suivante :*</label><br>
                        <select class="custom-select custom-select-sm" name="typeStreet" id="typeStreet">
                            <option selected=""></option>
                            <?php foreach ($listeUrban as $listerStreet) { ?>
                                <option value="<?= $listerStreet->id ?>"> <?= $listerStreet->typeStreet ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Noms : *</label><br>
                        <input type="text" id="nameStreet" name="nameStreet" placeholder="exemple :  dupont" id="nameStreet"/> 
                        <p><?= isset($formError['nameStreet']) ? $formError['nameStreet'] : '' ?></p>
                    </div>
                    <div class="mb-3">
                        <label>code postal : *</label><br>
                        <input type="text" id="zipCode" name="zipCode" placeholder="exemple : 02320"/>
                    </div>
                    <div class="mb-3"> 
                        <label>ville  : *</label><br>
                        <input type="text" id="city" name="city" placeholder="exemple : Laon"/>
                        <p><?= isset($formError['city']) ? $formError['city'] : '' ?></p>
                    </div>
                    <small>* OBLIGATOIRE de remplir merci</small>
                </div>
                <!--localisation du danger-->
                <div class="titleGreen">
                    <h2><b>Position du danger</b></h2>
                </div>
                <button type="button" class="btn btn-success" id="dangerPosition"><b>Position du danger</b></button>
                <div class="row mx-0" id="dangerPositionOption">
                    <label for="gpsCoordinates">Coordonnées GPS : </label>
                    <input type="text" name="gpsCoordinates" placeholder="Coordonée GPS" id="gpsCoordinates"/>
                    <small id="fileHelp" class="form-text text-muted">Les coordonnées GPS ne sont pas obligatoires mais fortement recommendées pour localiser le point noir précisément.</small>
                    <label>Sélectionnez la position du danger dans la liste suivante : *</label>
                    <select class="custom-select custom-select-sm" name="dangerPosition">
                        <option selected>position exacte du danger</option>
                        <?php foreach ($positionDanger as $positionDanger) { ?>
                            <option class="dangerPosition" value="<?= $positionDanger->id ?>"> <?= $positionDanger->typeDangerPosition ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div id="dangerPositionOther">
                    <label>autres, veuillez préciser :</label><br>
                    <textarea id="infrastructureAutre" rows="5" cols="10" name="dangerPositionOther"></textarea>
                </div>
                <!--type de danger-->
                <div class="titleGreen">
                    <h2 id="typesOfDanger"><b>Types de danger</b></h2>
                </div>
                <button type="button" class="btn btn-success" id="signaling" class="row"><b>Signalisation</b></button>
                <button type="button" class="btn btn-success" id="infrastructure"><b>Infrastructure</b></button>
                <button type="button" class="btn btn-success" id="slippery"><b>Chaussée glissante</b></button>
                <!--signalisation absente--> 
                <div class="row  mx-0" id="optionSignaling">
                    <label>Sélectionnez le type de danger dans la liste suivante :*</label>
                    <select class="custom-select custom-select-sm" name="idCategoryDangerSignaline">
                        <option selected>Signalisation</option>
                        <?php foreach ($listeDangerPositionByIdDanger as $typeDangerSignaliging) { ?>
                            <option class="signaling" value="<?= $typeDangerSignaliging->id ?>"> <?= $typeDangerSignaliging->typeCategoryDanger ?></option>
                        <?php }
                        ?>
                    </select>
                    <div id="signalingOther">
                        <label>autres, veuillez préciser :*</label><br>
                        <textarea  rows="5" cols="10" name="otherSignaling"></textarea>
                    </div>
                </div>
                <!--infrastructure dangereuse-->
                <div class="row  mx-0" id="infrastructureOption">
                    <label>Sélectionnez le type de danger dans la liste suivante :*</label>
                    <select class="custom-select custom-select-sm" name="idCategoryDangerInfrastructure">
                        <option selected>Infrastructure</option>
                        <?php foreach ($listeinfrastructure as $typeDangerInfrastructure) { ?>
                            <option class="infrat" value="<?= $typeDangerInfrastructure->id ?>" data-test="<?= $typeDangerInfrastructure->id ?>"> <?= $typeDangerInfrastructure->typeCategoryDanger ?></option>
                            <?php
                        }
                        ?>
                    </select>

                    <div id="infrastructureOther">
                        <label>autres, veuillez préciser :</label><br>
                        <textarea id="infrastructureAutre" rows="5" cols="10" name="otherInfrastructure"></textarea>
                    </div>
                </div>
                <!--chaussée glissabnte-->
                <div class="row  mx-0" id="slipperyRoad">
                    <div>
                        <label>Sélectionnez le type de danger dans la liste suivante *:</label>
                        <select class="custom-select custom-select-sm" name="idCategoryDangerslipperyRoad">
                            <option selected>Route glissante</option>
                            <?php foreach ($listeDangerRoad as $typeDangerRaod) { ?>
                                <option class="slipperyRoad"  value="<?= $typeDangerRaod->id ?>"> <?= $typeDangerRaod->typeCategoryDanger ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div id="slipperyRoadOther">
                        <label>autres problèmes, veuillez préciser :</label><br>
                        <textarea id="slipperyRoadAutre" rows="5" cols="10" name="otherSlipperyRoad"></textarea>
                    </div>
                </div>
                <!--ajout des photos-->
                <div class="form-group">
                    <label for="exampleInputFile">Télécharger une photo</label>
                    <input type="file" class="form-control-file" id="exampleInputFile" name="picture" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">Si vous avez pris une photo du danger vous pouvez nous l'envoyer ici format PNG JPG JPEG</small>
                </div>
                <input type="submit" id="btnFormBlackDot" name="btnFormBlackDot" class="btn-success" value="Envoyer mon point noir" />
            </form> 
            <?php
        } else {
//           header("Location: registration");
            ?>
            <p>Pour avoir accées a cette page merci de vous connectez ou vous inscrire <a href="registration">ici</a></p>
        <?php }
        ?>
    </div>
    <!-- fin colonne central-->
    <?php
    //^colone de droite
    include ("../include/columnRight.php");
    ?>
</div>
<!--Fin corp de pages-->
<?php
include ("../include/footer.php");
?>