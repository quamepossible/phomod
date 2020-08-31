<?php 
    session_start();
    include 'myauto.php';
?>
<html>

<head>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link href="pes.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <script src="user.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    
</head>

<body>
<?php
        $user = $_GET['name'];
        $getUserObj = new view;
        $getUserInfo = $getUserObj->viewUser($user);
        $getUserDet = $getUserInfo->fetchAll();

?>

<?php if(isset($_SESSION['log'])):?>
<?php if(($_SESSION['log']) === $user):?>

    <!-------------------- PRIVATE DIRECTORY -------------------->

    <?php foreach($getUserDet as $userr):?>

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
                    <?php echo '@'.$userr['COMPANY_NAME'];?>
                    </p>
                </div>

                <div class="cov-up">
                    <button class="btn-primary cov-link" data-toggle="modal" data-target="#coverModal"><ion-icon class="dp-ico" name="image-outline"></ion-icon>&nbsp;upload cover pic</button>    
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
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="myImg" accept="image/x-png,image/gif,image/jpeg">
                    <input style="visibility:hidden" type="text" name='pid' value="<?php echo $userr['USERNAME'];?>">
                    <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                </form>

                
            </div>
            </div>
        </div>
        </div>
    <!----------------- DP UPLOAD MODAL ----------------->
                

            <div class="dp" style="background: url(<?php echo $src?>);background-position:center;background-size:cover">
            
                <div class="hold-a">
                    <a class="hover" href="javascript:void(0);" data-toggle="modal" data-target="#dpUploadModal">
                        <ion-icon class="dp-ico" name="image-outline"></ion-icon>&nbsp;Upload
                    </a>
                </div>

            </div>

        </section>
            
        <section class="details">
        <p class="edit"><a href="#"><ion-icon name="create-outline" class="edit-prof"></ion-icon><span>Edit Profile</span></a></p>
            <div class="dp-back">

            </div>

            <div class="row">
            
                <div class="span-2-of-1">
                <div class="rate">
                    <p><span class="ratee">5.0</span>
                        <ion-icon class="star-ico" name="star"></ion-icon>
                        <ion-icon class="star-ico" name="star"></ion-icon>
                        <ion-icon class="star-ico" name="star"></ion-icon>
                        <ion-icon class="star-ico" name="star"></ion-icon>
                        <ion-icon class="star-ico" name="star"></ion-icon>&nbsp;&nbsp;
                        100 reviews
                    </p>

                    <p class="location"><ion-icon class="loc-ico" name="location-outline"></ion-icon>&nbsp;<span>Kumasi</span></p>

                </div>
                    <p class="com-name">
                    <ion-icon name="camera" class="ico cam"></ion-icon><span>Cheese Studios</span>
                    </p>

                    <p class="work-day">
                    <ion-icon name="time-outline" class="ico time"></ion-icon> <span>Mon - Fri</span>
                    </p>
                    <p class="username">
                    Video provides a powerful way to help you prove your point. 
                    When you click Online Video, you can paste in the embed code for the 
                    video you want to add.
                
                    </p>
                </div>

                <div class="span-2-of-2">
                <p class="connect">CONNNECT <ion-icon name="repeat" class="ico con-ico"></ion-icon></p>
                <p><ion-icon name="logo-instagram" class="ico insta"></ion-icon><span>@otherside</span></p>
                <p><ion-icon name="logo-whatsapp" class="ico whats"></ion-icon><span>0547042868</span></p>
                <p><ion-icon name="call" class="ico call"></ion-icon><span>0241587760 / 0503570092</span></p>
                <p><ion-icon name="globe" class="ico web"></ion-icon><span>www.otherside-photos.com</span></p>
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

                <form action="multimg.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="files[]" accept="image/x-png,image/gif,image/jpeg" multiple>
                    <input style="visibility:hidden" type="text" name='pid' value="<?php echo $userr['USERNAME'];?>">
                    <button class="btn btn-primary" type="submit" name="submit">upload</button>
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
                $host = 'localhost';
                $user = 'root';
                $pwd = '';
                $dbname = 'phomod';
                $connect = mysqli_connect($host, $user, $pwd, $dbname); 

                $sql = "SELECT IMG_SRC FROM gallery WHERE USERNAME = '$pic'";
                $val_sql = mysqli_query($connect, $sql);
                
            ?>
            <div class="row">
                <?php if(mysqli_num_rows($val_sql) > 0):?>
                    <?php while($galRow = mysqli_fetch_array($val_sql)):?>
                        <div class="span-1-of-4">
                            <a href="#"><div class="div-img" style="background: url('gallery/<?php echo $galRow['IMG_SRC'];?>');background-position:center;background-size:cover">
                            </div></a>
                        </div>
                    <?php endwhile ?>

                    <?php else:?>
                        <div class="emp-gal">
                            <ion-icon class="emp-ico" name="image-outline"></ion-icon>
                            <p class="emp-text">Gallery is empty</p>
                        </div>

                <?php endif ?>


            </div>
        </section>
        <!----------------- GALLERY SECTION ----------------->

        <?php endforeach ?>
        <?php endif ?>
        <!-------------------- PRIVATE DIRECTORY -------------------->



        <!-------------------- PUBLIC DIRECTORY -------------------->

    <?php if(!isset($_SESSION['log']) || $_SESSION['log'] !== $user)?>
        <?php foreach($getUserDet as $userr):?>

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
            <?php echo '@'.$userr['COMPANY_NAME'];?>
            </p>
        </div>

    </div>
        

    <div class="dp" style="background: url(<?php echo $src?>);background-position:center;background-size:cover">
    
    </div>

