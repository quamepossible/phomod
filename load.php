<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <link href="pes.css" rel="stylesheet"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<section class="pho-gal">
        <div class="upload">
            <button class="up-pics" data-toggle="modal" data-target="#galleryModal"><ion-icon class="add" name="add-circle-outline"></ion-icon> <span>Upload Pictures</span></button>
        </div>
        
        <div class="sec-title">
            <p class="feat-text">GALLERY</p>
        </div>

        <?php
            session_start();
            $prid = $_SESSION['log'];
            include_once 'myauto.php';
            $meconn = new controller();
            $getConn = $meconn->getConnect();
            $getConv = $meconn->convert($prid);

            $username = $getConv;

            $sql = "SELECT IMG_SRC FROM gallery WHERE USERNAME = :pic ORDER BY ID DESC";
            $val_sql = $getConn->prepare($sql);
            $val_sql->execute(['pic' => $username]);
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
                                    <input class="uname dshow" type="text" value="<?php echo $username?>" name="username">
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
                    <div class="galemp">
                        <p class="emt">EMPTY GALLERY</p>
                        <img src="empgal.png" alt="" class="emp">
                    </div>
            <?php endif ?>
            </div>
        </div>
    </section>
</body>
</html>