<?php
session_start();
require_once 'myauto.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Righteous&display=swap" rel="stylesheet">    
    <link rel="shortcut icon" href="phomodlogo.ico">
    <link href="https://fonts.googleapis.com/css2?family=K2D:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="resources/media.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#007d9c">
    <meta name="google-signin-client_id" content="434711358291-ug8416melga73rv6gupqv52n79l5lp6e.apps.googleusercontent.com">
    <script src="bootstrap/dist/js/bootstrap.min.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <script src="authsign.js" defer></script>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/> -->
    <!-- <link rel="stylesheet" href="owlcarousel/dist/assets/owl.carousel.min.css"> -->
    <!-- <script src="owlcarousel/dist/owl.carousel.min.js" defer></script> -->
    <script src="resources/script.js" defer></script>
    <script src="location/style.js" defer></script>
    <title>Welcome to Phomod</title>
</head>
<body>
<?php include 'overlay.html';?>

<div class="mn-ppga">
<!------------------------------- LOGIN FORM ------------------------------->

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
     
    <div class="modal-dialog" role="document">
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
            <form action="login.php" method="POST" onsubmit="return logVal()" id="log-form">
                <div class="cent-inp">
                    <p class="e-text">Email</p>
                    <input type="email" name="email" id="mail-inp">

                    <p class="p-text">Password</p>
                    <input type="password" name="pwd" id="pwd-inp">
                </div>
            
                <button id="dis" type="submit" name="submit" class="btn btn-primary log-btn">Login</button>
                <div class="sign-btn"><div id="my-signin2" data-onsuccess="onSignIn"></div></div>
                
                <p class="res-p"><a href="reset/" class="reset">Reset password?</a></p>        
            </form>
        </div>
        </div>
    </div>
