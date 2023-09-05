<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\PostManager;
    use Model\Managers\CategorieManager;
    use Model\Managers\UserManager;
    use Model\Managers\MessageManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
          

           $topicManager = new TopicManager();

            return [
                "view" => VIEW_DIR."forum/listLastedTopics.php",
                "data" => [
                    "topics" => $topicManager->findAll(["creationdate", "DESC"])
                ]
            ];
        
        }

        public function listCategorie()
        {
            
           $categoriecManager = new CategorieManager();

           return [
               "view" => VIEW_DIR."forum/listCategorie.php",
               "data" => [
                   "categories" => $categoriecManager->findAll(["libelle", "ASC"]),
               ]
           ];
        }

        public function listTopics($id)
        {
            
            $topicManager = new TopicManager();
            $categoriecManager = new CategorieManager();

           return [
               "view" => VIEW_DIR."forum/listTopic.php",
               "data" => [
                    "topics" => $topicManager->allTopicsByCategorie($id),
                    "categorie" => $categoriecManager->findOneById($id)
            ]
           ];
        }
        
        public function detailTopic($id){

            $topicManager = new TopicManager();
            $messagesManager = new MessageManager();

            return [
                "view" => VIEW_DIR."forum/detailTopic.php",
                "data" => [
                    "topic" => $topicManager->detailTopic($id),
                    "messages" => $messagesManager->AllMsg($id)
                ]
            ];
        }

        public function detailUser($id){

            $userManager = new UserManager();

            return [
                "view" => VIEW_DIR."forum/detailUser.php",
                "data" => [
                    "user" => $userManager->detailUser($id)
                ]
            ];
        }
    }
