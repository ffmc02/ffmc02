<?php
include_once '../config.php';
include_once '../controleur/ourActionsCtrl.php';
/* en tete */
include ("../include/head.php");

include ("../include/navbar.php");
?>
<!--corps de la page -->
<div class="bdPresentation container-fluid">
    <?php
    //^colone de gauche
    include ("../include/columnLeft.php");
    ?>
    <!-- colonne central-->
    <div id="columnCenter" class=" col-lg-8 px-0">

        <div class="titleGreen">
            <h1>Les événements avec  FFMC02</h1>
        </div>
       <div class="titleGreen">
            <h2>les actions 2019</h2>
        </div>
        <div class="text-center">
            <?php
            foreach ($listeEvent AS $listerEvents) {
                if ($listerEvents->eventCategory != 1 && $listerEvents->eventCategory != 8 ) {
                    ?>
                    <h2>  prochaine action</h2>
                    <p><?= $listerEvents->nameCategoryEvents ?></p>
                    <p>  <?= $listerEvents->title ?> </p>
                    <p>aura lieu le:  <?= $listerEvents->dateEvent ?></p>
                    <p>à  <?= $listerEvents->location ?></p>
                    <p>Détail : <?= $listerEvents->description ?></p>
                    <?php if ($listerEvents->picture != NULL) { ?>
                        <img class="small" id="imgBlackDot" src="../<?= $listerEvents->picture ?>"/>
                        <?php
                    }
                }
            }
            ?>
        </div>
                 <div class="text-center">
            <?php
            foreach ($listeArticle AS $listerArticles) {
                if ($listerArticles->idCategory != 5 ) {
                    $article=$listerArticles->articleDescription;
                    ?>
                    <?php // foreach ($listeArticle as $listerArticles) { ?>
                        <p class="titleGreen"><?= $listerArticles->nameCategoryArticle ?></p>
                        <p> <?= $listerArticles->title ?></p>
                        <p> <?=nl2br($article) ?></p>
                        <?php if ($listerArticles->linkExternalSite != NULL) { ?>
                            <p><a href=" <?= $listerArticles->linkExternalSite ?>" target="_blank"><?= $listerArticles->nameLinkExternal ?> </a></p>
                            <?php
                        }
                        if ($listerArticles->picture != NULL) {
                            ?>
                            <img class="smalarticle" id="imgBlackDot" src="../../<?= $listerArticles->picture ?>"/>
                        <?php }if ($listerArticles->video != NULL) {
                            ?>
                            <iframe width="460" height="215" src="<?= $listerArticles->video ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <p> Par  <?= $listerArticles->pseudo ?></p>  <p>date de l'événément : <?= $listerArticles->dateEvent ?></p>
                            <?php
//                        }
                    }
                }
            }
            ?>
                              <p colspan="3"> page :
                <?php
                for ($i = 1; $i <= $nbrArticle->nbrArticle; $i++) {
                    ?>
                    <a href="?pageChoice=<?= $i ?>"><?= $i ?></a>
                <?php }
                ?></p>
        </div>

        <div class="big">
            <p> </p>
        </div>
   </div>
    <!--fin de colone centrale-->
    <?php
    //^colone de droite
    include ("../include/columnRight.php");
    ?>
</div>
<!--Fin corp de pages-->
<?php
include ("../include/footer.php");
?>