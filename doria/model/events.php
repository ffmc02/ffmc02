<?php

/**
 * Description of events
 *
 * @author gaeta
 */
class events {

    public $dateEvent = '1970-01-01 00h00';
    public $pdo;
    public $picture = '';
    public $title = '';
    public $description = '';
    public $location = '';
    public $author = '';
    public $id = 0;
    public $eventCategory = 0;

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

//methode d'ajout d'événement  

    public function addEvents() {
        $query = 'INSERT INTO `1402f_events`'
                . ' ( `dateEvent`, `picture`, `title`, `description`, `location`, `author`, `eventCategory`) '
                . 'VALUES ( :dateEvent, :picture, :title, :description, :location, :author, :eventCategory )';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':dateEvent', $this->dateEvent, PDO::PARAM_STR);
        $queryResult->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $queryResult->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':description', $this->description, PDO::PARAM_STR);
        $queryResult->bindValue(':location', $this->location, PDO::PARAM_STR);
        $queryResult->bindValue(':author', $this->author, PDO::PARAM_INT);
        $queryResult->bindValue(':eventCategory', $this->eventCategory, PDO::PARAM_INT);
        return $queryResult->execute();
    }

//liste des reunion afficher au fure et a amesure du temps 
    public function listeEventsMeeting() {
        $query = 'SELECT `1402f_events`.`id`, '
                . 'DATE_FORMAT(`dateEvent`, \'%d/%m/%Y à %H:%i \')AS `dateEvent`, '
                . '`1402f_events`.`picture`, '
                . '`1402f_events`.`title`, '
                . '`1402f_events`.`description`, '
                . '`1402f_events`.`location`, '
                . '`1402f_events`.`eventCategory`, '
                . '`1402f_eventCategory`.`nameCategoryEvents` '
                . 'FROM `1402f_events` '
                . 'JOIN `1402f_eventCategory` '
                . 'ON `1402f_eventCategory`.`id`= `1402f_events`.`eventCategory` '
                . 'WHERE   dateEvent>=now() limit 1';
        $req = $this->pdo->db->query($query);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    //liste des différentévénement afficher jusqu'a la date et l'heurs  
    public function listeEvents() {
        $query = 'SELECT `1402f_events`.`id`, '
                . 'DATE_FORMAT(`dateEvent`, \'%d/%m/%Y à %H:%i \')AS `dateEvent`, '
                . '`1402f_events`.`picture`, '
                . '`1402f_events`.`title`, '
                . '`1402f_events`.`description`, '
                . '`1402f_events`.`location`, '
                . '`1402f_events`.`eventCategory`, '
                . '`1402f_eventCategory`.`nameCategoryEvents` '
                . 'FROM `1402f_events` '
                . 'JOIN `1402f_eventCategory` '
                . 'ON `1402f_eventCategory`.`id`= `1402f_events`.`eventCategory` '
                . 'WHERE   dateEvent>=now()  limit 3 ';
        $req = $this->pdo->db->query($query);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
   public function listOfPastEvent() {
        $query = 'SELECT `1402f_events`.`id`, '
                . 'DATE_FORMAT(`dateEvent`, \'%d/%m/%Y à %H:%i \')AS `dateEvent`, '
                . '`1402f_events`.`picture`, '
                . '`1402f_events`.`title`, '
                . '`1402f_events`.`description`, '
                . '`1402f_events`.`location`, '
                . '`1402f_events`.`eventCategory`, '
                . '`1402f_eventCategory`.`nameCategoryEvents` '
                . 'FROM `1402f_events` '
                . 'JOIN `1402f_eventCategory` '
                . 'ON `1402f_eventCategory`.`id`= `1402f_events`.`eventCategory` '
                . 'WHERE   dateEvent<=now()  '
                . 'order by `dateEvent` ASC ';
        $req = $this->pdo->db->query($query);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
    public function listeEventsModify() {
        $query = 'SELECT `id`, '
                . 'DATE_FORMAT(`dateEvent`, \'%d/%m/%Y à %H:%i \')AS `dateEvent`, '
                . '`picture`, '
                . '`title`, '
                . '`description`, '
                . '`location`, '
                . '`eventCategory` '
                . 'FROM `1402f_events` ';
        $req = $this->pdo->db->query($query);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    //modifcation d'un événement
    public function modifyEvent() {
        $query = 'UPDATE `1402f_events` '
                . 'SET  `dateEvent` = :dateEvent,'
                . '`picture` = :picture, '
                . '`title` = :title, '
                . '`description` = :description, '
                . '`location`= :location, '
                . '`eventCategory` = :eventCategory '
                . 'WHERE `1402f_events`.`id` = :id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':dateEvent', $this->dateEvent, PDO::PARAM_STR);
        $queryResult->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $queryResult->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':description', $this->description, PDO::PARAM_STR);
        $queryResult->bindValue(':location', $this->location, PDO::PARAM_STR);
        $queryResult->bindValue(':eventCategory', $this->eventCategory, PDO::PARAM_INT);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

//methode de suppression de l'événements

    public function deleteEvent() {
        $result = $this->pdo->db->prepare('DELETE FROM `1402f_events` WHERE `id`= :id');
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $result->execute();
    }

}
