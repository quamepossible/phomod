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

    <!------------------------------- LOGIN FORM ------------------------------->

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="close-mod">       
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="cls">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p class="log-tex">Login to <span style="color:#007d9c;font-weight:bold;">PHOMOD</p>
                    <p class="put-cen">
                        <img src="logo.png" class="cir-logo" alt="" width="100px">
                    </p>
                    <p class="err"></p>
                    <form action="login.php" method="POST" id="log-form">
                        <div class="cent-inp">
                            <p class="e-text">Email</p>
                            <input type="email" name="email" id="mail-inp">

                            <p class="p-text">Password</p>
                            <input type="password" name="pwd" id="pwd-inp">
                        </div>
                    
                        <button id="dis" type="submit" name="submit" class="btn btn-primary log-btn">Login</button>
                        <div class="holog"><div id="my-signin2"></div></div> 
                        
                        <p class="res-p"><a href="reset/" class="reset">Reset password?</a></p>        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------- LOGIN FORM ------------------------------->
        
        
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

        
        <!------------------------------- COVER AND DP ------------------------------->
        <div class="cover-blur" style="background-image: url(<?php echo $cov;?>)"></div>
        <?php 
            if($cov == 'profilepic/no-cover.png'){
                $ots = 'background-size:contain;background-repeat:no-repeat;background-position:unset';
            }
            else{
                $ots = '';
            }
        ?>
        <div class="cover-phot" style="background-image: url(<?php echo $cov;?>);<?php echo $ots?>">
            <div class="cover-name">
                <p class="cov">
                    <?php echo '@'.$userr['USERNAME'];?>
                    <p class="locc"><ion-icon class="hgh" name="location-outline">&nbsp;&nbsp;</ion-icon><span class="unloc"></span></p>
                </p>
            </div>
            <div class="allst">
                <p class="sts">
                    <ion-icon class='star-ico us-st' name='star'></ion-icon>
                    <span class="trate" style="color:white"></span>
                </p>
            </div>
        </div>           
            
        <div class="dp" style="background-image: url(<?php echo $src?>)">
      
        </div>

    </section>
    <!------------------------------- COVER AND DP ------------------------------->

    <!----------------- CATEGORY AND TAG SECTION ----------------->

    <?php
        //get categories
        $catStmt = "SELECT CATEGORY, EMAIL_VERIFIED, RATING, WORKING_DAYS, TRAVEL, COMPANY_NAME, REGION, CITY, INSTAGRAM, WHATSAPP, WEBSITE, PHONE, DESCRIPTION FROM freelancers WHERE USERNAME = :uid";
        $valStmt = $getConn->prepare($catStmt);
        $valStmt->execute(['uid' => $pic]);
        $getCat = $valStmt->fetchAll();

        //GET TOTAL NUMBER OF USERS WHO HAVE RATED THIS USER
        $gehRevv = $getUserObj->getTotRat($user);

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
            $ver = $allTags["EMAIL_VERIFIED"];
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
                        <?php if($ver == 'YES'):?>
                            <p><ion-icon class="ver-ico" name="shield-checkmark"></ion-icon><span class="ver-span">verified</span></p>
                        <?php endif?>
                    </div>  
                    <div class="rate">
                        <p class="fet-rev"><span class="ratee"><?php echo $lanStar?></span>
                            <?php include 'dash/star.php'?>
                            &nbsp;&nbsp;
                            <?php echo $gehRevv?> reviews
                            <span class="rate-btn"><ion-icon name="thumbs-up" class="thumb-ico"></ion-icon><span>Rate</span></span>
                        </p>
                        
                        <!-- CHECK IF USER IS LOGGED IN -->
                        <?php if(isset($_SESSION['log'])):?>
                            <!-- USER IS LOGGED IN -->

                            <!-- CHECK STATUS OF USER (FREELANCER OR INDIVIDUAL) -->
                            <?php
                                $checkStat = $_SESSION['log'];
                                $getStats = $meconn->checkStatus($checkStat);
                            ?>
                            <?php if($getStats == 'freelancer' || $getStats == 'individual'):?>
                                <!-- CHECK IF USER IS VERIFIED -->
                                <?php $getVerified = $meconn->isVerified($checkStat);?>
                                <?php if($getVerified == 'YES' || $getStats == 'individual'):?>
                                    <?php
                                        //CHECK IF THIS USER HAS RATED THIS FREELANCER
                                        $rater = $_SESSION['log'];
                                        $checkRate = $getUserObj->hasRate($rater, $user);
                                        $verRate = $checkRate->fetchAll();
                                    ?>

                                    <!-- CHECK IF USER HAS RATED THE FREELANCER -->
                                    <?php if($checkRate->rowCount() == 1):?>
                                        <!-- USER HAS RATED -->
                                        <?php foreach($verRate as $getRes):?>
                                            <p class='mark-rate'></p>
                                            <?php $alrStar = $getRes['STAR']?>    
                                        <?php endforeach?>
                                        <form action="dash/rate.php" method="POST" class='rat-form' onsubmit="return rateg()">
                                            <input type="text" name="lancer" class="lance" value="<?php echo $user?>">
                                            <input type="text" name="rater" class="rater" value="<?php echo $_SESSION['log']?>">
                                            <input type="text" name="votnum" class="votnum">
                                            <p class="hh-sta">
                                                <?php include 'dash/revstar.php'?>
                                            </p>
                                            <button type="submit" class="done-ra">OK</button>
                                        </form>

                                        <?php else:?>
                                            <!-- USER HAS NOT RATED -->
                                            <form action="dash/rate.php" method="POST" class='rat-form' onsubmit="return rateg()">
                                                <input type="text" name="lancer" class="lance" value="<?php echo $user?>">
                                                <input type="text" name="rater" class="rater" value="<?php echo $_SESSION['log']?>">
                                                <input type="text" name="votnum" class="votnum">
                                                <p class="hh-sta">
                                                    <ion-icon class="star-ico ico-ns" name="star-outline">1</ion-icon>
                                                    <ion-icon class="star-ico ico-ns" name="star-outline">2</ion-icon>
                                                    <ion-icon class="star-ico ico-ns" name="star-outline">3</ion-icon>
                                                    <ion-icon class="star-ico ico-ns" name="star-outline">4</ion-icon>
                                                    <ion-icon class="star-ico ico-ns" name="star-outline">5</ion-icon>
                                                </p>
                                                <button type="submit" class="done-ra">OK</button>
                                            </form>
                                    <?php endif?>
                                
                                    <?php else:?>
                                        <p class="unver"></p>
                                <?php endif?>
                            <?php endif?>                        
                        <?php endif?>
                        
                        <p class="location"><ion-icon class="loc-ico" name="location-outline"></ion-icon>&nbsp;<span class="alloc"><?php echo ucwords($region) . ", ". ucfirst($city)?></span></p>
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
                                <div class="div-img" style="background-image: url('gallery/<?php echo $galRow['IMG_SRC'];?>')"></div>
                            </a>
                        </div>
                    <?php endwhile ?>

                <?php else:?>
                    <!-- GALLERY IS EMPTY -->
                    <div class="galemp">
                        <p class="emt">EMPTY GALLERY</p>
                        <img src="empgal.png" alt="" class="emp">
                    </div>
                <?php endif ?>
                
            
            </div>
       
        </div>
    </section>
    <!----------------- GALLERY SECTION ----------------->

    <?php endforeach ?>
<?php endif?>
<script src="dash/public.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
<script src="authsign.js"></script>
<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>

