<?php 

    include '../myauto.php';

    $feat = $_POST['feat'];
    $user = $_POST['user'];

    if($feat == 'NO'){
        $feat = 'YES';
    }

    else{
        $feat = 'NO';
    }
    
    $feature = new Controller;
    $feature->feature($feat, $user);

    header('Location: index.php');

?>