<?php
$title='La presse parle de nous (Admin)';
ini_set('display_errors', 'on');
error_reporting(E_ALL);

if(isset($_POST['addPressArticle'])){
    $addPressArticle= new inThePress();
    if(!empty($_POST['tileEvents'])){
        $addPressArticle->titleEvents = htmlspecialchars($_POST['tileEvents']);
    }
    if(!empty($_POST['Evenents'])){
        $addPressArticle->Evenents= htmlspecialchars($_POST['Evenents']);        
    }
    if(!empty($_POST['eventDate'])){
        $addPressArticle->eventDate= htmlspecialchars($_POST['eventDate']);
    }
    if(!empty($_POST['nameExternalSite'])){
        $addPressArticle->nameExternalSite= htmlspecialchars($_POST['nameExternalSite']);
    }
    if(!empty($_POST['externalSiteLinks'])){
        $addPressArticle->externalSiteLinks= $_POST['externalSiteLinks'];
    }
    if(!empty($_POST['nameOfTheMedia'])){
        $addPressArticle->nameOfTheMedia= htmlspecialchars($_POST['nameOfTheMedia']);
    }
    if(!empty($_POST['nameExternalSite1'])){
        $addPressArticle->nameExternalSite1= htmlspecialchars($_POST['nameExternalSite1']);
    }
    if(!empty($_POST['externalSiteLinks1'])){
        $addPressArticle->externalSiteLinks1= $_POST['externalSiteLinks1'];
    }
    if(!empty($_POST['nameOfTheMedia1'])){
        $addPressArticle->nameOfTheMedia1= htmlspecialchars($_POST['nameOfTheMedia1']);
    }
    if(!empty($_POST['nameExternalSite2'])){
        $addPressArticle->nameExternalSite2= htmlspecialchars($_POST['nameExternalSite2']);
    }
    if(!empty($_POST['externalSiteLinks2'])){
        $addPressArticle->externalSiteLinks2= htmlspecialchars($_POST['externalSiteLinks2']);
    }
    if(!empty($_POST['nameOfTheMedia2'])){
        $addPressArticle->nameOfTheMedia2= htmlspecialchars($_POST['nameOfTheMedia2']);
    }
    if(!empty($_POST['nameExternalSite3'])){
        $addPressArticle->nameExternalSite3= htmlspecialchars($_POST['nameExternalSite3']);
    }
    if(!empty($_POST['externalSiteLinks3'])){
        $addPressArticle->externalSiteLinks3= htmlspecialchars($_POST['externalSiteLinks3']);
    }
    if(!empty($_POST['nameOfTheMedia3'])){
        $addPressArticle->nameOfTheMedia3= htmlspecialchars($_POST['nameOfTheMedia3']);
    }
    if(!empty($_POST['nameExternalSite4'])){
        $addPressArticle->nameExternalSite4= htmlspecialchars($_POST['nameExternalSite4']);
    }
    if(!empty($_POST['externalSiteLinks4'])){
        $addPressArticle->externalSiteLinks4= htmlspecialchars($_POST['externalSiteLinks4']);
    }
    if(!empty($_POST['nameOfTheMedia4'])){
        $addPressArticle->nameOfTheMedia4= htmlspecialchars($_POST['nameOfTheMedia4']);
    }
    if(!empty($_POST['nameExternalSite5'])){
        $addPressArticle->nameExternalSite5= htmlspecialchars($_POST['nameExternalSite5']);
    }
    if(!empty($_POST['externalSiteLinks5'])){
        $addPressArticle->externalSiteLinks5= htmlspecialchars($_POST['externalSiteLinks5']);
    }
    if(!empty($_POST['nameOfTheMedia5'])){
        $addPressArticle->nameOfTheMedia5= htmlspecialchars($_POST['nameOfTheMedia5']);
    }
    if($addPressArticle->addPressArticle()){
        $succes='Les liens des articles de presse ont bien étaient ajoutées';
    } else {
        $Erroror='echéc de l\'ajout contacter le web master via le mail ffmc02@outlook.fr avec le code erreur PressArticle';
    }
}
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