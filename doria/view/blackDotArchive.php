<?php
session_start();
include_once '../../model/dataBase.php';
include_once '../../model/blackDot.php';
include_once '../../model/treatment.php';
include_once '../controleur/blackDotArchiveCtrl.php';
/* en tete */
include ("../include/head.php");
include ("../include/navbar.php");
?>
<!--corps de la page -->
<div class="bd container-fluid">
    <?php
    //^colone de gauche
    include ("../include/columnLeft.php");
    ?>
    <!-- colonne central-->
    <div id="columnCenter" class=" col-lg-8 px-0">
        <?php
        $auth = array(4, 6);
        if (isset($_SESSION['access']) && in_array($_SESSION['access'], $auth)) {
            ?>
            <div class="titleGreen">
                <h1>Points noirs archivés</h1>
            </div>
            <div class="<?= (count($formError) == 0) ? 'blackDotList' : 'ModifyStatusBlackDot'; ?>">
                <p class="suceessMessage"><?= isset($formError['NewStatus']) ? $formError['NewStatus'] : '' ?></p>
                <div class="titleGreen">
                    <h2 class=""> Hors Agglomération </h2>
                </div>
                <div class="row mx-0">
                    <?php
                    //boucle pour la liste des point noir hor agglomération 
                    foreach ($ListerBlackDotExtraUrban as $dataBlackDotExtra) {
                        if ($dataBlackDotExtra->id_1402f_extraUrban > 0 && $dataBlackDotExtra->id_1402f_extraUrban = !NULL && $dataBlackDotExtra->idStatus == 16) {
                            ?> 
                            <div class="blackDot col-md-4 col-sm-6 px-0">

                                <p>Titre du point Noir : <?= $dataBlackDotExtra->title ?></p>
                                <p>Date d'entregistrement du point noir : <?= $dataBlackDotExtra->datedenregistrement ?></p>

                                <p>Pseudo du déclarant : <?= $dataBlackDotExtra->pseudo ?></p>
                                <p>Mail du déclarant : <?= $dataBlackDotExtra->email ?></p>
                                <?php
                                if ($dataBlackDotExtra->idBlackDotOther != 0) {
                                    if ($dataBlackDotExtra->typeCategoryDanger == 10 && $dataBlackDotExtra->id_1402f_otherTypes == 2 || $dataBlackDotExtra->typeCategoryDanger == 20 && $dataBlackDotExtra->id_1402f_otherTypes == 3 || $dataBlackDotExtra->typeCategoryDanger == 26 && $dataBlackDotExtra->id_1402f_otherTypes == 4) {
                                        ?>  
                                        <p>Autre danger :  <?= $dataBlackDotExtra->otherText ?></p>    
                                    <?php } else {
                                        ?> 
                                        <p>Type de point noir : <?= $dataBlackDotExtra->typeCategoryDanger ?></p>
                                        <?php
                                    }
                                }
                                ?>
                                <p>Type de route : <?= $dataBlackDotExtra->typeRoadExtraUrban ?></p>
                                <p>Numéro de route : <?= $dataBlackDotExtra->roatNumber ?></p>
                                <p>En Venant de : <?= $dataBlackDotExtra->directionOf ?></p>
                                <p>En direction de : <?= $dataBlackDotExtra->comingFrom ?> </p>
                                <h3>lieu précis : </h3>
                                <p>Point Kilomètrique : <?= $dataBlackDotExtra->mileagePoint ?></p>
                                <?php
                                if ($dataBlackDotExtra->idBlackDotOther != 0) {
                                    if ($dataBlackDotExtra->id_1402f_otherTypes == 1 && $dataBlackDotExtra->typeDangerPosition == 7) {
                                        ?>
                                        <p>Autre postion :  <?= $dataBlackDotExtra->otherText ?></p>
                                    <?php } else {
                                        ?>
                                        <p>Lieu : <?= $dataBlackDotExtra->typeDangerPosition ?></p>
                                        <?php
                                    }
                                } if ($dataBlackDotExtra->id_1402f_blackdot > 0) {
                                    ?>
                                    <p>image du point noir :</p>
                                    <img class="small" id="imgBlackDot" src="../../<?= $dataBlackDotExtra->PictureName ?>"/>
                                    <?php
                                }
                                if ($dataBlackDotExtra->gpsCoordinates != NULL) {
                                    ?>
                                    <p>Coordonée GPS :  <?= $dataBlackDotExtra->gpsCoordinates ?></p>
                                    <?php
                                }
                                ?>      
                                <p>Statut du point noir : <?= $dataBlackDotExtra->status ?></p>
                                <p id="btnModifyStatusExtraUrban" data-idExtra="<?= $dataBlackDotExtra->idExtra ?>" class="btn ModifyStatusExtraUrban">Modifier le statut</p><br>
                                <div >
                                    <form method="post" name="formModifyStatus" id="BlackDotExtraUrban<?= $dataBlackDotExtra->idExtra ?>" class="formMdodifyStatusExtraUrban">
                                        <select name="NewStatus">
                                            <?php foreach ($StatusLister as $dataStatusBlackDotExtraUrban) { ?>
                                                <option value="<?= $dataStatusBlackDotExtraUrban->idStatus ?>"> <?= $dataStatusBlackDotExtraUrban->Status ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                        <input type="hidden" value="<?= $dataBlackDotExtra->idExtra ?>" name="idBlackDotExtra"/>
                                        <input type="submit" id="modfifyStatusExtraUrban" name="modfifyStatusExtraUrban" value="Modifier le statut" />
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?> </div><br> 
                <div class="titleGreen"> 
                    <h2 class="">  En Agglomération </h2>
                </div>
                <div class="row mx-0 px-0 largeurBD" >
                    <?php
                    //bocle de la liste en agglo ------------------------------------------------------------
                    foreach ($ListerBlackDotUrban as $dataBlackDotUrban) {
                        if ($dataBlackDotUrban->id_1402f_urban > 0 && $dataBlackDotUrban->id_1402f_urban = !NULL && $dataBlackDotUrban->idStatus == 16) {
                            ?>
                            <div class="blackDot col-md-4 col-sm-6 px-0">

                                <?php //  if($dataBlackDotUrban->status =! 16 ){ ?>
                                <p>Titre du Point Noir : <?= $dataBlackDotUrban->title ?></p>
                                <p>Date d'enregistrement du point noir : <?= $dataBlackDotUrban->datedenregistrement ?></p>
                                <p>Pseudo du déclarant :  <?= $dataBlackDotUrban->pseudo ?></p>
                                <p>Mail du déclarant : <?= $dataBlackDotUrban->email ?></p>
                                <?php
                                if ($dataBlackDotUrban->idBlackDotOther != 0) {
                                    if ($dataBlackDotUrban->typeCategoryDanger == 10 && $dataBlackDotUrban->id_1402f_otherTypes == 2 || $dataBlackDotUrban->typeCategoryDanger == 20 && $dataBlackDotUrban->id_1402f_otherTypes == 3 || $dataBlackDotUrban->typeCategoryDanger == 26 && $dataBlackDotUrban->id_1402f_otherTypes == 4) {
                                        ?>  
                                        <p>Autre danger :  <?= $dataBlackDotUrban->otherText ?></p>    
                                    <?php } else {
                                        ?> 
                                        <p>Type de point noir : <?= $dataBlackDotUrban->typeCategoryDanger ?></p>
                                        <?php
                                    }
                                }
                                ?>
                                <p>Type de voie : <?= $dataBlackDotUrban->typeStreet ?></p>
                                <p>Vers le numero : <?= $dataBlackDotUrban->streetNumber ?></p>
                                <p>Noms de la voie : <?= $dataBlackDotUrban->nameStreet ?></p>
                                <p>Code Postal : <?= $dataBlackDotUrban->zipCode ?></p>
                                <p>Ville : <?= $dataBlackDotUrban->city ?> </p>
                                <?php
                                if ($dataBlackDotUrban->idBlackDotOther != 0) {
                                    if ($dataBlackDotUrban->id_1402f_otherTypes == 1 && $dataBlackDotUrban->typeDangerPosition == 7) {
                                        ?>
                                        <p>Autre postion :  <?= $dataBlackDotUrban->otherText ?></p>
                                    <?php } else {
                                        ?>
                                        <p>Lieu : <?= $dataBlackDotUrban->typeDangerPosition ?></p>
                                        <?php
                                    }
                                }
                                if ($dataBlackDotUrban->id_1402f_blackdot < 0) {
                                    ?>
                                    <p>image du point noir :</p>
                                    <img class="small" id="imgBlackDot" src="<?= $dataBlackDotUrban->PictureName ?>"/>
                                    <?php
                                }
                                if ($dataBlackDotUrban->gpsCoordinates != NULL) {
                                    ?>
                                    <p>Coordonée GPS :  <?= $dataBlackDotUrban->gpsCoordinates ?></p>
                                <?php } ?>
                                <p>Statut du point noir : <?= $dataBlackDotUrban->status ?></p>

                                <p id="btnModifyStatusUrban" data-idUrban="<?= $dataBlackDotUrban->idBdUrban ?>" class="btn ModifyStatusUrban">Modifier le status</p><br>
                                <p id="btnModifyBlackDot" data-idUrban="<?= $dataBlackDotUrban->idBdUrban ?>" class="btn ModifyBlackDotUrban">Modifier le point noir</p>
                                <!--formulaire de modification du status point noir urbain-->
                                <?php //  }  ?>
                                <div  >
                                    <form method="post" name="formModifyStatus"  id="BlackDotUrban<?= $dataBlackDotUrban->idBdUrban ?>" class="formMdodifyStatusUrban">
                                        <select name="NewStatusUrban">
                                            <?php
                                            foreach ($StatusLister as $dataStatusBlackDotUrban) {
                                                ?>
                                                <option value="<?= $dataStatusBlackDotUrban->idStatus ?>"> <?= $dataStatusBlackDotUrban->Status ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                        <input type="hidden" value="<?= $dataBlackDotUrban->idBdUrban ?>" name="idBlackDotUrban"/>
                                        <input type="submit" id="modfifyStatusUrban" name="modfifyStatusUrban" value="Modifier le statut" />
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <?php
            } else {
                require '../include/restrictedZone.php';
            }
            ?>
        </div>
    </div>
    <div class="big">
        <p> </p>
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