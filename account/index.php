<?php
    include 'myauto.php';

    $getConn = new Controller;
    $connect = $getConn->getConnect();

    $email = 'dwomoher@gmail.com';
    $pass = 'hi';
    $pwd = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "UPDATE freelancers SET PWD = '$pwd' WHERE EMAIL = '$email'";
    $stmt = $connect->prepare($sql);
    $stmt->execute();

    echo 'password changed successfully';
