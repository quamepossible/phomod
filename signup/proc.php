<?php

    include '../myauto.php';
    $conn = new controller;
    $connect = $conn->getConnect();
    
$name = $_POST['fullname'];
$username = $_POST['username'];
$phone = $_POST['phone'];
$whatsapp = $_POST['whatsapp'];
$instagram = $_POST['instagram'];
$website = $_POST['website'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$region = $_POST['region'];
$city = $_POST['city'];
$company = $_POST['company'];
$lancer = $_POST['lancer'];
$category = $_POST['category'];
$days = $_POST['days'];
$travel = $_POST['travel'];

$verified = 'NO';

$pic = $_FILES['pic']['name'];
$temp_loc = $_FILES['pic']['tmp_name'];
$pic_size = $_FILES['pic']['size'];


$name = ucwords(strtolower($name));
$username = strtolower($username);
$instagram = strtolower($instagram);
$website = strtolower($website);
$email = strtolower($email);
$region = ucwords(strtolower($region));
$city = ucwords(strtolower($city));
$company = ucwords(strtolower($company));
$lancer = ucwords(strtolower($lancer));
$name = ucwords(strtolower($name));
$days = ucwords(strtolower($days));
$travel = strtoupper($travel);

$username = str_replace(' ', '', $username);
$pass = password_hash($pass, PASSWORD_DEFAULT);

$eachCate = '';
foreach($category as $obj => $value){
    $eachCate .= $category[$obj].',';
}
$need = strlen($eachCate) - 1;
$mainCategory = '';
for($i = 0; $i < $need; $i++){
    $mainCategory .= $eachCate[$i];
}


//CHECK IF USER UPLOADED PICTURE

if(!is_uploaded_file($temp_loc)){
    $imgerr = "*Please upload your picture<br>";
}
else{
    $imgerr = '';

    if($pic_size <= 20000000){
        //get extension
        $imgExt = strtolower(end(explode('.', $pic)));

        //change name 
        $newImgName = $username. ".". $imgExt;
        $newPath = '../profilepic/' . $newImgName;
    }

}


//CHECK IF EMAIL, USERNAME AND PHONE ALREADY EXIST

    $emasql = 'SELECT EMAIL FROM freelancers WHERE EMAIL = ?';
    $stmt = $connect->prepare($emasql);
    $stmt->execute([$email]);
    if($stmt->rowCount() > 0){
        $emailerr = "*Email is already taken<br>";
    }else{$emailerr = '';}

    $usersql = 'SELECT USERNAME FROM freelancers WHERE USERNAME = ?';
    $userstm = $connect->prepare($usersql);
    $userstm->execute([$username]);
    if($userstm->rowCount() > 0){
        $userr = "*Username is already taken<br>";
    }else{$userr = '';}

    if(empty($username)){
        $emperr = "*Username can't be empty<br>";
    }else{$emperr = '';}

    $phosql = 'SELECT PHONE FROM freelancers WHERE PHONE = ?';
    $phostm = $connect->prepare($phosql);
    $phostm->execute([$phone]);
    if($phostm->rowCount() > 0){
        $phoerr = "*Phone is already taken<br>";
    }else{$phoerr = '';}

    $errArr = [$userr, $emperr, $emailerr, $phoerr, $imgerr];
    $allErr = '';
    foreach($errArr as $newErr){
        $allErr .= $newErr;
    }

    if(!empty($allErr)){
        header("Location: index.php?signup=photographer&&err=$allErr&&det[]=$name&det[]=$username&det[]=$phone&det[]=$whatsapp&det[]=$instagram&det[]=$website&det[]=$email&det[]=$region&det[]=$city&det[]=$company&det[]=$days");
    }

    else{
        // INSERT DATA INTO DATABASE 
        move_uploaded_file($temp_loc, $newPath);

        $imgSql = 'INSERT INTO profile_pic(USERNAME, IMG_SRC) VALUES(?, ?)';
        $imgStm = $connect->prepare($imgSql);
        $imgStm->execute([$username, $newImgName]);
        
        $sql = 'INSERT INTO freelancers(FULL_NAME, USERNAME, PHONE, WHATSAPP, WEBSITE, INSTAGRAM, EMAIL, REGION, CITY, LANCER_TYPE, COMPANY_NAME, WORKING_DAYS, CATEGORY, TRAVEL, VERIFIED, PWD) 
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

        $stmt = $connect->prepare($sql);
        $stmt->execute([$name, $username, $phone, $whatsapp, $website, $instagram, $email, $region, $city, $lancer, $company, $days, $mainCategory, $travel, $verified, $pass]);
        header("Location: succlog.php");
    }
?>