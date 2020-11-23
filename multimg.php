<?php 
    session_start();
    include 'myauto.php';

if(isset($_SESSION['log'])){
    $prid = $_SESSION['log'];
    $dbconn = new controller();
    $getConn = $dbconn->getConnect();
    $getConv = $dbconn->convert($prid);

    $username = $getConv;
    $fileNames = $_FILES['files']['name'];
    $fileTempLoc = $_FILES['files']['tmp_name'];
    $fileSize = $_FILES['files']['size'];
    $imgTypeArr = ['jpg', 'jpeg', 'png', 'gif', 'jfif', 'pjpeg', 'pjp'];

    $errMes = 0;
    if(count($fileNames) > 20){
        echo 'max';
    }

    else{
        foreach($fileNames as $name => $value){
            $fileNewLoc = $fileTempLoc[$name];
            $imgSize = $fileSize[$name];
            //get extension
            $getExt = explode('.', $fileNames[$name]);
            $newExt = strtolower(end($getExt));
            
            if(!is_uploaded_file($fileNewLoc)){
                echo "no file";
            }

            else{
                if(in_array($newExt, $imgTypeArr)){

                    if($imgSize <= 20000000){

                        //new file name
                        $newName = uniqid() . "." . $newExt;

                        //move to path
                        $newPath = "gallery/" . $newName;
                        move_uploaded_file($fileNewLoc, $newPath);

                        //insert into table
                        $sql = "INSERT INTO gallery (USERNAME, IMG_SRC) VALUES(?, ?)";
                        $val_query = $getConn->prepare($sql);
                        $val_query->execute([$username, $newName]);
                        echo "files uploaded";
                    }
                    else{
                        echo "File too big";
                    }
                }

                else{
                    $errMes++;
                }
            }
        }
    }

    if($errMes > 0){
        echo $errMes;
    }
}

else{
    echo 'logout';
}

?>