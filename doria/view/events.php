<?php
session_start();
include_once '../../model/dataBase.php';
include_once '../model/events.php';
include_once '../model/eventCategory.php';
include_once '../../model/usermodel.php';
include_once '../controleur/eventsCtrl.php';
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
    <div id="columnCenter" class=" col-lg-8 px-0 text-center">
        <?php
        $auth = array(4, 6);
        if (isset($_SESSION['access']) && in_array($_SESSION['access'], $auth)) {
            ?>
            <div class="titleGreen">
                <h1>Gestion d'un évenement</h1>
            </div>
            <p class="btn btn-success" id="btnAddEvents">Ajouter </p>
            <p class="btn btn-success" id="btnListerEvents">Liste des événements en cours </p>
            <p class="btn btn-success" id="btnListerEventsPast">Liste des événements passée </p>
            <p class="btn btn-success" id="btnReturn">Retour</p>
            <!--ajout d'un evenement---------------------------------------------------------------->
            <div class="addEvent">
                <p class="titleGreen">formulaire d'ajout d'évenemts</p>
                <form method="post" name="addEvents" class="text-center my-0" enctype="multipart/form-data">
                    <div>
                        <p>Date et heurs de l'évements </p>
                        <label> Date de l'évenements</label>
                        <input type="date" name="date" />
                        <label> Heurs de l'évenements </label>
                        <input type="time" name="hour" />
                    </div>
                    <div class="form-group">
                        <p>Affiche de l'évenments</p>
                        <label for="exampleInputFile">Télécharger une affiche </label>
                        <input type="file" class="text-center" id="exampleInputFile" name="picture" aria-describedby="fileHelp" />
                        <small id="fileHelp" class="form-text text-muted">l'affiche n'est pas obligatoire ne m'etre des affiches qu'au format png jpg merci</small>
                    </div>
                    <div>
                        <label> Titre de l'événement : </label>
                        <input type="text" name="titleEvents" />
                    </div>
                    <div>
                        <label> Description</label>
                        <textarea name="descriptionEvents" rows="8" cols="130" ></textarea>
                    </div>
                    <div>
                        <label>Lieux de l'événement</label>
                        <input name="location" type="text" />
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
                    <div>
                        <label>Type d'événement</label>
                        <select name="typeEvents" >
                            <?php foreach ($eventsListCategory as $listerEventsCathegory) { ?>
                                <option value="<?= $listerEventsCathegory->id ?>"> <?= $listerEventsCathegory->nameCategoryEvents ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <input type="submit" name="addEvents" class="btn btn-success" value="Ajouter" />
                </form>
            </div>
            <div class="listerEvents">
                <div class="titleGreen">
                    <h2>Evenement en cours </h2>
                </div>
                <div>
                    <?php
                    //liste des réunion mensuelles
                    foreach ($listeEventMeeting AS $listerEvents) {
                        if ($listerEvents->eventCategory == 1) {
                            ?>
                            <h2 class="text-primary miteeng"><?= $listerEvents->nameCategoryEvents ?></h2>
                            <p> Nom de la reunion : <?= $listerEvents->title ?> </p>
                            <p>Date et heur de la Réunion : <?= $listerEvents->dateEvent ?></p>
                            <p>Description de l'événement : <?= $listerEvents->description ?></p>
                            <p>Lieux de l'événement : <?= $listerEvents->location ?></p>
                            <!--<p class="btn btn-primary" data-Event="<?= $listerEvents->id ?>" id="btnModifyEvents">Modifier </p>-->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $listerEvents->id ?>"  data-Event="<?= $listerEvents->id ?>" >
                                Modifier
                            </button>
                            <?php if ($_SESSION['access'] == 4) { ?>
                                                                                    <!--<p class="btn btn-danger"  id="bntDeleteEvents"> Supprimer </p>-->
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#deleteEvents<?= $listerEvents->id ?>"  data-Event="<?= $listerEvents->id ?>" >
                                    Supprimer
                                </button>
                            <?php }
                            ?>
                            <!-- modal de modification reunion mensuel -->
                            <div class="modal fade" id="exampleModal<?= $listerEvents->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-white">
                                            <h5 class="modal-title" id="exampleModalLabel">Modifier l'événements <?= $listerEvents->title ?> </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body bg-white"  id="modifyEvents<?= $listerEvents->id ?>" >

                                            <form method="post" name="modifyEvents" >
                                                <div>    
                                                    <label><?= $listerEvents->title ?> l'événement à modifier</label>                                                </div>
                                                <label> Nouveau titre</label>
                                                <input type="text" name="newTitleEvents" value="<?= $listerEvents->title ?>"/>
                                                <div>
                                                    <p>Modifier la date et heur </p>
                                                    <p>Heure et date actuel <?= $listerEvents->dateEvent ?> </p>
                                                    <label> Nouvel date de l'évenements</label>
                                                    <input type="date" name="newDate" placeholder=""/>
                                                    <label> Nouvelle heurs de l'évenements </label>
                                                    <input type="time" name="newHour" />
                                                </div>
                                                <div>
                                                    <label> Nouvelle description</label>
                                                    <textarea name="newDescriptionEvents" rows="8" cols="130" ><?= $listerEvents->description ?></textarea>
                                                </div>
                                                <div>
                                                    <label>Nouveau lieux de l'événement</label>
                                                    <input name="newLocation" type="text" value="<?= $listerEvents->location ?>"/>
                                                </div>
                                                <div>
                                                    <label>Type d'événement : <?= $listerEvents->nameCategoryEvents ?></label>
                                                    <select name="newTypeEvents"  >
                                                        <?php foreach ($eventsListCategory as $listerEventsCathegory) { ?>

                                                            <option value="<?= $listerEventsCathegory->id ?>"> <?= $listerEventsCathegory->nameCategoryEvents ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <input type="submit" name="modifyEvents" value="modifier l'événement" />
                                            </form>
                                        </div>
                                        <div class="modal-footer bg-white">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Modal de suppression-->
                            <!-- modal-->
                            <div class="modal fade" id="deleteEvents<?= $listerEvents->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-white">
                                            <h5 class="modal-title" id="exampleModalLabel">Supprimer <?= $listerEvents->title ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body bg-white"  id="modifyEvents<?= $listerEvents->id ?>" >
                                            <form name="deleteEvents" method="post">
                                                <p>Supprimer l'événement <?= $listerEvents->title ?></p>
                                                <input type="hidden" name="deleteEvent" value=" <?= $listerEvents->id ?>" />
                                                <input type="submit" name="btnDeleteEvent" value="Supprimer l'évenement" />
                                            </form>
                                        </div>
                                        <div class="modal-footer bg-white">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <!------------EVENEMENT HORS REUNION MENSUEL-------------------------------------->
                <div>
                    <?php
                    foreach ($listeEvent AS $listerEvents) {
                        if ($listerEvents->eventCategory != 1) {
                            ?>
                            <h2 class="text-primary miteeng"><?= $listerEvents->nameCategoryEvents ?> </h2>
                            <p> Nom de la reunion : <?= $listerEvents->title ?> </p>
                            <p>Date et heur de la Réunion : <?= $listerEvents->dateEvent ?></p>
                            <p>Description de l'événement : <?= $listerEvents->description ?></p>
                            <p>Lieu du rendez vous :<?= $listerEvents->location ?> </p>
                            <?php if ($listerEvents->picture != NULL) { ?>
                                <img class="smalarticle" id="imgBlackDot" src="../../<?= $listerEvents->picture ?>"/>
                            <?php }
                            ?>
            <!--<p class="btn btn-primary btnModifyEvents" data-Event="<?= $listerEvents->id ?>" id="btnModifyEvents">Modifier </p>-->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalS<?= $listerEvents->id ?>"  data-Event="<?= $listerEvents->id ?>" >
                                Modifier 
                            </button>
                            <?php if ($_SESSION['access'] == 4) { ?>
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#deleteEvents<?= $listerEvents->id ?>"  data-Event="<?= $listerEvents->id ?>" >
                                    Supprimer
                                </button>
                                <?php
                            }
                        }
                        ?>
                        <!--Modale de modification-->
                        <div class="modal fade" id="exampleModalS<?= $listerEvents->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Modifier l'événements <?= $listerEvents->title ?> </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-white"  id="modifyEvents<?= $listerEvents->id ?>" >
                                        <form method="post" name="modifyEvents" >
                                            <div>    
                                                <label><?= $listerEvents->title ?> l'événement à modifier</label>
                                            </div>
                                            <label> Nouveau titre</label>
                                            <input type="text" name="newTitleEvents" value="<?= $listerEvents->title ?>"/>
                                            <div>
                                                <p>Modifier la date et heur </p>
                                                <p>Heure et date actuel <?= $listerEvents->dateEvent ?> </p>
                                                <label> Nouvel date de l'évenements</label>
                                                <input type="date" name="newDate" placeholder=""/>
                                                <label> Nouvelle heurs de l'évenements </label>
                                                <input type="time" name="newHour" />
                                            </div>
                                            <div>
                                                <label> Nouvelle description</label>
                                                <textarea name="newDescriptionEvents"> <?= $listerEvents->description ?></textarea>
                                            </div>
                                            <div>
                                                <label>Nouveau lieux de l'événement</label>
                                                <input name="newLocation" type="text" value="<?= $listerEvents->location ?>" />
                                            </div>
                                            <div>
                                                <label>Type d'événement : <?= $listerEventsCathegory->nameCategoryEvents ?></label>
                                                <select name="newTypeEvents"  >
                                                    <?php foreach ($eventsListCategory as $listerEventsCathegory) { ?>

                                                        <option value="<?= $listerEventsCathegory->id ?>"> <?= $listerEventsCathegory->nameCategoryEvents ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <input type="hidden" name="events" value="<?= $listerEvents->id ?>" />
                                            <input type="submit" name="modifyEvents" value="modifier l'événement" />
                                        </form>
                                    </div>
                                    <div class="modal-footer bg-white">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal de suppression-->
                        <!-- modal-->
                        <div class="modal fade" id="deleteEvents<?= $listerEvents->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer <?= $listerEvents->title ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-white"  id="modifyEvents<?= $listerEvents->id ?>" >
                                        <form name="deleteEvents" method="post">
                                            <p>Supprimer l'événement <?= $listerEvents->title ?></p>
                                            <input type="hidden" name="deleteEvent" value=" <?= $listerEvents->id ?>" />
                                            <input type="submit" name="btnDeleteEvent" value="Supprimer l'évenement" />
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
            <!--liste des article passer-->
            <div class="listeOfPastEvent">
                <div>
                    <?php
                    foreach ($listOfPastEvents AS $listerEvents) {
                        ?>
                        <h2 class="text-primary miteeng"><?= $listerEvents->nameCategoryEvents ?> </h2>
                        <p> Nom de la reunion : <?= $listerEvents->title ?> </p>
                        <p>Date et heur de la Réunion : <?= $listerEvents->dateEvent ?></p>
                        <p>Description de l'événement : <?= $listerEvents->description ?></p>
                        <p>Lieu du rendez vous :<?= $listerEvents->location ?> </p>
                        <?php if ($listerEvents->picture != NULL) { ?>
                            <img class="smalarticle" id="imgBlackDot" src="../../<?= $listerEvents->picture ?>"/>
                        <?php }
                        ?>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalS<?= $listerEvents->id ?>"  data-Event="<?= $listerEvents->id ?>" >
                            Modifier 
                        </button>
                        <?php if ($_SESSION['access'] == 4) { ?>
                            <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#deleteEvents<?= $listerEvents->id ?>"  data-Event="<?= $listerEvents->id ?>" >
                                Supprimer
                            </button>
                            <?php
                        }
                        ?>
                        <!--Modale de modification-->
                        <div class="modal fade" id="exampleModalS<?= $listerEvents->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Modifier l'événements <?= $listerEvents->title ?> </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-white"  id="modifyEvents<?= $listerEvents->id ?>" >

                                        <form method="post" name="modifyEvents" >
                                            <div>    
                                                <label><?= $listerEvents->title ?> l'événement à modifier</label>

                                            </div>
                                            <label> Nouveau titre</label>
                                            <input type="text" name="newTitleEvents" value="<?= $listerEvents->title ?>"/>
                                            <div>
                                                <p>Modifier la date et heur </p>
                                                <p>Heure et date actuel <?= $listerEvents->dateEvent ?> </p>
                                                <label> Nouvel date de l'évenements</label>
                                                <input type="date" name="newDate" v/>
                                                <label> Nouvelle heurs de l'évenements </label>
                                                <input type="time" name="newHour" />
                                            </div>
                                            <div>
                                                <label> Nouvelle description</label>
                                                <textarea name="newDescriptionEvents" ><?= $listerEvents->description ?></textarea>
                                            </div>
                                            <div>
                                                <label>Nouveau lieux de l'événement</label>
                                                <input name="newLocation" type="text" value="<?= $listerEvents->location ?>" />
                                            </div>
                                            <div>
                                                <label>Type d'événement : <?= $listerEventsCathegory->nameCategoryEvents ?></label>
                                                <select name="newTypeEvents"  >
                                                    <?php foreach ($eventsListCategory as $listerEventsCathegory) { ?>

                                                        <option value="<?= $listerEventsCathegory->id ?>"> <?= $listerEventsCathegory->nameCategoryEvents ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <input type="hidden" name="events" value="<?= $listerEvents->id ?>" />
                                            <input type="submit" name="modifyEvents" value="modifier l'événement" />
                                        </form>
                                    </div>
                                    <div class="modal-footer bg-white">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal de suppression-->
                        <!-- modal-->
                        <div class="modal fade" id="deleteEvents<?= $listerEvents->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer <?= $listerEvents->title ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-white"  id="modifyEvents<?= $listerEvents->id ?>" >
                                        <form name="deleteEvents" method="post">
                                            <p>Supprimer l'événement <?= $listerEvents->title ?></p>
                                            <input type="hidden" name="deleteEvent" value=" <?= $listerEvents->id ?>" />
                                            <input type="submit" name="btnDeleteEvent" value="Supprimer l'évenement" />
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
            <div class="text-center">
                <p class="suceessMessage"><?= isset($messaageSucess) ? $messaageSucess : '' ?></p>
                <p class="errorMessage"><?= isset($formError['date']) ? $formError['date'] : '' ?></p>
                <p class="errorMessage"><?= isset($formError['hour']) ? $formError['hour'] : '' ?></p>
                <p class="errorMessage"><?= isset($formError['titleEvents']) ? $formError['titleEvents'] : '' ?></p>
                <p class="errorMessage"><?= isset($formError['descriptionEvents']) ? $formError['descriptionEvents'] : '' ?></p>
                <p class="errorMessage"><?= isset($formError['location']) ? $formError['location'] : '' ?></p>
                <p class="errorMessage"><?= isset($formError['echec']) ? $formError['echec'] : '' ?></p>
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
<!--Fin corps de pages-->
<?php
include ("../include/footer.php");
?>