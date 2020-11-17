<?php
    $user = $_POST['user'];
    include '../myauto.php';
    $weObj = new view;
    $getRev = $weObj->getTotRat($user);
    $lanStar = $weObj->getStar($user);
?>

<span class="ratee"><?php echo $lanStar?></span>
<?php include 'star.php'?>
&nbsp;&nbsp;
<?php echo $getRev?> reviews
<span class="rate-btn" style="background:green"><ion-icon name="checkmark-done-outline" class="thumb-ico"></ion-icon><span>You've rated</span></span>

                        