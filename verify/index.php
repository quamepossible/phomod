<?php if(isset($_GET['email'])):?>
    <?php $email = $_GET['email'];?>

    <!DOCTYPE html>
    <html lang="en">
    <head>        
        <link rel="shortcut icon" href="../phomodlogo.ico">
        <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="vermail.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
        <script src="ver.js" defer></script>
        <meta name="theme-color" content="#007d9c">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Verify account</title>
    </head>
    <body>   

        <div class="container">
            <div class="text">
                <p class="par-text">VERIFY YOUR EMAIL</p> 
                <p class="sub-text">Enter the code sent to</p>
                <p class="hol"><ion-icon class="p-ico" name="person"></ion-icon><span class="mail"><?php echo $email?></span></p>
            </div>

            <p class="err" style="text-align: center;color:red"></p>

            <div class="form-container">
                <form class="myform" action="ver.php" method="POST">
                    <input type="text" class="email" name="email" value="<?php echo $email?>">
                    <input type="number" name="vercode" class="c-field" placeholder="Enter verification code" required>
                    <div class="spin">
                    <button name="submit" type="submit" class="ver"><ion-icon name="mail-open-outline" class="ver-ico"></ion-icon><span>Verify</span></button>
                    <div class="hold-load h-one">
                        <p class="over">
                            <div class="lds-ripple"><div></div><div></div></div>
                        </p>
                    </div>
                        
                    </div>
                </form>
            </div>

            <div class="sen-form">
            <form action="resen.php" class="cod-form" method="GET">
                <input class="re-mail" type="text" name="email" value="<?php echo $email?>">
                <div class="spin">
                    <button class="sen-code"><ion-icon name="paper-plane-outline" class="pl-ico"></ion-icon>&nbsp;&nbsp;&nbsp;Resend verification code</button>
                    <div class="hold-load h-two">
                        <p class="over">
                            <div class="lds-ripple"><div></div><div></div></div>
                        </p>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </body>
    </html>

<?php else:?>

<?php endif?>