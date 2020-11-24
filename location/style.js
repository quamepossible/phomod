function getLoc(){
    var startPos;
    var coordinates = [];
    var geoSuccess = function(position) {
    startPos = position;
    var lat = startPos.coords.latitude;
    var lng = startPos.coords.longitude;
    var acc = startPos.coords.accuracy;
    coordinates = [lat, lng];
    var latt = coordinates[0];
    var lonn = coordinates[1];
    $.ajax({
      method : 'GET',
      url : 'location/location.php',
      dataType : 'json',
      data : {
        lat : latt,
        long : lonn
      },
      success : function(data){
        var getData = data;
        var city = getData.address.city;
        var state = getData.address.state;
        if(city !== undefined){
          $.ajax({
            method : 'GET',
            url : 'location/getrec.php',
            data : {
              city : city
            },
            success : function(data){
              $('.gerit').html(data);
              Cookies.set("location", city, {expires: 7})
              
            }
          })
        }
        // else if()
        else{
          // console.log("we can't find city");
          $.ajax({
            method : 'GET',
            url : 'location/getrec.php',
            data : {
              city : state
            },
            success : function(data){
              $('.gerit').html(data);
              Cookies.set("location", state, {expires: 7})
            }
          })
          
        }
      }
    })
  };
  navigator.geolocation.watchPosition(geoSuccess);
}
