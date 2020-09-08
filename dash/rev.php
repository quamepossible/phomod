
<?php
    $user = $_POST['user'];
    include '../myauto.php';
    $weObj = new view;
    $getRev = $weObj->getTotRat($user);
?>

<span class="ratee">5.0</span>
<ion-icon class="star-ico" name="star"></ion-icon>
<ion-icon class="star-ico" name="star"></ion-icon>
<ion-icon class="star-ico" name="star"></ion-icon>
<ion-icon class="star-ico" name="star"></ion-icon>
<ion-icon class="star-ico" name="star"></ion-icon>&nbsp;&nbsp;
<?php echo $getRev?> reviews
                        