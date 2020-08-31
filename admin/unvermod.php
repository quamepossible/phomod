<?php $title = 'UNVERIFIED MODELS';
$text = 'UNVERIFIED MODELS';?>

<?php include 'header.php'?>
<?php
    $unvery = 'NO';
    $type = '%model%';

    $unVerPho = new view;
    $verPhoMet = $unVerPho->getAdminUsers($unvery, $type);

    if($verPhoMet->rowCount() > 0){
        $verPhoArr = $verPhoMet->fetchAll();
        $count = 1;
        foreach($verPhoArr as $verPhoArray){
            $name = $verPhoArray['FULL_NAME'];
            $username = $verPhoArray['USERNAME'];
            $pid = $verPhoArray['PROFILE_ID'];
            $phone = $verPhoArray['PHONE'];
            $type = $verPhoArray['LANCER_TYPE'];
            $travel = $verPhoArray['TRAVEL'];
            $verified = $verPhoArray['VERIFIED'];
        
        
            echo "<tr><td class='text-center'>$count</td><td class='tname'>$name</td><td>$username</td><td>$pid</td><td>$phone</td><td>$type</td><td>$verified</td><td>$travel</td><td><a href='reviewuser.php?name=$username' class='rev'><ion-icon name='eye-outline' class='eye-ico'></ion-icon>Review</a></td></tr>";
            
            $count++;
        }
    }
?>
<?php include 'footer.php'?>