<?php
session_start();
include '../myauto.php';
$conn = new Controller;
$connect = $conn->getConnect();

    if(isset($_SESSION['log'])){
        $prid = $_SESSION['log'];
        $getConv = $conn->convert($prid);
        $username = $getConv;

        $picPath = 'profilepic/';
        $initPath = '../profilepic/' . $username . "*";
        $getAft = glob($initPath);
        $getExt = explode(".", $getAft[0]);
        $ext = end($getExt);
        $fileName = $username . '.' . $ext;
        $fullPath = $picPath . $fileName;

        if(!unlink('../'.$fullPath)){
            echo 'error';
        }

        else{
            $sql = "UPDATE profile_pic SET IMG_SRC = '' WHERE USERNAME = :usn";
            $stmt = $connect->prepare($sql);
            $stmt->execute(["usn" => $username]);
            echo 'done';
        }
    }