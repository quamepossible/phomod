<?php

    class view extends model{

        public function viewAllUsers($user){
            $getMeUsers = $this->allUsers($user);
            return $getMeUsers;
        }

        public function viewUser($user){
            $getAllUsers = $this->getUsers($user);
            return $getAllUsers;
        }

        public function viewFeatPho(){
            $getFeatPho = $this->getFeaturedPho();
            return $getFeatPho;
        }

        public function viewFeatMod(){
            $getFeatMod = $this->getFeaturedMod();
            return $getFeatMod;
        }

        public function viewSearchItem($need, $search){
            $modRet = $this->searchUser($need, $search);
            return $modRet;
        }

        public function getProfilePic($pic){
            $getPics = $this->getPic($pic);
            return $getPics;
        }

        public function getAdminUsers($paramOne, $paramTwo){
            $getUserResults = $this->adminUsers($paramOne, $paramTwo);
            return $getUserResults;
        }


        public function getUnverifiedUsers($unvery, $type){
            $getUnverifiedResults = $this->unverifiedUsers($unvery, $type);
            return $getUnverifiedResults;
        }

        public function getTotRat($user){
            $getRat = $this->senRat($user);
            return $getRat;
        }

    }