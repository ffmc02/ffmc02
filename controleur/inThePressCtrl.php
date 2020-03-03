<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
$title='La presse parle de nous';
//liste avec paginations des liens des articles de presse
$listePressArticle= new inThePress();
$listePreessArticles = $listePressArticle->getPressArticle();
$countPressArticle = $listePressArticle->countPressArticle();
if (isset($_GET['pageChoice']) && $_GET['pageChoice'] <= $countPressArticle->nbrPressArticle && $_GET['pageChoice'] > 0) {    
    $pageChoice = ((htmlspecialchars($_GET['pageChoice'])-1)*3);
    // calcule qui permet d'afficher le premier User
    $listePreessArticles = $listePressArticle->getPressArticle($pageChoice); // affichage des pages en fonction du nombre d'id
}
else {
 $listePreessArticles = $listePressArticle->getPressArticle();
}