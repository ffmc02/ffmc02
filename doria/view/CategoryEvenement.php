<?php
session_start();
include_once '../../model/dataBase.php';
include_once '../model/eventCategory.php';
include_once '../controleur/eventCategoryCtrl.php';
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
                <h1>Gestion des categories d'événements</h1>
            </div>
            <div class="text-center">
                <p class="suceessMessage"><?= isset($messaageSucess) ? $messaageSucess : '' ?></p>
                <p class="errorMessage"><?= isset ($formError['Error']) ? $formError['Error'] : '' ?></p>
                <p class="errorMessage"><?= isset($echec) ? $echec : '' ?></p>
            </div>
            <div class="text-center">
                <p class="btn btn-success" id="btnAddEventCategory" >Ajouter </p>
                <p class="btn btn-success" id="btnListerEventCategory">Liste des Aricle</p>
                <p class="btn btn-success" id="btnReturnEventCategory">Retour</p>
            </div>
            <div class="addEventCategory text-center">
                <form method="post" name="formAddEventCategory">
                    <div>
                        <label>Noms de la catégorie</label><br>
                        <input name="nameEvent" type="text" /> 
                    </div>
                    <div>
                        <input type="submit" name="addEventCategory" value="ajouter" class="btn btn-success" /> 
                    </div>
                </form>
            </div>
            <div class="listeEventCategory text-center">
                <?php foreach ($listersCategoryEvent as $listeCategoryEvents) { ?>
                    <p> <?= $listeCategoryEvents->nameCategoryEvents ?></p>
                    <?php
                    ?>
                    <div>
                        <button type="button" class="btn btn-primary" id="btnmodifyCategoryArticle" data-id="<?= $listeCategoryEvents->id ?>" data-toggle="modal" data-target="#modifyCategoryEvents<?= $listeCategoryEvents->id ?>"  data-Article="<?= $listeCategoryEvents->id ?>" >
                            Modifier
                        </button>
                        <?php if ($_SESSION['access'] == 4 && $listeCategoryEvents->id != 8) { ?>
                            <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#deleteCategoryEvents<?= $listeCategoryEvents->id ?>"  data-Event="<?= $listeCategoryEvents->id ?>" >
                                Supprimer
                            </button>
                        </div>    
                    <?php } ?>
                    <hr>
                    <!--Modification de la categorie-->
                    <div class="modal fade" id="modifyCategoryEvents<?= $listeCategoryEvents->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier l'événement <?= $listeCategoryEvents->nameCategoryEvents ?> </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bg-white"  >
                                    <form method="post" name="modifyCategoryEdito">
                                        <label>Nouveau nom de la catégorie de l'édito</label>
                                        <input type="text" name="newNameCategoryEvent" value="<?= $listeCategoryEvents->nameCategoryEvents ?>" />
                                        <input type="hidden" value="<?= $listeCategoryEvents->id ?>" name="idCategoryEvent"/>
                                        <input type="submit" name="modifyCategoryevent" value="Modifier" class="btn btn-primary"class="btn btn-primary" />
                                    </form>
                                </div>
                                <div class="modal-footer bg-white">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal Suppression-->
                    <div class="modal fade" id="deleteCategoryEvents<?= $listeCategoryEvents->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer la catégorie <?= $listeCategoryEvents->nameCategoryEvents ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bg-white"  >
                                    <form method="post" name="deleteCategoryEvent" >
                                        <div class="text-center">
                                            <input type="hidden" value="<?= $listeCategoryEvents->id ?>" name="idCategoryEvent"/>
                                            <input class="btn btn-danger" type="submit" name="deleteCategoryEvent" value="Suprimer" />
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer bg-white">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>  
            </div>
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