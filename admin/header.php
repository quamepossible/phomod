<?php
    include 'adminauto.php';

    $unCount = 'NO';
    $unType = '%%';

    $unVerFree = new view;
    $unVerFreeMet = $unVerFree->getUnverifiedUsers($unCount, $unType);
    $numUnvFree = $unVerFreeMet->rowCount();


    
    $unCount = 'NO';
    $unType = '%photographer%';

    $unVerPho = new view;
    $unVerPhoMet = $unVerPho->getUnverifiedUsers($unCount, $unType);
    $numUnvPho = $unVerPhoMet->rowCount();


    $unCount = 'NO';
    $unType = '%model%';

    $unVerMod = new view;
    $unVerModMet = $unVerMod->getUnverifiedUsers($unCount, $unType);
    $numUnvMod = $unVerModMet->rowCount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="overlay.css">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/cr-1.5.2/fh-3.1.7/kt-2.5.2/rr-1.2.7/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/cr-1.5.2/fh-3.1.7/kt-2.5.2/rr-1.2.7/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.min.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.min.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="rgb(3, 0, 34)">
    <title><?php echo $title ?></title>
</head>
<body>

    <?php include '../overlay.html';?>

    <div class="top-nav">
        <nav class="main-nav">
            <div class="row">
                <div class="nav-one">
                    <span class="dash-name">PHOMOD Admin</span>
                    <span class="nav-btn">&#9776;</span>
                    <input type="text" id="input" placeholder="Search">
                </div>

                <div class="nav-two">
                    <span><ion-icon name="notifications-outline" class="bell"></ion-icon></span>
                    <span><ion-icon name="chatbubbles-outline" class="chat"></ion-icon></span>
                    <img src="../logo.png" alt="">
                </div>
            </div>
        </nav>
    </div>

    <section class="main-scr">
        <div class="row">
            <div class="left-nav">
            <div class="holdnav">
                    <a class="users cli" href="javascript:void(0);"><ion-icon name="person-outline" class='free-ico'></ion-icon>Freelancers<ion-icon name="chevron-forward-outline" class="rig-ico-one usico-down"></ion-icon></a>
                    <div class="hold-items down-users drop">
                        <a href="index.php" class="all-users ye-p">All freelancers</a>
                        <a href="verifiedpho.php" class="photog ye-p">Photographers</a>
                        <a href="verifiedmod.php" class="models ye-p">Models</a>
                    </div>

                    <a class="verify cli" href="javascript:void(0);"><ion-icon name="checkmark-circle-outline" class='unv-ico'></ion-icon>Unverified <span class="unvcount"><?php echo $numUnvFree?></span><ion-icon name="chevron-forward-outline" class="rig-ico-two usico-down"></ion-icon></a></p>
                    <div class="hold-items down-verify drop">
                       <a href="unverfree.php" class="unusers ye-p">All freelancers</a>
                       <a href="unverpho.php" class="unphot ye-p">Photographers<span class="unvcountPho"><?php echo $numUnvPho?></span></a>
                       <a href="unvermod.php" class="unmodels ye-p">Models<span class="unvcountMod"><?php echo $numUnvMod?></span></a>
                    </div>

                    <a class="action cli" href="javascript:void(0);"><ion-icon name="settings-outline" class='act-ico'></ion-icon>Actions<ion-icon name="chevron-forward-outline" class="rig-ico-three"></ion-icon></a>
                    <div class="hold-items down-action">
                        <a href="actfree.php" class="active ye-p">Online freelancers</a>
                        <a href="actpho.php" class="actphot ye-p">Online photographers</a>
                        <a href="actmod.php" class="actmod ye-p">Online models</a>
                    </div>     
                    
                    <a class="add-user" href="#"><ion-icon name="person-add-outline" class="add-ico"></ion-icon>Add freelancer</a></p>
                </div>
                
            </div>

            <div class="user-interface">
                <div class="row cardro">
                    <div class="three">
                        <div class="card text-white bg-dark mb-3">
                            <div class="card-header">TOTAL USERS</div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>

                    <div class="three">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">PHOTOGRAPHERS</div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>
                  
                    <div class="three">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-header">MODELS</div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>
                    

                    <div class="three">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-header">INDIVIDUAL</div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>


                </div>
                <?php
                $exp = explode('u', $text);
                $end = end($exp);
                ?>
                <?php if($end[0] == 'U'):?>
                <div class="card text-light text-center bg-danger mb-3 sin-card" style="margin-top:30px;width: 97%">
                    <div class="card-header bad"><ion-icon name="close-circle" class='un-bad'></ion-icon><span><?php echo $text?></span></div>
                </div>

                <?php else:?>
                    <div class="card text-light text-center bg-success mb-3 sin-card" style="margin-top:30px;width: 97%">
                        <div class="card-header bad"><ion-icon name="shield-checkmark" class='ver-bad'></ion-icon><span><?php echo $text?></span></div>
                    </div>
                <?php endif?>
                
                <div id="allfree" class="stand">

                    <table style="width: 100%" id="table_id" class="display table table-hover table-bordered w-auto">
                            <thead>
                                <tr>
                                    <td class="text-center">#</td>
                                    <td>NAME</td>
                                    <td>USERNAME</td>
                                    <td>PROFILE_ID</td>
                                    <td>PHONE</td>
                                    <td>LANCER_TYPE</td>
                                    <td>VERIFIED</td>
                                    <td>TRAVEL</td>
                                    <td>ACTIONS</td>                           
                                    
                                </tr>
                            </thead>

                            <tbody>
