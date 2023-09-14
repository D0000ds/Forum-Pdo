<?php
    namespace App;

    class Session{

        private static $categories = ['error', 'success'];

        public static function addFlash($categ, $msg){
            $_SESSION[$categ] = $msg;
        }

        public static function getFlash($categ){
            
            if(isset($_SESSION[$categ])){
                $msg = $_SESSION[$categ];  
                unset($_SESSION[$categ]);
            }
            else $msg = "";
            
            return $msg;
        }

        public static function setUser($user){
            $_SESSION["user"] = $user;
        }

        public static function getUser(){
            return (isset($_SESSION['user'])) ? $_SESSION['user'] : false;
        }

        public static function isAdmin(){
            if(self::getUser() && self::getUser()->getRole() == "admin"){
                return true;
            }
            return false;
        }

    }