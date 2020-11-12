<?php

  $lati = $_GET['lat'];
  $long = $_GET['long'];
  $curl = curl_init("https://us1.locationiq.com/v1/reverse.php?key=646a570b3940ee&lat=$lati&lon=$long&format=json");

  curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER    =>  true,
    CURLOPT_FOLLOWLOCATION    =>  true,
    CURLOPT_MAXREDIRS         =>  10,
    CURLOPT_TIMEOUT           =>  30,
    CURLOPT_CUSTOMREQUEST     =>  'GET',
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } 
  else {
    echo $response;
  }

?>
