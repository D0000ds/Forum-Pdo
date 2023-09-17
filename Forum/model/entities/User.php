<?php
    namespace Model\Entities;

    use App\Entity;

    final class User extends Entity{

        private $id;
        private $pseudo;
        private $password;
        private $DateInscription;
        private $role;
        private $email;
        private $picture;
        private $nbTopic;
        private $nbMessage;

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
         * Get the value of pseudo
         */ 
        public function getPseudo()
        {
                return $this->pseudo;
        }

        /**
         * Set the value of pseudo
         *
         * @return  self
         */ 
        public function setPseudo($pseudo)
        {
                $this->pseudo = $pseudo;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of mot_de_passe
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;
                return $this;
        }

        /**
         * Get the value of DateInscription
         */ 
        public function getDateInscription()
        {       $DateInscriptionFormat = $this->DateInscription->format("d/m/Y, H:i:s");
                return $DateInscriptionFormat;
        }

        /**
         * Set the value of DateInscription
         *
         * @return  self
         */ 
        public function setDateInscription($date)
        {
                $this->DateInscription = new \DateTime($date);
                return $this;
        }

         /**
         * Get the value of role
         */ 
        public function getRole()
        {
                return $this->role;
        }

        /**
         * Set the value of role
         *
         * @return  self
         */ 
        public function setRole($role)
        {
                $this->role = $role;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of picture
         */ 
        public function getPicture()
        {
                return "./public/img/".$this->picture;
        }

        /**
         * Set the value of picture
         *
         * @return  self
         */ 
        public function setPicture($picture)
        {
                $this->picture = $picture;

                return "./public/img/".$this;
        }


        /**
         * Get the value of nbTopic
         */ 
        public function getNbTopic()
        {
                return $this->nbTopic;
        }

        /**
         * Set the value of nbTopic
         *
         * @return  self
         */ 
        public function setNbTopic($nbTopic)
        {
                $this->nbTopic = $nbTopic;

                return $this;
        }

        /**
         * Get the value of nbMessage
         */ 
        public function getNbMessage()
        {
                return $this->nbMessage;
        }

        /**
         * Set the value of nbMessage
         *
         * @return  self
         */ 
        public function setNbMessage($nbMessage)
        {
                $this->nbMessage = $nbMessage;

                return $this;
        }

        public function __toString(){
            return $this->getPseudo();
        }
    }