<?php $title = 'VERIFIED MODELS';
$text = 'VERIFIED MODELS';?>

<?php include 'header.php'?>    
<?php
    $paramOne = 'YES';
    $paramTwo = '%model%';

    $verMod = new view;
    $verModMet = $verMod->getAdminUsers($paramOne, $paramTwo);

    if($verModMet->rowCount() > 0){
        $verModArr = $verModMet->fetchAll();
        $count = 1;
        foreach($verModArr as $verModArray){
            $name = $verModArray['FULL_NAME'];
            $username = $verModArray['USERNAME'];
            $pid = $verModArray['PROFILE_ID'];
            $phone = $verModArray['PHONE'];
            $type = $verModArray['LANCER_TYPE'];
            $travel = $verModArray['TRAVEL'];
            $verified = $verModArray['VERIFIED'];
            $featured = $verModArray['FEATURED'];

            if($featured == 'YES'){
                echo "<tr><td class='text-center'>$count</td><td class='tname'>$name</td><td>$username</td><td>$pid</td><td>$phone</td><td>$type</td><td>$verified</td><td>$travel</td><td class='row'><a href='reviewuser.php?name=$username' class='fif edi'><ion-icon class='edit' name='create-outline'></ion-icon></a><form action='feature.php' method='POST' class='fif'><input type='text' name='feat' value='$featured' style='visibility:hidden;display:none'><input type='text' name='user' value='$username' style='visibility:hidden;display:none'><ion-icon name='star' class='star staa'></ion-icon></form></td></tr>";                                  
                $count++;
            }

            else{
                echo "<tr><td class='text-center'>$count</td><td class='tname'>$name</td><td>$username</td><td>$pid</td><td>$phone</td><td>$type</td><td>$verified</td><td>$travel</td><td class='row'><a href='reviewuser.php?name=$username' class='fif edi'><ion-icon class='edit' name='create-outline'></ion-icon></a><form action='feature.php' method='POST' class='fif'><input type='text' name='feat' value='$featured' style='visibility:hidden;display:none'><input type='text' name='user' value='$username' style='visibility:hidden;display:none'><ion-icon name='star' class='star sta'></ion-icon></form></td></tr>";                                  
                $count++;
            }
        }
    }
?>



<?php include 'footer.php'?>