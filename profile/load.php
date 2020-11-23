<?php
session_start(); 
include '../myauto.php';
$conn = new Controller;
$getConv = $conn->convert($_SESSION['log']);
$uname = $getConv;
include 'cone.php';
?>

<div class="hold-all">
    <div class="hol-com">
        <?php if(!empty($comName)):?>
            <p class="p-comp"><ion-icon name="camera" class="cam-ico-span"></ion-icon><span class="t-span comp"><?php echo $comName?></span>
        <?php endif?>
    </div>

    <div class="profile-pic" style="background:url(../profilepic/<?php echo $profilePic?>);background-position:center;background-size:cover;" data-toggle="modal" data-target="#dpUploadModal">
        <ion-icon name="camera" class="cam-ico"></ion-icon>
    </div>
    <p class="name" style="color:white"><?php echo $name?></p>
    <div class="rate">
        <p><span class="ratee"><?php echo $lanStar?></span>
            <?php include '../dash/star.php'?>   
            <span class="quot">
                (<?php echo $gehRevv?>) reviews
            </span>
        </p>
        <p class="location"><ion-icon class="loc-ico" name="location-outline"></ion-icon>&nbsp;<span><?php echo ucwords($region) . ", ". ucfirst($city)?></span></p>
    </div>
</div>