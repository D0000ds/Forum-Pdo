<?php
namespace Model\Entities;

    use App\Entity;

    final class Categorie extends Entity{

        private $id;
        private $libelle;

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
         * Get the value of libelle
         */ 
        public function getLibelle()
        {
                return $this->libelle;
        }

        /**
         * Set the value of libelle
         *
         * @return  self
         */ 
        public function setlibelle($libelle)
        {
                $this->libelle= $libelle;

                return $this;
        }

        public function __toString(){
                return $this->libelle;
        }
    }