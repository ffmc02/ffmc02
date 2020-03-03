<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of street
 *
 * @author Jonard G
 */
class street {
   
    public $id = 1;
    public $typeStreet = '';
    public $pdo;
    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function listerStreet(){
           $query = 'SELECT `id`, `typeStreet` FROM `1402f_street`';
        $req =  $this->pdo->db->query($query);
        $result = $req->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
