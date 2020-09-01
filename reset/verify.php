
<?php if(isset($_GET['email'])):?>
    <?php $email = $_GET['email'];?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../phomodlogo.ico">
    <link rel="stylesheet" href="verify.css">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <meta name="theme-color" content="#007d9c">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
</head>
<body>
    <div class="main-container">
        <div class="head-text">
            <p class="sub-text">
                RESET PASSWORD
            </p>

            <p class="mail-text">
                <span class="mes">We've sent a verification code to:</span>
                <p class="hol"><ion-icon class="p-ico" name="person"></ion-icon><span class="mail"><?php echo $email?></span></p>
            </p>
        </div>        

        <div class="res-form">
            <p class="error"></p>
            <form autocomplete="off" action="vercode.php" method="POST" class="form-container" onsubmit="return valpass()">
                <input class="email" type="email" name="email" value="<?php echo $email?>" style="display:none">
                <input class="cod-inp" autocomplete="off" type="text" name="code" placeholder="Enter verification code">
                    <p class="ver-err err"></p>
                <input class="pas-inp pas-one" autocomplete="new-password" type="password" name="pass" placeholder="Enter new password">
                    <p class="pass-one-err err"></p>
                <input type="password" class="pas-inp pas-two" placeholder="Confirm password">
                    <p class="pass-two-err err"></p>
                <button type="submit" name="submit"><ion-icon name="key" class="k-ico"></ion-icon>Reset password</button>
            </form>
        </div>

        <div class="sen-form">
            <form action="reset.php" class="cod-form" method="POST">
                <input class="re-mail" type="text" name="email" value="<?php echo $email?>">
                <div class="spin">
                    <button class="sen-code"><ion-icon name="paper-plane-outline" class="pl-ico"></ion-icon>Resend verification code</button>
                    <div class="hold-load">
                        <p class="over">
                            <div class="lds-ripple"><div></div><div></div></div>
                        </p>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    <script src="verscript.js"></script>

    <script>
        $('.form-container').submit(function(e){

            var getInv = document.querySelectorAll('.invalid');
            if(getInv.length > 0){
                return false;
            }

            else{
                e.preventDefault();
                
                var email = $('.email').val();
                var code = $('.cod-inp').val();
                var password = $('.pas-inp').val();
                $.ajax({
                    method : 'POST',
                    url : 'vercode.php',
                    data : {
                        email : email,
                        code : code,
                        pass : password
                    },
                    success : function(data){
                        if(data == 'correct'){
                            $('.error').html("Password changed successfully");
                            $('.error').css('color', 'green');
                        }
                        else{
                            $('.error').html("Wrong code entered")
                            $('.error').css('color', 'red');
                        }
                    }
                })
            }

        })

        $('.cod-form').submit(function(i){
            i.preventDefault();
            $('.hold-load').css('visibility', 'visible');
            var email = $('.re-mail').val();
            $.ajax({
                method : 'POST',
                url : 'reset.php',
                data : {email : email},
                success : function(data){
                    if(data == 'Email not found'){
                        $('.error').html(data);
                        $('.error').css('color', 'red');
                    }
                    else{
                        $('.error').html('Code sent');
                        $('.error').css('color', 'green');
                    }
                },
                complete : function(){
                    $('.hold-load').css('visibility', 'hidden');
                }
            })
        })
    </script>
    
</body>
</html>


<?php endif?>