<?php
    include '../myauto.php';
    $conn = new controller;
    $connect = $conn->getConnect();

    if(isset($_POST['username'])){
        $name = $_POST['fullname'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $whatsapp = $_POST['whatsapp'];
        $instagram = $_POST['instagram'];
        $website = $_POST['website'];
        $region = $_POST['region'];
        $city = $_POST['city'];
        $company = $_POST['company'];
        $category = $_POST['category'];
        $days = $_POST['days'];
        $travel = $_POST['travel'];
    
        $name = ucwords(strtolower($name));
        $instagram = strtolower($instagram);
        $website = strtolower($website);
        $region = ucwords(strtolower($region));
        $city = ucwords(strtolower($city));
        $company = ucwords(strtolower($company));
        $category = ucwords(strtolower($category));
        $days = ucwords(strtolower($days));
        $travel = strtoupper($travel);
    
        $sql = "UPDATE freelancers SET FULL_NAME =?, PHONE=?, WHATSAPP=?, WEBSITE=?,INSTAGRAM=?, REGION=?, CITY=?, COMPANY_NAME=?, WORKING_DAYS=?, CATEGORY=?, TRAVEL=? WHERE USERNAME='$username'";
        $stmt = $connect->prepare($sql);
        $stmt->execute([$name, $phone, $whatsapp, $website, $instagram, $region, $city, $company, $days, $category, $travel]);
        // header("Location: edit.php?name=$username");
        echo 'changed';
    }

    else{
        include 'error404.html';
    }
    
?>
   