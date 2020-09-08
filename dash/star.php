<?php
$ex = explode('.', $lanStar);
$icons = '';

if(count($ex) == 2){
    $out = 5 - $lanStar;
    $outons = '';
    for($i = 0; $i < $ex[0]; $i++){
        $icons .= "<ion-icon class='star-ico' name='star'></ion-icon> ";
    }
    $sem = "<ion-icon class='star-ico' name='star-half-outline'></ion-icon> ";
    for($n = 0; $n < ($out-1); $n++){
        $outons .= "<ion-icon class='star-ico' name='star-outline'></ion-icon> ";
    }
    echo $icons . $sem . $outons;
}

else{
    if($lanStar == 'NA'){
        for($k = 0; $k < 5; $k++){
            $icons .= "<ion-icon class='star-ico' name='star-outline'></ion-icon> ";
        }
        echo $icons;
    }

    else{
        $out = 5 - $lanStar;
        $outons = '';
        for($l = 0; $l < $lanStar; $l++){
            $icons .= "<ion-icon class='star-ico' name='star'></ion-icon> ";
        }
        for($m = 0; $m < $out; $m++){
            $outons .= "<ion-icon class='star-ico' name='star-outline'></ion-icon> ";
        }
        echo $icons . $outons;
    }
}
?>