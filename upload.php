<?php

include 'myauto.php';    

if(isset($_POST['pid'])){
    $dbconn = new controller();
    $getConn = $dbconn->getConnect();

    $getusername =  $_POST['pid'];

    $divLink = explode("=", $getusername);
    $username = end($divLink);
    $url = $divLink[0];
    $path = $url.'='.$username;
    //tmp name and location
    $imgName = $_FILES['myImg']['name'];
    $tmpLoc = $_FILES['myImg']['tmp_name'];
    $imgSize = $_FILES['myImg']['size'];
    $imgTypeArr = ['jpg', 'jpeg', 'png', 'gif', 'jfif', 'pjpeg', 'pjp'];

    //get extension
    $divName = explode('.', $imgName);
    $getExt = strtolower(end($divName));

    if(!is_uploaded_file($tmpLoc)){
        echo "empty";
    }

    else{
        if(in_array($getExt, $imgTypeArr)){

            if($imgSize <= 20000000){
        
                //change name
                $newName = strtolower($username) . "." .  $getExt;
                $newPath = 'profilepic/' . $newName;
                move_uploaded_file($tmpLoc, $newPath);
                
                //check query
                $check = "SELECT * FROM profile_pic WHERE USERNAME = ?";
                $ini_stmt = $getConn->prepare($check);
                $ini_stmt->execute([$username]);
        
                if($ini_stmt->rowCount() == 0){
                    $sql = "INSERT INTO profile_pic (USERNAME, IMG_SRC) VALUES (?,?)";
                    $stmt = $getConn->prepare($sql);
                    $stmt->execute([$username, $newName]);
                }
        
                else{
                    $sql = "UPDATE profile_pic SET IMG_SRC = ? WHERE USERNAME = ?";
                    $stmt = $getConn->prepare($sql);
                    $stmt->execute([$newName, $username]);
                }     
                // header("Location: $path");
                echo "file uploaded";
            }
            else{
                echo "File too big";
            }
                
        }

        else{
            echo "not supported";
        }
    }
}

else{
    include 'error404.html';
}

?>