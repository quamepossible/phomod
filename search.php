<?php
include 'myauto.php';
?>
<?php if(!isset($_GET['location']) || !isset($_GET['need'])):?>
    <?php include 'error404.html'?>

<?php else: ?>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
        <link href="resources/sea.css" rel="stylesheet">
        <link rel="stylesheet" href="resources/seamedia.css">
        <link rel="shortcut icon" href="phomodlogo.ico">
        <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&display=swap" rel="stylesheet">
        <meta name="theme-color" content="#007d9c">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="search/search.js" defer></script>
        <script src="bootstrap/dist/js/bootstrap.min.js" defer></script>
        <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
        <title><?php echo 'Freelancers in '.ucfirst($_GET['location']) ?></title>
    </head>

    <body>

        <div class="main-body">    

            <div class="side-bar">
                <div class="hold-side">

                    <div class="filter-title">
                        <p class="filter-text">FILTER SEARCH</p>
                    </div>

                    <form action="search.php" method="GET" class="search-form">
                        <select name="need" id="sel-one" required>
                            <option value="" selected>Search for</option>
                            <option value="photographer">Photographers</option>
                            <option value="model">Models</option>
                        </select>

                        <input name="location" id="" type="text" placeholder="Enter location" required>
                        <button type="submit"><ion-icon name="search" class="sea-ico"></ion-icon></button>
                    </form>
                </div>

                <div class="span-1-of-ban">
                    <div class="banner">
                        <p class="ads"><span class="span-one">AD SPACE</span><span class="span-two">AVAILABLE</span>
                            <a href="#" class="contact">Contact Us</a>
                        </p>
                    </div>
                </div>

            </div>

            <div class="row parent" id="main-p">
                <?php 
                    $need = $_GET['need'];
                    $search = $_GET['location'];

                    $holdVal = [$need, $search];
                    $holdLen = count($holdVal);
                    $holdErr = '';
                    for($i = 0; $i < $holdLen; $i++){
                        if(empty($holdVal[$i])){
                            $holdErr .= 'empty';
                        }
                    }
                ?>

                <?php if(!empty($holdErr)):?>
                    <p class="holderr">No results found for your search</p>
                    
                <?php else:?>               

                    <?php
                        $searchObj = new view;
                        $getData = $searchObj->viewSearchItem($need, $search);
                        $rows = $getData->fetchAll();
                    ?>

                    <?php if($getData->rowCount() > 0):?>
                        <?php foreach($rows as $row):?>
                            <?php
                                $pic = $row['USERNAME'];
                                $getPicMet = $searchObj->getProfilePic($pic);
                            ?>

                            <?php if($getPicMet->rowCount() == 0):?>
                                            <?php $src = 'profilepic/avatar.jpg';?>
                                            
                                    <?php else:?>

                                    <?php while($picRow = $getPicMet->fetch()): ?>            
                                        <?php if(empty($picRow['IMG_SRC'])):?>
                                            <?php $src = 'profilepic/avatar.jpg';?>

                                        <?php else:?>
                                            <?php $src = 'profilepic/'.$picRow['IMG_SRC']; ?>
                                        <?php endif?>
                                    <?php endwhile ?>
                            <?php endif ?>
                
                            <div class="span-1-of-3">
                                <div class="dp-img" style="background:url(<?php echo $src;?>);background-position:center;background-size:cover;">

                                </div>

                                <div class="short-info">
                                    <p class="short-name"><?php echo $row['FULL_NAME'];?></p>
                                    <p class="prof"><?php echo $row['LANCER_TYPE'];?></p>
                                </div>

                                <div class="details row">
                                    <div class="span-1-of-2">
                                        <p class="location"><ion-icon class="loc-ico" name="location-outline"></ion-icon><?php echo $row['CITY'];?></p>
                                    </div>

                                    <div class="span-1-of-2">
                                        <a href="u.php?name=<?php echo $row['USERNAME'];?>" class="hire">Connect</a>
                                    </div>
                                </div>

                                <div class="rate">
                                    <p><span class="ratee"><?php echo $searchObj->getStar($row['USERNAME']) ?></span>
                                        <?php $lanStar = $searchObj->getStar($row['USERNAME']);?>
                                        <?php include 'dash/star.php'?>
                                        &nbsp;&nbsp;
                                        <?php echo $searchObj->getTotRat($row['USERNAME']) . ' reviews';?>
                                    </p>
                                </div>

                                <div class="others">
                                    <?php if($row['EMAIL_VERIFIED'] == 'YES'):?>
                                        <p><ion-icon class="ver-ico" name="shield-checkmark"></ion-icon><span class="ver-span">verified</span></p>
                                    <?php endif?>
                                </div>                    
                            </div>
                    


                        <?php endforeach?>
                    

                    <?php else:?>
                        <p class="holderr">No results found for your search</p>
                    <?php endif ?>
                <?php endif?>
            </div>
        </div>
    </body>
</html>
<?php endif ?>
