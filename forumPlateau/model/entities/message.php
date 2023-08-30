<?php
namespace Model\Entities;

    use App\Entity;

    final class Message extends Entity{

        private $id;
        private $texte;
        private $datePublication;
        private $topic_id;
        private $user_id;

        public function __construct($data){         
            $this->hydrate($data);        
        }
 
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of Texte
         */ 
        public function getTexte()
        {
                return $this->texte;
        }

        /**
         * Set the value of Texte
         *
         * @return  self
         */ 
        public function setTexte($texte)
        {
                $this->texte= $texte;

                return $this;
        }
        public function getDatePublication(){
            $datePublicationFormat = $this->datePublication->format("d/m/Y, H:i:s");
            return $datePublicationFormat;
        }

        public function setDatePublication($date){
            $this->datePublication = new \DateTime($date);
            return $this;
        }

        public function getTopic()
        {
                return $this->topic_id;
        }

        /**
         * Set the value of sujet_id
         *
         * @return  self
         */ 
        public function setTopic($topic_id)
        {
                $this->topic_id = $topic_id;

                return $this;
        }

        public function getUser()
        {
                return $this->user_id;
        }

        /**
         * Set the value of user_id
         *
         * @return  self
         */ 
        public function setUser($user_id)
        {
                $this->user_id = $user_id;

                return $this;
        }
        public function __toString(){
                return "p";
        }
    }