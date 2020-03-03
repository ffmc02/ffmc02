<?php
session_start();
include_once '../../model/dataBase.php';
include_once '../model/danger.php';
include_once '../../model/categorydanger.php';
include_once '../controleur/managementCathegoryDangerCtrl.php';
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
        if ($_SESSION['access'] == 4 || $_SESSION['access'] == 6) {
            ?>
            <div class="titleGreen">
                <h1>gestion des danger.</h1>
            </div>
            <div class="titleGreen">
                <h2>Liste des dangers existant</h2>
            </div>
        <p class="text-center">Cliquez sur un des boutons pour faire apparaître la liste de la catégorie choisie : </p>
            <div class="text-center">
                <h3 class="text-center btn btn-secondary" id="signaling">Signalistation manquante ou absente</h3>
                <div class="listeSigneling">
                <?php foreach ($listeDangerPositionByIdDanger as $typeDangerSignaliging) { ?>
                    <p value="<?= $typeDangerSignaliging->id ?>"> <?= $typeDangerSignaliging->typeCategoryDanger ?></p>
                <?php }
                ?>
            </div>
            <h3 class="text-center btn btn-secondary" id="listerInfrastructure">Probléme d'infrastructure</h3>
            <div class="listeInfra">
                <?php foreach ($listeinfrastructure as $typeDangerInfrastructure) { ?>
                    <p value="<?= $typeDangerInfrastructure->id ?>"> <?= $typeDangerInfrastructure->typeCategoryDanger ?></p>
                    <?php
                }
                ?>
            </div> 
            <h3 class="text-center btn btn-secondary" id="roadG" >Chaussée glissante</h3>
            <div class="listeRoadG">
                <?php foreach ($listeDangerRoad as $typeDangerRaod) { ?>
                    <p value="<?= $typeDangerRaod->id ?>"> <?= $typeDangerRaod->typeCategoryDanger ?></p>
                    <?php
                }
                ?>
            </div>     
            <p>Pages de gestion de la table danger qui permet d'ajouter, modifier, suprimer un danger.</p>
            <p class="btn btn-success" id="btnAddDanger">Ajouter un danger</p>
            <p class="btn btn-primary" id="btnModifyDanger">Modifier un danger</p>
            <?php if ($_SESSION['access'] == 4) { ?>
                <p class="btn btn-danger" id="bntDeleteDanger"> Supprimer un danger</p>
            <?php } ?>
        </div>
        <!--<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal" >suprimer mon profil</button>-->
        <p><?= isset($formError['modifydanger']) ? $formError['modifydanger'] : '' ?></p>
        <p><?= isset($formError['newNameDanger']) ? $formError['newNameDanger'] : '' ?></p>
        <p><?= isset($formError['newTypeDanger']) ? $formError['newTypeDanger'] : '' ?></p>
        <p><?= isset($messaageSucess) ? $messaageSucess : '' ?></p>
        <div class="addDanger"> 
            <div class="titleGreen">
                <h2>formulaire pour ajouter un danger </h2>
            </div>
            <p>Selectionnez la catégorie du danger dans la liste déroulante puis remplisser le champps nouveau danger.</p>
            <form method="post" name="formAddCathegoryDanger">
                <label>type de cathégorie</label>
                <select name="danger" id="danger">
                    <option selected></option>
                    <?php foreach ($listerDangerType as $listerDanger) { ?>
                        <option value="<?= $listerDanger->id ?>"> <?= $listerDanger->typeDanger ?></option>
                        <?php
                    }
                    ?>
                </select>
                <label>Nouveau danger</label>
                <input type="text" name="newTypeDanger" placeholder="Nouveau danger" />
                <input type="submit" name="btnNewTypeDanger" value="ajouter"/>
            </form>
        </div>
        <!------------------------------------------------------------------------------>
        <div class="modifydanger">
            <div class="titleGreen">
                <h2>formulaire de modification de danger </h2>
            </div>
            <p>Selectionner le danger à modifier dans la liste déroulante puis remplisser le champs nouveau nom</p>
            <form method="post" name="formModifyDanger">
                <select name="modifyDanger" id="danger">
                    <option selected></option>
                    <?php foreach ($listerTypeDangers as $listerTypeDanger) { ?>
                        <option value="<?= $listerTypeDanger->id ?>"> <?= $listerTypeDanger->typeCategoryDanger ?></option>
                        <?php
                    }
                    ?>
                </select>
                <label>Nouveau Nom</label>
                <input  name="newNameDanger" type="text" placeholder="nouveau nom"/>
                <input type="submit" value="modifier" name="btnModifyDanger">
            </form>
        </div>
        <!------------------------------------------------------------------------------>
        <div class="deleteDanger">
            <div class="titleGreen">
                <h2>formulaire de supression d'un danger</h2>
            </div>
            <p>Selectionner le danger a suprimer dans la liste déroulante.</p>
            <form name="formDeleteDanger" method="post">
                <select name="deleteDanger" id="deleteDanger">
                    <option selected></option>
                    <?php foreach ($listerTypeDangers as $listerTypeDanger) { ?>
                        <option value="<?= $listerTypeDanger->id ?>"> <?= $listerTypeDanger->typeCategoryDanger ?></option>
                        <?php
                    }
                    ?>
                </select>
                <p>Attention si vous appyer sur le bouton c'est irrémédiable Merci de ne pas supprimer les cases blanches de début ou milieux</p>
                <input type="submit" name="bntDeleteDanger"  value="Oui je supprimer le danger" class="btn btn-primary"/>
            </form>
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