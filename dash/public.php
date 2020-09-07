<?php if($getUserInfo->rowCount() == 0):?>
    <?php include 'error404.html'?>

<?php else:?>
    
    <?php foreach($getUserDet as $userr):?>
        <?php include 'dasheader.php'?>
    <?php 
        $pic = $userr['USERNAME'];
        //GET PROFILE PIC 
        
        $picObj = new view;
        $getPicMet = $picObj->getProfilePic($pic);
    ?>

    <section id="cover">

        <?php if($getPicMet->rowCount() == 0): ?>
                <?php $src = 'profilepic/avatar.jpg';?>
                <?php $cov = 'profilepic/no-cover.png';?>

        <?php elseif($getPicMet->rowCount() > 0):?>
            <?php while($row = $getPicMet->fetch()): ?>          
                <?php if(empty($row['COVER'])):?>
                    <?php $cov = 'profilepic/no-cover.png';?>
                    <?php $src = 'profilepic/'.$row['IMG_SRC']; ?>

                <?php elseif(empty($row['IMG_SRC'])):?>
                    <?php $src = 'profilepic/avatar.jpg';?>
                    <?php $cov = 'profilepic/'.$row['COVER'];?>

                <?php else:?>
                    <?php $cov = 'profilepic/'.$row['COVER'];?>
                    <?php $src = 'profilepic/'.$row['IMG_SRC']; ?>
                <?php endif ?>
            <?php endwhile ?>

        
        <?php endif ?>
        <div class="cover-blur" style="background: url(<?php echo $cov;?>);background-position:center;background-size:cover">
        
        </div>
        <div class="cover-phot" style="background: url(<?php echo $cov;?>);background-position:center;background-size:cover">
            <div class="cover-name">
                <p class="cov">
                <?php echo '@'.$userr['USERNAME'];?>
                </p>
            </div>

        </div>
            
        
        <div class="dp" style="background: url(<?php echo $src?>);background-position:center;background-size:cover">
      
        </div>

    </section>

    <!----------------- CATEGORY AND TAG SECTION ----------------->

    <?php
        //get categories
        $catStmt = "SELECT CATEGORY, RATING, WORKING_DAYS, TRAVEL, COMPANY_NAME, REGION, CITY, INSTAGRAM, WHATSAPP, WEBSITE, PHONE, DESCRIPTION FROM freelancers WHERE USERNAME = :uid";
        $valStmt = $getConn->prepare($catStmt);
        $valStmt->execute(['uid' => $pic]);
        $getCat = $valStmt->fetchAll();
        foreach($getCat as $allTags){
            //isolate
            $getEach = explode(",", $allTags["CATEGORY"]); 
            $isTravel = $allTags["TRAVEL"];  
            $comName = $allTags["COMPANY_NAME"];      
            $region = $allTags["REGION"];
            $city = $allTags["CITY"];   
            $instagram = $allTags["INSTAGRAM"];
            $whatsapp = $allTags["WHATSAPP"];
            $website = $allTags["WEBSITE"];
            $phone = $allTags["PHONE"];
            $desc = $allTags["DESCRIPTION"];
            $rating = $allTags["RATING"];
            $days = $allTags["WORKING_DAYS"];
        }
        $tTags = count($getEach);

        $social = [$whatsapp, $website, $instagram];
        $slen = count($social);
        for($m = 0; $m < $slen; $m++){
            if(empty($social[$m])){
                $social[$m] = "Not Available";
            }
        }
    ?>  

    
    <section class="tag-section">
        <div class="hold-tags">
            <p>
                <?php if(!empty($comName)):?>
                    <span class="t-span comp"><ion-icon name="camera" class="cam-ico"></ion-icon><?php echo $comName?></span>
                <?php endif?>
                <?php for($k = 0; $k < $tTags; $k++):?>
                    <span class="t-span"><ion-icon name="pricetag" class="tag-ico"></ion-icon><?php echo $getEach[$k]?></span>
                <?php endfor?>
                <?php if($isTravel == 'YES'):?>
                    <span class="t-span trav"><ion-icon name="rocket" class="roc-ico"></ion-icon>Availabe for travel</span>
                <?php endif?>
            </p>
        </div>
    </section> 
    <!----------------- CATEGORY AND TAG SECTION ----------------->


    <!----------------- DETAILS SECTION ----------------->
        
    <section class="details">
       
        <div class="row">
            <div class="span-s-of-s">
                <div class="span-2-of-1">
                    <div class="others">
                        <p><ion-icon class="ver-ico" name="shield-checkmark"></ion-icon><span class="ver-span">verified</span></p>
                    </div>  
                    <div class="rate">
                        <p><span class="ratee">5.0</span>
                            <ion-icon class="star-ico" name="star"></ion-icon>
                            <ion-icon class="star-ico" name="star"></ion-icon>
                            <ion-icon class="star-ico" name="star"></ion-icon>
                            <ion-icon class="star-ico" name="star"></ion-icon>
                            <ion-icon class="star-ico" name="star"></ion-icon>&nbsp;&nbsp;
                            <?php echo $rating?> reviews
                            <span class="rate-btn"><ion-icon name="thumbs-up" class="thumb-ico"></ion-icon><span>Rate</span></span>
                        </p>

                        <p class="location"><ion-icon class="loc-ico" name="location-outline"></ion-icon>&nbsp;<span><?php echo ucwords($region) . ", ". ucfirst($city)?></span></p>
                    </div>

                    <p class="work-day">
                    <ion-icon name="time-outline" class="icon time"></ion-icon> <span><?php echo $days?></span>
                    </p>
                    <p class="username"><?php echo $desc?></p>
                </div>
            </div>

            <div class="span-s-of-s last">                    
                <div class="span-2-of-2">
                    <p class="connect">CONNNECT <ion-icon name="repeat" class="ico con-ico"></ion-icon></p>
                    <p class="p-down"><ion-icon name="logo-instagram" class="ico insta"></ion-icon><span><?php echo $social[2]?></span></p>
                    <p class="p-down"><ion-icon name="logo-whatsapp" class="ico whats"></ion-icon><span><?php echo $social[0]?></span></p>
                    <p class="p-down"><ion-icon name="call" class="ico call"></ion-icon><span><?php echo $phone?></span></p>
                    <p class="p-down"><ion-icon name="globe" class="ico web"></ion-icon><span><?php echo $social[1]?></span></p>
                </div>
            </div>
        </div>
    </section>
    <!----------------- DETAILS SECTION ----------------->

    <!----------------- GALLERY SECTION ----------------->

    <section class="pho-gal">
        
        <div class="sec-title">
            <p class="feat-text">GALLERY</p>
        </div>

        <?php

            $sql = "SELECT IMG_SRC FROM gallery WHERE USERNAME = :pic ORDER BY ID DESC";
            $val_sql = $getConn->prepare($sql);
            $val_sql->execute(['pic' => $pic]);
            
        ?>
        <div class="row">
            <div class="row">
            <?php if($val_sql->rowCount() > 0):?>
                    <?php while($galRow = $val_sql->fetch()):?>
                        <div class="span-1-of-3">
                            <a href="gallery/<?php echo $galRow['IMG_SRC']?>" class="chocolat-image">
                                <div class="div-img" style="background: url('gallery/<?php echo $galRow['IMG_SRC'];?>');background-position:center;background-size:cover"></div>
                            </a>
                        </div>
                    <?php endwhile ?>

                <?php else:?>
                    <!-- GALLERY IS EMPTY -->

                <?php endif ?>
                
            
            </div>
       
        </div>
    </section>
    <!----------------- GALLERY SECTION ----------------->

    <?php endforeach ?>
<?php endif?>

