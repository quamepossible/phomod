<?php

    class Controller extends model{

        // private $userMail;
        // private $userPass;

        // public function __construct($email, $pwd){
        //     $this->userMail = $email;
        //     $this->userPass = $pwd;
        // }

        public function getConnect(){
            $mainConnect = $this->dbconnection();
            return $mainConnect;
        }

        public function pwdcon($email){
            return $this->getpwd($email);
        }

        public function resPwd($email){

        }

        public function sendDet($email){
            return $this->login($email);
        }

        public function verify($verified, $user){
            return $this->verifyMethod($verified, $user);
        }

        public function feature($featured, $user){
            return $this->featureMethod($featured, $user);
        }

        public function resCode($email, $ver_code){
            $sendCode = $this->resetCode($email, $ver_code);
        }

        public function getCode($email, $code){
            $geCode = $this->verCode($email, $code);
            return $geCode;
        }

        public function newPass($email, $pass){
            $changePass = $this->updPass($email, $pass);
        }

        //INDIVIDUAL SIGN IN


        
    }