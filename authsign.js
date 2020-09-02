function onSignIn(googleUser) {
  var gett = document.querySelector('.getoken');
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
    gett.innerHTML = id_token;
    gett.style.display = 'none';
}



$(document).ready(function(){

  function getData(){
    let getok = $('.getoken').html();
    if(getok.length > 0){
      $.ajax({
        method : 'POST',
        url : 'authlog.php',
        data : {
          clientid : getok
        },
        success : function(data){
          $('.phd').html(data);
        }
      })
    }
    else{
      $('.phd').html('no data available')
    }
  }   
  
  var doTime = setInterval(getData,1000);
  if($('.getoken').html().length > 0){
    clearInterval(doTime);
  }
})
