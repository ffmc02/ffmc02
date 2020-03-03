<?php

$title = 'Gestion des éditots';
ini_set('display_errors', 'on');
error_reporting(E_ALL);
$formError = array();
$regexId = '/^\d+$/';
//ajouter un édito
if (isset($_POST['addEditot'])) {
    $addEdito = new editot();
    if (!empty($_POST['title'])) {
        $addEdito->title = htmlspecialchars($_POST['title']);
        $titles=$_POST['title'];
    } else {
        $formError['title'] = 'Merci de remplire le champs titre';
    }
    //sous titre 
    if(!empty($_POST['subititle'])){
        $addEdito->subtitle= htmlspecialchars($_POST['subititle']);
    }
    //paragraphe 
    if (!empty($_POST['edito'])) {
        $addEdito->edito = htmlspecialchars($_POST['edito']);
    } else {
        $formError['edito'] = 'Merci de remplir le champs édito';
    }
    //picture
        if (!empty($_FILES['picture']['name'])) {
        //je recupere le fichier photos
        $dossier = '../black/';
        //je dertermine le chemin ou seras transferer ma photo
        $dossiersDb = 'black/';
//                je dertmine le chemin pour la base de donnée 
        $tmp_name = $_FILES['picture']['tmp_name'];
//je met la photo dans un dossier temporraire
        $extensionFile = pathinfo($_FILES['picture']['name']);
        //je recuperre l'extention
        $name =$titles . '.' . $extensionFile['extension'];
//                je renome ma photo et je concatene avec l'extention
        $addEdito->picture = $dossiersDb . $name;
        move_uploaded_file($_FILES['picture']['tmp_name'], $dossier . $name);
        //je fait la  migration de mon fichier temporraire vers le dossier envoyer 
        //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    }
    ////-++---------------------------------
    //sous paragrapohe 1 + sous titre 1 +photo 1
    //sous titre1 
    if(!empty($_POST['subititle1'])){
        $addEdito->subtitle1= htmlspecialchars($_POST['subititle1']);
    }
   if(!empty($_POST['subsections1'])){
        $addEdito->subsections1= htmlspecialchars($_POST['subsections1']);
    }
      //picture1
        if (!empty($_FILES['picture1']['name'])) {
        //je recupere le fichier photos
        $dossier = '../black/';
        //je dertermine le chemin ou seras transferer ma photo
        $dossiersDb = 'black/';
//                je dertmine le chemin pour la base de donnée 
        $tmp_name = $_FILES['picture1']['tmp_name'];
//je met la photo dans un dossier temporraire
        $extensionFile = pathinfo($_FILES['picture1']['name']);
        //je recuperre l'extention
        $name =$titles .'_1'. '.' . $extensionFile['extension'];
//                je renome ma photo et je concatene avec l'extention
        $addEdito->picture1 = $dossiersDb . $name;
        move_uploaded_file($_FILES['picture1']['tmp_name'], $dossier . $name);
        //je fait la  migration de mon fichier temporraire vers le dossier envoyer 
        //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    }
//    ////-----------------
//    //    //sous paragrapohe 2 + sous titre 2 +photo 2
//    //sous titre2 
    if(!empty($_POST['subititle2'])){
        $addEdito->subtitle2= htmlspecialchars($_POST['subititle2']);
    }
   if(!empty($_POST['subsections2'])){
        $addEdito->subsections2= htmlspecialchars($_POST['subsections2']);
    }
      //picture2
        if (!empty($_FILES['picture2']['name'])) {
        //je recupere le fichier photos
        $dossier = '../black/';
        //je dertermine le chemin ou seras transferer ma photo
        $dossiersDb = 'black/';
//                je dertmine le chemin pour la base de donnée 
        $tmp_name = $_FILES['picture1']['tmp_name'];
//je met la photo dans un dossier temporraire
        $extensionFile = pathinfo($_FILES['picture1']['name']);
        //je recuperre l'extention
        $name =$titles .'_2'. '.' . $extensionFile['extension'];
//                je renome ma photo et je concatene avec l'extention
        $addEdito->picture2 = $dossiersDb . $name;
        move_uploaded_file($_FILES['picture2']['tmp_name'], $dossier . $name);
        //je fait la  migration de mon fichier temporraire vers le dossier envoyer 
        //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    }
      ////-----------------
    //    //sous paragrapohe 3 + sous titre 3 +photo 3
    //sous titre3 
    if(!empty($_POST['subititle3'])){
        $addEdito->subtitle3= htmlspecialchars($_POST['subititle3']);
    }
   if(!empty($_POST['subsections3'])){
        $addEdito->subsections3= htmlspecialchars($_POST['subsections3']);
    }
      //picture
        if (!empty($_FILES['picture3']['name'])) {
        //je recupere le fichier photos
        $dossier = '../black/';
        //je dertermine le chemin ou seras transferer ma photo
        $dossiersDb = 'black/';
//                je dertmine le chemin pour la base de donnée 
        $tmp_name = $_FILES['picture3']['tmp_name'];
//je met la photo dans un dossier temporraire
        $extensionFile = pathinfo($_FILES['picture3']['name']);
        //je recuperre l'extention
        $name =$titles .'_3'. '.' . $extensionFile['extension'];
//                je renome ma photo et je concatene avec l'extention
        $addEdito->picture3 = $dossiersDb . $name;
        move_uploaded_file($_FILES['picture3']['tmp_name'], $dossier . $name);
        //je fait la  migration de mon fichier temporraire vers le dossier envoyer 
        //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    }
   ///------------------------------------------------------
    if (!empty($_POST['idAuthor'])) {
        if (preg_match($regexId, $_POST['idAuthor'])) {
            $addEdito->author = htmlspecialchars($_POST['idAuthor']);
        }
    } else {
        $formError['author'] = 'Veuillez sélectionner l\'auteur de l\'édito !';
    }
    if (!empty($_POST['idCategoryEditot'])) {
        if (preg_match($regexId, $_POST['idCategoryEditot'])) {
            $addEdito->categoryEdito = htmlspecialchars($_POST['idCategoryEditot']);
        }
    } else {
        $formError['idCategoryEditot'] = 'Veuillez sélectionner l\'auteur de l\'article !';
    }
   
    if (count($formError) == 0) {
     var_dump($addEdito->addEdito());
        if ($addEdito->addEdito()) {
            $messaageSucess = 'votre éditot a bien été créer ';
        } else {
            $formError['echec'] = 'L\'enregistement de voitre éditot a échouer contacter l\'administrateur du site par mail ffmc02@outlook.fr avec le code erreur édito! ';
        }
    }
}
//Modifier un édito
if (isset($_POST['btnModifyEdito'])) {
    $modifyEdito = new editot();
    if (!empty($_POST['idEdito'])) {
        if (preg_match($regexId, $_POST['idEdito'])) {
            $modifyEdito->id = htmlspecialchars($_POST['idEdito']);
        }
    }
    //titre principal
    if (!empty($_POST['newTitle'])) {
        $modifyEdito->title = htmlspecialchars($_POST['newTitle']);
    } else {
        $formError['title'] = 'Merci de remplire le champs titre';
    }
     //sous titre 
    if(!empty($_POST['newSubititle'])){
        $modifyEdito->subtitle= htmlspecialchars($_POST['newSubititle']);
    }
    if (!empty($_POST['newEdito'])) {
        $modifyEdito->edito = htmlspecialchars($_POST['newEdito']);
    } else {
        $formError['edito'] = 'Merci de remplir le champs édito';
    }
        //sous paragrapohe 1 + sous titre 1 +photo 1
    //sous titre1 
    if(!empty($_POST['newSubititle1'])){
        $modifyEdito->subtitle1= htmlspecialchars($_POST['newSubititle1']);
    }
   if(!empty($_POST['newSubsections1'])){
        $modifyEdito->subsections1= htmlspecialchars($_POST['newSubsections1']);
    }
     //    //sous paragrapohe 2 + sous titre 2 +photo 2
//    //sous titre2 
    if(!empty($_POST['newSubititle2'])){
        $modifyEdito->subtitle2= htmlspecialchars($_POST['newSubititle2']);
    }
   if(!empty($_POST['newSubsections2'])){
        $modifyEdito->subsections2= htmlspecialchars($_POST['newSubsections2']);
    }
     //sous titre3 
    if(!empty($_POST['newSubititle3'])){
        $modifyEdito->subtitle3= htmlspecialchars($_POST['newSubititle3']);
    }
   if(!empty($_POST['subsections3'])){
        $modifyEdito->subsections3= htmlspecialchars($_POST['subsections3']);
    }
    if (!empty($_POST['newIdCategoryEditot'])) {
        if (preg_match($regexId, $_POST['newIdCategoryEditot'])) {
            $modifyEdito->categoryEdito = htmlspecialchars($_POST['newIdCategoryEditot']);
        }
    } else {
        $formError['idCategoryEditot'] = 'Veuillez sélectionner l\'auteur de l\'article !';
    }
   if (count($formError) == 0) {
        if ($modifyEdito->modifyEdito()) {
            $messaageSucess = 'votre éditot a bien été créer ';
        } else {
            $formError['echec'] = 'L\'enregistement de voitre éditot a échouer contacter l\'administrateur du site par mail ffmc02@outlook.fr avec le code erreur édito! ';
        }
    }
}

//Suppression de l'édito
if(isset($_POST['deleteEdito'])){
    $deleteEdito = new editot();
    if(!empty($_POST['idEdito'])){
        if (preg_match($regexId, $_POST['idEdito'])) {
          $deleteEdito->id = htmlspecialchars($_POST['idEdito']);
         if( $deleteEdito->deleteEdito()){
              $messaageSucess ='Votre édito a été supprimé avec succés';
         } else {
           $formError['echec'] = 'contacter le web master par mail ffmc02@outlook.fr avec le code Edito';
         }
        }
    }  
}
$listerEdito = new editot();
$listerEditos = $listerEdito->listerEdito();
$nbrEdito=$listerEdito->countEdito();
if (isset($_GET['pageChoice']) && $_GET['pageChoice'] <= $nbrEdito->nbrEdito && $_GET['pageChoice'] > 0) {    
    $pageChoice = ((htmlspecialchars($_GET['pageChoice'])-1)*3);
    // calcule qui permet d'afficher le premier User
   $listerEditos = $listerEdito->listerEdito($pageChoice); // affichage des pages en fonction du nombre d'id
}
else {
  $listerEditos = $listerEdito->listerEdito();
}
$listerCategoryEdito = new categoryEdito();
$listeEditotCategory = $listerCategoryEdito->listeCategoryEdito();
$listeAdmnin = new users();
$listeAdminAndModer = $listeAdmnin->listerAdminAndModé();

