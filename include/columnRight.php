<!--colonne de droite-->
<?php include_once '../controleur/columnRightCtrl.php'; ?>
<div id="columnRight" class="col-lg-2 px-0">
    <div>
        <div class="titleGreen">
            <h2>Nos partenaires</h2>
        </div>
        <div class="text-center">
            <?php foreach ($getPartner as $listerPartner) { ?>
                <p><?= $listerPartner->namePartner ?></p>
                <img class="img-fluid"  src="../<?= $listerPartner->picture ?>" />
                <p><a href="<?= $listerPartner->linkExternalSite ?>" target="_blank"><?= $listerPartner->nameLink ?></a></p>
            <?php } ?>
        </div>
    </div>
    <div>   
        <div class="titleGreen">
            <h2>Les FFMC du CDR Nord</h2>
        </div>
        <img class="img-fluid"  src="../assets/img/imageslocal/logocdrnord.png"/>
        <p>Retrouvez les antennes des départements limitrophes <a href="northNdrAntenna">ici</a></p>
    </div>

</div>
