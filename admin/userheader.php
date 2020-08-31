<?php
    include 'overlay.html';
    include 'adminauto.php';

    $user = $_GET['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="review.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="rgb(3, 0, 34)">
    <title><?php echo $title?></title>
</head>
<body>

        <?php
            $getUserData = new view();
            $userArr = $getUserData->viewAllUsers($user);

            $getProfilePict = new view();
            $userPic = $getProfilePict->getProfilePic($user);

            while($dp = $userPic->fetch()){
                $pic = $dp['IMG_SRC'];
            }
        ?>

        <?php if($userArr->rowCount() > 0):?>
            <?php while($userDet = $userArr->fetch()):?>
                <?php 
                    $type = $userDet['LANCER_TYPE'];                      
                      $name = $userDet['FULL_NAME'];
                      $username = $userDet['USERNAME'];
                      $profid = $userDet['PROFILE_ID'];
                      $region = $userDet['REGION'];
                      $city = $userDet['CITY'];
                      $date = $userDet['DATE_CREATED'];
                      $time = $userDet['TIME_CREATED'];
                      $phone = $userDet['PHONE'];
                      $whatsapp = $userDet['WHATSAPP'];
                      $instagram = $userDet['INSTAGRAM'];
                      $website = $userDet['WEBSITE'];
                      $email = $userDet['EMAIL'];
                      $company = $userDet['COMPANY_NAME'];
                      $days = $userDet['WORKING_DAYS'];
                      $category = $userDet['CATEGORY'];
                      $travel = $userDet['TRAVEL'];
                      $verified = $userDet['VERIFIED'];
                      $featured = $userDet['FEATURED'];                                           
                ?>
            <?php endwhile?>

        <?php else:?>
            <p>User not found</p>
        <?php endif?>