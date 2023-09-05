<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\MessageManager;

    class MessageManager extends Manager{

        protected $className = "Model\Entities\Message";
        protected $tableName = "messages";


        public function __construct(){
            parent::connect();
        }

        public function AllMsg($id)
        {
            $sql = "SELECT *
                FROM ".$this->tableName." a
                WHERE a.topic_id = ".$id."
                ";

            return $this->getMultipleResults(
                DAO::select($sql), 
                $this->className
                );
        }

    }