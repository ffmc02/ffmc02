<?php
session_start();
include_once '../../model/dataBase.php';
include_once '../../model/usermodel.php';
include_once '../controleur/permissionManagerCtrl.php';
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
        <?php if (isset($_SESSION['access']) && $_SESSION['access'] == 4 || isset($_SESSION['access']) && $_SESSION['access'] == 6) {
            ?>

            <div class="titleGreen">
                <h1>gestion des permission d'accés au site </h1>
            </div>
            <div class="titleGreen">
                <h2>Tableau de profils</h2>
            </div>
            <table class="border border-primary text-center col-lg-12">
                <thead  class="border border-primary font-weight-bold">
                    <tr  class="border border-primary ">

                        <td class="border border-primary"> Pseudo  </td>
                        <td class="border border-primary"> Mail  </td>
                        <td class="border border-primary">Date d'inscription </td>
                        <td class="border border-primary">Niveau d'accès  </td>
                        <td class="border border-primary">Modification de l'accès</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        foreach ($listerUserById as $dataUser) {
                            ?>
                            <td class="border border-primary"><?= $dataUser->pseudo ?></td>
                            <td class="border border-primary"><?= $dataUser->email ?></td>
                            <td class="border border-primary"><?= $dataUser->registerDate ?></td>
                            <td class="border border-primary"><?= $dataUser->id_1402f_numberGroupe ?></td>
                            <?php
                            if ($_SESSION['access'] == 4) {
                                ?>
                                <td class="border border-primary" id="btnModifyAcces"><a href="modifyAccessUser.php?id=<?= $dataUser->id ?>">modifier le niveau d'accès.</a></td>
                            <?php }
                            ?>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                <td colspan="2"> page :
                    <?php for ($i = 1; $i <= $numberPages->numberPages; $i++) { ?>
                        <a href="?pageChoice=<?= $i ?>"><?= $i ?></a>
                    <?php }
                    ?>
                </td>
                </tfoot>
            </table>
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