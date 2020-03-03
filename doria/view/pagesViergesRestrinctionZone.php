<?php

session_start();
include_once '../../model/dataBase.php';

include '../controleur/.php';
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
        <?php
        $auth = array(4, 6);
           if (isset($_SESSION['access']) && in_array($_SESSION['access'], $auth)) {
            ?>
        <div class="titleGreen">
            <h1></h1>
      </div>
     
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