<?php

/**
 * Description of picture
 *
 * @author Jonard G
 */
class picture {

    public $pdo;
    public $PictureName = '';
    public $idBlackDot=0;

    public function __construct() {

        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function addPicture() {
        $query = 'INSERT INTO `1402f_picture` '
                . '(`PictureName`, `id_1402f_blackdot`) '
                . 'VALUES(:PictureName, :idBlackDot)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':PictureName', $this->PictureName, PDO::PARAM_STR);
        $queryResult->bindValue(':idBlackDot', $this->idBlackDot, PDO::PARAM_INT);
        return $queryResult->execute();
    }

}
