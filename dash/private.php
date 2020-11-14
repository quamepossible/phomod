<?php $getStats = $meconn->checkStatus($sesDet);?>
<?php if($getStats == 'freelancer'):?>
    <?php if($getUserInfo->rowCount() == 0):?>
        <?php include 'review.html'?>

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
                <div class="cov-up">
                    <button class="cov-link" data-toggle="modal" data-target="#coverModal"><ion-icon name="camera" class="cam-icon"></ion-icon>&nbsp;<span>Upload Cover Pic</span></button>    
                </div>
            </div>


    <!----------------- COVER UPLOAD MODAL ----------------->
        <div class="modal fade" id="coverModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">upload cover photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <form action="coverupload.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="coverImg" accept="image/x-png,image/gif,image/jpeg">
                    <input style="visibility:hidden" type="text" name='pid' value="<?php echo $userr['USERNAME'];?>">
                    <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                </form>

                
            </div>
            </div>
        </div>
        </div>
    <!----------------- COVER UPLOAD MODAL ----------------->



    <!----------------- DP UPLOAD MODAL ----------------->
        <div class="modal fade" id="dpUploadModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">upload profile pic</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div> 
                    <div class="modal-body">
                        <form action="upload.php" class="dp-form" method="POST" enctype="multipart/form-data">
                            <input id="file" type="file" name="myImg" accept="image/x-png,image/gif,image/jpeg, image/jpg">
                            <input class="username" style="display:none" type="text" name='pid' value="<?php echo 'u.php?name='.$userr['USERNAME'];?>">
                            <button type="submit" name="submit" class="btn btn-primary up-btn">Upload</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    <!----------------- DP UPLOAD MODAL ----------------->
                

            <div class="dp" style="background: url(<?php echo $src?>);background-position:center;background-size:cover">
            
                <div class="hold-a">
                    <a class="hover" href="javascript:void(0);" data-toggle="modal" data-target="#dpUploadModal">
                        <ion-icon class="dp-ico" name="camera"></ion-icon>&nbsp;Upload
                    </a>
                </div>

            </div>

        </section>
            

        <p class="edit"><a href="profile/edit.php?name=<?php echo $pic?>"><ion-icon name="create-outline" class="edit-prof"></ion-icon><span>Edit Profile</span></a></p>
    <!----------------- CATEGORY AND TAG SECTION ----------------->

    <?php
            //get categories
            $catStmt = "SELECT CATEGORY, EMAIL, RATING, TRAVEL, WORKING_DAYS, COMPANY_NAME, REGION, CITY, INSTAGRAM, WHATSAPP, WEBSITE, PHONE, EMAIL_VERIFIED, DESCRIPTION FROM freelancers WHERE USERNAME = :uid";
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
                $email = $allTags['EMAIL'];
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
                        <span class="t-span comp"><ion-icon name="camera" class="cam-ico"></ion-icon><span class="name-only"><?php echo $comName?></span></span>
                    <?php endif?>
                    <?php for($k = 0; $k < $tTags; $k++):?>
                        <span class="t-span"><ion-icon name="pricetag" class="tag-ico"></ion-icon><span class="name-only"><?php echo $getEach[$k]?></span></span>
                    <?php endfor?>
                    <?php if($isTravel == 'YES'):?>
                        <span class="t-span trav"><ion-icon name="rocket" class="roc-ico"></ion-icon><span class="name-only">Availabe for travel</span></span>
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
                            
                            <?php else:?>
                                <p class="unv-pp"><ion-icon class="unv-ico" name="alert-circle"></ion-icon><span class="unv-span">Verify your email</span><a href="sendver.php?email=<?php echo $email;?>" id="resid" onclick="return openWin()" class="btn btn-success"><span class="yever">Verify</span></a></p>
                        <?php endif?>
                        </div>  
                        <div class="rate">
                            <p><span class="ratee"><?php echo $lanStar?></span>
                            <?php include 'dash/star.php'?>
                                &nbsp;&nbsp;
                                <?php echo $gehRevv?> reviews
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

    <!----------------- GALLERY UPLOAD MODAL ----------------->
    <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">upload gallery pictures</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">

                <form class="gal-upl" action="multimg.php" method="POST" enctype="multipart/form-data">
                    <input class="files" type="file" name="files[]" accept="image/x-png,image/gif,image/jpeg" multiple>
                    <input class="muluser" style="visibility:hidden" type="text" name='pid' value="<?php echo $userr['USERNAME'];?>">
                    <button class="btn btn-primary up-btn" type="submit" name="submit">upload</button>
                </form>
                
            </div>
            </div>
        </div>
        </div>
    <!----------------- GALLERY UPLOAD MODAL ----------------->

        <section class="pho-gal">
            <div class="upload">
                <button class="up-pics" data-toggle="modal" data-target="#galleryModal"><ion-icon class="add" name="add-circle-outline"></ion-icon> <span>Upload Pictures</span></button>
            </div>
            
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
                            <div class="over">
                                <div class="hol-btn">
                                    <a href="gallery/<?php echo $galRow['IMG_SRC']?>" class="view"><ion-icon name="eye" class="view-ico"></ion-icon><span>View Image</span></a>
                                    <form>
                                        <input class="uname dshow" type="text" value="<?php echo $pic?>" name="username">
                                        <input class="link dshow" type="text" value="<?php echo $galRow['IMG_SRC']?>" name="link">
                                        <button type="submit" class="delete btn btn-danger">
                                            <ion-icon name="trash" class="del-ico"></ion-icon>
                                            <span>Delete Image</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="div-img" style="background: url('gallery/<?php echo $galRow['IMG_SRC'];?>');background-position:center;background-size:cover"></div>
                        
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
    <script src="sweetalert/package/dist/sweetalert2.all.min.js"></script>
    <script src="dash/private.js"></script>
    <?php endif?>

<?php elseif($getStats == 'individual'):?>
    <?php echo 'individual';?>

<?php else:?>
    <?php include 'error404.html'?>
<?php endif?>
