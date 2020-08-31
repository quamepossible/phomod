<?php $title = 'VERIFIED FREELANCERS';
$text = 'VERIFIED FREELANCERS';?>

<?php include 'header.php'?>

<?php
    $paramOne = 'YES';
    $paramTwo = '%%';
    
    $allfree = new view;
    $getMet = $allfree->getAdminUsers($paramOne, $paramTwo);

    if($getMet->rowCount() > 0){
        $getArr = $getMet->fetchAll();
        $count = 1;
        foreach($getArr as $freeArr){
            $name = $freeArr['FULL_NAME'];
            $username = $freeArr['USERNAME'];
            $pid = $freeArr['PROFILE_ID'];
            $phone = $freeArr['PHONE'];
            $type = $freeArr['LANCER_TYPE'];
            $travel = $freeArr['TRAVEL'];
            $verified = $freeArr['VERIFIED'];
            $featured = $freeArr['FEATURED'];

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