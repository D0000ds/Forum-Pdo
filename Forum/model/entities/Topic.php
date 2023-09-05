<?php
    namespace Model\Entities;

    use App\Entity;

    final class Topic extends Entity{

        private $id;
        private $title;
        private $user_id;
        private $creationdate;
        private $closed;
        private $jaime;
        private $description;
        private $categorie_id;

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
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }

        /**
         * Get the value of user
         */ 
        public function getUser()
        {
                return $this->user_id;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setUser($user_id)
        {
                $this->user_id = $user_id;
                return $this;
        }

        /**
         * Get the value of jaime
         */ 
        public function getJaime()
        {
                return $this->jaime;
        }

        /**
         * Set the value of jaime
         *
         * @return  self
         */ 
        public function setJaime($jaime)
        {
                $this->jaime = $jaime;

                return $this;
        }

         /**
         * Get the value of description
         */ 
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        /**
         * Get the value of categorie
         */ 
        public function getCategorie()
        {
                return $this->categorie_id;
        }

        /**
         * Set the value of categorie
         *
         * @return  self
         */ 
        public function setCategorie($categorie_id)
        {
                $this->categorie_id = $categorie_id;

                return $this;
        }

        public function getCreationdate(){
            $formattedDate = $this->creationdate->format("d/m/Y, H:i:s");
            return $formattedDate;
        }

        public function setCreationdate($date){
            $this->creationdate = new \DateTime($date);
            return $this;
        }

        /**
         * Get the value of closed
         */ 
        public function getClosed()
        {
                return $this->closed;
        }

        /**
         * Set the value of closed
         *
         * @return  self
         */ 
        public function setClosed($closed)
        {
                $this->closed = $closed;

                return $this;
        }
    }
