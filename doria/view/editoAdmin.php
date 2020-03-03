<?php
session_start();
include_once '../../model/dataBase.php';
include_once '../model/editot.php';
include_once '../model/categoryEdito.php';
include_once '../../model/usermodel.php';
include '../controleur/editoAdminCtrl.php';
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
                <h1>Editos </h1>
            </div>
            <div class="text-center">
                <p class="suceessMessage"><?= isset($messaageSucess) ? $messaageSucess : '' ?></p>
                <p class="errorMessage"><?= isset($formError['title']) ? $formError['title'] : '' ?></p>
                <p class="errorMessage"><?= isset($formError['edito']) ? $formError['edito'] : '' ?></p>
                <p class="errorMessage"><?= isset($formError['author']) ? $formError['author'] : '' ?></p>
                <p class="errorMessage"><?= isset($formError['idCategoryEditot']) ? $formError['idCategoryEditot'] : '' ?></p>
                <p class="errorMessage"><?= isset($formError['echec']) ? $formError['echec'] : '' ?></p>


            </div>
            <div class="text-center">
                <p class="btn btn-success" id="btnAddEdito" >Ajouter </p>
                <p class="btn btn-success" id="btnListerEdito">Liste des Editos</p>
                <p class="btn btn-success" id="btnReturnEdito">Retour</p>
            </div>
            <div class="addEdito text-center">
                <p>Formulaire d'ajout d'un édito</p>
                <form method="post" name="formAddEdito" enctype="multipart/form-data">
                    <div>  
                        <label> Titre Principal </label><br>
                        <input type="text" name="title" />
                    </div> 
                    <div>
                        <label>Sous titre</label><br>
                        <input name="subititle" type="texte" />
                    </div>
                    <div> 
                        <label>Paragraphe</label><br>
                        <textarea name="edito" rows="8" cols="130"> </textarea>
                    </div>
                    <div>
                        <label>photo d'ilustration </label><br>
                        <input type="file" name="picture" />
                    </div>
                    <hr>
                    <div>
                        <label>Sous titre1</label><br>
                        <input name="subititle1" type="texte" />
                    </div>
                    <div> 
                        <label>Paragraphe1</label><br>
                        <textarea name="subsections1" rows="8" cols="130"> </textarea>
                    </div>
                    <div>
                        <label>photo d'ilustration 1</label><br>
                        <input type="file" name="picture1" />
                    </div>
                    <hr>
                    <label>Sous titre2</label><br>
                    <input name="subititle2" type="texte" />

                    <div> 
                        <label>Paragraphe2</label><br>
                        <textarea name="subsections2" rows="8" cols="130"> </textarea>
                    </div>
                    <div>
                        <label>photo d'ilustration2 </label><br>
                        <input type="file" name="picture2" />
                    </div>
                    <hr>
                    <div>
                        <label>Sous titre3</label><br>
                        <input name="subititle3" type="texte" />
                    </div>
                    <div> 
                        <label>Paragraphe3</label><br>
                        <textarea name="subsections3" rows="8" cols="130"> </textarea>
                    </div>
                    <div>
                        <label>photo d'ilustration 3</label><br>
                        <input type="file" name="picture3" />
                    </div>
                    <hr>
                    <div>
                        <label>Auteur</label><br>
                        <select name="idAuthor" >
                            <?php foreach ($listeAdminAndModer as $listeAuthor) { ?>
                                <option value="<?= $listeAuthor->id ?>"> <?= $listeAuthor->pseudo ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label>catégorie de l'édito</label><br>
                        <select name="idCategoryEditot" >
                            <?php foreach ($listeEditotCategory as $listeEdito) { ?>
                                <option value="<?= $listeEdito->id ?>"> <?= $listeEdito->nameCategoryEdito ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div> 
                        <input type="submit" name="addEditot" value="ajouter" class="btn btn-success" />
                    </div>
                </form>
            </div>


            <div class="listerEditot text-center">

                <p>Liste des éditos</p>
                <?php
                foreach ($listerEditos as $listeEditos) {
                    $edito = $listeEditos->edito;
                    $paragraphe1 = $listeEditos->subsections1;
                    $paragraphe2 = $listeEditos->subsections2;
                    $paragraphe3 = $listeEditos->subsections3;
                    ?>
                    <p class="titleGreen"><?= $listeEditos->title ?></p>
                    <p><?= $listeEditos->nameCategoryEdito ?></p>
                    <p><?= $listeEditos->subtitle ?></p>
                    <p><?= nl2br($edito) ?></p>
                    <?php if ($listeEditos->picture != NULL) { ?>
                        <p><img class="smalarticle" id="imgBlackDot" src="../<?= $listeEditos->picture ?>" /></p>
                    <?php } ?>
                    <p><?= $listeEditos->subtitle1 ?></p>
                    <p><?= nl2br($paragraphe1) ?></p>
                    <?php if ($listeEditos->picture1 != NULL) { ?>
                        <p><img class="smalarticle" id="imgBlackDot" src="../<?= $listeEditos->picture1 ?>" /></p>
                    <?php } ?>
                    <p><?= $listeEditos->subtitle2 ?></p>
                    <p><?= nl2br($paragraphe2) ?></p>
                    <?php if ($listeEditos->picture2 != NULL) { ?>
                        <p><img class="smalarticle" id="imgBlackDot" src="../<?= $listeEditos->picture2 ?>" /></p>
                    <?php } ?>
                    <p><?= $listeEditos->subtitle3 ?></p>
                    <p><?= nl2br($paragraphe3) ?></p>
                    <?php if ($listeEditos->picture3 != NULL) { ?>
                        <p><img class="smalarticle" id="imgBlackDot" src="../<?= $listeEditos->picture3 ?>" /></p>
                    <?php } ?>
                    <p><?= $listeEditos->datefr ?></p>
                    <p><?= $listeEditos->pseudo ?></p>
                    <button type="button" class="btn btn-primary" id="btnmodifyArticle" data-id="<?= $listeEditos->id ?>" data-toggle="modal" data-target="#modifyedito<?= $listeEditos->id ?>"  data-Edito="<?= $listeEditos->id ?>" >
                        Modifier
                    </button>
                    <?php if ($_SESSION['access'] == 4) { ?>
                        <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#deleteEdito<?= $listeEditos->id ?>"  data-Edito="<?= $listeEditos->id ?>" >
                            Supprimer
                        </button>
                        <hr>

                    <?php }
                    ?>

                    <!--//modal de modification--> 
                    <div class="modal fade"  id="modifyedito<?= $listeEditos->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier l'article <?= $listeEditos->title ?> </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bg-white"  >

                                    <form method="post" name="modifyEdito" >
                                        <div>
                                            <label> Nouveau titre</label><br>
                                            <input type="text" name="newTitle" value="<?= $listeEditos->title ?>" />
                                        </div> 
                                        <div>
                                            <label>Sous titre</label><br>
                                            <input name="newSubititle" type="texte" value="<?= $listeEditos->subtitle ?>" />
                                        </div>
                                        <div> 
                                            <label>nouveau texte</label><br>
                                            <textarea name="newEdito" rows="8" cols="130"><?= nl2br($edito) ?></textarea>
                                        </div>
                                        <hr>
                                        <div>
                                            <label>Sous titre1</label><br>
                                            <input name="newSubititle1" type="texte" value="<?= $listeEditos->subtitle1 ?>"/>
                                        </div>
                                        <div> 
                                            <label>Paragraphe1</label><br>
                                            <textarea name="newSubsections1" rows="8" cols="130"><?= nl2br($paragraphe1) ?> </textarea>
                                        </div>
                                        <hr>
                                        <label>Sous titre2</label><br>
                                        <input name="newSubititle2" type="texte"  value="<?= $listeEditos->subtitle2 ?>"/>

                                        <div> 
                                            <label>Paragraphe2</label><br>
                                            <textarea name="newSubsections2" rows="8" cols="130"><?= nl2br($paragraphe2) ?> </textarea>
                                        </div>
                                        <hr>
                                        <div>
                                            <label>Sous titre3</label><br>
                                            <input name="newSubititle3" type="texte" value="<?= $listeEditos->subtitle3 ?>"/>
                                        </div>
                                        <div> 
                                            <label>Paragraphe3</label><br>
                                            <textarea name="newSubsections3" rows="8" cols="130"><?= nl2br($paragraphe3) ?> </textarea>
                                        </div>
                                        <div>
                                            <label>catégorie de l'édito</label><br>
                                            <p>catégorie enregistré : <?= $listeEditos->nameCategoryEdito ?></p>
                                            <select name="newIdCategoryEditot" >
                                                <?php foreach ($listeEditotCategory as $listeEdito) { ?>
                                                    <option value="<?= $listeEdito->id ?>"> <?= $listeEdito->nameCategoryEdito ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div>
                                            <input name="idEdito" type="hidden" value="<?= $listeEditos->id ?>" />
                                            <input type="submit" name="btnModifyEdito" value="Modifier" class="btn btn-primary" />
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
                    <div class="modal fade" id="deleteEdito<?= $listeEditos->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer l'édito  <?= $listeEditos->title ?> </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bg-white"  >

                                    <form method="post" name="deleteArticle" >

                                        <div class="text-center">
                                            <input type="hidden" value="<?= $listeEditos->id ?>" name="idEdito"/>
                                            <input class="btn btn-danger" type="submit" name="deleteEdito" value="Suprimer" />
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
                ?> <p colspan="3"> page :
                <?php
                for ($i = 1; $i  <= $nbrEdito->nbrEdito; $i++) {
                    ?>
                    <a href="?pageChoice=<?= $i ?>"><?= $i ?></a>
                <?php }
                ?></p>
            </div>
            <?php
        } else {
            require '../include/restrictedZone.php';
        }
        ?>
        <div class="big">
            <p> </p>
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