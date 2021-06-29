function rateg(){
    var rateNum = $('.votnum').val();
    if(rateNum.length == 0){
        return false;
    }

    else{
        return true;
    }
}

$(document).ready(function(){    
    var getStars = document.querySelectorAll('.ico-ns');
    var starLen = getStars.length;
    var starID;
    for(x = 0; x < starLen; x++){
      getStars[x].addEventListener('click', function(){
        starID = this.innerHTML;
        for(y = 0; y < starID; y++){
          getStars[y].style.color = 'rgb(255, 208, 0)';
          getStars[y].setAttribute('name', 'star');
        }
        for(z = starID; z < starLen; z++){
            getStars[z].style.color = 'rgba(255, 255, 255, 0.795)';
            getStars[z].setAttribute('name', 'star-outline');     
        }
        $('.votnum').val(starID);
      })
    }     

    //CHECK IF STAR FORM IS AVAILABLE
    var starForm = $('.rat-form');
    var unver = $('.unver');
    if(starForm.length > 0){
        //THEN USER IS LOGGED IN
        $('.rate-btn').click(function(){
            $(this).css('display', 'none');
            $('.rat-form').css('display', 'block');
        })
    }

    else{
        if(unver.length > 0){
            //THEN USER IS AN UNVERIFIED FREELANCER
            $('.rate-btn').click(function(){
                alert('account pending');
            })
        }
        else{
            $('.rate-btn').click(function(){
                $('#loginModal').modal('toggle');
            })
        }
    }

    //check if user is logged in with google but session is not available

    setInterval(() => {
        var lct = Cookies.get("refresh");
        if(lct !== undefined && starForm.length == 0){
            $.ajax({
                method : 'POST',
                url : 'authlog.php',
                data : {clientid : lct},
                success : (data) => {
                    if(data == 'Invalid ID token'){
                        var auth2 = gapi.auth2.getAuthInstance();
                        auth2.signOut().then(function () {
                            Cookies.remove('refresh', { path: '' })
                            console.log("cookies removed")
                        });
                        location.reload();
                    }
                    else{
                        location.reload();
                    }
                }
            })
        }
        else{
            // console.log('all set')
        }
    },2000)
    

    //AJAX RATE
    $('.rat-form').submit(function(e){
        e.preventDefault();
        var lancerr = $('.lance').val();
        var rater = $('.rater').val();
        var starl = $('.votnum').val();

        $.ajax({
            method : "POST",
            url : "dash/rate.php",
            data : {
                lancer : lancerr,
                rater : rater,
                votnum : starl
            },
            success : function(data){
                if(data == 'empty'){
                    alert('Please rate');
                }
                else{
                    $('.fet-rev').load('dash/rev.php',{user : lancerr});
                    $.holdReady(true);                            
                    function releaseHold() { $.holdReady(false); }
                    $.getScript('dash/public.js', releaseHold); 
                    $('.rat-form').css('display', 'none');
                    $('.rate-btn').css('display', 'block');                    
                }
            },
            // complete : () => {
            //     $('.rat-form').css('display', 'none');
            //     $('.rate-btn').css('display', 'block');                    
            // }
        })
    })
    if($('.mark-rate').length > 0){
        $('.rate-btn').css('background', 'green');
        $('.rate-btn>span').html("You've rated");
        $('.thumb-ico').attr('name', 'checkmark-done-outline');
    }

    //LOGIN
    $('#log-form').submit(function(e){
        e.preventDefault();

        var email = $('#mail-inp').val();
        var pass = $('#pwd-inp').val();

        if(email.length > 0){
            $.ajax({
                method : 'POST',
                url : 'login.php',
                data : {
                    email : email,
                    pwd : pass
                },
                success : function(data){

                    if(data == 'empty fields'){
                        $('.err').html('Please fill all fields')
                    }

                    else{
                        if(data == 'logged in'){
                            $('.err').html('Logged in');
                            $('.err').css('color', 'green');
                            setTimeout(function(){
                                $('#loginModal').modal('toggle');
                                location.reload();
                            },1500);
                        }

                        else if(data == 'individual'){
                            $('.err').html('Email is registered with google, Sign in with Google');
                        }

                        else if(data == 'Invalid'){
                            $('.err').html("Email and password don't match");
                        }
                        else{
                            $('.err').html("Email and password don't match");
                        }
                    }
                }
            })
        }
    }) 

})



$(window).scroll(()=>{
    var bigWidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    if(bigWidth < 640){
    //SMALL SCREENS
        const totHeight = 400;
        var covHeight = totHeight - window.pageYOffset;
        $('#cover').css({
            height: covHeight,
        })

        $('.dp').css({

        })
    
        if(covHeight < 200){
            $('.dp').css({
                width: '80px',
                height: '80px',
                border: '3px solid white',
                top: '50%',
                left: '10px',
                transform: 'translate(0, -50%)',
            })
            $('#cover').css({
                height: '80px',
                position: 'fixed',
                top: 0,
                zIndex: 5,
            })

            $('.cover-blur').css({
                filter: 'blur(200px)',
            })

            $('.cover-phot').css({
                // display: 'none',
                width: 0,
                height: 0,
            })

            $('.cover-name').css({
                width: '250px',
                // height: '80px',
                background: 'none',
                border: 'none',
                marginTop: '40px',
                padding: 0,
            })

            $('.cov').css({
                marginTop: 0,
            })

            var alloc = $('.alloc').html();
            $('.unloc').html(alloc)
            $('.locc').css({
                display: 'block'
            })

            $('.allst').css({
                display: 'block',
            })

            var topSta = $('.ratee').html();
            $('.trate').html(topSta);

            $('.tag-section').css({
                marginTop: '300px',
            })
        }
        else{
            $('.dp').css({
                width: '200px',
                height: '200px',
                border: '10px solid white',
                left: '50%',
                transform: 'translate(0,0)',
                transform: 'translateX(-50%)',
            })
            $('#cover').css({
                height: '400px',
                position: 'relative',
            })
            $('.cover-phot').css({
                width: '90%',
                height: '300px',
            })
            
            $('.cover-name').css({
                background: 'rgba(0, 0, 0, 0.582)',
                width: '85%',
                border: '5px solid white',
                marginTop: 0,
                padding: '5px',
            })

            $('.cov').css({
                marginTop: '20px',
            })

            $('.unloc').html('');
            $('.locc').css({
                display: 'none'
            })
            $('.allst').css({
                display: 'none',
            })

            $('.cover-blur').css({
                filter: 'blur(120px)',
            })
            $('.tag-section').css({
                marginTop: '30px',
            })
        }
    }  

    else{
        $('.dp').css({
            width: '200px',
            height: '200px',
            border: '10px solid white',
            left: '50%',
            transform: 'translate(0,0)',
            transform: 'translateX(-50%)',
        })

        $('#cover').css({
            height: '550px',
            position: 'relative',
        })
        
        $('.cover-phot').css({
            width: '60%',
            height: '400px',
        })
        
        $('.cover-name').css({
            background: 'rgba(0, 0, 0, 0.582)',
            width: '50%',
            border: '5px solid white',
            marginTop: 0,
            padding: '20px',
        })

        $('.cov').css({
            marginTop: '20px',
        })

        $('.unloc').html('');
        $('.locc').css({
            display: 'none'
        })
        $('.allst').css({
            display: 'none',
        })

        $('.cover-blur').css({
            filter: 'blur(120px)',
        })
        $('.tag-section').css({
            marginTop: '30px',
        })
        if(bigWidth >= 640 && bigWidth <= 930){
            $('.cover-phot').css({
                width: '80%',
            })
        }
    }
})
