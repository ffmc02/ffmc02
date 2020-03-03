<?php
session_start();
include_once '../../model/dataBase.php';
include_once '../model/categoryArticle.php';
include '../controleur/categoryArticleCtrl.php';
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
                <h1>Categorie des articles</h1>
            </div>
            <div class="text-center">
                <p class="suceessMessage"><?= isset($messaageSucess) ? $messaageSucess : '' ?></p>
                <p class="errorMessage"><?= isset($Error) ? $Error : '' ?></p>
                <p class="errorMessage"><?= isset($echec) ? $echec : '' ?></p>
            </div>
            <div class="text-center">
                <p class="btn btn-success" id="btnAddArticleCategory" >Ajouter </p>
                <p class="btn btn-success" id="btnListerArticleCategory">Liste des Aricle</p>
                <p class="btn btn-success" id="btnReturnArticleCategory">Retour</p>
            </div>
            <div class="addCategoryArticle text-center">
                 <form method="post" name="formAddCategoryEdito">
                    <div>
                        <label>Noms de la catégorie</label><br>
                        <input name="nameCategory" type="text" /> 
                    </div>
                    <div>
                        <input type="submit" name="addCategoryArticle" value="ajouter" class="btn btn-success" /> 
                    </div>
                </form>
            </div>
            <div class="listeCategoryArticle text-center">
                <?php foreach ($listerArticleCategory as $categoryArticle) { ?>
                    <p> <?= $categoryArticle->nameCategoryArticle ?></p>
                    <div>
                        <button type="button" class="btn btn-primary" id="btnmodifyCategoryArticle" data-id="<?= $categoryArticle->id ?>" data-toggle="modal" data-target="#modifyCategoryArticle<?= $categoryArticle->id ?>"  data-Article="<?= $categoryArticle->id ?>" >
                            Modifier
                        </button>
                        <?php if ($_SESSION['access'] == 4 && $categoryArticle->id != 5) { ?>
                            <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#deleteCategoryArticle<?= $categoryArticle->id ?>"  data-Event="<?= $categoryArticle->id ?>" >
                                Supprimer
                            </button>
                        </div>    
                        <?php
                    }?>
                      <hr>
                    <!--modal de modification-->
                    <div class="modal fade" id="modifyCategoryArticle<?= $categoryArticle->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier la catégorie <?= $categoryArticle->nameCategoryArticle ?> </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bg-white"  >
                                    <form method="post" name="modifyCategoryArticle">
                                        <label>Nouveau nom de la catégorie de l'article</label>
                                        <input type="text" name="newNameCategoryArticle" value="<?= $categoryArticle->nameCategoryArticle ?>" />
                                        <input type="hidden" value="<?= $categoryArticle->id ?>" name="idCategoryArticle"/><br>
                                        <input type="submit" name="modifyCategoryArticle" value="Modifier" class="btn btn-primary"class="btn btn-primary" />
                                    </form>
                                </div>
                                <div class="modal-footer bg-white">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--modal suppression-->
                          <div class="modal fade" id="deleteCategoryArticle<?= $categoryArticle->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer l'édito <?= $categoryArticle->nameCategoryArticle ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bg-white"  >

                                    <form method="post" name="deleteCategoryArticle" >

                                        <div class="text-center">
                                            <input type="hidden" value="<?= $categoryArticle->id ?>" name="idCategoryArticle"/>
                                            <input class="btn btn-danger" type="submit" name="deleteCategoryArticle" value="Suprimer" />
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer bg-white">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
              <?php  }
                ?>  
            </div>
            <?php
        } else {
            require '../include/restrictedZone.php';
        }
        ?>
    </div>
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