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
                        