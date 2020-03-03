<?php
session_start();
include_once '../../model/dataBase.php';
include_once '../model/categoryEdito.php';
include_once '../controleur/categoryEditoCtrl.php';
/* en tete */
include ("../include/head.php");
?>

<?php
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
                <h1>Categorie des Editots
                </h1>
            </div>
            <div class="text-center">
                <p class="suceessMessage"><?= isset($messaageSucess) ? $messaageSucess : '' ?></p>
                <p class="errorMessage"><?= isset($Error) ? $Error : '' ?></p>
                <p class="errorMessage"><?= isset($echec) ? $echec : '' ?></p>
            </div>
            <div class="text-center">
                <p class="btn btn-success" id="btnAddEditoCategory" >Ajouter </p>
                <p class="btn btn-success" id="btnListerEditoCategory">Liste des Aricle</p>
                <p class="btn btn-success" id="btnReturnEditoCategory">Retour</p>
            </div>
            <div class="text-center addCategoryEdito">
                <p class="titleGreen">forumulaire d'ajout d'une catégory</p>
                <form method="post" name="formAddCategoryEdito">
                    <div>
                        <label>Noms de la catégorie</label><br>
                        <input name="nameCategory" type="text" /> 
                    </div>
                    <div>
                        <input type="submit" name="addCategoryEdito" value="ajouter" class="btn btn-success" /> 
                    </div>
                </form>
            </div>
            <div class="text-center listerCategoryEdito">
                <p class="titleGreen">Liste des catégories pour les éditos</p>
                <?php foreach ($listersCategoryEdito as $categoryEdito) { ?>
                    <p><?= $categoryEdito->nameCategoryEdito ?></p>
                    <div>
                        <button type="button" class="btn btn-primary" id="btnmodifyCategoryEdito" data-id="<?= $categoryEdito->id ?>" data-toggle="modal" data-target="#modifyCategoryEdito<?= $categoryEdito->id ?>"  data-CategoryEdito="<?= $categoryEdito->id ?>" >
                            Modifier
                        </button>
                        <?php if ($_SESSION['access'] == 4 && $categoryEdito->id !=4 ) { ?>
                            <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#deleteCategoryEdito<?= $categoryEdito->id ?>"  data-Event="<?= $categoryEdito->id ?>" >
                                Supprimer
                            </button>
                        <?php } ?>
                    </div>
                    <hr>
                    <!--Modification de la categorie-->
                    <div class="modal fade" id="modifyCategoryEdito<?= $categoryEdito->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier l'édito <?= $categoryEdito->nameCategoryEdito ?> </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bg-white"  >
                                    <form method="post" name="modifyCategoryEdito">
                                        <label>Nouveau nom de la catégorie de l'édito</label>
                                        <input type="text" name="newNameCategoryEdito" value="<?= $categoryEdito->nameCategoryEdito ?>" />
                                        <input type="hidden" value="<?= $categoryEdito->id ?>" name="idCategoryEdito"/>
                                        <input type="submit" name="modifyCategoryEdito" value="Modifier" class="btn btn-primary"class="btn btn-primary" />
                                    </form>
                                </div>
                                <div class="modal-footer bg-white">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                         <!-- modal Suppression-->
                    <div class="modal fade" id="deleteCategoryEdito<?= $categoryEdito->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer l'édito <?= $categoryEdito->nameCategoryEdito ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bg-white"  >

                                    <form method="post" name="deleteCategoryEdito" >

                                        <div class="text-center">
                                            <input type="hidden" value="<?= $categoryEdito->id ?>" name="idCategoryEdito"/>
                                            <input class="btn btn-danger" type="submit" name="deleteCategoryEdito" value="Suprimer" />
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer bg-white">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
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