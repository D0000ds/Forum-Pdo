<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\LoginManager;

    class LoginManager extends Manager{

        protected $className = "Model\Entities\User";
        protected $tableName = "user";


        public function __construct(){
            parent::connect();
        }

        public function connexion($username){
            $sql = "SELECT *
                FROM ".$this->tableName." a
                WHERE a.pseudo = ".$username;

            return $this->getOneOrNullResult(
                DAO::select($sql, false), 
                $this->className
            );
        }

    }