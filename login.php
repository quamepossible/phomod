<?php
    session_start();
    include 'myauto.php';

    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];

        $email = str_replace(" ", "", $email);
        $pwd = str_replace(" ", "", $pwd);

        $getDet = [$email, $pwd];
        $DetLen = count($getDet);

        $logErr = "";
        for($i = 0; $i < $DetLen; $i++){
            if(empty($getDet[$i])){
                $logErr .= "empty";
            }
        }

        if(!empty($logErr)){
            echo "empty fields";
        }

        else{
            $send_data = new Controller;    

            //check freelancer
            $get_pwd = $send_data->sendDet($email);
            $pawd = $get_pwd->fetchAll();

            //check indiviual
            $checkInd = $send_data->indVer($email);
            $isInd = $checkInd->fetchAll();
    
            if($get_pwd->rowCount() > 0){
                //USER IS A FREELANCER
                foreach($pawd as $details){
                    $enc_pwd = $details['PWD'];
                }
                if(password_verify($pwd, $enc_pwd)){
                    $_SESSION['log'] = $details['PROFILE_ID'];
                    // header('Location: /');
                    echo 'logged in';
                }
    
                else{
                    echo "Invalid";
                }
            }

            else{
                if($checkInd->rowCount() > 0){
                    //USER IS AN INDIVIDUAL
                    echo 'individual';
                }
    
                else{
                    echo "No user found";
                }
            }
        }
    }

    else{
        include 'error404.html';
    }