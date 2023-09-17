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

        public function lastTopics(){
          

           $topicManager = new TopicManager();

            return [
                "view" => VIEW_DIR."forum/listLastedTopics.php",
                "data" => [
                    "topics" => $topicManager->findAll(["creationdate", "DESC"])
                ]
            ];
        
        }

        public function lastMessages(){
            
            $messageManager = new MessageManager();

            return [
                "view" => VIEW_DIR."forum/listLastedMassages.php",
                "data" => [
                    "messages" => $messageManager->findAll(["datePublication", "DESC"])
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
                   "nbTopic" => $categoriecManager->nbTopic()
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
                    "messages" => $messagesManager->AllMsg($id),
                    "likes" => $topicManager->like($id),
                    "likeM" =>  $messagesManager->likes($id)
                ]
            ];
        }

        public function detailUser($id){

            $userManager = new UserManager();
            $topicManager = new TopicManager();
            $messageManager = new MessageManager();

            return [
                "view" => VIEW_DIR."forum/detailUser.php",
                "data" => [
                    "user" => $userManager->detailUser($id),
                    "topics" => $topicManager->allTopicsByUser($id),
                    "messages" => $messageManager->AllMsgByUser($id),
                    "nbMessage" => $userManager->nbMsgUser($id),
                    "nbTopic" => $userManager->nbTopicUser($id)
                ]
            ];
        }

        public function deleteTopic($id){
            $topicManager = new TopicManager();
            $messageManager = new MessageManager();


            return [
                "view" => VIEW_DIR."home.php",
                "deleteTopic " => $topicManager->delete($id),
                "deleteMessage" => $messageManager->deleteMsg($id)
            ];
        }

        public function addMessage($id){
            $topicManager = new TopicManager();
            $messageManager = new MessageManager();

            return [
                "view" => VIEW_DIR."forum/addMessage.php",
                "data" => [
                    "topic" => $topicManager->detailTopic($id)
                ]
            ];
        }

        public function postMessage($id){
            $messageManager = new MessageManager();

            $message = filter_input(INPUT_POST, "textMessage", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $dateNow = date('Y-m-d h:i:s', time());
            $session = new Session();
         
            $data = ['texte' => $message, 'datePublication' => $dateNow, 'likes' => 0, 'topic_id' => $id, 'user_id' => $session->getUser()->getId()];
            $messageManager->add($data);

            $this->redirectTo("Forum", "index.php?ctrl=forum&action=detailTopic&id=".$id); exit;
        }

        public function editTopic($id){
            $topicManager = new TopicManager();

            return [
                "view" => VIEW_DIR."forum/editTopic.php",
                "data" => [
                    "topic" => $topicManager->detailTopic($id)
                ]
            ];
        }

        public function postEdit($id){
            $topicManager = new TopicManager();

            $title = filter_input(INPUT_POST, "titleEdit", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, "descEdit", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


            $topicManager->editTopic($id, $title, $description);
            $this->redirectTo("Forum", "index.php?ctrl=forum&action=detailTopic&id=".$id); exit;
        }


        public function deleteMessage($id){
            $messageManager = new MessageManager();


            return [
                "view" => VIEW_DIR."home.php",
                "deleteMessage" => $messageManager->delete($id)
            ];
        }

        public function editMessage($id){
            $messageManager = new MessageManager();

            return [
                "view" => VIEW_DIR."forum/editMessage.php",
                "data" => [
                    "message" => $messageManager->findOneById($id)
                ]
            ];
        }

        public function messageEdit($id){
            $messageManager = new MessageManager();

            $message = filter_input(INPUT_POST, "msgEdit", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $messageManager->edit($id, $message);
            $this->redirectTo("Forum", "index.php?ctrl=forum&action=listCategorie"); exit;

        }

        public function deleteCategorie($id){
            $categorieManager = new CategorieManager();

            return [
                "view" => VIEW_DIR."home.php",
                "deleteMessage" => $categorieManager->delete($id),
            ];
        }

        public function editCategorie($id){
            $categorieManager = new CategorieManager();

            return [
                "view" => VIEW_DIR."forum/editCategorie.php",
                "data" => [
                    "categorie" => $categorieManager->findOneById($id)
                ]
            ];
        }

        public function postCategorie($id){
            $categorieManager = new CategorieManager();

            $libelle = filter_input(INPUT_POST, "libelleEdit", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $desc = filter_input(INPUT_POST, "descEdit", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $file = filter_input(INPUT_POST, "pictureEdit", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $categorieManager->edit($id, $libelle, $file,$desc);

            $this->redirectTo("Forum", "index.php?ctrl=forum&action=listCategorie"); exit;
        }

        public function addTopic($id){
            $categorieManager = new CategorieManager();

            return [
                "view" => VIEW_DIR."forum/addTopic.php",
                "data" => [
                    "categorie" => $categorieManager->findOneById($id)
                ]
            ];
        }

        public function postTopic($id){
            $topicManager = new TopicManager();

            $desc = filter_input(INPUT_POST, "descTopic", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $title = filter_input(INPUT_POST, "titleTopic", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $dateNow = date('Y-m-d h:i:s', time());
            $session = new Session();

            $data = ['title' => $title, 'creationdate' => $dateNow, 'likes' => 0, 'categorie_id' => $id, 'user_id' => $session->getUser()->getId(), 'description' => $desc];
            $topicManager->add($data);

            $this->redirectTo("Forum", "index.php?ctrl=forum&action=lastTopics"); exit;
        }

        public function addCategorie(){

            return [
                "view" => VIEW_DIR."forum/addCategorie.php",
            ];
        }

        public function postAddCategorie(){
            $categorieManager = new CategorieManager();

            $libelle = filter_input(INPUT_POST, "libelleCate", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $desc = filter_input(INPUT_POST, "descCate", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $file = filter_input(INPUT_POST, "pictureCate", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = ['libelle' => $libelle, 'picture' => $file, 'description' => $desc];
            $categorieManager->add($data);
            

            $this->redirectTo("Forum", "index.php?ctrl=forum&action=listCategorie"); exit;
        }

        public function deleteUser($id){
            $userManager = new UserManager();
            
            
            session_destroy();
            return [
                "view" => VIEW_DIR."home.php",
                "deleteMessage" => $userManager->deleteUser($id),
            ];
        }

        public function editUser($id){
            $userManager = new UserManager();

            return [
                "view" => VIEW_DIR."forum/editUser.php",
                "data" => [
                    "user" => $userManager->findOneById($id)
                ]
            ];
        }

        public function PostUser($id){
            $userManager = new UserManager();

            $pseudo = filter_input(INPUT_POST, "pseudoEdit", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "emailEdit", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $picture = filter_input(INPUT_POST, "pictureUserEdit", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $userManager->editUser($id, $pseudo, $email, $picture);


            $this->redirectTo("Forum", "index.php?ctrl=forum&action=detailUser&id=".$id); exit;
        }

        public function userPage(){
            return [
                "view" => VIEW_DIR."forum/userPage.php",
            ];
        }

        public function logout(){
            session_destroy();

            $this->redirectTo("Forum", "index.php?ctrl=home&action=index"); exit;
        }
    }
