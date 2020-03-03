<!--Entête-->
<div class="row">
    <div class="col-lg-2">
        <img class="nickolas img-fluid" src="../../assets/img/imageslocal/nikolas.png"/> 
    </div>
    <div class="dark col-lg-8">
        <img class="img-fluid" src="../../assets/img/imageslocal/logopourgiletavant.png"/>
    </div>
    <div class="col-lg-2">
        <img class="nickolas img-fluid" src="../../assets/img/imageslocal/nikolas.png"/> 
    </div>
</div>
<!--fin entête-->
<!-- collone de gauche-->
<div class="row">
    <div id="columnLeft" class="col-lg-2 px-0 " >
        
            <?php
        if (isset($_SESSION['access']) && $_SESSION['access'] == 4 || isset($_SESSION['access']) && $_SESSION['access'] == 6 ) {
            ?>
        <div class="titleGreen">
            <h2>Gestion du formulaire<br>
                point noir </h2>
        </div>
         <div class="titleGreen">
            <h3>Gestion des dangers</h3>
        </div>
        <p><a href="../view/managementCathegoryDanger.php">Gestion des dangers </a></p>
        <div class="titleGreen">
            <h3>Gestion position du danger</h3>
        </div>
         <p><a href="../view/managementPositionDanger.php">Gestion de la postition du danger </a>
              <div class="titleGreen">
                  <h3>Gestion Statuts</h3>
        </div>
          <p><a  href="../view/treatment.php" >Gestion des statuts</a>
               <div class="titleGreen">
            <h2>Gestion des points noirs</h2>
        </div>        
          <p><a  href="../view/listeBlackDotAdm.php" >Liste des points noirs</a></p>
           <p>  <a href="../view/blackDotArchive.php">Liste des points noirs archivés</a></p>
          <div class="titleGreen">
            <h2>Gestion des utilisateurs</h2>
        </div>
        <p><a  href="../view/permissionManagement.php" >Liste des utilisateurs</a></p>
        
          <?php
        } else {
            require '../include/restrictedZone.php';
        }
        ?>
    </div>

    <!--fin colonne de gauche-->