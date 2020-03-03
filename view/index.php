<?php
include_once '../config.php';
include_once '../controleur/indeCtrl.php';
include ("../include/headIndex.php");
?>
<title>Accueil FFMC02</title>
<?php
include ("../include/navbar.php");
?>
<!-- début du corps de page-->
<div class="bgIndex container-fluid text-center">

    <!--Entête-->      
    <div class="row">
        <div class="col-lg-2">
            <p> Météo SAINT QUENTIN </p>
            <?php
            //meteo saint quentin
            include ("../include/meteo.php");
            ?>
        </div>
        <div class="col-lg-8">
          <img class="img-fluid logoanim" src="../assets/img/imageslocal/40-ANS_LOGO_FFMC_ANIME.gif"/>
        </div>
        <div class=" col-lg-2">
            <img class="nickolas img-fluid" src="assets/img/imageslocal/nikolas.png"/>  
        </div>
    </div>
    <!-- collone de gauche-->
    <div class="row">
        <div id="columnLeft" class="col-lg-2 px-0 " >
            <div>
                <div class="titleGreen">
                    <h2>Nos actions</h2>
                </div>
                <p> Vous voulez retrouver nos actions<br>
                    passées et futures<br>
                    c'est par <a href="ourActions">ici</a></p>
            </div>
            <div class="titleGreen">
                <h2>Les pétales de la FFMC</h2>
            </div>
            <a href="https://afdm.org/" target="_blank" >AFDM Association pour la Formation Des Motards</a> <br>
            <a href="https://www.mutuelledesmotards.fr/" target="_blank">Assurance Mutuelle Des Motards</a><br>
            <a href="https://ffmc.asso.fr/commission-stop-vol" target="_blank">FFMC – Commission Stop Vol</a><br>
            <a href="https://ffmc.asso.fr/commission-juridique" target="_blank">FFMC – Commission juridique</a><br>
            <a href="https://ffmc.asso.fr/" target="_blank">FFMC Nationale</a><br>
            <a href="https://www.motomag.com/" target="_blank">Moto magazine</a><br>
        </div>
        <!--fin colonne de gauche-->
        <!-- colonne central-->
        <div id="columnCenter" class=" col-lg-8 px-0">
            <div class="titleGreen">
                <h1>La FFMC AISNE</h1>
            </div>
            <?php
            foreach ($listeEvent AS $listerEvents) {
                if ($listerEvents->eventCategory == 1) {
                    ?>
                    <h2 class="text-primary miteeng"><?= $listerEvents->nameCategoryEvents ?></h2>
                    <p>  <?= $listerEvents->title ?> le  <?= $listerEvents->dateEvent ?> au  <?= $listerEvents->location ?></p>

                    <?php
                }
            }
            ?>
            <div class="titleGreen">                                              
                <h2>Présentation de la FFMC02 </h2>
            </div>

            <p>La FFMC Aisne a été reprise après quelques années de sommeil.<br>
                <a href="presentation" class="connectionsIndex"> Venez découvrir la nouvelle équipe</a>
            </p>
            <?php
            foreach ($listeEvent AS $listerEvents) {
                if ($listerEvents->eventCategory != 1 && $listerEvents->eventCategory != 8) {
                    ?>
                    <div class="titleGreen">
                        <h2>Evénement à venir </h2>
                    </div>
                    <p><?= $listerEvents->nameCategoryEvents ?></p>
                    <p>  <?= $listerEvents->title ?> </p>
                    <p>auras lieu le:  <?= $listerEvents->dateEvent ?></p>
                    <p>à  <?= $listerEvents->location ?></p>
                    <p>Pluis d'infots cliquez <a href="ourActions">ICI</a></p>
                    <?php
                }
            }
            ?>
            <div class="titleGreen">
                <h2>Dernier article de la FFMC AISNE</h2>
            </div>
            <div>
                <?php
                foreach ($listeArticles AS $articles) {
                    if ($articles->idCategory != 5) {
                        $descriptions = $articles->articleDescription;
                        $max = 75;
                        if (strlen($descriptions) >= $max) {
                            $descriptions = substr($descriptions, 0, $max);
                            $espace = strrpos($descriptions, " ");
                            if ($espace) {
                                $descriptions = substr($descriptions, 0, $espace);
                                $descriptions .= '...';
                            }
                        }
                        ?>
                        <h2 class="titleGreen"><?= $articles->title ?></h2>
                        <p><?= $descriptions ?> <a href="ourActions">La suite ici</a></p>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="titleGreen">
                <h2>Dernier édito de la FFMC AISNE</h2>
            </div>
            <div>
                <?php
                foreach ($listerEditos AS $listerEdito) {
                    if ($listerEdito->idCategoryEdito != 4) {
                        $description = $listerEdito->edito;
                        $max = 100;
                        if (strlen($description) >= $max) {
                            $description = substr($description, 0, $max);
                            $espace = strrpos($description, " ");
                            if ($espace) {
                                $description = substr($description, 0, $espace);
                                $description .= '...';
                            }
                        }
                        ?>
                        <h2 class="titleGreen"><?= $listerEdito->title ?></h2>
                        <p ><?= $listerEdito->subtitle ?></p>
                        <p><?= $description ?> <a href="edito">La suite ici</a></p>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <!--colonne de droite-->
        <div id="columnRight" class="col-lg-2">
            <div>   
                <div class="titleGreen ">
                    <h2>Nos partenaires</h2>
                </div>
                <div class="text-center">
                    <?php foreach ($getPartner as $listerPartner) { ?>
                        <p><?= $listerPartner->namePartner ?></p>
                        <img class="img-fluid"  src="../<?= $listerPartner->picture ?>" />
                        <p class="text-center"><a class="text-center" href="<?= $listerPartner->linkExternalSite ?>" target="_blank"><?= $listerPartner->nameLink ?></a></p>
                    <?php } ?>
                </div>
            </div>
            <div>
                <div class="titleGreen"> 
                    <h2>Les FFMC du cdr Nord</h2>
                </div>
                <img class="img-fluid"  src="assets/img/imageslocal/logocdrnord.png"/>
                <p>Retrouver les antennes des départements limitrophes <a href="northNdrAntenna">ici</a></p>
            </div>
        </div>
    </div>
</div>
</div>
<!--fin du corps de page-->
<?php
include ("../include/footerIndex.php");
?>