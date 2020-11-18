<?php
    session_start();
    include 'myauto.php';

    if(isset($_SESSION['log'])){
        $prid = $_SESSION['log'];
        $dbconn = new controller();
        $getConn = $dbconn->getConnect();
        $getConv = $dbconn->convert($prid);
        $username = $getConv;

        //tmp name and location
        $imgName = $_FILES['coverImg']['name'];
        $tmpLoc = $_FILES['coverImg']['tmp_name'];
        $imgSize = $_FILES['coverImg']['size'];
        $imgTypeArr = ['jpg', 'jpeg', 'png', 'gif', 'jfif', 'pjpeg', 'pjp'];

        //get extension
        $divName = explode('.', $imgName);
        $getExt = strtolower(end($divName));

        if(!is_array($imgName)){

            if(!is_uploaded_file($tmpLoc)){
                echo "empty";
            }

            else{
                if(in_array($getExt, $imgTypeArr)){

                    if($imgSize <= 20000000){
                
                        //change name
                        $newName = 'uc' . $username . '.' .  $getExt;
                        $newPath = 'profilepic/' . $newName;
                        move_uploaded_file($tmpLoc, $newPath);
                
                        //check query
                        $check = "SELECT COVER FROM profile_pic WHERE USERNAME = ?";
                        $ini_stmt = $getConn->prepare($check);
                        $ini_stmt->execute([$username]);
                        
                        if($ini_stmt->rowCount() == 0){
                            $sql = "INSERT INTO profile_pic (USERNAME, COVER) VALUES (?,?)";
                            $stmt = $getConn->prepare($sql);
                            $stmt->execute([$username, $newName]);
                        }
                
                        else{
                            $sql = "UPDATE profile_pic SET COVER = ? WHERE USERNAME = ?";
                            $stmt = $getConn->prepare($sql);
                            $stmt->execute([$newName, $username]);
                        }
                        echo 'uploaded';
                    }
                    else{
                        echo "max";
                    }
                }

                else{
                    echo "not supported";
                }
            }
        }

        else{
            echo 'try again';
        }
    }

    else{
        echo 'logout';
    }

?>