</section>
    
<section class="details">

    <div class="dp-back">

    </div>

    <div class="row">
    
        <div class="span-2-of-1">
        <div class="rate">
            <p><span class="ratee">5.0</span>
                <ion-icon class="star-ico" name="star"></ion-icon>
                <ion-icon class="star-ico" name="star"></ion-icon>
                <ion-icon class="star-ico" name="star"></ion-icon>
                <ion-icon class="star-ico" name="star"></ion-icon>
                <ion-icon class="star-ico" name="star"></ion-icon>&nbsp;&nbsp;
                100 reviews
            </p>

            <p class="location"><ion-icon class="loc-ico" name="location-outline"></ion-icon>&nbsp;<span>Kumasi</span></p>

        </div>
            <p class="com-name">
            <ion-icon name="camera" class="ico cam"></ion-icon><span>Cheese Studios</span>
            </p>

            <p class="work-day">
            <ion-icon name="time-outline" class="ico time"></ion-icon> <span>Mon - Fri</span>
            </p>
            <p class="username">
            Video provides a powerful way to help you prove your point. 
            When you click Online Video, you can paste in the embed code for the 
            video you want to add.
        
            </p>
        </div>

        <div class="span-2-of-2">
        <p class="connect">CONNNECT <ion-icon name="repeat" class="ico con-ico"></ion-icon></p>
        <p><ion-icon name="logo-instagram" class="ico insta"></ion-icon><span>@otherside</span></p>
        <p><ion-icon name="logo-whatsapp" class="ico whats"></ion-icon><span>0547042868</span></p>
        <p><ion-icon name="call" class="ico call"></ion-icon><span>0241587760 / 0503570092</span></p>
        <p><ion-icon name="globe" class="ico web"></ion-icon><span>www.otherside-photos.com</span></p>
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
        $host = 'localhost';
        $user = 'root';
        $pwd = '';
        $dbname = 'phomod';
        $connect = mysqli_connect($host, $user, $pwd, $dbname); 

        $sql = "SELECT IMG_SRC FROM gallery WHERE USERNAME = '$pic'";
        $val_sql = mysqli_query($connect, $sql);
        
    ?>
    <div class="row">
        <?php if(mysqli_num_rows($val_sql) > 0):?>
            <?php while($galRow = mysqli_fetch_array($val_sql)):?>
                <div class="span-1-of-4">
                    <a href="#"><div class="div-img" style="background: url('gallery/<?php echo $galRow['IMG_SRC'];?>');background-position:center;background-size:cover">
                    </div></a>
                </div>
            <?php endwhile ?>

            <?php else:?>
                <div class="emp-gal">
                    <ion-icon class="emp-ico" name="image-outline"></ion-icon>
                    <p class="emp-text">Gallery is empty</p>
                </div>

        <?php endif ?>


    </div>
</section>
<!----------------- GALLERY SECTION ----------------->

<?php endforeach ?>
        <!-------------------- PUBLIC DIRECTORY -------------------->

    <?php endif?>

</body>

</html>