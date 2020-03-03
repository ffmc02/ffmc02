<?php
session_start();
include_once '../../model/dataBase.php';
include_once '../model/inThePress.php';
include '../controleur/inThePressAdminCtrl.php';
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
                <h1>La presse parle de nous Partie Admin </h1>
            </div>
            <div class="text-center">
                <p class="suceessMessage"><?= isset($succes) ? $succes : '' ?></p>
                <p class="errorMessage"><?= isset($Erroror) ? $Erroror : '' ?></p>
            </div>
            <div class="text-center">
                <p class="btn btn-success" id="btnAddPressArticle" >Ajouter </p>
                <p class="btn btn-success" id="btnListerPressArticle">Liste des Aricle</p>
                <p class="btn btn-success" id="btnReturnPressArticle">Retour</p>
            </div>
            <div class="addPressArticle">
                <form name="FormAddPressArticle" method="post" class="text-center my-0" enctype="multipart/form-data">
                    <div>
                        <label>Titre de l'evenment dans la presse</label><br>
                        <input name="tileEvents" type="text" />
                    </div>
                    <div>
                        <label>description de l'événement</label><br>
                        <input name="Evenents" type="text" />
                    </div>
                    <div>
                        <label>Date de l'événement</label><br>
                        <input type="date" name="eventDate" />
                    </div>
                    <div>
                        <div>
                            <label>nom du lien externe</label><br>
                            <input type="text" name="nameExternalSite" />
                        </div>
                        <div>
                            <label>Liens externe</label><br>
                            <input type="url" name="externalSiteLinks" />
                        </div>
                        <div>
                            <label>Noms du Médias</label><br>
                            <input type="text" name="nameOfTheMedia" />
                        </div>
                    </div><hr>
                    <div>
                        <p>Liens 2</p>
                        <div>
                            <label>nom du lien externe</label><br>
                            <input type="text" name="nameExternalSite1" />
                        </div>
                        <div>
                            <label>Liens externe</label><br>
                            <input type="url" name="externalSiteLinks1" />
                        </div>
                        <div>
                            <label>Noms du Médias</label><br>
                            <input type="text" name="nameOfTheMedia1" />
                        </div>
                    </div>
                    <hr>
                    <div> <p>Liens 3</p>
                        <div>
                            <label>nom du lien externe</label><br>
                            <input type="text" name="nameExternalSite2" />
                        </div>
                        <div>
                            <label>Liens externe</label><br>
                            <input type="url" name="externalSiteLinks2" />
                        </div>
                        <div>
                            <label>Noms du Médias</label><br>
                            <input type="text" name="nameOfTheMedia2" />
                        </div>
                    </div><hr>
                    <div> <p>Liens 4</p>
                        <div>
                            <label>nom du lien externe</label><br>
                            <input type="text" name="nameExternalSite3" />
                        </div>
                        <div>
                            <label>Liens externe</label><br>
                            <input type="url" name="externalSiteLinks3" />
                        </div>
                        <div>
                            <label>Noms du Médias</label><br>
                            <input type="text" name="nameOfTheMedia3" />
                        </div>
                    </div>
                    <hr>
                    <div>
                        <p>Liens 5</p>
                        <div>
                            <label>nom du lien externe</label><br>
                            <input type="text" name="nameExternalSite4" />
                        </div>
                        <div>
                            <label>Liens externe</label><br>
                            <input type="url" name="externalSiteLinks4" />
                        </div>
                        <div>
                            <label>Noms du Médias</label><br>
                            <input type="text" name="nameOfTheMedia4" />
                        </div>
                    </div>
                    <hr>
                    <div>
                        <p>Liens 6</p>
                        <div>
                            <label>nom du lien externe</label><br>
                            <input type="text" name="nameExternalSite5" />
                        </div>
                        <div>
                            <label>Liens externe</label><br>
                            <input type="url" name="externalSiteLinks5" />
                        </div>
                        <div>
                            <label>Noms du Médias</label><br>
                            <input type="text" name="nameOfTheMedia5" />
                        </div>
                    </div>
                    <div>
                        <input type="submit" name="addPressArticle"  value="ajouter" class="btn btn-success" />
                    </div>
                </form>
            </div>
            <div class="listPressArticle text-center">
                <p>Liste des articles de presse </p>

                <div class="text-center">
                    <?php foreach ($listePreessArticles as $pressArticle) { ?>
                        <p class="titleGreen"><?= $pressArticle->titleEvents ?></p>
                        <p><?= $pressArticle->Evenents ?></p>
                        <p><?= $pressArticle->eventDate ?></p>
                        <div>
                            <p><?= $pressArticle->nameOfTheMedia ?></p>
                            <p><a href=" <?= $pressArticle->externalSiteLinks ?>" target="_blank"><?= $pressArticle->nameExternalSite ?> </a></p>
                        </div>
                        <?php if ($pressArticle->externalSiteLinks1 != NULL) { ?>
                            <hr>
                            <div>
                                <p><?= $pressArticle->nameOfTheMedia1 ?></p>
                                <p><a href=" <?= $pressArticle->externalSiteLinks1 ?>" target="_blank"><?= $pressArticle->nameExternalSite1 ?> </a></p>
                            </div>
                            <hr>
                            <?php
                        }
                        if ($pressArticle->externalSiteLinks2 != NULL) {
                            ?>
                            <div>
                                <p><?= $pressArticle->nameOfTheMedia2 ?></p>
                                <p><a href=" <?= $pressArticle->externalSiteLinks2 ?>" target="_blank"><?= $pressArticle->nameExternalSite2 ?> </a></p>
                            </div>
                            <hr>
                            <?php
                        }
                        if ($pressArticle->externalSiteLinks3 != NULL) {
                            ?>
                            <div>
                                <p><?= $pressArticle->nameOfTheMedia3 ?></p>
                                <p><a href=" <?= $pressArticle->externalSiteLinks3 ?>" target="_blank"><?= $pressArticle->nameExternalSite3 ?> </a></p>
                            </div>
                            <hr>
                            <?php
                        }
                        if ($pressArticle->externalSiteLinks4 != NULL) {
                            ?>
                            <div>
                                <p><?= $pressArticle->nameOfTheMedia4 ?></p>
                                <p><a href=" <?= $pressArticle->externalSiteLinks4 ?>" target="_blank"><?= $pressArticle->nameExternalSite4 ?> </a></p>
                            </div>
                            <hr>
                            <?php
                        }
                        if ($pressArticle->externalSiteLinks5 != NULL) {
                            ?>
                            <div>
                                <p><?= $pressArticle->nameOfTheMedia5 ?></p>
                                <p><a href=" <?= $pressArticle->externalSiteLinks5 ?>" target="_blank"><?= $pressArticle->nameExternalSite5 ?> </a></p>
                            </div>
                            <hr>
                        <?php }
                        ?>
                        <p colspan="3"> page :
                            <?php
                            for ($i = 1; $i <= $countPressArticle->nbrPressArticle; $i++) {
                                ?>
                                <a href="?pageChoice=<?= $i ?>"><?= $i ?></a>
                            </p>
                            <?php
                        }
                    }
                    ?></div>
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