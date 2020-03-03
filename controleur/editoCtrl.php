<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
$title = 'EDITO';
$listerEdito = new editot();
//$listerEditos = $listerEdito->list erEdito();
$nbrEdito = $listerEdito->countEdito();
if (isset($_GET['pageChoice']) && $_GET['pageChoice'] <= $nbrEdito->nbrEdito && $_GET['pageChoice'] > 0) {
    $pageChoice = ((htmlspecialchars($_GET['pageChoice']) - 1) *1);
    // calcule qui permet d'afficher le premier User
    $listerEditos = $listerEdito->listerEdito($pageChoice); // affichage des pages en fonction du nombre d'id
} else {
   $listerEditos = $listerEdito->listerEdito();
}
 $listerEditos = $listerEdito->listerEdito();

$listerCategoryEdito = new categoryEdito();
$listeEditotCategory = $listerCategoryEdito->listeCategoryEdito();
$listeAdmnin = new users();
$listeAdminAndModer = $listeAdmnin->listerAdminAndModé();

