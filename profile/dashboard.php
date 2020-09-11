<?php if($getUserInfo->rowCount() == 0):?>
    <?php include 'review.html';?>

<?php else:?>
    <?php include 'cone.php'; ?>    

<!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="dashboard.css">
        <link rel="stylesheet" href="dashmedia.css">
        <link rel="shortcut icon" href="../phomodlogo.ico">
        <script src="../bootstrap/dist/js/bootstrap.min.js" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
        <script src="dashboard.js" defer></script>
        <script src="ots.js" defer></script>
        <meta name="theme-color" content="blue">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Profile</title>
    </head>
    <body>
        
    <!----------------- DP UPLOAD MODAL ----------------->
    <div class="modal fade" id="dpUploadModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">upload profile pic</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div> 
                <div class="modal-body">
                    <form class="up-form" action="../upload.php" method="POST" enctype="multipart/form-data">
                        <label class="upl-btn" for="my-file-selector">
                            <input name="myImg" accept="image/x-png,image/gif,image/jpeg, image/jpg" id="my-file-selector" type="file" style="display:none" 
                            onchange="$('#upload-file-info').html(this.files[0].name)">
                            <ion-icon class="clo-ico" name="cloud-upload-outline"></ion-icon>
                            <span>upload picture</span>
                        </label>
                        <span class='label label-info' id="upload-file-info"></span>
                        <input style="visibility:hidden" type="text" name='pid' value="<?php echo 'profile/edit.php?name='.$username;?>">
                        <button type="submit" name="submit" class="btn btn-primary up-btn">Upload</button>
                    </form>
                    <form action="del.php" method="POST" class="del-pic">
                        <input type="text" name="user" value="<?php echo $username?>" class="dpuser">
                        <button class="btn btn-danger del-btn">Delete picture</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
