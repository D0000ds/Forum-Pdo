<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\CategorieManager;

    class CategorieManager extends Manager{

        protected $className = "Model\Entities\Categorie";
        protected $tableName = "categorie";


        public function __construct(){
            parent::connect();
        }


        public function edit($id, $libelle, $file,$desc){
            $sql = "UPDATE ".$this->tableName." 
            SET libelle = '".$libelle."', picture = '".$file."', description = '".$desc."'
            WHERE id_categorie = :id;";

            try{
                return DAO::update($sql, ['id' => $id]);
            }
            catch(\PDOException $e){
                echo $e->getMessage();
                die();
            }
        }
    }