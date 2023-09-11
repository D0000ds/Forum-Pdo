<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\LoginManager;
    
    class SecurityController extends AbstractController implements ControllerInterface{

        public function login(){


            return [
                "view" => VIEW_DIR."security/login.php",
            ];
        }

        public function register(){

            return [
                "view" => VIEW_DIR."security/register.php",
            ];

        }
    }