<!----------------- DP UPLOAD MODAL ----------------->
        <div class="main-page">
            <div class="row">
                <div class="span-1-of-3">
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
                   
                </div>

                <div class="span-2-of-3">
                    <?php
                        if(isset($_GET['mes'])){
                            $errMes = $_GET['mes'];
                            if($errMes == 'success'){
                                $errMes = 'Profile updated successfully';
                                $col = 'green';
                            }
                            else{
                                $col = 'red';
                            }
                        }
                        else{
                            $errMes = '';
                        }
                    ?>

                    <div class="sec-title">
                        <p class="feat-text">EDIT PROFILE</p>
                    </div>
                    <p class="error" style="color:<?php echo $col?>; text-align:center"><?php echo $errMes?></p>
                    <form method="POST" action="save.php" onsubmit="return validate()" class="f-form">
                        <div class="row">

                            <div class="me-md-4 mb-3">
                                <label for="validationServerName">Full name*</label>
                                <input name="fullname" value="<?php echo $name?>" type="text" class="form-control fname" id="validationServerName" placeholder="Full name">
                                <div class="invalid-feedback">
                                    Please enter your full name.
                                </div>
                            </div>

                            <div class="me-md-4 mb-3">
                                <label for="validationServerUsername">Username <span class="no-edit">[Not editable]</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                    </div>
                                    <input name="username" value="<?php echo $username?>" type="text" class="form-control username" id="validationServerUsername" placeholder="Username" aria-describedby="inputGroupPrepend3" readonly>
                                    <div class="invalid-feedback">
                                    Please choose a username.
                                    </div>
                                </div>
                            </div>

                            <div class="me-md-4 mb-3">
                                <label for="validationServerPhone">Phone*</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend3">+233</span>
                                    </div>
                                    <input name="phone" value="<?php echo $phone?>" type="text" class="form-control phone" id="validationServerPhone" placeholder="Phone number" aria-describedby="inputGroupPrepend3">
                                    <div class="invalid-feedback" id="phone">
                                    Please enter phone number.
                                    </div>
                                </div>
                            </div>

                            <!-- SECOND ROW ------SOCIAL LINKS -->

                            <div class="me-md-4 mb-3">
                                <label for="validationServerWhatsapp">Whatsapp</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend3"><ion-icon name="logo-whatsapp" class="ico whats"></ion-icon></span>
                                    </div>
                                    <input name="whatsapp" value="<?php echo $whatsapp?>" type="text" class="form-control whatsapp" id="validationServerWhatsapp" placeholder="Whatsapp number" aria-describedby="inputGroupPrepend3">                      
                                </div>
                            </div>

                            <div class="me-md-4 mb-3">
                                <label for="validationServerInsta">Instagram</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend3"><ion-icon name="logo-instagram" class="ico insta"></ion-icon></span>
                                    </div>
                                    <input name="instagram" value="<?php echo $instagram?>" type="text" class="form-control instagram" id="validationServerInsta" placeholder="www.instagram.com/username" aria-describedby="inputGroupPrepend3">                           
                                </div>
                            </div>


                            <div class="me-md-4 mb-3">
                                <label for="validationServerWebsite">Website</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend3"><ion-icon name="globe" class="ico web"></ion-icon></span>
                                    </div>
                                    <input name="website" value="<?php echo $website?>" type="text" class="form-control website" id="validationServerWebsite" placeholder="www.yourwebsite.com" aria-describedby="inputGroupPrepend3">                       
                                </div>
                            </div>

                            <!-- SECOND ROW ------SOCIAL LINKS -->

                    

                            <!-- THIRD ROW ------LOCATION -->
                            <div class="me-md-4 mb-3">
                                <label for="validationServerRegion">Region*</label>
                                <input name="region" value="<?php echo $region?>" type="text" class="form-control region" id="validationServerRegion" placeholder="Eg; Greater Accra, Ashanti, Northern">
                                <div class="invalid-feedback">
                                    Please provide a valid Region.
                                </div>
                            </div>

                            <div class="me-md-4 mb-3">
                                <label for="validationServerTown">City/Town*</label>
                                <input name="city" value="<?php echo $city?>" type="text" class="form-control city" id="validationServerTown" placeholder="Eg; Kumasi, Tema, Abuakwa, Mankesim">
                                <div class="invalid-feedback">
                                    Please provide a valid city/town.
                                </div>
                            </div>

                            <div class="me-md-4 mb-3">
                                <label for="validationServerCompany">Company Name</label>
                                <input name="company" value="<?php echo $comName?>" type="text" class="form-control company" id="validationServerCompany" placeholder="Eg; A+ photography">
                            </div>

                            <!-- THIRD ROW ------LOCATION -->

                        
                            <!-- WORK TYPE -->
                            <div class="me-md-4 mb-3">
                                <label for="validationServerType">Lancer type <span class="no-edit">[Not editable]</span></label>
                                <input name="lancer" type="text" class="form-control" value="<?php echo $type?>" readonly>                  
                            </div>

                            <div class="me-md-4 mb-3">
                                <label for="validationServerCategory">Categories*</label>
                                <input name="category" value="<?php echo $category?>" type="text" class="form-control category" id="validationServerCategory" placeholder="Eg; Wedding, graduation, portrait">
                                <div class="invalid-feedback">
                                    Please provide a valid category.
                                </div>
                            </div>

                            <div class="me-md-4 mb-3">
                                <label for="validationServerDays">Working days*</label>
                                <input name="days" value="<?php echo $days?>" type="text" class="form-control days" id="validationServerDays" placeholder="Eg; Mon - Fri, Mon - Sun">
                                <div class="invalid-feedback">
                                    Please provide a valid working days.
                                </div>
                            </div>

                            <!-- WORK TYPE -->

                            <?php if($isTravel == "YES"):?>
                                <div class="me-md-4 mb-3 wrap">
                                    <label for="validationServerTrav">Available for travel</label>
                                    <select name="travel" class="custom-select travel" id="validationServerTrav">
                                        <option value='yes' selected>YES</option>
                                        <option value='no'>NO</option>
                                    </select>
                                </div>

                            <?php else:?>
                                <div class="me-md-4 mb-3 wrap">
                                    <label for="validationServerTrav">Available for travel</label>
                                    <select name="travel" class="custom-select travel" id="validationServerTrav">
                                        <option value='yes'>YES</option>
                                        <option value='no' selected>NO</option>
                                    </select>
                                </div>
                            <?php endif?>
                        </div>
                        <button class="btn btn-success signup" type="submit">Save changes</button>

                    
                    </form>

                    <form action="" class="pass-form">
                        <button class="btn btn-danger">Change password</button>
                    </form>
                </div>
            </div>
        </div>
<script src="../sweetalert/package/dist/sweetalert2.all.min.js"></script>
    </body>
    </html>
<?php endif?>