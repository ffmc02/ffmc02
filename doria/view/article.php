<?php
session_start();
include_once '../../model/dataBase.php';
include_once '../model/articles.php';
include_once '../model/categoryArticle.php';
include_once '../../model/usermodel.php';
include '../controleur/articleCtrl.php';
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
                <h1>Gestion des articles </h1>
            </div>
            <div class="text-center">
                <p class="suceessMessage"><?= isset($messaageSucess) ? $messaageSucess : '' ?></p>
                <p class="errorMessage"><?= isset($formError['titleArticle']) ? $formError['titleArticle'] : '' ?></p>
                <p class="errorMessage"><?= isset($formError['article']) ? $formError['article'] : '' ?></p>
                <p class="errorMessage"><?= isset($formError['author']) ? $formError['author'] : '' ?></p>
                <p class="errorMessage"><?= isset($formError['echec']) ? $formError['echec'] : '' ?></p>


            </div>
            <div class="text-center">
                <p class="btn btn-success" id="btnAddArticle" >Ajouter </p>
                <p class="btn btn-success" id="btnListerArticle">Liste des Aricle</p>
                <p class="btn btn-success" id="btnReturnArticle">Retour</p>
            </div>

            <div class="addArticle text-center">
                <p class="titleGreen">Formulaire d'ajout d'un article</p>
                <form method="post" name="addArticle" class="text-center my-0" enctype="multipart/form-data">
                    <div>
                        <label>titre de l'article : </label> <br>
                        <input type="text" name="titleArticle" />
                    </div>
                    <div>
                        <label>Date de l'article/ événement</label>
                        <input type="date" name="date" />
                    </div>
                    <div>
                        <label>Article : </label>
                        <textarea name="article"rows="8" cols="130"></textarea>
                    </div>
                    <div>
                        <label>Vidéo associer à l'article</label>
                        <input type="url" name="video" />
                    </div>
                    <div class="form-group">
                        <p>Photo de l'article</p>
                        <label for="exampleInputFile">Photo d'illustration</label>
                        <input type="file" class="text-center" id="exampleInputFile" name="picture" aria-describedby="fileHelp" />
                        <small id="fileHelp" class="form-text text-muted">la photo n'est pas obligatoire format accépter "jpeg" "png" merci</small>
                    </div>
                    <div>
                        <p>Type de l'article</p>
                        <select name="typeArticle" >
                            <?php foreach ($listerArticleCategory as $categoryArticle) { ?>
                                <option value="<?= $categoryArticle->id ?>"> <?= $categoryArticle->nameCategoryArticle ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label>Liens externe</label>
                        <input type="url" name="linkExternalSite" />
                        <label>Noms du liens externe</label>
                        <input type="text" name="nameLinkExternal" />
                    </div>
                    <div>
                        <label>Auteur</label>
                        <select name="idAuthor" >
                            <?php foreach ($listeAdminAndModer as $listeAuthor) { ?>
                                <option value="<?= $listeAuthor->id ?>"> <?= $listeAuthor->pseudo ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <input type="submit" name="addArticle" value="Ajouter" class="btn btn-success" />
                </form>
            </div>
            <div class="listerArticle text-center">
                <p  class="titleGreen">Article parues </p>
                <?php
                foreach ($listeArticles as $listerArticles) {
                    $article = $listerArticles->articleDescription;
                    ?>
                    <p>Catégorie : <?= $listerArticles->nameCategoryArticle ?></p>
                    <p>titre : <?= $listerArticles->title ?></p>
                    <p><?= nl2br($article) ?></p>
                    <?php if ($listerArticles->linkExternalSite != NULL) { ?>
                        <p><a href=" <?= $listerArticles->linkExternalSite ?>" target="_blank"><?= $listerArticles->nameLinkExternal ?> </a></p>
                        <?php
                    }
                    ?>
                    <p> Auteur : <?= $listerArticles->pseudo ?></p>
                    <p>date de l'événément : <?= $listerArticles->dateEvent ?></p>
                    <?php if ($listerArticles->picture != NULL) { ?>
                        <img class="smalarticle" id="imgBlackDot" src="../../<?= $listerArticles->picture ?>"/><br>
                    <?php }if ($listerArticles->video != NULL) {
                        ?>
                        <iframe width="460" height="215" src="<?= $listerArticles->video ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php
                    }
                    ?>
                    <div>
                        <button type="button" class="btn btn-primary" id="btnmodifyArticle" data-id="<?= $listerArticles->id ?>" data-toggle="modal" data-target="#modifyArticle<?= $listerArticles->id ?>"  data-Article="<?= $listerArticles->id ?>" >
                            Modifier
                        </button>
                        <?php if ($_SESSION['access'] == 4) { ?>
                            <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#deleteArticle<?= $listerArticles->id ?>"  data-Event="<?= $listerArticles->id ?>" >
                                Supprimer
                            </button>
                        </div>

                        <hr>
                        <?php }
                    ?>
                        <!--Modification de l'article-->
                    <div class="modal fade" id="modifyArticle<?= $listerArticles->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier l'article <?= $listerArticles->title ?> </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bg-white"  >

                                    <form method="post" name="modifyArticle" >
                                        <p>En cours de création </p>
                                        <div>
                                            <label>titre de l'article : </label> <br>
                                            <input type="text" name="newTitleArticle" value="<?= $listerArticles->title ?>"/>
                                        </div>
                                        <div>
                                            <label>Date de l'article/ événement <?= $listerArticles->dateEvent ?></label>
                                            <input type="date" name="newDate"  />
                                        </div>
                                        <div>
                                            <label>Article : </label>
                                            <textarea name="newArticle"rows="8" cols="45" ><?= $listerArticles->articleDescription ?> </textarea>
                                        </div>
                                        <div>
                                            <label>Vidéo associer à l'article</label>
                                            <p>actuel : <?= $listerArticles->video ?> </p>
                                            <input type="url" name="newVideo" value="<?= $listerArticles->video ?>" />
                                        </div>
                                        <div>
                                            <label>Liens externe</label>
                                            <input type="url" name="newLinkExternalSite" value="<?= $listerArticles->linkExternalSite ?>"/>
                                            <label>Noms du liens externe</label>
                                            <input type="text" name="newNameLinkExternal" value="<?= $listerArticles->nameLinkExternal ?>" />
                                        </div>
                                        <div>
                                            <p>Type de l'article</p>
                                            <select name="newTypeArticle" >
                                                <?= $categoryArticle->nameCategoryArticle ?>
                                                <?php foreach ($listerArticleCategory as $categoryArticle) { ?>
                                                    <option value="<?= $categoryArticle->id ?>"> <?= $categoryArticle->nameCategoryArticle ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <input type="hidden" value="<?= $listerArticles->id ?>" name="idArticle"/>
                                            <input class="btn btn-primary " type="submit" name="modifyArticle" value="Modifier" />
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
                    <div class="modal fade" id="deleteArticle<?= $listerArticles->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer l'article <?= $listerArticles->title ?> </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bg-white"  >

                                    <form method="post" name="deleteArticle" >

                                        <div class="text-center">
                                            <input type="hidden" value="<?= $listerArticles->id ?>" name="idArticle"/>
                                            <input class="btn btn-danger" type="submit" name="deleteArticle" value="Suprimer" />
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
                    
                     <!--pagination-->
           
            <p colspan="3"> page :
                <?php
                for ($i = 1; $i <= $nbrArticle->nbrArticle; $i++) {
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
<!-- modal Modifycation-->

