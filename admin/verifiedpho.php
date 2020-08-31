<?php $title = 'VERIFIED PHOTOGRAPHERS';
$text = 'VERIFIED PHOTOGRAPHERS';?>

<?php include 'header.php'?>
<?php
$paramOne = 'YES';
$paramTwo = '%photographer%';

$verPho = new view;
$verPhoMet = $verPho->getAdminUsers($paramOne, $paramTwo);

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
        $featured = $verPhoArray['FEATURED'];

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