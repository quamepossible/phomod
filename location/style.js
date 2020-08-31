window.onload = function() {
    var startPos;
    var geoSuccess = function(position) {
      startPos = position;
      document.getElementById('startLat').innerHTML = startPos.coords.latitude;
      document.getElementById('startLon').innerHTML = startPos.coords.longitude;
    };
    navigator.geolocation.getCurrentPosition(geoSuccess);
  };