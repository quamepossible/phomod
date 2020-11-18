<?php
session_start();
include_once 'myauto.php';
require_once 'vendor/autoload.php';

// Get $id_token via HTTPS POST.

if(isset($_POST['clientid'])){
    $id_token = $_POST['clientid'];

    $CLIENT_ID = '434711358291-ug8416melga73rv6gupqv52n79l5lp6e.apps.googleusercontent.com';
    $client = new Google_Client(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
    $payload = $client->verifyIdToken($id_token);
    if ($payload) {
        if($payload['aud'] === $CLIENT_ID){

            $userid = $payload['sub'];
            $email = $payload['email'];
            $name = $payload['name'];
            $pic = $payload['picture'];

            $checkFree = new controller;
            $sendDet = $checkFree->userDet($email);
            $getDet = $sendDet->fetchAll();
            if($sendDet->rowCount() == 1){
                //THIS MEANS USER IS A FREELANCER
                foreach($getDet as $getDet){
                    $freeSes = $getDet['PROFILE_ID'];
                }
                $_SESSION['log'] = $freeSes;
                echo "freelancer";
            }

            //THIS BLOCK EXECUTES IF USER IS NOT IN FREELANCER LIST
            else{
                //CHECK FOR USER WITH GOOGLE AUTH USER ID
                $indSend = $checkFree->indData($userid);
                $getInd = $indSend->fetchAll();
                if($indSend->rowCount() == 1){
                    //THIS MEANS USER IS AN INDIVIDUAL
                    foreach($getInd as $indDet){
                        $indSes = $indDet['PROFILE_ID'];
                    }
                    $_SESSION['log'] = $indSes;
                    echo "individual";
                }
                else{
                    //THIS MEANS USER IS A NEW USER
                    //SO CREATE AN INDIVIDUAL DATA FOR THIS USER
                    $getData = $checkFree->createInd($userid, $email, $name, $pic);
                    echo "created";

                }
            }
            //THIS BLOCK EXECUTES IF USER IS NOT IN FREELANCER LIST


            // echo 'everything is valid';
        } 
    } 
    else {
        echo  'Invalid ID token';
    }
}
else{
    echo "not set";
}

// echo $_POST['email'];


?>
