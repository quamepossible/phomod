<?php
    include '../myauto.php';

    if(isset($_POST['lancer'])){
        $lancer = $_POST['lancer'];
        $rater = $_POST['rater'];
        $totVot = $_POST['votnum'];

        $totVot = str_replace(" ", "", $totVot);
        $list = [$lancer, $rater, $totVot];
        $coun = count($list);
        $err = "";
        for($i = 0; $i < $coun; $i++){
            if(empty($list[$i])){
                $err .= 'empty';
            }
        }

        if(!empty($err) || $totVot > 5){
            echo "empty";
        }

        else{
            $letRate = new controller;
            $doRate = $letRate->addRate($lancer, $rater, $totVot);
        }        
    }



?>