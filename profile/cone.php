<?php
$getUserObj = new view;
$lanStar = $getUserObj->getStar($uname);
$gehRevv = $getUserObj->getTotRat($uname);
//GET USER'S DETAILS
$viewDetails = $getUserObj->viewUser($uname);
$echoDetails = $viewDetails->fetchAll();

foreach($echoDetails as $outDetails){
    $name = $outDetails['FULL_NAME'];
    $username = $outDetails['USERNAME'];
    $type = $outDetails['LANCER_TYPE'];
    $isTravel = $outDetails["TRAVEL"];  
    $comName = $outDetails["COMPANY_NAME"];      
    $region = $outDetails["REGION"];
    $city = $outDetails["CITY"];   
    $instagram = $outDetails["INSTAGRAM"];
    $whatsapp = $outDetails["WHATSAPP"];
    $website = $outDetails["WEBSITE"];
    $phone = $outDetails["PHONE"];
    $category = $outDetails['CATEGORY'];
    $days = $outDetails['WORKING_DAYS'];
    $desc = $outDetails["DESCRIPTION"];
    $rating = $outDetails["RATING"];
}


//GET USER'S PROFILE IMAGE AND COVER IMAGE
$getPic = new view;
$viewPic = $getPic->getProfilePic($uname);
$echoPic = $viewPic->fetchAll();

foreach($echoPic as $userPics){
    $profilePic = $userPics['IMG_SRC'];
    $coverPic = $userPics['COVER'];
}
if(empty($profilePic)){
    $profilePic = 'avatar.jpg';
}
?>