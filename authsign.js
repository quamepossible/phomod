$(document).ready(function(){
  gapi.load('auth2', function() {
    gapi.auth2.init();
  });
})
function onSignIn(googleUser) {
    // The ID token you need to pass to your backend:
    var id_token = googleUser.getAuthResponse().id_token;
    console.log("ID Token: " + id_token);

      $.ajax({
        method : 'POST',
        url : 'authlog.php',
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

