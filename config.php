<?php
session_start();
//define('DB_HOST', 'sql01.ouvaton.coop');
//define('DB_NAME', '08394_user');
//define('DB_LOGIN', '08394_user');
//define('DB_PASSWORD', 'Fede140217-');

include_once 'model/dataBase.php';
include_once 'model/blackDot.php';
include_once 'model/picture.php';
include_once 'model/usermodel.php';
include_once 'model/roadExtraUrban.php';
include_once 'model/street.php';
include_once 'model/positionDanger.php';
include_once 'model/categorydanger.php';
include_once 'model/extraUrban.php';
include_once 'model/urban.php';
include_once 'model/treatment.php';
include_once 'model/usermodel.php';
include_once 'model/other.php';
include_once 'doria/model/events.php';
include_once 'doria/model/inThePress.php';
include_once 'doria/model/eventCategory.php';
include_once 'doria/model/articles.php';
include_once 'doria/model/categoryArticle.php';
include_once 'doria/model/editot.php';
include_once 'doria/model/categoryEdito.php';
include_once 'doria/model/partner.php';