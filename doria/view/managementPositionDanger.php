<?php
session_start();
include_once '../../model/dataBase.php';
include_once '../../model/positionDanger.php';
include_once '../controleur/managementPositionDangerCtrl.php';
/* en tete */
include ("../include/head.php");
?>
<title></title>
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
        <?php if ($_SESSION['access'] == 4 || $_SESSION['access'] == 6) {
            ?>
            <div class="titleGreen">
                <h1>Gestion de la position du danger</h1>
            </div>
            <p><?= isset($formError['DdeleteDangerPositionr']) ? $formError['DdeleteDangerPositionr'] : '' ?></p>
            <p><?= isset($formError['modifydanger']) ? $formError['modifydanger'] : '' ?></p>
            <p><?= isset($formError['addPositionDanger']) ? $formError['addPositionDanger'] : '' ?></p>
            <p><?= isset($messaageSucessAddPositionDanger) ? $messaageSucessAddPositionDanger : '' ?></p>
            <p><?= isset($messageErroraddPositionDanger) ? $messageErroraddPositionDanger : '' ?></p>
            <p><?= isset($messaageErrorDeletePosition) ? $messaageErrorDeletePosition : '' ?></p>
            <p><?= isset($messaageSucess) ? $messaageSucess : '' ?></p>
            <p><?= isset($messaageError) ? $messaageError : '' ?></p>
            <div class="titleGreen">
                <h2>Liste des positions</h2>
            </div>
            <?php foreach ($listerPositionDanger as $listePositionDanger) { ?>
                <p value="<?= $listePositionDanger->id ?>"> Position : <?= $listePositionDanger->typeDangerPosition ?></p>
                <?php
            }
            ?>
            <p class="btn btn-success" id="btnAddDangerPosition">Ajouter </p>
            <p class="btn btn-primary"  id="btnModifyDangerPosition">Modifier </p>
            <?php if ($_SESSION['access'] == 4) { ?>
                <p class="btn btn-danger"  id="bntDeleteDangerPosition"> Supprimer </p>
            <?php } ?>
            <!------------------------------->
            <div  class="modifyDangerPosition">
                <div class="titleGreen">
                    <h2>Mofifier une postion</h2>
                </div>
                <form name="formModifyDangerPositrion" method="post">
                    <p>Selectionner la position a modifier dans la liste déroulante</p>
                    <select name="modifyDangerPosition">
                        <?php foreach ($listerPositionDanger as $modifyPositionDanger) { ?>
                            <option value="<?= $modifyPositionDanger->id ?>"><?= $modifyPositionDanger->typeDangerPosition ?></option>
                        <?php } ?>
                    </select>
                    <input type="text" name="newNameOfPositionDanger" />
                    <input type="submit" name="bntModifyDangerPosition"  value="Modifier la postion"/>
                </form>
            </div>
            <!---------------------------------------------------->
            <div  class="deleteDangerPosition">
                <div class="titleGreen">
                    <h2>Supprimer une postion</h2>
                </div>
                <p>Selectionner la postion a suprimmer dans la liste déroulante.</p>
                <form name="formDdeleteDangerPositionr" method="post">
                    <select name="DdeleteDangerPositionr" id="deleteDanger">
                        <option selected></option>
                        <?php foreach ($listerPositionDanger as $modifyPositionDanger) { ?>
                            <option value="<?= $modifyPositionDanger->id ?>"><?= $modifyPositionDanger->typeDangerPosition ?></option>
                        <?php } ?>
                    </select>
                    <p class="text-color-red">Attention si vous appyer sur le bouton c'est irrémédiable Merci de ne pas supprimer les cases blanches de début ou milieux</p>
                    <input type="submit" name="bntDdeleteDangerPositionr"  value="je supprimer la position" class="btn btn-primary"/>
                </form>
            </div>  <div class="addDangerPosition">
                <div class="titleGreen">
                    <h2>ajouter une postion</h2>
                </div>
                <p>remplissez le champs nouvelle position</p>
                <form method="post" name="AddPositionDanger">
                    <label>Nouvelle postion : </label>
                    <input type="text" name="addPositionDanger" placeholder="Nouvelle position" />
                    <input type="submit" name="btnaddPositionDanger" value="Ajouter" />
                </form>
            </div>
            <div class="addDangerPosition">
                <div class="titleGreen">
                    <h2>ajouter une postion</h2>
                </div>
                <p>remplissez le champs nouvelle position</p>
                <form method="post" name="AddPositionDanger">
                    <label>Nouvelle postion : </label>
                    <input type="text" name="addPositionDanger" placeholder="Nouvelle position" />
                    <input type="submit" name="btnaddPositionDanger" value="Ajouter" />
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