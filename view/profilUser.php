<?php
include_once '../config.php';
include_once '../controleur/profilUserCtrl.php';
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
    <?php
    if ($_SESSION['access'] == 4 || $_SESSION['access'] == 6 || $_SESSION['access'] == 7) {
        ?>
        <div id="columnCenter" class=" col-lg-8 px-0 text-center">
            <div class="<?= (count($formError) == 0) ? 'detailUser' : 'ModifyUser'; ?>">
                <div class="titleGreen">
                    <h1>Mon profil</h1>
                </div>
                <p class="errorMessage"><?= isset($messageErroUserModify) ? $messageErroUserModify : '' ?></p>
                <div>
                    <p> Pseudo : <?= $_SESSION['pseudo'] ?></p>
                    <p> Mail : <?= $_SESSION['loginMail'] ?></p>
                    <p class="btn btn-primary" id="btnModify">Modifier</p>
                               <!--<p class="btn-succes" id="btnDelete"><a href="profilUser.php?id=<?= $_SESSION['idUser'] ?>">suprimer mon profil</a></p>-->
                    <p type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Supprimer mon profil</p>
                </div>
            </div>
            <div class="<?= (count($formError) > 0) ? 'detailUser' : 'ModifyUser'; ?> text-center">

                <div class="titleGreen">
                    <h2>Je modifie mon profil</h2>
                </div>
                <form method="POST"> 
                    <label for="pseudo">Votre pseudo:</label>
                    <input type="hidden" value="<?= $_SESSION['idUser'] ?>" name="idUser"/>
                    <input type="text" placeholder="Votre pseudo" name="pseudo" id="pseudo" value=" <?= $_SESSION['pseudo'] ?>"/>
                    <p class="errorMessage"><?= isset($formError['pseudo']) ? $formError['pseudo'] : '' ?></p> 
                    <label for="email">Votre mail:</label>
                    <input type="text" placeholder="Votre mail" name="email" id="email" value="<?= $_SESSION['loginMail'] ?>" />
                    <p class="errorMessage"><?= isset($formError['email']) ? $formError['email'] : '' ?></p>
                    <label for="email2">Confirmation du mail:</label>
                    <input type="text" placeholder="Confirmation du mail" name="email2" id="email2" />
                    <p class="errorMessage"><?= isset($formError['email2']) ? $formError['email2'] : '' ?></p>
                    <input type="submit" name="btnModifyUser" value="Je modifie mon profil" />
                </form>
            </div>
            <p class="errorMessage"><?= isset($messageErroUserModify) ? $messageErroUserModify : '' ?></p>
        </div>
        <?php
    } else {
        require '../include/registerForm.php';
    }
    ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog bg-white" role="document">
            <div class="modal-content">
                <div class="modal-header bg-white">
                    <h5 class="modal-title" id="exampleModalLabel">supprimer votre profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-white">
                    Vous êtes sur le point de supprimer votre profil <?= $_SESSION['pseudo'] ?>
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <form name="formDeleteUser" method="post">
                        <input type="hidden" value="<?= $_SESSION['idUser'] ?>" name="idUser"/>
                        <input type="submit" name="btnDeleteUser" id="btnDelete" value="suprimer" class="btn btn-primary"/>
                    </form>
                    <!--<button type="button" name="deleteUser"  class="btn btn-primary">suprimer</button>-->
                </div>
            </div>
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