</div>

    <!------------------------------- LOGIN FORM ------------------------------->


      <!------------ NAVIGATION BAR ------------>

      <?php if(!isset($_SESSION['log'])):?>
            <nav>
                <div class="logo">
                    <img src="circleLogo.png" alt="">
                    <p class="logoname">PHOMOD.COM</p>
                </div>

                <div class="btn-tog">
                    <span class="spans"></span>    
                    <span class="spans"></span>
                    <span class="spans"></span>    
                    <span class="spans"></span>
                </div>
                
                <ul>
                    
                    <li><a href="#">PHOTOGRAPHERS</a></li>
                    <li><a href="#">MODELS</a></li>
                    <li class="log-li"><a href="javascript:void(0)" class="log" data-toggle="modal" data-target="#loginModal"><ion-icon class="log-ico" name="person-circle-outline"></ion-icon>LOG IN</a></li>
                    <li class="li-last"><a href="signup/" class="sign"><ion-icon class="sign-ico" name="person-add-outline"></ion-icon>SIGN UP</a></li>
                </ul>              

            </nav>
    
        <?php else:?>
            <?php
                //SESSION['LOG'] = PROFILE_ID
                //SO CHECK IF SESSION['LOG'] IS IN FREELANCER OR INDIVIDUAL
                $sessDet = $_SESSION['log'];
                $conObj = new controller;
                $getConv = $conObj->convert($sessDet);
                
            ?>
            <nav>
                <div class="logo">
                    <img src="circleLogo.png" alt="">
                    <p class="logoname">PHOMOD.COM</p>
                </div>

                <div class="btn-tog">
                    <span class="spans"></span>    
                    <span class="spans"></span>
                    <span class="spans"></span>    
                    <span class="spans"></span>
                </div>

                <ul>
                    <li><a href="#">PHOTOGRAPHERS</a></li>
                    <li><a href="#">MODELS</a></li>
                    <li class="log-li"><a href="u.php?name=<?php echo $getConv?>" class="log"><ion-icon class="log-ico" name="person-circle-outline"></ion-icon><?php echo $getConv?></a></li>
                    <li class="li-last"><a href="logout.php" class="sign" onclick="signOut()"><ion-icon class="sign-ico" name="log-out-outline"></ion-icon>LOG OUT</a></li>

                </ul>
            </nav>
        <?php endif?>

        <!------------ NAVIGATION BAR ------------>

    <!-------------------- HEADER ------------------->
    <header>
  
        <!------------ HERO BOX ------------>

            <div class="hero-box">

                <p class="big-text">NEED A PHOTOGRAPHER?</p>
                <p class="big-text sub-big">or a model?</p>
                <p class="text-cont">Browse our collection of freelance Photographers or find a Model to work with</p>
                <form action='search.php' method="GET">
                    <select name="need" required>
                        <option value="" selected style="background:rgb(211, 211, 211)">Need a</option>
                        <option value="photographer">Photographer</option>
                        <option value="model">Model</option>                        
                    </select>
                    <input type="text" id="search" class="search" name="location" placeholder="Browse by Location (Eg; Tema, Abuakwa)" required>
                    <button type="submit" id="browserr" class="browse"><ion-icon class="search-ico" name="search-outline"></ion-icon></button>
                </form>

            </div>


        <!------------ HERO BOX ------------>
    </header>


    <!------------ BROWSE CATEGORY ------------>

    <section class="category">
      <div class="row">
          <div class="span-1-of-4">
            <div style="background: linear-gradient(rgba(0, 0, 0, 0.658), rgba(0, 0, 0, 0.692)), url('gal/wed.jpg');background-position: center;background-size: cover;">
                <p>Wedding</p>
            </div>
          </div>

          <div class="span-1-of-4">
            <div style="background: linear-gradient(rgba(0, 0, 0, 0.658), rgba(0, 0, 0, 0.692)), url('gal/grad.jpg');background-position: center;background-size: cover;">
                <p>Graduation</p>
            </div>
        </div>

        <div class="span-1-of-4">
            <div style="background: linear-gradient(rgba(0, 0, 0, 0.658), rgba(0, 0, 0, 0.692)), url('gal/portrait.jpg');background-position: center;background-size: cover;">
                <p>Portrait</p>
            </div>
        </div>

        <div class="span-1-of-4">
            <div style="background: linear-gradient(rgba(0, 0, 0, 0.658), rgba(0, 0, 0, 0.692)), url('gal/studio.jpg');background-position: center;background-size: cover;">
                <p>Studio</p>
            </div>
        </div>

        <div class="span-1-of-4">
            <div style="background: linear-gradient(rgba(0, 0, 0, 0.658), rgba(0, 0, 0, 0.692)), url('gal/port (2).jpg');background-position: center;background-size: cover;">
                <p>Models</p>
            </div>
        </div>

        <div class="span-1-of-4">
            <div style="background: linear-gradient(rgba(0, 0, 0, 0.658), rgba(0, 0, 0, 0.692)), url('gal/food.jpg');background-position: center;background-size: cover;">
                <p>FOOD</p>
            </div>
        </div>
      </div>
  </section>

    <!------------ BROWSE CATEGORY ------------>


    <!------------ FREELANCERS NEAR YOU ------------>


    <div class="gerit">
        
    </div>



    <!------------ FREELANCERS NEAR YOU ------------>


        <!---------------------- FEATURED PHOTOGRAPHERS ---------------------->
        <section class="feat-phot">
            <div class="sec-title">
                <p class="feat-text">FEATURED PHOTOGRAPHERS</p>
            </div>
                        
                <div class="row feat-row">

                    <?php
                        $getFeatObj = new view;
                        $getFeatData = $getFeatObj->viewFeatPho(); 
                        $getFeatPho = $getFeatData->fetchAll();
                    ?>

                    <?php if($getFeatData->rowCount() > 0): ?>
                        <?php foreach($getFeatPho as $getFP):?>

                            <?php
                                $pic = $getFP['USERNAME'];
                                //GET PROFILE PIC AND COVER PIC
                                $picObj = new view;
                                $getPicMet = $picObj->getProfilePic($pic);
                            ?>

                            <?php if($getPicMet->rowCount() == 0):?>
                                <?php $src = 'profilepic/avatar.jpg';?>
                                            
                                <?php else:?>

                                <?php while($row = $getPicMet->fetch()): ?>            
                                    <?php $src = 'profilepic/'.$row['IMG_SRC']; ?>
                                    
                                <?php endwhile ?>
                            <?php endif ?>

                            <div class="span-1-of-3">

                                <?php if($getPicMet->rowCount() != 0):?>

                                    <?php while($row = $getPicMet->fetch()): ?>                                          
                                        <?php if(empty($row['IMG_SRC'])):?>
                                            <?php $src = 'profilepic/avatar.jpg'?>

                                        <?php else:?>
                                        <?php $src = 'profilepic/'.$row['IMG_SRC']; ?>
                                        <?php endif?>
                                        
                                    <?php endwhile ?>
                                    <div class="dp" style="background:url(<?php echo $src;?>);background-position:center;background-size:cover;">

                                    </div>

                                    <?php else:?>
                                        <div class="dp inidp" style="background-color:#<?php echo $backColor?>;border:8px solid #<?php echo $textColor?>">
                                            <p class="hold-init" style="color:#<?php echo $textColor?>"><?php echo $finInit?></p>
                                        </div>
                                <?php endif ?>


                                <div class="short-info">
                                    <p class="short-name"><?php echo $getFP['FULL_NAME'];?></p>
                                    <p class="prof"><?php echo $getFP['LANCER_TYPE'];?></p>
                                </div>

                                <div class="details row">
                                    <div class="span-1-of-2">
                                        <p class="location"><ion-icon class="loc-ico" name="location-outline"></ion-icon><?php echo $getFP['CITY'];?></p>
                                    </div>

                                    <div class="span-1-of-2">
                                        <a href="u.php?name=<?php echo $getFP['USERNAME'];?>" class="hire">Connect</a>
                                    </div>
                                </div>

                                <div class="rate">
                                    <p><span class="ratee">5.0</span>
                                        <ion-icon class="star-ico" name="star"></ion-icon>
                                        <ion-icon class="star-ico" name="star"></ion-icon>
                                        <ion-icon class="star-ico" name="star"></ion-icon>
                                        <ion-icon class="star-ico" name="star"></ion-icon>
                                        <ion-icon class="star-ico" name="star"></ion-icon>&nbsp;&nbsp;
                                        <?php echo $getFP['RATING'] . ' reviews';?>
                                    </p>
                                </div>

                                <div class="others">
                                    <p><ion-icon class="ver-ico" name="shield-checkmark"></ion-icon><span class="ver-span">verified</span></p>
                                </div>                    
                            </div>
                    


                        <?php endforeach?>
                    

                    <?php else:?>
                        <p>User not found</p>
                    <?php endif ?>

                    <div class="span-1-of-ban">
                        <div class="banner">
                            <p class="ads"><span class="span-one">AD SPACE</span><br><span class="span-two">AVAILABLE</span>
                                <a href="#" class="contact">Contact Us</a>
                            </p>
                        </div>
                    </div>
                </div>

        </section>

        <!---------------------- FEATURED MODELS ---------------------->

        <section class="feat-phot">
            <div class="mod-sec-title">
                <p class="feat-text">FEATURED MODELS</p>
            </div>
                        
                <div class="row feat-row">

                    <?php
                        $getFeatObj = new view;
                        $getFeatData = $getFeatObj->viewFeatMod(); 
                        $getFeatMod = $getFeatData->fetchAll();
                        
                    ?>

                            <?php if($getFeatData->rowCount() > 0): ?>
                                <?php foreach($getFeatMod as $getFM):?>


                                    <?php
                                        $pic = $getFM['USERNAME'];
                                        //GET PROFILE PIC AND COVER PIC
                                        $picObj = new view;
                                        $getPicMet = $picObj->getProfilePic($pic);
                                    ?>

                                    <?php if($getPicMet->rowCount() == 0):?>
                                                    <?php $src = 'profilepic/avatar.jpg';?>
                                                 
                                            <?php else:?>

                                            <?php while($row = $getPicMet->fetch()): ?>    
                                                <?php if(empty($row['IMG_SRC'])):?>
                                                    <?php $src = 'profilepic/avatar.jpg';?>

                                                <?php else:?>
                                                    <?php $src = 'profilepic/'.$row['IMG_SRC']; ?>
                                               <?php endif?>
                                            <?php endwhile ?>
                                    <?php endif ?>

                                    <div class="span-1-of-3">
                                        <div class="dp" style="background:url(<?php echo $src;?>);background-position:center;background-size:cover;">
                                            <!-- <img class="dp-img" src=""> -->
                                        </div>

                                        <div class="short-info">
                                            <p class="short-name"><?php echo $getFM['FULL_NAME'];?></p>
                                            <p class="prof"><?php echo $getFM['LANCER_TYPE'];?></p>
                                        </div>

                                        <div class="details row">
                                            <div class="span-1-of-2">
                                                <p class="location"><ion-icon class="loc-ico" name="location-outline"></ion-icon><?php echo $getFM['CITY'];?></p>
                                            </div>

                                            <div class="span-1-of-2 mod">
                                                <a href="u.php?name=<?php echo $getFM['USERNAME'];?>" class="hire">Connect</a>
                                            </div>
                                        </div>

                                        <div class="rate">
                                            <p><span class="ratee">5.0</span>
                                                <ion-icon class="star-ico" name="star"></ion-icon>
                                                <ion-icon class="star-ico" name="star"></ion-icon>
                                                <ion-icon class="star-ico" name="star"></ion-icon>
                                                <ion-icon class="star-ico" name="star"></ion-icon>
                                                <ion-icon class="star-ico" name="star"></ion-icon>&nbsp;&nbsp;
                                                <?php echo $getFM['RATING'] . ' reviews';?>
                                            </p>
                                        </div>

                                        <div class="others">
                                            <p><ion-icon class="ver-ico" name="shield-checkmark"></ion-icon><span class="ver-span">verified</span></p>
                                        </div>                    
                                    </div>
                            


                                <?php endforeach?>
                            

                            <?php else:?>
                                <p>User not found</p>
                            <?php endif ?>
                </div>

        </section>
        <!---------------------- FEATURED MODELS ---------------------->


        <!-- <script src="resources/carousel.js"></script> -->
</div>

<p class="phd"></p>

</body>
</html>