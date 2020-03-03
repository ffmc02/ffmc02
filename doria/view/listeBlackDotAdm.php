<?php
session_start();
include_once '../../model/dataBase.php';
include_once '../../model/blackDot.php';
include_once '../../model/treatment.php';
include_once '../controleur/listeBlackDotAdmCtrl.php';
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
        if (isset($_SESSION['access']) && ($_SESSION['access'] == 4 || isset($_SESSION['access']) && $_SESSION['access'] == 6 )) {
            ?>
            <div class="titleGreen">
                <h1>Points noirs signalés</h1>
            </div>
            <div class="<?= (count($formError) == 0) ? 'blackDotList' : 'ModifyStatusBlackDot'; ?>">
                <p class="suceessMessage"><?= isset($formError['NewStatus']) ? $formError['NewStatus'] : '' ?></p>
                <p class="suceessMessage"><?= isset($messaageSucess) ? $messaageSucess : '' ?></p>
                <p class="errorMessage"><?= isset($formError['title']) ? $formError['title'] : '' ?></p>
                <div class="titleGreen">
                    <h2 class=""> Hors Agglomération </h2>
                </div>
                <div class="row mx-0">
                    <?php
                    //boucle pour la liste des point noir hor agglomération 
                    foreach ($ListerBlackDotExtraUrban as $dataBlackDotExtra) {
                        if ($dataBlackDotExtra->id_1402f_extraUrban > 0 && $dataBlackDotExtra->id_1402f_extraUrban = !NULL) {
                            ?> 
                            <div class="blackDot col-md-4 col-sm-6 px-0">

                                <p><?= $dataBlackDotExtra->title ?></p>
                                <p><?= $dataBlackDotExtra->status ?></p>
                                <p> <?= $dataBlackDotExtra->roatNumber ?></p>
                                <?php
                                if ($dataBlackDotExtra->id_1402f_blackdot > 0) {
                                    ?>

                                    <img class="small" id="imgBlackDot" src="../../<?= $dataBlackDotExtra->PictureName ?>"/>
                                    <?php
                                }
                                ?>    
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $dataBlackDotExtra->idExtra ?>"  data-idExtra="<?= $dataBlackDotExtra->idExtra ?>" >
                                    Détail du point noir
                                </button><br>
                                <p id="btnModifyStatusExtraUrban" data-idExtra="<?= $dataBlackDotExtra->idExtra ?>" class="btn ModifyStatusExtraUrban">Modifier le statut</p><br>
                                <p id="btnModifyBlackDotExtraUrban" data-idExtra="<?= $dataBlackDotExtra->idExtra ?>" class="btn ModifyBlackDotExtraUrban">Modifier le Point Noir</p>
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
                                <div id="modifyBlackDotExtraUrban<?= $dataBlackDotExtra->idExtra ?>" class="formMdodifyBlackDotExtraUrban">
                                    <form method="post" name="formBlackDot">
                                        <input type="hidden" value="<?= $dataBlackDotExtra->idExtra ?>" name="idBlackDotExtraUrban"/>
                                        <label> titre a modifier : <?= $dataBlackDotExtra->title ?> </label>
                                        <input type="text" name="modifyTitleExtraUrban" />
                                        <input type="submit" name="modifyExtraUrban" value="modifier le point noir" />
                                    </form>
                                </div>
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
                                                <p>Pseudo du déclarant : <?= $dataBlackDotExtra->pseudo ?></p>
                                                <p>Mail du déclarant : <?= $dataBlackDotExtra->email ?></p>
                                                <p>  <?= $dataBlackDotExtra->otherText ?></p>    
                                                <p> <?= $dataBlackDotExtra->typeCategoryDanger ?></p>
                                                <p> <?= $dataBlackDotExtra->typeRoadExtraUrban ?></p>
                                                <p> <?= $dataBlackDotExtra->roatNumber ?></p>
                                                <p>En Venant de : <?= $dataBlackDotExtra->directionOf ?></p>
                                                <p>En direction de : <?= $dataBlackDotExtra->comingFrom ?> </p>
                                                <h3>lieu précis : </h3>
                                                <p>Point Kilomètrique : <?= $dataBlackDotExtra->mileagePoint ?></p>
                                                <p><?= $dataBlackDotExtra->otherText ?></p>
                                                <p>Lieu : <?= $dataBlackDotExtra->typeDangerPosition ?></p>
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
                    ?> <br>

                </div>
                <div class="text-center">
                    <p colspan="3"> page :
                        <?php
                        for ($i = 1; $i <= $countBlackDotExtraUrban->nbrBlackDotExtraUrban; $i++) {
                            ?>
                            <a href="?pageChoiceExtraUrban=<?= $i ?>"><?= $i ?></a>
                        <?php }
                        ?>
                    </p>
                </div> 
                <br>
                <!--//bocle de la liste en agglo -------------------------------------------------------------->
                <div class="titleGreen"> 
                    <h2 class="">  En Agglomération </h2>
                </div>
                <div class="row mx-0">
                    <?php
                    
                    foreach ($ListerBlackDotUrban as $dataBlackDotUrban) {
                        if ($dataBlackDotUrban->id_1402f_urban > 0 && $dataBlackDotUrban->id_1402f_urban = !NULL) {
                            ?>
                            <div class="blackDot col-md-4 col-sm-6 px-0">
                                <p>Titre du Point Noir : <?= $dataBlackDotUrban->title ?></p>
                                <p>Ville : <?= $dataBlackDotUrban->city ?> </p>
                                <?php if ($dataBlackDotUrban->id_1402f_blackdot > 0) {
                                    ?>
                                    <img class="small" id="imgBlackDot" src="../../<?= $dataBlackDotUrban->PictureName ?>"/>
                                    <?php
                                }
                                if ($dataBlackDotUrban->gpsCoordinates != NULL) {
                                    ?>
                                    <p>Coordonée GPS :  <?= $dataBlackDotUrban->gpsCoordinates ?></p>
                                <?php } ?>
                                <p>Statut du point noir : <?= $dataBlackDotUrban->status ?></p>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $dataBlackDotUrban->idBdUrban ?>"  data-idUrban="<?= $dataBlackDotUrban->idBdUrban ?>" >
                                    voir le détail du point noir
                                </button><br>
                                <p id="btnModifyStatusUrban" data-idUrban="<?= $dataBlackDotUrban->idBdUrban ?>" class="btn ModifyStatusUrban">Modifier le status</p><br>
                                <p id="btnModifyBlackDot" data-idUrban="<?= $dataBlackDotUrban->idBdUrban ?>" class="btn ModifyBlackDotUrban">Modifier le point noir</p>
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
                                <!--modification du point noir--> 
                                <div  id="ModifyBlackDotUrban<?= $dataBlackDotUrban->idBdUrban ?>" class="formMdodifyBlackDotUrban">
                                    <form method="post" name="formModifyBlackDot" >
                                        <input type="hidden" value="<?= $dataBlackDotUrban->idBdUrban ?>" name="idBlackDotUrban"/>
                                        <label> titre a modifier : <?= $dataBlackDotUrban->title ?> </label>
                                        <input type="text" name="modifyTitle" />
                                        <input type="submit" name="modifyUrban" value="modifier le point noir" />
                                    </form>
                                </div>
                                <!-- modal-->
                                <div class="modal fade" id="exampleModal<?= $dataBlackDotUrban->idBdUrban ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-white">
                                                <h5 class="modal-title" id="exampleModalLabel">détaille du point noir </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body bg-white" id="BlackDotDetailleUrban<?= $dataBlackDotUrban->idBdUrban ?>">
                                                <p>Le <?= $dataBlackDotUrban->datedenregistrement ?></p>
                                                <p> <?= $dataBlackDotUrban->typeCategoryDanger ?></p>
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
                    ?><br>

                </div>
                 <div class="text-center">
                <p colspan="3"> page :
                    <?php
                    for ($i = 1; $i <= $countBlackDotUrban->nbrBlackDoturban; $i++) {
                        ?>
                        <a href="?pageChoiceUrban=<?= $i ?>"><?= $i ?></a>
                    <?php }
                    ?></p>
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