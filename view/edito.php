<?php
include_once '../config.php';
include_once '../controleur/editoCtrl.php';
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
        <div class="titleGreen">
            <h1>EDITO de la FFMC02</h1>
        </div>
        <div class="text-center">
            <?php
            foreach ($listerEditos as $listeEditos) {
                if ($listeEditos->idCategoryEdito != 4) {
                    $edito = $listeEditos->edito;
                    $paragraphe1 = $listeEditos->subsections1;
                    $paragraphe2 = $listeEditos->subsections2;
                    $paragraphe3 = $listeEditos->subsections3;
                    ?>
                    <p><?= $listeEditos->nameCategoryEdito ?></p>
                    <h2 class="titleGreen"><?= $listeEditos->title ?></h2>
                    <p class="titleGreen"><?= $listeEditos->subtitle ?></p>
                    <p><?= nl2br($edito) ?></p>
                    <?php if ($listeEditos->picture != NULL) { ?>
                        <p><img class="smalarticle" id="imgBlackDot" src="../doria/<?= $listeEditos->picture ?>" /></p>
                    <?php } ?>
                    <p class="titleGreen"><?= $listeEditos->subtitle1 ?></p>
                    <p><?= nl2br($paragraphe1) ?></p>
                    <?php if ($listeEditos->picture1 != NULL) { ?>
                        <p><img class="smalarticle" id="imgBlackDot" src="../doria/<?= $listeEditos->picture1 ?>" /></p>
                    <?php } ?>
                    <p class="titleGreen"><?= $listeEditos->subtitle2 ?></p>
                    <p><?= nl2br($paragraphe2) ?></p>
                    <?php if ($listeEditos->picture2 != NULL) { ?>
                        <p><img class="smalarticle" id="imgBlackDot" src="../doria/<?= $listeEditos->picture2 ?>" /></p>
                    <?php } ?>
                    <p class="titleGreen"><?= $listeEditos->subtitle3 ?></p>
                    <p><?= nl2br($paragraphe3) ?></p>
                    <?php if ($listeEditos->picture3 != NULL) { ?>
                        <p><img class="smalarticle" id="imgBlackDot" src="../doria/<?= $listeEditos->picture3 ?>" /></p>
                        <?php } ?>
                    <p><?= $listeEditos->datefr ?></p>
                    <p><?= $listeEditos->pseudo ?></p>
                    <?php
                }
            }
            ?>
        </div>
        <p colspan="1" class="text-center"> page :
        <?php
        for ($i = 1; $i <= $nbrEdito->nbrEdito; $i++) {
            ?>
                        <a href="?pageChoice=<?= $i ?>"><?= $i ?></a>
        <?php }
        ?></p>
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