<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\TopicManager;

    class TopicManager extends Manager{

        protected $className = "Model\Entities\Topic";
        protected $tableName = "topic";


        public function __construct(){
            parent::connect();
        }


        public function detailTopic($id)
        {
            $sql = "SELECT *
                FROM ".$this->tableName." a
                WHERE a.id_".$this->tableName." = :id
                ";

            return $this->getOneOrNullResult(
                DAO::select($sql, ['id' => $id], false), 
                $this->className
            );
        }

        public function allTopicsByCategorie($id){
            $sql = "SELECT *
                FROM ".$this->tableName." a
                WHERE a.categorie_id = ".$id."
                ";

            return $this->getMultipleResults(
                DAO::select($sql), 
                $this->className
                );
        }

        public function like($id){
            $sql = "UPDATE ".$this->tableName." 
            SET likes = likes + 1
            WHERE id_".$this->tableName." = :id;
            ";

            try{
                return DAO::update($sql, ['id' => $id]);
            }
            catch(\PDOException $e){
                echo $e->getMessage();
                die();
            }
        }

        public function allTopicsByUser($id){
            $sql = "SELECT *
                FROM ".$this->tableName." a
                WHERE a.user_id = ".$id."
                ";

            return $this->getMultipleResults(
                DAO::select($sql), 
                $this->className
                );
        }

        public function editTopic($id, $title, $description){
            $sql = "UPDATE ".$this->tableName." 
            SET title = '".$title."', description = '".$description."'
            WHERE id_topic = :id;";

            try{
                return DAO::update($sql, ['id' => $id]);
            }
            catch(\PDOException $e){
                echo $e->getMessage();
                die();
            }
        }
    }