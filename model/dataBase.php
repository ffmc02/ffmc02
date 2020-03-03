<?php



/**
 * Description of dataBase
 *
 * @author Jonard G
 */
class dataBase {
    
    private static $instance= null;
    public $db = NULL;
    public function __construct() {
        try {
            //ordi formation
            $this->db = new PDO('mysql:host=sql01.ouvaton.coop;dbname=08394_user;charset=utf8', '08394_user', 'Fede140217-');
        }
        // Sinon on affiche un message d'erreur
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public static function getIntance() {
        if(is_null(  self::$instance)){
          self::$instance= new dataBase();  
        }
        return   self::$instance;
    }

}
