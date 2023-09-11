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

        public function likes($id){
            $sql = "UPDATE ".$this->tableName." 
            SET likes = likes + 1
            WHERE topic_id = :id;
            ";

            try{
                return DAO::update($sql, ['id' => $id]);
            }
            catch(\PDOException $e){
                echo $e->getMessage();
                die();
            }
        }

        public function AllMsgByUser($id)
        {
            $sql = "SELECT *
                FROM ".$this->tableName." a
                WHERE a.user_id = ".$id."
                ";

            return $this->getMultipleResults(
                DAO::select($sql), 
                $this->className
                );
        }

    }