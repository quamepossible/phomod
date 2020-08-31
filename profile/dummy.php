<?php 


$name = 'getty';
$path = 'profilepic/' . $name . "*";
$aft = glob($path);
print_r($aft)
// $getExt = explode(".", $aft[0]);
// $ext = end($getExt);
// $fileName = $name .'.'. $ext;
// echo $fileName;




?>