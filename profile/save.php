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

        $getDetails = [$name, $username, $phone, $region, $city, $category, $days, $travel];
        $getDetLen = count($getDetails);
        $err = "";
        for($i = 0; $i < $getDetLen; $i++){
            if(empty($getDetails[$i])){
                $err .= 'empty';
            }
        }

        if(!empty($err)){
            echo "Empty fields";
            // header("Location: edit.php?name=$username&mes=Please fill all fields marked *");
        }

        else{    

            $username = str_replace(" ", "", $username);
            $verUser = "SELECT USERNAME FROM freelancers WHERE USERNAME = :uname";
            $vetStmt = $connect->prepare($verUser);
            $vetStmt->execute(['uname' => $username]);
            
            if($vetStmt->rowCount() == 1){
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
                echo 'changed';
                // header("Location: edit.php?name=$username&mes=success");
            }

            else{
                echo 'invalid';
            }
        }
    }

    else{
        include 'error404.html';
    }
    
?>
   