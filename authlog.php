<?php

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
            $pic = $payload['pic'];

            

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