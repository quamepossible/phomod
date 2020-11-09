

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

        gapi.load('auth2', function() {
            gapi.auth2.init();
        });

      function onSignIn(googleUser) {
          // Useful data for your client-side scripts:
          var profile = googleUser.getBasicProfile();
          console.log("ID: " + profile.getId()); // Don't send this directly to your server!
          console.log('Full Name: ' + profile.getName());
          console.log('Given Name: ' + profile.getGivenName());
          console.log('Family Name: ' + profile.getFamilyName());
          console.log("Image URL: " + profile.getImageUrl());
          console.log("Email: " + profile.getEmail());
      
          // The ID token you need to pass to your backend:
          var id_token = googleUser.getAuthResponse().id_token;
          console.log("ID Token: " + id_token);
      
            $.ajax({
              method : 'POST',
              url : '../authlog.php',
              data : {
                clientid : id_token
              },
              success : function(data){
                $('.phd').html(data);
                console.log(data)
              }
            })
      }
      
      // function renderButton() {
      //   gapi.signin2.render('my-signin2', {
      //     'scope': 'profile email',
      //     'width': 240,
      //     'height': 50,
      //     'longtitle': true,
      //     'theme': 'dark',
      //     'onsuccess': onSignIn
      //   });
      
      // }
      
      function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
          console.log('User signed out.');
        });
      }
      
      
    
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
    if(starForm.length > 0){
        //THEN USER IS LOGGED IN
        $('.rate-btn').click(function(){
            $(this).css('display', 'none');
            $('.rat-form').css('display', 'block');
        })
    }

    else{
        $('.rate-btn').click(function(){
            $('#loginModal').modal('toggle');
        })
    }

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
                    // $('.rat-form').css('display', 'none');
                    // $('.rate-btn').css('background-color', 'red');
                }
            }
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