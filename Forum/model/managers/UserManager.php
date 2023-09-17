<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\UserManager;

    class UserManager extends Manager{

        protected $className = "Model\Entities\User";
        protected $tableName = "user";


        public function __construct(){
            parent::connect();
        }

        public function detailUser($id)
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
        

        public function nbMsgUser($id)
        {
            $sql = "SELECT a.id_user, a.pseudo, a.role, a.picture, a.DateInscription, COUNT(*) as nbMessage
                FROM ".$this->tableName." a
                INNER JOIN messages m
                ON m.user_id = a.id_user
                WHERE a.id_".$this->tableName." = :id
                GROUP BY a.id_user
                ";

            return $this->getOneOrNullResult(
                DAO::select($sql, ['id' => $id], false), 
                $this->className
            );
        }

        public function nbTopicUser($id)
        {
            $sql = "SELECT a.id_user, a.pseudo, a.role, a.picture, a.DateInscription, COUNT(*) as nbTopic
                FROM ".$this->tableName." a
                INNER JOIN topic t
                ON t.user_id = a.id_user
                WHERE a.id_".$this->tableName." = :id
                GROUP BY a.id_user
                ";

            return $this->getOneOrNullResult(
                DAO::select($sql, ['id' => $id], false), 
                $this->className
            );
        }

        public function verifPseudo($pseudo){
            $sql = "SELECT * 
            FROM ".$this->tableName." a
            WHERE pseudo = :pseudo";

            return $this->getOneOrNullResult(
                DAO::select($sql, ['pseudo' => $pseudo], false), 
                $this->className
            );
        }

        public function deleteUser($id){
            $sql = "UPDATE ".$this->tableName." 
            SET pseudo = 'delete user', password = 'none', email = 'none', picture = 'remove-user.png', role = 'delete'
            WHERE id_user = :id;";

            try{
                return DAO::update($sql, ['id' => $id]);
            }
            catch(\PDOException $e){
                echo $e->getMessage();
                die();
            }
        }

        public function editUser($id, $pseudo, $email, $picture){
            $sql = "UPDATE ".$this->tableName." 
            SET pseudo = '".$pseudo."', email = '".$email."', picture = '".$picture."'
            WHERE id_user = :id;";

            try{
                return DAO::update($sql, ['id' => $id]);
            }
            catch(\PDOException $e){
                echo $e->getMessage();
                die();
            }
        }
    }