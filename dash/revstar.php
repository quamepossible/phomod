<?php
    $icons = '';
    $out = 5 - $alrStar;
    $outons = '';
    for($l = 0; $l < $alrStar; $l++){
        $icons .= "<ion-icon class='star-ico ico-ns' name='star' style='color:rgb(255, 208, 0)'>".($l+1)."</ion-icon> ";
    }
    for($m = ($alrStar+1); $m <= 5; $m++){
        $outons .= "<ion-icon class='star-ico ico-ns' name='star-outline'>$m</ion-icon> ";
    }
    echo $icons . $outons;
?>