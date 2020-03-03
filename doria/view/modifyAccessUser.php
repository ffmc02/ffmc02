<?php
session_start();
include_once '../../model/dataBase.php';
include_once '../../model/usermodel.php';
include_once '../../model/numberGroupe.php';
include_once '../controleur/modifyAccessUserCtrl.php';
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
        <div class="titleGreen">
            <?php if (isset($_SESSION['access']) == 4) {
                ?>
                <h1>Modifier les droits</h1>
            </div>
            <div>
                <p>Pour rapel il existe 3 droit d'accées :
                    - accées administrateur reservé a deux personnes (le coordinateur et l'aide au conseil technique ) (id_groupemember 4)<br>
                    - accées moderateur reservée au membre du bureau (coordinateur adjoint, secrétaire et responsable Point noir (id_groupemember 6))<br>
                    - accés utilisateur pour toutes les personnes inscrites (id_groupemember 7).
                </p>
            </div>
            <div class="titleGreen">
                <h2>modification de l'accées</h2>
            </div>
            <div>
                <p>je modifie l'accées de :<br> <?= $listeUserById->pseudo ?> qui a un accées de <?= $listeUserById->id_numberGroupe ?></p>
                <form name="modifyAccess" method="post">
                    <label>Accées : </label><br>
                    <select name="idAccess">
                        <?php foreach ($listerAccessGroupe as $listeGroupeData) { ?>
                            <option value="<?= $listeGroupeData->id ?>"><?= $listeGroupeData->groupeType ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <p><?= isset($formError['idAccess']) ? $formError['idAccess'] : '' ?></p>
                    <input type="submit" id="btnModifyUser" name="btnModifyUser" class="btn-primary"/>
                </form>
                <div class="titleGreen">
                    <h2>je suprime l'utilisateur</h2>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Suprimer l'utilisateur 
                </button>
                <p>Attention c'est ireversible</p>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-white">
                                <h5 class="modal-title" id="exampleModalLabel">suprime Un utilisateur  </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-white">
                                Suprimer le profil de de <?= $listeUserById->pseudo ?>

                            </div>
                            <div class="modal-footer bg-white">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <form name="formDeleteUser" method="post">
                                    <input type="submit" name="btnDeleteUser"  value="suprimer" class="btn btn-primary"/>
                                </form>
                                <!--<button type="button" name="deleteUser"  class="btn btn-primary">suprimer</button>-->
                            </div>
                        </div>
                    </div>
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