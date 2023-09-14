<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\UserManager;
    
    class SecurityController extends AbstractController implements ControllerInterface{

        public function login(){
            $userManager = new UserManager();

            $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($pseudo && $password){
                $verif = $userManager->verifPseudo($pseudo);
                if($verif){
                    $passwordHash = $verif->getPassword();

                    if(password_verify($password, $passwordHash)){
                        $session = new Session();
                        $session->setUser($verif);
                        $this->redirectTo("Forum", "index.php?ctrl=home&action=index"); exit;
                    } else {
                        ?><span class="message-verif">Pseudo ou Mot de passe incorrect</span><?php
                    }
                    
                } else {
                    ?><span class="message-verif">Pseudo ou Mot de passe incorrect</span><?php
                }
            }

            return [
                "view" => VIEW_DIR."security/login.php",
            ];
        }

        public function register(){
            $userManager = new UserManager();

            $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $picture = filter_input(INPUT_POST, "picture", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $dateNow = date('Y-m-d h:i:s', time());

            if($pseudo && $email && $password && $picture){

                if($userManager->verifPseudo($pseudo)){
                    ?><span class="message-verif">Pseudo déja utilisé</span><?php
                } else {
                    if(strlen($password) >= 8){

                        $data = ['pseudo' => $pseudo, 'password' => password_hash($password, PASSWORD_DEFAULT), 'DateInscription' => $dateNow, 'role' => 'verifier', 'email' => $email, "picture" => $picture];
                        $userManager->add($data);
                        $this->redirectTo("Forum", "index.php?ctrl=security&action=login"); exit;
                    } else {
                        ?><span class="message-verif">Règles du mot de passe non respecté</span><?php
                    }
                }
            }

            return [
                "view" => VIEW_DIR."security/register.php",
            ];

        }
    }