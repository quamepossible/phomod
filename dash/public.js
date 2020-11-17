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

