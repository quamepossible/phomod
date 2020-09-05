<?php

    class Controller extends model{

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

        public function convert($sessDet){
            $getSes = $this->dbconnection();
            $sessProf = 'SELECT USERNAME FROM freelancers WHERE PROFILE_ID = ?';
            $varSess = $getSes->prepare($sessProf);
            $varSess->execute([$sessDet]);
            if($varSess->rowCount() == 1){
                $getUserName = $varSess->fetchAll();
                //USER IS A FREELANCER
                foreach($getUserName as $newUserName){
                    $dispName = $newUserName['USERNAME'];
                }
            }
            else{
                //USER IS AN INDIVIDUAL
                //GET NAME WITH SESSION['LOG'];
                $indQue = 'SELECT NAME FROM individual WHERE PROFILE_ID = ?';
                $verInd = $getSes->prepare($indQue);
                $verInd->execute([$sessDet]);
                if($verInd->rowCount() == 1){
                    $indUserName = $verInd->fetchAll();
                    foreach($indUserName as $vidUserName){
                        $dispName = $vidUserName['NAME'];
                    }
                }
                else{
                    $dispName = 'error';
                }
            }
            return $dispName;
        }

        //CHECK IF USER IS FREELANCER OR INDIVIDUAL
        public function checkStatus($sessDet){
            $getSes = $this->dbconnection();
            $sessProf = 'SELECT USERNAME FROM freelancers WHERE PROFILE_ID = ?';
            $varSess = $getSes->prepare($sessProf);
            $varSess->execute([$sessDet]);
            if($varSess->rowCount() == 1){
               $stats = 'freelancer';
            }
            else{
                //USER IS AN INDIVIDUAL
                //GET NAME WITH SESSION['LOG'];
                $indQue = 'SELECT NAME FROM individual WHERE PROFILE_ID = ?';
                $verInd = $getSes->prepare($indQue);
                $verInd->execute([$sessDet]);
                if($verInd->rowCount() == 1){
                    $stats = 'individual';
                }
                else{
                    $stats = 'error';
                }
            }
            return $stats;
        }

        // public function newLoc($)
        
    }