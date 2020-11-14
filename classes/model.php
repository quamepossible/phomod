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
            // $verified = 'YES';
            $sql= "SELECT * FROM freelancers WHERE USERNAME = :user";
            $getAll = $getConn->prepare($sql);
            $getAll->execute(['user' => $user]);
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
            // $verified = 'YES';
            $sql = "SELECT * FROM freelancers WHERE (CITY LIKE :search || REGION LIKE :search) and LANCER_TYPE LIKE :lancer ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(["search" => $search, "lancer" => $need]);
            return $stmt;
        }

        protected function getPic($pic){
            $sql = "SELECT IMG_SRC, COVER FROM profile_pic WHERE USERNAME = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$pic]);
            return $stmt;
        }
        
        protected function login($email){
            $sql = 'SELECT USERNAME, PROFILE_ID, PWD, RESET_PWD  FROM freelancers WHERE EMAIL = :email';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['email' => $email]);
            return $stmt;
        }

        protected function indLog($email){
            $sql = 'SELECT EMAIL FROM individual WHERE EMAIL = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email]);
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

        //CHECK IF USER IS A FREELANCER
        protected function getDe($email){
            $sql = "SELECT * FROM freelancers WHERE EMAIL = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email]);
            return $stmt;
        }

        //CHECK IF USER IS AN INDIVIDUAL
        protected function geInd($userid){
            $sql = "SELECT * FROM individual WHERE USER_ID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$userid]);
            return $stmt;
        }

        //CHECK IF USER IS VERIFIED
        protected function retVerified($checkUser){
            $sql = "SELECT EMAIL_VERIFIED FROM freelancers WHERE PROFILE_ID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$checkUser]);
            if($stmt->rowCount () == 1){
                while($getVer = $stmt->fetch()){
                    return $getVer['EMAIL_VERIFIED'];
                }
            }
        }

        //CREATE ACCOUNT FOR INDIVIDUAL USER
        protected function createAcc($userid, $email, $name, $pic){
            $profile_id = str_replace(" ", "", $name);
            $profile_id = $profile_id . uniqid();
            $sql = "INSERT INTO individual (USER_ID, PROFILE_ID, NAME, EMAIL, PIC) VALUES(?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$userid, $profile_id, $name, $email, $pic]);
        }

        //ADD RATINGS
        protected function finVote($lancer, $rater, $totVot){
            //CHECK IF RATER IS IN OUR LIST OF INDIVIDUALS
            $sql_four = "SELECT PROFILE_ID FROM individual WHERE PROFILE_ID = ?";
            $stmt_four = $this->connect()->prepare($sql_four);
            $stmt_four->execute([$rater]);

            //CHECK IF RATER IS IN OUR LIST OF FREELANCERS
            $sql_six = "SELECT PROFILE_ID FROM freelancers WHERE PROFILE_ID = ?";
            $stmt_six = $this->connect()->prepare($sql_six);
            $stmt_six->execute([$rater]);

            //IF RATER IS IN LIST OF FREELANCERS OR INDIVIDUAL 
            if($stmt_four->rowCount() == 1 || $stmt_six->rowCount() == 1){
                //CHECK IF FREELANCER IS IN LIST
                $sql_five = "SELECT USERNAME FROM freelancers WHERE USERNAME = ?";
                $stmt_five = $this->connect()->prepare($sql_five);
                $stmt_five->execute([$lancer]);
                //IF LANCER IS IN LIST
                if($stmt_five->rowCount() == 1){
                    //THEN VOTE IS VALID

                    //CHECK IF THERE HAS BEEN A RATING BETWEEN RATER AND FREELANCER
                    $sql_one = "SELECT * FROM rating WHERE RATER = ? and LANCER = ?";
                    $stmt_one = $this->connect()->prepare($sql_one);
                    $stmt_one->execute([$rater, $lancer]);
                    //IF YES
                    if($stmt_one -> rowCount() == 1){
                        //THEN UPDATE STAR 
                        $sql_two = "UPDATE rating SET STAR = ? WHERE RATER = ? and LANCER = ?";
                        $stmt_two = $this->connect()->prepare($sql_two);
                        $stmt_two->execute([$totVot, $rater, $lancer]);
                    }
                    //IF NO 
                    else{
                        //THEN ADD NEW STAR
                        $sql_three = "INSERT INTO rating (RATER, LANCER, STAR) VALUES (?,?,?)";
                        $stmt_three = $this->connect()->prepare($sql_three);
                        $stmt_three->execute([$rater, $lancer, $totVot]);
                    }
                }
            }

            else{
                //VOTE IS INVALID
            }
        }

        protected function senRat($user){
            $getTotRat = "SELECT LANCER FROM rating WHERE LANCER = ?";
            $stmt_rat = $this->connect()->prepare($getTotRat);
            $stmt_rat->execute([$user]);
            $totRev = $stmt_rat->rowCount();
            return $totRev;
        }

        protected function getRated($rater, $lancer){
            $sql = "SELECT * FROM rating WHERE RATER = ? and LANCER = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$rater, $lancer]);
            return $stmt;
        }

        protected function calStar($lancer){
            $sql = "SELECT STAR FROM rating WHERE LANCER = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$lancer]);

            //CHECK IF LANCER HAS A RATING
            if($stmt->rowCount() > 0){
                //THIS MEANS LANCER HAS BEEN RATED AT LEAST ONES
                $donStar = $stmt->fetchAll();
                $totStar = 0;
                foreach($donStar as $weStar){
                    $totStarr = $weStar['STAR'];
                    $totStar += $totStarr;
                }
                $granStar = ($totStar) / ($stmt->rowCount());
                $granStar = round($granStar, 1);
            }
            else{
                //LANCER HAS ZERO RATING
                $granStar = 'NA';
            }
            return $granStar;
        }

        //

        //CHECK IF EMAIL IS IN FREELANCERS AND VERIFIED = 0
        protected function newAcc($email){
            $sql_one = "SELECT EMAIL_CODE FROM freelancers WHERE EMAIL = ? and EMAIL_VERIFIED = 0";
            $stmt_one = $this->connect()->prepare($sql_one);
            $stmt_one->execute([$email]);
            return $stmt_one;
        }

        // //CHECK IF EMAIL MATCHES EMAIL VERIFY CODE
        // protected function isMatch($email, $code){
        //     $sql_two = "SELECT EMAIL_CODE FROM freelancers WHERE EM"
        // }
        
    }