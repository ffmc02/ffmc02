<?php
include_once '../config.php';
include_once '../controleur/listeBlackDotCtrl.php';
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
        <div class="titleGreen">
            <h1>Points noirs  signalés</h1>
        </div>
        <p>+ Ajouter un nouveau <a href="blackdot">Point noir</a></p>
        <div class="<?= (count($formError) == 0) ? 'blackDotList' : 'ModifyStatusBlackDot'; ?>">
            <!--<div class="titleGreen">-->
            <h2 class="titleGreen"> Hors Agglomération </h2>
            <!--</div>-->   
            <div class="row mx-0 largeurBD">
                <?php
//boucle pour la liste des point noir hor agglomération 
                foreach ($ListerBlackDotExtraUrban as $dataBlackDotExtra) {
                    if ($dataBlackDotExtra->id_1402f_extraUrban > 0 && $dataBlackDotExtra->id_1402f_extraUrban = !NULL ) {
                        ?> 
                        <div class="blackDot col-md-4 col-sm-6 px-0 text-center" >                            
                            <p class="titleGreen"><?= $dataBlackDotExtra->title ?></p>
                            <p><?= $dataBlackDotExtra->typeCategoryDanger ?></p>
                            <p><?= $dataBlackDotExtra->roatNumber ?></p>
                            <img class="small" id="imgBlackDot" src="<?= $dataBlackDotExtra->PictureName ?>"/>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $dataBlackDotExtra->idExtra ?>"  data-idExtra="<?= $dataBlackDotExtra->idExtra ?>" >
                                détail</button>
                            <?php
                            if (isset($_SESSION['access']) && ($_SESSION['access'] == 4 || $_SESSION['access'] == 6)) {
                                ?>
                                <button class="btn btn-success"><?= $dataBlackDotExtra->status ?></button>
                                <a href="../doria/view/listeBlackDotAdm.php" type="button" class="btn btn-danger">Modifier</a>
                            <?php }
                            ?>
                            <!-- modal-->
                            <div class="modal fade" id="exampleModal<?= $dataBlackDotExtra->idExtra ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-white">
                                            <h5 class="modal-title" id="exampleModalLabel">détaille du point noir </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body bg-white" id="BlackDotDetailleExtraUrban<?= $dataBlackDotExtra->idExtra ?>">
                                            <p>Date d'entregistrement du point noir : <?= $dataBlackDotExtra->datedenregistrement ?></p>
                                            <?php
                                            if (isset($_SESSION['access']) && ($_SESSION['access'] == 4 || $_SESSION['access'] == 6 || $_SESSION['idUser'] == $dataBlackDotExtra->id_1402f_user)) {
                                                ?>
                                                <p>Pseudo du déclarant : <?= $dataBlackDotExtra->pseudo ?></p>
                                                <p>Mail du déclarant : <?= $dataBlackDotExtra->email ?></p>
                                            <?php }
                                            ?>
                                            <p> <?= $dataBlackDotExtra->typeCategoryDanger ?></p>
                                            <p> <?= $dataBlackDotExtra->typeRoadExtraUrban ?></p>
                                            <p>Numéro de route : <?= $dataBlackDotExtra->roatNumber ?></p>
                                            <p>En Venant de : <?= $dataBlackDotExtra->directionOf ?></p>
                                            <p>En direction de : <?= $dataBlackDotExtra->comingFrom ?> </p>

                                            <p>Point Kilomètrique : <?= $dataBlackDotExtra->mileagePoint ?></p>
                                            <p>Lieu : <?= $dataBlackDotExtra->typeDangerPosition ?></p>
                                            <?php
                                            if ($dataBlackDotExtra->gpsCoordinates != NULL) {
                                                ?>
                                                <strong></strong> <p>Coordonée GPS :  <?= $dataBlackDotExtra->gpsCoordinates ?></p>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="modal-footer bg-white">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>
            <!--pagination-->
         <p colspan="3" class="text-center"> page :
                        <?php
                        for ($i = 1; $i <= $countBlackDotExtraUrban->nbrBlackDotExtraUrban; $i++) {
                            ?>
                            <a href="?pageChoiceExtraUrban=<?= $i ?>"><?= $i ?></a>
                        <?php }
                        ?></p> 
            <br>
            <!--bocle de la liste en agglo -------------------------------------------------------------->
            <div class="titleGreen"> 
                <h2 class="">  En Agglomération </h2>
            </div>    
            
            <div class="row mx-0 px-0 largeurBD "> 
                <?php
                foreach ($ListerBlackDotUrban as $dataBlackDotUrban) {
                    if ($dataBlackDotUrban->id_1402f_urban > 0 && $dataBlackDotUrban->id_1402f_urban = !NULL) {
                        ?>
                        <div class="blackDot col-md-4 col-sm-6 px-0 text-center">
                            <p class="titleGreen"> <?= $dataBlackDotUrban->title ?></p>
                            <p> <?= $dataBlackDotUrban->city ?> </p>
                            <p><?= $dataBlackDotUrban->typeCategoryDanger ?></p>
                            <p>Localisation précise : <?= $dataBlackDotUrban->typeDangerPosition ?></p>

                            <img class="small" id="imgBlackDot" src="<?= $dataBlackDotUrban->PictureName ?>"/>
                            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#detailBlackDotUrban<?= $dataBlackDotUrban->idBdUrban ?>"  >
                                détail
                            </button>
                            <?php
                            if (isset($_SESSION['access']) && ($_SESSION['access'] == 4 || $_SESSION['access'] == 6)) {
                                ?>
                                <button class="btn btn-success"> <?= $dataBlackDotUrban->status ?></button>
                                <a href="../doria/view/listeBlackDotAdm.php" type="button" class="btn btn-danger">Modifier</a>
                            <?php } ?>
                            <!-- modal-->
                            <div class="modal fade" id="detailBlackDotUrban<?= $dataBlackDotUrban->idBdUrban ?>" data-id="<?= $dataBlackDotUrban->idBdUrban ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-white">
                                            <h5 class="modal-title" id="exampleModalLabel">détaille du point noir </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body bg-white" id="BlackDotDetailleUrban<?= $dataBlackDotUrban->idExtra ?>">
                                            <p>Le <?= $dataBlackDotUrban->datedenregistrement ?></p>
                                            <?php
                                            if (isset($_SESSION['access']) && ($_SESSION['access'] == 4 || $_SESSION['access'] == 6 || $_SESSION['idUser'] == $dataBlackDotUrban->id_1402f_user)) {
                                                ?>
                                                <p>Pseudo du déclarant :  <?= $dataBlackDotUrban->pseudo ?></p>
                                                <p>Mail du déclarant : <?= $dataBlackDotUrban->email ?></p>
                                            <?php }
                                            ?>
                                            <p> <?= $dataBlackDotUrban->typeCategoryDanger ?></p>
                                            <p>Type de voie : <?= $dataBlackDotUrban->typeStreet ?></p>
                                            <p>Vers le numero : <?= $dataBlackDotUrban->streetNumber ?></p>
                                            <p>Noms de la voie : <?= $dataBlackDotUrban->nameStreet ?></p>
                                            <p>Code Postal : <?= $dataBlackDotUrban->zipCode ?></p>
                                            <?php
                                            if ($dataBlackDotUrban->gpsCoordinates != NULL) {
                                                ?>
                                                <p>Coordonée GPS :  <?= $dataBlackDotUrban->gpsCoordinates ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="modal-footer bg-white">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
             <p colspan="3" class="text-center"> page :
                        <?php
                        for ($i = 1; $i <= $countBlackDotUrban->nbrBlackDoturban; $i++) {
                            ?>
                            <a href="?pageChoiceUrban=<?= $i ?>"><?= $i ?></a>
                        <?php }
                        ?></p>

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