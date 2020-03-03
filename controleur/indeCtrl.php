<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
$title='Accueil';
$listEvents=  new events();
$listeEventMeeting= $listEvents->listeEventsMeeting();
$listeEvent = $listEvents->listeEvents();
$listerEdito = new editot();
$listerEditos = $listerEdito->listerEdito();
$listerArticle = new articles();
$listeArticles = $listerArticle->listerArticle();
 $listerPartner= new partner();
 $getPartner= $listerPartner->getPartner();