
function onSuccess(googleUser) {
    // The ID token you need to pass to your backend:
    var id_token = googleUser.getAuthResponse().id_token;

    //Check if we have cookie
    var gtc = Cookies.get("refresh");
    if(gtc !== undefined){
      console.log('we have cookies')
    }

    else{    
      $.ajax({
        method : 'POST',
        url : 'authlog.php',
        data : {
          clientid : id_token
        },
        success : function(data){
          // console.log(data)
          if(data == 'freelancer' || data == 'individual' || data == 'created'){
            Cookies.set("refresh", id_token, {expires: 7})
            $('.err').html('Logged in');
            $('.err').css('color', 'green');
            setTimeout(function(){
                $('#loginModal').modal('toggle');
                window.location.replace('/');
            },1500);
          }
          
          else{
              $('.err').html("Unable to login, try again");
              $('.err').css('color', 'red');
          }
        }
      })
    }

}

function onFailure() {
  $('.err').html("Unable to login, try again");
  $('.err').css('color', 'red');
}

function renderButton() {
  gapi.signin2.render('my-signin2', {
    'scope': 'profile email',
    'width': 240,
    'height': 50,
    'longtitle': true,
    'theme': 'dark',
    'onsuccess': onSuccess,
    'onfailure': onFailure
  });

}

function signOut() {
  Cookies.remove('refresh', { path: '' })
  var auth2 = gapi.auth2.getAuthInstance();
  auth2.signOut().then(function () {
    console.log('User signed out.');
  });
}

