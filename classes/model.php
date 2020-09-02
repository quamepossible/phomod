<?php

    class model extends dbconn{

        protected function dbconnection(){
            return $this->connect();
        }

        protected function allUsers($user){
            $sql= "SELECT * FROM freelancers WHERE USERNAME = :user";
            $getMyUsers = $this->connect()->prepare($sql);
            $getMyUsers->execute(['user' => $user]);
            return $getMyUsers;
        }

        protected function getUsers($user){
            $getConn = $this->connect();
            $verified = 'YES';
            $sql= "SELECT * FROM freelancers WHERE USERNAME = :user and VERIFIED = :verified";
            $getAll = $getConn->prepare($sql);
            $getAll->execute(['user' => $user, 'verified' => $verified]);
            return $getAll;
        }

        protected function adminUsers($paramOne, $paramTwo){
            $sql = "SELECT * FROM freelancers WHERE VERIFIED = ? AND LANCER_TYPE LIKE ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$paramOne, $paramTwo]);
            return $stmt;
        }

        protected function unverifiedUsers($unvery, $type){
            $sql = "SELECT * FROM freelancers WHERE VERIFIED = ? AND LANCER_TYPE LIKE ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$unvery, $type]);
            return $stmt;
        }


        protected function getFeaturedPho(){
            $sql = "SELECT * FROM freelancers WHERE LANCER_TYPE = 'photographer' && FEATURED = 'YES'";
            $getFeat = $this->connect()->query($sql);
            return $getFeat;
        }

        protected function getFeaturedMod(){
            $sql = "SELECT * FROM freelancers WHERE LANCER_TYPE = 'model' && FEATURED = 'YES'";
            $getFeat = $this->connect()->query($sql);
            return $getFeat;
        }

        protected function searchUser($need, $search){
            $need = "%$need%";
            $search = "%$search%";
            $verified = 'YES';
            $sql = "SELECT * FROM freelancers WHERE (CITY LIKE :search || REGION LIKE :search) and LANCER_TYPE LIKE :lancer and VERIFIED = :verified";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(["search" => $search, "lancer" => $need, "verified" => $verified]);
            return $stmt;
        }

        protected function getPic($pic){
            $sql = "SELECT IMG_SRC, COVER FROM profile_pic WHERE USERNAME = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$pic]);
            return $stmt;
        }
        
        protected function login($email){
            $sql = 'SELECT USERNAME, PWD, RESET_PWD  FROM freelancers WHERE EMAIL = :email';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['email' => $email]);
            return $stmt;
        }

        protected function verifyMethod($verified, $user){
            $sql = 'UPDATE freelancers SET VERIFIED = ? WHERE USERNAME = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$verified, $user]);
            // return $stmt
        }

        protected function featureMethod($featured, $user){
            $feat = 'UPDATE freelancers SET FEATURED = ? WHERE USERNAME = ?';
            $featstmt = $this->connect()->prepare($feat);
            $featstmt->execute([$featured, $user]);
        }

        protected function resetCode($email, $ver_code){
            $sql = "UPDATE freelancers SET RESET_PWD = :pass WHERE EMAIL = :mail";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(["pass" => $ver_code, "mail" => $email]);
        }

        protected function verCode($email, $code){
            $sql = "SELECT RESET_PWD from freelancers WHERE EMAIL = :mail and RESET_PWD = :code";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(["mail" => $email, "code" => $code]);
            return $stmt;
        }

        protected function updPass($email, $pass){
            $sql = "UPDATE freelancers SET PWD = :pwd WHERE EMAIL = :mail";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(["pwd" => $pass, "mail" => $email]);
        }

        //INDIVIDUAL SIGN IN

    }