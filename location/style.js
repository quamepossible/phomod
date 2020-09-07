
  var startPos;
  var coordinates = [];
  var geoSuccess = function(position) {
  startPos = position;
  console.log("Latitude " + startPos.coords.latitude);
  console.log("Longitude " + startPos.coords.longitude);
  console.log("Accuracy " + startPos.coords.accuracy);
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
        console.log(city);
        if(city !== undefined){
          $.ajax({
            method : 'GET',
            url : 'location/getrec.php',
            data : {
              city : city
            },
            success : function(data){
              console.log(data);
              $('.gerit').html(data);
            }
          })
        }
        else{
          console.log("we can't find city");
        }
      }
    })
  };

  navigator.geolocation.watchPosition(geoSuccess);

