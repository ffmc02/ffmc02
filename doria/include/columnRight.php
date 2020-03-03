<!--colonne de droite-->
<div id="columnRight" class="col-lg-2 px-0">
    <?php
    if (isset($_SESSION['access']) && $_SESSION['access'] == 4 || isset($_SESSION['access']) && $_SESSION['access'] == 6) {
        ?>
        <div class="titleGreen">
            <h2>Gestion des évenements</h2>
        </div>
        <a href="../view/events.php">Création d'évenement</a><br>
        <a href="../view/CategoryEvenement.php">categorie d'événement</a>
        <div class="titleGreen">
            <h2>Gestion des articles</h2>
        </div>
        <a href="../view/article.php"> Gestion des articles</a><br>
        <a href="../view/categoryArticle.php">Categorie de l'article</a>
        <div class="titleGreen">
            <h2>Gestion des Editos</h2>
        </div>
        <a href="../view/editoAdmin.php">Editos
        </a><br>
        <a href="../view/categoryEdito.php">Categorie des Editos</a>
        <div class="titleGreen">
            <h2>Nos partenaire</h2>
        </div>
        <a href="../view/partner.php">Nos partenaires</a>
        <div class="titleGreen">
            <h2>Affichage des Articles de presses</h2>
        </div>
        <a href="../view/inThePressAdmin.php">Gestion des liens des articles de presses</a>
        <?php
    } else {
        require '../include/restrictedZone.php';
    }
    ?>
</div>
