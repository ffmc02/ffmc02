<?php
include_once '../config.php';
/* en tete */
include ("../include/head.php");
?>
<title>Les Antennes du Conseil De Régions Nord de la FFMC</title>
<?php
include ("../include/navbar.php");
?>
<!--corps de la page -->
<div class="bdNorthCdrAntenna container-fluid">
    <?php
    //^colone de gauche
    include ("../include/columnLeft.php");
    
    ?>
 
    <!-- colonne central-->
    <div id="columnCenter" class="columnCenter col-lg-8 px-0">
        <div class="titleGreen">
              
            <h1>Les antennes du Conseil de Regions Nord</h1>
        </div>
        
        <div class="titleGreen">
            <h2>Les antennes Picardes</h2>
        </div>
        <div  class="container">
            <div class="row">
                <div class="text-center col-lg-6  my-auto">
                    <a href="https://www.ffmc80.com/" target="_blank">
                        <img class="img-fluid"  src="../assets/img/imageslocal/ffmc80.jpg" alt="ffmc 80" width="100%" /></a>
                    <p>FFMC Somme </p>
                </div>
                <div class="text-center col-lg-6 my-auto">
                    <img class="img-fluid" src="../assets/img/imageslocal/ffmc60.jpg" alt="ffmc 60"  width="100%"/>
                    <p><a href="https://www.ffmc60.fr/" target="_blank" >FFMC OISE</a> </p>
                </div>                
            </div>
            <div class="titleGreen">
                <h2>Les antennes du Nord-Pas de Calais</h2>
            </div>
            <div class="row">
                <div class="text-center col-lg-6  my-auto">
                    <a href="http://ffmc59.fr/" target="_blank"><img class="img-fluid"  src="../assets/img/imageslocal/59.png" alt="ffmc 59" width="100%" /></a>
                    <p>FFMC Nord</p>
                </div>
                <div class="text-center col-lg-6  my-auto">
                    <a href="https://www.ffmc62.fr/" target="_blank">
                        <img src="../assets/img/imageslocal/FFMC62.png" alt="ffmc 62"  width="100%"  />
                    </a>
                    <p> FFMC Pas de Calais</p>
                </div>
            </div>
            <div class="titleGreen">
                <h2>Les antennes des Ardennes et de la Marne</h2>
            </div>
            <div class="row">
                <div class="text-center col-lg-6  my-auto">
                          <img class="img-fluid"  src="../assets/img/imageslocal/Logo08.svg" alt="ffmc 08" width="100%" />
                    <p> <a href="https://www.facebook.com/FFMC08/" target="_blank" >FFMC Ardennes</a></p>
                </div>
                <div class="text-center col-lg-6  my-auto">
                    <a href="https://ffmc51.pagesperso-orange.fr/index.htm" target="_blank"> 
                        <img src="../assets/img/imageslocal/ffmc51.png" alt="ffmc 62"  width="100%"  /></a>
                    <p>FFMCMarne</p>
                </div>
            </div>
        </div>
    </div>
    <!--finc colonne central-->
    <?php
//^colone de droite
    include ("../include/columnRight.php");
    ?>
</div>
<!--Fin corp de pages-->
<?php
include ("../include/footer.php");
?>