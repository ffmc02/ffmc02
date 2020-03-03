<?php
session_start();
include_once '../../model/dataBase.php';
include_once '../../model/treatment.php';
include_once '../controleur/treatmentCtrl.php';
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
    <!--colonne central-->
    <div id="columnCenter" class=" col-lg-8 px-0">
        <?php
        if ($_SESSION['access'] == 4 || $_SESSION['access'] == 6) {
            ?>
            <div class="titleGreen">
                <h1>Gestion des statuts des points noirs</h1>
            </div>
            <!--------appartion si il y a des erreurs-->
            <p><?= isset($formError['addNewStatus']) ? $formError['addNewStatus'] : '' ?></p>
            <p><?= isset($formError['$messaageSucessAddNewStatus']) ? $formError['$messaageSucessAddNewStatus'] : '' ?></p>
            <p><?= isset($formError['$messageErrorAddNewStatus']) ? $formError['$messageErrorAddNewStatus'] : '' ?></p>
            <p><?= isset($formError['newNameOfStatus']) ? $formError['newNameOfStatus'] : '' ?></p>
            <p><?= isset($formError['ModifyStatus']) ? $formError['ModifyStatus'] : '' ?></p>
            <p><?= isset($formError['$messaageSucess']) ? $formError['$messaageSucess'] : '' ?></p>
            <p><?= isset($formError['$messaageError']) ? $formError['$messaageError'] : '' ?></p>
            <p><?= isset($formError['ModifyStatus']) ? $formError['ModifyStatus'] : '' ?></p>            
            <div class="titleGreen text-center">
                <h2>Liste des statuts disponibles</h2>
                <?php foreach ($StatusLister as $listerStatus) { ?>
                    <p value="<?= $listerStatus->idStatus ?>"> <?= $listerStatus->Status ?></p>
                    <?php
                }
                ?>
            </div>
            <div class="text-center"> 
                <div class="titleGreen">
                    <h2>Gestion des statuts des points noirs</h2>
                </div>
                <p>cliquer sur ce que vous souhaitez faire</p>
                <p class="btn btn-success" id="btnAddDangerPosition">Ajouter un statut</p>
                <p class="btn btn-primary"  id="btnModifyDangerPosition">Modifier un statut</p>
                <?php if ($_SESSION['access'] == 4) { ?>
                    <p class="btn btn-danger"  id="bntDeleteDangerPosition"> Supprimer un statut</p>
                <?php } ?>
            </div>  
            <!--------------------------------------------------------------->
            <div class="addDangerPosition">
                <div class="titleGreen">
                    <h2>ajouter une postion</h2>
                </div>
                <p>Remplissez le champs nouveau statut</p>
                <form method="post" name="AddNewStatus">
                    <label>Nouveau statut : </label>
                    <input type="text" name="addNewStatus" placeholder="Nouveau status" />
                    <input type="submit" name="btnNewStatus" value="Ajouter" />
                </form>
            </div>
            <!------------------------------------------------------------------------>
            <div  class="modifyDangerPosition">
                <div class="titleGreen">
                    <h2>Modifier un statut</h2>
                </div>
                <form name="formModifyStatus" method="post">
                    <p>Selectionner le statut à modifier dans la liste déroulante</p>
                    <select name="ModifyStatus">
                        <?php foreach ($StatusLister as $listerStatus) { ?>
                            <option value="<?= $listerStatus->idStatus ?>"> <?= $listerStatus->Status ?></option>
                        <?php } ?>
                    </select>
                    <p>Puis indiquer quel nouveau nom vous souhaitez lui attribuer.</p>
                    <label>Nouveau nom</label>
                    <input type="text" name="newNameOfStatus" />
                    <input type="submit" name="bntModifyStatus"  value="Modifier le status"/>
                </form>
            </div>
            <!-------------------------------------------------------------------------------->
            <div  class="deleteDangerPosition">
                <div class="titleGreen">
                    <h2>Supprimer une postion</h2>
                </div>
                <p>Selectionner le statut a suprimmer dans la liste déroulante.</p>
                <form name="formDdeleteStatus" method="post" >
                    <select name="DdeleteStatus" id="deleteStatus">
                        <option selected></option>
                         <?php foreach ($StatusLister as $listerStatus) { ?>
                            <option value="<?= $listerStatus->idStatus ?>"> <?= $listerStatus->Status ?></option>
                        <?php } ?>
                    </select>
                    <p>Attention si vous appyer sur le bouton c'est irrémédiable Merci de ne pas supprimer les cases blanches de début ou milieux</p>
                    <input type="submit" name="bntDdeleteStatus"  value="je supprimer le Status" class="btn btn-primary"/>
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