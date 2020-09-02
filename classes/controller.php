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

        //CHECK IF USER IS A FREELANCER
        public function userDet($email){
            $senDet = $this->getDe($email);
            return $senDet;
        }

        //CHECK IF USER IS AN INDIVIDUAL
        public function indData($userid){
            $senInd = $this->geInd($userid);
            return $senInd;
        }

        //CREATE ACCOUNT FOR INDIVIDUAL USER
        public function createInd($userid, $email, $name, $pic){
            $sendData = $this->createAcc($userid, $email, $name, $pic);
        }
        
    }