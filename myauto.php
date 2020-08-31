<?php
    spl_autoload_register('myAutoLoader');

    function myAutoLoader($getClass){
        $path = "classes/";
        $ext = ".php";
        $fullPath = $path . $getClass . $ext;
        include $fullPath;
    }