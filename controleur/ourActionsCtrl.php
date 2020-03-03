<?php
//ini_set('display_errors', 'on');
//error_reporting(E_ALL);
$title='Nos actions';
$listEvents=  new events();
$listeEventMeeting= $listEvents->listeEventsMeeting();
$listeEvent = $listEvents->listeEvents();
$listerArticle = new articles();
$listeArticles = $listerArticle->listerArticle();
$nbrArticle= $listerArticle->countArticle();
        if (isset($_GET['pageChoice']) && $_GET['pageChoice'] <= $nbrArticle->nbrArticle && $_GET['pageChoice'] > 0) {    
    $pageChoice = ((htmlspecialchars($_GET['pageChoice'])-1)*3);
    // calcule qui permet d'afficher le premier User
    $listeArticle = $listerArticle->listerArticle($pageChoice); // affichage des pages en fonction du nombre d'id
}
else {
  $listeArticle = $listerArticle->listerArticle();
}