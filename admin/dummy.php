<?php

// $arr = ['jpg', 'png', 'gif'];
// $ext = 'jpeg';

// if(in_array($ext, $arr)){
//     echo 'yes';
// }

// else{
//     echo 'no';
// }

// $name = 'kwame opoku appiah';

// function initials($name){
//     $exp = explode(' ', $name);
//     $initials = '';
//     foreach($exp as $name => $init){
//         $initials .= ($exp[$name])[0]. ' ';
//     }
//     $finInit = ucwords($initials);
//     return $finInit;
// }

// echo initials($name);
// $username = $password = 'admin';
// echo $password;

//get extension
    // $imgName = 'kwame.ftf';
    // $imgTypeArr = ['jpg', 'jpeg', 'png', 'gif', 'jfif', 'pjpeg', 'pjp'];
    // $divName = explode('.', $imgName);
    // $getExt = strtolower(end($divName));

    // if(in_array($getExt, $imgTypeArr)){
    //     echo "file extension = $getExt <br>";
    //     echo "Valid";
    // }

    // else{
    //     echo "file extension = $getExt <br>";
    //     echo "Invalid";
    // }

    // $name = 'othersider';
    // $path = 'profilepic/'.$name."*";
    // $theFile = glob($path);
    // print_r($theFile[[0]])

// $host = 'localhost';
// $user = 'root';
// $pwd = '';
// $dbName = 'phomod';

// $dsn = 'mysql:host='.$host.';dbname='.$dbName;
// $pdo = new PDO($dsn, $user, $pwd);
// $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// $email = 'tender@gmail.com';
// $user_pwd = 'tender';
// $enc_pwd = password_hash($user_pwd, PASSWORD_DEFAULT);
// $sql = 'UPDATE freelancers SET PWD = ? WHERE EMAIL = ?';
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$enc_pwd, $email]);

// $rand1 = mt_rand(0,9);
// $rand2 = mt_rand(0,9);
// $rand3 = mt_rand(0,9);

// echo $rand1 . ' ' . $rand2 . ' ' . $rand3;


$alp = ['A', 'B', 'C', 'D', 'E', 'F'];

$text = '';
for($i = 0; $i < 3; $i++){
    $text .= $alp[mt_rand(0,5)];
}

// for($j = 0; $j < 3; $j++){
//     echo mt_rand(0,9);
// }

echo $text;
?>