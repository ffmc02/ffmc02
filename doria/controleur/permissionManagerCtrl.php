<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);
$title = 'liste des utilisateur';
$users = new users();

$numberPages = $users->countUsersPages();
$listerUserById = $users->readUser();
if (isset($_GET['pageChoice']) && $_GET['pageChoice'] <= $numberPages->numberPages && $_GET['pageChoice'] > 0) {   
    $pageChoice = ((htmlspecialchars($_GET['pageChoice'])-1)*5);
    // calcule qui permet d'afficher le premier User
    $listerUserById = $users->readUser($pageChoice); // affichage des pages en fonction du nombre d'id
} else {
    $listerUserById = $users->readUser();
}
