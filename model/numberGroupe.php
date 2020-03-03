<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of numberGroupe
 *
 * @author gaeta
 */
class numberGroupe {
  public $pdo;
  public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }
 public function listerAccessSite() {

        $query = 'SELECT `id`, `groupeType` '
                . 'FROM '
                . '`1402f_numbergroupe`';
        $req = $this->pdo->db->query($query);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
}
