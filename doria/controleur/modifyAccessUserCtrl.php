<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);
$regexId = '/^\d+$/';
$formError = array();
$title = 'Modification droit d\'accés';
$modifyUser = new users();
$listerAccess = new numberGroupe();
if (!empty($_GET['id'])) {
    $modifyUser->id = htmlspecialchars($_GET['id']);
    if (isset($_POST['btnModifyUser'])) {
        if (!empty($_POST['idAccess']) && preg_match($regexId, $_POST['idAccess'])) {
            $modifyUser->id_numberGroupe = htmlspecialchars($_POST['idAccess']);
        } else {
            $formError['idAccess'] = 'L\'idAccess choisi n\'est pas référencer';
        }
        if (count($formError) == 0) {
            $modifyUser->modifyAccess();
            header("Location: ../view/permissionManagement.php");
        }
    }
    if (isset($_POST['btnDeleteUser'])) {

        $deleteUser = $modifyUser->deleteUser();
        header("Location: ../view/permissionManagement.php");
    }
}
//    var_dump($checkModifyUser);
//     var_dump($modifyUser);
$listeUserById = $modifyUser->getProfilUserById();
$listerAccessGroupe = $listerAccess->listerAccessSite();




