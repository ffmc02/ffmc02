<?php

/**
 * je créée une classe
 */
class users {

    public $id = 0;
    public $pseudo = '';
    public $email = '';
    public $password = '';
    public $registerDate = '1970-01-01';
    public $id_numberGroupe = 0;
    public $cle;
    public $pdo;
    public $countId = 0;

    /**
     * je nome les atribue
     */

    /**
     * connection a la table
     */
//$bdd = new PDO('mysql:host=sql01.ouvaton.coop;dbname=08394_user', '08394_user', 'Fede022017-');
    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    /**
     * vérification si adresse email existe déjà
     * @return type
     */
//    verification de l'existance du mail
    public function testEmail() {
        $query = 'SELECT `id` AS `idUser`, '
                . 'COUNT(id) AS `countId`, '
                . '`pseudo`, '
                . '`cle` '
                . 'FROM `1402f_user` '
                . 'WHERE '
                . '`email`=:email ';
//on lie chaque marqueur a une valeur
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':email', $this->email, PDO::PARAM_STR);
        //execution de la requette préparer:
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    //verification de l'existance du pseudo
    public function checkAliasExists() {
        $query = 'SELECT COUNT(`id`) AS `pseudoDb` FROM `1402f_user` '
                . 'WHERE `pseudo` = :pseudo';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    /**
     * creation d'un usager
     * @return type
     */
    public function addUser() {
        $query = 'INSERT INTO `1402f_user` '
                . '(`pseudo`, `email`, `password`, `registerDate`, `cle`) '
                . 'VALUES '
                . '(:pseudo, :email, :password , CURDATE(), :cle)';
//on lie chaque marqueur a une valeur
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $queryResult->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryResult->bindvalue(':password', $this->password, PDO::PARAM_STR);
        $queryResult->bindvalue(':cle', $this->cle, PDO::PARAM_STR);
//execution de la requette préparer:
        return $queryResult->execute();
    }

    public function getProfilUserById() {
        $query = 'SELECT `id`, '
                . '`pseudo`,  '
                . '`email`, '
                . ' `registerDate`, '
                . '`id_1402f_numberGroupe` AS `id_numberGroupe` '
                . 'FROM `1402f_user` '
                . 'WHERE `id`= :id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    /**
     * affichage de la liste usager
     * @return type
     */
    public function getProfilUserByMail() {
        $query = 'SELECT `id`, '
                . '`pseudo`,  '
                . '`email`, '
                . ' `registerDate`, '
                . '`id_1402f_numberGroupe` AS `id_numberGroupe` '
                . 'FROM `1402f_user` '
                . 'WHERE `email`= :email';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':email', $this->id, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function readUser($start = 0) {
        $query = 'SELECT `id`, '
                . '`pseudo`,  '
                . '`email`, '
                . '  DATE_FORMAT(registerDate,\'%d/%m/%Y\') AS `registerDate`, '
                . '`id_1402f_numberGroupe` '
                . 'FROM `1402f_user` '
                . 'order by `id_1402f_numberGroupe` DESC '
                . 'LIMIT :start, 5'
        ;
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':start', $start, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * modification du droit d'accée
     * @return type
     */
    public function modifyAccess() {
        $query = 'UPDATE `1402f_user` SET '
                . '`id_1402f_numberGroupe` = :id_numberGroupe '
                . 'WHERE `1402f_user`.`id`= :id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->bindValue(':id_numberGroupe', $this->id_numberGroupe, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function modifyProfilUser() {
        $query = ' UPDATE `1402f_user` SET `pseudo` = :pseudo, `email`=:email  WHERE `1402f_user`.`id` = :id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $queryResult->bindValue(':email', $this->email, PDO::PARAM_STR);
        return $queryResult->execute();
    }

    /**
     * connexion de l'user
     * @return type
     */
    public function modifyPassword() {
        $query = ' UPDATE `1402f_user` SET `password`= :password, cle=:cle WHERE `1402f_user`.`email`=:email ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindvalue(':email', $this->email, PDO::PARAM_STR);
        $queryResult->bindvalue(':password', $this->password, PDO::PARAM_STR);
        $queryResult->bindvalue(':cle', $this->cle, PDO::PARAM_STR);
        return $queryResult->execute();
    }

//verification de l'existance du mail
    public function mailExist() {
        $query = 'SELECT `emil` AS `email`, '
                . 'COUNT(id) AS `countId`, '
                . '`cle` '
                . 'FROM `1402f_user` '
                . 'WHERE '
                . '`email`=:email ';
//on lie chaque marqueur a une valeur
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':email', $this->email, PDO::PARAM_STR);
        //execution de la requette préparer:
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function connexionUser() {
        $query = 'SELECT `id` AS idUser, '
                . 'COUNT(`id`) AS `count`, '
                . '`id_1402f_numberGroupe` AS `access`, '
                . '`pseudo` AS `pseudoUser`, '
                . '`email` AS `loginMail`, '
                . '`password` AS password '
                . 'FROM `1402f_user` '
                . 'WHERE `email`= :email';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    //selction pour afficher le profils de l'utilisateur 
    /**
     * effecer un usager
     * @return type
     */
    public function deleteUser() {
        $result = $this->pdo->db->prepare('DELETE FROM `1402f_user` WHERE `id`= :id');
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * effacer l'utilisateur 
     */
    public function countUsersPages() {
        $query = 'SELECT CEIL(COUNT(`id`)/5) AS `numberPages` FROM `1402f_user`';
        $queryResult = $this->pdo->db->query($query);
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function verifEmailAndCle() {
        $query = 'SELECT COUNT (`id`) AS id'
                . 'FROM `1402f_user`'
                . 'WHERE `email`=:email AND `cle`= :cle';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryResult->bindValue(':cle', $this->cle, PDO::PARAM_STR);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function listerAdminAndModé() {
        $query = 'SELECT `id`, `pseudo` FROM `1402f_user` WHERE `id_1402f_numberGroupe`= 4 OR  `id_1402f_numberGroupe`=6  ';
        $req = $this->pdo->db->query($query);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function __destruct() {
        $this->pdo->db = NULL;
    }

}
