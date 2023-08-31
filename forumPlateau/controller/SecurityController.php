<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\LoginManager;
    
    class SecurityController extends AbstractController implements ControllerInterface{

        public function login(){

            $loginManager = new LoginManager();

            if(isset($_POST['login'])){
                if(!empty($_POST['username']) && !empty($_POST['password'])){
                    $pseudo = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $mdp = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    if($pseudo && $mdp){
                        $loginManager->connexion($pseudo);
                        $user = $loginManager->fetch();
                    }
                } else {
                    echo "Veuillez compléter tous les champs";
                }
            }

            return [
                "view" => VIEW_DIR."security/login.php",
            ];
        }
    }
