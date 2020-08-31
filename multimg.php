<?php 
        include 'myauto.php';

if(isset($_POST['pid'])){ 

    $dbconn = new controller();
    $getConn = $dbconn->getConnect();

    $username = $_POST['pid'];
    $fileNames = $_FILES['files']['name'];
    $fileTempLoc = $_FILES['files']['tmp_name'];
    $fileSize = $_FILES['files']['size'];
    $imgTypeArr = ['jpg', 'jpeg', 'png', 'gif', 'jfif', 'pjpeg', 'pjp'];

    $errMes = 0;
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
                    //get location

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
                    // header("Location: u.php?name=$username");
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
    if($errMes > 0){
        echo "The file(s) you uploaded is not supported, please choose another file";
    }
}

else{
    include 'error404.html';
}

?>