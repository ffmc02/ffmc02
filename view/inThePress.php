<?php
include_once '../config.php';
include_once '../controleur/inThePressCtrl.php';
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
    <div id="columnCenter " class=" col-lg-8 px-0">
        <div class="titleGreen text-center">
            <h1>La presse parle de nous.</h1>
        </div>
        <div class="text-center">
            <?php foreach ($listePreessArticles as $pressArticle) { ?>
            <p class="titleGreen"><?= $pressArticle->titleEvents ?></p>
                <p><?= $pressArticle->Evenents ?></p>
                <p><?= $pressArticle->eventDate ?></p>
                <div>
                    <p>Nom du média <?= $pressArticle->nameOfTheMedia ?></p>
                    <p><a href=" <?= $pressArticle->externalSiteLinks ?>" target="_blank"><?= $pressArticle->nameExternalSite ?> </a></p>
                </div>
                
                <?php if($pressArticle->externalSiteLinks1 !=NULL){ ?>
               <hr>
               <div>
                    <p><?= $pressArticle->nameOfTheMedia1 ?></p>
                    <p><a href=" <?= $pressArticle->externalSiteLinks1 ?>" target="_blank"><?= $pressArticle->nameExternalSite1 ?> </a></p>
                </div>
                <hr>
                 <?php }
            ?>
                
            <?php if($pressArticle->externalSiteLinks2 !=NULL){ ?>
                <div>
                    <p><?= $pressArticle->nameOfTheMedia2 ?></p>
                    <p><a href=" <?= $pressArticle->externalSiteLinks2 ?>" target="_blank"><?= $pressArticle->nameExternalSite2 ?> </a></p>
                </div>
                <hr>
                <?php }
            ?>
                <?php if($pressArticle->externalSiteLinks3 !=NULL){ ?>
                <div>
                    <p><?= $pressArticle->nameOfTheMedia3 ?></p>
                    <p><a href=" <?= $pressArticle->externalSiteLinks3 ?>" target="_blank"><?= $pressArticle->nameExternalSite3 ?> </a></p>
                </div>
                <hr>
                 <?php }
            ?>
                <?php if($pressArticle->externalSiteLinks4 !=NULL){ ?>
                <div>
                    <p><?= $pressArticle->nameOfTheMedia4 ?></p>
                    <p><a href=" <?= $pressArticle->externalSiteLinks4 ?>" target="_blank"><?= $pressArticle->nameExternalSite4 ?> </a></p>
                </div>
                <hr>
                 <?php }
            ?>
                <?php if($pressArticle->externalSiteLinks5 !=NULL){ ?>
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