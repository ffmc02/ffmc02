<?php
session_start();
include_once '../../model/dataBase.php';
include_once '../model/partner.php';
include '../controleur/partnerCtrl.php';
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
    <div id="columnCenter" class="col-lg-8 px-0">
        <?php
        $auth = array(4, 6);
        if (isset($_SESSION['access']) && in_array($_SESSION['access'], $auth)) {
            ?>
            <div class="titleGreen">
                <h1>Nos partenaires</h1>
            </div>  
            <div class="text-center">
                <p class="suceessMessage"><?= isset($messaageSucess) ? $messaageSucess : '' ?></p>
                <p class="errorMessage"><?= isset($formError['namePartner']) ? $formError['namePartner'] : '' ?></p>
                <p class="errorMessage"><?= isset($echec) ? $echec : '' ?></p>
            </div>
            <div class="text-center">
                <p class="btn btn-success" id="btnAddPartner" >Ajouter </p>
                <p class="btn btn-success" id="btnListerPartner">Liste des Partenaires</p>
                <p class="btn btn-success" id="btnReturnPartner">Retour</p>
            </div>
            <div class="addPartner text-center">
                <div class="titleGreen">
                    <h2>Ajouter un partenaire</h2>
                </div>
                <form name="addPartner" method="post"  enctype="multipart/form-data" >
                    <div>
                        <label> Nom du partenaires </label><br>
                        <input type="text" name="namePartner" />
                    </div>
                    <div> 
                        <label> liens externes</label><br>
                        <input name="linkExternalSite" type="url" />
                    </div>
                    <div> 
                        <label> noms du liens </label><br>
                        <input type="text" name="nameLink" />
                    </div>
                    <div>
                        <label> Photos du partenaire </label><br>
                        <input type="file" name="picture" />
                    </div>
                    <div>
                        <label>Date de fin de partenaria</label><br>
                        <input type="date" name="EndOfPartnerShip" />
                    </div>
                    <div> 
                        <input type="submit" name="addPartners" value="ajouter" class="btn btn-success" />
                    </div>
                </form>
            </div>
            <div class="listePartners text-center" >
                <p>liste de nos partenaires</p>
                <?php foreach ($getPartner as $listerPartner) { ?>
                    <div>
                        <p><?= $listerPartner->namePartner ?></p>
                        <img class="img-fluid" src="../../<?= $listerPartner->picture ?>" />
                        <p><a href="<?= $listerPartner->linkExternalSite ?>" target="_blank"><?= $listerPartner->nameLink ?></a></p>
                        <div>
                            <button type="button" class="btn btn-primary" id="btnmodifyArticle" data-id="<?= $listerPartner->id ?>" data-toggle="modal" data-target="#modifyPartner<?= $listerPartner->id ?>"  data-Article="<?= $listerPartner->id ?>" >
                                Modifier (ne fonctionne pas pour le moment) 
                            </button>
                            <?php if ($_SESSION['access'] == 4) { ?>
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#deletePartner<?= $listerPartner->id ?>"  data-Event="<?= $listerPartner->id ?>" >
                                    Supprimer
                                </button>   <hr>
                            <?php } ?>
                        </div>
                        <!--Modification de l'article-->
                        <div class="modal fade" id="modifyPartner<?= $listerPartner->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Modifier le partenaire <?= $listerPartner->namePartner ?> </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-white"  >
                                        <form method="post" name="modifyPartner" enctype="multipart/form-data" >
                                            <div>
                                                <label> Nom du partenaires </label><br>
                                                <input type="text" name="newNamePartner" value="<?= $listerPartner->namePartner ?>" />
                                            </div>
                                            <div> 
                                                <label> liens externes</label><br>
                                                <input name="newLinkExternalSite" type="url" value="<?= $listerPartner->linkExternalSite ?>"/>
                                            </div>
                                            <div> 
                                                <label> noms du liens </label><br>
                                                <input type="text" name="newNameLink" value="<?= $listerPartner->nameLink ?>" />
                                            </div>
                                            <div>
                                                <label> Photos du partenaire </label><br>
                                                <input type="file" name="newPicture" />
                                            </div>
                                            <div> 
                                                <input type="hidden" name="idPartner" value="<?= $listerPartner->id ?>" />
                                                <input type="submit" name="modifyPartners" value="Modifier" class="btn btn-primary" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer bg-white">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- modal Suppression-->
                        <div class="modal fade" id="deletePartner<?= $listerPartner->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer le Partenaire <?= $listerPartner->namePartner ?> </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-white"  >
                                        <form method="post" name="formDeletePartner" >
                                            <div class="text-center">
                                                <input type="hidden" value="<?= $listerPartner->id ?>" name="idPartner"/>
                                                <input class="btn btn-danger" type="submit" name="deletePartner" value="Suprimer" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer bg-white">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div> 
            <?php
        } else {
            require '../include/restrictedZone.php';
        }
        ?>

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